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

class Jieqiadmingroup extends JieqiObjectData
{
    //��������
    function Jieqiadmingroup()
    {
        $this->JieqiObjectData();
        $this->initVar('admingid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('admingtitle', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiadmingroupHandler extends JieqiObjectHandler
{
	function JieqiadmingroupHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='admingroup';
	    $this->autoid='admingid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_admingroup';
	}
}
?>