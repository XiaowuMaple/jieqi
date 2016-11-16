<?php
/**
 * ���ݱ���(jieqi_system_message - վ�ڶ���Ϣ��)
 *
 * ���ݱ���(jieqi_system_message - վ�ڶ���Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: message.php 301 2008-12-26 04:36:17Z juny $
 */

jieqi_includedb();
//����Ϣ��
class JieqiMessage extends JieqiObjectData
{

    //��������
    function JieqiMessage()
    {
        $this->initVar('messageid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('fromid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('fromname', JIEQI_TYPE_TXTBOX, '', '��������', false, 30);
        $this->initVar('toid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('toname', JIEQI_TYPE_TXTBOX, '', '��������', false, 30);
        $this->initVar('title', JIEQI_TYPE_TXTBOX, '', '��Ϣ����', true, 100);
        $this->initVar('content', JIEQI_TYPE_TXTAREA, '', '��Ϣ����', false, NULL);
        $this->initVar('messagetype', JIEQI_TYPE_INT, 0, '��Ϣ����', false, 1);
        $this->initVar('isread', JIEQI_TYPE_INT, 0, '�Ƿ��Ѷ�', false, 1);
        $this->initVar('fromdel', JIEQI_TYPE_INT, 0, '������ɾ��', false, 1);
        $this->initVar('todel', JIEQI_TYPE_INT, 0, '������ɾ��', false, 1);
        $this->initVar('enablebbcode', JIEQI_TYPE_INT, 0, '����bbcode', false, 1);
        $this->initVar('enablehtml', JIEQI_TYPE_INT, 0, '����html', false, 1);
        $this->initVar('enablesmilies', JIEQI_TYPE_INT, 0, '�������', false, 1);
        $this->initVar('attachsig', JIEQI_TYPE_INT, 0, '��ʾǩ��', false, 1);
        $this->initVar('attachment', JIEQI_TYPE_INT, 0, '�Ƿ��и���', false, 1);
    }
	
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//����Ϣ���
class JieqiMessageHandler extends JieqiObjectHandler
{
	function JieqiMessageHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='message';
	    $this->autoid='messageid';	
	    $this->dbname='system_message';
	}
}

?>