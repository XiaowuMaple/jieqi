<?php 
/**
 * ���ݱ���(jieqi_article_avstat - ����ͶƱ�����)
 *
 * ���ݱ���(jieqi_article_avstat - ����ͶƱ�����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: avstat.php 230 2008-11-27 08:46:07Z juny $
 */

jieqi_includedb();
//����
class JieqiAvstat extends JieqiObjectData
{
    //��������
    function JieqiAvstat()
    {
        $this->JieqiObjectData();
        $this->initVar('statid', JIEQI_TYPE_INT, 0, '���', false, 11);
        $this->initVar('voteid', JIEQI_TYPE_INT, 0, 'ͶƱ���', false, 11);
        $this->initVar('statall', JIEQI_TYPE_INT, 0, '��Ʊ��', false, 11);
        $this->initVar('stat1', JIEQI_TYPE_INT, 0, '��Ʊ1', false, 11);
        $this->initVar('stat2', JIEQI_TYPE_INT, 0, '��Ʊ2', false, 11);
        $this->initVar('stat3', JIEQI_TYPE_INT, 0, '��Ʊ3', false, 11);
        $this->initVar('stat4', JIEQI_TYPE_INT, 0, '��Ʊ4', false, 11);
        $this->initVar('stat5', JIEQI_TYPE_INT, 0, '��Ʊ5', false, 11);
        $this->initVar('stat6', JIEQI_TYPE_INT, 0, '��Ʊ6', false, 11);
        $this->initVar('stat7', JIEQI_TYPE_INT, 0, '��Ʊ7', false, 11);
        $this->initVar('stat8', JIEQI_TYPE_INT, 0, '��Ʊ8', false, 11);
        $this->initVar('stat9', JIEQI_TYPE_INT, 0, '��Ʊ9', false, 11);
        $this->initVar('stat10', JIEQI_TYPE_INT, 0, '��Ʊ10', false, 11);
        $this->initVar('canstat', JIEQI_TYPE_INT, 0, '�Ƿ�ͳ��', false, 1);
    }
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiAvstatHandler extends JieqiObjectHandler
{
	function JieqiAvstatHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='avstat';
	    $this->autoid='voteid';	
	    $this->dbname='article_avstat';
	}
}

?>