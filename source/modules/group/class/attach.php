<?php
//  ------------------------------------------------------------------------ 
//                                ��������                                     
//                    Copyright (c) 2004 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  ��ƣ����(juny)
//  ����: 377653@qq.com
//  ------------------------------------------------------------------------
jieqi_includedb();
//��̳����
class Jieqiattach extends JieqiObjectData
{
	//��������
	function Jieqiattach()
	{       
		$this->JieqiObjectData();
		$this->initVar('attachid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('topicid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('postid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('name', JIEQI_TYPE_TXTBOX, '', '��������', true, 80);
		$this->initVar('class', JIEQI_TYPE_TXTBOX, '', '��������', true, 30);
		$this->initVar('postfix', JIEQI_TYPE_TXTBOX, '', '������׺', true, 30);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ļ���С', false, 11);
		$this->initVar('hits', JIEQI_TYPE_INT, 0, '�����', false, 11);
		$this->initVar('needexp', JIEQI_TYPE_INT, 0, '��Ҫ����ֵ', false, 11);
		$this->initVar('uptime', JIEQI_TYPE_INT, 0, '�ϴ�ʱ��', false, 11);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiattachHandler extends JieqiObjectHandler
{
	function JieqiattachHandler($db='')
	{
		$this->JieqiObjectHandler($db);
		$this->basename='attach';
		$this->autoid='attachid';	
		$this->dbname='group_attach';
	}
}
?>