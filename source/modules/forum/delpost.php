<?php 
/**
 * ɾ������
 *
 * ɾ������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: delpost.php 328 2009-02-06 09:24:29Z juny $
 */

define('JIEQI_MODULE_NAME', 'forum');
require_once('../../global.php');
//������
if(empty($_REQUEST['pid']) || !is_numeric($_REQUEST['pid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
//�������԰�
jieqi_loadlang('post', JIEQI_MODULE_NAME);
//��ѯ���Ӽ�¼
jieqi_includedb();
$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
$criteria=new CriteriaCompo(new Criteria('p.postid', $_REQUEST['pid']));
$criteria->setTables(jieqi_dbprefix('forum_forumposts').' p LEFT JOIN '.jieqi_dbprefix('forum_forums').' f ON p.ownerid=f.forumid');
$query->queryObjects($criteria);
$post=$query->getObject();
unset($criteria);
if(!$post) jieqi_printfail($jieqiLang['forum']['post_not_exists']);

$tid=$post->getVar('topicid');
$fid=$post->getVar('forumid');

//������Ȩ��
include_once($jieqiModules['forum']['path'].'/include/funforum.php');
if(!jieqi_forum_checkpower($post, 'authdelete', true)) jieqi_printfail($jieqiLang['forum']['noper_delete_post']);
//��ȡ��̳����
$forum_type=intval($post->getVar('forumtype', 'n'));
//�����������
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');

//����������ɾ���������Ӽ��ظ�
if($post->getVar('istopic')==1){
	//ɾ������
	if(!jieqi_forum_deltopic($post->getVar('topicid'), $post->getVar('forumid'), $jieqiConfigs['forum'])) jieqi_printfail($jieqiLang['forum']['delete_post_failure']);
	//����ȫ����������ʱ����¹��滺��
	if($forum_type==1) jieqi_forum_uptoptopic();
	jieqi_jumppage($jieqiModules['forum']['url'].'/topiclist.php?fid='.$post->getVar('forumid'), LANG_DO_SUCCESS, $jieqiLang['forum']['delete_post_success']);
}else{
	//ɾ���ظ���
	if(!jieqi_forum_delpost($post->getVar('postid'), $post->getVar('topicid'), $post->getVar('forumid'), $jieqiConfigs['forum'])) jieqi_printfail($jieqiLang['forum']['delete_post_failure']);
	jieqi_jumppage($jieqiModules['forum']['url'].'/showtopic.php?tid='.$post->getVar('topicid'), LANG_DO_SUCCESS, $jieqiLang['forum']['delete_post_success']);
}

?>