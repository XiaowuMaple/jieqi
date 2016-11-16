<?php
/**
 * ���ݱ���(jieqi_system_userlog - �û�������־��)
 *
 * ���ݱ���(jieqi_system_userlog - �û�������־��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: userlog.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//�û�������־
class JieqiUserlog extends JieqiObjectData
{ 
    //��������
    function JieqiUserlog()
    {
        $this->JieqiObjectData();
        $this->initVar('logid', JIEQI_TYPE_INT, 0, '��־���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('logtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('fromid', JIEQI_TYPE_INT, 0, '������id', false, 11);
        $this->initVar('fromname', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
        $this->initVar('toid', JIEQI_TYPE_INT, 0, 'Ӱ����id', false, 11);
        $this->initVar('toname', JIEQI_TYPE_TXTBOX, '', 'Ӱ����', false, 30);
        $this->initVar('reason', JIEQI_TYPE_TXTAREA, '', '�޸�ԭ��', false, NULL);
        $this->initVar('chginfo', JIEQI_TYPE_TXTAREA, '', '�޸�����', false, NULL);
        $this->initVar('chglog', JIEQI_TYPE_TXTAREA, '', '�޸ļ�¼', false, NULL);
        $this->initVar('isdel', JIEQI_TYPE_INT, 0, '�Ƿ�ɾ��', false, 1);
        $this->initVar('userlog', JIEQI_TYPE_TXTAREA, '', '�û����ϱ���', false, NULL);
    }
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//�û����
class JieqiUserlogHandler extends JieqiObjectHandler
{
    function JieqiUserlogHandler($db='')
    {
        $this->JieqiObjectHandler($db);
        $this->basename='userlog';
        $this->autoid='logid';
        $this->dbname='system_userlog';
    }
}
?>