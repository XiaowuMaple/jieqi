<?php 
/**
 * ��ģ����ҳ
 *
 * Ĭ����ʾ���·����б�Ҳ�����Զ����������ɵ���ҳ���磺
 * 
 * define('JIEQI_MODULE_NAME', 'article');  //���屾ҳ����������
 * 
 * require_once('../../global.php');  //���������ļ�
 * 
 * jieqi_getconfigs(JIEQI_MODULE_NAME, 'blocks'); //�����������
 * 
 * include_once(JIEQI_ROOT_PATH.'/header.php'); //����ҳͷ
 * 
 * $jieqiTpl->assign('jieqi_contents','');  //����λ�ò���ֵ��ȫ��������
 * 
 * include_once(JIEQI_ROOT_PATH.'/footer.php'); //����ҳβ
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: index.php 228 2008-11-27 06:44:31Z juny $
 */

include_once('articlelist.php');
?>