<?php 
/**
 * һƪ���µ������б�
 *
 * һƪ���µ������б�
 * 
 * ����ģ�壺/modules/article/templates/reviews.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: reviews.php 332 2009-02-23 09:15:08Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
//jieqi_checklogin();
if(empty($_REQUEST['aid']) || !is_numeric($_REQUEST['aid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
jieqi_loadlang('review', JIEQI_MODULE_NAME);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
if(jieqi_checkpower($jieqiPower['article']['newreview'], $jieqiUsersStatus, $jieqiUsersGroup, true)) $enablepost=1;
else $enablepost=0;
if(!empty($_POST['pcontent']) && $enablepost){
	//��鷢������Ȩ��
	if(!$enablepost) jieqi_printfail($jieqiLang['article']['review_noper_post']);
	//��鷢��������Ҫ����
	if(!empty($jieqiConfigs['article']['reviewneedscore']) && $_SESSION['jieqiUserScore']<intval($jieqiConfigs['article']['reviewneedscore'])) jieqi_printfail(sprintf($jieqiLang['article']['review_score_limit'], intval($jieqiConfigs['article']['reviewneedscore'])));
}

include_once($jieqiModules['article']['path'].'/class/article.php');
$article_handler =& JieqiArticleHandler::getInstance('JieqiArticleHandler');
$article=$article_handler->get($_REQUEST['aid']);
if(!$article){
	if(!empty($_REQUEST['action'])) header('Location: reviewslist.php');
	else jieqi_printfail($jieqiLang['article']['article_not_exists']);
}

$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];

include_once($jieqiModules['article']['path'].'/class/reviews.php');
$reviews_handler =& JieqiReviewsHandler::getInstance('JieqiReviewsHandler');
//����Ƿ��й�������Ȩ��
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
$canedit=jieqi_checkpower($jieqiPower['article']['manageallreview'], $jieqiUsersStatus, $jieqiUsersGroup, true);
if(!$canedit && !empty($_SESSION['jieqiUserId']) && is_object($article)){
	//���˰������ߡ������ߺʹ����˿��Թ�������
	$tmpvar=$_SESSION['jieqiUserId'];
	if($tmpvar>0 && ($article->getVar('authorid')==$tmpvar || $article->getVar('posterid')==$tmpvar || $article->getVar('agentid')==$tmpvar)){
		$canedit=true;
	}
}
//�����ö����ú󡢼Ӿ���ȥ����ɾ��
if($canedit && isset($_REQUEST['action']) && !empty($_REQUEST['rid'])){
	$actreview=$reviews_handler->get($_REQUEST['rid']);
	if(is_object($actreview)){
		switch($_REQUEST['action']){
			case 'top':
				$actreview->setVar('istop', 1);
				$reviews_handler->insert($actreview);
				break;
			case 'untop':
				$actreview->setVar('istop', 0);
				$reviews_handler->insert($actreview);
				break;
			case 'good':
				if($actreview->getVar('isgood')==0){
					//�ж�����Ӿ��ı���
					$criteria=new CriteriaCompo();
					$criteria->add(new Criteria('ownerid', $_REQUEST['aid']));
					$allnum=$reviews_handler->getCount($criteria);
					$criteria->add(new Criteria('isgood', 1));
					$goodnum=$reviews_handler->getCount($criteria);
					unset($criteria);
					$maxnum=ceil($allnum * $jieqiConfigs['article']['goodreviewpercent'] / 100);
					if($goodnum>=$maxnum) jieqi_printfail(sprintf($jieqiLang['article']['review_rate_limit'], $jieqiConfigs['article']['goodreviewpercent']));
					$actreview->setVar('isgood', 1);
					$reviews_handler->insert($actreview);
					//��������
					if(!empty($jieqiConfigs['article']['scoregoodreview'])){
						include_once(JIEQI_ROOT_PATH.'/class/users.php');
						$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
						$users_handler->changeScore($actreview->getVar('posterid'), $jieqiConfigs['article']['scoregoodreview'], true);
					}
				}
				break;
			case 'normal':
				if($actreview->getVar('isgood')==1){
					$actreview->setVar('isgood', 0);
					$reviews_handler->insert($actreview);
					//��������
					if(!empty($jieqiConfigs['article']['scoregoodreview'])){
						include_once(JIEQI_ROOT_PATH.'/class/users.php');
						$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
						$users_handler->changeScore($actreview->getVar('posterid'), $jieqiConfigs['article']['scoregoodreview'], false);
					}
				}
				break;
			case 'del':
				include_once($jieqiModules['article']['path'].'/class/replies.php');
				$replies_handler =& JieqiRepliesHandler::getInstance('JieqiRepliesHandler');
				$criteria=new Criteria('topicid', $_REQUEST['rid']);
				//ɾ���������ٻ���
				if(!empty($jieqiConfigs['article']['scorereview'])){
					$replies_handler->queryObjects($criteria);
					$posterary=array();
					while($replyobj = $replies_handler->getObject()){
						$posterid = intval($replyobj->getVar('posterid'));
						if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scorereview'];
						else  $posterary[$posterid] = $jieqiConfigs['article']['scorereview'];
					}

					if($actreview->getVar('isgood','n') == 1 && !empty($jieqiConfigs['article']['scoregoodreview'])){
						$posterid = intval($actreview->getVar('posterid'));
						if(isset($posterary[$posterid])) $posterary[$posterid] += $jieqiConfigs['article']['scoregoodreview'];
						else  $posterary[$posterid] = $jieqiConfigs['article']['scoregoodreview'];
					}

					include_once(JIEQI_ROOT_PATH.'/class/users.php');
					$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
					foreach($posterary as $pid=>$pscore){
						$users_handler->changeScore($pid, $pscore, false);
					}
				}
				$reviews_handler->delete($_REQUEST['rid']);
				$replies_handler->delete($criteria);

				break;
		}
	}
}

//���������ദ����
include_once(JIEQI_ROOT_PATH.'/include/funpost.php');
$criteria=new CriteriaCompo();
$criteria->add(new Criteria('ownerid', $_REQUEST['aid']));
if(isset($_POST['pcontent']) && strlen(trim($_POST['pcontent'])) > 0 && $enablepost){
	//У�������Ϣ����
	$check_errors = array();
	//���͹����ύ����
	$istopic = empty($_REQUEST['tid']) ? 1 : 0; //�Ƿ񷢱��������־
	$istop = ($forum_type == 1) ? 2 : 0; //�Ƿ�ȫ���ö�
	$post_set = array('module'=>JIEQI_MODULE_NAME, 'ownerid'=>intval($_REQUEST['aid']), 'topicid'=>0, 'postid'=>0, 'posttime'=>JIEQI_NOW_TIME, 'topictitle'=>&$_POST['ptitle'], 'posttext'=>&$_POST['pcontent'], 'attachment'=>'', 'emptytitle'=>true, 'isnew'=>true, 'istopic'=>1, 'istop'=>0, 'sname'=>'jieqiArticleReviewTime', 'attachfile'=>'', 'oldattach'=>'', 'checkcode'=>$_POST['checkcode']);
	jieqi_post_checkvar($post_set, $jieqiConfigs['article'], $check_errors);

	if(empty($check_errors)){
		$newReview= $reviews_handler->create();
		//�����ʵ����ֵ
		jieqi_topic_newset($post_set, $newReview);
		$reviews_handler->insert($newReview);
		//��ֵ����id
		$post_set['topicid'] = $newReview->getVar('topicid', 'n');

		include_once($jieqiModules['article']['path'].'/class/replies.php');
		$replies_handler =& JieqiRepliesHandler::getInstance('JieqiRepliesHandler');
		$newReply = $replies_handler->create();
		//�������ݸ�ֵ
		jieqi_post_newset($post_set, $newReply);
		$replies_handler->insert($newReply);

		//������������
		if(!empty($jieqiConfigs['article']['scorereview'])){
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
			$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
			$users_handler->changeScore($_SESSION['jieqiUserId'], $jieqiConfigs['article']['scorereview'], true);
		}
	}else{
		jieqi_printfail(implode('<br />', $check_errors));
	}
}

include_once(JIEQI_ROOT_PATH.'/header.php');
$jieqiTpl->assign('article_static_url',$article_static_url);
$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
$jieqiTpl->assign('ownerid',$article->getVar('articleid'));
$jieqiTpl->assign('articleid',$article->getVar('articleid'));
$jieqiTpl->assign('articlename',$article->getVar('articlename'));
if($canedit) $jieqiTpl->assign('ismaster',1);
else $jieqiTpl->assign('ismaster',0);
$jieqiTpl->assign('url_articleinfo',jieqi_geturl('article', 'article', $article->getVar('articleid'), 'info'));

include_once(JIEQI_ROOT_PATH.'/lib/text/textfunction.php');
if(isset($_REQUEST['type']) && $_REQUEST['type']=='good'){
	$jieqiTpl->assign('type', 'good');
	//��������
	$criteria->add(new Criteria('isgood', 1));
}else{
	$_REQUEST['type']='all';
	$jieqiTpl->assign('type', 'all');
}
//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
$criteria->setSort('istop DESC, replytime');
$criteria->setOrder('DESC');
$criteria->setLimit($jieqiConfigs['article']['reviewnum']);
$criteria->setStart(($_REQUEST['page']-1) * $jieqiConfigs['article']['reviewnum']);
$reviews_handler->queryObjects($criteria);
$reviewrows=array();
$k=0;
while($v = $reviews_handler->getObject()){
	$reviewrows[$k] = jieqi_topic_vars($v);
	$k++;
}
$jieqiTpl->assign_by_ref('reviewrows', $reviewrows);
$jieqiTpl->assign('enablepost', $enablepost);
//�Ƿ���ʾ��֤��
if(!isset($jieqiConfigs['system'])) jieqi_getconfigs('system', 'configs');
$jieqiTpl->assign('postcheckcode', $jieqiConfigs['system']['postcheckcode']);
//����ҳ����ת
unset($_GET['action']);
unset($_GET['rid']);
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($reviews_handler->getCount($criteria),$jieqiConfigs['article']['reviewnum'],$_REQUEST['page']);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());

$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/reviews.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');

?>