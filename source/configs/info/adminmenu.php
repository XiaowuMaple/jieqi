<?php 
// $Id: adminmenu.php 163 2008-11-21 06:49:52Z lee $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
/**
�˵����飺0���˵���� 1����ʾ���� 2�����ӵ�ַ 3��ʹ��Ȩ��(0,�ο�;1,�û�;2,����Ա) 4���Ƿ��¿�����(0,���¿�;1,�¿�;2,�¿�С����) 5���Ƿ���ʾ��0,���أ�1,��ʾ��
*/
$jieqiAdminmenu['info'][0] = array('layer' => '0', 'caption' => '��������', 'command'=>JIEQI_URL.'/admin/configs.php?mod=info&define=0', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['info'][1] = array('layer' => '0', 'caption' => 'Ȩ������', 'command'=>JIEQI_URL.'/admin/power.php?mod=info', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['info'][2] = array('layer' => '0', 'caption' => '������Ŀ����', 'command'=>JIEQI_URL.'/modules/info/admin/magcolumn.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['info'][3] = array('layer' => '0', 'caption' => 'ģ�͹���', 'command'=>JIEQI_URL.'/modules/info/admin/addmx.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['info'][4] = array('layer' => '0', 'caption' => '��Ϣ����', 'command'=>JIEQI_URL.'/modules/info/admin/magmsg.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['info'][5] = array('layer' => '0', 'caption' => '��������', 'command'=>JIEQI_URL.'/modules/info/admin/magupload.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

?>