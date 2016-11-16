<?php 
/**
 * ���ݱ���(jieqi_obook_osale - ���������ۼ�¼)
 *
 * ���ݱ���(jieqi_obook_osale - ���������ۼ�¼)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: osale.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();

class JieqiOsale extends JieqiObjectData
{
    //��������
    function JieqiOsale()
    {
        $this->JieqiObjectData();   
        $this->initVar('osaleid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('buytime', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('accountid', JIEQI_TYPE_INT, 0, '�ʺ�id', false, 11);
        $this->initVar('account', JIEQI_TYPE_TXTBOX, '', '�ʺ�����', false, 30);
        $this->initVar('obookid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('ochapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
        $this->initVar('obookname', JIEQI_TYPE_TXTBOX, '', '��������', true, 100);
        $this->initVar('chaptername', JIEQI_TYPE_TXTBOX, '', '�½���', true, 100);
        $this->initVar('saleprice', JIEQI_TYPE_INT, 0, '���ۼ۸�', false, 11);
        $this->initVar('pricetype', JIEQI_TYPE_INT, 0, '�۸�����', false, 1);  
        $this->initVar('paytype', JIEQI_TYPE_INT, 0, '֧����ʽ', false, 1);  
        $this->initVar('payflag', JIEQI_TYPE_INT, 0, '֧����־', false, 1);  
        $this->initVar('paynote', JIEQI_TYPE_TXTAREA, '', '��ע', false, NULL);  
        $this->initVar('state', JIEQI_TYPE_INT, 0, '״̬', false, 1);
        $this->initVar('flag', JIEQI_TYPE_INT, 0, '��־', false, 1);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiOsaleHandler extends JieqiObjectHandler
{
	
	function JieqiOsaleHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='osale';
	    $this->autoid='osaleid';	
	    $this->dbname='obook_osale';
	}
}

?>