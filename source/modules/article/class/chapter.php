<?php 
/**
 * ���ݱ���(jieqi_article_chapter - �½ڱ�)
 *
 * ���ݱ���(jieqi_article_chapter - �½ڱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: chapter.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();
//�û���
class JieqiChapter extends JieqiObjectData
{
	//��������
	function JieqiChapter()
	{
		$this->JieqiObjectData();
		$this->initVar('chapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
		$this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
		$this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', true, 11);
		$this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', '��������', false, 250);
		$this->initVar('volumeid', JIEQI_TYPE_INT, 0, '�����', true, 11);
		$this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
		$this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
		$this->initVar('lastupdate', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('chaptername', JIEQI_TYPE_TXTBOX, '', '�½ڱ���', true, 250);
		$this->initVar('chapterorder', JIEQI_TYPE_INT, 0, '�½�����', false, 6);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ֽ���', false, 11);
		$this->initVar('saleprice', JIEQI_TYPE_INT, 0, '���ۼ۸�', false, 11);
        $this->initVar('salenum', JIEQI_TYPE_INT, 0, '������', false, 11);
        $this->initVar('totalcost', JIEQI_TYPE_INT, 0, '�����۶�', false, 11);
        $this->initVar('attachment', JIEQI_TYPE_TXTAREA, '', '����', false, NULL);
        $this->initVar('isvip', JIEQI_TYPE_INT, 0, '�Ƿ��������', false, 1);
		$this->initVar('chaptertype', JIEQI_TYPE_INT, 0, '�½�����', false, 1);
		$this->initVar('power', JIEQI_TYPE_INT, 0, '���ʼ���', false, 1);
		$this->initVar('display', JIEQI_TYPE_INT, 0, '��ʾ', false, 1);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiChapterHandler extends JieqiObjectHandler
{
	function JieqiChapterHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='chapter';
	    $this->autoid='chapterid';	
	    $this->dbname='article_chapter';
	}
}

?>