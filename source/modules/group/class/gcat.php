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
//blog����
class Jieqigcat extends JieqiObjectData
{
    //��������
    function Jieqigcat()
    {
        $this->JieqiObjectData();
        $this->initVar('gcatid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('gcatname', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
        $this->initVar('gcatorder', JIEQI_TYPE_INT, 0, '����', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqigcatHandler extends JieqiObjectHandler
{
	function JieqigcatHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='gcat';
	    $this->autoid='gcatid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_gcat';
	}
}
?>