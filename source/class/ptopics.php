<?php 
/**
 * ���ݱ���(jieqi_system_ptopics - ��������������)
 *
 * ���ݱ���(jieqi_system_ptopics - ��������������)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: ptopics.php 329 2009-02-07 01:21:38Z juny $
 */

jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/topics.php');
//�û����������
class JieqiPtopics extends JieqiTopics
{
    //��������
    function JieqiPtopics()
    {
        $this->JieqiTopics();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiPtopicsHandler extends JieqiObjectHandler
{
	function JieqiPtopicsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='ptopics';
	    $this->autoid='topicid';	
	    $this->dbname='system_ptopics';
	}
}

?>