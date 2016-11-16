<?php 
/**
 * ͶVIP������Ʊ��¼
 *
 * ͶVIP������Ʊ��¼
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: vipvote.php 228 2008-11-27 06:44:31Z juny $
 */

/**
 * VIP��Ʊ����Ʊ���뵱���� ����������Ч
 * VIP�û�ÿ��Ĭ���ж�����Ʊ��1������ÿ����һ����Ʊ��Ҫ�������Ѷ�������ң�1000��
 * ���¶�ͬһ����Ʒ���ֻ��Ͷ������Ʊ��4����������ͶƱ��VIP��ԱÿƱ���Ի��10���ֽ���
 * ����ԭ���鼮�����л�������Ʊ
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
if(empty($_REQUEST['id'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_checklogin();
jieqi_loadlang('vipvote', JIEQI_MODULE_NAME);

include_once(JIEQI_ROOT_PATH.'/class/users.php');
$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
$jieqiUsers = $users_handler->get($_SESSION['jieqiUserId']);
if(!is_object($jieqiUsers)) jieqi_printfail(LANG_NO_USER);
elseif($jieqiUsers->getVar('isvip') == 0) jieqi_printfail($jieqiLang['article']['need_vip_user']);

$userset=unserialize($jieqiUsers->getVar('setting','n'));
$thismonth=date('Y-m',  JIEQI_NOW_TIME);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');

$maxvote=$jieqiConfigs['article']['vipvotes']; //Ĭ��ÿ����Ʊ��
//�������������
if(isset($_SESSION['jieqiEgoldMonth'])) $egoldmonth=$_SESSION['jieqiEgoldMonth'];
else{
	$tmpvar=explode('-',date('Y-m-d',JIEQI_NOW_TIME));
	$monthstart=mktime(0,0,0,(int)$tmpvar[1],1,(int)$tmpvar[0]);
	$tmpvar=explode('-',date('Y-m-d',strtotime('+1 month', JIEQI_NOW_TIME)));
	$monthend=mktime(0,0,0,(int)$tmpvar[1],1,(int)$tmpvar[0]);
	$sql="SELECT SUM(saleprice) as egoldmonth FROM ".jieqi_dbprefix('obook_osale')." WHERE accountid=".$_SESSION['jieqiUserId']." AND buytime>=".$monthstart." AND buytime<".$monthend;
	$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
	$query->execute($sql);
	$res=$query->getObject();
	if(is_object($res)) $egoldmonth=intval($res->getVar('egoldmonth', 'n'));
	else $egoldmonth=0;
	$_SESSION['jieqiEgoldMonth']=$egoldmonth;
}
//ÿ�����ѳ����������������һ����Ʊ
if($jieqiConfigs['article']['vipvegold'] > 0) $maxvote+=floor($egoldmonth / intval($jieqiConfigs['article']['vipvegold']));
//����ͶƱ������ʾ
if(isset($userset['vipvmonth']) && $userset['vipvmonth']==$thismonth && (int)$userset['vipvnum']>=(int)$maxvote){
	jieqi_printfail(sprintf($jieqiLang['article']['vote_times_limit'], $maxvote));
}

include_once($jieqiModules['article']['path'].'/class/article.php');
$article_handler =& JieqiArticleHandler::getInstance('JieqiArticleHandler');
$article=$article_handler->get($_REQUEST['id']);
if(!$article) jieqi_printfail($jieqiLang['article']['article_not_exists']);
elseif($article->getVar('authorid')==0) jieqi_printfail($jieqiLang['article']['article_not_self']);

//����ͶƱֵ(ÿ�ա�ÿ�ܡ�ÿ�¡��ϼ�)
$lastdate=date('Y-m-d', $article->getVar('vipvotetime', 'n'));
$nowdate=date('Y-m-d',  JIEQI_NOW_TIME);
$addnum=1;
if(substr($nowdate,0,7)==substr($lastdate,0,7)){
	$vipvotenow=$article->getVar('vipvotenow', 'n')+$addnum;
	$vipvotepreview=$article->getVar('vipvotepreview', 'n');
}else{
	$vipvotepreview=$article->getVar('vipvotenow', 'n');
	$vipvotenow=$addnum;
}
$criteria=new CriteriaCompo(new Criteria('articleid', $_REQUEST['id']));
$article_handler->updatefields(array('vipvotetime'=>JIEQI_NOW_TIME, 'vipvotenow'=>$vipvotenow, 'vipvotepreview'=>$vipvotepreview), $criteria);
//��¼�Ѿ�ͶƱ��־
if(isset($userset['vipvmonth']) && $userset['vipvmonth']==$thismonth){
	$userset['vipvnum']=(int)$userset['vipvnum']+1;
}else{
	$userset['vipvmonth']=$thismonth;
	$userset['vipvnum']=1;
}
$jieqiUsers->setVar('setting', serialize($userset));
$jieqiUsers->saveToSession();
$users_handler->insert($jieqiUsers);

//�ӻ���
$users_handler->changeScore($_SESSION['jieqiUserId'], $jieqiConfigs['article']['scorevipvote'], true);

jieqi_msgwin(LANG_DO_SUCCESS, sprintf($jieqiLang['article']['vote_success'], $maxvote, $userset['vipvnum']));


?>