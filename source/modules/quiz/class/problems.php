<?php 
// $Id: article.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();

class JieqiProblems extends JieqiObjectData
{
	//��������
	function JieqiProblems()
	{
		$this->JieqiObjectData();//�������
		$this->initVar('quizid', JIEQI_TYPE_INT, 0, '���', true,11);
		$this->initVar('tags', JIEQI_TYPE_TXTBOX, 0, 'tag��ǩ', false,50);
		$this->initVar('typeid', JIEQI_TYPE_INT, 0, '���', false, 11);
		$this->initVar('title', JIEQI_TYPE_TXTBOX, 0, '����', false, 20);
		$this->initVar('content', JIEQI_TYPE_TXTBOX, 0, '����', false, null);
		$this->initVar('username', JIEQI_TYPE_TXTBOX, 0, '�û���', false, 11);
		$this->initVar('score', JIEQI_TYPE_INT, 0, '���ͷ�', false, 5);
		$this->initVar('addtime', JIEQI_TYPE_TXTBOX, 0, '���ʱ��', false, 11);
		$this->initVar('overtime', JIEQI_TYPE_TXTBOX, 0, '����ʱ��', false, 11);
		$this->initVar('typez', JIEQI_TYPE_INT, 0, '״̬', false, 3);
		$this->initVar('answer', JIEQI_TYPE_INT, 0, '��Ѵ�', false, 11);
		$this->initVar('readz', JIEQI_TYPE_INT, 0, '�������', false, 8);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiProblemsHandler extends JieqiObjectHandler
{
	function JieqiProblemsHandler($db='')
	{
		$this->JieqiObjectHandler($db);//ʵ�������ݿ����
		$this->basename='problems';
		$this->autoid='quizid';
		$this->dbname='quiz_problems';
	}
}

?>