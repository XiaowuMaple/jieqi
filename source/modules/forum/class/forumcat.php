<?php
/**
 * ���ݱ���(jieqi_forum_forumcat - ��̳�����)
 *
 * ���ݱ���(jieqi_forum_forumcat - ��̳�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumcat.php 253 2008-11-28 03:21:13Z juny $
 */

jieqi_includedb();
//��̳����
class JieqiForumcat extends JieqiObjectData
{
    //��������
    function JieqiForumcat()
    {
        $this->JieqiObjectData();
        $this->initVar('catid', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('cattitle', JIEQI_TYPE_TXTBOX, '', '�������', true, 100);
        $this->initVar('catorder', JIEQI_TYPE_INT, 0, '����', false, 6);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiForumcatHandler extends JieqiObjectHandler
{
	function JieqiForumcatHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='forumcat';
	    $this->autoid='catid';	
	    $this->dbname='forum_forumcat';
	}
}
?>