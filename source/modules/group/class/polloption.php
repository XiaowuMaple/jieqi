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
//group polloption

class Jieqipolloption extends JieqiObjectData
{
    //��������
    function Jieqipolloption()
    {
        $this->JieqiObjectData();
        $this->initVar('polloptionid', JIEQI_TYPE_INT, 0, '���', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqipolloptionHandler extends JieqiObjectHandler
{
	function JieqipolloptionHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='polloption';
	    $this->autoid='polloptionid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_polloption';
	}
}
?>