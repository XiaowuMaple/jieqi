<?php 
// $Id: article.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();
class JieqiSpaceBlogReview extends JieqiObjectData
{
    //��������
    function JieqiSpaceBlogReview()
    {
        $this->JieqiObjectData();
        $this->initVar('id', JIEQI_TYPE_INT, 0, '���', false, 11);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiSpaceBlogReviewHandler extends JieqiObjectHandler
{
	function JieqiSpaceBlogReviewHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='SpaceBlogReview';
	    $this->autoid='id';	
	    $this->dbname='space_blogreview';
	}
}

?>
