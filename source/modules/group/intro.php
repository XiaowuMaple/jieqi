<?php
/**
 * Ȧ�Ӽ��
 *
 * Ȧ�Ӽ��
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 * @version 1.0
 */
//���屾ҳ����������
define('JIEQI_MODULE_NAME', 'group');
require_once('../../global.php');
jieqi_loadlang('topic',JIEQI_MODULE_NAME);
$gid = intval($_REQUEST['g']);
include_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/header.php');
jieqi_getconfigs('group', 'topicblock', 'jieqiBlocks');
$gid = intval($_REQUEST['g']);
include_once($groupUserfile['info']);
$jieqiTpl->assign('contents',jieqi_htmlstr($gbrief) );
$jieqiTpl->setCaching(0);
$jieqiTset['jieqi_contents_template'] = $jieqiModules['group']['path'].'/templates/intro.html';	
require_once($jieqiModules['group']['path'].'/groupfooter.php');

?>