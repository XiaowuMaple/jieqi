<?php 
/**
 * ͨ������������
 *
 * ͨ������������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumposts.php 326 2009-02-04 00:26:22Z juny $
 */

class JieqiPosts extends JieqiObjectData
{
    //��������
    function JieqiPosts()
    {
        $this->JieqiObjectData();
        $this->initVar('postid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('topicid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('istopic', JIEQI_TYPE_INT, 0, '�Ƿ�����', false, 1);
        $this->initVar('replypid', JIEQI_TYPE_INT, 0, '�ظ��������', false, 11);
        $this->initVar('ownerid', JIEQI_TYPE_INT, 0, '��̳���', false, 11);
        $this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
        $this->initVar('posttime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('posterip', JIEQI_TYPE_TXTBOX, '', '������IP', false, 25);
        $this->initVar('editorid', JIEQI_TYPE_INT, 0, '�༭�����', false, 11);
        $this->initVar('editor', JIEQI_TYPE_TXTBOX, '', '�༭��', false, 30);
        $this->initVar('edittime', JIEQI_TYPE_INT, 0, '�༭ʱ��', false, 11);
        $this->initVar('editorip', JIEQI_TYPE_TXTBOX, '', '�༭��IP', false, 25);
        $this->initVar('editnote', JIEQI_TYPE_TXTBOX, '', '�༭�˱�ע', false, 250);
        $this->initVar('iconid', JIEQI_TYPE_INT, 0, 'ͼ��', false, 3);
        $this->initVar('attachment', JIEQI_TYPE_INT, '', '������Ϣ', false, NULL);
        $this->initVar('subject', JIEQI_TYPE_TXTBOX, '', '��������', false, 80);
        $this->initVar('posttext', JIEQI_TYPE_TXTAREA, '', '��������', true, NULL);
        $this->initVar('size', JIEQI_TYPE_INT, 0, '���Ӵ�С', false, 10);
    }
}