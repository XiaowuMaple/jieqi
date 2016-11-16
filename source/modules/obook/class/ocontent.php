<?php 
/**
 * ���ݱ���(jieqi_obook_ocontent - �������½�����)
 *
 * ���ݱ���(jieqi_obook_ocontent - �������½�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    obook
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: ocontent.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();

class JieqiOcontent extends JieqiObjectData
{
    //��������
    function JieqiOcontent()
    {
        $this->JieqiObjectData();
        $this->initVar('ocontentid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('ochapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
        $this->initVar('ocontent', JIEQI_TYPE_TXTAREA, '', '�½�����', true, NULL);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiOcontentHandler extends JieqiObjectHandler
{
	
	function JieqiOcontentHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='ocontent';
	    $this->autoid='ocontentid';	
	    $this->dbname='obook_ocontent';
	}
}

?>