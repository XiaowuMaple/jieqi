<?php 
// $Id: post.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();
class JieqiSpaceBlogCat extends JieqiObjectData
{
    //��������
    function JieqiSpaceBlogCat()
    {
        $this->JieqiObjectData();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiSpaceBlogCatHandler extends JieqiObjectHandler
{
	function JieqiSpaceBlogCatHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='SpaceBlogCat';
	    $this->autoid='id';	
	    $this->dbname='space_blogcat';
	}
}

?>
