<?php
@set_time_limit(3600);
header('Content-type:text/html;charset=gb2312');
if($_GET['confirm'] != 1){
	echo '<font color="red">ע�⣺</font><br>���������ڸ���ģ���ϵͳ�����ļ����ʺϴ�JIEQI CMS 1.3X ������ 1.40 �档<br>����ǰ�뱸�ݺ����¼���Ŀ¼����ȷ����ЩĿ¼����Ŀ¼�����ݿ�д��<br>/configs<br>/themes<br>/templates<br>/modules/article/templates<br>/modules/forum/templates<br><br><a href="'.basename($_SERVER['PHP_SELF']).'?confirm=1">����������ڸ���ģ�������</a><br><br>';
	exit;
}

include_once '../../configs/define.php';

echo '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ';
ob_flush();
flush();

echo '<hr>���ڸ�����ҳģ��...<br>';
ob_flush();
flush();

//ϵͳģ��
$i=0;
$tmpchange[$i]['tmpfile']=array('templates/loginframe.html', 'templates/loginframe1.html', 'templates/blocks/block_login.html', 'templates/blocks/block_userset.html', 'templates/blocks/block_userstatus.html');
$tmpchange[$i]['repfrom']=array('{?$jieqi_url?}/login.php', '{?$jieqi_url?}/logout.php', '{?$jieqi_url?}/register.php', '{?$jieqi_url?}/loginframe.php');
$tmpchange[$i]['repto']=array('{?$jieqi_user_url?}/login.php', '{?$jieqi_user_url?}/logout.php', '{?$jieqi_user_url?}/register.php', '{?$jieqi_user_url?}/loginframe.php');


$i++;
$tmpchange[$i]['tmpfile']='templates/userdetail.html';
$tmpchange[$i]['repfrom']=array('<table width="100%" align="center" cellpadding="0" cellspacing="1" class="grid">
  <tr align="left">
    <td width="30%" class="odd">�û�����</td>
    <td width="70%" class="even">{?$uname?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�ȼ���</td>', '<tr align="left">
    <td class="odd">���л��֣�</td>
    <td class="even">{?$score?}</td>
  </tr>
  <tr>
    <td colspan="2" class="foot">VIP��Ϣ</td>
  </tr>');
$tmpchange[$i]['repto']=array('<table width="100%" align="center" cellpadding="0" cellspacing="1" class="grid">
  <tr align="left">
    <td class="odd">�û�ID��</td>
    <td class="even">{?$uid?}</td>
  </tr>
  <tr align="left">
    <td width="30%" class="odd">�û�����</td>
    <td width="70%" class="even">{?$uname?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�ǳƣ�</td>
    <td class="even">{?$name?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�ȼ���</td>', '<tr align="left">
    <td class="odd">���л��֣�</td>
    <td class="even">{?$score?}</td>
  </tr>
  <tr align="left">
    <td class="odd">����������</td>
    <td class="even">{?$system_maxfriends?}</td>
  </tr>
  <tr align="left">
    <td class="odd">���������Ϣ����</td>
    <td class="even">{?$system_maxmessages?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�������ղ�����</td>
    <td class="even">{?$article_maxbookmarks?}</td>
  </tr>
  <tr align="left">
    <td class="odd">ÿ�������Ƽ�������</td>
    <td class="even">{?$article_dayvotes?}</td>
  </tr>
  <tr>
    <td colspan="2" class="foot">VIP��Ϣ</td>
  </tr>');


 $i++;
$tmpchange[$i]['tmpfile']='templates/userinfo.html';
$tmpchange[$i]['repfrom']=array('<tr align="left">
    <td width="200" class="odd">�û�����</td>
    <td width="388" class="even">{?$uname?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�ȼ���</td>');
$tmpchange[$i]['repto']=array('<tr align="left">
    <td width="200" class="odd">�û�����</td>
    <td width="388" class="even">{?$uname?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�û�ID��</td>
    <td class="even">{?$uid?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�ǳƣ�</td>
    <td class="even">{?$name?}</td>
  </tr>
  <tr align="left">
    <td class="odd">�ȼ���</td>');

//�滻ģ��
foreach($tmpchange as $v){
	$tmpfiles=array();
	if(is_array($v['tmpfile'])) $tmpfiles=$v['tmpfile'];
	else $tmpfiles[0]=$v['tmpfile'];
	foreach($tmpfiles as $f){
		$filename='../../'.$f;
		if(is_file($filename)){
			$content=jieqi_readfile($filename);
			$fromlen=strlen($content);
			$content=str_replace($v['repfrom'], $v['repto'], $content);
			if($fromlen != strlen($content)){
				if(is_writable($filename)){
					jieqi_writefile($filename, $content);
					echo 'ģ��<a href="'.$filename.'">'.$f.'</a> <font color="blue">������ɣ�</font><br>';
				}else{
					echo 'ģ��<a href="'.$filename.'">'.$f.'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
				}
				ob_flush();
				flush();
			}
		}
	}
}

//������Ϣҳ�� ����ͶƱ���Ƽ�
$fname='../../modules/article/templates/articleinfo.html';
$data=jieqi_readfile($fname);
if(strpos($data, 'votedo.php')==false){
	if(is_writable($fname)){	
		$pattern = '/(\<span class="hottext"\>���鹫�棺\<\/span\>\<br \/\>[^\<\>]*\<\/td\>[^\<\>]*\<\/tr\>[^\<\>]*\<\/table\>\<\/td\>[^\<\>]*\<\/tr\>)[^\<\>]*(\<tr\>[^\<\>]*\<td[^\<\>]*\>\<\/td\>[^\<\>]*\<\/tr\>)/i';

		$replacement = '$1
{?if $showvote > 0?}
  <form name="frmvote" method="post" action="{?$jieqi_url?}/modules/article/votedo.php" target="_blank">
  <tr>
    <td bgcolor="#000000" height="1"></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><span class="hottext">��ƷͶƱ���飺</span></td>
    <td width="50%" align="right">
	  <input name="aid" type="hidden" value="{?$articleid?}" />
	  <input name="vid" type="hidden" value="{?$voteid?}" />
      <input type="submit" name="votepost" value="�ύͶƱ" class="button" />&nbsp;
      <input type="button" name="voteshow" value="�鿴���" class="button" onclick="window.open(\'{?$jieqi_url?}/modules/article/voteresult.php?id={?$voteid?}\')" />
      &nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>���⣺<strong>{?$votetitle?}</strong></td>
  </tr>
  <tr>
    <td>
	<ul>
		{?section name=i loop=$voteitemrows?}
		<li style="width:49%;float:left;padding:3px;">
		{?if $mulselect == 1?}
		<input name="voteitem[]" type="checkbox" value="{?$voteitemrows[i].id?}" />
		{?else?}
		<input name="voteitem" type="radio" value="{?$voteitemrows[i].id?}" />
		{?/if?}
		{?$voteitemrows[i].item?}
		</li>
		{?/section?}
    </ul>
	</td>
  </tr>
  </form>
  {?/if?}
  {?if $eachlinknum > 0?}
  <tr>
    <td bgcolor="#000000" height="1"></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td class="odd"><span class="hottext">�Ƽ��Ķ���</span></td>
        </tr>
        <tr>
          <td>
		  {?section name=i loop=$eachlinkrows?}
		  <li style="width:32%;float:left;padding:3px;">��<a href="{?$eachlinkrows[i].url_articleinfo?}" target="_blank">{?$eachlinkrows[i].articlename?}</a>��</li>
		  {?/section?}</td>
        </tr>
    </table></td>
  </tr>
  {?/if?}
$2';

		$data=preg_replace($pattern, $replacement, $data);

		jieqi_writefile($fname, $data);
		echo '������Ϣҳ��ģ�� <a href="'.$fname.'">/modules/article/templates/articleinfo.html</a>  <font color="blue">������ɣ�</font><br>';

	}else{
		echo '������Ϣҳ��ģ�� <a href="'.$fname.'">/modules/article/templates/articleinfo.html</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
	}
	ob_flush();
	flush();
}

//****************************************
//����ģ��˵�
$fname='../../configs/article/adminmenu.php';
$data=jieqi_readfile($fname);
$printstr='';
if(strpos($data, 'articlelog.php')==false){
	$repstr= '$jieqiAdminmenu[\'article\'][] = array(\'layer\' => \'0\', \'caption\' => \'����ɾ����־\', \'command\'=>JIEQI_URL.\'/modules/article/admin/articlelog.php\', \'power\' => JIEQI_GROUP_GUEST, \'target\' => JIEQI_TARGET_SELF, \'publish\' => \'1\');'."\r\n";

	if(is_writable($fname)){
		$data=str_replace('?>', $repstr.'?>', $data);
		jieqi_writefile($fname, $data);
		$printstr='С˵��̨�˵������ļ� <a href="'.$fname.'">/configs/article/adminmenu.php</a>  <font color="blue">������ɣ�</font><br>';

	}else{
		$printstr='С˵��̨�˵������ļ� <a href="'.$fname.'">/configs/article/adminmenu.php</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
	}
}

if(strpos($data, 'applylist.php')==false){
	$repstr= '$jieqiAdminmenu[\'article\'][] = array(\'layer\' => \'0\', \'caption\' => \'���������¼\', \'command\'=>JIEQI_URL.\'/modules/article/admin/applylist.php\', \'power\' => JIEQI_GROUP_GUEST, \'target\' => JIEQI_TARGET_SELF, \'publish\' => \'1\');'."\r\n";

	if(is_writable($fname)){
		$data=str_replace('?>', $repstr.'?>', $data);
		jieqi_writefile($fname, $data);
		$printstr='С˵��̨�˵������ļ� <a href="'.$fname.'">/configs/article/adminmenu.php</a>  <font color="blue">������ɣ�</font><br>';

	}else{
		$printstr='С˵��̨�˵������ļ� <a href="'.$fname.'">/configs/article/adminmenu.php</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
	}
}

echo $printstr;
ob_flush();
flush();


echo '<br><hr><br><font color="blue">����ִ����ɣ������Թرձ����ڣ�</font>';



// ���ļ�
function jieqi_readfile($file_name){
	if (function_exists("file_get_contents")) {
		return file_get_contents($file_name);
	}else{
		$filenum = @fopen($file_name, "rb");
		@flock($filenum, LOCK_SH);
		$file_data = @fread($filenum, @filesize($file_name));
		@flock($filenum, LOCK_UN);
		@fclose($filenum);
		return $file_data;
	}
}

//д�ļ�
function jieqi_writefile($file_name, &$data, $method = "wb"){
	$filenum = @fopen($file_name, $method);
	if(!$filenum) return false;
	@flock($filenum, LOCK_EX);
	$ret = @fwrite($filenum, $data);
	@flock($filenum, LOCK_UN);
	@fclose($filenum);
	@chmod($file_name, 0777);
	return $ret;
}
?>