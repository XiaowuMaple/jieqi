<?php 
jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/posts.php');
//����
class JieqiReplies extends JieqiPosts
{
    //��������
    function JieqiReplies()
    {
        $this->JieqiPosts();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiRepliesHandler extends JieqiObjectHandler
{
	function JieqiRepliesHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='replies';
	    $this->autoid='postid';	
	    $this->dbname='article_replies';
	}
}

?>