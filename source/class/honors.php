<?php
/**
 * ���ݱ���(jieqi_system_honors - �û�ͷ�α�)
 *
 * ���ݱ���(jieqi_system_honors - �û�ͷ�α�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: honors.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//�û���
class JieqiHonors extends JieqiObjectData
{
    function JieqiHonors()
    {
        $this->JieqiObject();
        $this->initVar('honorid', JIEQI_TYPE_INT, 0, '���', false, 5);
        $this->initVar('caption', JIEQI_TYPE_TXTBOX, '', 'ͷ������',true, 50);
        $this->initVar('minscore', JIEQI_TYPE_INT, 0, '��С����', false, 11);
        $this->initVar('maxscore', JIEQI_TYPE_INT, 0, '������', false, 11);
        $this->initVar('setting', JIEQI_TYPE_TXTAREA, '', '����', false, NULL);
        $this->initVar('honortype', JIEQI_TYPE_INT, 0, '����', false, 1);
    }
}

//�û�����
class JieqiHonorsHandler extends JieqiObjectHandler
{
	function JieqiHonorsHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='honors';
	    $this->autoid='honorid';	
	    $this->dbname='system_honors';
	}
}

?>