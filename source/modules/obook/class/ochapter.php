<?php 
/**
 * ���ݱ���(jieqi_obook_ochapter - �������½�)
 *
 * ���ݱ���(jieqi_obook_ochapter - �������½�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: ochapter.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();

class JieqiOchapter extends JieqiObjectData
{
    //��������
    function JieqiOchapter()
    {
        $this->JieqiObjectData();
        $this->initVar('ochapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('obookid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('lastupdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('buytime', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('obookname', JIEQI_TYPE_TXTBOX, '', '��������', true, 100);
        $this->initVar('chaptername', JIEQI_TYPE_TXTBOX, '', '�½���', true, 100);
        $this->initVar('chaptertype', JIEQI_TYPE_INT, 0, '�½�����', false, 1);
        $this->initVar('chapterorder', JIEQI_TYPE_INT, 0, '�½�����', false, 6);
        $this->initVar('volumeid', JIEQI_TYPE_INT, 0, '�־����', false, 11);
        $this->initVar('ointro', JIEQI_TYPE_TXTAREA, '', '���ݼ��', false, NULL);
        $this->initVar('size', JIEQI_TYPE_INT, 0, '����', false, 11);
        $this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 50);
        $this->initVar('toptime', JIEQI_TYPE_INT, 0, '�ö�ʱ��', false, 11);
        $this->initVar('picflag', JIEQI_TYPE_INT, 0, 'ͼƬ��־', false, 1);      
        $this->initVar('saleprice', JIEQI_TYPE_INT, 0, '���ۼ۸�', false, 11);
        $this->initVar('vipprice', JIEQI_TYPE_INT, 0, '�Żݼ۸�', false, 11);
        $this->initVar('sumegold', JIEQI_TYPE_INT, 0, '��������۶�', false, 11);
        $this->initVar('sumesilver', JIEQI_TYPE_INT, 0, '���������۶�', false, 11);
        $this->initVar('normalsale', JIEQI_TYPE_INT, 0, '��ͨ�۸�������', false, 11);
        $this->initVar('vipsale', JIEQI_TYPE_INT, 0, 'VIP�۸�������', false, 11);
        $this->initVar('freesale', JIEQI_TYPE_INT, 0, '����Ķ�������', false, 11);
        $this->initVar('bespsale', JIEQI_TYPE_INT, 0, '�����Ķ�������', false, 11);
        $this->initVar('totalsale', JIEQI_TYPE_INT, 0, '�ϼ�������', false, 11);
        $this->initVar('daysale', JIEQI_TYPE_INT, 0, '����������', false, 11);
        $this->initVar('weeksale', JIEQI_TYPE_INT, 0, '����������', false, 11);
        $this->initVar('monthsale', JIEQI_TYPE_INT, 0, '����������', false, 11);
        $this->initVar('allsale', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('lastsale', JIEQI_TYPE_INT, 0, '�������ʱ��', false, 11);
        $this->initVar('canvip', JIEQI_TYPE_INT, 0, '�Ƿ�����VIP�Ķ�', false, 1);
        $this->initVar('canfree', JIEQI_TYPE_INT, 0, '�Ƿ���������Ķ�', false, 1);
        $this->initVar('canbesp', JIEQI_TYPE_INT, 0, '�Ƿ���������Ķ�', false, 1);
        $this->initVar('state', JIEQI_TYPE_INT, 0, '״̬', false, 1);
        $this->initVar('flag', JIEQI_TYPE_INT, 0, '��־', false, 1);
        $this->initVar('display', JIEQI_TYPE_INT, 0, '�Ƿ���ʾ', false, 1);
    }
    
    function getSalestatus($display=''){
    	global $jieqiLang;
    	jieqi_loadlang('obook', 'obook');
    	if($display=='') $display=$this->getVar('display', 'n');
    	switch($display){
    		case 1:
    		return $jieqiLang['obook']['obook_status_noauth'];
    		case 2:
    		return $jieqiLang['obook']['obook_status_unsale'];
    		case 0:
    		default:
    		return $jieqiLang['obook']['obook_status_sale'];
    	}
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiOchapterHandler extends JieqiObjectHandler
{
	
	function JieqiOchapterHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='ochapter';
	    $this->autoid='ochapterid';	
	    $this->dbname='obook_ochapter';
	}
}

?>