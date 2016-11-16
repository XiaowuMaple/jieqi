<?php 
/**
 * �½���̳���
 *
 * �½���̳���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: newforum.php 253 2008-11-28 03:21:13Z juny $
 */

define('JIEQI_MODULE_NAME', 'forum');
require_once('../../../global.php');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
jieqi_checkpower($jieqiPower['forum']['manageforum'], $jieqiUsersStatus, $jieqiUsersGroup, false, true);
jieqi_loadlang('manage', JIEQI_MODULE_NAME);
$_POST['forumname']=trim($_POST['forumname']);
$_POST['forumdesc']=trim($_POST['forumdesc']);
$errtext='';
if(empty($_REQUEST['catid'])) $errtext .= $jieqiLang['forum']['need_select_forumcat'].'<br />';
if(empty($_POST['forumname'])) $errtext .= $jieqiLang['forum']['need_forum_name'].'<br />';
if(empty($_POST['forumorder'])) $_POST['forumorder']=0;
if(empty($errtext)) {
	include_once(JIEQI_ROOT_PATH.'/admin/header.php');
    include_once($jieqiModules['forum']['path'].'/class/forums.php');
    $forums_handler=JieqiForumsHandler::getInstance('JieqiForumsHandler');
	$newforum = $forums_handler->create();
	$newforum->setVar('catid', $_REQUEST['catid']);
	$newforum->setVar('forumname', $_POST['forumname']);
	$newforum->setVar('forumdesc', $_POST['forumdesc']);
	$newforum->setVar('forumstatus', 0);
	$newforum->setVar('forumorder', $_POST['forumorder']);
	$newforum->setVar('forumtopics', 0);
	$newforum->setVar('forumtopics', 0);
	$newforum->setVar('forumlastinfo', '');
	$newforum->setVar('authview', '');
	$newforum->setVar('authread', '');
	$newforum->setVar('authpost', '');
	$newforum->setVar('authreply', '');
	$newforum->setVar('authupload', '');
	$newforum->setVar('authedit', '');
	$newforum->setVar('authdelete', '');
	$newforum->setVar('master', '');
    if(!($forums_handler->insert($newforum)))  jieqi_printfail($jieqiLang['forum']['add_forum_failure']);
    else{
    	include_once($jieqiModules['forum']['path'].'/include/upforumset.php');  //���������ļ�
    	jieqi_jumppage($jieqiModules['forum']['url'].'/admin/forumlist.php', LANG_DO_SUCCESS, $jieqiLang['forum']['add_forum_success']);
    }
}else{
	jieqi_printfail($errtext);
}
?>