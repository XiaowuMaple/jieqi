<?php
/**
 * Ȧ������
 *
 * Ȧ����������
 * 
 * ����ģ�壺/modules/group/templates/topiclist.html
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 */
define('JIEQI_MODULE_NAME', 'group');
include_once('../../global.php');

jieqi_loadlang('topiclist',JIEQI_MODULE_NAME);
jieqi_getconfigs('group', 'topicblock', 'jieqiBlocks');
$gid = intval($_REQUEST['g']);
include_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/header.php');
include_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/class/topic.php');
//���Ȩ��
include_once("include/functions.php");
setpower($gid);

jieqi_getconfigs('group', 'configs');

if(empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
$_REQUEST['pagerows'] = intval($jieqiConfigs['group']['topicnum']);
if(empty($_REQUEST['pagerows'])) $_REQUEST['pagerows'] = 10;
//����ȫ���ö�����
$jieqiTpl->assign('page', $_REQUEST['page']);

//��ѯ�����б�
include_once(JIEQI_ROOT_PATH.'/include/funpost.php');
$topicrows=array();
$table_topics = jieqi_dbprefix('group_topics');
jieqi_includedb();
$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');

$criteria = new CriteriaCompo(new Criteria('ownerid', $gid, '='));
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
$jieqiTset['jieqi_contents_template'] = $jieqiModules['group']['path'].'/templates/topiclist.html';
require_once($jieqiModules['group']['path'].'/groupfooter.php');
?>