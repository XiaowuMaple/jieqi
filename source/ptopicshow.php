<?php
/**
 * ��ʾһ������
 *
 * �������ӻظ�����
 * 
 * ����ģ�壺/templates/ptopics.html
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: ptopicshow.php 332 2009-02-23 09:15:08Z juny $
 */

//��ʾ��������

define('JIEQI_MODULE_NAME', 'system');
require_once('global.php');
if(empty($_REQUEST['tid']) || !is_numeric($_REQUEST['tid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_loadlang('parlar', JIEQI_MODULE_NAME);
//�ж������Ƿ����
include_once(JIEQI_ROOT_PATH.'/class/users.php');
$post_query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
$criteria=new CriteriaCompo(new Criteria('t.topicid', $_REQUEST['tid']));
$criteria->setTables(jieqi_dbprefix('system_ptopics').' t LEFT JOIN '.jieqi_dbprefix('system_users').' u ON t.ownerid=u.uid');
$post_query->queryObjects($criteria);
$ptopic=$post_query->getObject();
unset($criteria);
if(!$ptopic) jieqi_printfail($jieqiLang['system']['ptopic_not_exists']);
$ownerid = $ptopic->getVar('ownerid', 'n');

//����Ƿ��з���Ȩ��
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
if(jieqi_checkpower($jieqiPower['system']['parlorpost'], $jieqiUsersStatus, $jieqiUsersGroup, true)) $enablepost=1;
else $enablepost=0;
if(!empty($_POST['pcontent'])){
	//��鷢������Ȩ��
	if(!$enablepost) jieqi_printfail($jieqiLang['system']['parlor_noper_post']);
	//��鷢��������Ҫ����
	if(!empty($jieqiConfigs['system']['ppostneedscore']) && $_SESSION['jieqiUserScore']<intval($jieqiConfigs['system']['ppostneedscore'])) jieqi_printfail(sprintf($jieqiLang['system']['ptopic_score_limit'], intval($jieqiConfigs['system']['ppostneedscore'])));
}

//���⴦����غ���
include_once(JIEQI_ROOT_PATH.'/include/funpost.php');

//��������
$addnewreply=0;
if(!empty($_POST['pcontent']) && $enablepost){
	//У�������Ϣ����
	$check_errors = array();
	//���͹����ύ����
	$post_set = array('module'=>JIEQI_MODULE_NAME, 'ownerid'=>intval($ownerid), 'topicid'=>intval($_REQUEST['tid']), 'postid'=>0, 'posttime'=>JIEQI_NOW_TIME, 'topictitle'=>&$_POST['ptitle'], 'posttext'=>&$_POST['pcontent'], 'attachment'=>'', 'isnew'=>true, 'istopic'=>0, 'istop'=>0, 'sname'=>'jieqiSystemParlorTime', 'attachfile'=>'', 'oldattach'=>'', 'checkcode'=>$_POST['checkcode']);
	jieqi_post_checkvar($post_set, $jieqiConfigs['system'], $check_errors);


	if(empty($check_errors)) {
		include_once(JIEQI_ROOT_PATH.'/class/pposts.php');
		$pposts_handler =& JieqiPpostsHandler::getInstance('JieqiPpostsHandler');
		$newPost = $pposts_handler->create();
		jieqi_post_newset($post_set, $newPost);
		$pposts_handler->insert($newPost);

		$addnewreply=1;
		$_REQUEST['page']='last';
		//���ӻظ�����
		if(!empty($jieqiConfigs['system']['scoreptopic'])){
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
			$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
			$users_handler->changeScore($_SESSION['jieqiUserId'], $jieqiConfigs['system']['scoreptopic'], true);
		}
	}else{
		jieqi_printfail(implode('<br />', $check_errors));
	}
}

//����Ƿ��й�������Ȩ��
$canedit=jieqi_checkpower($jieqiPower['system']['manageallparlor'], $jieqiUsersStatus, $jieqiUsersGroup, true);
if(!$canedit && !empty($_SESSION['jieqiUserId'])){
	//���˰��񣬻�������˿��Թ���
	$tmpvar=$_SESSION['jieqiUserId'];
	if($tmpvar>0 && $ownerid==$tmpvar)	$canedit=true;
}

//����ɾ���ظ�
if($canedit && $_REQUEST['action']=='del' && is_numeric($_REQUEST['pid'])){
	include_once(JIEQI_ROOT_PATH.'/class/pposts.php');
	$pposts_handler =& JieqiPpostsHandler::getInstance('JieqiPpostsHandler');
	//���ٻظ�����
	if(!empty($jieqiConfigs['system']['scoreptopic'])){
		$ppostobj = $pposts_handler->get(intval($_REQUEST['pid']));
		if(is_object($ppostobj)){
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
			$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
			$users_handler->changeScore(intval($ppostobj->getVar('posterid','n')), $jieqiConfigs['system']['scoreptopic'], false);
		}
	}
	$pposts_handler->delete(intval($_REQUEST['pid']));
	$addnewreply=-1;
}

//��ʾҳ��
include_once(JIEQI_ROOT_PATH.'/header.php');
$jieqiTpl->assign('tid',$_REQUEST['tid']);
$jieqiTpl->assign('ownerid',$ptopic->getVar('ownerid'));
$jieqiTpl->assign('owneruname',$ptopic->getVar('uname'));
$ownername =  strlen($ptopic->getVar('name'))==0 ? $ptopic->getVar('uname') : $ptopic->getVar('name');
$jieqiTpl->assign('ownername',$ownername);
$jieqiTpl->assign('topicid',$ptopic->getVar('topicid'));
$jieqiTpl->assign('title',$ptopic->getVar('title'));
if($canedit) $jieqiTpl->assign('ismaster',1);
else $jieqiTpl->assign('ismaster',0);
//��ʾ�б�
jieqi_getconfigs('system', 'honors'); //ͷ��
//ͷ�����
if(!isset($jieqiConfigs['system'])) jieqi_getconfigs('system', 'configs');
//�Ƿ�ʹ�û���
if(!empty($jieqiModules['badge']['publish']) && is_file($jieqiModules['badge']['path'].'/include/badgefunction.php')){
	include_once($jieqiModules['badge']['path'].'/include/badgefunction.php');
	$jieqi_use_badge=1;
	$jieqiTpl->assign('jieqi_use_badge', 1);
}else{
	$jieqi_use_badge=0;
	$jieqiTpl->assign('jieqi_use_badge', 0);
}

$_REQUEST['pagerows'] = intval($jieqiConfigs['system']['ppostpnum']);
if(empty($_REQUEST['pagerows'])) $_REQUEST['pagerows'] = 10;

$criteria=new CriteriaCompo(new Criteria('p.topicid', $_REQUEST['tid']));
$criteria->setTables(jieqi_dbprefix('system_pposts').' p LEFT JOIN '.jieqi_dbprefix('system_users').' u ON p.posterid=u.uid');
$criteria->setSort('p.postid');
$criteria->setOrder('ASC');
$criteria->setLimit($_REQUEST['pagerows']);

$query_count = $post_query->getCount($criteria);
if($_REQUEST['page']=='last') $_REQUEST['page']=ceil($query_count / $_REQUEST['pagerows']);
elseif(empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;

$criteria->setStart(($_REQUEST['page']-1) * $_REQUEST['pagerows']);
$post_query->queryObjects($criteria);
$ppostrows=array();
$k=0;
while($ppost = $post_query->getObject()){
	$addvars = array('order'=>($_REQUEST['page'] - 1) * $_REQUEST['pagerows'] + $k + 1);
	$ppostrows[$k] = jieqi_post_vars($ppost, $jieqiConfigs['system'], $addvars, true);
	$k++;
}
$jieqiTpl->assign_by_ref('ppostrows', $ppostrows);

$jieqiTpl->assign('enablepost', $enablepost);

if(!isset($jieqiConfigs['system'])) jieqi_getconfigs('system', 'configs');
$jieqiTpl->assign('postcheckcode', $jieqiConfigs['system']['postcheckcode']);

//����ҳ����ת
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($query_count,$_REQUEST['pagerows'],$_REQUEST['page']);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());
$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = JIEQI_ROOT_PATH.'/templates/ptopicshow.html';
//���ӵ����
if($addnewreply > 0){
	$lastinfo=serialize(array('time'=>JIEQI_NOW_TIME, 'uid'=>intval($_SESSION['jieqiUserId']), 'uname'=>strval($_SESSION['jieqiUserName'])));
	$post_query->execute('UPDATE '.jieqi_dbprefix('system_ptopics').' SET views=views+1,replies=replies+1,replytime='.JIEQI_NOW_TIME.",lastinfo='".jieqi_dbslashes($lastinfo)."' WHERE topicid=".$_REQUEST['tid']);
}elseif($addnewreply < 0){
	$post_query->execute('UPDATE '.jieqi_dbprefix('system_ptopics').' SET views=views+1,replies=replies-1 WHERE topicid='.$_REQUEST['tid']);
}else{
	//����ͳ�ƴ�����
	include_once(JIEQI_ROOT_PATH.'/include/funstat.php');
	jieqi_visit_stat($_REQUEST['tid'], jieqi_dbprefix('system_ptopics'), 'views', 'topicid', $post_query);
}
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>