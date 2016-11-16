<?php
/**
 * ���ݱ���(jieqi_system_friends - �û����ѱ�)
 *
 * ���ݱ���(jieqi_system_friends - �û����ѱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: friends.php 301 2008-12-26 04:36:17Z juny $
 */

jieqi_includedb();
//����Ϣ��
class JieqiFriends extends JieqiObjectData
{
    //��������
    function JieqiFriends()
    {
        $this->initVar('friendsid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('adddate', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('myid', JIEQI_TYPE_INT, 0, '�ҵ����', false, 11);
        $this->initVar('myname', JIEQI_TYPE_TXTBOX, '', '�ҵ�����', false, 30);
        $this->initVar('yourid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('yourname', JIEQI_TYPE_TXTBOX, '', '��������', false, 30);
        $this->initVar('teamid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('team', JIEQI_TYPE_TXTBOX, '', '��������', false, 50);
        $this->initVar('fset', JIEQI_TYPE_TXTAREA, '', '��������', false, NULL);
        $this->initVar('state', JIEQI_TYPE_INT, 0, '״̬', false, 1);
        $this->initVar('flag', JIEQI_TYPE_INT, 0, '��־', false, 1);
    }
	
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//����Ϣ���
class JieqiFriendsHandler extends JieqiObjectHandler
{
	function JieqiFriendsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='friends';
	    $this->autoid='friendsid';	
	    $this->dbname='system_friends';
	}
}

?>