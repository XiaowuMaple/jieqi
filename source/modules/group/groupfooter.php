<?php
/**
 * �Ų��ļ�
 *
 * �Ų��ļ��������Ϣ�ͼ��ط��ģ��
 * 
 * ����ģ�壺JIEQI_ROOT_PATH.'/themes/'.JIEQI_THEME_NAME.'/theme.html';
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 * @version 1.0
 */
if(!empty($jieqi_group_template)){
  define('JIEQI_CURRENT_THEME',$jieqi_group_template );
}else{
  define('JIEQI_CURRENT_THEME',JIEQI_THEME_NAME );
}
$jieqiTset['jieqi_page_template'] = JIEQI_ROOT_PATH.'/themes/'.JIEQI_CURRENT_THEME.'/theme.html';
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>