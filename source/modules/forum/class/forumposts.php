<?php 
/**
 * ���ݱ���(jieqi_forum_forumposts - �������ݱ�)
 *
 * ���ݱ���(jieqi_forum_forumposts - �������ݱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumposts.php 329 2009-02-07 01:21:38Z juny $
 */

jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/posts.php');
class JieqiForumposts extends JieqiPosts
{
    //��������
    function JieqiForumposts()
    {
        $this->JieqiPosts();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiForumpostsHandler extends JieqiObjectHandler
{
	function JieqiForumpostsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='forumposts';
	    $this->autoid='postid';	
	    $this->dbname='forum_forumposts';
	}
}

?>