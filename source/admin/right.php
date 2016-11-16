<?php
/**
 * �û�Ȩ������
 *
 * ���ջ��ֺ�ͷ���趨�û�Ȩ������Ȩ��������ָ�Ƿ�����ĳ�����ܣ�Ȩ��������ָ��һ������ǰ�����������Ĳ�ͬ��
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: right.php 332 2009-02-23 09:15:08Z juny $
 */

/**
* ����Ȩ������
*/
if(empty($_REQUEST['mod'])) $_REQUEST['mod']='system';
define('JIEQI_MODULE_NAME', 'system');
require_once('../global.php');

//���Ȩ��
include_once(JIEQI_ROOT_PATH.'/class/power.php');
$power_handler =& JieqiPowerHandler::getInstance('JieqiPowerHandler');
$power_handler->getSavedVars($_REQUEST['mod']);
jieqi_checkpower($jieqiPower[$_REQUEST['mod']]['adminpower'], $jieqiUsersStatus, $jieqiUsersGroup, false, true);

//����Ȩ������
include_once(JIEQI_ROOT_PATH.'/class/right.php');
$right_handler =& JieqiRightHandler::getInstance('JieqiRightHandler');
$right_handler->getSavedVars($_REQUEST['mod']);

//��������
jieqi_loadlang('right', JIEQI_MODULE_NAME);
if(count($jieqiRight[$_REQUEST['mod']])>0){
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='update'){
		foreach($jieqiRight[$_REQUEST['mod']] as $k => $v){
			if(isset($_POST[$k]) && $v['honors'] != $_POST[$k]){
				$jieqiRight[$_REQUEST['mod']][$k]['honors']=$_POST[$k];
				$right_handler->db->query("UPDATE ".jieqi_dbprefix('system_right')." SET rhonors='".jieqi_dbslashes(serialize($_POST[$k]))."' WHERE modname='".jieqi_dbslashes($_REQUEST['mod'])."' AND rname='".jieqi_dbslashes($k)."'");
			}
		}
		jieqi_setconfigs('right', 'jieqiRight', $jieqiRight, $_REQUEST['mod']);
		jieqi_msgwin(LANG_DO_SUCCESS, $jieqiLang['system']['edit_right_success']);
	}else{
		//��ʾȨ������
		include_once(JIEQI_ROOT_PATH.'/admin/header.php');
		include_once(JIEQI_ROOT_PATH.'/lib/html/formloader.php');
		include_once(JIEQI_ROOT_PATH.'/class/honors.php');
		$honors_handler =& JieqiHonorsHandler::getInstance('JieqiHonorsHandler');
		$criteria=new CriteriaCompo();
		$criteria->setSort('minscore');
		$criteria->setOrder('ASC');
		$honors_handler->queryObjects($criteria);
		while($v = $honors_handler->getObject()){
			$tmpvar=$v->getVar('caption');
			$tmpary=explode(' ', $tmpvar);
			$honors[]=array('honorid'=>$v->getVar('honorid'), 'caption'=>$tmpary[0]);
		}
		unset($criteria);
		$right_form = new JieqiThemeForm($jieqiLang['system']['edit_right'], 'right', JIEQI_URL.'/admin/right.php');
		foreach($jieqiRight[$_REQUEST['mod']] as $k => $v){
			$tmpvar='';
			foreach($honors as $honor){
				$right_text = new JieqiFormText($honor['caption'], $k.'['.$honor['honorid'].']', 20, 60, $v['honors'][$honor['honorid']]);
				$tmpvar.=$right_text->getCaption().' '.$right_text->render().'<br />';
			}
			$right_form->addElement(new JieqiFormLabel($v['caption'], $tmpvar));
		}
		$right_form->addElement(new JieqiFormHidden('mod', $_REQUEST['mod']));
		$right_form->addElement(new JieqiFormHidden('action', 'update'));
		$right_form->addElement(new JieqiFormButton('&nbsp;', 'submit', $jieqiLang['system']['save_right'], 'submit'));
		$jieqiTpl->setCaching(0);
		$jieqiTpl->assign('jieqi_contents', '<br />'.$right_form->render(JIEQI_FORM_MIDDLE).'<br />');
		include_once(JIEQI_ROOT_PATH.'/admin/footer.php');

	}
}else{
	jieqi_msgwin(LANG_NOTICE, $jieqiLang['system']['no_usage_right']);
}


?>