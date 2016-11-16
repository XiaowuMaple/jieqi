<?php 
/**
 * ���ݱ���(jieqi_article_draft - �ݸ���Ϣ��)
 *
 * ���ݱ���(jieqi_article_draft - �ݸ���Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: draft.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();
//�û���
class JieqiDraft extends JieqiObjectData
{
	//��������
	function JieqiDraft()
	{
		$this->JieqiObjectData();
		$this->initVar('draftid', JIEQI_TYPE_INT, 0, '���', false, 11);
		$this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', true, 11);
		$this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', '��������', false, 250);
		$this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
		$this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
		$this->initVar('lastupdate', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('draftname', JIEQI_TYPE_TXTBOX, '', '�½ڱ���', true, 250);
		$this->initVar('content', JIEQI_TYPE_TXTAREA, '', '�½�����', true, NULL);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ֽ���', false, 11);
		$this->initVar('note', JIEQI_TYPE_TXTAREA, '', '��ע', false, NULL);
		$this->initVar('drafttype', JIEQI_TYPE_INT, 0, '����', false, 1);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiDraftHandler extends JieqiObjectHandler
{
	function JieqiDraftHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='draft';
	    $this->autoid='draftid';	
	    $this->dbname='article_draft';
	}
}

?>