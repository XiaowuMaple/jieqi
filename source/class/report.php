<?php 
/**
 * ���ݱ���(jieqi_system_report - �û�������Ϣ��)
 *
 * ���ݱ���(jieqi_system_report - �û�������Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: report.php 301 2008-12-26 04:36:17Z juny $
 */

jieqi_includedb();
//�û���
class JieqiReport extends JieqiObjectData
{
    //��������
    function JieqiReport()
    {
        $this->JieqiObjectData();
        $this->initVar('reportid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('reporttime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('reportuid', JIEQI_TYPE_INT, 0, '���������', true, 11);
        $this->initVar('reportname', JIEQI_TYPE_TXTBOX, '', '����������', false, 30);
        $this->initVar('authtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('authuid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('authname', JIEQI_TYPE_TXTBOX, '', '����������', false, 30);
        $this->initVar('reporttitle', JIEQI_TYPE_TXTBOX, '', '�������', false, 250);
        $this->initVar('reporttext', JIEQI_TYPE_TXTAREA, '', '��������', true, NULL);
        $this->initVar('reportsize', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('reportfield', JIEQI_TYPE_TXTBOX, '', '�����ύ�ַ���', false, 250);
        $this->initVar('authnote', JIEQI_TYPE_TXTAREA, '', '����ע', true, NULL);
        $this->initVar('reportsort', JIEQI_TYPE_INT, 0, '����������', false, 6);  
        $this->initVar('reporttype', JIEQI_TYPE_INT, 0, '�����ӷ���', false, 6);  
        $this->initVar('authflag', JIEQI_TYPE_INT, 0, '��˱�־', false, 3);  
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiReportHandler extends JieqiObjectHandler
{
	function JieqiReportHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='report';
	    $this->autoid='reportid';	
	    $this->dbname='system_report';
	}
}

?>