<?php 
/**
 * �ҵĵ��������
 *
 * ��ʾ�����Լ��ĵ�����
 * 
 * ����ģ�壺/modules/obook/templates/masterpage.html
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: masterpage.php 326 2009-02-04 00:26:22Z juny $
 */

define('JIEQI_MODULE_NAME', 'obook');
require_once('../../global.php');
jieqi_checklogin();
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'sort');

include_once(JIEQI_ROOT_PATH.'/header.php');

//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;

$obook_static_url = (empty($jieqiConfigs['obook']['staticurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['obook']['staticurl'];
$obook_dynamic_url = (empty($jieqiConfigs['obook']['dynamicurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['obook']['dynamicurl'];
$jieqiTpl->assign('obook_static_url',$obook_static_url);
$jieqiTpl->assign('obook_dynamic_url',$obook_dynamic_url);

//����ѧϵͳ������Ҫ
if(jieqi_getconfigs('article', 'configs')){
	$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['article']['staticurl'];
	$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['article']['dynamicurl'];
	$jieqiTpl->assign('article_static_url',$article_static_url);
	$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
}
//�Ƿ�ʹ��α��̬ҳ��
$jieqiTpl->assign('fakefile', $jieqiConfigs['obook']['fakefile']);
$jieqiTpl->assign('fakeinfo', $jieqiConfigs['obook']['fakeinfo']);

include_once($jieqiModules['obook']['path'].'/class/obook.php');
$obook_handler =& JieqiObookHandler::getInstance('JieqiObookHandler');

$criteria=new CriteriaCompo();
$criteria->add(new Criteria('authorid', $_SESSION['jieqiUserId']), 'OR');
$criteria->add(new Criteria('agentid', $_SESSION['jieqiUserId']), 'OR');
$criteria->add(new Criteria('posterid', $_SESSION['jieqiUserId']), 'OR');
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
	$obookrows[$k]['articleid']=$v->getVar('articleid');  //�������
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
	//�����½�
	if($obookrows[$k]['articleid'] > 0){
		if($jieqiConfigs['article']['makehtml']==0 || JIEQI_CHAR_SET != JIEQI_SYSTEM_CHARSET){
			$obookrows[$k]['url_read'] = $article_static_url.'/reader.php?aid='.$obookrows[$k]['articleid'];
		}else{
			$obookrows[$k]['url_read'] = jieqi_uploadurl($jieqiConfigs['article']['htmldir'], $jieqiConfigs['article']['htmlurl'], 'article', $article_static_url).jieqi_getsubdir($obookrows[$k]['articleid']).'/'.$obookrows[$k]['articleid'].'/index'.$jieqiConfigs['article']['htmlfile'];
		}
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

	$obookrows[$k]['size']=$v->getVar('size');
	$obookrows[$k]['size_k']=ceil($v->getVar('size')/1024);
	$obookrows[$k]['size_c']=ceil($v->getVar('size')/2);
	$obookrows[$k]['daysale']=$v->getVar('daysale');
	$obookrows[$k]['weeksale']=$v->getVar('weeksale');
	$obookrows[$k]['monthsale']=$v->getVar('monthsale');
	$obookrows[$k]['sumegold']=$v->getVar('sumegold');
	$obookrows[$k]['sumesilver']=$v->getVar('sumesilver');
	$obookrows[$k]['sumemoney']=$obookrows[$k]['sumegold']+$obookrows[$k]['sumesilver'];
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
$jumppage->setlink('', true, true);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());

$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['obook']['path'].'/templates/masterpage.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');

?>