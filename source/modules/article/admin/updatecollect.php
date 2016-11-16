<?php
/**
 * �ɼ�ʱ�����״̬�ж�
 *
 * �ɼ�ʱ�����״̬�ж�
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: updatecollect.php 332 2009-02-23 09:15:08Z juny $
 */

define('JIEQI_USE_GZIP','0');
define('JIEQI_MODULE_NAME', 'article');
require_once('../../../global.php');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
//��������Ȩ��
jieqi_checkpower($jieqiPower['article']['newarticle'], $jieqiUsersStatus, $jieqiUsersGroup, false);
@set_time_limit(0);
@session_write_close();
if(empty($_REQUEST['siteid']) || empty($_REQUEST['fromid']) || empty($_REQUEST['toid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_loadlang('collect', JIEQI_MODULE_NAME);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];
include_once($jieqiModules['article']['path'].'/include/collectarticle.php');
//0 ��ʼ״̬ 1 �ɼ���� 2 ����Ҫ�ɼ� 3 �ɼ�ʧ�� 4 ��Ҫ�ɼ����Ƕ�Ӧ����
if($retflag==1){
	jieqi_getcachevars('article', 'articleuplog');
	if(!is_array($jieqiArticleuplog)) $jieqiArticleuplog=array('articleuptime'=>0, 'chapteruptime'=>0);
	$jieqiArticleuplog['articleuptime']=JIEQI_NOW_TIME;
	$jieqiArticleuplog['chapteruptime']=JIEQI_NOW_TIME;
	jieqi_setcachevars('articleuplog', 'jieqiArticleuplog', $jieqiArticleuplog, 'article');
	jieqi_jumppage($article_static_url.'/articlemanage.php?id='.$_REQUEST['toid'], LANG_DO_SUCCESS, $jieqiLang['article']['update_collect_success']);
}elseif($retflag==2){
	include_once(JIEQI_ROOT_PATH.'/admin/header.php');
	$jieqiTpl->assign('jieqi_contents', '<br />'.jieqi_msgbox(LANG_DO_SUCCESS, sprintf($jieqiLang['article']['collect_no_update'], jieqi_geturl('article', 'article', $_REQUEST['toid'], 'info'), $article_static_url.'/articleclean.php?id='.$_REQUEST['toid'].'&collecturl='.urlencode($article_static_url.'/admin/updatecollect.php?siteid='.$_REQUEST['siteid'].'&fromid='.$_REQUEST['fromid'].'&toid='.$_REQUEST['toid']), $article_static_url.'/admin/collect.php')).'<br />');
	include_once(JIEQI_ROOT_PATH.'/admin/footer.php');
}elseif($retflag==4){
	include_once(JIEQI_ROOT_PATH.'/admin/header.php');
	$errchapter='';
	foreach ($retchapinfo as $v){
		$errchapter.=$v['fchapter'].' => '.$v['tchapter'].'<br />';
	}
	$jieqiTpl->assign('jieqi_contents', '<br />'.jieqi_msgbox(LANG_DO_SUCCESS, sprintf($jieqiLang['article']['collect_cant_update'], $errchapter, $article_static_url.'/articlemanage.php?id='.$_REQUEST['toid'], $article_static_url.'/articleclean.php?id='.$_REQUEST['toid'].'&collecturl='.urlencode($article_static_url.'/admin/updatecollect.php?siteid='.$_REQUEST['siteid'].'&fromid='.$_REQUEST['fromid'].'&toid='.$_REQUEST['toid']), $article_static_url.'/admin/collect.php')).'<br />');
	include_once(JIEQI_ROOT_PATH.'/admin/footer.php');
}
?>