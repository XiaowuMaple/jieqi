<?php 
/**
 * �û�ע�ᡢ��¼���˳���ش�����
 *
 * �û�ע�ᡢ��¼���˳���ش�����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser.php 243 2008-11-28 02:59:57Z juny $
 */

/**
 * �û�ע���ĸ��Ӵ���
 * 
 * @param      string      $gourl �������ת��ҳ��
 * @param      bool        $jump �Ƿ���ʾ��ת���棬Ĭ����
 * @access     public
 * @return     void
 */
function jieqi_registerdo($gourl, $jump=true){
	global $jieqiLang;
	if($jump) jieqi_jumppage($gourl, $jieqiLang['system']['registered_title'], $jieqiLang['system']['register_success']);
	else header('Location: '.$gourl);
}

/**
 * �û���¼��ĸ��Ӵ���
 * 
 * @param      string      $gourl �������ת��ҳ��
 * @param      bool        $jump �Ƿ���ʾ��ת���棬Ĭ����
 * @access     public
 * @return     void
 */
function jieqi_logindo($gourl, $jump=true){
	global $jieqiLang;
	if($jump) jieqi_jumppage($gourl, $jieqiLang['system']['logon_title'], sprintf($jieqiLang['system']['login_success'], jieqi_htmlstr($_REQUEST['username'])));
	else header('Location: '.$gourl);
}

/**
 * �û��˳���ĸ��Ӵ���
 * 
 * @param      string      $gourl �������ת��ҳ��
 * @param      bool        $jump �Ƿ���ʾ��ת���棬Ĭ����
 * @access     public
 * @return     void
 */
function jieqi_logoutdo($gourl, $jump=true){
	global $jieqiLang;
	if($jump) jieqi_jumppage($gourl, $jieqiLang['system']['logout_title'], $jieqiLang['system']['logout_success']);
	else header('Location: '.$gourl);
}
?>