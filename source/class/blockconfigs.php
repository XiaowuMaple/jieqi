<?php
/**
 * ���ݱ���(jieqi_system_blockconfigs - ϵͳ���������ļ�������)
 *
 * ���ݱ���(jieqi_system_blockconfigs - ϵͳ���������ļ�������)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: manageblocks 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//������
class JieqiBlockconfigs extends JieqiObjectData
{

    //��������
    function JieqiBlockconfigs()
    {
        $this->initVar('id', JIEQI_TYPE_INT, 0, '���', false, 8);
        $this->initVar('modules', JIEQI_TYPE_TXTBOX, '', '����ģ��', true, 50);
        $this->initVar('name', JIEQI_TYPE_TXTBOX, '', '�����ļ�˵��', true, 50);
        $this->initVar('file', JIEQI_TYPE_TXTBOX, '', '�ļ�����', false, 50);
    }
	
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//������
class JieqiBlockconfigsHandler extends JieqiObjectHandler
{
	function JieqiBlockconfigsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='blockconfigs';
	    $this->autoid='id';	
	    $this->dbname='system_blockconfigs';
	}
	
}
?>