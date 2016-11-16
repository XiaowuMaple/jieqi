<?php
/**
 * ��ҳ��
 *
 * �б�ҳ����ñ�����ʾ��ҳ
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: page.php 200 2008-11-25 06:09:23Z juny $
 */

class JieqiPage extends JieqiObject
{
    var $total;  //�ܼ�¼   
    var $onepage;  //ÿҳ��ʾ��¼��
    var $num;  //��ʾ���ָ���
    var $page;  //��ǰҳ��
    var $total_page;  //��ҳ��
    var $linkhead;    //���ӵ�ַ
    var $pagevar;  //ҳ�������
    var $usefake;  //�Ƿ�ʹ��α��̬
    var $useajax;  //�Ƿ�ʹ��ajax��ҳ
    var $ajax_parm = '{outid:\'content\', tipid:\'pagestats\', onLoading:\'loading...\', parameters:\'ajax_gets=jieqi_contents\'}'; //ajax�ύ�Ĳ���

    function JieqiPage($total, $onepage, $page = 1, $num = 10, $pagevar = 'page', $pageajax = 0){
        $this->total =& $total;
        $this->onepage =& $onepage;
        $this->total_page = @ceil($total/$onepage);
        if(defined('JIEQI_MAX_PAGES') && JIEQI_MAX_PAGES > 0 && $this->total_page > JIEQI_MAX_PAGES) $this->total_page = intval(JIEQI_MAX_PAGES);
		if($this->total_page <= 1) $this->total_page=1;
        $this->page =& $page;
        $this->num =& $num;
        $this->pagevar = $pagevar;
        
        if(substr($pagevar,0,1)=='.') $this->usefake=1;
        else $this->usefake=0;
        
        if($pageajax > 0 || (defined('JIEQI_AJAX_PAGE') && JIEQI_AJAX_PAGE > 0)) $this->useajax=1;
        else $this->useajax=0;
        
        $this->linkhead = jieqi_addurlvars(array($this->pagevar => ''), true, false);
    }

	function setlink($link='', $addget=true, $addpost=false){
		if(!empty($link)){
			$this->linkhead = $link;
		}else{
			$this->linkhead = jieqi_addurlvars(array($this->pagevar => ''), $addget, $addpost);
		}
	}
	
	function pageurl($page){
		if(strpos($this->linkhead, '<{$page') === false) $url = $this->linkhead.$page;
		else $url = str_replace(array('<{$page|subdirectory}>', '<{$page}>'), array(jieqi_getsubdir($page), $page), $this->linkhead);
		if($this->useajax == 1) $url = 'javascript:Ajax.Update(\''.urldecode($url).'\','.$this->ajax_parm.');';
		return $url;
	}
	
	function pagelink($page,$char,$class=''){
		/*
		if($this->usefake == 1) $link_url = $this->linkhead.jieqi_getsubdir($page).'/'.$page.$this->pagevar;
        elseif($this->useajax == 1) $link_url = 'javascript:Ajax.Update(\''.urldecode($this->linkhead).$page.'&ajax_gets=jieqi_contents\','.$this->ajax_parm.');';
        else $link_url = $this->linkhead.$page;
        */
        $link_url = $this->pageurl($page);
        if(empty($class)) return '<a href="'.$link_url.'">'.$char.'</a>';
        else return '<a href="'.$link_url.'" class="'.$class.'">'.$char.'</a>';
	}
    
	//ȡ�õ�һҳ.$linkΪ1��Ϊ������
    function first_page($link=1, $char=''){
    	if($char == '') $char = '1';
        if ($link==1){
        	return $this->pagelink(1, $char, 'first');
        }else{
            return 1;
        }
    }

	//ȡ����ĩҳ.$linkΪ1��Ϊ������
    function total_page($link=1, $char=''){
    	if($char == '') $char = $this->total_page;
        if ($link==1){
        	return $this->pagelink($this->total_page, $char, 'last');
        }else{
            return $this->total_page;
        }
    }


	//ȡ����һҳ.$charΪ���ӵ��ַ�,Ĭ��Ϊ"[<]"
    function pre_page($char=''){
        if ($char == '') $char = '&lt;';
        if ($this->page>1){
        	return $this->pagelink($this->page-1, $char, 'prev');
        }else{
            return '';
        }
    }

	//ȡ����һҳ.$charΪ���ӵ��ַ�,Ĭ��Ϊ"[>]"
    function next_page($char=''){
        if ($char == '') $char = '&gt;';
        if ($this->page < $this->total_page){
        	return $this->pagelink($this->page+1, $char, 'next');
        }else{
            return '';
        }
    }


	//ȡ��ҳ��������. $num Ϊ����,Ĭ��Ϊ10
    function num_bar(){
        $num       =& $this->num;
        $mid       =  floor($num/2);
        $last      =  $num - 1; 
        $page      =& $this->page;
        $totalpage =& $this->total_page;
        $linkhead  =& $this->linkhead;       
        $minpage   =  ($page-$mid)<1 ? 1 : $page-$mid;
        $maxpage   =  $minpage + $last;
        if ($maxpage>$totalpage){
            $maxpage =& $totalpage;
            $minpage =  $maxpage - $last;
            $minpage =  $minpage<1 ? 1 : $minpage;
        }
        $linkbar='';
        for ($i=$minpage; $i<=$maxpage; $i++){
        	$char = $i;
            if ($i==$page){
            	$linkchar = '<strong>'.$char.'</strong>';
            }else{
            	$linkchar = $this->pagelink($i, $char);
            }
            $linkbar .= $linkchar;
        }
        return $linkbar;
    }


	//ȡ����һ��������.$charΪ���ӵ��ַ�,Ĭ��Ϊ"[<<]"
    function pre_group($char=''){
        $page        =& $this->page;
        $linkhead    =& $this->linkhead;
        $num         =& $this->num;
        $mid         =  floor($num/2);
        $minpage     =  ($page-$mid)<1 ? 1 : $page-$mid;
        $char        =  $char=='' ? "&lt;&lt;" : $char;
        $pgpage =  $minpage>$num ? $minpage-$mid : 1;
        return $this->pagelink($pgpage, $char, 'pgroup');
    }
    
    
	//ȡ����һ��������.$charΪ���ӵ��ַ�,Ĭ��Ϊ"[>>]"
    function next_group($char=''){
        $page =& $this->page;
        $linkhead  =& $this->linkhead;
        $totalpage =& $this->total_page;
        $num       =& $this->num;
        $mid       =  floor($num/2);
        $last      =  $num; 
        $minpage   =  ($page-$mid)<1 ? 1 : $page-$mid;
        $maxpage   =  $minpage + $last;
        if ($maxpage > $totalpage){
            $maxpage =& $totalpage;
            $minpage = $maxpage - $last;
            $minpage = $minpage < 1 ? 1 : $minpage;
        }
        $char        = $char=='' ? "&gt;&gt;" : $char;
        $ngpage = ($totalpage>$maxpage+$last)? $maxpage + $mid : $totalpage;
        return $this->pagelink($ngpage, $char, 'ngroup');
    }

	//ȡ����������������һҳ����һҳ����һ��
	//��һ��ĵ�.$num���ָ���
    function whole_num_bar(){
        $num_bar = $this->num_bar();
        return  '<em id="pagestats">'.$this->page.'/'.$this->total_page.'</em>'.$this->first_page(1, '').$this->pre_group().$this->pre_page() .$num_bar.$this->next_page() .$this->next_group().$this->total_page(1, '');
    }
    
	//ȡ�������ӣ�����whole_num_bar���ϱ���ת.
	//$num���ָ���
    function whole_bar(){
        return '<div class="pagelink" id="pagelink">'.$this->whole_num_bar().$this->jump_form().'</div>';
    }

	//��ת��
    function jump_form(){
    	if($this->useajax == 1) $urllink = urldecode($this->linkhead);
    	else $urllink = $this->linkhead;
    	$pos = strpos($urllink, '<{$page');
    	if($pos === false){
    		$urlcode = '\''.$urllink.'\'+this.value';
    	}else{
    		//$urlcode = '\''.substr($urllink, 0, $pos).'\'+this.value+\''.substr($urllink, $pos+9).'\'';
    		//<{$page|subdirectory}>
    		$urlcode = '\''.$urllink.'\'.replace(\'<{$page|subdirectory}>\', \'/\' + Math.floor(this.value / 1000)).replace(\'<{$page}>\', this.value)';
    	}
        if($this->useajax == 1){
        	$form='<kbd><input name="page" type="text" size="4" maxlength="6" onkeydown="if(event.keyCode==13){Ajax.Update('.$urlcode.','.$this->ajax_parm.'); return false;}" /></kbd>';
        }else{
        	$form='<kbd><input name="page" type="text" size="4" maxlength="6" onkeydown="if(event.keyCode==13){window.location='.$urlcode.'; return false;}" /></kbd>';
        }
		return $form;
    }
}
?>