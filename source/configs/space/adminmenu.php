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

$jieqiAdminmenu['space'][0] = array('layer' => '0', 'caption' => '��������', 'command'=>JIEQI_URL.'/admin/configs.php?mod=space', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');
//$jieqiAdminmenu['space'][1] = array('layer' => '0', 'caption' => '����TAG', 'command'=>JIEQI_URL.'/admin/articletag.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');
$jieqiAdminmenu['space'][2] = array('layer' => '0', 'caption' => '���пռ�', 'command'=>$GLOBALS['jieqiModules']['space']['url'].'/admin/allspace.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');
$jieqiAdminmenu['space'][3] = array('layer' => '0', 'caption' => '���в���', 'command'=>$GLOBALS['jieqiModules']['space']['url'].'/admin/allblog.php', 'power' => JIEQI_GROUP_GUEST, 'target' => JIEQI_TARGET_SELF, 'publish' => '1');
?>