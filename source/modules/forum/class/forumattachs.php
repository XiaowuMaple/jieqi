<?php
/**
 * ���ݱ���(jieqi_forum_attachs - ���Ӹ�����)
 *
 * ���ݱ���(jieqi_forum_attachs - ���Ӹ�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumattachs.php 329 2009-02-07 01:21:38Z juny $
 */

jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/attachs.php');
//��̳����
class JieqiForumattachs extends JieqiAttachs
{
    //��������
    function JieqiForumattachs()
    {       
        $this->JieqiAttachs();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiForumattachsHandler extends JieqiObjectHandler
{
	function JieqiForumattachsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='forumattachs';
	    $this->autoid='attachid';	
	    $this->dbname='forum_attachs';
	}
}
?>