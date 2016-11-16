<?php 
// $Id: review.php 337 2009-03-07 00:51:05Z juny $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();
//�û���
class JieqiReview extends JieqiObjectData
{
    //��������
    function JieqiReview()
    {
        $this->JieqiObjectData();
        $this->initVar('reviewid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', true, 11);
        $this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', '��������', false, 250);
        $this->initVar('userid', JIEQI_TYPE_INT, 0, '�û����', false, 11);
        $this->initVar('username', JIEQI_TYPE_TXTBOX, '', '�û���', false, 30);
        $this->initVar('reviewtitle', JIEQI_TYPE_TXTBOX, '', '���۱���', false, 250);
        $this->initVar('reviewtext', JIEQI_TYPE_TXTAREA, '', '��������', true, null);
        $this->initVar('topflag', JIEQI_TYPE_INT, 0, '�ö�', false, 1);
        $this->initVar('goodflag', JIEQI_TYPE_INT, 0, '����', false, 1);
        $this->initVar('display', JIEQI_TYPE_INT, 0, '��ʾ', false, 1);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiReviewHandler extends JieqiObjectHandler
{
	function JieqiReviewHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='review';
	    $this->autoid='topicid';	
	    $this->dbname='article_review';
	}
}

?>