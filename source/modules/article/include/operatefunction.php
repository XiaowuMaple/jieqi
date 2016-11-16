<?php
/**
 * ɾ�����¡��½�ʱ���ͨ�ú���
 *
 * ɾ�����¡��½�ʱ���ͨ�ú���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: operatefunction.php 330 2009-02-09 16:07:35Z juny $
 */

if(!defined('JIEQI_ROOT_PATH')) exit;

include_once($jieqiModules['article']['path'].'/class/article.php');
if(!isset($article_handler)) $article_handler =& JieqiArticleHandler::getInstance('JieqiArticleHandler');
include_once($jieqiModules['article']['path'].'/class/package.php');
include_once($jieqiModules['article']['path'].'/class/chapter.php');
if(!isset($chapter_handler)) $chapter_handler =& JieqiChapterHandler::getInstance('JieqiChapterHandler');

jieqi_getcachevars('article', 'articleuplog');
if(!is_array($jieqiArticleuplog)) $jieqiArticleuplog=array('articleuptime'=>0, 'chapteruptime'=>0);
if(!isset($jieqiConfigs['article'])) jieqi_getconfigs('article', 'configs');
$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];

function jieqi_article_delete($aid, $usescore = true){
	global $jieqiModules;
	global $article_handler;
	global $chapter_handler;
	global $jieqiArticleuplog;
	global $jieqiConfigs;
	global $jieqi_file_postfix;

	$article=$article_handler->get($aid);
	if(!is_object($article)) return false;

	//ɾ������
	$article_handler->delete($aid);
	//������������
	$jieqiArticleuplog['articleuptime']=JIEQI_NOW_TIME;
	jieqi_setcachevars('articleuplog', 'jieqiArticleuplog', $jieqiArticleuplog, 'article');
	//ɾ���ı���html��zip
	$package=new JieqiPackage($aid);
	$package->delete();
	//ɾ���½�
	//�����ƪ�����½ڷ����ˣ��ۻ�����
	if($usescore){
		$posterary=array();
		if(!empty($jieqiConfigs['article']['scorechapter'])){
			$criteria0=new CriteriaCompo(new Criteria('articleid', $aid, '='));
			$chapter_handler->queryObjects($criteria0);
			while($chapterobj = $chapter_handler->getObject()){
				$posterid = intval($chapterobj->getVar('posterid'));
				if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorechapter'];
				else  $posterary[$posterid] = $jieqiConfigs['article']['scorechapter'];
			}
			unset($criteria0);
		}
	}

	//����ɾ���½�
	$criteria=new CriteriaCompo(new Criteria('articleid', $aid, '='));
	$chapter_handler->delete($criteria);
	//ɾ������
	include_once($jieqiModules['article']['path'].'/class/articleattachs.php');
	$attachs_handler =& JieqiArticleattachsHandler::getInstance('JieqiArticleattachsHandler');
	$attachs_handler->delete($criteria);
	//ɾ������
	$criteria1=new CriteriaCompo(new Criteria('ownerid', $aid, '='));
	include_once($jieqiModules['article']['path'].'/class/reviews.php');
	$reviews_handler =& JieqiReviewsHandler::getInstance('JieqiReviewsHandler');
	$reviews_handler->delete($criteria1);
	include_once($jieqiModules['article']['path'].'/class/replies.php');
	$replies_handler =& JieqiRepliesHandler::getInstance('JieqiRepliesHandler');
	$replies_handler->delete($criteria1);
	/*
	include_once($jieqiModules['article']['path'].'/class/review.php');
	$review_handler =& JieqiReviewHandler::getInstance('JieqiReviewHandler');
	$review_handler->delete($criteria);
	*/
	//ɾ������
	$imagedir=jieqi_uploadpath($jieqiConfigs['article']['imagedir'], 'article').jieqi_getsubdir($aid).'/'.$aid;
	if(is_dir($imagedir)) jieqi_delfolder($imagedir, true);

	//��¼ɾ����־
	include_once($jieqiModules['article']['path'].'/class/articlelog.php');
	$articlelog_handler =& JieqiArticlelogHandler::getInstance('JieqiArticlelogHandler');
	$newlog=$articlelog_handler->create();
	$newlog->setVar('siteid', JIEQI_SITE_ID);
	$newlog->setVar('logtime', JIEQI_NOW_TIME);
	$newlog->setVar('userid', $_SESSION['jieqiUserId']);
	$newlog->setVar('username', $_SESSION['jieqiUserName']);
	$newlog->setVar('articleid', $article->getVar('articleid', 'n'));
	$newlog->setVar('articlename', $article->getVar('articlename', 'n'));
	$newlog->setVar('chapterid', 0);
	$newlog->setVar('chaptername', '');
	$newlog->setVar('reason', '');
	$newlog->setVar('chginfo', $jieqiLang['article']['delete_article']);
	$newlog->setVar('chglog', '');
	$newlog->setVar('ischapter', '0');
	$newlog->setVar('isdel', '1');
	$newlog->setVar('databak', serialize($article->getVars()));
	$articlelog_handler->insert($newlog);

	//�������º��½ڻ���
	if($usescore){
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
		if(!empty($jieqiConfigs['article']['scorearticle'])){
			$posterid = intval($article->getVar('posterid'));
			if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorearticle'];
			else  $posterary[$posterid] = $jieqiConfigs['article']['scorearticle'];
		}
		foreach($posterary as $pid=>$pscore){
			$users_handler->changeScore($pid, $pscore, false);
		}
	}
	return $article;
}

//���������½�
function jieqi_article_clean($aid, $usescore = false){
	global $jieqiModules;
	global $article_handler;
	global $chapter_handler;
	global $jieqiArticleuplog;
	global $jieqiConfigs;

	$article=$article_handler->get($aid);
	if(!is_object($article)) return false;

	//�������ͳ��
	$criteria = new CriteriaCompo(new Criteria('article', $aid));
	$fields=array('lastchapter'=>'', 'lastchapterid'=>0, 'lastvolume'=>'', 'lastvolumeid'=>0, 'chapters'=>0, 'size'=>0);
	$article_handler->updatefields($fields, $criteria);

	//������������
	$jieqiArticleuplog['articleuptime']=JIEQI_NOW_TIME;
	$jieqiArticleuplog['chapteruptime']=JIEQI_NOW_TIME;
	jieqi_setcachevars('articleuplog', 'jieqiArticleuplog', $jieqiArticleuplog, 'article');

	//ɾ���ı���html��zip
	$package=new JieqiPackage($_REQUEST['id']);
	$package->delete();
	$package->initPackage(array('id'=>$article->getVar('articleid','n'), 'title'=>$article->getVar('articlename', 'n'), 'creatorid'=>$article->getVar('authorid','n'), 'creator'=>$article->getVar('author','n'), 'subject'=>$article->getVar('keywords','n'), 'description'=>$article->getVar('intro', 'n'), 'publisher'=>JIEQI_SITE_NAME, 'contributorid'=>$article->getVar('posterid', 'n'), 'contributor'=>$article->getVar('poster', 'n'), 'sortid'=>$article->getVar('sortid', 'n'), 'typeid'=>$article->getVar('typeid', 'n'), 'articletype'=>$article->getVar('articletype', 'n'), 'permission'=>$article->getVar('permission', 'n'), 'firstflag'=>$article->getVar('firstflag', 'n'), 'fullflag'=>$article->getVar('fullflag', 'n'), 'imgflag'=>$article->getVar('imgflag', 'n'), 'power'=>$article->getVar('power', 'n'), 'display'=>$article->getVar('display', 'n')));

	//ɾ���½�

	//�����ƪ�����½ڷ����ˣ��ۻ�����
	if($usescore){
		$posterary=array();
		if(!empty($jieqiConfigs['article']['scorechapter'])){
			$criteria0=new CriteriaCompo(new Criteria('articleid', $aid, '='));
			$chapter_handler->queryObjects($criteria0);
			while($chapterobj = $chapter_handler->getObject()){
				$posterid = intval($chapterobj->getVar('posterid'));
				if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorechapter'];
				else  $posterary[$posterid] = $jieqiConfigs['article']['scorechapter'];
			}
			unset($criteria0);
		}
	}

	//����ɾ���½�
	$criteria=new CriteriaCompo(new Criteria('articleid', $aid, '='));
	$chapter_handler->delete($criteria);
	//ɾ������
	include_once($jieqiModules['article']['path'].'/class/articleattachs.php');
	$attachs_handler =& JieqiArticleattachsHandler::getInstance('JieqiArticleattachsHandler');
	$attachs_handler->delete($criteria);

	//�������º��½ڻ���
	if($usescore){
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
		if(!empty($jieqiConfigs['article']['scorearticle'])){
			$posterid = intval($article->getVar('posterid'));
			if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorearticle'];
			else  $posterary[$posterid] = $jieqiConfigs['article']['scorearticle'];
		}
		foreach($posterary as $pid=>$pscore){
			$users_handler->changeScore($pid, $pscore, false);
		}
	}
	return $article;
}

//����һ������������½�
function jieqi_article_delchapter($aid, $criteria, $usescore = false){
	global $jieqiModules;
	global $article_handler;
	global $chapter_handler;
	global $jieqiArticleuplog;
	global $jieqiConfigs;

	if(!is_object($criteria)) return false;
	$criteria->add(new Criteria('articleid', intval($aid)));
	$article=$article_handler->get($aid);
	if(!is_object($article)) return false;

	//��ѯ���������½�
	$posterary=array();
	$chapter_handler->queryObjects($criteria);
	$chapterary = array();
	$k = 0;
	$cids = '';
	while($chapterobj = $chapter_handler->getObject()){
		$chapterary[$k]['id'] = intval($chapterobj->getVar('chapterid'));
		if($cids != '') $cids .= ',';
		$cids .= $chapterary[$k]['id'];
		$chapterary[$k]['size'] = $chapterobj->getVar('size');
		$chapterary[$k]['attach'] = $chapterobj->getVar('attachment', 'n') == '' ? 0 : 1;

		$k++;
		if(!empty($jieqiConfigs['article']['scorechapter'])){
			$posterid = intval($chapterobj->getVar('posterid'));
			if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorechapter'];
			else  $posterary[$posterid] = $jieqiConfigs['article']['scorechapter'];
		}
	}
	//ɾ���½�
	$chapter_handler->delete($criteria);

	//ɾ���������ݿ�
	if($cids != ''){
		$criteria1 = new CriteriaCompo();
		$criteria1->add(new Criteria('chapterid', '('.$cids.')', 'IN'));
		include_once($jieqiModules['article']['path'].'/class/articleattachs.php');
		$attachs_handler =& JieqiArticleattachsHandler::getInstance('JieqiArticleattachsHandler');
		$attachs_handler->delete($criteria1);
	}
	//ɾ���ı��ļ��������ļ���html
	$txtdir = jieqi_uploadpath($jieqiConfigs['article']['txtdir'], 'article').jieqi_getsubdir($aid).'/'.$aid;
	$htmldir = jieqi_uploadpath($jieqiConfigs['article']['htmldir'], 'article').jieqi_getsubdir($aid).'/'.$aid;
	$attachdir = jieqi_uploadpath($jieqiConfigs['article']['attachdir'], 'article').jieqi_getsubdir($aid).'/'.$aid;
	foreach($chapterary as $c){
		if(is_file($txtdir.'/'.$c['id'].$jieqi_file_postfix['txt'])) jieqi_delfile($txtdir.'/'.$c['id'].$jieqi_file_postfix['txt']);
		if(is_file($htmldir.'/'.$c['id'].$jieqiConfigs['article']['htmlfile'])) jieqi_delfile($htmldir.'/'.$c['id'].$jieqiConfigs['article']['htmlfile']);
		if(is_dir($attachdir.'/'.$c['id'])) jieqi_delfolder($attachdir.'/'.$c['id']);
	}
	//����������ҳ�ʹ��
	include_once($jieqiModules['article']['path'].'/include/repack.php');
	$ptypes=array('makeopf'=>1, 'makehtml'=>$jieqiConfigs['article']['makehtml'], 'makezip'=>$jieqiConfigs['article']['makezip'], 'makefull'=>$jieqiConfigs['article']['makefull'], 'maketxtfull'=>$jieqiConfigs['article']['maketxtfull'], 'makeumd'=>$jieqiConfigs['article']['makeumd'], 'makejar'=>$jieqiConfigs['article']['makejar']);
	article_repack($aid, $ptypes, 0);
	//�������º��½ڻ���
	if($usescore){
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
		if(!empty($jieqiConfigs['article']['scorearticle'])){
			$posterid = intval($article->getVar('posterid'));
			if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorearticle'];
			else  $posterary[$posterid] = $jieqiConfigs['article']['scorearticle'];
		}
		foreach($posterary as $pid=>$pscore){
			$users_handler->changeScore($pid, $pscore, false);
		}
	}

	//������������
	$jieqiArticleuplog['articleuptime']=JIEQI_NOW_TIME;
	$jieqiArticleuplog['chapteruptime']=JIEQI_NOW_TIME;
	jieqi_setcachevars('articleuplog', 'jieqiArticleuplog', $jieqiArticleuplog, 'article');

	return $article;
}
?>