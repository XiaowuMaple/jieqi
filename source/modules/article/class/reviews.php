<?php 
jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/topics.php');
//����
class JieqiReviews extends JieqiTopics
{
    //��������
    function JieqiReviews()
    {
        $this->JieqiTopics();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiReviewsHandler extends JieqiObjectHandler
{
	function JieqiReviewsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='reviews';
	    $this->autoid='topicid';	
	    $this->dbname='article_reviews';
	}
}

?>