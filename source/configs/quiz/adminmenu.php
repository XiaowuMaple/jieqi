<?php 
// $Id: adminmenu.php 2004-2-16 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
/**
�˵����飺0���˵���� 1����ʾ���� 2�����ӵ�ַ 3��ʹ��Ȩ��(0,�ο�;1,�û�;2,����Ա) 4���Ƿ��¿�����(0,���¿�;1,�¿�;2,�¿�С����) 5���Ƿ���ʾ��0,���أ�1,��ʾ��
*/

$jieqiAdminmenu['quiz'][] = array('layer' => '0', 'caption' => '��������', 'command'=>JIEQI_URL.'/admin/configs.php?mod=quiz', 'power' => JIEQI_GROUP_ADMIN, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['quiz'][] = array('layer' => '0', 'caption' => 'Ȩ������', 'command'=>JIEQI_URL.'/admin/power.php?mod=quiz', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['quiz'][] = array('layer' => '0', 'caption' => '������', 'command'=>JIEQI_URL.'/modules/quiz/admin/quiz_type.php', 'power' => JIEQI_GROUP_ADMIN, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['quiz'][] = array('layer' => '0', 'caption' => '�ʴ����', 'command'=>JIEQI_URL.'/modules/quiz/admin/quiz_list.php', 'power' => JIEQI_GROUP_ADMIN, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');