<?php 
/**
 * ���ɾ�̬��������
 *
 * ���ɾ�̬��������
 * 
 * ����ģ�壺/modules/article/templates/staticreview.html
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: staticreview.php 228 2008-11-27 06:44:31Z juny $
 */

include_once('review.php');
include_once($jieqiModules['article']['path'].'/include/staticmakereview.php');
makestaticreview($_REQUEST['aid']);
?>