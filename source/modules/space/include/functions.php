<?php
//�����ֽ���ȡ���ļ��Ĵ�С	
function sizeCount($byte){
	if($byte >= 1073741824)
	{
		$temp = round($byte / 1073741824, 2) . " GB";
	}
	elseif($byte >= 1048576)
	{
		$temp = round($byte / 1048576, 2) . " MB";
	}
	elseif($byte >= 1024)
	{
		$temp = round($byte / 1024, 2) . " KB";
	}
	else
	{
		$byte = $byte?$byte:0;
		$temp = $byte . " bytes";
	}
	return $temp;
}


//�����ļ��л����ļ��Ĵ�С
function getSize($path){
	if(!is_dir($path)) return @filesize($path);
	if ($handle = @opendir($path)) {
		$size = 0;
		while (false !== ($file = @readdir($handle))) {
			if($file!='.' && $file!='..'){
				$size += @filesize($path.'/'.$file);
				$size += $this->getSize($path.'/'.$file);
			}
		}
		@closedir($handle);
		return $size;
	}
}
	

//����ϴ��ļ��ǲ���ͼƬ
function checkType($pictype)
{
	$typeList =  "image/pjpeg,image/jpg,image/jpeg,image/gif,image/x-png,image/png";
	$mime = explode(",", $typeList);
	$is_vaild = 0;
	foreach ($mime as $type)
	{
		if($pictype == $type){$is_vaild = 1;}
	}
	return $is_vaild;
}

function checkPic($pic,$prosize=10000000){
	if(!checkType( $pic['type'] ) ){
		$error .= $pic['name'].' is not a image<br /> ';
	}
	
	if($pic['size'] > 2097152){
		$error .= $pic['name'].' is too big <br />';
	}

	if(!is_uploaded_file($pic['tmp_name']) ){
		$error .= $pic['name'].' is not valid <br />';
	}
	if($error){
		return $error;
	}else{
		return 'ok';
	}
}
	
//��������ͼ
function image_resize($srcFile,$toFile,$toW="100",$toH="100")
{	
	$res = '';	
	$info = '';
	$data = GetImageSize($srcFile,$info);

	//�жϷ������Ƿ�֧��
	switch ($data[2])
	{
		case 1:
			if(!function_exists("imagecreatefromgif")){
				return '���GD�ⲻ��ʹ��GIF��ʽ��ͼƬ����ʹ��Jpeg��PNG��ʽ!';
			}
			$im = ImageCreateFromGIF($srcFile);
			break;
		case 2:
			if(!function_exists("imagecreatefromjpeg")){
				return '���GD�ⲻ��ʹ��jpeg��ʽ��ͼƬ����ʹ��������ʽ��ͼƬ!';
			}
			$im = ImageCreateFromJpeg($srcFile);
			break;
		case 3:
			$im = ImageCreateFromPNG($srcFile);
			break;
	}

	//��������ͼ���Ϳ�
	$srcW=ImageSX($im);
	$srcH=ImageSY($im);
	$toWH=$toW/$toH;
	$srcWH=$srcW/$srcH;
	if($toWH<=$srcWH){
		$ftoW=$toW;
		$ftoH=$ftoW*($srcH/$srcW);
	}
	else{
		$ftoH=$toH;
		$ftoW=$ftoH*($srcW/$srcH);
	}


	//��������ͼ
	if($srcW>$toW||$srcH>$toH)
	{
		if(function_exists("imagecreatetruecolor")){
			@$ni = ImageCreateTrueColor($ftoW,$ftoH);
			if($ni) ImageCopyResampled($ni,$im,0,0,0,0,$ftoW,$ftoH,$srcW,$srcH);
			else{
				$ni=ImageCreate($ftoW,$ftoH);
				ImageCopyResized($ni,$im,0,0,0,0,$ftoW,$ftoH,$srcW,$srcH);
			}
		}else{
			$ni=ImageCreate($ftoW,$ftoH);
			ImageCopyResized($ni,$im,0,0,0,0,$ftoW,$ftoH,$srcW,$srcH);
		}

	}

	//�ж��Ƿ�����,�Լ���ȷ����
	if($ni){
		$outputFile = &$ni;
	}else{
		$outputFile = &$im;
	}



	//��������ͼ
	if(function_exists('imagejpeg')) {
		ImageJpeg($outputFile,$toFile);
	}else {
		ImagePNG($outputFile,$toFile);
	}

	//����ͼƬ
	if($ni){ImageDestroy($ni);}
	ImageDestroy($im);
	return 1 ;

}
	
	
function copyDir($sourceDir,$targetDir){
		@mkdir($targetDir, 0777);
		$dirHandle = @opendir($sourceDir);
		while (false !== ($file = @readdir($dirHandle))) {
			if($file != ".." and $file != "." and $file != ""){
				if(is_dir($sourceDir.'/'.$file)){
					@mkdir($targetDir.'/'.$file, 0777);
					copyDir($sourceDir.'/'.$file, $targetDir.'/'.$file);
				}else{
					if(!@copy($sourceDir.'/'.$file ,$targetDir.'/'.$file) or !@chmod($targetDir.'/'.$file, 0777)){
						return false;
					}
				}
			}

		}
		closedir($dirHandle);
		return true;
	}



function updatebinfo($bid){
	global $blog_handler;
	$criteria = new Criteria('bid',$bid );
	$blog_handler->queryObjects($criteria);
	$tmp = $blog_handler->getRow();
	$string = "<?php \n";
	$string .= '//Don\'t modify me! '.date("Y-m-d H:i:s")."\n";
	foreach ($tmp as $key=>$value) {
		$string .= "\$$key='$value'; \n";
	}
	$string .= '?>';
	jieqi_writefile(JIEQI_ROOT_PATH."/modules/".JIEQI_MODULE_NAME."/b/$bid/info.php",$string);
}

function setpower($bid){
	if($uid = $_SESSION['jieqiUserId']){
		if( !isset($_SESSION[$uid][$bid] ) ){
			if(!isset($member_handler) ) {
				include_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/class/member.php');
				$member_handler = JieqimemberHandler::getInstance('JieqimemberHandler');
			}	
			$criteria = new CriteriaCompo(new Criteria('uid',$uid) );
			$criteria->add(new Criteria('bid',$bid ) );
			$member_handler->queryObjects($criteria);
			$tmp = $member_handler->getRow();
			if ($tmp['mswitch'] == 0 ) {
				return true;
			} 
		        $_SESSION[$uid][$bid] = $tmp['memberbid']; 
		}
		$memberbid = $_SESSION[$uid][$bid];
		@include_once( JIEQI_ROOT_PATH.'/configs/'.JIEQI_MODULE_NAME.'/memberblog_'.$memberbid.'.php' );
		if( $adminbid ){
			@include_once(JIEQI_ROOT_PATH.'/configs/'.JIEQI_MODULE_NAME.'/adminblog_'.$adminbid.'.php');
		}	
	} 
	return true;
}


function update_binfo($fields,$bid){
	require_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/class/blog.php');
	$blog_handler = JieqiblogHandler::getInstance('JieqiblogHandler');
	$criteria = new Criteria('bid',$bid);
	$blog_handler->updatefields($fields,$criteria);
}


?>
