<?php
/**
 * ���ݱ���(jieqi_system_blocks - �����)
 *
 * ���ݱ���(jieqi_system_blocks - �����)
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: blocks.php 320 2009-01-13 05:51:02Z juny $
 */

jieqi_includedb();
//������
class JieqiBlocks extends JieqiObjectData
{

    //��������
    function JieqiBlocks()
    {
        $this->initVar('bid', JIEQI_TYPE_INT, 0, '���', false, 8);
        $this->initVar('blockname', JIEQI_TYPE_TXTBOX, '', '��������', true, 50);
        $this->initVar('modname', JIEQI_TYPE_TXTBOX, '', 'ģ������', true, 50);
        $this->initVar('filename', JIEQI_TYPE_TXTBOX, '', '�ļ�����', false, 50);
        $this->initVar('classname', JIEQI_TYPE_TXTBOX, '', '������', true, 50);
        $this->initVar('side', JIEQI_TYPE_INT, 0, '����λ��', false, 3);
        $this->initVar('title', JIEQI_TYPE_TXTAREA, '', '�������', false, NULL);
        $this->initVar('description', JIEQI_TYPE_TXTAREA, '', '��������', false, NULL);
        $this->initVar('content', JIEQI_TYPE_TXTAREA, '', '��������', false, NULL);
        $this->initVar('vars', JIEQI_TYPE_TXTBOX, '', '�������', false, 255);
        $this->initVar('template', JIEQI_TYPE_TXTBOX, '', 'ģ���ļ�����', false, 50);
        $this->initVar('cachetime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
        $this->initVar('contenttype', JIEQI_TYPE_INT, 0, '��������', false, 3);
        $this->initVar('weight', JIEQI_TYPE_INT, 0, '����˳��', false, 8);
        $this->initVar('showstatus', JIEQI_TYPE_INT, 0, '��ʾ״̬', false, 1);
        $this->initVar('custom', JIEQI_TYPE_INT, 0, '�Ƿ��Զ�������', false, 1);
        $this->initVar('canedit', JIEQI_TYPE_INT, 0, '�ɷ�༭', false, 1);
        $this->initVar('publish', JIEQI_TYPE_INT, 0, '�Ƿ񼤻�', false, 1);
        $this->initVar('hasvars', JIEQI_TYPE_INT, 0, '�Ƿ�֧�ֲ���', false, 1);
    }
	
}


//------------------------------------------------------------------------
//------------------------------------------------------------------------

//������
class JieqiBlocksHandler extends JieqiObjectHandler
{
	var $sideary = array();  //λ������
	var $contentary = array();
	function JieqiBlocksHandler($db='')
	{
	    $this->JieqiObjectHandler($db);
	    $this->basename='blocks';
	    $this->autoid='bid';	
	    $this->dbname='system_blocks';
	    $this->sideary=array(JIEQI_SIDEBLOCK_LEFT=>'���', JIEQI_SIDEBLOCK_RIGHT=>'�ұ�', JIEQI_CENTERBLOCK_LEFT=>'����', JIEQI_CENTERBLOCK_RIGHT=>'����', JIEQI_CENTERBLOCK_TOP=>'����', JIEQI_CENTERBLOCK_MIDDLE=>'����', JIEQI_CENTERBLOCK_BOTTOM=>'����', JIEQI_TOPBLOCK_ALL=>'����', JIEQI_BOTTOMBLOCK_ALL=>'�ײ�');
	    $this->contentary=array(JIEQI_CONTENT_TXT=>'���ı�', JIEQI_CONTENT_HTML=>'��HTML', JIEQI_CONTENT_JS=>'��JAVASCRIPT', JIEQI_CONTENT_MIX=>'HTML��SCRIPT���', JIEQI_CONTENT_PHP=>'PHP����');
	}
	
	function getSideary()
	{
	    return $this->sideary;
	}
	
	function getSide($side)
	{
	    if(isset($this->sideary[$side])) return $this->sideary[$side];
	    else return '����';	
	}
	
	function getShowlist($type)
	{
	    $ret=array();
	    foreach($this->showary as $k=>$v){
	        if(($type & $k)>0) $ret[]=$k;	
	    }	
	    return $ret;
	}
	
	function getPublish($type)
	{
		if($type==3) return '����ʾ';
		elseif($type==1) return '��½ǰ��ʾ';
		elseif($type==2) return '��½����ʾ';
		else return '����ʾ';
	}
	
	function getContentary($custom=true)
	{
		return $this->contentary;
	}
	
	function getContenttype($type)
	{
		if(isset($this->contentary[$type])) return $this->contentary[$type];
		else return 'δ֪';
	}
	
	//�����Զ�����������
	function saveContent($bid, $modname, $contenttype, &$content)
	{
		global $jieqiCache;
		$ret=false;
		if(!empty($bid) && !empty($modname)){
			$val='';
			$fname='';
			switch($contenttype){
			    case JIEQI_CONTENT_TXT:
			    $val=jieqi_htmlstr($content);
			    $fname='.html';
			    break;	
			    case JIEQI_CONTENT_HTML:
			    $val=$content;
			    $fname='.html';
			    break;
			    case JIEQI_CONTENT_JS:
			    $val=$content;
			    $fname='.html';
			    break;
			    case JIEQI_CONTENT_MIX:
			    $val=$content;
			    $fname='.html';
			    break;
			    /*
			    //Ϊ���Ӱ�ȫ�ԣ����������Զ���������ʱ��֧��
			    case JIEQI_CONTENT_PHP:
			    $val=$content;
			    $fname='.php';
			    break;
			    */
			}
			if(!empty($fname)){
				$cache_file = JIEQI_CACHE_PATH;
				if(!empty($modname) && $modname != 'system') $cache_file.='/modules/'.$modname;
				if(is_numeric($bid)) $cache_file .= '/templates/blocks/block_custom'.$bid.$fname;
				else $cache_file .= '/templates/blocks/'.$bid.'.html';
				if($fname != '.php') $jieqiCache->set($cache_file, $val);
				else{
					jieqi_checkdir(dirname($cache_file), true);
					jieqi_writefile($cache_file, $val);
				}
			    $ret=true;
			}
		}
		return $ret;
	}
}

?>