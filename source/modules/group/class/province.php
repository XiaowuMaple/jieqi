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
class JieqiProvince extends JieqiObjectData
{
    //��������
    function JieqiProvince()
    {
        $this->JieqiObjectData();
        $this->initVar('provinceid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('province', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
        $this->initVar('country', JIEQI_TYPE_TXTBOX, '', '����', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiProvinceHandler extends JieqiObjectHandler
{
	function JieqiProvinceHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='Province';
	    $this->autoid='provinceid';	
	    $this->dbname=JIEQI_MODULE_NAME.'_province';
	}
}
?>