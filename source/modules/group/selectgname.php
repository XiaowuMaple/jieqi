<?php 
Header("Content-type:text/html;charset=GBK");//����ͷ����ֹ����

//�Σ���chache�˺ܶ�Σ����ҷ�
header('Expires: Wed, 23 Dec 1970 00:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT' );
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');

define('JIEQI_MODULE_NAME', 'group');
require_once('../../global.php');
define(JIEQI_MODULE_NAME,'group');
jieqi_loadlang('selectgname',JIEQI_MODULE_NAME);
$referUrl=$_SERVER['HTTP_REFERER'];//ȡ����һҳ���ַ
$referHost=$_SERVER['HTTP_HOST'];//ȡ�õ�ǰ������
$referFile=explode("/",$referUrl);//ȡ����һǰ���������$referFile[2]

if($referFile[2]!=$referHost)//�����һҳ���뱾����˳�����ͬһ�������ִֹ��
{
	exit;
}

//�������ݾ����ʼ��
require_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/class/group.php');
$group_handler = JieqigroupHandler::getInstance('JieqigroupHandler');
$criteria = new Criteria(gname,trim($_REQUEST['gname']),'=' );
$group_handler->queryObjects($criteria);
$v = $group_handler->getObject();
if($v ){
	echo '<font color=red>'.$jieqiLang['g']['name_already_been_registed'].'</font>';
}
?>