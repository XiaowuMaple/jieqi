<?php 
/**
 * ���ݱ���(jieqi_system_pposts - ������������ݱ�)
 *
 * ���ݱ���(jieqi_system_pposts - ������������ݱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: pposts.php 329 2009-02-07 01:21:38Z juny $
 */

jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/posts.php');
//����һظ�
class JieqiPposts extends JieqiPosts
{
    //��������
    function JieqiPposts()
    {
        $this->JieqiPosts();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiPpostsHandler extends JieqiObjectHandler
{
	function JieqiPpostsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='pposts';
	    $this->autoid='postid';	
	    $this->dbname='system_pposts';
	}
}

?>