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
//group party

class Jieqiparty extends JieqiObjectData
{
    //��������
    function Jieqiparty()
    {
        $this->JieqiObjectData();
        $this->initVar('pid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('ptitle', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqipartyHandler extends JieqiObjectHandler
{
	function JieqipartyHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='party';
	    $this->autoid='pid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_party';
	}
}
?>