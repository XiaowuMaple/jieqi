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
//group partyreply

class Jieqipartyreply extends JieqiObjectData
{
    //��������
    function Jieqipartyreply()
    {
        $this->JieqiObjectData();
        $this->initVar('rid', JIEQI_TYPE_INT, 0, '���', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqipartyreplyHandler extends JieqiObjectHandler
{
	function JieqipartyreplyHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='partyreply';
	    $this->autoid='rid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_partyreply';
	}
}
?>