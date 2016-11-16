<?php
/**
 * ���ݱ���(jieqi_system_userlink - �û��������ӱ�)
 *
 * ���ݱ���(jieqi_system_userlink - �û��������ӱ�)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: userlink.php 301 2008-12-26 04:36:17Z juny $
 */

jieqi_includedb();
//�û�������־
class JieqiUserlink extends JieqiObjectData
{ 
    //��������
    function JieqiUserlink()
    {
        $this->JieqiObjectData();
        $this->initVar('ulid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('ultitle', JIEQI_TYPE_TXTBOX, '', '��ַ����', false, 60);
        $this->initVar('ulurl', JIEQI_TYPE_TXTBOX, '', '��ַ', false, 100);
        $this->initVar('ulinfo', JIEQI_TYPE_TXTAREA, '', '��ַ˵��', false, NULL);
        $this->initVar('userid', JIEQI_TYPE_INT, 0, '�û�ID', false, 11);
        $this->initVar('username', JIEQI_TYPE_TXTBOX, '', '�û���', false, 30);
        $this->initVar('score', JIEQI_TYPE_INT, 0, '����', false, 1);
        $this->initVar('weight', JIEQI_TYPE_INT, 0, '�ȼ�', false, 6);
        $this->initVar('toptime', JIEQI_TYPE_INT, 0, '�ö�ʱ��', false, 11);
        $this->initVar('addtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('allvisit', JIEQI_TYPE_INT, 0, '�����', false, 11);
         
    }
}
//------------------------------------------------------------------------


//------------------------------------------------------------------------

//�û����
class JieqiUserlinkHandler extends JieqiObjectHandler
{
    function JieqiUserlinkHandler($db='')
    {
        $this->JieqiObjectHandler($db);
        $this->basename='userlink';
        $this->autoid='ulid';
        $this->dbname='system_userlink';
    }
}
?>