<?php 
/**
 * ����ͼƬ��ʽ���ύ��֤��
 *
 * ֧��ʹ��GD��Ͳ�ʹ�����֣�png��ʽ
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: checkcode.php 166 2008-11-21 07:59:49Z juny $
 */

define('JIEQI_MODULE_NAME', 'system');
define('JIEQI_NEED_SESSION', 1);
require_once('global.php');

jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');

//ʹ��GD��������֤��
define('CHECK_CODE_LENGTH', 4);  //У���볤��
define('CHECK_CODE_HEIGHT', 18);  //У����߶�
define('CHECK_CODE_WIDTH', 10);  //У�����ȣ������֣�
define('CHECK_CODE_SPACEX', 6);  //У������߿�
define('CHECK_CODE_SPACEY', 2);  //У���붥����
define('CHECK_CODE_SPACEM', 3);  //У�����ַ����
header("Content-type: image/png");

$digits = array(95, 5, 118, 117, 45, 121, 123, 69, 127, 125);
$lines = array(1, 1, 1, 2, 0, 1, 0, 2, 1, 0, 1, 1, 0, 0, 0, 1, 0, 2, 1, 2, 0, 1, 1, 1, 0, 0, 1, 0);
$sx = (CHECK_CODE_WIDTH * CHECK_CODE_LENGTH) + (CHECK_CODE_SPACEM * (CHECK_CODE_LENGTH - 1)) + CHECK_CODE_SPACEX + CHECK_CODE_SPACEX;
$sy = CHECK_CODE_HEIGHT;
$checkcode=jieqi_randcode(CHECK_CODE_LENGTH);
$_SESSION['jieqiCheckCode']=$checkcode;

if($jieqiConfigs['system']['usegd'] && function_exists('gd_info')){
	//ʹ��gd������
	$im = imagecreate($sx,$sy);
	$black = imagecolorallocate($im, 0,0,0);
	$white = imagecolorallocate($im, 255,255,255);
	$back = imagecolorallocate($im, 166,166,166);
	$gray = imagecolorallocate($im, 210,210,210);
	$gray1 = imagecolorallocate($im, 107,107,107);
	imagefill($im,0,0,$back);
	//����λ������֤�����ͼƬ
	//imagestring($im, 5, 15, 1, $xflogincode, $white);
	$k=CHECK_CODE_SPACEX;
	for($i=0; $i<CHECK_CODE_LENGTH; $i++){
		imagestring($im, 5, $k, CHECK_CODE_SPACEY, substr($checkcode,$i,1), $white);
		$k+=CHECK_CODE_WIDTH + CHECK_CODE_SPACEM;
	}

	for($i=0;$i<25;$i++) //�����������
	{
		imagesetpixel($im, rand()%70 , rand()%30 , $gray);
		imagesetpixel($im, rand()%70 , rand()%30 , $gray1);
	}
	imagepng($im);
	imagedestroy($im);
}else{
	//����gd������
	$pixels = "";
	// ���
	for ($h = 0; $h < $sy; $h++) {
		for ($w = 0; $w < $sx; $w++) {
			$r = 100 / $sx * $w + 155;
			$g = 100 / $sy * $h + 155;
			$b = 255 - (100 / ($sx + $sy) * ($w + $h));
			$pixels .= chr($r);
			$pixels .= chr($g);
			$pixels .= chr($b);
		}
	}
	$x=CHECK_CODE_SPACEX;
	for($i=0; $i<CHECK_CODE_LENGTH; $i++){
		draw_digit($x, CHECK_CODE_SPACEY, substr($checkcode, $i, 1));
		$x+=CHECK_CODE_WIDTH + CHECK_CODE_SPACEM;
	}

	// ����ѭ��������У���
	$z = -306674912;  // = 0xedb88320
	for ($n = 0; $n < 256; $n++) {
		$c = $n;
		for ($k = 0; $k < 8; $k++) {
			$c2 = ($c >> 1) & 0x7fffffff;
			if ($c & 1) $c = $z ^ ($c2); else $c = $c2;
		}
		$crc_table[$n] = $c;
	}

	// PNG file signature
	$result = pack("c*", 137,80,78,71,13,10,26,10);

	// IHDR chunk data:
	//   width:              4 bytes
	//   height:             4 bytes
	//   bit depth:          1 byte (8 bits per RGB value)
	//   color type:         1 byte (2 = RGB)
	//   compression method: 1 byte (0 = deflate/inflate)
	//   filter method:      1 byte (0 = adaptive filtering)
	//   interlace method:   1 byte (0 = no interlace)
	$data = pack("c*", ($sx >> 24) & 255,
	($sx >> 16) & 255,
	($sx >> 8) & 255,
	$sx & 255,
	($sy >> 24) & 255,
	($sy >> 16) & 255,
	($sy >> 8) & 255,
	$sy & 255,
	8,
	2,
	0,
	0,
	0);
	add_chunk("IHDR");

	$len = ($sx * 3 + 1) * $sy;
	$data = pack("c*", 0x78, 0x01,
	1,
	$len & 255,
	($len >> 8) & 255,
	255 - ($len & 255),
	255 - (($len >> 8) & 255));
	$start = strlen($data);
	$i2 = 0;
	for ($h = 0; $h < $sy; $h++) {
		$data .= chr(0);
		for ($w = 0; $w < $sx * 3; $w++) {
			$data .= $pixels[$i2++];
		}
	}

	$s1 = 1;
	$s2 = 0;
	for ($n = $start; $n < strlen($data); $n++) {
		$s1 = ($s1 + ord($data[$n])) % 65521;
		$s2 = ($s2 + $s1) % 65521;
	}
	$adler = ($s2 << 16) | $s1;

	$data .= chr(($adler >> 24) & 255);
	$data .= chr(($adler >> 16) & 255);
	$data .= chr(($adler >> 8) & 255);
	$data .= chr($adler & 255);
	add_chunk("IDAT");

	// IEND: marks the end of the PNG-file
	$data = "";
	add_chunk("IEND");

	// ��ӡͼ��
	echo($result);
}

/**
 * �����������
 * 
 * @param      int         $len �����λ��
 * @access     public
 * @return     string
 */
function jieqi_randcode($len)
{
	$str = '1234567890';
	$result = '';
	$l = strlen($str)-1;
	srand((double) microtime() * 1000000);
	for($i = 0;$i < $len; $i++){
		$num = rand(0, $l);
		$result .= $str[$num];
	}
	return $result;
}

/**
 * ͼƬ�ϻ�һ������
 * 
 * @param      int         $len �����λ��
 * @access     public
 * @return     string
 */
function draw_digit($x, $y, $digit)
{
	global $sx, $sy, $pixels, $digits, $lines;

	$digit = $digits[$digit];
	$m = 6;
	for ($b = 1, $i = 0; $i < 7; $i++, $b *= 2) {
		if (($b & $digit) == $b) {
			$j = $i * 4;
			$x0 = $lines[$j] * $m + $x;
			$y0 = $lines[$j + 1] * $m + $y;
			$x1 = $lines[$j + 2] * $m + $x;
			$y1 = $lines[$j + 3] * $m + $y;
			if ($x0 == $x1) {
				$ofs = 3 * ($sx * $y0 + $x0);
				for ($h = $y0; $h <= $y1; $h++, $ofs += 3 * $sx) {
					$pixels[$ofs] = chr(0);
					$pixels[$ofs + 1] = chr(0);
					$pixels[$ofs + 2] = chr(0);
				}
			} else {
				$ofs = 3 * ($sx * $y0 + $x0);
				for ($w = $x0; $w <= $x1; $w++) {
					$pixels[$ofs++] = chr(0);
					$pixels[$ofs++] = chr(0);
					$pixels[$ofs++] = chr(0);
				}
			}
		}
	}
}

/**
 * ����־���뵽ͼ����
 * 
 * @param      string       $type
 * @access     public
 * @return     void
 */
function add_chunk($type)
{
	global $result, $data, $chunk, $crc_table;

	// chunk :Ϊ��
	// length: 4 �ֽ�: �������� chunk
	// chunk type: 4 �ֽ�
	// chunk data: length bytes
	// CRC: 4 �ֽ�:  ѭ��������У��

	// copy data and create CRC checksum
	$len = strlen($data);
	$chunk = pack("c*", ($len >> 24) & 255,
	($len >> 16) & 255,
	($len >> 8) & 255,
	$len & 255);
	$chunk .= $type;
	$chunk .= $data;

	// calculate a CRC checksum with the bytes chunk[4..len-1]
	$z = 16777215;
	$z |= 255 << 24;
	$c = $z;
	for ($n = 4; $n < strlen($chunk); $n++) {
		$c8 = ($c >> 8) & 0xffffff;
		$c = $crc_table[($c ^ ord($chunk[$n])) & 0xff] ^ $c8;
	}
	$crc = $c ^ $z;

	$chunk .= chr(($crc >> 24) & 255);
	$chunk .= chr(($crc >> 16) & 255);
	$chunk .= chr(($crc >> 8) & 255);
	$chunk .= chr($crc & 255);

	// ������ӵ�$result��
	$result .= $chunk;
}
?>