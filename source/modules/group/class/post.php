<?php 
// $Id: post.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();
class Jieqipost extends JieqiObjectData
{
    //��������
    function Jieqipost()
    {
        $this->JieqiObjectData();
        $this->initVar('postid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('topicid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('istopic', JIEQI_TYPE_INT, 0, '�Ƿ�����', false, 1);
        $this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
        $this->initVar('posttime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('posterip', JIEQI_TYPE_TXTBOX, '', '������IP', false, 25);
        $this->initVar('enablebbcode', JIEQI_TYPE_INT, 0, '�������', false, 1);
        $this->initVar('enablehtml', JIEQI_TYPE_INT, 0, '����HTML', false, 1);
        $this->initVar('enablesmilies', JIEQI_TYPE_INT, 0, '�������', false, 1);
        $this->initVar('enablesig', JIEQI_TYPE_INT, 0, '����ǩ��', false, 1);
        $this->initVar('edittime', JIEQI_TYPE_INT, 0, '�޸�ʱ��', false, 11);
        $this->initVar('editinfo', JIEQI_TYPE_TXTBOX, '', '�޸�����Ϣ', false, 255);
        $this->initVar('iconid', JIEQI_TYPE_INT, 0, 'ͼ��', false, 3);
        $this->initVar('attachsinfo', JIEQI_TYPE_TXTAREA, '', '������Ϣ', false, null);
        $this->initVar('postsubject', JIEQI_TYPE_TXTBOX, '', '����', false, 60);
        $this->initVar('posttext', JIEQI_TYPE_TXTAREA, '', '����', true, null);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqipostHandler extends JieqiObjectHandler
{
	function JieqipostHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='post';
	    $this->autoid='postid';	
	    $this->dbname='group_post';
	}
}

?>