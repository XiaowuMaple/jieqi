<?php 
/**
 * վ�ڶ���Ϣ������
 *
 * վ�ڶ���Ϣ������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funmessage.php 243 2008-11-28 02:59:57Z juny $
 */

/**
 * ����վ�ڶ���Ϣ
 * 
 * @param      int         $uid �����û�id
 * @param      string      $uname �����û���
 * @param      string      $title ����Ϣ����
 * @param      string      $msg ����Ϣ����
 * @access     public
 * @return     bool
 */
function jieqi_sendmessage($uid, $uname, $title, $msg){
	include_once(JIEQI_ROOT_PATH.'/class/message.php');
	$message_handler =& JieqiMessageHandler::getInstance('JieqiMessageHandler');
	$newMessage= $message_handler->create();
	$newMessage->setVar('siteid', JIEQI_SITE_ID);
	$newMessage->setVar('postdate', JIEQI_NOW_TIME);
	$newMessage->setVar('fromid', 0);
	$newMessage->setVar('fromname', $_SESSION['jieqiUserName']);
	$newMessage->setVar('toid', $uid);
	$newMessage->setVar('toname', $uname);
	$newMessage->setVar('title', $title);
	$newMessage->setVar('content', $msg);
	$newMessage->setVar('messagetype', 0);
	$newMessage->setVar('isread', 0);
	$newMessage->setVar('fromdel', 0);
	$newMessage->setVar('todel', 0);
	$newMessage->setVar('enablebbcode', 1);
	$newMessage->setVar('enablehtml', 0);
	$newMessage->setVar('enablesmilies', 1);
	$newMessage->setVar('attachsig', 0);
	$newMessage->setVar('attachment', 0);
	if(!$message_handler->insert($newMessage)) return true;
	else return false;
}

?>