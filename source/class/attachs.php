<?php
/**
 * ͨ�ø�����
 *
 * ͨ�ø�����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    forum
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumattachs.php 326 2009-02-04 00:26:22Z juny $
 */

class JieqiAttachs extends JieqiObjectData
{
    //��������
    function JieqiAttachs()
    {       
        $this->JieqiObjectData();
        $this->initVar('attachid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 11);
        $this->initVar('topicid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('postid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('name', JIEQI_TYPE_TXTBOX, '', '��������', true, 100);
		$this->initVar('description', JIEQI_TYPE_TXTBOX, '', '��������', true, 100);
        $this->initVar('class', JIEQI_TYPE_TXTBOX, '', '��������', true, 30);
		$this->initVar('postfix', JIEQI_TYPE_TXTBOX, '', '������׺', true, 30);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ļ���С', false, 10);
		$this->initVar('hits', JIEQI_TYPE_INT, 0, '�����', false, 8);
		$this->initVar('needperm', JIEQI_TYPE_INT, 0, '��ҪȨ��', false, 10);
		$this->initVar('needscore', JIEQI_TYPE_INT, 0, '��Ҫ����', false, 10);
		$this->initVar('needexp', JIEQI_TYPE_INT, 0, '��Ҫ����ֵ', false, 10);
		$this->initVar('needprice', JIEQI_TYPE_INT, 0, '��Ҫ�۸�', false, 10);
		$this->initVar('uptime', JIEQI_TYPE_INT, 0, '�ϴ�ʱ��', false, 10);
		$this->initVar('uid', JIEQI_TYPE_INT, 0, '�����û�ID', false, 10);
		$this->initVar('remote', JIEQI_TYPE_INT, 0, '�Ƿ�Զ�̸���', false, 1);
    }
}