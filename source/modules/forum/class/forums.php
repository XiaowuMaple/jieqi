<?php
/**
 * ���ݱ���(jieqi_forum_forums - ��̳����)
 *
 * ���ݱ���(jieqi_forum_forums - ��̳����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forums.php 318 2009-01-09 04:58:56Z juny $
 */

jieqi_includedb();
//��̳���
class JieqiForums extends JieqiObjectData
{
    //��������
    function JieqiForums()
    {       
        $this->JieqiObjectData();
        $this->initVar('forumid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('catid', JIEQI_TYPE_INT, 0, '������', false, 6);
        $this->initVar('forumname', JIEQI_TYPE_TXTBOX, '', '��̳����', true, 60);
        $this->initVar('forumdesc', JIEQI_TYPE_TXTAREA, '', '��̳����', false, 255);
        $this->initVar('forumstatus', JIEQI_TYPE_INT, 0, '��̳״̬', false, 4);
        $this->initVar('forumorder', JIEQI_TYPE_INT, 0, '��̳����', false, 6);
        $this->initVar('forumtype', JIEQI_TYPE_INT, 0, '��̳����', false, 1);
        $this->initVar('forumtopics', JIEQI_TYPE_INT, 0, '��̳������', false, 11);
        $this->initVar('forumposts', JIEQI_TYPE_INT, 0, '��̳������', false, 11);
        $this->initVar('forumlastinfo', JIEQI_TYPE_TXTBOX, '', '��󷢱�', false, 255);
        $this->initVar('authview', JIEQI_TYPE_TXTBOX, '', '�Ƿ�ɼ�', false, 255);
        $this->initVar('authread', JIEQI_TYPE_TXTBOX, '', '�����Ķ�', false, 255);
        $this->initVar('authpost', JIEQI_TYPE_TXTBOX, '', '������', false, 255);
        $this->initVar('authreply', JIEQI_TYPE_TXTBOX, '', '����ظ�', false, 255);
        $this->initVar('authupload', JIEQI_TYPE_TXTBOX, '', '�����ϴ�', false, 255);
        $this->initVar('authedit', JIEQI_TYPE_TXTBOX, '', '����༭', false, 255);
        $this->initVar('authdelete', JIEQI_TYPE_TXTBOX, '', '����ɾ��', false, 255);
        $this->initVar('master', JIEQI_TYPE_TXTBOX, '', '��̳����', false, 255);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiForumsHandler extends JieqiObjectHandler
{
	function JieqiForumsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='forums';
	    $this->autoid='forumid';	
	    $this->dbname='forum_forums';
	}
}
?>