<?php
/**
 * ���ݱ���(jieqi_forum_forumtopics - ���������)
 *
 * ���ݱ���(jieqi_forum_forumtopics - ���������)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumtopics.php 329 2009-02-07 01:21:38Z juny $
 */


jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/topics.php');
//��̳���
class JieqiForumtopics extends JieqiTopics
{
    //��������
    function JieqiForumtopics()
    {       
        $this->JieqiTopics();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiForumtopicsHandler extends JieqiObjectHandler
{
	function JieqiForumtopicsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='forumtopics';
	    $this->autoid='topicid';	
	    $this->dbname='forum_forumtopics';
	}
}
?>