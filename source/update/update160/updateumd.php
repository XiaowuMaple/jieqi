<?php
@set_time_limit(0);
header('Content-type:text/html;charset=gb2312');

if($_GET['confirm'] != 1){
	echo '<font color="red">ע�⣺</font><br>1.6�汾����UMD�����������˷־����ɹ��ܣ����ұ����Ŀ¼�ṹ�����仯���������û�����UMD����Ŀ¼��<br>��Ҫע����Ǳ������������֮ǰ���ɵ�����С˵UMD�������ϣ���°�����ʹ�÷־�����UMD������ֱ��ɾ��֮ǰ��UMDĿ¼��Ȼ����վ��̨������������<br><br><a href="'.basename($_SERVER['PHP_SELF']).'?confirm=1">������￪����UMDĿ¼</a><br><br>';
	exit;
}

echo '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ';
echo '��ʼ����UMDĿ¼�������ĵȴ�...<br>';
ob_flush();
flush();
require_once('../../global.php');
jieqi_getconfigs('article', 'configs');
if(empty($jieqiConfigs['article']['umddir'])) $jieqiConfigs['article']['umddir']='umd';
$dirname = jieqi_uploadpath($jieqiConfigs['article']['umddir'], 'article');
$handle = opendir($dirname);
while (($file = @readdir($handle)) !== false) {
	if($file != '.' && $file != '..' && $file != '.svn' && is_dir($dirname . '/' . $file)){
		echo '<br>'.str_replace(JIEQI_ROOT_PATH, '', $dirname . '/' . $file).'<br>';
		ob_flush();
		flush();
		update_umd($dirname . '/' . $file);
	}
}
echo '<br><font color="red">��ϲ����ȫ������ת����ɣ�</font>';
function  update_umd($dirname){
	$handle = opendir($dirname);
	while (($file = @readdir($handle)) !== false) {
		if($file != '.' && $file != '..' && $file != '.svn'){
			if(preg_match('/^\d+\.(umd)$/is', $file)){
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