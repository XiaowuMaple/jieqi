<?php 
/**
 * ��̨ͶƱ���鵼������
 *
 * ��̨ͶƱ���鵼������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    vote
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: adminmenu.php 187 2008-11-24 09:30:03Z juny $
 */

/**
'layer'     - �˵���ȣ�Ĭ�� 0
'caption'   - �˵�����
'command'   - ���ӵ���ַ
'target'    - ��������Ƿ���´���(0-���¿���1-�¿�)
'publish'   - �Ƿ���ʾ��0-����ʾ��1-��ʾ��
*/

$jieqiAdminmenu['vote'][] = array('layer' => 0, 'caption' => '��������', 'command'=>JIEQI_URL.'/admin/configs.php?mod=vote', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['vote'][] = array('layer' => 0, 'caption' => 'Ȩ�޹���', 'command'=>JIEQI_URL.'/admin/power.php?mod=vote', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['vote'][] = array('layer' => 0, 'caption' => 'ͶƱ����', 'command'=>$GLOBALS['jieqiModules']['vote']['url'].'/admin/topiclist.php', 'target' => 0, 'publish' => 1);

?>