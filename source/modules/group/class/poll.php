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
//group poll

class Jieqipoll extends JieqiObjectData
{
    //��������
    function Jieqipoll()
    {
        $this->JieqiObjectData();
        $this->initVar('topicid', JIEQI_TYPE_INT, 0, '���', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqipollHandler extends JieqiObjectHandler
{
	function JieqipollHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='poll';
	    $this->autoid='topicid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_poll';
	}
}
?>