<?php
// $Id: forumcat.php 2004-03-04 $
//  ------------------------------------------------------------------------ 
//                                ��������                                     
//                    Copyright (c) 2004 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  ��ƣ����(juny)
//  ����: 377653@qq.com
//  ------------------------------------------------------------------------
jieqi_includedb();

class Jieqimembergroup extends JieqiObjectData
{
    //��������
    function Jieqimembergroup()
    {
        $this->JieqiObjectData();
        $this->initVar('membergid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('membergtitle', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqimembergroupHandler extends JieqiObjectHandler
{
	function JieqimembergroupHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='membergroup';
	    $this->autoid='membergid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_membergroup';
	}
}
?>