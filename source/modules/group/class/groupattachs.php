<?php
/**
 * ���ݱ���(jieqi_group_attachs - ���Ӹ�����)
 *
 * ���ݱ���(jieqi_group_attachs - ���Ӹ�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: lee $
 * @version    $Id: groupattachs.php 329 2009-02-12 01:21:38Z lee $
 */

jieqi_includedb();
include_once(JIEQI_ROOT_PATH.'/class/attachs.php');
//���Ự�⸽��
class JieqiGroupattachs extends JieqiAttachs
{
    //��������
    function JieqiGroupattachs()
    {       
        $this->JieqiAttachs();
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiGroupattachsHandler extends JieqiObjectHandler
{
	function JieqiGroupattachsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='groupattachs';
	    $this->autoid='attachid';	
	    $this->dbname='group_attachs';
	}
}
?>