<?php
/**
 * ���ݱ���(jieqi_system_modules - ģ����Ϣ��)
 *
 * ���ݱ���(jieqi_system_modules - ģ����Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: modules.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//ģ����
class JieqiModules extends JieqiObjectData
{
    //��������
    function JieqiModules()
    {
        $this->initVar('mid', JIEQI_TYPE_INT, 0, '���', false, 5);
        $this->initVar('name', JIEQI_TYPE_TXTBOX, '', 'ģ������', true, 50);
        $this->initVar('caption', JIEQI_TYPE_TXTBOX, '', 'ģ�����', false, 50);
        $this->initVar('description', JIEQI_TYPE_TXTAREA, '', 'ģ������', false, NULL);
        $this->initVar('version', JIEQI_TYPE_INT, 0, '�汾', false, 3);
        $this->initVar('vtype', JIEQI_TYPE_TXTBOX, '', '�汾����', false, 30);
        $this->initVar('lastupdate', JIEQI_TYPE_INT, 0, '������', false, 10);
        $this->initVar('weight', JIEQI_TYPE_INT, 0, '����˳��', false, 8);
        $this->initVar('publich', JIEQI_TYPE_INT, 0, '�Ƿ񼤻�', false, 1);
        $this->initVar('modtype', JIEQI_TYPE_INT, 0, 'ģ������', false, 1);
    }
	
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//������
class JieqiModulesHandler extends JieqiObjectHandler
{
	function JieqiModulesHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='modules';
	    $this->autoid='mid';	
	    $this->dbname='system_modules';
	}
}
?>