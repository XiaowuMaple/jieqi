<?php 
/**
 * ���ҹ�����ҳ
 *
 * Ĭ��ģ��û�κ����ݣ�����������ʾһЩ����˵����
 * 
 * ����ģ�壺/modules/article/templates/myarticle.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: myarticle.php 326 2009-02-04 00:26:22Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../global.php');
jieqi_getconfigs('article', 'power');
jieqi_checkpower($jieqiPower['article']['authorpanel'], $jieqiUsersStatus, $jieqiUsersGroup, false);

include_once(JIEQI_ROOT_PATH.'/header.php');
$jieqiTpl->assign('authorarea', 1);
$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'].'/templates/myarticle.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>