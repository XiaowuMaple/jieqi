<?php
/**
 * �ַ�������
 *
 * �ַ�������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: textfilter.php 205 2008-11-25 06:10:54Z juny $
 */

class TextFilter extends JieqiObject
{
	var $badwords=array();  //��ֹ����
	var $hidewords=array();  //���ش���
	var $replacewords=array();  //�滻����
	
	//��ֹ����ĵ���
	function loadBadwords(&$badwords)
	{
		if(is_array($badwords)){
			$this->badwords=$badwords;
		}
	}
	
	//��Ҫ���صĵ���
	function loadHidewords(&$hidewords)
	{
		if(is_array($hidewords)){
			$this->hidewords=$hidewords;
		}
	}
	
	//�滻�ĵ���
	function loadReplacewords(&$replacewords)
	{
		if(is_array($replacewords)){
			$this->replacewords=$replacewords;
		}
	}
	
	//����Ƿ��н�ֹ����
	function checkBadwords(&$text)
	{
		$ret=true;
		if(count($this->badwords)>0){
			foreach($this->badwords as $v){
				if($ret && strlen($v)>0 && !empty($v)){
					if(strstr($text,$v)) $ret=false;
				}
			}
		}
		return $ret;
	}
	
	//�滻���ص���
	function doHidewords($text, $replace='***')
	{
		if(count($this->hidewords)>0){
			$text = str_replace($this->hidewords, $replace, $text);
			return $text;
		}else{
			return $text;
		}
	}
	
	//�滻����
	function doReplacewords($text)
	{
		if(count($this->replacewords)>0){
			$from=array();
			$to=array();
			foreach($this->replacewords as $k=>$v){
				$from[]=$k;
				$to[]=$v;
			}
			return str_replace($from, $to, $text);
		}else{
			return $text;
		}
	}
	
	//����Ƿ��ˮ
	function checkRubbish(&$text)
	{
		$ret=false;
		$len=strlen($text);
		
		$specialnum=0; //�����ַ���
		$tmpstr="";
		$tmpstr1="";
		$renum=0;
		for($i=0;$i<$len;$i++){
			if(ord($text[$i])>0x80){
				$tmpstr=$text[$i].$text[$i+1];
				$i++;
			}else{
				$tmpstr=$text[$i];
				$tmpasc=ord($text[$i]);
				if($tmpasc<0x41 || ($tmpasc>0x5a && $tmpasc<0x61) || $tmpasc>0x7a){
					$specialnum++;
				}
			}
			if($tmpstr==$tmpstr1){
				$renum++;
				if($renum>4){
					return true;
				}
			}else{
				$renum=0;
			}
			if($tmpstr != ' ') $tmpstr1=$tmpstr;
		}
		//�����ַ���������֮һ
		//if(($specialnum * 3) > $len) return true;
		return $ret;
	}
}
?>