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

class Jieqimember extends JieqiObjectData
{
    //��������
    function Jieqimember()
    {
        $this->JieqiObjectData();
        $this->initVar('mid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('uname', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqimemberHandler extends JieqiObjectHandler
{
	function JieqimemberHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='member';
	    $this->autoid='mid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_member';
	}
}
?>