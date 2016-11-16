<?php
/**
 * ���ݱ���(jieqi_system_online - �����û���)
 *
 * ���ݱ���(jieqi_system_online - �����û���)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: online.php 189 2008-11-24 09:44:37Z juny $
 */

jieqi_includedb();
//�����û�
class JieqiOnline extends JieqiObjectData
{
    function JieqiOnline()
    {
        $this->JieqiObject();
        $this->initVar('uid', JIEQI_TYPE_INT, 0, '�û����', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('sid', JIEQI_TYPE_TXTBOX, '', 'SESSION���',false, 32);
        $this->initVar('uname', JIEQI_TYPE_TXTBOX, '', '�û���',false, 30);
        $this->initVar('name', JIEQI_TYPE_TXTBOX, '', '�ǳ�',false, 30);
        $this->initVar('pass', JIEQI_TYPE_TXTBOX, '', '����',false, 32);
        $this->initVar('email', JIEQI_TYPE_TXTBOX, '', 'Email',false, 60);
        $this->initVar('groupid', JIEQI_TYPE_INT, 0, '�û������', false, 3);
        $this->initVar('logintime', JIEQI_TYPE_INT, 0, '��½ʱ��', false, 11);
        $this->initVar('updatetime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('operate', JIEQI_TYPE_TXTBOX, '', '�û�����',false, 100);
        $this->initVar('ip', JIEQI_TYPE_TXTBOX, '', '�û�IP',false, 25);
        $this->initVar('browser', JIEQI_TYPE_TXTBOX, '', '���������',false, 50);
        $this->initVar('os', JIEQI_TYPE_TXTBOX, '', '����ϵͳ����',false, 50);
        $this->initVar('location', JIEQI_TYPE_TXTBOX, '', '�û�����λ��',false, 100);
        $this->initVar('state', JIEQI_TYPE_INT, 0, '״̬', false, 1);
        $this->initVar('flag', JIEQI_TYPE_INT, 0, '��־', false, 1);
    }
}


//�û�����
class JieqiOnlineHandler extends JieqiObjectHandler
{
	function JieqiOnlineHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='online';
	    $this->autoid='';	
	    $this->dbname='system_online';
	}
}


?>