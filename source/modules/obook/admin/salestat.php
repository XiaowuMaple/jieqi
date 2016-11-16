<?php 
/**
 * ����������ͳ��
 *
 * ����������ͳ��
 * 
 * ����ģ�壺/modules/obook/templates/admin/salestat.html
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: salestat.php 326 2009-02-04 00:26:22Z juny $
 */

define('JIEQI_MODULE_NAME', 'obook');
require_once('../../../global.php');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
jieqi_checkpower($jieqiPower['obook']['manageallobook'], $jieqiUsersStatus, $jieqiUsersGroup, false, true);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$obook_static_url = (empty($jieqiConfigs['obook']['staticurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['obook']['staticurl'];
$obook_dynamic_url = (empty($jieqiConfigs['obook']['dynamicurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['obook']['dynamicurl'];

include_once($jieqiModules['obook']['path'].'/class/obook.php');
$obook_handler =& JieqiObookHandler::getInstance('JieqiObookHandler');

include_once(JIEQI_ROOT_PATH.'/admin/header.php');
$jieqiTpl->assign('obook_static_url',$obook_static_url);
$jieqiTpl->assign('obook_dynamic_url',$obook_dynamic_url);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'sort');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'publisher');
//�������
if(empty($_REQUEST['class'])) $_REQUEST['class']=0;
//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
$criteria=new CriteriaCompo();
if(!empty($_REQUEST['keyword'])){
	$_REQUEST['keyword']=trim($_REQUEST['keyword']);
	if($_REQUEST['keytype']==1) $criteria->add(new Criteria('author', $_REQUEST['keyword'], '='));
	elseif($_REQUEST['keytype']==2) $criteria->add(new Criteria('poster', $_REQUEST['keyword'], '='));
	else $criteria->add(new Criteria('obookname', $_REQUEST['keyword'], '='));
}
if(!empty($_REQUEST['class'])){
	$criteria->add(new Criteria('sortid', $_REQUEST['class'], '='));
	$obooktitle=$jieqiSort['obook'][$_REQUEST['class']]['caption'];
}else{
	$obooktitle='';
	if(isset($_REQUEST['publishid'])){
		$criteria->add(new Criteria('publishid', intval($_REQUEST['publishid']), '='));
	}
}
$jieqiTpl->assign('obooktitle', $obooktitle);
$jieqiTpl->assign('url_salestat', $obook_dynamic_url.'/admin/salestat.php');

$publishrows=array();
$k=0;
foreach($jieqiPublisher as $k=>$v){
	$publishrows[$k]['publishid']=$k;
	$publishrows[$k]['publisher']=$v['name'];
	$k++;
}
$jieqiTpl->assign_by_ref('publishrows', $publishrows);

$criteria->setSort('lastupdate');
$criteria->setOrder('DESC');
$criteria->setLimit($jieqiConfigs['obook']['pagenum']);
$criteria->setStart(($_REQUEST['page']-1) * $jieqiConfigs['obook']['pagenum']);
$obook_handler->queryObjects($criteria);
$obookrows=array();
$k=0;
while($v = $obook_handler->getObject()){
	$obookrows[$k]['checkid']=$k;  //��ʾ���
	$obookrows[$k]['obookid']=$v->getVar('obookid');  //�������
	$obookrows[$k]['obookname']=$v->getVar('obookname');  //��������
	if($jieqiConfigs['obook']['fakeinfo']==1){
		$obookrows[$k]['obooksubdir']=jieqi_getsubdir($v->getVar('obookid'));  //��Ŀ¼
		if(!empty($jieqiConfigs['obook']['fakeprefix'])) $tmpvar='/'.$jieqiConfigs['obook']['fakeprefix'].'info';
		else $tmpvar='/files/obook/info';
		$obookrows[$k]['url_obookinfo']=$obook_dynamic_url.$tmpvar.$obookrows[$k]['obooksubdir'].'/'.$v->getVar('obookid').$jieqiConfigs['obook']['fakefile'];  //��Ŀ¼
	}else{
		$obookrows[$k]['obooksubdir']='';
		$obookrows[$k]['url_obookinfo']=$obook_dynamic_url.'/obookinfo.php?id='.$v->getVar('obookid');  //��Ŀ¼
	}
	if($v->getVar('lastchapter')==''){
		$obookrows[$k]['lastchapterid']=0;  //�½����
		$obookrows[$k]['lastchapter']='';  //�½�����
		$obookrows[$k]['url_lastchapter']='';  //�½ڵ�ַ
	}else{
		$obookrows[$k]['lastchapterid']=$v->getVar('lastchapterid');
		$obookrows[$k]['lastchapter']=$v->getVar('lastchapter');
		$obookrows[$k]['url_lastchapter']=$obook_static_url.'/reader.php?aid='.$v->getVar('obookid').'&cid='.$v->getVar('lastchapterid');
	}

	$obookrows[$k]['lastvolume']=$v->getVar('lastvolumeid');  //�־����
	$obookrows[$k]['lastvolume']=$v->getVar('lastvolume');  //�־�����

	$obookrows[$k]['authorid']=$v->getVar('authorid');  //����
	$obookrows[$k]['author']=$v->getVar('author');
	$obookrows[$k]['posterid']=$v->getVar('posterid');  //������
	$obookrows[$k]['poster']=$v->getVar('poster');
	$obookrows[$k]['agentid']=$v->getVar('agentid');  //������
	$obookrows[$k]['agent']=$v->getVar('agent');

	$obookrows[$k]['sortid']=$v->getVar('sortid');  //������
	$obookrows[$k]['sort']=$jieqiSort['obook'][$v->getVar('sortid')]['caption'];  //���
	
	$obookrows[$k]['publishid']=$v->getVar('publishid');  //���������
	$obookrows[$k]['publisher']=$jieqiPublisher[$obookrows[$k]['publishid']]['name'];  //������
	
	$obookrows[$k]['size']=$v->getVar('size');
	$obookrows[$k]['size_k']=ceil($v->getVar('size')/1024);
	$obookrows[$k]['size_c']=ceil($v->getVar('size')/2);
	$obookrows[$k]['daysale']=$v->getVar('daysale');
	$obookrows[$k]['weeksale']=$v->getVar('weeksale');
	$obookrows[$k]['monthsale']=$v->getVar('monthsale');
	$obookrows[$k]['sumegold']=$v->getVar('sumegold');
	$obookrows[$k]['sumesilver']=$v->getVar('sumesilver');
	$obookrows[$k]['sumemoney']=$obookrows[$k]['sumegold']+$obookrows[$k]['sumesilver'];
	$obookrows[$k]['payprice']=$v->getVar('payprice');
	$obookrows[$k]['allsale']=$v->getVar('allsale');
	$obookrows[$k]['lastupdate']=date('y-m-d',$v->getVar('lastupdate')); //����������
	$obookrows[$k]['display']=$v->getVar('display');
	$obookrows[$k]['salestatus']=$v->getSalestatus();
	$k++;
}

$jieqiTpl->assign_by_ref('obookrows', $obookrows);

//����ҳ����ת
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($obook_handler->getCount($criteria),$jieqiConfigs['obook']['pagenum'],$_REQUEST['page']);
$pagelink='';
if(!empty($_REQUEST['class'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='class='.$_REQUEST['class'];
}elseif(isset($_REQUEST['publishid'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='publishid='.$_REQUEST['publishid'];
}
if(!empty($_REQUEST['keyword'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='keyword='.$_REQUEST['keyword'];
	$pagelink.='&keytype='.$_REQUEST['keytype'];
}
if(empty($pagelink)) $pagelink.='?page=';
else $pagelink.='&page=';
$jumppage->setlink($obook_dynamic_url.'/admin/salestat.php'.$pagelink, false, true);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());
$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['obook']['path'].'/templates/admin/salestat.html';
include_once(JIEQI_ROOT_PATH.'/admin/footer.php');

?>