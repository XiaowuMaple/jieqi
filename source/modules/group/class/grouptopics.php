<?php
/**
 * ���ݱ���(jieqi_group_topics - ���������)
 *
 * ���ݱ���(jieqi_group_topics - ���������)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: lee $
 * @version    $Id: grouptopics.php 329 2009-02-07 01:21:38Z lee $
 */


jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/topics.php');
//���Ự����
class JieqiGrouptopics extends JieqiTopics
{
    //��������
    function JieqiGrouptopics()
    {       
        $this->JieqiTopics();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiGrouptopicsHandler extends JieqiObjectHandler
{
	function JieqiGrouptopicsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='grouptopics';
	    $this->autoid='topicid';	
	    $this->dbname='group_topics';
	}
}
?>