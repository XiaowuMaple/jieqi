<?php
/**
 * ������µĿռ�
 *
 * ������µĿռ�
 * 
 * ����ģ�壺$jieqiModules['space']['path'].'/templates/spacelistup.html
 * 
 * @category   jieqicms
 * @package    space
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 * @version 1.0
 */
define('JIEQI_MODULE_NAME','space');
require_once('../../global.php');
require_once(JIEQI_ROOT_PATH.'/header.php');
$pagenum = 20;


//ҳ��
if (empty($_REQUEST['page']) || !is_numeric($_REQUEST['page'])) $_REQUEST['page']=1;

require_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/class/space.php');
$space_handler = JieqiSpaceHandler::getInstance('JieqiSpaceHandler');
$criteria=new CriteriaCompo();
$criteria->setLimit($pagenum);
$criteria->setStart(($_REQUEST['page']-1) * $pagenum);
$criteria->setSort('up_time');
$criteria->setOrder('desc');
$space_handler->queryObjects($criteria);
$k = 0;
while($v = $space_handler->getObject() ){
	$spaces[$k]['uid'] = $v->getVar('uid');
	$spaces[$k]['name'] = $v->getVar('name','s');
	$spaces[$k]['title'] = $v->getVar('title','s');
	$spaces[$k]['brief'] = $v->getVar('brief','s');
	$spaces[$k]['visit_num'] = $v->getVar('visit_num');
	$spaces[$k]['blog_num'] = $v->getVar('blog_num');
	$spaces[$k]['up_time'] = $v->getVar('up_time','s');
	$k++;
}

$jieqiTpl->assign('spaces',$spaces);
$jieqiTpl->setCaching(0);

//����ҳ����ת
include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
$jumppage = new JieqiPage($space_handler->getCount(),$pagenum,$_REQUEST['page']);
$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());
$jieqiTset['jieqi_contents_template'] = $jieqiModules['space']['path'].'/templates/spacelistup.html';
include(JIEQI_ROOT_PATH.'/footer.php');
?>

