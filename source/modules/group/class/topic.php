<?php
// $Id: topic.php 2004-03-04 $
//  ------------------------------------------------------------------------ 
//                                ��������                                     
//                    Copyright (c) 2004 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  ��ƣ����(juny)
//  ����: 377653@qq.com
//  ------------------------------------------------------------------------
jieqi_includedb();
//��̳���
class Jieqitopic extends JieqiObjectData
{
    //��������
    function Jieqitopic()
    {       
        $this->JieqiObjectData();
        $this->initVar('topicid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('topicsubject', JIEQI_TYPE_TXTBOX, '', '����', true, 60);
        $this->initVar('iconid', JIEQI_TYPE_INT, 0, 'ͼ��', false, 3);
        $this->initVar('topicposterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('topicposter', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
        $this->initVar('topictime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('lasttime', JIEQI_TYPE_INT, 0, '�ظ�ʱ��', false, 11);
        $this->initVar('topicviews', JIEQI_TYPE_INT, 0, '�����', false, 8);
        $this->initVar('topicreplies', JIEQI_TYPE_INT, 0, '�ظ���', false, 8);
        $this->initVar('topiclock', JIEQI_TYPE_INT, 0, '������־', false, 1);
        $this->initVar('topictop', JIEQI_TYPE_INT, 0, '�ö���־', false, 1);
        $this->initVar('topicgood', JIEQI_TYPE_INT, 0, '������־', false, 1);
        $this->initVar('topictype', JIEQI_TYPE_INT, 0, '��������', false, 1);
        $this->initVar('topiclastinfo', JIEQI_TYPE_TXTBOX, '', '������', false, 255);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqitopicHandler extends JieqiObjectHandler
{
	function JieqitopicHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='topic';
	    $this->autoid='topicid';	
	    $this->dbname='group_topic';
	}
}
?>