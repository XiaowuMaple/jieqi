<?php 
/**
 * ���ݱ���(jieqi_obook_obuyinfo - �����鹺����Ϣ)
 *
 * ���ݱ���(jieqi_obook_obuyinfo - �����鹺����Ϣ)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: obuyinfo.php 231 2008-11-27 08:46:26Z juny $
 */

jieqi_includedb();

class JieqiObuyinfo extends JieqiObjectData
{
    //��������
    function JieqiObuyinfo()
    {
        $this->JieqiObjectData();    
        $this->initVar('obuyinfoid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('osaleid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('buytime', JIEQI_TYPE_INT, 0, '��������', false, 11);
        $this->initVar('userid', JIEQI_TYPE_INT, 0, '�û����', false, 11);
        $this->initVar('username', JIEQI_TYPE_TXTBOX, '', '�û�����', false, 30);
        $this->initVar('obookid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('ochapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
        $this->initVar('obookname', JIEQI_TYPE_TXTBOX, '', '��������', true, 100);
        $this->initVar('chaptername', JIEQI_TYPE_TXTBOX, '', '�½���', true, 100);
        $this->initVar('lastread', JIEQI_TYPE_INT, 0, '����Ķ�', false, 11);
        $this->initVar('readnum', JIEQI_TYPE_INT, 0, '�Ķ�����', false, 11);
        $this->initVar('checkcode', JIEQI_TYPE_TXTBOX, '', 'У����', false, 10);
        $this->initVar('state', JIEQI_TYPE_INT, 0, '״̬', false, 1);
        $this->initVar('flag', JIEQI_TYPE_INT, 0, '��־', false, 1);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiObuyinfoHandler extends JieqiObjectHandler
{
	
	function JieqiObuyinfoHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='obuyinfo';
	    $this->autoid='obuyinfoid';	
	    $this->dbname='obook_obuyinfo';
	}
}

?>