<?php 
// $Id: photo.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();
class Jieqiphoto extends JieqiObjectData
{
    //��������
    function Jieqiphoto()
    {
        $this->JieqiObjectData();
        $this->initVar('photoid', JIEQI_TYPE_INT, 0, '���', false, 11);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiphotoHandler extends JieqiObjectHandler
{
	function JieqiphotoHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='photo';
	    $this->autoid='photoid';	
	    $this->dbname='group_photo';
	}
}

?>