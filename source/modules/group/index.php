<?php
/**
 * Ȧ����ҳ
 *
 * Ȧ����ҳ
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 * @version 1.0
 */
define('JIEQI_MODULE_NAME', 'group');
require_once('../../global.php');
//�����������(����)
jieqi_getconfigs('group', 'indexblocks', 'jieqiBlocks');
$gid = intval($_REQUEST['g']);
if($gid){
	header("Location:".$jieqiModules['group']['url']."/topiclist.php?g=$gid");
} else {
    include_once(JIEQI_ROOT_PATH.'/header.php');
    require_once($jieqiModules['group']['path'].'/groupfooter.php');
}
?>