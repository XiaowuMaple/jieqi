<?php
@set_time_limit(0);
header('Content-type:text/html;charset=gb2312');

if($_GET['confirm'] != 1){
	echo '<font color="red">ע�⣺</font><br>1.6�汾����JAR�����������˷־����ɹ��ܣ����ұ����Ŀ¼�ṹ�����仯���������û�����JAR����Ŀ¼��<br>��Ҫע����Ǳ������������֮ǰ���ɵ�����С˵JAR�������ϣ���°�����ʹ�÷־�����JAR������ֱ��ɾ��֮ǰ��JARĿ¼��Ȼ����վ��̨������������<br><br><a href="'.basename($_SERVER['PHP_SELF']).'?confirm=1">������￪����JARĿ¼</a><br><br>';
	exit;
}

echo '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ';
echo '��ʼ����JARĿ¼�������ĵȴ�...<br>';
ob_flush();
flush();
require_once('../../global.php');
jieqi_getconfigs('article', 'configs');
if(empty($jieqiConfigs['article']['jardir'])) $jieqiConfigs['article']['jardir']='jar';
$dirname = jieqi_uploadpath($jieqiConfigs['article']['jardir'], 'article');
$handle = opendir($dirname);
while (($file = @readdir($handle)) !== false) {
	if($file != '.' && $file != '..' && $file != '.svn' && is_dir($dirname . '/' . $file)){
		echo '<br>'.str_replace(JIEQI_ROOT_PATH, '', $dirname . '/' . $file).'<br>';
		ob_flush();
		flush();
		update_jar($dirname . '/' . $file);
	}
}
echo '<br><font color="red">��ϲ����ȫ������ת����ɣ�</font>';
function  update_jar($dirname){
	$handle = opendir($dirname);
	while (($file = @readdir($handle)) !== false) {
		if($file != '.' && $file != '..' && $file != '.svn'){
			if(preg_match('/^\d+\.(jar|jad)$/is', $file)){
				$id = intval($file);
				jieqi_checkdir($dirname.'/'.$id, true);
				rename($dirname.'/'.$file, $dirname.'/'.$id.'/'.$file);
				echo '. ';
				ob_flush();
				flush();
			}
		}
	}
	@closedir($handle);
	return true;
}
?>