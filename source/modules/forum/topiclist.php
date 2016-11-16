<?php
/**
 * ��ʾ���������б�
 *
 * ��ʾ���������б�
 * 
 * ����ģ�壺/modules/forum/templates/topiclist.html
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: topiclist.php 329 2009-02-07 01:21:38Z juny $
 */

define('JIEQI_MODULE_NAME', 'forum');
require_once('../../global.php');

//������
if(empty($_REQUEST['fid']) || !is_numeric($_REQUEST['fid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
$_REQUEST['fid'] = intval($_REQUEST['fid']);
$_REQUEST['oid'] = $_REQUEST['fid'];

jieqi_loadlang('list', JIEQI_MODULE_NAME);
include_once($jieqiModules['forum']['path'].'/class/forums.php');
$forums_handler=JieqiForumsHandler::getInstance('JieqiForumsHandler');
$forum=$forums_handler->get($_REQUEST['oid']);
if(!$forum) jieqi_printfail($jieqiLang['forum']['forum_not_exists']);

//���Ȩ��
include_once($jieqiModules['forum']['path'].'/include/funforum.php');
jieqi_forum_checkpower($forum, 'authview', false);

//��ֵ��̳����
include_once(JIEQI_ROOT_PATH.'/header.php');
$forum_type=intval($forum->getVar('forumtype', 'n'));
$jieqiTpl->assign(jieqi_forum_vars($forum));

//�����������
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
if(empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
$_REQUEST['pagerows'] = intval($jieqiConfigs['forum']['topicnum']);
if(empty($_REQUEST['pagerows'])) $_REQUEST['pagerows'] = 10;


//����ȫ���ö�����
$jieqiTpl->assign('page', $_REQUEST['page']);
if($_REQUEST['page'] == 1 && $forum_type == 0){
	jieqi_getcachevars('forum', 'forumtops');
	$jieqiTpl->assign_by_ref('forumtops',$jieqiForumtops);
}

//��ѯ�����б�
include_once(JIEQI_ROOT_PATH.'/include/funpost.php');
$topicrows=array();
$table_topics = jieqi_dbprefix('forum_forumtopics');
jieqi_includedb();
$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');

$criteria = new CriteriaCompo(new Criteria('ownerid', $_REQUEST['oid'], '='));
if(isset($_REQUEST['isgood'])) $criteria->add(new Criteria('isgood', intval($_REQUEST['isgood'])));
$criteria->setSort('istop DESC, replytime');
$criteria->setOrder('DESC');
$criteria->setLimit($_REQUEST['pagerows']);
$criteria->setStart(($_REQUEST['page']-1) * $_REQUEST['pagerows']);
$criteria->setTables($table_topics);
$query->queryObjects($criteria);

$k=0;
while($topic = $query->getObject()){
	$topicrows[$k] = jieqi_topic_vars($topic);
	$k++;
}

$jieqiTpl->assign_by_ref('topicrows',$topicrows);

//����ҳ����ת
$page_rowcount = $query->getCount($criteria); //�ܼ�¼��
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($page_rowcount, $_REQUEST['pagerows'], $_REQUEST['page']);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());

$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['forum']['path'].'/templates/topiclist.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>