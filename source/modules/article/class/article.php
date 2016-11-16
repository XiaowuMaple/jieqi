<?php 
/**
 * ���ݱ���(jieqi_article_article - ������Ϣ��)
 *
 * ���ݱ���(jieqi_article_article - ������Ϣ��)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: article.php 300 2008-12-26 04:36:06Z juny $
 */

jieqi_includedb();

class JieqiArticle extends JieqiObjectData
{
	//��������
	function JieqiArticle()
	{
		$this->JieqiObjectData();
		$this->initVar('articleid', JIEQI_TYPE_INT, 0, '���', false, 11);
		$this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 6);
		$this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
		$this->initVar('lastupdate', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', '���±���', true, 250);
		$this->initVar('keywords', JIEQI_TYPE_TXTBOX, '', '�ؼ���', false, 250);
		$this->initVar('initial', JIEQI_TYPE_TXTBOX, '', '��������ĸ', false, 1);
		$this->initVar('authorid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('author', JIEQI_TYPE_TXTBOX, '', '����', false, 30);
		$this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
		$this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
		$this->initVar('agentid', JIEQI_TYPE_INT, 0, '���������', false, 11);
		$this->initVar('agent', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
		$this->initVar('sortid', JIEQI_TYPE_INT, 0, '������', false, 3);
		$this->initVar('typeid', JIEQI_TYPE_INT, 0, '������', false, 3);
		$this->initVar('intro', JIEQI_TYPE_TXTAREA, '', '���ݼ��', false, NULL);
		$this->initVar('notice', JIEQI_TYPE_TXTAREA, '', '���鹫��', false, NULL);
		$this->initVar('setting', JIEQI_TYPE_TXTAREA, '', '���²���', false, NULL);
		$this->initVar('lastvolumeid', JIEQI_TYPE_INT, 0, 'ĩ�����', false, 11);
		$this->initVar('lastvolume', JIEQI_TYPE_TXTBOX, '', 'ĩ��', false, 250);
		$this->initVar('lastchapterid', JIEQI_TYPE_INT, 0, '�����½����', false, 11);
		$this->initVar('lastchapter', JIEQI_TYPE_TXTBOX, '', '�����½�', false, 255);
		$this->initVar('chapters', JIEQI_TYPE_INT, 0, '�½���', false, 6);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ֽ���', false, 11);
		$this->initVar('lastvisit', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('dayvisit', JIEQI_TYPE_INT, 0, '�շ���', false, 11);
		$this->initVar('weekvisit', JIEQI_TYPE_INT, 0, '�ܷ���', false, 11);
		$this->initVar('monthvisit', JIEQI_TYPE_INT, 0, '�·���', false, 11);
		$this->initVar('allvisit', JIEQI_TYPE_INT, 0, '�ܷ���', false, 11);
		$this->initVar('lastvote', JIEQI_TYPE_INT, 0, '����Ƽ�', false, 11);
		$this->initVar('dayvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('weekvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('monthvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('allvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('goodnum', JIEQI_TYPE_INT, 0, '�ղ���', false, 11);
		$this->initVar('badnum', JIEQI_TYPE_INT, 0, 'Ͷ����', false, 11);
		$this->initVar('toptime', JIEQI_TYPE_INT, 0, '�ö�ʱ��', false, 11);
		$this->initVar('saleprice', JIEQI_TYPE_INT, 0, '���ۼ۸�', false, 11);
		$this->initVar('salenum', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('totalcost', JIEQI_TYPE_INT, 0, '�����۶�', false, 11);
		$this->initVar('articletype', JIEQI_TYPE_INT, 0, '��������', false, 1);
		$this->initVar('permission', JIEQI_TYPE_INT, 0, '��Ȩ����', false, 1);
		$this->initVar('firstflag', JIEQI_TYPE_INT, 0, '�׷���־', false, 1);
		$this->initVar('fullflag', JIEQI_TYPE_INT, 0, '������־', false, 1);
		$this->initVar('imgflag', JIEQI_TYPE_INT, 0, 'ͼƬ��־', false, 1);
		$this->initVar('power', JIEQI_TYPE_INT, 0, '���ʼ���', false, 1);
		$this->initVar('display', JIEQI_TYPE_INT, 0, '��ʾ', false, 1);
	}
}

//------------------------------------------------------------------------
//------------------------------------------------------------------------

//���ݾ��
class JieqiArticleHandler extends JieqiObjectHandler
{

	function JieqiArticleHandler($db='')
	{
		$this->JieqiObjectHandler($db);
		$this->basename='article';
		$this->autoid='articleid';
		$this->dbname='article_article';
	}

	function getCoverInfo($imgflag){
		global $jieqiConfigs;
		if(!isset($jieqiConfigs['article'])) jieqi_getconfigs('article', 'configs');
		$ret=array('stype'=>'', 'ltype'=>'');
		if(($imgflag & 1)>0) $ret['stype']=$jieqiConfigs['article']['imagetype'];
		if(($imgflag & 2)>0) $ret['ltype']=$jieqiConfigs['article']['imagetype'];

		$imgtype=$imgflag >> 2;
		if($imgtype > 0){
			$imgtary=array(1=>'.gif', 2=>'.jpg', 3=>'.jpeg', 4=>'.png', 5=>'.bmp');
			$tmpvar = round($imgtype & 7);
			if(isset($imgtary[$tmpvar])) $ret['stype']=$imgtary[$tmpvar];
			$tmpvar = round($imgtype >> 3);
			if(isset($imgtary[$tmpvar])) $ret['ltype']=$imgtary[$tmpvar];
		}
		return $ret;
	}
}

?>