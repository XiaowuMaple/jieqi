<?php 
// $Id: article.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();

class JieqiAnswer extends JieqiObjectData
{
	//��������
	function JieqiAnswer()
	{
		$this->JieqiObjectData();//�������
		$this->initVar('answerid', JIEQI_TYPE_INT, 0, '���', true,11);
		$this->initVar('problemid', JIEQI_TYPE_INT, 0, 'tag����', false,11);
		$this->initVar('content', JIEQI_TYPE_TXTBOX, 0, 'tag���¹���', false, 11);
		$this->initVar('addtime', JIEQI_TYPE_TXTBOX, 0, 'tag���', false, 11);
		$this->initVar('username', JIEQI_TYPE_TXTBOX, 0, 'tag���', false, 11);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiAnswerHandler extends JieqiObjectHandler
{
	function JieqiAnswerHandler($db='')
	{
		$this->JieqiObjectHandler($db);//ʵ�������ݿ����
		$this->basename='answer';
		$this->autoid='answerid';
		$this->dbname='quiz_answer';
	}
}

?>