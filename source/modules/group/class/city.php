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
class Jieqicity extends JieqiObjectData
{
    //��������
    function Jieqicity()
    {
        $this->JieqiObjectData();
        $this->initVar('cityid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('country', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
        $this->initVar('province', JIEQI_TYPE_TXTBOX, '', '����', true, 6);
		$this->initVar('city', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
		$this->initVar('area', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
		$this->initVar('postcode', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
		$this->initVar('areacode', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqicityHandler extends JieqiObjectHandler
{
	function JieqicityHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='city';
	    $this->autoid='cityid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_city';
	}
}
?>