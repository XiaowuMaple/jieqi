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
//group sign

class Jieqisign extends JieqiObjectData
{
    //��������
    function Jieqisign()
    {
        $this->JieqiObjectData();
        $this->initVar('signid', JIEQI_TYPE_INT, 0, '���', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqisignHandler extends JieqiObjectHandler
{
	function JieqisignHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='sign';
	    $this->autoid='signid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_sign';
	}
}
?>