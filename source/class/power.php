<?php
/**
 * ���ݱ���(jieqi_system_power - Ȩ����Ϣ��)
 *
 * ���ݱ���(jieqi_system_power - Ȩ����Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: power.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//������
class JieqiPower extends JieqiObjectData
{

    //��������
    function JieqiPower()
    {
        $this->initVar('pid', JIEQI_TYPE_INT, 0, '���', false, 8);
        $this->initVar('modname', JIEQI_TYPE_TXTBOX, '', 'ģ������', true, 50);
        $this->initVar('pname', JIEQI_TYPE_TXTBOX, '', 'Ȩ������', true, 50);
        $this->initVar('ptitle', JIEQI_TYPE_TXTBOX, '', 'Ȩ�ޱ���', false, 50);
        $this->initVar('pdescription', JIEQI_TYPE_TXTAREA, '', 'Ȩ������', false, NULL);
        $this->initVar('pgroups', JIEQI_TYPE_TXTAREA, '', 'Ȩ������', false, NULL);
    }
	
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//������
class JieqiPowerHandler extends JieqiObjectHandler
{
	function JieqiPowerHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='power';
	    $this->autoid='pid';	
	    $this->dbname='system_power';
	}
	
	function getSavedVars($modname)
	{
	    global $jieqiPower;
	    $criteria=new CriteriaCompo(new Criteria('modname',$modname,'='));
	    $criteria->setSort('pid');
	    $criteria->setOrder('ASC');
	    $this->queryObjects($criteria);
	    while($v = $this->getObject()){
	        $jieqiPower[$modname][$v->getVar('pname','n')]=array('caption'=>$v->getVar('ptitle'), 'groups'=>unserialize($v->getVar('pgroups','n')), 'description'=>$v->getVar('pdescription'));	        
	    }
	    
	}
}
?>