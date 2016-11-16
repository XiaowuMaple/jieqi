<?php 
/**
 * ucenter1.5�ӿ�-�û�ע�ᡢ��¼���˳�����
 *
 * ʹ��ucenter�ӿ�ʱ�򣬰ѱ��ļ��ĳ� funuser.php
 * ���ú� /uc_client/config.inc.php �еĲ���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser_ucenter.php 317 2009-01-06 09:03:33Z juny $
 */

include_once(JIEQI_ROOT_PATH.'/uc_client/config.inc.php');
include_once(JIEQI_ROOT_PATH.'/uc_client/client.php');

//�û�ע���ĸ��Ӵ���
function jieqi_registerdo($gourl){
	global $jieqiLang;
	if(strpos($gourl, 'http') === false){
		if($_SERVER['HTTP_HOST'] != '') $gourl='http://'.$_SERVER['HTTP_HOST'].$gourl;
		else $gourl=JIEQI_URL.$gourl;
	}

	$uid = uc_user_register($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email']);
	/*
	if($uid <= 0) {
	if($uid == -1) {
	echo '�û������Ϸ�';
	} elseif($uid == -2) {
	echo '����Ҫ����ע��Ĵ���';
	} elseif($uid == -3) {
	echo '�û����Ѿ�����';
	} elseif($uid == -4) {
	echo 'Email ��ʽ����';
	} elseif($uid == -5) {
	echo 'Email ������ע��';
	} elseif($uid == -6) {
	echo '�� Email �Ѿ���ע��';
	} else {
	echo 'δ����';
	}
	}
	*/
	if($uid > 0) $ucsynlogin = uc_user_synlogin($uid);
	else $ucsynlogin = '';
	jieqi_jumppage($gourl, $jieqiLang['system']['registered_title'], $jieqiLang['system']['register_success'].$ucsynlogin);
}

//�û���½��ĸ��Ӵ���
function jieqi_logindo($gourl){
	global $jieqiLang;
	if(strpos($gourl, 'http') === false){
		if($_SERVER['HTTP_HOST'] != '') $gourl='http://'.$_SERVER['HTTP_HOST'].$gourl;
		else $gourl=JIEQI_URL.$gourl;
	}
	if($_SESSION['jieqiUserGroup']==JIEQI_GROUP_ADMIN) $isadmin=1;
	else $isadmin=0;

	//ͨ���ӿ��жϵ�¼�ʺŵ���ȷ�ԣ�����ֵΪ����
	list($uid, $username, $password, $email) = uc_user_login($_REQUEST['username'], $_REQUEST['password']);
	if($uid == -1){
		$uid = uc_user_register($_REQUEST['username'], $_REQUEST['password'], $_SESSION['jieqiUserEmail']);
	}
/*
	if($uid > 0) {
	//����ͬ����¼�Ĵ���
	$ucsynlogin = uc_user_synlogin($uid);
	echo '��¼�ɹ�'.$ucsynlogin.'<br><a href="'.$_SERVER['PHP_SELF'].'">����</a>';
	exit;
	} elseif($uid == -1) {
	echo '�û�������,���߱�ɾ��';
	} elseif($uid == -2) {
	echo '�����';
	} else {
	echo 'δ����';
	}
*/
	if($uid > 0) $ucsynlogin = uc_user_synlogin($uid);
	else $ucsynlogin = '';
	jieqi_jumppage($gourl,$jieqiLang['system']['logon_title'], sprintf($jieqiLang['system']['login_success'], jieqi_htmlstr($_REQUEST['username'])).$ucsynlogin);
}

//�û��˳���ĸ��Ӵ���
function jieqi_logoutdo($gourl){
	global $jieqiLang;
	if(strpos($gourl, 'http') === false){
		if($_SERVER['HTTP_HOST'] != '') $gourl='http://'.$_SERVER['HTTP_HOST'].$gourl;
		else $gourl=JIEQI_URL.$gourl;
	}
	//����ͬ���˳��Ĵ���
	$ucsynlogout = uc_user_synlogout();
	jieqi_jumppage($gourl, $jieqiLang['system']['logout_title'], $jieqiLang['system']['logout_success'].$ucsynlogout);
}
?>