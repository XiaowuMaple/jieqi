<?php 
/**
 * ��ģ����ҳ
 *
 * Ĭ����ʾ�������б�
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: index.php 231 2008-11-27 08:46:26Z juny $
 */

/*
//ģ����ҳĬ������ʾ�����б����Ҫ�ĳɶ�����������ҳ����������������ģʽ

define('JIEQI_MODULE_NAME', 'obook');  //���屾ҳ����������
require_once('../../global.php');  //���������ļ�
jieqi_getconfigs(JIEQI_MODULE_NAME, 'blocks'); //�����������
include_once(JIEQI_ROOT_PATH.'/header.php'); //����ҳͷ
$jieqiTpl->assign('jieqi_contents','');  //����λ�ò���ֵ��ȫ��������
include_once(JIEQI_ROOT_PATH.'/footer.php'); //����ҳβ
*/

include_once('obooklist.php');
?>