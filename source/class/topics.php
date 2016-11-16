<?php
/**
 * ͨ��������
 *
 * ͨ��������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: forumtopics.php 326 2009-02-04 00:26:22Z juny $
 */


class JieqiTopics extends JieqiObjectData
{
    //��������
    function JieqiTopics()
    {       
        $this->JieqiObjectData();
        $this->initVar('topicid', JIEQI_TYPE_INT, 0, '���', false, 8);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('ownerid', JIEQI_TYPE_INT, 0, '�������', false, 10);
        $this->initVar('title', JIEQI_TYPE_TXTBOX, '', '����', true, 80);
        $this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 10);
        $this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
        $this->initVar('posttime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 10);
        $this->initVar('replierid', JIEQI_TYPE_INT, 0, '�ظ������', false, 10);
        $this->initVar('replier', JIEQI_TYPE_TXTBOX, '', '�ظ���', false, 30);
        $this->initVar('replytime', JIEQI_TYPE_INT, 0, '�ظ�ʱ��', false, 10);
        $this->initVar('views', JIEQI_TYPE_INT, 0, '�����', false, 8);
        $this->initVar('replies', JIEQI_TYPE_INT, 0, '�ظ���', false, 8);
        $this->initVar('islock', JIEQI_TYPE_INT, 0, '�Ƿ�����', false, 1);
        $this->initVar('istop', JIEQI_TYPE_INT, 0, '�Ƿ��ö�', false, 1);
        $this->initVar('isgood', JIEQI_TYPE_INT, 0, '�Ƿ񾫻�', false, 1);
        $this->initVar('rate', JIEQI_TYPE_INT, 0, '���ӵȼ�', false, 1);
        $this->initVar('attachment', JIEQI_TYPE_INT, 0, '�Ƿ��и���', false, 1);
        $this->initVar('needperm', JIEQI_TYPE_INT, 0, '������ҪȨ��', false, 10);
        $this->initVar('needscore', JIEQI_TYPE_INT, 0, '������Ҫ����', false, 10);
        $this->initVar('needexp', JIEQI_TYPE_INT, 0, '������Ҫ����ֵ', false, 10);
        $this->initVar('needprice', JIEQI_TYPE_INT, 0, '������Ҫ�۸�', false, 10);
        $this->initVar('sortid', JIEQI_TYPE_INT, 0, '����ID', false, 3);
        $this->initVar('iconid', JIEQI_TYPE_INT, 0, 'ͼ��ID', false, 3);
        $this->initVar('typeid', JIEQI_TYPE_INT, 0, '����ID', false, 3);
        $this->initVar('lastinfo', JIEQI_TYPE_TXTBOX, '', '������', false, 250);
        $this->initVar('linkurl', JIEQI_TYPE_TXTBOX, '', '����URL', false, 100);
        $this->initVar('size', JIEQI_TYPE_INT, 0, '���Ӵ�С', false, 11);
    }
}

?>