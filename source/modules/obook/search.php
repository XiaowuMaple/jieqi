<?php 
/**
 * ����������
 *
 * ����������
 * 
 * ����ģ�壺/modules/obook/templates/searchresult.html
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: search.php 326 2009-02-04 00:26:22Z juny $
 */

define('JIEQI_MODULE_NAME', 'obook');
require_once('../../global.php');
jieqi_loadlang('search', JIEQI_MODULE_NAME);
if(empty($_REQUEST['searchkey'])) jieqi_printfail($jieqiLang['obook']['need_search_keywords']);
//�������ò���
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
//�ؼ��ֳ���
if(!empty($jieqiConfigs['obook']['minsearchlen']) && strlen($_REQUEST['searchkey'])<intval($jieqiConfigs['obook']['minsearchlen'])) jieqi_printfail(sprintf($jieqiLang['obook']['search_minsize_limit'], $jieqiConfigs['obook']['minsearchlen']));

//���ʱ�䣬�Ƿ���������
if(!empty($jieqiConfigs['obook']['minsearchtime']) && empty($_REQUEST['page'])){
	$jieqi_visit_time=jieqi_strtosary($_COOKIE['jieqiVisitTime']);
	if(!empty($_SESSION['jieqiObooksearchTime'])) $logtime=$_SESSION['jieqiObooksearchTime'];
	elseif(!empty($jieqi_visit_time['jieqiObooksearchTime'])) $logtime=$jieqi_visit_time['jieqiObooksearchTime'];
	else $logtime=0;
    if(($logtime>0) && JIEQI_NOW_TIME-$logtime < intval($jieqiConfigs['obook']['minsearchtime'])) jieqi_printfail(sprintf($jieqiLang['obook']['search_time_limit'], $jieqiConfigs['obook']['minsearchtime']));

    $_SESSION['jieqiObooksearchTime']=JIEQI_NOW_TIME;
    $jieqi_visit_time['jieqiObooksearchTime']=JIEQI_NOW_TIME;
    setcookie("jieqiVisitTime",jieqi_sarytostr($jieqi_visit_time),JIEQI_NOW_TIME+3600, '/', JIEQI_COOKIE_DOMAIN, 0);
}
		
$obook_static_url = (empty($jieqiConfigs['obook']['staticurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['obook']['staticurl'];
$obook_dynamic_url = (empty($jieqiConfigs['obook']['dynamicurl'])) ? $jieqiModules['obook']['url'] : $jieqiConfigs['obook']['dynamicurl'];



//�����ֶ�
if(!isset($_REQUEST['searchtype']) || $_REQUEST['searchtype'] != 'author') $_REQUEST['searchtype']='obookname';
//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;
include_once($jieqiModules['obook']['path'].'/class/obook.php');
$obook_handler =& JieqiObookHandler::getInstance('JieqiObookHandler');
$criteria=new CriteriaCompo(new Criteria('display', '0', '='));
if(!empty($_REQUEST['searchkey'])){
	$criteria->add(new Criteria($_REQUEST['searchtype'], '%'.$_REQUEST['searchkey'].'%', 'LIKE'));
}
$resnum=$obook_handler->getCount($criteria);
$criteria->setSort('lastupdate');
$criteria->setOrder('DESC');
$criteria->setLimit($jieqiConfigs['obook']['pagenum']);
$criteria->setStart(($_REQUEST['page']-1) * $jieqiConfigs['obook']['pagenum']);
$res=$obook_handler->queryObjects($criteria);
$rescount=$obook_handler->db->getRowsNum($res);
if($rescount == 1){
	//ֻ��һ���������ֱ��ָ��������Ϣҳ��
	$obook=$obook_handler->getObject();
	if($jieqiConfigs['obook']['fakeinfo']==1){
			if(!empty($jieqiConfigs['obook']['fakeprefix'])) $tmpvar='/'.$jieqiConfigs['obook']['fakeprefix'].'info';
			else $tmpvar='/files/obook/info';
			$url_obookinfo=$obook_dynamic_url.$tmpvar.jieqi_getsubdir($obook->getVar('obookid')).'/'.$obook->getVar('obookid').$jieqiConfigs['obook']['fakefile'];  //��Ŀ¼
		}else{
			$url_obookinfo=$obook_dynamic_url.'/obookinfo.php?id='.$obook->getVar('obookid');  //��Ŀ¼
		}
	header('Location: '.$url_obookinfo);
	exit;
}else{
	include_once(JIEQI_ROOT_PATH.'/header.php');
	$jieqiTpl->assign('obook_static_url',$obook_static_url);
    $jieqiTpl->assign('obook_dynamic_url',$obook_dynamic_url);
    $jieqiTpl->assign('resultcount', $rescount);
	$jieqiTpl->assign('obooktitle', $jieqiLang['obook']['search_result']);
	$obookrows=array();
	$k=0;
	while($v = $obook_handler->getObject()){
		$obookrows[$k]['obookid']=$v->getVar('obookid');  //�������
	    $obookrows[$k]['obookname']=$v->getVar('obookname');  //��������
	    if($jieqiConfigs['obook']['fakeinfo']==1){
			$obookrows[$k]['obooksubdir']=jieqi_getsubdir($v->getVar('obookid'));  //��Ŀ¼
			if(!empty($jieqiConfigs['obook']['fakeprefix'])) $tmpvar='/'.$jieqiConfigs['obook']['fakeprefix'].'info';
			else $tmpvar='/files/obook/info';
			$obookrows[$k]['url_obookinfo']=$obook_dynamic_url.$tmpvar.$obookrows[$k]['obooksubdir'].'/'.$v->getVar('obookid').$jieqiConfigs['obook']['fakefile'];  //��Ŀ¼
		}else{
			$obookrows[$k]['obooksubdir']='';
			$obookrows[$k]['url_obookinfo']=$obook_dynamic_url.'/obookinfo.php?id='.$v->getVar('obookid');  //��Ŀ¼
		}

		if($v->getVar('lastchapter')==''){
		    $obookrows[$k]['lastchapterid']=0;  //�½����
		    $obookrows[$k]['lastchapter']='';  //�½�����
		    $obookrows[$k]['url_lastchapter']='';  //�½ڵ�ַ
	    }else{
		    $obookrows[$k]['lastchapterid']=$v->getVar('lastchapterid');
		    $obookrows[$k]['lastchapter']=$v->getVar('lastchapter');
			$obookrows[$k]['url_lastchapter']=$obook_static_url.'/reader.php?oid='.$v->getVar('obookid').'&cid='.$v->getVar('lastchapterid');
	    }

	    $obookrows[$k]['lastvolume']=$v->getVar('lastvolumeid');  //�־����
	    $obookrows[$k]['lastvolume']=$v->getVar('lastvolume');  //�־�����

	    $obookrows[$k]['authorid']=$v->getVar('authorid');  //����
	    $obookrows[$k]['author']=$v->getVar('author');
	    $obookrows[$k]['posterid']=$v->getVar('posterid');  //������
	    $obookrows[$k]['poster']=$v->getVar('poster');
	    $obookrows[$k]['agentid']=$v->getVar('agentid');  //������
	    $obookrows[$k]['agent']=$v->getVar('agent');

	    $obookrows[$k]['sortid']=$v->getVar('sortid');  //������
	    if(isset($jieqiSort['obook'][$v->getVar('sortid')]['caption'])) $obookrows[$k]['sort']=$jieqiSort['obook'][$v->getVar('sortid')]['caption'];  //���
	    else $obookrows[$k]['sort']='';

	    $obookrows[$k]['size']=$v->getVar('size');
		$obookrows[$k]['size_k']=ceil($v->getVar('size')/1024);
		$obookrows[$k]['size_c']=ceil($v->getVar('size')/2);
	    $obookrows[$k]['saleprice']=$v->getVar('saleprice');
	    $obookrows[$k]['goodnum']=$v->getVar('goodnum');
	    $obookrows[$k]['badnum']=$v->getVar('badnum');
	    $obookrows[$k]['lastupdate']=date('y-m-d',$v->getVar('lastupdate')); //����������
		$k++;
	}
	$jieqiTpl->assign_by_ref('obookrows', $obookrows);

	//����ҳ����ת
	include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
	//����������
	if(!empty($jieqiConfigs['obook']['maxsearchres']) && $resnum > intval($jieqiConfigs['obook']['maxsearchres'])) $resnum=intval($jieqiConfigs['obook']['maxsearchres']);
	$jumppage = new JieqiPage($resnum,$jieqiConfigs['obook']['pagenum'],$_REQUEST['page']);
	$jumppage->setlink('', true, true);
	$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());
	$jieqiTpl->setCaching(0);
	$jieqiTset['jieqi_contents_template'] = $jieqiModules['obook']['path'].'/templates/searchresult.html';
	$jieqiTset['jieqi_contents_cacheid'] =  'search';

	include_once(JIEQI_ROOT_PATH.'/footer.php');
}
?>