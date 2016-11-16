<?php 
/**
 * ���ݱ���(jieqi_article_sort - ���·���)
 *
 * ���ݱ���(jieqi_article_sort - ���·���)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: sort.php 313 2008-12-31 09:03:22Z juny $
 */

jieqi_includedb();
//�û���
class JieqiArticlesort extends JieqiObjectData
{
    //��������
    function JieqiArticlesort()
    {
        $this->JieqiObjectData();
        $this->initVar('sortid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('layer', JIEQI_TYPE_INT, 0, '������', false, 3);
        $this->initVar('weight', JIEQI_TYPE_INT, 0, '���', false, 6);
        $this->initVar('caption', JIEQI_TYPE_TXTBOX, '', '��������', true, 50);
        $this->initVar('shortname', JIEQI_TYPE_TXTBOX, '', '������', false, 20);
        $this->initVar('description', JIEQI_TYPE_TXTAREA, '', '��������', false, NULL);
        $this->initVar('imgurl', JIEQI_TYPE_TXTBOX, '', 'ͼƬ��ַ', false, 100);
        $this->initVar('authflag', JIEQI_TYPE_INT, 0, '�Ƿ���Ȩ��', false, 1);
        $this->initVar('authview', JIEQI_TYPE_TXTBOX, '', '�Ƿ�ɼ�', false, 255);
        $this->initVar('authread', JIEQI_TYPE_TXTBOX, '', '�����Ķ�', false, 255);
        $this->initVar('authpost', JIEQI_TYPE_TXTBOX, '', '������', false, 255);
        $this->initVar('authreply', JIEQI_TYPE_TXTBOX, '', '����ظ�', false, 255);
        $this->initVar('authupload', JIEQI_TYPE_TXTBOX, '', '�����ϴ�', false, 255);
        $this->initVar('authedit', JIEQI_TYPE_TXTBOX, '', '����༭', false, 255);
        $this->initVar('authdelete', JIEQI_TYPE_TXTBOX, '', '����ɾ��', false, 255);
        $this->initVar('publish', JIEQI_TYPE_INT, 0, '�Ƿ񷢲�', false, 1);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiArticlesortHandler extends JieqiObjectHandler
{
	function JieqiArticlesortHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='articlesort';
	    $this->autoid='sortid';	
	    $this->dbname='article_sort';
	}
}

?>