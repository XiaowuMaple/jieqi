<?php
/**
 * �ʼ�������
 *
 * �ʼ�������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: mail.php 203 2008-11-25 06:10:20Z juny $
 */

/*
//�ʼ����ò���
$this->params['mailtype'] = '2';  // �ʼ����ͷ�ʽ
//		0=�������κ��ʼ�
//		1=ͨ�� PHP ������ UNIX sendmail ����(�Ƽ��˷�ʽ)
//		2=ͨ�� SOCKET ���� SMTP ����������(֧�� ESMTP ��֤)
//		3=ͨ�� PHP ���� SMTP ���� Email(�� win32 ����Ч, ��֧�� ESMTP)
$this->params['maildelimiter'] = '1';  // �ʼ�ͷ�ķָ�����0=ʹ�� LF ��Ϊ�ָ�����1=ʹ�� CRLF ��Ϊ�ָ���
$this->params['mailserver'] = 'smtp.126.com';  // SMTP ������
$this->params['mailport'] = '25';  // SMTP �˿�, Ĭ�ϲ����޸�
$this->params['mailauth'] = '1';   // �Ƿ���Ҫ AUTH LOGIN ��֤, 1=��, 0=��
$this->params['mailfrom'] = 'JieqiCMS <windflaw@126.com>';    // �����˵�ַ (�����Ҫ��֤,����Ϊ����������ַ)
$this->params['mailuser'] = 'windflaw@126.com';    // ��֤�û���
$this->params['mailpassword'] = '******';    // ��֤����
*/
class JieqiMail extends JieqiObject
{
	var $to;
	var $subject;
	var $content;
	var $params = array('mailtype'=>1, 'maildelimiter'=>1, 'charset'=>JIEQI_CHAR_SET, 'mailfrom'=>JIEQI_CONTACT_EMAIL);

	function JieqiMail($to, $subject, $content, $params=array())
	{
		if(is_array($to)) $this->to = $to;
		else $this->to[] = $to;
		if(is_array($params)) $this->params = array_merge($this->params, $params);
		//�Ƿ����ת��
		if($this->params['charset'] != JIEQI_SYSTEM_CHARSET){
			$tmpary=array('gbk'=>'gb', 'big5'=>'big5', 'utf8'=>'utf8');
			$charset_convert_out='jieqi_'.$tmpary[JIEQI_SYSTEM_CHARSET].'2'.$tmpary[$this->params['charset']];
			include_once(JIEQI_ROOT_PATH.'/include/changecode.php');
			if(function_exists($charset_convert_out)){
				$subject = call_user_func($charset_convert_out, $subject);
				$content = call_user_func($charset_convert_out, $content);
			}else{
				if(!isset($params['charset'])) $this->params['charset']=JIEQI_SYSTEM_CHARSET;
			}
		}

		$this->subject = $subject;
		$this->content = $content;
	}

	//���ò���
	function setParam($var, $value='')
	{
		if(is_array($var)) $this->params = array_merge($this->params, $var);
		else $this->params[$var] = $value;
	}

	//�����ʼ�
	function sendmail()
	{
		
		$maildelimiter = !empty($this->params['maildelimiter']) ? "\r\n" : "\n";
		//		$mailusername = isset($mailusername) ? $mailusername : 1;  //mailto�Ƿ�ʹ�� User <user@example.com>��ʽ
		$subject = '=?'.$this->params['charset'].'?B?'.base64_encode(str_replace(array("\r", "\n"), '',$this->subject)).'?=';
		$content = chunk_split(base64_encode(str_replace(array("\n\r", "\r\n", "\r", "\n", "\r\n."), array("\r", "\n", "\n", "\r\n", " \r\n.."), $this->content)));

		$from = $this->params['mailfrom'] == '' ? '=?'.$this->params['charset'].'?B?'.base64_encode(JIEQI_SITE_NAME)."?= <".JIEQI_CONTACT_EMAIL.">" : (preg_match('/^(.+?) \<(.+?)\>$/',$this->params['mailfrom'], $froms) ? '=?'.$this->params['charset'].'?B?'.base64_encode($froms[1])."?= <$froms[2]>" : $this->params['mailfrom']);
		$to = implode(',', $this->to);
		//		$to = $this->to;
		$headers = "From: $from{$maildelimiter}MIME-Version: 1.0{$maildelimiter}Content-type: text/plain; charset=".$this->params['charset']."{$maildelimiter}Content-Transfer-Encoding: base64{$maildelimiter}";

		if($this->params['mailtype'] == 1 && function_exists('mail')) {

			//strpos($to, ',') ? '' : @mail($to, $subject, $content, $headers);
			@mail($to, $subject, $content, $headers);

		} elseif($this->params['mailtype'] == 2) {

			if(!$fp = fsockopen($this->params['mailserver'], $this->params['mailport'], $errno, $errstr, 30)) {
				$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") CONNECT - Unable to connect to the SMTP server, please check your configs.", JIEQI_ERROR_RETURN);
			}
			stream_set_blocking($fp, true);

			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != '220') {
				$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") CONNECT - ".$lastmessage,JIEQI_ERROR_RETURN);
			}

			fputs($fp, ($this->params['mailauth'] ? 'EHLO' : 'HELO')." JieqiCMS\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 220 && substr($lastmessage, 0, 3) != 250) {
				$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") HELO/EHLO - ".$lastmessage,JIEQI_ERROR_RETURN);
			}

			while(1) {
				if(substr($lastmessage, 3, 1) != '-' || empty($lastmessage)) {
					break;
				}
				$lastmessage = fgets($fp, 512);
			}

			if($this->params['mailauth']) {
				fputs($fp, "AUTH LOGIN\r\n");
				$lastmessage = fgets($fp, 512);
				if(substr($lastmessage, 0, 3) != 334) {
					$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") AUTH LOGIN - ".$lastmessage, JIEQI_ERROR_RETURN);
				}

				fputs($fp, base64_encode($this->params['mailuser'])."\r\n");
				$lastmessage = fgets($fp, 512);
				if(substr($lastmessage, 0, 3) != 334) {
					$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") USERNAME - ".$lastmessage, JIEQI_ERROR_RETURN);
				}

				fputs($fp, base64_encode($this->params['mailpassword'])."\r\n");
				$lastmessage = fgets($fp, 512);
				if(substr($lastmessage, 0, 3) != 235) {
					$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") PASSWORD - ".$lastmessage, JIEQI_ERROR_RETURN);
				}

				//$from = $this->params['mailfrom'];
			}

			fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $from).">\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 250) {
				fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $from).">\r\n");
				$lastmessage = fgets($fp, 512);
				if(substr($lastmessage, 0, 3) != 250) {
					$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") MAIL FROM - ".$lastmessage, JIEQI_ERROR_RETURN);
				}
			}

			foreach(explode(',', $to) as $touser) {
				$touser = trim($touser);
				if($touser) {
					fputs($fp, "RCPT TO: <$touser>\r\n");
					$lastmessage = fgets($fp, 512);
					if(substr($lastmessage, 0, 3) != 250) {
						fputs($fp, "RCPT TO: <$touser>\r\n");
						$lastmessage = fgets($fp, 512);
						$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") RCPT TO - ".$lastmessage, JIEQI_ERROR_RETURN);
					}
				}
			}

			fputs($fp, "DATA\r\n");
			$lastmessage = fgets($fp, 512);
			if(substr($lastmessage, 0, 3) != 354) {
				$this->raiseError("(".$this->params['mailserver'].":".$this->params['mailport'].") DATA - ".$lastmessage, JIEQI_ERROR_RETURN);
			}

			fputs($fp, "To: $to\r\nSubject: $subject\r\n$headers\r\n$content\r\n.\r\n");
			fputs($fp, "QUIT\r\n");

		} elseif($this->params['mailtype'] == 3) {

			ini_set('SMTP', $this->params['mailserver']);
			ini_set('smtp_port', $this->params['mailport']);
			ini_set('sendmail_from', $from);

			@mail($to, $subject, $content, $headers);
			/*
			foreach(explode(',', $to) as $touser) {
			$touser = trim($touser);
			if($touser) {
			@mail($touser, $subject, $content, $headers);
			}
			}
			*/
		}
	}

}


?>