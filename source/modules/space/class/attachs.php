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
//��ḽ��
class JieqiAttachs extends JieqiObjectData
{
    //��������
    function JieqiAttachs()
    {       
        $this->JieqiObjectData();
        $this->initVar('attachid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('catid', JIEQI_TYPE_INT, 0, '�����', false, 11);
		$this->initVar('uid', JIEQI_TYPE_INT, 0, '�û����', false, 11);
		$this->initVar('name', JIEQI_TYPE_TXTBOX, '', '��������', true, 80);
        $this->initVar('class', JIEQI_TYPE_TXTBOX, '', '��������', true, 30);
		$this->initVar('postfix', JIEQI_TYPE_TXTBOX, '', '������׺', true, 30);
		$this->initVar('filebak', JIEQI_TYPE_TXTBOX, '', '����˵��', true, 50);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ļ���С', false, 11);
		$this->initVar('url', JIEQI_TYPE_TXTBOX, '', '����·��', true, 100);
		$this->initVar('isdefault', JIEQI_TYPE_INT, 0, '�Ƿ�Ĭ�Ϸ���', false, 11);
		$this->initVar('uptime', JIEQI_TYPE_INT, 0, '�ϴ�ʱ��', false, 11);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiAttachsHandler extends JieqiObjectHandler
{
	function JieqiAttachsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='attachs';
	    $this->autoid='attachid';	
	    $this->dbname='space_attachs';
	}
}
?>