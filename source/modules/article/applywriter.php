<?php 
/**
 * �����Ϊ����
 *
 * ��Ϊ�����ֱ�ӳ�Ϊ���ң����ύ�������ݺ�̨��˳�Ϊ��������ģʽ
 * 
 * ����ģ�壺/modules/article/templates/applywriter.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: applywriter.php 326 2009-02-04 00:26:22Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
jieqi_checklogin();
jieqi_loadlang('applywriter', JIEQI_MODULE_NAME);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');

//��������Ȩ��
if(jieqi_checkpower($jieqiPower['article']['newarticle'], $jieqiUsersStatus, $jieqiUsersGroup, true)) jieqi_printfail($jieqiLang['article']['has_been_writer']);

jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');

if((isset($_REQUEST['action']) && $_REQUEST['action']=='applywriter') || (isset($_REQUEST['agree']) && $_REQUEST['agree']=='1')){
	
	include_once($jieqiModules['article']['path'].'/class/applywriter.php');
	$apply_handler =& JieqiApplywriterHandler::getInstance('JieqiApplywriterHandler');
	$newApply= $apply_handler->create();
	$newApply->setVar('siteid', JIEQI_SITE_ID);
	$newApply->setVar('applytime', JIEQI_NOW_TIME);
	$newApply->setVar('applyuid', $_SESSION['jieqiUserId']);
	$newApply->setVar('applyname', $_SESSION['jieqiUserName']);
	$newApply->setVar('authtime', 0);
	$newApply->setVar('authuid', 0);
	$newApply->setVar('authname', '');
	$newApply->setVar('applytitle', '');
	$newApply->setVar('applytext', $_POST['applytext']);
	$newApply->setVar('applysize', strlen($_POST['applytext']));
	$newApply->setVar('authnote', '');
	if($jieqiConfigs['article']['checkappwriter']==1){
		//��Ҫ���
		$newApply->setVar('applyflag', 0);
		$apply_handler->insert($newApply);
		jieqi_msgwin(LANG_DO_SUCCESS, $jieqiLang['article']['apply_submit_success']);
	}else{
		//����Ҫ���
		include_once(JIEQI_ROOT_PATH.'/class/groups.php');
		jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
		$key=array_search($jieqiConfigs['article']['writergroup'], $jieqiGroups);
		if($key == false) jieqi_printfail($jieqiLang['article']['no_writer_group']);
		elseif($key == JIEQI_GROUP_ADMIN) jieqi_printfail($jieqiLang['article']['no_writer_admin']);
		else{
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
			$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
			$jieqiUsers = $users_handler->get($_SESSION['jieqiUserId']);
			$jieqiUsers->setVar('groupid', $key);
			$_SESSION['jieqiUserGroup'] = $jieqiUsers->getVar('groupid');
			$users_handler->insert($jieqiUsers);
			//�Զ�����ͨ��
			$newApply->setVar('applyflag', 1);
			$apply_handler->insert($newApply);
			jieqi_jumppage($jieqiModules['article']['url'].'/myarticle.php', LANG_DO_SUCCESS, sprintf($jieqiLang['article']['apply_writer_success'], $jieqiConfigs['article']['writergroup']));
		}
	}
}else{
	//��ʾ��������
	include_once(JIEQI_ROOT_PATH.'/header.php');
	$jieqiTpl->setCaching(0);
	$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/applywriter.html';
	include_once(JIEQI_ROOT_PATH.'/footer.php');
}

?>