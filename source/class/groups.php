<?php
/**
 * ���ݱ���(jieqi_system_groups - �û����)
 *
 * ���ݱ���(jieqi_system_groups - �û����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: groups.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//�û���
class JieqiGroups extends JieqiObjectData
{
    function JieqiGroups()
    {
        $this->JieqiObject();
        $this->initVar('groupid', JIEQI_TYPE_INT, 0, '���', false, 5);
        $this->initVar('name', JIEQI_TYPE_TXTBOX, '', '�û�������',true, 50);
        $this->initVar('description', JIEQI_TYPE_TXTAREA, '', '����', false, NULL);
        $this->initVar('grouptype', JIEQI_TYPE_INT, 0, '����', false, 1);
    }
}

//�û�����
class JieqiGroupsHandler extends JieqiObjectHandler
{
	function JieqiGroupsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='groups';
	    $this->autoid='groupid';	
	    $this->dbname='system_groups';
	}
}

?>