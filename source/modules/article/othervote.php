<?php
define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
if(empty($_REQUEST['id'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_checklogin();
jieqi_loadlang('vote', JIEQI_MODULE_NAME);
include_once(JIEQI_ROOT_PATH.'/class/users.php');
$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
$jieqiUsers = $users_handler->get($_SESSION['jieqiUserId']);
$jieqiUsers->vars['flower']['value'];//�û��ʻ�����
$jieqiUsers->vars['egg']['value'];//�û���������
if(!$jieqiUsers) jieqi_printfail(LANG_NO_USER);
$userset=unserialize($jieqiUsers->getVar('setting','n'));
if(!in_array($_GET['type'],array('flower','egg'))){
	jieqi_jumppage('/modules/article/articleinfo.php?id='.$_REQUEST[id], '���ӷǷ���', '<font color="blue">������ת�����Ժ�...</font>');exit;
}
$year = date("Y");$month = date("m");$day = date("d");
$nowtime = time();
$begintime = mktime(0,0,0,$month,$day,$year);
$endtime = mktime(23,59,59,$month,$day,$year);
if($_GET['type'] == 'flower'){
	$type = '1';
	$typename = '�ʻ�';
	$havenums = $jieqiUsers->vars['flower']['value'];
}else{
	$type = '2';
	$typename = '����';
	$havenums = $jieqiUsers->vars['egg']['value'];
}

$result = mysql_query("SELECT count(id) as t FROM `jieqi_go123_othervote` WHERE `uid` = '$_SESSION[jieqiUserId]' AND `dateline` > '$begintime' AND `dateline` < '$endtime' AND `type` = '$type'");
while($results = mysql_fetch_array($result,1)){
	$yijing = $results['t']+1;
}
if($havenums<1){
	jieqi_jumppage('/modules/article/jifen.php', '����'.$typename.'�Ѿ����꣡', '<font color="blue">������ת���һ����ģ����Ժ�...</font>');exit;
}
mysql_query("INSERT INTO `jieqi_go123_othervote` SET `uid` = '$_SESSION[jieqiUserId]',`articleid` = '$_REQUEST[id]',`type` = '$type', `dateline` = '$nowtime';");
mysql_query("UPDATE `jieqi_article_article` SET `".$_GET[type]."` = `".$_GET[type]."`+1 WHERE `articleid` = '$_REQUEST[id]';");
mysql_query("UPDATE `jieqi_system_users` SET `".$_GET[type]."` = `".$_GET[type]."`-1 WHERE `uid` = '$_SESSION[jieqiUserId]'");
jieqi_jumppage('/modules/article/articleinfo.php?id='.$_REQUEST[id], '��ϲ��Ͷ'.$typename.'�ɹ��������������'.$yijing.'��Ͷ'.$typename.'Ʊ', '<font color="blue">������ת�����Ժ�...</font>');