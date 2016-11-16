<?php
/**
 * �����Ű���
 *
 * �����Ű���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: texttypeset.php 205 2008-11-25 06:10:54Z juny $
 */

class TextTypeset extends JieqiObject
{
	var $freplace=array();  //�����滻�ַ�
	var $treplace=array();  //�滻��
	var $delmoreblank=true; //ɾ�������ո�
	var $delchars=array(); //��Ҫɾ�����ַ���
	var $errstartchars=array(); //������Ϊ����֧��
	var $fmore=array();  //�����ַ���Ҫ�滻
	var $tmore=array();  //�����ַ��滻��
	function TextTypeset()
	{
		$this->freplace=array(',', '.', '��', '��', ';', '!', '?', ':', '(', ')');
		$this->treplace=array('��', '��', '��', '��', '��', '��', '��', '��', '��', '��');
		$this->delmoreblank=true;
		$this->delchars=array(' ', '��', "\r");
		$this->errstartchars=array('��', '��', '��', '��', '��', '��');
		$this->fmore=array('.', '��', '-');
		$this->tmore=array('����', '����', '����');
	}
	
	//�Ű�
	function doTypeset(&$str)
	{
		//$str=str_replace($this->freplace, $this->treplace, $str);
		$ret='';
		$tmpstr='';
		$tmpstr1='';
		$repeatnum=0; //�ظ�����
		$start=true;  //���¿�ʼ��־
		$linestart=true;  //�п�ʼ��־
		$sectionstart=true;  //�ο�ʼ��־
		$strlen=strlen($str);
		for($i = 0; $i < $strlen; $i++) {
			$tmpstr = $str[$i];
			//�ж���Ӣ�ģ�ȡ�ַ�
			if (ord($str[$i]) > 0x80 && $i+1<$strlen) {
				$tmpstr .= $str[++$i];
			}
			//��Ҫɾ�����ַ�
			if(in_array($tmpstr, $this->delchars)) continue;
			//�����س����÷ֶα�־
			if($tmpstr=="\n"){
				$sectionstart=true;
				continue;
			}
			//��������Ϊ���׵��ַ�
			if($sectionstart && in_array($tmpstr, $this->errstartchars)) $sectionstart=false;
			
			//ĳЩ�ظ��ַ�����
			$tmpvar=$repeatnum;
			if(in_array($tmpstr, $this->fmore)){
				if($tmpstr==$tmpstr1){
					$repeatnum++;
				}else{
					$tmpstr1=$tmpstr;
					$repeatnum=1;
				}
				continue;
			}
			if($tmpvar>0 && $tmpvar==$repeatnum){
				if($repeatnum==1){
					$ret.=$tmpstr1;
				}else{
					$key=array_search($tmpstr1, $this->fmore);
					if($key) $ret.=$this->tmore[$key];
				}
				$tmpstr1='';
				$repeatnum=0;
			}
			//���״���
			if($sectionstart){
				if(!$start) $ret.="\r\n\r\n";
				else $start=false;
				$ret.='    ';
				$sectionstart=false;
			}
			$ret.=$tmpstr;
		}
		//���һ�����ܻ�����ַ�
		if($repeatnum==1){
			$ret.=$tmpstr1;
		}elseif($repeatnum>1){
			$key=array_search($tmpstr1, $this->fmore);
			if($key) $$ret.=$this->tmore[$key];
		}
		return $ret;
	}
}
?>