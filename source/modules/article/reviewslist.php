<?php 
/**
 * �ܵ������б�
 *
 * �ܵ������б�
 * 
 * ����ģ�壺/modules/article/templates/reviewslist.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: reviewslist.php 332 2009-02-23 09:15:08Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];

//���������ദ����
include_once(JIEQI_ROOT_PATH.'/include/funpost.php');
jieqi_includedb();
$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
include_once(JIEQI_ROOT_PATH.'/header.php');
$jieqiTpl->assign('article_static_url',$article_static_url);
$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
include_once(JIEQI_ROOT_PATH.'/lib/text/textfunction.php');

$criteria=new CriteriaCompo();
$criteria->setFields("r.*,a.articlename");
$criteria->setTables(jieqi_dbprefix('article_reviews')." AS r LEFT JOIN ".jieqi_dbprefix('article_article')." AS a ON r.ownerid=a.articleid");

if(!empty($_REQUEST['keyword'])){
	$_REQUEST['keyword']=trim($_REQUEST['keyword']);
	if($_REQUEST['keytype']==1) $criteria->add(new Criteria('r.poster', $_REQUEST['keyword'],'='));
	elseif($_REQUEST['keytype']==2) $criteria->add(new Criteria('title', '%'.$_REQUEST['keyword'].'%', 'LIKE'));
	else $criteria->add(new Criteria('a.articlename', $_REQUEST['keyword'],'='));
}

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
$criteria->setSort('topicid');
$criteria->setOrder('DESC');
$criteria->setLimit($jieqiConfigs['article']['reviewnum']);
$criteria->setStart(($_REQUEST['page']-1) * $jieqiConfigs['article']['reviewnum']);
$query->queryObjects($criteria);
$reviewrows=array();
$k=0;
while($v = $query->getObject()){
	$reviewrows[$k] = jieqi_topic_vars($v);
	$reviewrows[$k]['articlename']=$v->getVar('articlename');
	$reviewrows[$k]['url_articleinfo']=jieqi_geturl('article', 'article', $v->getVar('ownerid'), 'info');
	$k++;
}
$jieqiTpl->assign_by_ref('reviewrows', $reviewrows);
//����ҳ����ת
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($query->getCount($criteria),$jieqiConfigs['article']['reviewnum'],$_REQUEST['page']);
$jumppage->setlink('', true, true);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());

$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/reviewslist.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');

?>