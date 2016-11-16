<?php
/**
 * �༭һ���������߻ظ�
 *
 * �༭һ���������߻ظ�
 * 
 * ����ģ�壺/modules/article/templates/reviewedit.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: reviewedit.php 330 2009-02-09 16:07:35Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
if(empty($_REQUEST['yid']) || !is_numeric($_REQUEST['yid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_checklogin();
//��ѯ����
jieqi_loadlang('review', JIEQI_MODULE_NAME);
include_once($jieqiModules['article']['path'].'/class/replies.php');
$replies_handler =& JieqiRepliesHandler::getInstance('JieqiRepliesHandler');
$reply = $replies_handler->get($_REQUEST['yid']);
if(!is_object($reply)) jieqi_printfail($jieqiLang['article']['review_not_exists']);

//���Ȩ��
if($reply->getVar('posterid') != $_SESSION['jieqiUserId'] && $jieqi_userstatus != JIEQI_GROUP_ADMIN) jieqi_printfail($jieqiLang['article']['review_notper_edit']);

jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');

if (!isset($_REQUEST['action'])) $_REQUEST['action'] = 'edit';

//���⴦����غ���
include_once(JIEQI_ROOT_PATH.'/include/funpost.php');

switch ($_REQUEST['action']) {
	case 'update':
		//У�������Ϣ����
		$check_errors = array();
		//���͹����ύ����
		$post_set = array('module'=>JIEQI_MODULE_NAME, 'ownerid'=>intval($reply->getVar('ownerid')), 'topicid'=>intval($reply->getVar('topicid')), 'postid'=>intval($reply->getVar('postid')), 'posttime'=>intval($reply->getVar('posttime','n')), 'topictitle'=>&$_POST['ptitle'], 'posttext'=>&$_POST['pcontent'], 'attachment'=>'', 'emptytitle'=>true, 'isnew'=>false, 'istopic'=>intval($reply->getVar('istopic')), 'istop'=>0, 'sname'=>'jieqiArticleReviewTime', 'attachfile'=>'', 'oldattach'=>'', 'checkcode'=>$_POST['checkcode']);
		jieqi_post_checkvar($post_set, $jieqiConfigs['article'], $check_errors);
		
		if(empty($check_errors)) {
			$oldtitle=$reply->getVar('subject', 'n');
			//�������ӱ�
			jieqi_post_upedit($post_set, jieqi_dbprefix('article_replies'));
			//�������������������
			if ($reply->getVar('istopic')==1 &&  $post_set['topictitle'] != $oldtitle){
				jieqi_topic_upedit($post_set, jieqi_dbprefix('article_reviews'));
			}
			jieqi_jumppage($jieqiModules['article']['url'].'/reviewshow.php?rid='.$reply->getVar('topicid', 'n'), LANG_DO_SUCCESS, $jieqiLang['article']['review_edit_success']);
		}else{
			jieqi_printfail(implode('<br />', $check_errors));
		}
		break;
	case 'edit':
	default:
		//��ʾҳ��
		include_once(JIEQI_ROOT_PATH.'/header.php');
		$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
		$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];
		$jieqiTpl->assign('article_static_url',$article_static_url);
		$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
		$jieqiTpl->assign('postid',$reply->getVar('postid'));
		$jieqiTpl->assign('topicid',$reply->getVar('topicid'));
		$jieqiTpl->assign('ownerid',$reply->getVar('ownerid'));
		$jieqiTpl->assign('subject',$reply->getVar('subject','e'));
		$jieqiTpl->assign('posttext',$reply->getVar('posttext','e'));
		//�Ƿ���ʾ��֤��
		if(!isset($jieqiConfigs['system'])) jieqi_getconfigs('system', 'configs');
		$jieqiTpl->assign('postcheckcode', $jieqiConfigs['system']['postcheckcode']);
		$jieqiTpl->setCaching(0);
		$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/reviewedit.html';
		include_once(JIEQI_ROOT_PATH.'/footer.php');
		break;
}
?>