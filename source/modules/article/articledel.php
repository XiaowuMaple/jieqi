<?php 
/**
 * ɾ��һƪ����
 *
 * ɾ��һƪ���£������������Ѿ�����html��zip���Ķ���ʽ��
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: articledel.php 228 2008-11-27 06:44:31Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
if(empty($_REQUEST['id'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_loadlang('manage', JIEQI_MODULE_NAME);
include_once($jieqiModules['article']['path'].'/class/article.php');
$article_handler =& JieqiArticleHandler::getInstance('JieqiArticleHandler');
$article=$article_handler->get($_REQUEST['id']);
if(!$article) jieqi_printfail($jieqiLang['article']['article_not_exists']);
//���Ȩ��
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
$canedit=jieqi_checkpower($jieqiPower['article']['delallarticle'], $jieqiUsersStatus, $jieqiUsersGroup, true);

if(!$canedit && !empty($_SESSION['jieqiUserId'])){
	//���˰������ߡ������ߺʹ����˿���ɾ������
	$tmpvar=$_SESSION['jieqiUserId'];
	if($tmpvar>0 && ($article->getVar('authorid')==$tmpvar || $article->getVar('posterid')==$tmpvar || $article->getVar('agentid')==$tmpvar)){
		$canedit=jieqi_checkpower($jieqiPower['article']['delmyarticle'], $jieqiUsersStatus, $jieqiUsersGroup, true);
	}
}
if(!$canedit) jieqi_printfail($jieqiLang['article']['noper_delete_article']);

//ɾ������
include_once($jieqiModules['article']['path'].'/include/operatefunction.php');
jieqi_article_delete($_REQUEST['id'], true);

jieqi_jumppage($article_static_url.'/myarticle.php', LANG_DO_SUCCESS, $jieqiLang['article']['article_delete_success']);

?>