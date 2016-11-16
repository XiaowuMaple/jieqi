<?php 
/**
 * ���ݱ���(jieqi_article_searchcache - ��������)
 *
 * ���ݱ���(jieqi_article_searchcache - ��������)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: searchcache.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();
//�û���
class JieqiSearchcache extends JieqiObjectData
{
	//��������
	function JieqiSearchcache()
	{
		$this->JieqiObjectData();
		$this->initVar('cacheid', JIEQI_TYPE_INT, 0, '���', false, 11);
		$this->initVar('searchtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
		$this->initVar('hashid', JIEQI_TYPE_TXTBOX, '', '�������', false, 32);
        $this->initVar('keywords', JIEQI_TYPE_TXTBOX, '', '�����ؼ���', false, 60);
		$this->initVar('searchtype', JIEQI_TYPE_INT, 0, '������ʽ', false, 1);
		$this->initVar('results', JIEQI_TYPE_INT, 0, '���������', false, 11);
		$this->initVar('aids', JIEQI_TYPE_TXTAREA, '', '�����������id', false, NULL);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiSearchcacheHandler extends JieqiObjectHandler
{
	function JieqiSearchcacheHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='searchcache';
	    $this->autoid='cacheid';	
	    $this->dbname='article_searchcache';
	}
}

?>