<?php 
/**
 * ���ݱ���(jieqi_article_bookcase - ��ܱ�)
 *
 * ���ݱ���(jieqi_article_bookcase - ��ܱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: bookcase.php 230 2008-11-27 08:46:07Z juny $
 */

jieqi_includedb();
//�û���
class JieqiBookcase extends JieqiObjectData
{
	//��������
	function JieqiBookcase()
	{
		$this->JieqiObjectData();
		$this->initVar('caseid', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', true, 11);
		$this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', '��������', false, 250);
		$this->initVar('classid', JIEQI_TYPE_INT, 0, '�������', false, 3);
		$this->initVar('userid', JIEQI_TYPE_INT, 0, '�û����', true, 11);
        $this->initVar('username', JIEQI_TYPE_TXTBOX, '', '�û���', false, 30);
        $this->initVar('chapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
        $this->initVar('chaptername', JIEQI_TYPE_TXTBOX, '', '�½�����', false, 250);
        $this->initVar('chapterorder', JIEQI_TYPE_INT, 0, '�½ڴ���', false, 6);
		$this->initVar('joindate', JIEQI_TYPE_INT, 0, '�ղ�����', false, 11);
		$this->initVar('lastvisit', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('flag', JIEQI_TYPE_INT, 0, '��־', false, 1);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiBookcaseHandler extends JieqiObjectHandler
{
	function JieqiBookcaseHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='bookcase';
	    $this->autoid='caseid';	
	    $this->dbname='article_bookcase';
	}
}

?>