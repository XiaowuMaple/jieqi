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

class Jieqigroup extends JieqiObjectData
{
    //��������
    function Jieqigroup()
    {
        $this->JieqiObjectData();
        $this->initVar('gid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('gname', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
        $this->initVar('gbrief', JIEQI_TYPE_TXTBOX, '', '', true, 100);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqigroupHandler extends JieqiObjectHandler
{
	function JieqigroupHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='group';
	    $this->autoid='gid';	
	    $this->dbname='group_group';
	}
}
?>