<?php 
/**
 * ���ݱ���(jieqi_article_avote - ����ͶƱ�����)
 *
 * ���ݱ���(jieqi_article_avote - ����ͶƱ�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: avote.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();
//����
class JieqiAvote extends JieqiObjectData
{
    //��������
    function JieqiAvote()
    {
        $this->JieqiObjectData();
        $this->initVar('voteid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', true, 11);
        $this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);    
        $this->initVar('posttime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('title', JIEQI_TYPE_TXTBOX, '', 'ͶƱ����', true, 100);
        $this->initVar('item1', JIEQI_TYPE_TXTBOX, '', 'ѡ��1', false, 100);
        $this->initVar('item2', JIEQI_TYPE_TXTBOX, '', 'ѡ��2', false, 100);
        $this->initVar('item3', JIEQI_TYPE_TXTBOX, '', 'ѡ��3', false, 100);
        $this->initVar('item4', JIEQI_TYPE_TXTBOX, '', 'ѡ��4', false, 100);
        $this->initVar('item5', JIEQI_TYPE_TXTBOX, '', 'ѡ��5', false, 100);
        $this->initVar('item6', JIEQI_TYPE_TXTBOX, '', 'ѡ��6', false, 100);
        $this->initVar('item7', JIEQI_TYPE_TXTBOX, '', 'ѡ��7', false, 100);
        $this->initVar('item8', JIEQI_TYPE_TXTBOX, '', 'ѡ��8', false, 100);
        $this->initVar('item9', JIEQI_TYPE_TXTBOX, '', 'ѡ��9', false, 100);
        $this->initVar('item10', JIEQI_TYPE_TXTBOX, '', 'ѡ��10', false, 100);
        $this->initVar('useitem', JIEQI_TYPE_INT, 0, '��Чѡ��', false, 2);
        $this->initVar('description', JIEQI_TYPE_TXTAREA, '', '����', false, NULL);
        $this->initVar('ispublish', JIEQI_TYPE_INT, 0, '�Ƿ񷢲�', false, 1);
        $this->initVar('mulselect', JIEQI_TYPE_INT, 0, '�Ƿ������ѡ', false, 1);
        $this->initVar('timelimit', JIEQI_TYPE_INT, 0, '�Ƿ�����ʱ��', false, 1);
        $this->initVar('needlogin', JIEQI_TYPE_INT, 0, '�Ƿ���Ҫ��¼', false, 1);
        $this->initVar('starttime', JIEQI_TYPE_INT, 0, '��ʼʱ��', false, 11);
        $this->initVar('endtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiAvoteHandler extends JieqiObjectHandler
{
	function JieqiAvoteHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='avote';
	    $this->autoid='voteid';	
	    $this->dbname='article_avote';
	}
}

?>