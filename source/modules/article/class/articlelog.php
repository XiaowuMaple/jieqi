<?php
/**
 * ���ݱ���(jieqi_article_articlelog - ���¹�����־��)
 *
 * ���ݱ���(jieqi_article_articlelog - ���¹�����־��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: articlelog.php 312 2008-12-29 05:30:54Z juny $
 */

jieqi_includedb();
//�û�������־
class JieqiArticlelog extends JieqiObjectData
{ 
    //��������
    function JieqiArticlelog()
    {
        $this->JieqiObjectData();
        $this->initVar('logid', JIEQI_TYPE_INT, 0, '��־���', false, 11);
        $this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
        $this->initVar('logtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('userid', JIEQI_TYPE_INT, 0, '������id', false, 11);
        $this->initVar('username', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
        $this->initVar('articleid', JIEQI_TYPE_INT, 0, '�������', false, 11);
        $this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', '������', false, 255);
        $this->initVar('chapterid', JIEQI_TYPE_INT, 0, '�½����', false, 11);
        $this->initVar('chaptername', JIEQI_TYPE_TXTBOX, '', '�½���', false, 255);
        $this->initVar('reason', JIEQI_TYPE_TXTAREA, '', '�޸�ԭ��', false, NULL);
        $this->initVar('chginfo', JIEQI_TYPE_TXTAREA, '', '�޸�����', false, NULL);
        $this->initVar('chglog', JIEQI_TYPE_TXTAREA, '', '�޸ļ�¼', false, NULL);
        $this->initVar('ischapter', JIEQI_TYPE_INT, 0, '�Ƿ��½�', false, 1);
        $this->initVar('isdel', JIEQI_TYPE_INT, 0, '�Ƿ�ɾ��', false, 1);
        $this->initVar('databak', JIEQI_TYPE_TXTAREA, '', '��Ϣ����', false, NULL);
    }
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//�û����
class JieqiArticlelogHandler extends JieqiObjectHandler
{
    function JieqiArticlelogHandler($db='')
    {
        $this->JieqiObjectHandler($db);
        $this->basename='articlelog';
        $this->autoid='logid';
        $this->dbname='article_articlelog';
    }
}
?>