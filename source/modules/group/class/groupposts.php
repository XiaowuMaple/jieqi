<?php 
/**
 * ���ݱ���(jieqi_group_groupposts - �������ݱ�)
 *
 * ���ݱ���(jieqi_group_groupposts - �������ݱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: lee $
 * @version    $Id: groupposts.php 329 2009-02-07 01:21:38Z lee $
 */

jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/posts.php');
class JieqiGroupposts extends JieqiPosts
{
    //��������
    function JieqiGroupposts()
    {
        $this->JieqiPosts();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiGrouppostHandler extends JieqiObjectHandler
{
	function JieqiGrouppostHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='groupposts';
	    $this->autoid='postid';	
	    $this->dbname='group_posts';
	}
}

?>