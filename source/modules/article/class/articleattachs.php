<?php
/**
 * ���ݱ���(jieqi_article_attachs - ���¸�����Ϣ��)
 *
 * ���ݱ���(jieqi_article_attachs - ���¸�����Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: articleattachs.php 230 2008-11-27 08:46:07Z juny $
 */

jieqi_includedb();
//��̳����
class JieqiArticleattachs extends JieqiObjectData
{
    //��������
    function JieqiArticleattachs()
    {       
        $this->JieqiObjectData();
        $this->initVar('attachid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('chapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
		$this->initVar('name', JIEQI_TYPE_TXTBOX, '', '��������', true, 80);
        $this->initVar('class', JIEQI_TYPE_TXTBOX, '', '��������', true, 30);
		$this->initVar('postfix', JIEQI_TYPE_TXTBOX, '', '������׺', true, 30);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ļ���С', false, 11);
		$this->initVar('hits', JIEQI_TYPE_INT, 0, '�����', false, 11);
		$this->initVar('needexp', JIEQI_TYPE_INT, 0, '��Ҫ����ֵ', false, 11);
		$this->initVar('uptime', JIEQI_TYPE_INT, 0, '�ϴ�ʱ��', false, 11);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiArticleattachsHandler extends JieqiObjectHandler
{
	function JieqiArticleattachsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='articleattachs';
	    $this->autoid='attachid';	
	    $this->dbname='article_attachs';
	}
}
?>