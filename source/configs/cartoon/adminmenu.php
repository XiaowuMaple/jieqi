<?php 
// $Id: adminmenu.php 2004-2-16 $
//  ------------------------------------------------------------------------ 
//                                ��������                                     
//                    Copyright (c) 2004 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  ��ƣ����(juny)
//  ����: 377653@qq.com
//  ------------------------------------------------------------------------
/**
�˵����飺0���˵���� 1����ʾ���� 2�����ӵ�ַ 3��ʹ��Ȩ��(0,�ο�;1,�û�;2,����Ա) 4���Ƿ��¿�����(0,���¿�;1,�¿�;2,�¿�С����) 5���Ƿ���ʾ��0,���أ�1,��ʾ��
*/

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => '��������', 'command'=>JIEQI_URL.'/admin/configs.php?mod=cartoon', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => 'Ȩ�޹���', 'command'=>JIEQI_URL.'/admin/power.php?mod=cartoon', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => '��������', 'command'=>$GLOBALS['jieqiModules']['cartoon']['url'].'/admin/cartoon.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => '���۹���', 'command'=>$GLOBALS['jieqiModules']['cartoon']['url'].'/admin/review.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => 'α��̬ҳ������', 'command'=>$GLOBALS['jieqiModules']['cartoon']['url'].'/admin/makefake.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => '��ƪ�ɼ�', 'command'=>$GLOBALS['jieqiModules']['cartoon']['url'].'/admin/collect.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

$jieqiAdminmenu['cartoon'][] = array('layer' => '0', 'caption' => '�����ɼ�', 'command'=>$GLOBALS['jieqiModules']['cartoon']['url'].'/admin/batchcollect.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');

?>