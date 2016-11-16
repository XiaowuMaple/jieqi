<?php
/**
 * ����ת��
 *
 * gb2312��big5��utf8 �Լ�ƴ��֮ǰ��ת��
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: changecode.php 243 2008-11-28 02:59:57Z juny $
 */

/**
 * gb2312ת����big5
 * 
 * @param      string      $text �����ַ���
 * @param      bool        $addslashes �Ƿ�ӷ�б�ܴ���Ĭ�Ϸ�
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_gb2big5($text, $addslashes=false)
{
	$chgcode = new ChangeCode("GB2312", "BIG5", $text);
	if (isset($chgcode)){
		$chgcode->addslashes = $addslashes;
		return($chgcode->ConvertIT());
	}else{
		return $text;
	}
}

/**
 * big5ת����gb2312
 * 
 * @param      string      $text �����ַ���
 * @param      bool        $addslashes �Ƿ�ӷ�б�ܴ���Ĭ�Ϸ�
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_big52gb($text, $addslashes=false)
{
	$chgcode = new ChangeCode("BIG5", "GB2312", $text);
	if (isset($chgcode)){
		$chgcode->addslashes = $addslashes;
		return($chgcode->ConvertIT());
	}else{
		return $text;
	}
}

/**
 * gb2312ת����ƴ��
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_gb2py($text)
{
	$chgcode = new ChangeCode("GB2312", "PinYin", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * big5ת����ƴ��
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_big52py($text)
{
	$chgcode = new ChangeCode("BIG5", "PinYin", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * gb2312ת����unicode
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_gb2unicode($text)
{
	$chgcode = new ChangeCode("GB2312", "UNICODE", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * big5ת����unicode
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_big52unicode($text)
{
	$chgcode = new ChangeCode("BIG5", "UNICODE", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * gb2312ת����utf-8
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_gb2utf8($text)
{
	if($text == '') return '';
	if (function_exists('iconv')){
		$ret = iconv('GBK', 'UTF-8//IGNORE', $text);
		if($ret) return $ret;
	}
	$chgcode = new ChangeCode("GB2312", "UTF8", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * big5ת����utf-8
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_big52utf8($text)
{
	if($text == '') return '';
	if (function_exists('iconv')){
		$ret = iconv('BIG5', 'UTF-8//IGNORE', $text);
		if($ret) return $ret;
	}
	$chgcode = new ChangeCode("BIG5", "UTF8", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * utf-8ת����gb2312
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_utf82gb($text)
{
	if($text == '') return '';
	if (function_exists('iconv')){
		$ret = iconv('UTF-8', 'GBK//IGNORE', $text);
		if(strlen($ret) > 0 && strlen($ret) >= floor(strlen($text) / 2)) return $ret;
	}
	$chgcode = new ChangeCode("UTF8", "GB2312", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * utf-8ת����big5
 * 
 * @param      string      $text �����ַ���
 * @access     public
 * @return     string      ת������ַ���
 */
function jieqi_utf82big5($text)
{
	if($text == '') return '';
	if (function_exists('iconv')){
		$ret = iconv('UTF-8', 'BIG5//IGNORE', $text);
		if(strlen($ret) > 0 && strlen($ret) >= floor(strlen($text) / 2)) return $ret;
	}
	$chgcode = new ChangeCode("UTF8", "BIG5", $text);
	if (isset($chgcode)) return($chgcode->ConvertIT());
	else return $text;
}

/**
 * ����ת����
 * 
 * @category   jieqicms
 * @package    system
 */
class ChangeCode extends JieqiObject
{

	// ��ż���������ƴ�����ձ�
	var $pinyin_table = array();

	// ��� GB <-> UNICODE ���ձ������
	var $unicode_table = array();

	// �������ķ��򻥻�����ļ�ָ��
	var $ctf;

	// �ȴ�ת�����ַ���

	var $SourceText = "";

	var $codetable_dir ; //  ��Ÿ������Ի������Ŀ¼
	
	var $addslashes = false; //ת�������Ƿ����ħ��ת��

	// Chinese ����������

	var $config  =  array(
	'SourceLang'            => '',                    //  �ַ���ԭ����
	'TargetLang'            => '',                    //  ת����ı���
	'GBtoBIG5_table'        => 'gb-big5.table',       //  ��������ת��Ϊ�������ĵĶ��ձ�
	'BIG5toGB_table'        => 'big5-gb.table',       //  ��������ת��Ϊ�������ĵĶ��ձ�
	'GBtoPinYin_table'      => 'gb-pinyin.table',     //  ��������ת��Ϊƴ���Ķ��ձ�
	'GBtoUnicode_table'     => 'gb-unicode.table',    //  ��������ת��ΪUNICODE�Ķ��ձ�
	'BIG5toUnicode_table'   => 'big5-unicode.table'   //  ��������ת��ΪUNICODE�Ķ��ձ�
	);

	//��������
	function ChangeCode( $SourceLang , $TargetLang , $SourceString='')
	{
		$this->codetable_dir =  dirname(__FILE__) . "/";

		if ($SourceLang != '') {
			$this->config['SourceLang'] = $SourceLang;
		}

		if ($TargetLang != '') {
			$this->config['TargetLang'] = $TargetLang;
		}

		if ($SourceString != '') {
			$this->SourceText = $SourceString;
		}

		$this->OpenTable();
	}


	// �� 16 ����ת��Ϊ 2 �����ַ�
	function _hex2bin( $hexdata )
	{
		$bindata='';
		for ( $i=0; $i<strlen($hexdata); $i+=2 )
		$bindata.=chr(hexdec(substr($hexdata,$i,2)));

		return $bindata;
	}

	// �򿪶��ձ�
	function OpenTable()
	{
		// ����ԭ����Ϊ�������ĵĻ�
		if ($this->config['SourceLang']=="GB2312") {

			// ����ת��Ŀ�����Ϊ�������ĵĻ�
			if ($this->config['TargetLang'] == "BIG5") {
				$this->ctf = fopen($this->codetable_dir.$this->config['GBtoBIG5_table'], "r");
				if (is_null($this->ctf)) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
			}

			// ����ת��Ŀ�����Ϊƴ���Ļ�
			if ($this->config['TargetLang'] == "PinYin") {
				$tmp = @file($this->codetable_dir.$this->config['GBtoPinYin_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$i = 0;
				for ($i=0; $i<count($tmp); $i++) {
					$tmp1 = explode("	", $tmp[$i]);
					$this->pinyin_table[$i]=array($tmp1[0],$tmp1[1]);
				}
			}

			// ����ת��Ŀ�����Ϊ UTF8 �Ļ�
			if ($this->config['TargetLang'] == "UTF8") {
				$tmp = @file($this->codetable_dir.$this->config['GBtoUnicode_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$this->unicode_table = array();
				while(list($key,$value)=each($tmp))
				$this->unicode_table[hexdec(substr($value,0,6))]=substr($value,7,6);
			}

			// ����ת��Ŀ�����Ϊ UNICODE �Ļ�
			if ($this->config['TargetLang'] == "UNICODE") {
				$tmp = @file($this->codetable_dir.$this->config['GBtoUnicode_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$this->unicode_table = array();
				while(list($key,$value)=each($tmp))
				$this->unicode_table[hexdec(substr($value,0,6))]=substr($value,9,4);
			}
		}

		// ����ԭ����Ϊ�������ĵĻ�
		if ($this->config['SourceLang']=="BIG5") {
			// ����ת��Ŀ�����Ϊ�������ĵĻ�
			if ($this->config['TargetLang'] == "GB2312") {
				$this->ctf = fopen($this->codetable_dir.$this->config['BIG5toGB_table'], "r");
				if (is_null($this->ctf)) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
			}
			// ����ת��Ŀ�����Ϊ UTF8 �Ļ�
			if ($this->config['TargetLang'] == "UTF8") {
				$tmp = @file($this->codetable_dir.$this->config['BIG5toUnicode_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$this->unicode_table = array();
				while(list($key,$value)=each($tmp))
				$this->unicode_table[hexdec(substr($value,0,6))]=substr($value,7,6);
			}

			// ����ת��Ŀ�����Ϊ UNICODE �Ļ�
			if ($this->config['TargetLang'] == "UNICODE") {
				$tmp = @file($this->codetable_dir.$this->config['BIG5toUnicode_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$this->unicode_table = array();
				while(list($key,$value)=each($tmp))
				$this->unicode_table[hexdec(substr($value,0,6))]=substr($value,9,4);
			}

			// ����ת��Ŀ�����Ϊƴ���Ļ�
			if ($this->config['TargetLang'] == "PinYin") {
				$tmp = @file($this->codetable_dir.$this->config['GBtoPinYin_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				//
				$i = 0;
				for ($i=0; $i<count($tmp); $i++) {
					$tmp1 = explode("	", $tmp[$i]);
					$this->pinyin_table[$i]=array($tmp1[0],$tmp1[1]);
				}
			}
		}

		// ����ԭ����Ϊ UTF8 �Ļ�
		if ($this->config['SourceLang']=="UTF8") {

			// ����ת��Ŀ�����Ϊ GB2312 �Ļ�
			if ($this->config['TargetLang'] == "GB2312") {
				$tmp = @file($this->codetable_dir.$this->config['GBtoUnicode_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$this->unicode_table = array();
				while(list($key,$value)=each($tmp))
				$this->unicode_table[hexdec(substr($value,7,6))]=substr($value,0,6);
			}

			// ����ת��Ŀ�����Ϊ BIG5 �Ļ�
			if ($this->config['TargetLang'] == "BIG5") {
				$tmp = @file($this->codetable_dir.$this->config['BIG5toUnicode_table']);
				if (!$tmp) {
					$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
				}
				$this->unicode_table = array();
				while(list($key,$value)=each($tmp))
				$this->unicode_table[hexdec(substr($value,7,6))]=substr($value,0,6);
			}
		}

	} // ���� OpenTable ����

	/**
	* �����塢�������ĵ� UNICODE ����ת��Ϊ UTF8 �ַ�
	*/
	function CHSUtoUTF8($c)
	{
		if(empty($c)) return '';  //�޷��������ַ���239188159 ��ʾ���ĵ� ����12288 ��ʾ���ĵ�ȫ�ǿո�
		$str="";

		if ($c < 0x80) {
			$str.=$c;
		}

		else if ($c < 0x800) {
			$str.=(0xC0 | $c>>6);
			$str.=(0x80 | $c & 0x3F);
		}

		else if ($c < 0x10000) {
			$str.=(0xE0 | $c>>12);
			$str.=(0x80 | $c>>6 & 0x3F);
			$str.=(0x80 | $c & 0x3F);
		}

		else if ($c < 0x200000) {
			$str.=(0xF0 | $c>>18);
			$str.=(0x80 | $c>>12 & 0x3F);
			$str.=(0x80 | $c>>6 & 0x3F);
			$str.=(0x80 | $c & 0x3F);
		}
		return $str;

	} // ���� CHSUtoUTF8 ����

	/**
	* ���塢�������� <-> UTF8 ����ת���ĺ���
	*/
	function CHStoUTF8(){

		if ($this->config["SourceLang"]=="BIG5" || $this->config["SourceLang"]=="GB2312") {
			$ret="";
			while($this->SourceText != ''){

				if(ord(substr($this->SourceText,0,1))>127){

					if ($this->config["SourceLang"]=="BIG5") {
						$utf8=$this->CHSUtoUTF8(hexdec($this->unicode_table[hexdec(bin2hex(substr($this->SourceText,0,2)))]));
					}
					if ($this->config["SourceLang"]=="GB2312") {
						$utf8=$this->CHSUtoUTF8(hexdec($this->unicode_table[hexdec(bin2hex(substr($this->SourceText,0,2)))-0x8080]));
					}
					for($i=0;$i<strlen($utf8);$i+=3)
					$ret.=chr(substr($utf8,$i,3));

					$this->SourceText=substr($this->SourceText,2,strlen($this->SourceText));
				}

				else{
					$ret.=substr($this->SourceText,0,1);
					$this->SourceText=substr($this->SourceText,1,strlen($this->SourceText));
				}
			}
			// $this->unicode_table = array();
			$this->SourceText = "";
			return $ret;
		}

		if ($this->config["SourceLang"]=="UTF8") {
			$out = "";
			$len = strlen($this->SourceText);
			$i = 0;
			while($i < $len) {
				$c = ord( substr( $this->SourceText, $i++, 1 ) );
				switch($c >> 4)
				{
					case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
						// 0xxxxxxx
						$out .= substr( $this->SourceText, $i-1, 1 );
						break;
					case 12: case 13:
						// 110x xxxx   10xx xxxx
						$char2 = ord( substr( $this->SourceText, $i++, 1 ) );
						$char3 = 0x0;
						$char3 = $this->unicode_table[(($c & 0x1F) << 6) | ($char2 & 0x3F)];
						if(isset($char3)){
						if ($this->config["TargetLang"]=="GB2312")
						$out .= $this->_hex2bin( dechex(  $char3 + 0x8080 ) );

						if ($this->config["TargetLang"]=="BIG5")
						$out .= $this->_hex2bin( $char3 );
						}else{
							$out .= ' ';
						}
						break;
					case 14:
						// 1110 xxxx  10xx xxxx  10xx xxxx
						$char2 = ord( substr( $this->SourceText, $i++, 1 ) );
						$char3 = ord( substr( $this->SourceText, $i++, 1 ) );
						$char4 = 0x0;
						$char4 = $this->unicode_table[(($c & 0x0F) << 12) | (($char2 & 0x3F) << 6) | (($char3 & 0x3F) << 0)];
						if(isset($char4)){
						if ($this->config["TargetLang"]=="GB2312")
						$out .= $this->_hex2bin( dechex ( $char4 + 0x8080 ) );

						if ($this->config["TargetLang"]=="BIG5")
						$out .= $this->_hex2bin( $char4 );
						}else{
							$out .= ' ';
						}
						break;
				}
			}

			// ���ؽ��
			return $out;
		}
	} // ���� CHStoUTF8 ����

	/**
	* ���塢��������ת��Ϊ UNICODE����
	*/
	function CHStoUNICODE()
	{

		$utf="";

		while($this->SourceText != '')
		{
			if (ord(substr($this->SourceText,0,1))>127)
			{

				if ($this->config["SourceLang"]=="GB2312")
				$utf.="&#x".$this->unicode_table[hexdec(bin2hex(substr($this->SourceText,0,2)))-0x8080].";";

				if ($this->config["SourceLang"]=="BIG5")
				$utf.="&#x".$this->unicode_table[hexdec(bin2hex(substr($this->SourceText,0,2)))].";";

				$this->SourceText=substr($this->SourceText,2,strlen($this->SourceText));
			}
			else
			{
				$utf.=substr($this->SourceText,0,1);
				$this->SourceText=substr($this->SourceText,1,strlen($this->SourceText));
			}
		}
		return $utf;
	} // ���� CHStoUNICODE ����

	/**
	* �������� <-> �������� ����ת���ĺ���
	*/
	function GB2312toBIG5()
	{
		// ��ȡ�ȴ�ת�����ַ������ܳ���
		$max=strlen($this->SourceText)-1;
		$result='';
		for($i=0;$i<$max;$i++){
			$h=ord($this->SourceText[$i]);
			if($h>=160){
				$l=ord($this->SourceText[$i+1]);
				if($h==161 && $l==64){
					$result.="  ";
				}else{
					fseek($this->ctf,($h-160)*510+($l-1)*2);
					if($this->addslashes !== true) $result.=fread($this->ctf,2);
					else $result.=addslashes(fread($this->ctf,2));
				}
				$i++;
			}else{
				$result.=$this->SourceText[$i];
			}
		}

		if($i==$max) $result.=$this->SourceText[$i];

		fclose($this->ctf);

		// ��� $thisSourceText
		$this->SourceText = "";

		// ����ת�����
		return $result;
	} // ���� GB2312toBIG5 ����

	/**
	* �������õ��ı�����Ѱƴ��
	*/
	function PinYinSearch($num){

		if($num>0&&$num<160){
			return chr($num);
		}

		elseif($num<-20319||$num>-10247){
			return "";
		}

		else{

			for($i=count($this->pinyin_table)-1;$i>=0;$i--){
				if($this->pinyin_table[$i][1]<=$num)
				break;
			}

			return $this->pinyin_table[$i][0];
		}
	} // ���� PinYinSearch ����

	/**
	* ���塢�������� -> ƴ�� ת��
	*/
	function CHStoPinYin(){

		if ( $this->config['SourceLang']=="BIG5" ) {
			$this->ctf = fopen($this->codetable_dir.$this->config['BIG5toGB_table'], "r");
			if (is_null($this->ctf)) {
				$this->raiseError("Open code table file failure!", JIEQI_ERROR_RETURN);
			}

			$this->SourceText = $this->GB2312toBIG5();
			$this->config['TargetLang'] = "PinYin";
		}

		$ret = array();
		$ri = 0;
		for($i=0;$i<strlen($this->SourceText);$i++){

			$p=ord(substr($this->SourceText,$i,1));

			if($p>160){
				$q=ord(substr($this->SourceText,++$i,1));
				$p=$p*256+$q-65536;
			}

			$ret[$ri]=$this->PinYinSearch($p);
			$ri = $ri + 1;
		}

		// ��� $this->SourceText
		$this->SourceText = "";

		$this->pinyin_table = array();

		// ����ת����Ľ��
		return implode(" ", $ret);
	} // ���� CHStoPinYin ����

	/**
	* ���ת�����
	*/
	function ConvertIT()
	{
		// �ж��Ƿ�Ϊ���ķ�����ת��
		if ( ($this->config['SourceLang']=="GB2312" || $this->config['SourceLang']=="BIG5") && ($this->config['TargetLang']=="GB2312" || $this->config['TargetLang']=="BIG5") ) {
			return $this->GB2312toBIG5();
		}

		// �ж��Ƿ�Ϊ����������ƴ��ת��
		if ( ($this->config['SourceLang']=="GB2312" || $this->config['SourceLang']=="BIG5") && $this->config['TargetLang']=="PinYin" ) {

			return $this->CHStoPinYin();
		}

		// �ж��Ƿ�Ϊ���塢����������UTF8ת��
		if ( ($this->config['SourceLang']=="GB2312" || $this->config['SourceLang']=="BIG5" || $this->config['SourceLang']=="UTF8") && ($this->config['TargetLang']=="UTF8" || $this->config['TargetLang']=="GB2312" || $this->config['TargetLang']=="BIG5") ) {
			return $this->CHStoUTF8();
		}

		// �ж��Ƿ�Ϊ���塢����������UNICODEת��
		if ( ($this->config['SourceLang']=="GB2312" || $this->config['SourceLang']=="BIG5") && $this->config['TargetLang']=="UNICODE" ) {
			return $this->CHStoUNICODE();
		}

	} // ���� ConvertIT ����

} // �������

?>