<?php
/**
 * ���ݱ���(jieqi_system_right - �û�Ȩ����Ϣ��)
 *
 * ���ݱ���(jieqi_system_right - �û�Ȩ����Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: right.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//������
class JieqiRight extends JieqiObjectData
{

    //��������
    function JieqiRight()
    {
        $this->initVar('rid', JIEQI_TYPE_INT, 0, '���', false, 8);
        $this->initVar('modname', JIEQI_TYPE_TXTBOX, '', 'ģ������', true, 50);
        $this->initVar('rname', JIEQI_TYPE_TXTBOX, '', 'Ȩ������', true, 50);
        $this->initVar('rtitle', JIEQI_TYPE_TXTBOX, '', 'Ȩ������', false, 50);
        $this->initVar('rdescription', JIEQI_TYPE_TXTAREA, '', 'Ȩ������', false, NULL);
        $this->initVar('rhonors', JIEQI_TYPE_TXTAREA, '', 'Ȩ������', false, NULL);
    }
	
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//������
class JieqiRightHandler extends JieqiObjectHandler
{
	function JieqiRightHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='right';
	    $this->autoid='bid';	
	    $this->dbname='system_right';
	}
	
	function getSavedVars($modname)
	{
	    global $jieqiRight;
	    $criteria=new CriteriaCompo(new Criteria('modname',$modname,'='));
	    $criteria->setSort('rid');
	    $criteria->setOrder('ASC');
	    $this->queryObjects($criteria);
	    while($v = $this->getObject()){
	        $jieqiRight[$modname][$v->getVar('rname','n')]=array('caption'=>$v->getVar('rtitle'), 'honors'=>unserialize($v->getVar('rhonors','n')), 'rescription'=>$v->getVar('rdescription'));	        
	    }
	    
	}
}
?>