<?php 
/**
 * ��������
 *
 * ������������������������
 * 
 * ����ģ�壺/modules/article/templates/searchresult.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: search.php 332 2009-02-23 09:15:08Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
//<!--jieqi insert check code-->
jieqi_loadlang('search', JIEQI_MODULE_NAME);
if(isset($_REQUEST['searchkey'])) $_REQUEST['searchkey']=trim($_REQUEST['searchkey']);
if(empty($_REQUEST['searchkey'])) jieqi_printfail($jieqiLang['article']['need_search_keywords']);
//�������ò���
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
//�ؼ��ֳ���
if(!empty($jieqiConfigs['article']['minsearchlen']) && strlen($_REQUEST['searchkey'])<intval($jieqiConfigs['article']['minsearchlen'])) jieqi_printfail(sprintf($jieqiLang['article']['search_minsize_limit'], $jieqiConfigs['article']['minsearchlen']));

//���ʱ�䣬�Ƿ���������
if(!empty($jieqiConfigs['article']['minsearchtime']) && empty($_REQUEST['page'])){
	$jieqi_visit_time=jieqi_strtosary($_COOKIE['jieqiVisitTime']);
	if(!empty($_SESSION['jieqiArticlesearchTime'])) $logtime=$_SESSION['jieqiArticlesearchTime'];
	elseif(!empty($jieqi_visit_time['jieqiArticlesearchTime'])) $logtime=$jieqi_visit_time['jieqiArticlesearchTime'];
	else $logtime=0;
	if(($logtime>0) && JIEQI_NOW_TIME-$logtime < intval($jieqiConfigs['article']['minsearchtime'])) jieqi_printfail(sprintf($jieqiLang['article']['search_time_limit'], $jieqiConfigs['article']['minsearchtime']));

	$_SESSION['jieqiArticlesearchTime']=JIEQI_NOW_TIME;
	$jieqi_visit_time['jieqiArticlesearchTime']=JIEQI_NOW_TIME;
	setcookie("jieqiVisitTime",jieqi_sarytostr($jieqi_visit_time),JIEQI_NOW_TIME+3600, '/', JIEQI_COOKIE_DOMAIN, 0);
}


$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];

//�����ֶ�
if(!isset($_REQUEST['searchtype']) || $_REQUEST['searchtype'] != 'author') $_REQUEST['searchtype']='articlename';
if($_REQUEST['searchtype'] == 'author') $intstype=2;
else $intstype=1;
$_REQUEST['searchkey']=str_replace('&', ' ', $_REQUEST['searchkey']);
$searchstring=$_REQUEST['searchkey'].'&&'.$_REQUEST['searchtype'];
$hashid=md5($searchstring);
//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
//�����������
include_once($jieqiModules['article']['path'].'/class/searchcache.php');
$searchcache_handler =& JieqiSearchcacheHandler::getInstance('JieqiSearchcacheHandler');
$criteria=new CriteriaCompo(new Criteria('hashid', $hashid, '='));
$criteria->setLimit(1);
$criteria->setStart(0);
$searchcache_handler->queryObjects($criteria);
$searchcache=$searchcache_handler->getObject();
$usecache=false; //�Ƿ�ʹ��cache
//����������
if(is_object($searchcache)){
	if($searchcache->getVar('results', 'n')==1) $cachetime=86400;
	else $cachetime=7200;
	if(JIEQI_NOW_TIME - $searchcache->getVar('searchtime') < $cachetime) $usecache=true;
}

include_once($jieqiModules['article']['path'].'/class/article.php');
$article_handler =& JieqiArticleHandler::getInstance('JieqiArticleHandler');
$jieqiConfigs['article']['pagenum']=intval($jieqiConfigs['article']['pagenum']);
if(empty($jieqiConfigs['article']['pagenum'])) $jieqiConfigs['article']['pagenum']=20;
if($usecache){
	//ʹ�û���
	$allresults=$searchcache->getVar('results', 'n');
	$aids=$searchcache->getVar('aids', 'n');
	if(empty($aids)) $aids=0;
	elseif($allresults==1) $aids=intval($aids);
	else $aids=trim($aids);
	if($allresults > $jieqiConfigs['article']['pagenum']){
		$aidary=explode(',', $aids);
		$search_resultnum=count($aidary);
		$maxpage=ceil($search_resultnum / $jieqiConfigs['article']['pagenum']);
		if($_REQUEST['page'] > $maxpage) $_REQUEST['page']=$maxpage;
		$startid=($_REQUEST['page']-1) * $jieqiConfigs['article']['pagenum'];
		$aids='';
		$i=$startid;
		$j=0;
		while($i<$search_resultnum && $j<$jieqiConfigs['article']['pagenum']){
			if(!empty($aids)) $aids.=',';
			$aids.=intval($aidary[$i]);
			$i++;
			$j++;
		}
		$rescount=$j;
	}else{
		$startid=0;
		$_REQUEST['page']=1;
		$rescount=$allresults;
	}

	$sql="SELECT * FROM ".jieqi_dbprefix('article_article')." WHERE articleid IN (".jieqi_dbslashes($aids).") ORDER BY lastupdate DESC LIMIT 0, ".$jieqiConfigs['article']['pagenum'];
	$res=$article_handler->execute($sql);
	$truecount=$article_handler->db->getRowsNum($res);
	if($truecount != $rescount) $usecache=false;
}
if(!$usecache){
	//��ʹ�û���
	$criteria=new CriteriaCompo(new Criteria('display', '0', '='));
	$criteria->add(new Criteria('size','0','>'));
	if(!empty($_REQUEST['searchkey'])){
		if($jieqiConfigs['article']['searchtype']==1) $criteria->add(new Criteria($_REQUEST['searchtype'], $_REQUEST['searchkey'].'%', 'LIKE'));
		elseif($jieqiConfigs['article']['searchtype']==2) $criteria->add(new Criteria($_REQUEST['searchtype'], $_REQUEST['searchkey'], '='));
		else $criteria->add(new Criteria($_REQUEST['searchtype'], '%'.$_REQUEST['searchkey'].'%', 'LIKE'));
	}
	$criteria->setSort('lastupdate');
	$criteria->setOrder('DESC');
	$jieqiConfigs['article']['maxsearchres']=intval($jieqiConfigs['article']['maxsearchres']);
	if(empty($jieqiConfigs['article']['maxsearchres'])) $jieqiConfigs['article']['maxsearchres']=200;
	$criteria->setLimit($jieqiConfigs['article']['maxsearchres']);
	$criteria->setStart(0);

	$res=$article_handler->queryObjects($criteria);
	$allresults=$article_handler->db->getRowsNum($res);
	if($allresults <= $jieqiConfigs['article']['pagenum']) $rescount=$allresults;
	else $rescount=$jieqiConfigs['article']['pagenum'];
	$_REQUEST['page']=1;
}

if($rescount == 1){
	//ֻ��һ���������ֱ��ָ��������Ϣҳ��
	$article=$article_handler->getObject();
	if(!is_object($article)) jieqi_printfail($jieqiLang['article']['no_search_result']);
	$url_articleinfo=jieqi_geturl('article', 'article', $article->getVar('articleid'), 'info');
	header('Location: '.$url_articleinfo);
	if(!$usecache){
		$aids=$article->getVar('articleid');
		$cleancache=false;
		if(is_object($searchcache)){
			//��ǰ�л��棬����
			$searchcache->setVar('searchtime', JIEQI_NOW_TIME);
			$searchcache->setVar('results', $allresults);
			$searchcache->setVar('aids', $aids);
			if(date('s',  JIEQI_NOW_TIME) == '00') $cleancache=true;
		}else{
			//��ǰû���棬����
			$searchcache = $searchcache_handler->create();
			$searchcache->setVar('searchtime', JIEQI_NOW_TIME);
			$searchcache->setVar('hashid', $hashid);
			$searchcache->setVar('keywords', $_REQUEST['searchkey']);
			$searchcache->setVar('searchtype', $intstype);
			$searchcache->setVar('results', $allresults);
			$searchcache->setVar('aids', $aids);
		}
		$searchcache_handler->insert($searchcache);
		//������ڻ���
		if($cleancache){
			$criteria=new CriteriaCompo(new Criteria('searchtime', JIEQI_NOW_TIME - $cachetime, '<'));
			$searchcache_handler->delete($criteria);
		}
	}
	jieqi_freeresource();
	exit;
}else{
	include_once(JIEQI_ROOT_PATH.'/header.php');
	//������ش�����
	include_once($jieqiModules['article']['path'].'/include/funarticle.php');
	$jieqiTpl->assign('article_static_url',$article_static_url);
	$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
	$jieqiTpl->assign('resultcount', $rescount);
	$jieqiTpl->assign('articletitle', $jieqiLang['article']['search_result']);
	
	$articlerows=array();
	$k=0;
	$aids='';
	while($v = $article_handler->getObject()){
		if(!$usecache){
			if(!empty($aids)) $aids.=',';
			$aids.=$v->getVar('articleid');
		}
		$articlerows[$k] = jieqi_article_vars($v);
		$k++;
		if($k >= $jieqiConfigs['article']['pagenum']) break;
	}
	$jieqiTpl->assign_by_ref('articlerows', $articlerows);

	//����ʣ��Ľ�������ڻ���
	if(!$usecache){
		while($v = $article_handler->getObject()){
			if(!empty($aids)) $aids.=',';
			$aids.=$v->getVar('articleid');
		}
		if(is_object($searchcache)){
			//��ǰ�л��棬����
			$searchcache->setVar('searchtime', JIEQI_NOW_TIME);
			$searchcache->setVar('results', $allresults);
			$searchcache->setVar('aids', $aids);
		}else{
			//��ǰû���棬����
			$searchcache = $searchcache_handler->create();
			$searchcache->setVar('searchtime', JIEQI_NOW_TIME);
			$searchcache->setVar('hashid', $hashid);
			$searchcache->setVar('keywords', $_REQUEST['searchkey']);
			$searchcache->setVar('searchtype', $intstype);
			$searchcache->setVar('results', $allresults);
			$searchcache->setVar('aids', $aids);
		}
		$searchcache_handler->insert($searchcache);
	}
	//����ҳ����ת
	include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
	//����������
	if(!empty($jieqiConfigs['article']['maxsearchres']) && $allresults > intval($jieqiConfigs['article']['maxsearchres'])) $allresults=intval($jieqiConfigs['article']['maxsearchres']);
	$jumppage = new JieqiPage($allresults,$jieqiConfigs['article']['pagenum'],$_REQUEST['page']);
	$jumppage->setlink('', true, true);
	$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());
	$jieqiTpl->setCaching(0);
	$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/searchresult.html';

	include_once(JIEQI_ROOT_PATH.'/footer.php');
}
?>