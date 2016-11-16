<?php
/**
 * ���ݱ���(jieqi_system_configs - ϵͳ���ò�����)
 *
 * ���ݱ���(jieqi_system_configs - ϵͳ���ò�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: configs.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//������
class JieqiConfigs extends JieqiObjectData
{

    //��������
    function JieqiConfigs()
    {
        $this->initVar('cid', JIEQI_TYPE_INT, 0, '���', false, 8);
        $this->initVar('modname', JIEQI_TYPE_TXTBOX, '', 'ģ������', true, 50);
        $this->initVar('cname', JIEQI_TYPE_TXTBOX, '', '��������', true, 50);
        $this->initVar('ctitle', JIEQI_TYPE_TXTBOX, '', '���ñ���', false, 50);
        $this->initVar('cvalue', JIEQI_TYPE_TXTAREA, '', '����ֵ', false, NULL);
        $this->initVar('cdescription', JIEQI_TYPE_TXTAREA, '', '��������', false, NULL);
        $this->initVar('cdefine', JIEQI_TYPE_INT, 0, '�Ƿ���', false, 1);
        $this->initVar('ctype', JIEQI_TYPE_INT, 0, '��������', false, 1);
        $this->initVar('options', JIEQI_TYPE_TXTAREA, '', '����ѡ��', false, NULL);
    }
	
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//������
class JieqiConfigsHandler extends JieqiObjectHandler
{
	function JieqiConfigsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='configs';
	    $this->autoid='cid';	
	    $this->dbname='system_configs';
	}
	
}
?>