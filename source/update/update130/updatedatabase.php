<?php
@set_time_limit(3600);
header('Content-type:text/html;charset=gb2312');
if($_GET['confirm'] != 1){
	echo '<font color="red">ע�⣺</font><br>�������������ݿ�ĸ��£��ʺϴ�1.10��1.22������汾���ݿ�������1.30�档���ݿ�����֮ǰ�����ñ��ݣ�������������޷��ָ���<br><br><a href="'.basename($_SERVER['PHP_SELF']).'?confirm=1">������￪ʼ�������ݿ�</a><br><br>';
	exit;
}
include_once '../../configs/define.php';
echo '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ';
echo '<font color="blue">���ݿ����ʱ������ݴ�С�йأ�����ǰ�����ñ��ݣ�����ʱ�������ĵȴ�����Ҫ�ر��������</font><br><br>';
echo '�����������ݿ�...';
ob_flush();
flush();
$conn=mysql_connect(JIEQI_DB_HOST, JIEQI_DB_USER, JIEQI_DB_PASS);
if(!$conn){
	echo '<font color="red">����ʧ�ܣ�<br>'.mysql_error().'</font><br>';
	exit;
}
//��������ԭ����ʲô����ʲô
$mysql_charset='';
if(defined('JIEQI_DB_CHARSET') && JIEQI_DB_CHARSET != 'default') $mysql_charset=JIEQI_DB_CHARSET;
if(empty($mysql_charset)){
	$result = mysql_query("SHOW TABLE STATUS FROM ".JIEQI_DB_NAME." LIKE 'jieqi_system_users'");
	if($result){
		$myrow = mysql_fetch_array($result);
		if(isset($myrow['Collation'])){
			$tmpary = explode('_', $myrow['Collation']);
			$tmpcharset=strtolower($tmpary[0]);
			if(in_array($tmpcharset, array('gbk', 'gb2312', 'big5', 'utf8', 'latin1'))) $mysql_charset = $tmpcharset;
		}
	}
}
if(empty($mysql_charset)) $mysql_charset='gbk';

$mysql_version = mysql_get_server_info();
if($mysql_version > '4.1' && !empty($mysql_charset)){
	@mysql_query("SET character_set_connection=".$mysql_charset.", character_set_results=".$mysql_charset.", character_set_client=binary");
}
if($mysql_version > '5.0') @mysql_query("SET sql_mode=''");

if(!mysql_select_db(JIEQI_DB_NAME)) {
	echo '<font color="red">���ݿ� '.JIEQI_DB_NAME.' �����ڻ��޷���Ȩ�ޣ��������ݿ��ʺţ�<br>'.mysql_error().'</font><br><br>';
	exit;
}
echo '<font color="blue">���ӳɹ���</font><br>';
ob_flush();
flush();

@ignore_user_abort(true); //�����û�ȡ��

//����������ظ��ļ�¼
echo '���ڼ�������...';
ob_flush();
flush();
$sql='SELECT count(*) as cot, cid, modname, cname FROM `jieqi_system_configs` WHERE 1 group by modname, cname order by cot desc';
$res=mysql_query($sql);
$updateary=array();
while($row=mysql_fetch_array($res)){
	if($row['cot']>1){
		$updateary[]=$row;
	}else{
		break;
	}
}
foreach($updateary as $row){
	$sql="DELETE FROM `jieqi_system_configs` WHERE modname='".addslashes($row['modname'])."' AND cname='".addslashes($row['cname'])."' AND cid != '".addslashes($row['cid'])."'";
	$res=mysql_query($sql);
}
echo '<font color="blue">������</font><br>';
ob_flush();
flush();

//����Ȩ�ޱ��ظ��ļ�¼
echo '���ڼ��Ȩ�ޱ�...';
ob_flush();
flush();
$sql='SELECT count(*) as cot, pid, modname, pname FROM `jieqi_system_power` WHERE 1 group by modname, pname order by cot desc';
$res=mysql_query($sql);
$updateary=array();
while($row=mysql_fetch_array($res)){
	if($row['cot']>1){
		$updateary[]=$row;
	}else{
		break;
	}
}
foreach($updateary as $row){
	$sql="DELETE FROM `jieqi_system_power` WHERE modname='".addslashes($row['modname'])."' AND pname='".addslashes($row['pname'])."' AND pid != '".addslashes($row['pid'])."'";
	$res=mysql_query($sql);
}
echo '<font color="blue">������</font><br>';
ob_flush();
flush();

//�����µ����ݱ�
echo '���ڴ����µ����ݱ�...';
ob_flush();
flush();
$sql=file_get_contents('uptable.sql');
if(!empty($mysql_charset)){
	if($mysql_version > '5.0'){
		$sql=str_replace(array('TYPE=MyISAM', 'TYPE=HEAP'), array('ENGINE=MyISAM DEFAULT CHARSET='.$mysql_charset, 'ENGINE=MEMORY DEFAULT CHARSET='.$mysql_charset), $sql);
	}elseif($mysql_version > '4.1'){
		$sql=str_replace(array('TYPE=MyISAM', 'TYPE=HEAP'), array('ENGINE=MyISAM DEFAULT CHARSET='.$mysql_charset, 'ENGINE=HEAP DEFAULT CHARSET='.$mysql_charset), $sql);
	}
}
$sqlary=array();
jieqi_splitsqlfile($sqlary, $sql);
foreach($sqlary as $v){
	$v=trim($v);
	if(!empty($v) and strlen($v)>5){
		$retflag=mysql_query($v);
	}
}
echo '<font color="blue">�������</font><br>';
ob_flush();
flush();

//�������ݽṹ
echo '���ڸ������ݽṹ...';
ob_flush();
flush();
$sql=file_get_contents('upstruct.sql');
$sqlary=array();
jieqi_splitsqlfile($sqlary, $sql);
foreach($sqlary as $v){
	$v=trim($v);
	if(!empty($v) and strlen($v)>5){
		$retflag=mysql_query($v);
	}
}
echo '<font color="blue">�������</font><br>';
ob_flush();
flush();

//��������
echo '���ڸ����������...';
ob_flush();
flush();
//���¼������µ�����
include_once('../../configs/article/configs.php');

if(is_numeric($jieqiConfigs['article']['toptimenum'])) $blockrows=$jieqiConfigs['article']['toptimenum'];
else $blockrows=15;
$sql="UPDATE `jieqi_system_blocks` SET filename='block_articlelist', classname='BlockArticleArticlelist', description='&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_articlelist.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�����з�ʽ��Ĭ�ϰ��ܷ����������������¼������ã�1����allvisit�� - ���ܷ�������2����mouthvisit�� - ���·�������3����weekvisit�� - ���ܷ�������4����dayvisit�� - ���շ�������5����allvote�� - �����Ƽ�������6����mouthvote�� - �����Ƽ�������7����weekvote�� - �����Ƽ�������8����dayvote�� - �����Ƽ�������9����postdate�� - ��������⣻10����toptime�� - ����վ�Ƽ���11����goodnum�� - ���ղ�������12����size�� - ������������13����lastupdate�� - ��������£�<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������ʹ��������Ĭ�� 15��<br>&nbsp;&nbsp;&nbsp;&nbsp;���������������Ĭ�� 0 ��ʾ������𣩣��˴�ʹ�õ��������Ŷ��������ƣ����硰����С˵���������� 3 ����������ó� 3�����Ҫͬʱѡ������𣬿����á�|���ָ������� 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ԭ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾԭ����Ʒ��2 ��ʾת����Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ȫ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾȫ����Ʒ��2 ��ʾ������Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ʾ˳��Ĭ�� 0 ��ʾ���Ӵ�С���򣩣�1 ��ʾ��С��������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��lastupdate,,0,1,0,0�� ��ʾ��ʾ15��������µ�ԭ����Ʒ�����еڶ����������գ�����ʹ��Ĭ�ϵ�15����', vars='toptime,".$blockrows.",0,0,0,0', template='block_toptime.html', contenttype='1', hasvars='1' WHERE modname='article' AND classname='BlockArticleToptime'";
mysql_query($sql);


if(is_numeric($jieqiConfigs['article']['lastupdatenum'])) $blockrows=$jieqiConfigs['article']['lastupdatenum'];
else $blockrows=15;
$sql="UPDATE `jieqi_system_blocks` SET filename='block_articlelist', classname='BlockArticleArticlelist', description='&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_articlelist.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�����з�ʽ��Ĭ�ϰ��ܷ����������������¼������ã�1����allvisit�� - ���ܷ�������2����mouthvisit�� - ���·�������3����weekvisit�� - ���ܷ�������4����dayvisit�� - ���շ�������5����allvote�� - �����Ƽ�������6����mouthvote�� - �����Ƽ�������7����weekvote�� - �����Ƽ�������8����dayvote�� - �����Ƽ�������9����postdate�� - ��������⣻10����toptime�� - ����վ�Ƽ���11����goodnum�� - ���ղ�������12����size�� - ������������13����lastupdate�� - ��������£�<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������ʹ��������Ĭ�� 15��<br>&nbsp;&nbsp;&nbsp;&nbsp;���������������Ĭ�� 0 ��ʾ������𣩣��˴�ʹ�õ��������Ŷ��������ƣ����硰����С˵���������� 3 ����������ó� 3�����Ҫͬʱѡ������𣬿����á�|���ָ������� 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ԭ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾԭ����Ʒ��2 ��ʾת����Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ȫ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾȫ����Ʒ��2 ��ʾ������Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ʾ˳��Ĭ�� 0 ��ʾ���Ӵ�С���򣩣�1 ��ʾ��С��������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��lastupdate,,0,1,0,0�� ��ʾ��ʾ15��������µ�ԭ����Ʒ�����еڶ����������գ�����ʹ��Ĭ�ϵ�15����', vars='lastupdate,".$blockrows.",0,0,0,0', template='block_lastupdate.html', contenttype='1', hasvars='1' WHERE modname='article' AND classname='BlockArticleLastupdate'";
mysql_query($sql);

if(is_numeric($jieqiConfigs['article']['authorupdatenum'])) $blockrows=$jieqiConfigs['article']['authorupdatenum'];
else $blockrows=15;
$sql="UPDATE `jieqi_system_blocks` SET filename='block_articlelist', classname='BlockArticleArticlelist', description='&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_articlelist.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�����з�ʽ��Ĭ�ϰ��ܷ����������������¼������ã�1����allvisit�� - ���ܷ�������2����mouthvisit�� - ���·�������3����weekvisit�� - ���ܷ�������4����dayvisit�� - ���շ�������5����allvote�� - �����Ƽ�������6����mouthvote�� - �����Ƽ�������7����weekvote�� - �����Ƽ�������8����dayvote�� - �����Ƽ�������9����postdate�� - ��������⣻10����toptime�� - ����վ�Ƽ���11����goodnum�� - ���ղ�������12����size�� - ������������13����lastupdate�� - ��������£�<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������ʹ��������Ĭ�� 15��<br>&nbsp;&nbsp;&nbsp;&nbsp;���������������Ĭ�� 0 ��ʾ������𣩣��˴�ʹ�õ��������Ŷ��������ƣ����硰����С˵���������� 3 ����������ó� 3�����Ҫͬʱѡ������𣬿����á�|���ָ������� 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ԭ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾԭ����Ʒ��2 ��ʾת����Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ȫ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾȫ����Ʒ��2 ��ʾ������Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ʾ˳��Ĭ�� 0 ��ʾ���Ӵ�С���򣩣�1 ��ʾ��С��������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��lastupdate,,0,1,0,0�� ��ʾ��ʾ15��������µ�ԭ����Ʒ�����еڶ����������գ�����ʹ��Ĭ�ϵ�15����', vars='lastupdate,".$blockrows.",0,1,0,0', template='block_authorupdate.html', contenttype='1', hasvars='1' WHERE modname='article' AND classname='BlockArticleAuthorupdate'";
mysql_query($sql);

if(is_numeric($jieqiConfigs['article']['masterupdatenum'])) $blockrows=$jieqiConfigs['article']['masterupdatenum'];
else $blockrows=15;
$sql="UPDATE `jieqi_system_blocks` SET filename='block_articlelist', classname='BlockArticleArticlelist', description='&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_articlelist.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�����з�ʽ��Ĭ�ϰ��ܷ����������������¼������ã�1����allvisit�� - ���ܷ�������2����mouthvisit�� - ���·�������3����weekvisit�� - ���ܷ�������4����dayvisit�� - ���շ�������5����allvote�� - �����Ƽ�������6����mouthvote�� - �����Ƽ�������7����weekvote�� - �����Ƽ�������8����dayvote�� - �����Ƽ�������9����postdate�� - ��������⣻10����toptime�� - ����վ�Ƽ���11����goodnum�� - ���ղ�������12����size�� - ������������13����lastupdate�� - ��������£�<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������ʹ��������Ĭ�� 15��<br>&nbsp;&nbsp;&nbsp;&nbsp;���������������Ĭ�� 0 ��ʾ������𣩣��˴�ʹ�õ��������Ŷ��������ƣ����硰����С˵���������� 3 ����������ó� 3�����Ҫͬʱѡ������𣬿����á�|���ָ������� 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ԭ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾԭ����Ʒ��2 ��ʾת����Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ȫ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾȫ����Ʒ��2 ��ʾ������Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ʾ˳��Ĭ�� 0 ��ʾ���Ӵ�С���򣩣�1 ��ʾ��С��������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��lastupdate,,0,1,0,0�� ��ʾ��ʾ15��������µ�ԭ����Ʒ�����еڶ����������գ�����ʹ��Ĭ�ϵ�15����', vars='lastupdate,".$blockrows.",0,2,0,0', template='block_masterupdate.html', contenttype='1', hasvars='1' WHERE modname='article' AND classname='BlockArticleMasterupdate'";
mysql_query($sql);

if(is_numeric($jieqiConfigs['article']['postdatenum'])) $blockrows=$jieqiConfigs['article']['postdatenum'];
else $blockrows=15;
$sql="UPDATE `jieqi_system_blocks` SET filename='block_articlelist', classname='BlockArticleArticlelist', description='&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_articlelist.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������������������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�����з�ʽ��Ĭ�ϰ��ܷ����������������¼������ã�1����allvisit�� - ���ܷ�������2����mouthvisit�� - ���·�������3����weekvisit�� - ���ܷ�������4����dayvisit�� - ���շ�������5����allvote�� - �����Ƽ�������6����mouthvote�� - �����Ƽ�������7����weekvote�� - �����Ƽ�������8����dayvote�� - �����Ƽ�������9����postdate�� - ��������⣻10����toptime�� - ����վ�Ƽ���11����goodnum�� - ���ղ�������12����size�� - ������������13����lastupdate�� - ��������£�<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������ʹ��������Ĭ�� 15��<br>&nbsp;&nbsp;&nbsp;&nbsp;���������������Ĭ�� 0 ��ʾ������𣩣��˴�ʹ�õ��������Ŷ��������ƣ����硰����С˵���������� 3 ����������ó� 3�����Ҫͬʱѡ������𣬿����á�|���ָ������� 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ԭ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾԭ����Ʒ��2 ��ʾת����Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ�ȫ����Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾȫ����Ʒ��2 ��ʾ������Ʒ<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ʾ˳��Ĭ�� 0 ��ʾ���Ӵ�С���򣩣�1 ��ʾ��С��������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��lastupdate,,0,1,0,0�� ��ʾ��ʾ15��������µ�ԭ����Ʒ�����еڶ����������գ�����ʹ��Ĭ�ϵ�15����', vars='postdate,".$blockrows.",0,0,0,0', template='block_postdate.html', contenttype='1', hasvars='1' WHERE modname='article' AND classname='BlockArticlePostdate'";
mysql_query($sql);

if(is_numeric($jieqiConfigs['article']['newreviewnum'])) $blockrows=$jieqiConfigs['article']['newreviewnum'];
else $blockrows=10;
$sql="UPDATE `jieqi_system_blocks` SET filename='block_reviewlist', classname='BlockArticleReviewlist', description='&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_newreview.html������/modules/article/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;�������������ĸ���������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ����ʾ������ʹ��������Ĭ�� 10��<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ��ö�������Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾ�ö�������2 ��ʾ���ö�����<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ�Ƿ񾫻�������Ĭ�� 0 ��ʾ���жϣ���1 ��ʾֻ��ʾ����������2 ��ʾ�Ǿ�������<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָÿ�����������ʾ���ȣ�������������Ĭ�� 64 ����λ���ֽڣ��൱�� 32 �����֣�<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��15,0,1,64�� ��ʾ��ʾ15�����¾���������', vars='".$blockrows.",0,0,64', template='block_newreview.html', contenttype='1', hasvars='1' WHERE modname='article' AND classname='BlockArticleNewreview'";
mysql_query($sql);


$sql=file_get_contents('updata.sql');
$sqlary=array();
jieqi_splitsqlfile($sqlary, $sql);
foreach($sqlary as $v){
	$v=trim($v);
	if(!empty($v) and strlen($v)>5){
		$retflag=mysql_query($v);
	}
}
echo '<font color="blue">�������</font><br>';
ob_flush();
flush();


echo '<br><font color="blue">��ϲ�������ݿ�������ɣ�</font><br>';
ob_flush();
flush();

//���ݱ��ǰ׺
function jieqi_dbprefix($tbname){
	return 'jieqi_'.$tbname;
}

//�ֽ�sql���
function jieqi_splitsqlfile(&$ret, $sql, $release=32270){
	$sql          = trim($sql);
	$sql_len      = strlen($sql);
	$char         = '';
	$string_start = '';
	$in_string    = FALSE;
	$time0        = time();

	for ($i = 0; $i < $sql_len; ++$i) {
		$char = $sql[$i];

		// We are in a string, check for not escaped end of strings except for
		// backquotes that can't be escaped
		if ($in_string) {
			for (;;) {
				$i         = strpos($sql, $string_start, $i);
				// No end of string found -> add the current substring to the
				// returned array
				if (!$i) {
					$ret[] = $sql;
					return TRUE;
				}
				// Backquotes or no backslashes before quotes: it's indeed the
				// end of the string -> exit the loop
				else if ($string_start == '`' || $sql[$i-1] != '\\') {
					$string_start      = '';
					$in_string         = FALSE;
					break;
				}
				// one or more Backslashes before the presumed end of string...
				else {
					// ... first checks for escaped backslashes
					$j                     = 2;
					$escaped_backslash     = FALSE;
					while ($i-$j > 0 && $sql[$i-$j] == '\\') {
						$escaped_backslash = !$escaped_backslash;
						$j++;
					}
					// ... if escaped backslashes: it's really the end of the
					// string -> exit the loop
					if ($escaped_backslash) {
						$string_start  = '';
						$in_string     = FALSE;
						break;
					}
					// ... else loop
					else {
						$i++;
					}
				} // end if...elseif...else
			} // end for
		} // end if (in string)

		// We are not in a string, first check for delimiter...
		else if ($char == ';') {
			// if delimiter found, add the parsed part to the returned array
			$ret[]      = substr($sql, 0, $i);
			$sql        = ltrim(substr($sql, min($i + 1, $sql_len)));
			$sql_len    = strlen($sql);
			if ($sql_len) {
				$i      = -1;
			} else {
				// The submited statement(s) end(s) here
				return TRUE;
			}
		} // end else if (is delimiter)

		// ... then check for start of a string,...
		else if (($char == '"') || ($char == '\'') || ($char == '`')) {
			$in_string    = TRUE;
			$string_start = $char;
		} // end else if (is start of string)

		// ... for start of a comment (and remove this comment if found)...
		else if ($char == '#'
		|| ($char == ' ' && $i > 1 && $sql[$i-2] . $sql[$i-1] == '--')) {
			// starting position of the comment depends on the comment type
			$start_of_comment = (($sql[$i] == '#') ? $i : $i-2);
			// if no "\n" exits in the remaining string, checks for "\r"
			// (Mac eol style)
			$end_of_comment   = (strpos(' ' . $sql, "\012", $i+2))
			? strpos(' ' . $sql, "\012", $i+2)
			: strpos(' ' . $sql, "\015", $i+2);
			if (!$end_of_comment) {
				// no eol found after '#', add the parsed part to the returned
				// array if required and exit
				if ($start_of_comment > 0) {
					$ret[]    = trim(substr($sql, 0, $start_of_comment));
				}
				return TRUE;
			} else {
				$sql          = substr($sql, 0, $start_of_comment)
				. ltrim(substr($sql, $end_of_comment));
				$sql_len      = strlen($sql);
				$i--;
			} // end if...else
		} // end else if (is comment)

		// ... and finally disactivate the "/*!...*/" syntax if MySQL < 3.22.07
		else if ($release < 32270
		&& ($char == '!' && $i > 1  && $sql[$i-2] . $sql[$i-1] == '/*')) {
			$sql[$i] = ' ';
		} // end else if

		// loic1: send a fake header each 30 sec. to bypass browser timeout
		$time1     = time();
		if ($time1 >= $time0 + 30) {
			$time0 = $time1;
			header('X-pmaPing: Pong');
		} // end if
	} // end for

	// add any rest to the returned array
	if (!empty($sql) && ereg('[^[:space:]]+', $sql)) {
		$ret[] = $sql;
	}

	return TRUE;
}


?>