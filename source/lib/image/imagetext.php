<?php
/**
 * ����ͼƬ����
 *
 * ����������ͼƬ����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: imagetext.php 317 2009-01-06 09:03:33Z juny $
 */

class ImageText extends JieqiObject{
	//�����ڱ����е���ʼλ��
	var $_startx = 20;
	var $_starty = 50;

	//ͼƬ����
	var $_imagewidth = 0;
	var $_imageheight = 0;

	//�����������з�ʽ
	var $_align = 'left';
	//�����������з�ʽ
	var $_valign = 'top';

	//������б�Ƕ�
	var $_angle = 0;
	//ͼƬ����
	var $_imagetype = 'png';
	//ͼƬ��ɫ
	var $_imagecolor = '#ffffff';
	//������ɫ
	var $_textcolor = '#000000';
	//��������
	var $_text;
	//��Ӱ��ɫ
	var $_shadowcolor = '';
	//��Ӱ���
	var $_shadowdeep = 0;
	//���ɵ�ͼƬ��Դ
	var $_img;
	//�����С
	var $_fontsize = 10;
	//�����ļ�
	var $_fontfile = '';
	//����ͼƬ
	var $_backimage = '';
	//ˮӡͼƬ
	var $_waterimage = '';
	//ˮӡͼƬλ��
	var $_wateriplace = 0; //0:"����ˮӡ";1:"��������";2:"��������";3:"��������";4:"�в�����";5:"�в�����";6:"�в�����";7:"�ײ�����";8:"�ײ�����";9:"�ײ�����";10:"���λ��";}
	//ˮӡͼƬ͸����
	var $_wateritrans = 30; //0~100 ��ֵԽ��ˮӡͼƬ͸����Խ��
	//���jpeg��ʽʱͼƬ����
	var $_jpegquality = 75; //0~100

	//ˮӡ����λ��
	var $_watertplace = 0; //0 ����ˮӡ��1 �Ľ� 2 ƽ��
	//ˮӡ����
	var $_watertext = '';
	//ˮӡ������ɫ
	var $_watercolor = '';
	//ˮӡ���ֽǶ�
	var $_waterangle = 45;
	//ˮӡ�����С
	var $_watersize = 10;
	//ˮӡ͸����
	var $_waterpct = 30;


	function ImageText($text='')
	{
		$this->JieqiObject();

		$this->set('text', $text);
	}


	// ���ò���
	function set($option, $value=NULL)
	{
		if(is_array($option)){
			foreach ($option as $opt => $val) {
				$this->{'_'.$opt}=$val;
			}
		}else{
			$this->{'_'.$option}=$value;
		}
		return true;
	}

	// ��ȡ����
	function get($option)
	{
		if(isset($this->{'_'.$option}))	return $this->{'_'.$option};
		else return false;
	}

	//����RGB��ʽ��ɫ
	function convertRGB($scolor)
	{
		if (preg_match("/^[#|]([a-f0-9]{2})?([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})$/i", $scolor, $matches)) {
			return array(
			'r' => hexdec($matches[2]),
			'g' => hexdec($matches[3]),
			'b' => hexdec($matches[4]),
			'a' => hexdec(!empty($matches[1])?$matches[1]:0),
			);
		}
		return false;
	}

	//�����Ű�
	function typeset($str='', $width=80, $start=0)
	{
		$tmpstr='';
		$strlen=strlen($str);
		$point=$start;
		for($i=0; $i<$strlen; $i++) {
			if($point>$width){
				$tmpstr.="\n";
				$point=0;
			}
			if (ord($str[$i]) > 0x80) {
				$tmpstr .= $str[$i].$str[++$i];
				$point+=2;
			} else{
				$tmpstr .= $str[$i];
				if($str[$i]=="\n") $point=0;
				else $point+=1;
			}
		}
		return $tmpstr;
	}

	//���ͼƬ����
	function getimagetype($fname)
	{
		$tmpary=explode('.',$fname);
		if(count($tmpary)>1){
			if($tmpary[count($tmpary)-1]=='jpg') return 'jpeg';
			else return $tmpary[count($tmpary)-1];
		}else return '';
	}

	//����ͼƬ
	function createimage()
	{
		//�Զ����ͼƬ����
		if(empty($this->_imagewidth) OR empty($this->_imageheight)){
			$boxary=imagettfbbox($this->_fontsize,$this->_angle,$this->_fontfile,$this->_text);
			$this->_imagewidth=max(abs($boxary[2] - $boxary[6]),abs($boxary[4] - $boxary[0]));
			$this->_imagewidth+=$this->_startx + $this->_startx;
			$this->_imageheight=max(abs($boxary[1] - $boxary[5]), abs($boxary[3] - $boxary[7]));
			$this->_imageheight+=$this->_starty + $this->_starty;
		}
		//����ͼƬ
		$this->_img = imagecreate($this->_imagewidth, $this->_imageheight);

		//��ȡ��ɫ
		$colorary=$this->convertRGB($this->_imagecolor);
		$bkcolor = imagecolorallocate($this->_img, $colorary['r'],$colorary['g'],$colorary['b']);
		$colorary=$this->convertRGB($this->_textcolor);
		$ftcolor = imagecolorallocate($this->_img, $colorary['r'],$colorary['g'],$colorary['b']);

		//ƽ�̱���
		if(!empty($this->_backimage) && file_exists($this->_backimage)){
			$imgtype=$this->getimagetype($this->_backimage);
			$imgfun='imagecreatefrom'.$imgtype;

			if(function_exists($imgfun)){
				$backimage=$imgfun($this->_backimage);
				if(is_resource($backimage)){
					$backwidth=imagesx($backimage);
					$backheight=imagesy($backimage);
					$cols=ceil($this->_imagewidth / $backwidth);
					$rows=ceil($this->_imageheight / $backheight);
					$startx=0;
					$starty=0;
					for($i=1; $i<=$rows; $i++){
						for($j=1; $j<=$cols; $j++){
							//imagecopymerge($this->_img,$backimage,$startx,$starty,0,0,$backwidth,$backheight,100);
							imagecopy($this->_img,$backimage,$startx,$starty,0,0,$backwidth,$backheight);
							$startx+=$backwidth;
						}
						$startx=0;
						$starty+=$backheight;
					}
				}
			}
		}

		//������Ӱ
		if(!empty($this->_shadowcolor) && !empty($this->_shadowdeep)){
			$colorary=$this->convertRGB($this->_shadowcolor);
			$sdcolor = imagecolorallocate($this->_img, $colorary['r'],$colorary['g'],$colorary['b']);
			imagettftext($this->_img, $this->_fontsize, $this->_angle, $this->_startx + $this->_shadowdeep, $this->_starty + $this->_shadowdeep, $sdcolor, $this->_fontfile, $this->_text);
		}

		//��������ˮӡ
		if($this->_watertplace > 0 && !empty($this->_watertext) && !empty($this->_watercolor)){
			$boxary=imagettfbbox($this->_watersize,$this->_waterangle,$this->_fontfile,$this->_watertext);
			$waterwidth=max(abs($boxary[2] - $boxary[6]),abs($boxary[4] - $boxary[0]))*2;
			$waterheight=max(abs($boxary[1] - $boxary[5]), abs($boxary[3] - $boxary[7]))*2;
			$waterimage=imagecreate($waterwidth, $waterheight);
			$colorary=$this->convertRGB('#ffffff');
			$bkcolor = imagecolorallocate($waterimage, $colorary['r'],$colorary['g'],$colorary['b']);
			imagecolortransparent($waterimage,$bkcolor);
			$colorary=$this->convertRGB($this->_watercolor);
			$ftcolor = imagecolorallocate($waterimage, $colorary['r'],$colorary['g'],$colorary['b']);
			imagettftext($waterimage, $this->_watersize, $this->_waterangle, $waterwidth/2 , $waterheight/2, $ftcolor, $this->_fontfile, $this->_watertext);
			if($this->_watertplace == 1){
				imagecopymerge($this->_img,$waterimage,0,0,0,0,$waterwidth,$waterheight,$this->_waterpct);
				imagecopymerge($this->_img,$waterimage,$this->_imagewidth - $waterwidth,0,0,0,$waterwidth,$waterheight,$this->_waterpct);
				imagecopymerge($this->_img,$waterimage,0,$this->_imageheight - $waterheight,0,0,$waterwidth,$waterheight,$this->_waterpct);
				imagecopymerge($this->_img,$waterimage,$this->_imagewidth - $waterwidth,$this->_imageheight - $waterheight,0,0,$waterwidth,$waterheight,$this->_waterpct);
			}elseif($this->_watertplace == 2){
				$cols=ceil($this->_imagewidth / $waterwidth);
				$rows=ceil($this->_imageheight / $waterheight);
				$startx=0;
				$starty=0;
				for($i=1; $i<=$rows; $i++){
					for($j=1; $j<=$cols; $j++){
						imagecopymerge($this->_img,$waterimage,$startx,$starty,0,0,$waterwidth,$waterheight,$this->_waterpct);
						//imagecopymergegray($this->_img,$waterimage,$startx,$starty,0,0,$waterwidth,$waterheight,$this->_waterpct);
						$startx+=$waterwidth;
					}
					$startx=0;
					$starty+=$waterheight;
				}
			}
		}

		//�������
		imagettftext($this->_img, $this->_fontsize, $this->_angle, $this->_startx, $this->_starty, $ftcolor, $this->_fontfile, $this->_text);

		//��ͼƬˮӡ
		if(!empty($this->_wateriplace) && !empty($this->_waterimage) && file_exists($this->_waterimage)){
			$imgtype=$this->getimagetype($this->_waterimage);
			$imgfun='imagecreatefrom'.$imgtype;

			if(function_exists($imgfun)){
				$waterimage=$imgfun($this->_waterimage);
				if(is_resource($waterimage)){
					$waterwidth=imagesx($waterimage);
					$waterheight=imagesy($waterimage);
					$temp_wm_image = $this->getpos($this->_wateriplace, $this->_imagewidth,$this->_imageheight,$waterwidth,$waterheight);
					$wm_image_x = $temp_wm_image["dest_x"];
					$wm_image_y = $temp_wm_image["dest_y"];
					imagecopymerge($this->_img, $waterimage, $wm_image_x, $wm_image_y, 0, 0, $waterwidth, $waterheight,$this->_wateritrans);
				}
			}
		}

		//����͸��
		imagecolortransparent($this->_img, $bkcolor);
	}

	//���ñ���͸��
	function settransparent($color){
		$colorary=$this->convertRGB($color);
		$tcolor = imagecolorallocate($this->_img, $colorary['r'],$colorary['g'],$colorary['b']);
		imagecolortransparent($this->img, $tcolor);
	}

	//������������ˮӡ
	function hidewaternum($num=0, $x=0, $y=0, $w=8)
	{
		$bgcolor=imagecolorat($this->_img, 0, 0);
	}

	//����ͼ��
	function destroyimage()
	{
		if(is_resource($this->_img)) imagedestroy($this->_img);

	}

	//��ʾͼƬ
	function display($destroy=true)
	{
		if(!is_resource($this->_img)) $this->createimage();
		switch($this->_imagetype){
			case 'jpg':
			case 'jpeg':
				header("Content-type: image/jpeg");
				imagejpeg($this->_img, '', $this->_jpegquality);
				break;
			case 'gif':
				header("Content-type: image/gif");
				imagegif($this->_img);
				break;
			case 'bmp':
				include_once(dirname(__FILE__).'/gdbmp.php');
				header("Content-type: image/bmp");
				imagebmp($this->_img);
				break;
			case 'png':
			default:
				header("Content-type: image/png");
				imagepng($this->_img);
				break;
		}
		if($destroy) $this->destroyimage();
	}

	//����ͼƬ
	function save($fname, $destroy=false)
	{
		if(!is_resource($this->_img)) $this->createimage();
		switch($this->_imagetype){
			case 'jpg':
			case 'jpeg':
				$ret=imagejpeg($this->_img, $fname, $this->_jpegquality);
				break;
			case 'gif':
				$ret=imagegif($this->_img, $fname);
				break;
			case 'bmp':
				include_once(dirname(__FILE__).'/gdbmp.php');
				$ret=imagebmp($this->_img, $fname);
				break;
			case 'png':
			default:
				$ret=imagepng($this->_img, $fname);
				break;
		}
		if($destroy) $this->destroyimage();
		return $ret;
	}

	/*
	getPos               ����Դͼ��ĳ�����λ�ô��룬ˮӡͼƬid�����ɰ�ˮӡ���õ�Դͼ���е�λ��
	�ڲ�����

	$sourcefile_width:        Դͼ��Ŀ�
	$sourcefile_height: ԭͼ��ĸ�
	$pos:               λ�ô���
	// 1 = top left ����
	// 2 = top middle ����
	// 3 = top right ����
	// 4 = middle left ����
	// 5 = middle ����
	// 6 = middle right ����
	// 7 = bottom left ����
	// 8 = bottom middle ����
	// 9 = bottom right ����
	// 10 = rand ���
	$wm_image:           ˮӡͼƬID
	*/
	function getpos($pos,$sourcefile_width,$sourcefile_height,$insertfile_width, $insertfile_height){
		switch ($pos){
			case 1:
				$dest_x = 0;
				$dest_y = 0;
				break;
			case 2:
				$dest_x = ( ( $sourcefile_width - $insertfile_width ) / 2 );
				$dest_y = 0;
				break;
			case 3:
				$dest_x = $sourcefile_width - $insertfile_width;
				$dest_y = 0;
				break;
			case 4:
				$dest_x = 0;
				$dest_y = ( $sourcefile_height / 2 ) - ( $insertfile_height / 2 );
				break;
			case 5:
				$dest_x = ( $sourcefile_width / 2 ) - ( $insertfile_width / 2 );
				$dest_y = ( $sourcefile_height / 2 ) - ( $insertfile_height / 2 );
				break;
			case 6:
				$dest_x = $sourcefile_width - $insertfile_width;
				$dest_y = ( $sourcefile_height / 2 ) - ( $insertfile_height / 2 );
				break;
			case 7:
				$dest_x = 0;
				$dest_y = $sourcefile_height - $insertfile_height;
				break;
			case 8:
				$dest_x = ( ( $sourcefile_width - $insertfile_width ) / 2 );
				$dest_y = $sourcefile_height - $insertfile_height;
				break;
			case 9:
				$dest_x = $sourcefile_width - $insertfile_width;
				$dest_y = $sourcefile_height - $insertfile_height;
				break;
			case 10:
				$dest_x = rand(0,($sourcefile_width - $insertfile_width));
				$dest_y = rand(0,($sourcefile_height - $insertfile_height));
				break;
			default:
				$dest_x = $sourcefile_width - $insertfile_width;
				$dest_y = $sourcefile_height - $insertfile_height;
				break;
		}
		return array("dest_x"=>$dest_x,"dest_y"=>$dest_y);
	}



}
?>