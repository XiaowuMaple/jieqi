<?php 
// $Id: article.php 2004-02-21 $
//  ------------------------------------------------------------------------
//  JIEQI CMS
//  Copyright (c) jieqi.com All rights reserved.
//  http://www.jieqi.com/
//  ------------------------------------------------------------------------
jieqi_includedb();

class JieqiTag extends JieqiObjectData
{
	//��������
	function JieqiTag()
	{
		$this->JieqiObjectData();//�������
		$this->initVar('tagid', JIEQI_TYPE_INT, 0, '���', true,11);
		$this->initVar('tagname', JIEQI_TYPE_TXTBOX, 0, 'tag����', false,50);
		$this->initVar('tagcontent', JIEQI_TYPE_TXTBOX, 0, 'tag���¹���', false, 11);
		$this->initVar('tagtype', JIEQI_TYPE_TXTBOX, 0, 'tag���', false, 11);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiTagHandler extends JieqiObjectHandler
{
	function JieqiTagHandler($db='')
	{
		$this->JieqiObjectHandler($db);//ʵ�������ݿ����
		$this->basename='tag';
		$this->autoid='tagid';
		$this->dbname='quiz_tag';
	}
}

?>