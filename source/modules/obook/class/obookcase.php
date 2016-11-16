<?php 
/**
 * ���ݱ���(jieqi_obook_obookcase - ���������)
 *
 * ���ݱ���(jieqi_obook_obookcase - ���������)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: obookcase.php 231 2008-11-27 08:46:26Z juny $
 */

jieqi_includedb();
//�û���
class JieqiObookcase extends JieqiObjectData
{
	//��������
	function JieqiObookcase()
	{
		$this->JieqiObjectData();
		$this->initVar('ocaseid', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('obookid', JIEQI_TYPE_INT, 0, '���������', true, 11);
		$this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('obookname', JIEQI_TYPE_TXTBOX, '', '����������', false, 250);
		$this->initVar('userid', JIEQI_TYPE_INT, 0, '�û����', true, 11);
        $this->initVar('username', JIEQI_TYPE_TXTBOX, '', '�û���', false, 30);
        $this->initVar('ochapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
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
class JieqiObookcaseHandler extends JieqiObjectHandler
{
	function JieqiObookcaseHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='obookcase';
	    $this->autoid='ocaseid';	
	    $this->dbname='obook_obookcase';
	}
}

?>