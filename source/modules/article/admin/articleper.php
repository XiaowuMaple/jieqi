<?php 
/**
 * ������Ȩ����
 *
 * ������Ȩ����
 * 
 * ����ģ�壺/modules/article/templates/admin/articleper.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: articleper.php 332 2009-02-23 09:15:08Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../../global.php');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
jieqi_checkpower($jieqiPower['article']['manageallarticle'], $jieqiUsersStatus, $jieqiUsersGroup, false, true);
jieqi_loadlang('manage', JIEQI_MODULE_NAME);
jieqi_loadlang('list', JIEQI_MODULE_NAME);
jieqi_loadlang('article', JIEQI_MODULE_NAME);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];

//��Ȩ��������
$jieqiArticlePers=array(0=>$jieqiLang['article']['article_permission_no'], 1=>$jieqiLang['article']['article_permission_yes'], 2=>$jieqiLang['article']['article_permission_insite'], 3=>$jieqiLang['article']['article_permission_special']);

include_once($jieqiModules['article']['path'].'/class/article.php');
$article_handler =& JieqiArticleHandler::getInstance('JieqiArticleHandler');
//����������Ȩ
if(isset($_REQUEST['action']) && !empty($_REQUEST['id'])){
	$criteria=new CriteriaCompo(new Criteria('articleid', $_REQUEST['id']));
	switch($_REQUEST['action']){
		case 'setper':
			$article_handler->updatefields(array('permission'=>intval($_REQUEST['per'])), $criteria);
			break;
	}
	unset($criteria);
}

include_once(JIEQI_ROOT_PATH.'/admin/header.php');
$jieqiTpl->assign('article_static_url',$article_static_url);
$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
jieqi_getconfigs('article', 'sort');
//�������
if(empty($_REQUEST['class'])) $_REQUEST['class']=0;
//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
$criteria=new CriteriaCompo();
if(isset($_REQUEST['keyword'])) $_REQUEST['keyword']=trim($_REQUEST['keyword']);
if(!empty($_REQUEST['keyword'])){
	if($_REQUEST['keytype']==1) $criteria->add(new Criteria('author', $_REQUEST['keyword'], '='));
	elseif($_REQUEST['keytype']==2) $criteria->add(new Criteria('poster', $_REQUEST['keyword'], '='));
	else $criteria->add(new Criteria('articlename', '%'.$_REQUEST['keyword'].'%', 'LIKE'));
}
$articletitle=$jieqiLang['article']['all_article'];
if(!empty($_REQUEST['class'])){
	$criteria->add(new Criteria('sortid', $_REQUEST['class'], '='));
	$articletitle=$jieqiSort['article'][$_REQUEST['class']]['caption'];
}

if(!empty($_REQUEST['display'])){
	switch ($_REQUEST['display']){
		case 'unshow':
			$criteria->add(new Criteria('display', 0, '>'));
			$articletitle=$jieqiLang['article']['no_audit_article'];
			break;
		case 'ready':
			$criteria->add(new Criteria('display', 1, '='));
			$articletitle=$jieqiLang['article']['no_audit_article'];
			break;
		case 'hide':
			$criteria->add(new Criteria('display', 2, '='));
			$articletitle=$jieqiLang['article']['no_audit_article'];
			break;
		case 'show':
			$criteria->add(new Criteria('display', 0, '='));
			$articletitle=$jieqiLang['article']['audit_article'];
			break;
		case 'empty':
			$criteria->add(new Criteria('size', 0, '='));
			$articletitle=$jieqiLang['article']['empty_article'];
			break;
		case 'cool':
			$criteria->add(new Criteria('postdate', time()-3600*24*30, '<'));
			$articletitle=$jieqiLang['article']['cool_article'];
			break;
		default:
			$_REQUEST['display']='';
			break;

	}
}
if(isset($_REQUEST['permission']) && is_numeric($_REQUEST['permission'])) $criteria->add(new Criteria('permission', intval($_REQUEST['permission']), '='));

//������ش�����
include_once($jieqiModules['article']['path'].'/include/funarticle.php');

$jieqiTpl->assign('articletitle', $articletitle);
$jieqiTpl->assign('display', $_REQUEST['display']);

$jieqiTpl->assign('url_article', $jieqiModules['article']['url'].'/admin/articleper.php');
$jieqiTpl->assign('url_batchdel', $article_static_url.'/admin/batchdel.php');
$jieqiTpl->assign('url_jump', jieqi_addurlvars(array()));
$jieqiTpl->assign('checkall', '<input type="checkbox" id="checkall" name="checkall" value="checkall" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ if (this.form.elements[i].name != \'checkkall\') this.form.elements[i].checked = form.checkall.checked; }">');
if($_REQUEST['display']=='cool'){
	$criteria->setSort('allvisit');
	$criteria->setOrder('ASC');
}else{
	$criteria->setSort('lastupdate');
	$criteria->setOrder('DESC');
}
$criteria->setLimit($jieqiConfigs['article']['pagenum']);
$criteria->setStart(($_REQUEST['page']-1) * $jieqiConfigs['article']['pagenum']);
$article_handler->queryObjects($criteria);
$articlerows=array();
$k=0;
while($v = $article_handler->getObject()){
	$articlerows[$k] = jieqi_article_vars($v);
	
	$articlerows[$k]['checkbox']='<input type="checkbox" id="checkid[]" name="checkid[]" value="'.$v->getVar('articleid').'">';  //ѡ���
	$articlerows[$k]['checkid']=$k;  //��ʾ���
	$k++;
}

$jieqiTpl->assign_by_ref('articlerows', $articlerows);
$jieqiTpl->assign_by_ref('articlepers', $jieqiArticlePers);

//����ҳ����ת
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($article_handler->getCount($criteria),$jieqiConfigs['article']['pagenum'],$_REQUEST['page']);
$pagelink='';
if(!empty($_REQUEST['class'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='class='.$_REQUEST['class'];
}elseif(!empty($_REQUEST['display'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='display='.$_REQUEST['display'];
}
if(isset($_REQUEST['permission']) && is_numeric($_REQUEST['permission'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='permission='.intval($_REQUEST['permission']);
}
if(!empty($_REQUEST['keyword'])){
	if(empty($pagelink)) $pagelink.='?';
	else $pagelink.='&';
	$pagelink.='keyword='.$_REQUEST['keyword'];
	$pagelink.='&keytype='.$_REQUEST['keytype'];
}
if(empty($pagelink)) $pagelink.='?page=';
else $pagelink.='&page=';
$jumppage->setlink($jieqiModules['article']['url'].'/admin/articleper.php'.$pagelink, false, true);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());
$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/admin/articleper.html';
include_once(JIEQI_ROOT_PATH.'/admin/footer.php');

?>