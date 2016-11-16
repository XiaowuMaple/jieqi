<?php 
/**
 * ���ݱ���(jieqi_article_applywriter - ���������¼)
 *
 * ���ݱ���(jieqi_article_applywriter - ���������¼)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: applywriter.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();
class JieqiApplywriter extends JieqiObjectData
{
    //��������
    function JieqiApplywriter()
    {
        $this->JieqiObjectData();
        $this->initVar('applyid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('applytime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('applyuid', JIEQI_TYPE_INT, 0, '���������', true, 11);
        $this->initVar('applyname', JIEQI_TYPE_TXTBOX, '', '����������', false, 30);
        $this->initVar('penname', JIEQI_TYPE_TXTBOX, '', '�����ǳ�', false, 30);
        $this->initVar('authtime', JIEQI_TYPE_INT, 0, '���ʱ��', false, 11);
        $this->initVar('authuid', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('authname', JIEQI_TYPE_TXTBOX, '', '���������', false, 30);
        $this->initVar('applytitle', JIEQI_TYPE_TXTBOX, '', '�������', false, 250);
        $this->initVar('applytext', JIEQI_TYPE_TXTAREA, '', '��������', true, NULL);
        $this->initVar('applysize', JIEQI_TYPE_INT, 0, '������������', false, 11);
        $this->initVar('authnote', JIEQI_TYPE_TXTAREA, '', '����ע', true, NULL);
        $this->initVar('applyflag', JIEQI_TYPE_INT, 0, '��˱�־', false, 1);  
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiApplywriterHandler extends JieqiObjectHandler
{
	function JieqiApplywriterHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='applywriter';
	    $this->autoid='applyid';	
	    $this->dbname='article_applywriter';
	}
}

?>