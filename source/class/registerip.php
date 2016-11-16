<?php
/**
 * ���ݱ���(jieqi_system_registerip - ע���û�IP��¼��)
 *
 * ���ݱ���(jieqi_system_registerip - ע���û�IP��¼��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: registerip.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//�û�������־
class JieqiRegisterip extends JieqiObjectData
{ 
    //��������
    function JieqiRegisterip()
    {
        $this->JieqiObjectData();
        $this->initVar('ip', JIEQI_TYPE_TXTBOX, 0, 'ע����IP', false, 15);
        $this->initVar('regtime', JIEQI_TYPE_INT, 0, 'ע��ʱ��', false, 11);
        $this->initVar('count', JIEQI_TYPE_INT, 0, '����', false, 6);
    }
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//�û����
class JieqiRegisteripHandler extends JieqiObjectHandler
{
    function JieqiRegisteripHandler($db='')
    {
        $this->JieqiObjectHandler($db);
        $this->basename='registerip';
        $this->autoid='';
        $this->dbname='system_registerip';
    }
}
?>