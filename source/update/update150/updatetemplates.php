<?php
@set_time_limit(3600);
header('Content-type:text/html;charset=gb2312');

if($_GET['confirm'] != 1){
	echo '<font color="red">ע�⣺</font><br>���������ڸ���ģ���ϵͳ�����ļ����ʺϴ�1.4x�汾������1.50�档<br>����ǰ�뱸�ݺ����¼���Ŀ¼����ȷ����ЩĿ¼����Ŀ¼�����ݿ�д��<br>/configs<br>/themes<br>/templates<br>/modules/article/templates<br>/modules/forum/templates<br><br><a href="'.basename($_SERVER['PHP_SELF']).'?confirm=1">����������ڸ���ģ�������</a><br><br>';
	exit;
}

include_once '../../configs/define.php';

echo '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ';

echo '<hr>���ڸ���ģ��...<br>';
ob_flush();
flush();

//���ϵͳ����Щ����
$modary=array();
$dirname='../../modules';
if(is_dir($dirname)){
	$handle = @opendir($dirname);
	while ($file = @readdir($handle)) {
		if($file[0] != '.'){
			$modary[]=$file;
		}
	}
	@closedir($handle);
}
$modstr=implode('|',$modary);

//��ʼ����
//prep_dirhtml('.', 'update_custom');
//����ͨ��ģ��
prep_dirhtml('../../templates', 'update_custom');
prep_dirhtml('../../themes', 'update_custom');
if(is_dir('../../modules')){
	$handle = @opendir('../../modules');
	while ($file = @readdir($handle)) {
		if($file[0] != '.' && is_dir('../../modules/'.$file.'/templates')) prep_dirhtml('../../modules/'.$file.'/templates', 'update_custom');
	}
}
//����theme���ģ��
prep_dirhtml('../../themes', 'update_theme');
prep_dirhtml('../../themes', 'update_css', array('.css'));
//�Ե�����ģ��ֱ����
update_templates();
//���������ļ�
update_configs();


echo '<br><hr><br><font color="blue">����ִ����ɣ������Թرձ����ڣ�</font>';


//����Ŀ¼���ļ���ִ�и��º���
function prep_dirhtml($dirname, $funname, $ftypes=array('.html')){
	if(is_dir($dirname) && function_exists($funname)){
		$handle = @opendir($dirname);
		while ($file = @readdir($handle)) {
			if($file[0] != '.'){
				if (is_dir($dirname.'/'.$file)){
					prep_dirhtml($dirname.'/'.$file, $funname, $ftypes);
				}else{
					$postfix = strrchr(trim(strtolower($file)),".");
					if(in_array($postfix, $ftypes)){
						$fname=$dirname.'/'.$file;
						$funname($fname);
					}
				}
			}
		}
		@closedir($handle);
	}
}

//ͨ�õ�ģ����º���
function update_custom($fname){
	global $modstr;
	if(is_writable($fname)){
		$data=jieqi_readfile($fname);
		$old_data=$data;
		$repfrom=array(
		'/<table[^<>]*(width="[^"]*")[^<>]*(class="grid")[^<>]*>/isU',
		'/<div class="gridtop">([^<>]*)<\/div>([\r\n\s]*)<table([^<>]*)>/isU',
		'/<table([^<>]*)>([\r\n\s]*)<tr[^<>]*>[\r\n\s]*<td[^<>]*class="title"[^<>]*>([^<>]*)<\/td>[\r\n\s]*<\/tr>/isU',
		'/<td([^<>]*) class="head"([^<>]*)>([^<>]*)<\/td>/isU',
		'/<th([^<>]*)>([^<>]*)<\/td>/isU',
		'/\{\?\$jieqi_usergroup\?\}/isU',
		'/\{\?\$jieqi_url\?\}\/modules\/('.$modstr.')/isU',
		'/\{\?\$('.$modstr.')_dynamic_url\?\}\/modules\/('.$modstr.')/isU',
		'/\{\?\$('.$modstr.')_static_url\?\}\/modules\/('.$modstr.')/isU',
		'/\{\?\$dynamic_url\?\}\/modules\/('.$modstr.')/isU',
		'/\{\?\$static_url\?\}\/modules\/('.$modstr.')/isU',
		'/\{\?\$[^\?\{\}]+\?\}\/userinfo.php/isU',
		'/\{\?\$i\?\}/isU'
		);
		$repto=array(
		'<table \\2 \\1 align="center">',
		'<table\\3>\\2<caption>\\1</caption>',
		'<table\\1>\\2<caption>\\3</caption>',
		'<th\\1\\2>\\3</th>',
		'<th\\1>\\2</th>',
		'{?$jieqi_groupname?}',
		'{?$jieqi_modules[\'\\1\'][\'url\']?}',
		'{?$\\1_dynamic_url?}',
		'{?$\\1_static_url?}',
		'{?$dynamic_url?}',
		'{?$static_url?}',
		'{?$jieqi_user_url?}/userinfo.php',
		'{?$i[\'key\']?}'
		);
		$data=preg_replace($repfrom,$repto,$data);

		//echo jieqi_htmlstr($data);
		if($old_data != $data){
			jieqi_writefile($fname, $data);
			echo '<br>ģ�� <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo '. ';
		}
	}else{
		echo '<br>ģ�� <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
	}
	ob_flush();
	flush();

}

//���·���ļ�
function update_theme($fname){
	global $modstr;
	if(is_writable($fname)){
		$data=jieqi_readfile($fname);
		$old_data=$data;
		$repfrom=array(
		'/\{\?\$jieqi_url\?\}\/modules\/('.$modstr.')\/index\.php\?class/isU',
		'/\{\?\$jieqi_modules\[\'('.$modstr.')\'\]\[\'url\'\]\?\}\/index\.php\?class/isU'
		);
		$repto=array(
		'{?$jieqi_modules[\'\\1\'][\'url\']?}/\\1list.php?class',
		'{?$jieqi_modules[\'\\1\'][\'url\']?}/\\1list.php?class'
		);
		if(strpos($data, 'scripts/common.js') === false){
			$repfrom[]='/<\/head>/isU';
			$repto[]='<script language="javascript" type="text/javascript" src="{?$jieqi_url?}/scripts/common.js"></script>
</head>';
		}
		$data=preg_replace($repfrom,$repto,$data);

		//echo jieqi_htmlstr($data);
		if($old_data != $data){
			jieqi_writefile($fname, $data);
			echo '<br>ģ�� <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo '. ';
		}
	}else{
		echo '<br>ģ�� <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
	}

	ob_flush();
	flush();
}

//����css�ļ�
function update_css($fname){
	global $modstr;
	//����css
	if(strtolower(basename($fname)) == 'style.css'){
		if(is_writable($fname)){
			$data=jieqi_readfile($fname);
			$old_data=$data;

			if(strpos($data, '.hide') === false) $data .= "\r\n".'table.hide, table.hide th, table.hide td{
	border: 0;
}';
			if(strpos($data, '#tips') === false) $data .= "\r\n".'#tips {
	border: 1px solid #a3bee8;
	padding: 3px;
	display: none;
	background: #f0f7ff;
	position: absolute;
}';
			if(strpos($data, '.pagelink') === false) $data .= "\r\n".'.pages{
	padding: 5px 0px;
}
.pagelink{
	border: 1px solid #a3bee8;
	float: right;
	background: #f0f7ff;
	line-height:24px;
	padding:0;
}
.pagelink a, .pagelink strong, .pagelink em, .pagelink kbd, .pagelink a.first, .pagelink a.last, .pagelink a.prev, .pagelink a.next, .pagelink a.pgroup, .pagelink a.ngroup{
	float: left;
	padding: 0 6px;
}
.pagelink a:hover{background-color: #ffffff; }
.pagelink strong{font-weight: bold; color: #ff6600; background: #e9f1f8;}
.pagelink kbd{height:24px; border-left: 1px solid #a3bee8;}
.pagelink em{height:24px; border-right: 1px solid #a3bee8; font-style:normal;}
.pagelink input{border: 1px solid #a3bee8; color: #054e86; margin-top:1px; height: 18px;}';
			if($old_data != $data){
				jieqi_writefile($fname, $data);
				echo '<br>CSS <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="blue">������ɣ�</font><br>';
			}else{
				echo '. ';
			}
		}else{
			echo '<br>CSS <a href="'.$fname.'">'.substr($fname,2).'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
	}
	ob_flush();
	flush();
}

//���ģ���ļ������滻
function update_templates(){
	//ϵͳģ��
	$i=0;
	$tmpchange[$i]['tmpfile']=array('templates/inbox.html', 'templates/outbox.html', 'templates/messagedetail.html', 'templates/myfriends.html', 'templates/userdetail.html', 'modules/obook/templates/buylog.html', 'modules/article/templates/bookcase.html');
	$tmpchange[$i]['insert']='{?set jieqi_blocks_module = "system"?}
{?set jieqi_blocks_config = "userblocks"?}
';

	$i++;
	$tmpchange[$i]['tmpfile']=array('templates/topuser.html');
	$tmpchange[$i]['insert']='{?set jieqi_blocks_module = "system"?}
{?set jieqi_blocks_config = "memberblocks"?}
';

	$i++;
	$tmpchange[$i]['tmpfile']=array('modules/obook/templates/obookinfo.html', 'modules/obook/templates/obookcase.html', 'modules/obook/templates/searchresult.html', 'modules/obook/templates/ochapterlist.html', 'modules/obook/templates/obooklist.html', 'modules/obook/templates/obooklist.html');
	$tmpchange[$i]['insert']='{?set jieqi_blocks_module = "obook"?}
{?set jieqi_blocks_config = "guideblocks"?}
';

	$i++;
	$tmpchange[$i]['tmpfile']=array('modules/obook/templates/masterpage.html', 'modules/obook/templates/chapterstat.html', 'modules/obook/templates/chapterbuylog.html');
	$tmpchange[$i]['insert']='{?set jieqi_blocks_module = "obook"?}
{?set jieqi_blocks_config = "authorblocks"?}
';

	$i++;
	$tmpchange[$i]['tmpfile']=array('modules/article/templates/articleinfo.html', 'modules/article/templates/myarticle.html', 'modules/article/templates/searchresult.html', 'modules/article/templates/toplist.html', 'modules/article/templates/articlelist.html');
	$tmpchange[$i]['insert']='{?set jieqi_blocks_module = "article"?}
{?set jieqi_blocks_config = "guideblocks"?}
';

	$i++;
	$tmpchange[$i]['tmpfile']=array('modules/article/templates/draft.html', 'modules/article/templates/masterpage.html', 'modules/article/templates/votearticle.html', 'modules/article/templates/authorpage.html');
	$tmpchange[$i]['insert']='{?set jieqi_blocks_module = "article"?}
{?set jieqi_blocks_config = "authorblocks"?}
';

	//�滻ģ��
	foreach($tmpchange as $v){
		$tmpfiles=array();
		if(is_array($v['tmpfile'])) $tmpfiles=$v['tmpfile'];
		else $tmpfiles[0]=$v['tmpfile'];
		foreach($tmpfiles as $f){
			$filename='../../'.$f;
			if(is_file($filename)){
				$content=jieqi_readfile($filename);
				$fromlen=strlen($content);
				if(strpos($content, 'jieqi_blocks_config')===false){
					$content=$v['insert'].$content;
				}
				if($fromlen != strlen($content)){
					if(is_writable($filename)){
						jieqi_writefile($filename, $content);
						echo '<br>ģ��<a href="'.$filename.'">'.$f.'</a> <font color="blue">������ɣ�</font><br>';
					}else{
						echo '<br>ģ��<a href="'.$filename.'">'.$f.'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
					}
					ob_flush();
					flush();
				}else{
					echo '. ';
					ob_flush();
					flush();
				}
			}
		}
	}
}

//��������ļ��滻
function update_configs(){
	//ϵͳģ��
	$i=0;
	$tmpchange[$i]['tmpfile']=array('configs/article/adminmenu.php');
	$tmpchange[$i]['repfrom']=array('admin/review.php');
	$tmpchange[$i]['repto']=array('admin/reviews.php');

	//�滻ģ��
	foreach($tmpchange as $v){
		$tmpfiles=array();
		if(is_array($v['tmpfile'])) $tmpfiles=$v['tmpfile'];
		else $tmpfiles[0]=$v['tmpfile'];
		foreach($tmpfiles as $f){
			$filename='../../'.$f;
			if(is_file($filename)){
				$content=jieqi_readfile($filename);
				$fromlen=strlen($content);
				$content=str_replace($v['repfrom'], $v['repto'], $content);
				if($fromlen != strlen($content)){
					if(is_writable($filename)){
						jieqi_writefile($filename, $content);
						echo '�����ļ�<a href="'.$filename.'">'.$f.'</a> <font color="blue">������ɣ�</font><br>';
					}else{
						echo '�����ļ�<a href="'.$filename.'">'.$f.'</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
					}
					ob_flush();
					flush();
				}
			}
		}
	}

	//**********************************
	$fname='../../configs/adminmenu.php';
	$data=jieqi_readfile($fname);
	if(strpos($data, 'managemodules.php')==false){
		$repstr= '$jieqiAdminmenu[\'system\'][] = array(\'layer\' => \'0\', \'caption\' => \'ģ�����ù���\', \'command\'=>JIEQI_URL.\'/admin/managemodules.php\', \'power\' => JIEQI_GROUP_GUEST, \'target\' => JIEQI_TARGET_SELF, \'publish\' => \'1\');'."\r\n";

		if(is_writable($fname)){
			$data=str_replace('?>', $repstr.'?>', $data);
			jieqi_writefile($fname, $data);
			echo '�����ļ� <a href="'.$fname.'">/configs/adminmenu.php</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo '�����ļ� <a href="'.$fname.'">/configs/adminmenu.php</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
		ob_flush();
		flush();
	}

	//**********************************
	$fname='../../configs/article/fullbottom.js';
	$data=jieqi_readfile($fname);
	if(strpos($data, 'imgclickshow')==false){
		$data.='
		//��������ͼƬ����
var divimgs = new Array(); 
function imgsearch(){
	var divs = document.getElementsByTagName(\'div\');
	var j = 0;
	for (i=0; i < divs.length; i++){
		if(divs[i].className == \'divimage\'){
			divimgs[j]=divs[i];
			j++;
		}
	}
}

//���������ʾͼƬ
function imgclickshow(id, url){
	 if(document.getElementById(id).innerHTML.toLowerCase().indexOf(\'<img\') == -1) document.getElementById(id).innerHTML = \'<img src="\' + url + \'" border="0" class="imagecontent" />\';
}

//�Զ���ʾͼƬ
function imgautoshow() {
	var documentTop = document.documentElement.scrollTop|| document.body.scrollTop;
	var docHeight = document.documentElement.clientHeight|| document.body.clientHeight;
	for (i=0; i < divimgs.length; i++){
		if(documentTop > divimgs[i].offsetTop - docHeight - docHeight && documentTop < divimgs[i].offsetTop + divimgs[i].offsetHeight  && divimgs[i].innerHTML.toLowerCase().indexOf(\'<img\') == -1){
			divimgs[i].innerHTML = \'<img src="\' + divimgs[i].title + \'" border="0" class="imagecontent" />\';
		}
	}
	setTimeout("imgautoshow()", 300);
}

//����ͼƬ��ʾ����
function imgcontentinit(){
	imgsearch();
	imgautoshow();
}

//����ͼƬ��ʾ����
if (document.all){
	window.attachEvent(\'onload\',imgcontentinit);
}else{
	window.addEventListener(\'load\',imgcontentinit,false);
}';

		if(is_writable($fname)){
			jieqi_writefile($fname, $data);
			echo 'JS�ļ� <a href="'.$fname.'">/configs/article/fullbottom.js</a>  <font color="blue">������ɣ�</font><br>';
		}else{
			echo  'JS�ļ� <a href="'.$fname.'">/configs/article/fullbottom.js</a>  <font color="red">����д�������ļ���дȨ�ޣ�</font><br>';
		}
	}
}

// ���ļ�
function jieqi_readfile($file_name){
	if (function_exists("file_get_contents")) {
		return file_get_contents($file_name);
	}else{
		$filenum = @fopen($file_name, "rb");
		@flock($filenum, LOCK_SH);
		$file_data = @fread($filenum, @filesize($file_name));
		@flock($filenum, LOCK_UN);
		@fclose($filenum);
		return $file_data;
	}
}

//д�ļ�
function jieqi_writefile($file_name, &$data, $method = "wb"){
	$filenum = @fopen($file_name, $method);
	if(!$filenum) return false;
	@flock($filenum, LOCK_EX);
	$ret = @fwrite($filenum, $data);
	@flock($filenum, LOCK_UN);
	@fclose($filenum);
	@chmod($file_name, 0777);
	return $ret;
}

//���ַ���ת��Ϊhtm��ʽ
function jieqi_htmlstr($str, $quote_style=ENT_QUOTES){
	$str = htmlspecialchars($str, $quote_style);
	$str = nl2br($str);
	$str = str_replace("  ", "&nbsp;&nbsp;", $str);
	$str = preg_replace("/&amp;#(\d+);/isU", "&#\\1;", $str);
	return $str;
}
?>