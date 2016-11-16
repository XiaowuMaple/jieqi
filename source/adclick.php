<?php 
/**
 * ������ӻ���
 *
 * ����������ӻ��֣������url��������ת�����ҳ�棬ͬһ������ظ�������Ʒ֣����Ե�¼�û���Ч��
 * 
 * ������ÿ�������Ч����������������첻�Ʒ֡�
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: adclick.php 129 2008-11-19 15:03:17Z juny $
 */

define('JIEQI_MODULE_NAME', 'system');
require_once('global.php');

//����ǵ�½�û����ӻ���
if($jieqiUsersGroup != JIEQI_GROUP_GUEST && is_numeric($_REQUEST['id'])){
	include_once(JIEQI_ROOT_PATH.'/class/users.php');
	$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
	$jieqiUsers = $users_handler->get($_SESSION['jieqiUserId']);
	if(!$jieqiUsers) jieqi_printfail(LANG_NO_USER);
	$userset=unserialize($jieqiUsers->getVar('setting','n'));
	$today=date('Y-m-d');
	jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
	$adclickscore=intval($jieqiConfigs['system']['adclickscore']);  //ÿ�ε������
	$maxadclick=intval($jieqiConfigs['system']['maxadclick']);  //ÿ�����������

	if(isset($userset['addate']) && $userset['addate']==$today && (int)$userset['adnum']>=(int)$maxadclick){
		//�������Ʒִ�����
	}else{
		//�ж��Ƿ��Ѿ��������
		$rightclick=true;
		$_REQUEST['id']=intval($_REQUEST['id']);
		if(empty($_SESSION['jieqiAdClick']) || strlen($_SESSION['jieqiAdClick'])>1024){
			$_SESSION['jieqiAdClick']=$_REQUEST['id'];
		}else{
			if(strpos($_SESSION['jieqiAdClick'], strval($_REQUEST['id'])) === false) $_SESSION['jieqiAdClick'].='|'.$_REQUEST['id'];
			else $rightclick=false;
		}

		//���ӵ������
		if($rightclick){
			if(isset($userset['addate']) && $userset['addate']==$today){
				$userset['adnum']=(int)$userset['adnum']+1;
			}else{
				$userset['addate']=$today;
				$userset['adnum']=1;
			}

			$jieqiUsers->setVar('setting', serialize($userset));
			$jieqiUsers->setVar('score', $jieqiUsers->getVar('score', 'n')+$adclickscore);
			$jieqiUsers->setVar('monthscore', $jieqiUsers->getVar('monthscore', 'n')+$adclickscore);
			$jieqiUsers->setVar('experience', $jieqiUsers->getVar('experience', 'n')+$adclickscore);
			$jieqiUsers->saveToSession();
			$users_handler->insert($jieqiUsers);
		}
	}
}
//�����url��������ת��������url
if(!empty($_REQUEST['url'])) header('Location: '.$_REQUEST['url']);

?>