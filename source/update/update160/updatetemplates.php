<?php
@set_time_limit(3600);
header('Content-type:text/html;charset=gb2312');

if($_GET['confirm'] != 1){
	echo '<font color="red">ע�⣺</font><br>���������ڸ���ģ���ϵͳ�����ļ����ʺϴ�1.5x�汾������1.60�档<br>����ǰ�뱸�ݺ����¼���Ŀ¼����ȷ����ЩĿ¼����Ŀ¼�����ݿ�д��<br>/configs<br>/themes<br>/templates<br>/modules/article/templates<br>/modules/forum/templates<br><br><a href="'.basename($_SERVER['PHP_SELF']).'?confirm=1">������￪ʼ����ģ�������</a><br><br>';
	exit;
}

include_once '../../configs/define.php';

echo '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ';

echo '<hr>���ڸ���ģ��...<br>';
ob_flush();
flush();

//���ϵͳ����Щ����
$modary=array();
$dirname='../../modules';
if(is_dir($dirname)){
	$handle = @opendir($dirname);
	while ($file = @readdir($handle)) {
		if($file[0] != '.'){
			$modary[]=$file;
		}
	}
	@closedir($handle);
}
$modstr=implode('|',$modary);

//����ͨ��ģ��

//����theme���ģ��
prep_dirhtml('../../themes', 'update_css', array('.css'));
//���������ļ�
update_configs();
//��ջ���
jieqi_delfolder('../../blockcache', false);
jieqi_delfolder('../../cache', false);
echo '<br><hr><br><font color="blue">����ִ����ɣ������Թرձ����ڣ�</font>';


//����Ŀ¼���ļ���ִ�и��º���
function prep_dirhtml($dirname, $funname, $ftypes=array('.html')){
	if(is_dir($dirname) && function_exists($funname)){
		$handle = @opendir($dirname);
		while ($file = @readdir($handle)) {
			if($file[0] != '.'){
				if (is_dir($dirname.'/'.$file)){
					prep_dirhtml($dirname.'/'.$file, $funname, $ftypes);
				}else{
					$postfix = strrchr(trim(strtolower($file)),".");
					if(in_array($postfix, $ftypes)){
						$fname=$dirname.'/'.$file;
						$funname($fname);
					}
				}
			}
		}
		@closedir($handle);
	}
}

//����css�ļ�
function update_css($fname){
	global $modstr;
	//����css
	if(strtolower(basename($fname)) == 'style.css'){
		if(is_writable($fname)){
			$data=jieqi_readfile($fname);
			$old_data=$data;

			if(strpos($data, '.ajaxtip') === false) $data .= "\r\n".'.ajaxtip{
	position:absolute;
	border: 1px solid #a3bee8;
	background: #f0f7ff;
	color: #ff0000;
	font-size: 12px;
	line-height:120%;
	padding: 3px;
	z-index:1000;
}';
			if(strpos($data, '#tips') === false) $data .= "\r\n".'#tips {
	border: 1px solid #a3bee8;
	padding: 3px;
	display: none;
	background: #f0f7ff;
	position: absolute;
	z-index: 2000;
}';
			if(strpos($data, '#dialog') === false) $data .= "\r\n".'#dialog{
	position:absolute;
	top:0px;
	left:0px;
	border: 5px solid #8bcee4;
	background: #f1f5fa;
	font-size: 12px;
	line-height:120%;
	padding: 20px 10px 10px 10px;
	visibility: hidden;
}';
			if(strpos($data, '#mask') === false) $data .= "\r\n".'#mask{
	position:absolute;
	top:0px;
	left:0px;
	background: #777777;
	filter: Alpha(opacity=30);
	opacity: 0.3;
}';
			if(strpos($data, '.avatar') === false) $data .= "\r\n".'img.avatar{
	border: 0px;
}';
			if(strpos($data, 'avatars') === false) $data .= "\r\n".'img.avatars{
	border: 1px solid #dddddd;
}';
			
			if($old_data != $data){
				jieqi_writefile($fname, $data);
				echo '<br>CSS <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="blue">������ɣ�</font><br>';
			}else{
				echo '. ';
			}
		}else{
			echo '<br>CSS <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
	}
	ob_flush();
	flush();
}

//��������ļ��滻
function update_configs(){
	//ϵͳģ��
	$i=0;
	$tmpchange[$i]['tmpfile']=array('configs/adminmenu.php', 'configs/article/adminmenu.php', 'configs/forum/adminmenu.php', 'configs/obook/adminmenu.php');
	$tmpchange[$i]['repfrom']=array('\'layer\' => \'0\'', ', \'power\' => JIEQI_GROUP_GUEST', 'JIEQI_TARGET_SELF', '\'publish\' => \'1\'');
	$tmpchange[$i]['repto']=array('\'layer\' => 0', '', '0', '\'publish\' => 1');

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
						echo '�����ļ�<a href="'.$filename.'">'.$f.'</a> <font color="blue">������ɣ�</font><br>';
					}else{
						echo '�����ļ�<a href="'.$filename.'">'.$f.'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
					}
					ob_flush();
					flush();
				}
			}
		}
	}

	//**********************************
	$fname='../../configs/adminmenu.php';
	$data=jieqi_readfile($fname);
	if(strpos($data, 'managemodules.php')==false){
		$repstr= '$jieqiAdminmenu[\'system\'][] = array(\'layer\' => 0, \'caption\' => \'�û�����\', \'command\'=>JIEQI_URL.\'/admin/reportlist.php\', \'target\' => 0, \'publish\' => 1);'."\r\n";
		if(is_writable($fname)){
			$data=str_replace('?>', $repstr.'?>', $data);
			jieqi_writefile($fname, $data);
			echo '�����ļ� <a href="'.$fname.'">'.substr($fname, 5).'</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo '�����ļ� <a href="'.$fname.'">'.substr($fname, 5).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
		ob_flush();
		flush();
	}
	
	//**********************************
	$fname='../../configs/adminmenu.php';
	$data=jieqi_readfile($fname);
	if(strpos($data, 'dbmanage.php')==false){
		$repstr= '$jieqiAdminmenu[\'database\'][] = array(\'layer\' => 0, \'caption\' => \'���ݿⱸ��\', \'command\'=>JIEQI_URL.\'/admin/dbmanage.php?option=export\', \'target\' => 0, \'publish\' => 1);

$jieqiAdminmenu[\'database\'][] = array(\'layer\' => 0, \'caption\' => \'���ݿ�ָ�\', \'command\'=>JIEQI_URL.\'/admin/dbmanage.php?option=import\', \'target\' => 0, \'publish\' => 1);'."\r\n";
		if(is_writable($fname)){
			$data=str_replace('?>', $repstr.'?>', $data);
			jieqi_writefile($fname, $data);
			echo '�����ļ� <a href="'.$fname.'">'.substr($fname, 5).'</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo '�����ļ� <a href="'.$fname.'">'.substr($fname, 5).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
		ob_flush();
		flush();
	}
	
	//**********************************
	$fname='../../configs/article/adminmenu.php';
	$data=jieqi_readfile($fname);
	if(strpos($data, 'batchclean.php')==false){
		$repstr= '$jieqiAdminmenu[\'article\'][] = array(\'layer\' => 0, \'caption\' => \'������������\', \'command\'=>$GLOBALS[\'jieqiModules\'][\'article\'][\'url\'].\'/admin/batchclean.php\', \'target\' => 0, \'publish\' => 1);'."\r\n";
		if(is_writable($fname)){
			$data=str_replace('?>', $repstr.'?>', $data);
			jieqi_writefile($fname, $data);
			echo '�����ļ� <a href="'.$fname.'">'.substr($fname, 5).'</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo '�����ļ� <a href="'.$fname.'">'.substr($fname, 5).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
		ob_flush();
		flush();
	}
}

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

//���ַ���ת��Ϊhtm��ʽ
function jieqi_htmlstr($str, $quote_style=ENT_QUOTES){
	$str = htmlspecialchars($str, $quote_style);
	$str = nl2br($str);
	$str = str_replace("  ", "&nbsp;&nbsp;", $str);
	$str = preg_replace("/&amp;#(\d+);/isU", "&#\\1;", $str);
	return $str;
}

function jieqi_delfolder($dirname, $flag = true){
	$dirname = trim($dirname);
	$matches = array();
		$handle = @opendir($dirname);
		while (($file = @readdir($handle)) !== false) {
			if($file != '.' && $file != '..'){
				if (is_dir($dirname . DIRECTORY_SEPARATOR . $file)){
					jieqi_delfolder($dirname . DIRECTORY_SEPARATOR . $file, true);
				}else{
					@unlink($dirname . DIRECTORY_SEPARATOR . $file);
				}
			}
		}
		@closedir($handle);
		if ($flag) @rmdir($dirname);
		return true;

}
?>