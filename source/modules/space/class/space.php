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

class Jieqispace extends JieqiObjectData
{
    //��������
    function JieqiSpace()
    {
        $this->JieqiObjectData();
        $this->initVar('uid', JIEQI_TYPE_INT, 0, '���', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiSpaceHandler extends JieqiObjectHandler
{
	function JieqiSpaceHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='space';
	    $this->autoid='uid';	
	    $this->dbname='space_space';
	}
}
?>
