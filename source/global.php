<?php
/**
 * ͨ��Ԥ�����ļ�
 *
 * ����ϵͳ����������������Ԥ����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: global.php 332 2009-02-23 09:15:08Z juny $
 */

$tmpvar = explode(' ', microtime());
define('JIEQI_START_TIME', $tmpvar[1] + $tmpvar[0]);
if(defined('JIEQI_PHP_CLI')) exit('error defined JIEQI_PHP_CLI');
if((!empty($_SERVER['SCRIPT_FILENAME']) && $_SERVER['SCRIPT_FILENAME'] == $_SERVER['argv'][0]) || (empty($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['argv'][0]))) define('JIEQI_PHP_CLI', 1);
else define('JIEQI_PHP_CLI', 0);
if(defined('JIEQI_SCRIPT_FILENAME')) exit('error defined JIEQI_SCRIPT_FILENAME');
$tmpvar = (!empty($_SERVER['PATH_TRANSLATED']) && substr($_SERVER['PATH_TRANSLATED'],-4)=='.php') ? $_SERVER['PATH_TRANSLATED'] : $_SERVER['SCRIPT_FILENAME'];
define('JIEQI_SCRIPT_FILENAME', str_replace(array('\\\\','\\'),'/',$tmpvar));
if(!defined('JIEQI_SITE_ID')) define('JIEQI_SITE_ID', 0); //��վ��ţ�0��ʾ��վ������0�ı�ʾ��վ
//����ϵͳȫ�ֲ���
include_once('configs/define.php');
if(defined('JIEQI_LOCAL_HOST')) exit('error defined JIEQI_LOCAL_HOST');
if($_SERVER['HTTP_HOST'] == '' && JIEQI_URL != '') define('JIEQI_LOCAL_HOST', str_replace(array('http://', 'https://'), '', JIEQI_URL));
else define('JIEQI_LOCAL_HOST', $_SERVER['HTTP_HOST']);
$_SERVER['PHP_SELF'] = htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES);
define("JIEQI_NOW_TIME", time());  //ϵͳʱ��
define("JIEQI_VERSION","1.60");  //ϵͳ�汾
//Free(F), Popular(O), Standard(S), Professional(P), Enterprise(E), Deluxe(D), Custom(C)
//����֤�ļ�������Ȩ
//define('JIEQI_VERSION_TYPE', 'Standard'); //�汾����
define('JIEQI_GLOBAL_INCLUDE',true);  //����global���
if(!defined('JIEQI_ROOT_PATH')) @define('JIEQI_ROOT_PATH', str_replace(array('\\\\','\\'),'/',dirname(__FILE__)));  //�����·��

if(!defined('JIEQI_COOKIE_DOMAIN')) define('JIEQI_COOKIE_DOMAIN', strval(@ini_get('session.cookie_domain')));
elseif(JIEQI_COOKIE_DOMAIN != '') @ini_set('session.cookie_domain', JIEQI_COOKIE_DOMAIN);
define('JIEQI_SYSTEM_CHARSET', 'gbk'); //ϵͳ��������
//����������ַ
if(JIEQI_URL == '') define('JIEQI_LOCAL_URL', 'http://'.$_SERVER['HTTP_HOST']);
else define('JIEQI_LOCAL_URL', JIEQI_URL);
//����������ַ
if(!defined('JIEQI_MAIN_SERVER') || JIEQI_MAIN_SERVER == '') define('JIEQI_MAIN_URL', JIEQI_LOCAL_URL);
else define('JIEQI_MAIN_URL', JIEQI_MAIN_SERVER);
//�û���ڵ�ַ
if(!defined('JIEQI_USER_ENTRY') || JIEQI_USER_ENTRY == '') define('JIEQI_USER_URL', JIEQI_LOCAL_URL);
else define('JIEQI_USER_URL', JIEQI_USER_ENTRY);

//����ģʽ
define('JIEQI_ERROR_RETURN', 1);  //ֻ����
define('JIEQI_ERROR_PRINT', 2);  //��ӡ���󲢼���
define('JIEQI_ERROR_DIE', 4);  //��ʾ����ֹͣ

//Ĭ���û���
define('JIEQI_GROUP_USER', 3);  //��¼�û�
define('JIEQI_GROUP_ADMIN', 2);  //ϵͳ����Ա
define('JIEQI_GROUP_GUEST', 1);  //�ο�

// ����λ��
define("JIEQI_SIDEBLOCK_CUSTOM",-1);  //�Զ���
define("JIEQI_SIDEBLOCK_LEFT",0);  //��
define("JIEQI_SIDEBLOCK_RIGHT",1);  //��
define("JIEQI_CENTERBLOCK_LEFT",2);  //����
define("JIEQI_CENTERBLOCK_RIGHT",3);  //����
define("JIEQI_CENTERBLOCK_TOP",4);  //����
define("JIEQI_CENTERBLOCK_MIDDLE",5);  //����
define("JIEQI_CENTERBLOCK_BOTTOM",6);  //����
define("JIEQI_TOPBLOCK_ALL",7);  //����
define("JIEQI_BOTTOMBLOCK_ALL",8);  //�ײ�

//������ʾ����
define('JIEQI_TYPE_TXTBOX', 1);  //�����ı�
define('JIEQI_TYPE_TXTAREA', 2);  //�����ı�
define('JIEQI_TYPE_INT', 3);  //����
define('JIEQI_TYPE_NUM', 4);  //����
define('JIEQI_TYPE_PASSWORD', 5);  //����
define('JIEQI_TYPE_HIDDEN', 6);  //������
define('JIEQI_TYPE_SELECT', 7);  //������ѡ
define('JIEQI_TYPE_MULSELECT', 8);  //������ѡ
define('JIEQI_TYPE_RADIO', 9);  //��ѡ
define('JIEQI_TYPE_CHECKBOX', 10);  //��ѡ
define('JIEQI_TYPE_LABEL', 11);  //�����ı�
define('JIEQI_TYPE_FILE', 12);  //�ļ��ϴ�
define('JIEQI_TYPE_DATE', 13);  //����
define('JIEQI_TYPE_UBB', 14);  //ubb����
define('JIEQI_TYPE_HTML', 15);  //html����
define('JIEQI_TYPE_CODE', 16);  //�������
define('JIEQI_TYPE_SCRIPT', 17);  //��ҳ�ű�javascript/vbscript
define('JIEQI_TYPE_OTHER', 20);  //����

//�򿪴��ڷ�ʽ
define('JIEQI_TARGET_SELF', 'self'); //������
define('JIEQI_TARGET_NEW', 'blank'); //�¿�����
define('JIEQI_TARGET_TOP', 'top'); //����С����

//���ݸ�ʽ
define('JIEQI_CONTENT_TXT', 0); //�ı�
define('JIEQI_CONTENT_HTML', 1); //html
define('JIEQI_CONTENT_JS', 2); //js�ļ�
define('JIEQI_CONTENT_MIX', 3); //html��script���
define('JIEQI_CONTENT_PHP', 4); //php

//ͼƬ��ʽ
$jieqi_image_type=array(1=>'.gif', 2=>'.jpg', 3=>'.jpeg', 4=>'.png', 5=>'.bmp');
//�ļ���׺��ͳһ����
$jieqi_file_postfix=array('txt'=>'.txt', 'html'=>'.html', 'htm'=>'.htm', 'xml'=>'.xml', 'php'=>'.php', 'js'=>'.js', 'css'=>'.css', 'zip'=>'.zip', 'jar'=>'.jar', 'jad'=>'.jad', 'umd'=>'.umd', 'opf'=>'.opf');
//��������
$jieqi_charset_type=array('gb'=>'gbk', 'gbk'=>'gbk', 'gb2312'=>'gbk', 'big5'=>'big5', 'utf8'=>'utf-8', 'utf-8'=>'utf-8');

//******************************************************
//Ԥ����
//******************************************************

//php5��ʱ������
//if(function_exists('date_default_timezone_set')) @date_default_timezone_set('PRC');

//�ⲿ�������ϲ��Զ��ӷ�б�������Ԫ
@set_magic_quotes_runtime(0);
//������ʾģʽ
if(JIEQI_ERROR_MODE == 0){
	@ini_set('display_errors', 0);
	@error_reporting(0);
}elseif(JIEQI_ERROR_MODE == 1){
	@ini_set('display_errors', 1);
	@error_reporting(E_ALL & ~E_NOTICE);
}elseif(JIEQI_ERROR_MODE == 2){
	@ini_set('display_errors', 1);
	@error_reporting(E_ALL);
}

//��ʾ��Ȩ��Ϣ
if(isset($_GET['show_jieqi_version']) && $_GET['show_jieqi_version'] == 1){
	echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset='.JIEQI_SYSTEM_CHARSET.'" /><title>Version Info</title></head><body>Site name: '.JIEQI_SITE_NAME.'<br />URL: '.JIEQI_URL.'<br />Version: JIEQI CMS V'.JIEQI_VERSION.'<br />Powered by <a href="http://www.jieqi.com">JIEQI CMS</a><br /><br />License key:<br />'.JIEQI_LICENSE_KEY.'</body></html>';
	exit;
}
//���������(��̨������Բ����)
//0-У��  1-��Ȩ���� 2-��Ȩģ��
if(defined('JIEQI_MODULE_VTYPE')) exit('error defined JIEQI_MODULE_VTYPE');
$jieqi_license_ary=jieqi_funtoarray('base64_decode', explode('@', JIEQI_LICENSE_KEY));
if(!empty($jieqi_license_ary[1]) && !empty($jieqi_license_ary[2]))	$jieqi_license_modules=jieqi_strtosary($jieqi_license_ary[2], '=', '|');
else $jieqi_license_modules=array();
$matchs=array();
if(empty($jieqi_license_modules) || (JIEQI_LOCAL_HOST == '' && JIEQI_PHP_CLI == 1 && ALLOW_PHP_CLI == 1) || preg_match('/^'.preg_quote(str_replace(array('\\\\','\\'),'/',JIEQI_ROOT_PATH), '/').'\/(admin|install|logout\.php)/is', JIEQI_SCRIPT_FILENAME) || preg_match('/^(http:\/\/|https:\/\/)?[^\/\?]*(localhost|127.0.0.1)/i', JIEQI_LOCAL_HOST, $matchs)){
	//�������Ȩ
}else{
	//���������Ȩ
	$site_is_licensed=false;
	if (!empty($jieqi_license_ary[1]) && preg_match('/^(http:\/\/|https:\/\/)?[^\/\?]*('.$jieqi_license_ary[1].')/i', JIEQI_LOCAL_HOST, $matchs)){
		$jieqi_license_domain = $jieqi_license_ary[1];
		$tmpvar=md5($jieqi_license_ary[1].$jieqi_license_ary[2].'jnyzn090211');
		if($tmpvar[0]==$jieqi_license_ary[0][0] && $tmpvar[9]==$jieqi_license_ary[0][9] && $tmpvar[2]==$jieqi_license_ary[0][2] && $tmpvar[11]==$jieqi_license_ary[0][11]) $site_is_licensed=true;
	}
	//����û����Ȩ
	if(!$site_is_licensed){
		header('Content-type:text/html;charset='.JIEQI_SYSTEM_CHARSET);
		if(defined('JIEQI_IS_OPEN') && JIEQI_IS_OPEN == 0) echo JIEQI_CLOSE_INFO;
		else echo 'License check error!<br />Domain: '.JIEQI_LOCAL_HOST.'<br />Module: '.JIEQI_MODULE_NAME.'<br /><br />Powered by <a href="http://www.jieqi.com" target="_blank">JIEQI CMS</a>';
		exit;
	}
}
//����ϵͳ��ģ��汾
if(isset($jieqi_license_modules[JIEQI_MODULE_NAME]) && isset($jieqi_license_modules['system'])){
	@define('JIEQI_VERSION_TYPE', $jieqi_license_modules['system']); //ϵͳ�汾����
	@define('JIEQI_MODULE_VTYPE', $jieqi_license_modules[JIEQI_MODULE_NAME]); //ģ��汾
}else{
	@define('JIEQI_VERSION_TYPE', 'ok');
	@define('JIEQI_MODULE_VTYPE', 'ok');
}

//�Ƿ�����PATH_INFO
if (isset($_SERVER['PATH_INFO']) && defined('JIEQI_PATH_INFO') && JIEQI_PATH_INFO > 0) {
	$tmpary = explode('/', str_replace(array("'", '"', '.htm', '.html'), '', substr($_SERVER['PATH_INFO'], 1)));
	$tmpcot = count($tmpary);
	for($i = 0; $i < $tmpcot; $i += 2){
		if(isset($tmpary[$i + 1]) && !is_numeric($tmpary[$i])){
			$_GET[$tmpary[$i]] = $tmpary[$i + 1];
			$_REQUEST[$tmpary[$i]] = $tmpary[$i + 1];
		}
	}
}

//����ģ��·��
$jieqiModules = array();
include_once('configs/modules.php');
//��ģ��δ����
if(isset($jieqiModules[JIEQI_MODULE_NAME]['publish']) && $jieqiModules[JIEQI_MODULE_NAME]['publish']==0){
	header('Content-type:text/html;charset='.JIEQI_SYSTEM_CHARSET);
	echo 'This function is not valid!';
	jieqi_freeresource();
	exit;
}

foreach($jieqiModules as $k=>$v){
	if(strtolower(substr($k,0,3)) == 'wap'){
		$wapmod = true;
		$dirmod = substr($k,3);
	}else{
		$wapmod = false;
		$dirmod = $k;
	}
	if($v['dir']=='') $jieqiModules[$k]['dir'] = ($wapmod == true) ? (($k == 'wap') ? '/wap' : '/wap/'.$dirmod) : (($k == 'system') ? '' : '/modules/'.$dirmod);
	if($v['path']=='') $jieqiModules[$k]['path'] = JIEQI_ROOT_PATH.$jieqiModules[$k]['dir'];
	if($v['url']=='') $jieqiModules[$k]['url'] = JIEQI_LOCAL_URL.$jieqiModules[$k]['dir'];
	if($v['theme']=='') $jieqiModules[$k]['theme'] = JIEQI_THEME_SET;
	if(defined('JIEQI_MODULE_NAME') && JIEQI_MODULE_NAME == $k){
		if(!empty($jieqiModules[$k]['theme'])) @define('JIEQI_THEME_NAME', $jieqiModules[$k]['theme']);
	}
}
if(!defined('JIEQI_THEME_NAME')) define('JIEQI_THEME_NAME', JIEQI_THEME_SET);
if(isset($jieqiModules['wap']['path'])) define('JIEQI_WAP_PATH', $jieqiModules['wap']['path']);
else define('JIEQI_WAP_PATH', JIEQI_ROOT_PATH.'/wap');
if(isset($jieqiModules['wap']['url'])) define('JIEQI_WAP_URL', $jieqiModules['wap']['url']);
else define('JIEQI_WAP_URL', JIEQI_LOCAL_URL.'/wap');

//�Ƿ���Ҫ����ת��(��Ѱ治֧��)
if(defined('JIEQI_CHARSET_CONVERT') && JIEQI_CHARSET_CONVERT == 1 && JIEQI_VERSION_TYPE != '' && JIEQI_VERSION_TYPE != 'Free'){
	if(isset($_GET['charset'])) $_GET['charset']=strtolower($_GET['charset']);
	if(isset($_GET['charset']) && isset($jieqi_charset_type[$_GET['charset']])) @define('JIEQI_CHAR_SET', $jieqi_charset_type[$_GET['charset']]);
	elseif(isset($_COOKIE['jieqiUserCharset']) && isset($jieqi_charset_type[$_COOKIE['jieqiUserCharset']])) @define('JIEQI_CHAR_SET', $jieqi_charset_type[$_COOKIE['jieqiUserCharset']]);
	else @define('JIEQI_CHAR_SET', JIEQI_SYSTEM_CHARSET);
	if ((!isset($_COOKIE['jieqiUserCharset']) && JIEQI_CHAR_SET != JIEQI_SYSTEM_CHARSET) || (isset($_COOKIE['jieqiUserCharset']) && $_COOKIE['jieqiUserCharset'] != JIEQI_CHAR_SET)) setcookie("jieqiUserCharset",JIEQI_CHAR_SET,time()+2592000, '/', JIEQI_COOKIE_DOMAIN, 0);
}else{
	@define('JIEQI_CHAR_SET', JIEQI_SYSTEM_CHARSET);
}
//����cache�������ʹ��cache(����ϵͳ����ʱ��Ҳ����cache)
//if(JIEQI_ENABLE_CACHE && JIEQI_CHAR_SET == JIEQI_SYSTEM_CHARSET) define('JIEQI_USE_CACHE', true);
if(JIEQI_ENABLE_CACHE) define('JIEQI_USE_CACHE', true);
else define('JIEQI_USE_CACHE', false);

//���û���·��
if(!defined('JIEQI_CACHE_DIR') || JIEQI_CACHE_DIR=='' || strtolower(substr(trim(JIEQI_CACHE_DIR), 0, 12)) == 'memcached://') $tmpvar = JIEQI_ROOT_PATH.'/cache';
elseif(strpos(JIEQI_CACHE_DIR, '/')===false && strpos(JIEQI_CACHE_DIR, '\\')===false) $tmpvar = JIEQI_ROOT_PATH.'/'.JIEQI_CACHE_DIR;
else $tmpvar = JIEQI_CACHE_DIR;
//if(JIEQI_CHAR_SET != JIEQI_SYSTEM_CHARSET) $tmpvar.='/c_'.JIEQI_CHAR_SET;
if(!is_dir($tmpvar)) jieqi_createdir($tmpvar);
define('JIEQI_CACHE_PATH',$tmpvar);

if(!defined('JIEQI_COMPILED_DIR') || JIEQI_COMPILED_DIR=='') define('JIEQI_COMPILED_PATH', JIEQI_ROOT_PATH.'/compiled');
elseif(strpos(JIEQI_COMPILED_DIR, '/')===false && strpos(JIEQI_COMPILED_DIR, '\\')===false) define('JIEQI_COMPILED_PATH', JIEQI_ROOT_PATH.'/'.JIEQI_COMPILED_DIR);
else define('JIEQI_COMPILED_PATH',JIEQI_COMPILED_DIR);

//******************************************************
//ҳ��Ԥ����
//******************************************************

if(isset($_COOKIE[session_name()]) && strlen($_COOKIE[session_name()]) < 16) unset($_COOKIE[session_name()]);
//�Ƿ�����ҳ��ѹ�����(ob_gzhandler �� zlib.output_compression ����ͬʱʹ��)
if(JIEQI_USE_GZIP && !(boolean)@ini_get('zlib.output_compression')) @ob_start("ob_gzhandler");
//����session���Ѿ���sessionid��ֱ�ӵ���session��û�е�Ҫ��¼���������ܴ����µ�session
//if (!empty($_COOKIE[session_name()]) || (defined('JIEQI_NEED_SESSION') && JIEQI_LOCAL_URL == JIEQI_USER_URL)) {
if (!empty($_COOKIE[session_name()]) || defined('JIEQI_NEED_SESSION')) {
	if (JIEQI_SESSION_EXPRIE > 0) @ini_set('session.gc_maxlifetime', JIEQI_SESSION_EXPRIE);
	@session_cache_limiter('private, must-revalidate');
	//session�����ݿⱣ��ģʽ
	if(JIEQI_SESSION_STORAGE=='db'){
		include_once(JIEQI_ROOT_PATH.'/include/session.php');
		$sess_handler =& JieqiSessionHandler::getInstance('JieqiSessionHandler');
		//����session������
		@session_set_save_handler(array(&$sess_handler, 'open'), array(&$sess_handler, 'close'), array(&$sess_handler, 'read'), array(&$sess_handler, 'write'), array(&$sess_handler, 'destroy'), array(&$sess_handler, 'gc'));
	}else{
		if(JIEQI_SESSION_SAVEPATH != '' && is_dir(JIEQI_SESSION_SAVEPATH)) session_save_path(JIEQI_SESSION_SAVEPATH);
	}
	//����sessionid
	if(!empty($_COOKIE[session_name()])) session_id($_COOKIE[session_name()]);
	@session_start();
	//���ڶ���������������һ̨�������Ѿ���½����һ̨�Զ���½
	if (!empty($_COOKIE[session_name()]) && !empty($_COOKIE['jieqiUserInfo']) && count($_SESSION)==0){
		include_once(JIEQI_ROOT_PATH.'/class/online.php');
		$online_handler =& JieqiOnlineHandler::getInstance('JieqiOnlineHandler');
		$criteria=new CriteriaCompo(new Criteria('sid', $_COOKIE[session_name()], '='));
		$result = $online_handler->queryObjects($criteria);
		$srow = $online_handler->getRow($result);
		if(!empty($srow['uid'])){
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
			$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
			$jieqiUsers=$users_handler->get($srow['uid']);
			if(is_object($jieqiUsers)){
				jieqi_setusersession($jieqiUsers);
			}
		}
	}
}

//ȥ�������б��
$magic_quotes_gpc = get_magic_quotes_gpc();
$register_globals = @ini_get('register_globals');
if ($magic_quotes_gpc){
	$_GET= jieqi_funtoarray('stripslashes',$_GET);
	$_POST= jieqi_funtoarray('stripslashes',$_POST);
	$_COOKIE= jieqi_funtoarray('stripslashes',$_COOKIE);
}

//��ҳ���ݺ��ύ����ת��
$charsetary=array('gb2312'=>'gb', 'gbk'=>'gb', 'gb'=>'gb', 'big5'=>'big5', 'utf-8'=>'utf8', 'utf8'=>'utf8');
if(JIEQI_CHAR_SET != JIEQI_SYSTEM_CHARSET || (!empty($_REQUEST['ajax_request']) && $charsetary[JIEQI_CHAR_SET] != 'utf8')){
	include_once(JIEQI_ROOT_PATH.'/include/changecode.php');
}
if(!empty($_REQUEST['ajax_request']) && $charsetary[JIEQI_CHAR_SET] != 'utf8'){
	$charset_convert_ajax='jieqi_'.$charsetary['utf8'].'2'.$charsetary[JIEQI_CHAR_SET];
	//$_GET=& jieqi_funtoarray($charset_convert_ajax,$_GET);
	$_POST=& jieqi_funtoarray($charset_convert_ajax,$_POST);
}
$charset_convert_out='';
if(JIEQI_CHAR_SET != JIEQI_SYSTEM_CHARSET){
	$charset_convert_out='jieqi_'.$charsetary[JIEQI_SYSTEM_CHARSET].'2'.$charsetary[JIEQI_CHAR_SET];
	if(!defined('JIEQI_NOCONVERT_CHAR')) @ob_start($charset_convert_out);
	$charset_convert_in='jieqi_'.$charsetary[JIEQI_CHAR_SET].'2'.$charsetary[JIEQI_SYSTEM_CHARSET];
	$_GET=& jieqi_funtoarray($charset_convert_in,$_GET);
	$_POST=& jieqi_funtoarray($charset_convert_in,$_POST);
	$_COOKIE=& jieqi_funtoarray($charset_convert_in,$_COOKIE);
}

//����REQUEST��ת��
if($magic_quotes_gpc || JIEQI_SYSTEM_CHARSET != JIEQI_CHAR_SET || (!empty($_REQUEST['ajax_request']) && $charsetary[JIEQI_CHAR_SET] != 'utf8'))	$_REQUEST=array_merge($_REQUEST, $_GET, $_POST, $_COOKIE);

//���ҳ������
if(defined('JIEQI_MAX_PAGES') && JIEQI_MAX_PAGES > 0 && is_numeric($_REQUEST['page']) && $_REQUEST['page'] > JIEQI_MAX_PAGES) $_REQUEST['page'] = intval(JIEQI_MAX_PAGES);

//******************************************************
//�û�Ԥ����
//******************************************************
$jieqiUsersStatus = JIEQI_GROUP_GUEST;
$jieqiUsersGroup = JIEQI_GROUP_GUEST;
$jieqiCache =& jieqi_initcache(); //��ʼ������ʵ��
//�Զ���¼���
if(empty($_SESSION['jieqiUserId'])){
	if(!empty($_REQUEST['jieqi_username']) && !empty($_REQUEST['jieqi_userpassword'])){
		//�ύ��¼���
		session_start();
		include_once(JIEQI_ROOT_PATH.'/include/checklogin.php');
		$urllogin=jieqi_logincheck($_REQUEST['jieqi_username'], $_REQUEST['jieqi_userpassword'], '', false, false, false);
		if($urllogin == 0) $_SESSION['jieqiAdminLogin']=1;
		//}elseif(!empty($_COOKIE['jieqiUserInfo']) && JIEQI_LOCAL_URL == JIEQI_USER_URL){
	}elseif(!empty($_COOKIE['jieqiUserInfo'])){
		//ʹ��COOKIE��¼
		$jieqi_user_info=jieqi_strtosary($_COOKIE['jieqiUserInfo']);
		if(!empty($jieqi_user_info['jieqiUserName']) && !empty($jieqi_user_info['jieqiUserPassword'])){
			session_start();
			include_once(JIEQI_ROOT_PATH.'/include/checklogin.php');
			jieqi_logincheck($jieqi_user_info['jieqiUserName'], $jieqi_user_info['jieqiUserPassword'], '', true, true, false);
		}
	}
}

if(!empty($_SESSION['jieqiUserGroup'])){
	$jieqiUsersGroup = $_SESSION['jieqiUserGroup'];
	switch($_SESSION['jieqiUserGroup']){
		case JIEQI_GROUP_GUEST:
			$jieqiUsersStatus = JIEQI_GROUP_GUEST;
			break;
		case JIEQI_GROUP_ADMIN:
			$jieqiUsersStatus = JIEQI_GROUP_ADMIN;
			define('JIEQI_IS_ADMIN', 1);
			break;
		default:
			$jieqiUsersStatus = JIEQI_GROUP_USER;
			break;
	}
}
//��վ�Ƿ񿪷�
if(defined('JIEQI_IS_OPEN') && JIEQI_IS_OPEN == 0 && !defined('JIEQI_ADMIN_LOGIN') && $jieqiUsersStatus != JIEQI_GROUP_ADMIN){
	header('Content-type:text/html;charset='.JIEQI_SYSTEM_CHARSET);
	echo JIEQI_CLOSE_INFO;
	jieqi_freeresource();
	exit;
}elseif(defined('JIEQI_IS_OPEN') && JIEQI_IS_OPEN == 2 && !defined('JIEQI_ADMIN_LOGIN') && $jieqiUsersStatus != JIEQI_GROUP_ADMIN && count($_POST)>0){
	//��ֹ����
	header('Content-type:text/html;charset='.JIEQI_SYSTEM_CHARSET);
	echo LANG_DENY_POST;
	jieqi_freeresource();
	exit;
}

//�Ƿ�����������
if(defined('JIEQI_PROXY_DENIED') && JIEQI_PROXY_DENIED != 1){
	if($_SERVER['HTTP_X_FORWARDED_FOR'] || $_SERVER['HTTP_VIA'] || $_SERVER['HTTP_PROXY_CONNECTION'] || $_SERVER['HTTP_USER_AGENT_VIA'] || $_SERVER['HTTP_PROXY_CONNECTION']) {
		header('Content-type:text/html;charset='.JIEQI_SYSTEM_CHARSET);
		echo LANG_DENY_PROXY;
		jieqi_freeresource();
		exit;
	}
}

//DEMO�ʺŹ�����治׼��������
/*
if((strstr($_SERVER['PHP_SELF'], '/admin') || basename($_SERVER['PHP_SELF'])=='useredit.php') && !empty($_SESSION['jieqiUserName']) && $_SESSION['jieqiUserName']=='demo'){
if((!empty($_POST) || !empty($_REQUEST['action'])) && basename($_SERVER['PHP_SELF'])!='login.php') jieqi_printfail('�Բ��𣬲����ʺŲ���������޸Ĺ������ݣ�');
}
*/

//�Ƿ������û��Զ�������(������php�ļ�)
if(defined('JIEQI_CUSTOM_INCLUDE') && JIEQI_CUSTOM_INCLUDE == 1){
	$tmpstr = $_SERVER['PHP_SELF'] ? basename($_SERVER['PHP_SELF']) : basename($_SERVER['SCRIPT_NAME']);
	if( preg_match('/\.php$/i', $tmpstr)){
		$tmpstr = @realpath(substr($tmpstr, 0, -4)).'.inc.php';
		if(is_file($tmpstr) && preg_match('/\.inc\.php$/i', $tmpstr)) include_once($tmpstr);
	}
}

//******************************************************
//��������
//******************************************************

//  ------------------------------------------------------------------------
//  ϵͳ���
//  ------------------------------------------------------------------------
/**
 * ҳ����ת
 * 
 * @param      string      $url ��ת��url��ַ
 * @param      string      $title ��ʾ�ı���
 * @param      string      $content ��ʾ������
 * @access     public
 * @return     void
 */
function jieqi_jumppage($url, $title, $content){
	if(empty($_REQUEST['ajax_request'])){
		if(JIEQI_VERSION_TYPE != '' && JIEQI_VERSION_TYPE != 'Free'){
			include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
			$url=jieqi_htmlstr($url);
			$title=jieqi_htmlstr($title);
			$jieqiTpl =& JieqiTpl::getInstance();
			$jieqiTpl->assign(array('jieqi_charset' => JIEQI_CHAR_SET, 'jieqi_themeurl' => JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/', 'jieqi_themecss'=> JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/style.css',  'pagetitle' => $title, 'title' => $title, 'content' => $content, 'url' => $url));
			$jieqiTpl->setCaching(0);
			$jieqiTpl->display(JIEQI_ROOT_PATH.'/themes/'.JIEQI_THEME_NAME.'/jumppage.html');
		}else{
			echo '<html><head><meta http-equiv="content-type" content="text/html; charset='.JIEQI_CHAR_SET.'" /><meta http-equiv="refresh" content="3; url='.$url.'">
<title>'.jieqi_htmlstr($title).'</title><link rel="stylesheet" type="text/css" media="all" href="'.JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/style.css" /></head><body><div id="msgboard" style="position:absolute; left:210px; top:150px; width:350px; height:100px; z-index:1;"><table class="grid" width="100%" border="0" cellspacing="1" cellpadding="6" ><caption>'.jieqi_htmlstr($title).'</caption><tr><td class="even"><br />'.$content.'<br /><br />�粻���Զ���ת��<a href="'.$url.'">�������ֱ�ӽ��룡</a><br /><br />������ƣ�<a href="http://www.jieqi.com" target="_blank">��������</a><br /><br /></td></tr></table></div></body></html>';
		}
	}else{
		header('Content-Type:text/html; charset='.JIEQI_CHAR_SET);
		header("Cache-Control:no-cache");
		return $url;
	}
	jieqi_freeresource();
	exit;
}

/**
 * ������ʾ��Ϣ���html����
 * 
 * @param      string      $title ��ʾ�ı���
 * @param      string      $content ��ʾ������
 * @access     public
 * @return     string       ����html����
 */
function jieqi_msgbox($title, $content){
	if(empty($_REQUEST['ajax_request'])){
		include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
		$title=jieqi_htmlstr($title);
		$jieqiTpl =& JieqiTpl::getInstance();
		$jieqiTpl->assign(array('title' => $title, 'content' => $content));
		$jieqiTpl->setCaching(0);
		return $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/themes/'.JIEQI_THEME_NAME.'/msgbox.html');
	}else{
		header('Content-Type:text/html; charset='.JIEQI_CHAR_SET);
		header("Cache-Control:no-cache");
		return $content;
	}
}

/**
 * ��ʾ��ʾ��Ϣ��������htmlҳ�棩
 * 
 * @param      string      $title ��ʾ�ı���
 * @param      string      $content ��ʾ������
 * @access     public
 * @return     void
 */
function jieqi_msgwin($title, $content){
	if(defined('JIEQI_NOCONVERT_CHAR') && !empty($GLOBALS['charset_convert_out'])) @ob_start($GLOBALS['charset_convert_out']);
	if(empty($_REQUEST['ajax_request'])){
		include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
		$title=jieqi_htmlstr($title);
		$jieqiTpl =& JieqiTpl::getInstance();
		$jieqiTpl->assign(array('jieqi_charset' => JIEQI_CHAR_SET, 'jieqi_themeurl' => JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/', 'jieqi_themecss'=> JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/style.css', 'title' => $title, 'content' => $content, 'jieqi_sitename' => JIEQI_SITE_NAME));
		$jieqiTpl->setCaching(0);
		$jieqiTpl->display(JIEQI_ROOT_PATH.'/themes/'.JIEQI_THEME_NAME.'/msgwin.html');
	}else{
		header('Content-Type:text/html; charset='.JIEQI_CHAR_SET);
		header("Cache-Control:no-cache");
		echo $content;
	}
	jieqi_freeresource();
	exit;
}

/**
 * ��ʾ������Ϣ������ҳ�棩
 * 
 * @param      string      $errorinfo ������Ϣ��html����
 * @access     public
 * @return     void
 */
function jieqi_printfail($errorinfo){
	if(defined('JIEQI_NOCONVERT_CHAR') && !empty($GLOBALS['charset_convert_out'])) @ob_start($GLOBALS['charset_convert_out']);
	$debuginfo='';
	if(defined('JIEQI_DEBUG_MODE') && JIEQI_DEBUG_MODE > 0){
		$trace = debug_backtrace();
		$debuginfo='FILE: '.jieqi_htmlstr($trace[0]['file']).' LINE:'.jieqi_htmlstr($trace[0]['line']);
	}
	if(empty($_REQUEST['ajax_request'])){
		include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
		$jieqiTpl =& JieqiTpl::getInstance();
		$jieqiTpl->assign(array('jieqi_charset' => JIEQI_CHAR_SET, 'jieqi_themeurl' => JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/', 'jieqi_themecss'=> JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/style.css', 'errorinfo' => $errorinfo, 'debuginfo' => $debuginfo, 'jieqi_sitename' => JIEQI_SITE_NAME));
		$jieqiTpl->setCaching(0);
		$jieqiTpl->display(JIEQI_ROOT_PATH.'/themes/'.JIEQI_THEME_NAME.'/msgerr.html');
	}else{
		header('Content-Type:text/html; charset='.JIEQI_CHAR_SET);
		header("Cache-Control:no-cache");
		echo $errorinfo;
	}
	jieqi_freeresource();
	exit;

}

/**
 * ȡ���û�ip��ַ
 * 
 * @param      void
 * @access     public
 * @return     string      ��ǰ�����ߵ�ip
 */
function jieqi_userip(){
	if(isset($_SERVER['HTTP_CLIENT_IP'])) $ip=$_SERVER['HTTP_CLIENT_IP'];
	elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	else  $ip=$_SERVER['REMOTE_ADDR'];
	$ip=trim($ip);
	if(!is_numeric(str_replace('.','',$ip))) $ip='';
	return $ip;
}

/**
 * ����idȡ���ļ��������Ŀ¼
 * 
 * @param      int         $id
 * @access     public
 * @return     string       ������Ŀ¼
 */
function jieqi_getsubdir($id, $divnum = 1000){
	return '/'.floor(intval($id) / $divnum);
}

/**
 * ���ݼ�¼id��÷��ʸü�¼��url��ַ
 * 
 * �������ǵ�������һ������������url��ַ��ǰ�����������Ǳ�Ҫ�ģ���������Ǿ��崦��������ʹ��
 * 
 * @param      string       $module ��������ģ����
 * @param      string       $target �������������ɺ������� 'jieqi_url_'.$module.'_'.$target
 * @access     public
 * @return     string       ����url�ַ���
 */
function jieqi_geturl($module, $target){
	global $jieqiModules;
	if(!isset($jieqiModules[$module])) $module = 'system';
	$funname = 'jieqi_url_'.$module.'_'.$target;
	if(!function_exists($funname) && isset($jieqiModules[$module]['path']) && is_file($jieqiModules[$module]['path'].'/include/funurl.php')) include_once($jieqiModules[$module]['path'].'/include/funurl.php');
	if(function_exists($funname)){
		$numargs = func_num_args();
		$args = func_get_args();
		switch($numargs){
			case 0:
			case 1:
			case 2:
				return $funname();
				break;
			case 3:
				return $funname($args[2]);
				break;
			case 4:
				return $funname($args[2], $args[3]);
				break;
			case 5:
				return $funname($args[2], $args[3], $args[4]);
				break;
			case 6:
			default:
				return $funname($args[2], $args[3], $args[4], $args[5]);
				break;
		}
	}else{
		return false;
	}
}

/**
 * ȡ���ϴ��ļ�Ŀ¼·��
 * 
 * @param      string      $path �����ϴ��ļ���Ŀ¼������������·������
 * @param      string      $module ģ�����ƣ����ձ�ʾ��ǰģ��
 * @param      string      $systempath ϵͳ��·�����������Զ���ȡ
 * @access     public
 * @return     string      
 */
function jieqi_uploadpath($path, $module='', $systempath=''){
	if(strpos($path, '/')===false && strpos($path, '\\')===false){
		if($module=='' && defined('JIEQI_MODULE_NAME')) $module=JIEQI_MODULE_NAME;
		if($systempath=='') $systempath=JIEQI_ROOT_PATH;
		if($path=='') return $systempath.'/files/'.$module;
		else return $systempath.'/files/'.$module.'/'.$path;
	}else{
		return $path;
	}
}

/**
 * ȡ���ϴ��ļ�Ŀ¼URL
 * 
 * @param      string      $path �����ϴ��ļ���Ŀ¼������������·������
 * @param      string      $url �Զ����url��ַ
 * @param      string      $module ģ�����ƣ����ձ�ʾ��ǰģ��
 * @param      string      $systempath ϵͳ��·�����������Զ���ȡ
 * @access     public
 * @return     string      
 */
function jieqi_uploadurl($path, $url='', $module='', $systemurl=''){
	if(!empty($url)){
		return $url;
	}else{
		if($module=='' && defined('JIEQI_MODULE_NAME')) $module=JIEQI_MODULE_NAME;
		if($systemurl=='') $systemurl=JIEQI_URL;
		elseif(strpos($systemurl,'/modules') > 0) $systemurl=substr($systemurl,0,strpos($systemurl,'/modules'));
		if($path=='') return $systemurl.'/files/'.$module;
		else return $systemurl.'/files/'.$module.'/'.$path;
	}
}

/**
 * ����û�Ȩ��
 * 
 * @param      array       $powerset ��Ҫ��Ȩ������
 * @param      int         $ustatus �û�״̬
 * @param      int         $ugroup �û���
 * @param      bool        $isreturn �Ƿ񷵻ؼ������Ĭ�ϲ����أ���ʾ��鲻ͨ��ֱ����ʾ
 * @param      bool        $isadmin �Ƿ����̨Ȩ�ޣ�Ĭ�Ϸ�
 * @access     public
 * @return     bool      
 */
function jieqi_checkpower($powerset=array(), $ustatus='0', $ugroup='0', $isreturn=false, $isadmin=false){
	if(empty($_POST)){
		$local_domain_url=(empty($_SERVER['HTTP_HOST'])) ? '' : 'http://'.$_SERVER['HTTP_HOST'];
		$jumpurl=$local_domain_url.jieqi_addurlvars(array());
	}elseif(!empty($_SERVER['HTTP_REFERER'])){
		$jumpurl=$_SERVER['HTTP_REFERER'];
	}else{
		$jumpurl=JIEQI_MAIN_URL;
	}

	if((!isset($_SESSION['jieqiAdminLogin']) || $_SESSION['jieqiAdminLogin'] != 1) && !empty($_COOKIE['jieqiOnlineInfo'])){
		$jieqi_online_info = jieqi_strtosary($_COOKIE['jieqiOnlineInfo']);
		if($jieqi_online_info['jieqiAdminLogin'] == 1) $_SESSION['jieqiAdminLogin'] = 1;
	}

	if($ustatus==JIEQI_GROUP_ADMIN){
		if($isadmin && empty($_SESSION['jieqiAdminLogin'])){
			if($isreturn){
				return false;
			}else{
				header('Location: '.JIEQI_LOCAL_URL.'/admin/login.php?jumpurl='.urlencode($jumpurl));
				exit;
			}
		}else{
			return true;
		}
	}else{
		if(is_array($powerset['groups']) && (in_array($ugroup, $powerset['groups'], false) || in_array('0',$powerset['groups'],false))){
			if($isadmin && empty($_SESSION['jieqiAdminLogin'])){
				if($isreturn){
					return false;
				}else{
					header('Location: '.JIEQI_LOCAL_URL.'/admin/login.php?jumpurl='.urlencode($jumpurl));
					exit;
				}
			}else{
				return true;
			}
		}else{
			if($isreturn){
				return false;
			}else{
				if($ugroup==JIEQI_GROUP_GUEST){
					if($isadmin){
						header('Location: '.JIEQI_USER_URL.'/admin/login.php?jumpurl='.urlencode($jumpurl));
					}else{
						header('Location: '.JIEQI_USER_URL.'/login.php?jumpurl='.urlencode($jumpurl));
					}
					exit;
				}else{
					jieqi_printfail(LANG_NO_PERMISSION);
				}
			}
		}
	}
}


/**
 * ����û��Ƿ��ѵ�½
 * 
 * @param      bool        $isreturn �Ƿ񷵻ؼ������Ĭ�ϲ����أ���ʾ��鲻ͨ��ֱ����ʾ
 * @param      bool        $isadmin �Ƿ����̨Ȩ�ޣ�Ĭ�Ϸ�
 * @access     public
 * @return     bool        �ѵ�¼����true��δ��¼����false
 */
function jieqi_checklogin($isreturn=false, $isadmin=false){
	global $jieqiUsersGroup;
	if($jieqiUsersGroup==JIEQI_GROUP_GUEST)	$ret=false;
	else $ret=true;
	if($isreturn) return $ret;
	elseif(!$ret){
		if(empty($_REQUEST['ajax_request'])){
			if(empty($_POST)){
				$local_domain_url=(empty($_SERVER['HTTP_HOST'])) ? '' : 'http://'.$_SERVER['HTTP_HOST'];
				$jumpurl=$local_domain_url.jieqi_addurlvars(array());
			}elseif(!empty($_SERVER['HTTP_REFERER'])){
				$jumpurl=$_SERVER['HTTP_REFERER'];
			}else{
				$jumpurl=JIEQI_MAIN_URL;
			}
			if($isadmin) header('Location: '.JIEQI_USER_URL.'/admin/login.php?jumpurl='.urlencode($jumpurl));
			else header('Location: '.JIEQI_USER_URL.'/login.php?jumpurl='.urlencode($jumpurl));
		}else{
			header('Content-Type:text/html; charset='.JIEQI_CHAR_SET);
			header("Cache-Control:no-cache");
			echo LANG_NEED_LOGIN;
		}
		exit;
	}
}

/**
 * �����û�SESSION
 * 
 * @param      object      $user �û����¼����
 * @access     public
 * @return     void
 */
function jieqi_setusersession($user){
	global $jieqiHonors;
	global $jieqiModules;
	$_SESSION = array();
	$_SESSION['jieqiUserId'] = $user->getVar('uid', 'n');
	$_SESSION['jieqiUserUname'] = $user->getVar('uname', 'n');
	$_SESSION['jieqiUserName'] = (strlen($user->getVar('name', 'n')) > 0) ? $user->getVar('name', 'n') : $user->getVar('uname', 'n');
	$_SESSION['jieqiUserGroup'] = $user->getVar('groupid', 'n');
	$_SESSION['jieqiUserEmail'] = $user->getVar('email', 'n');
	$_SESSION['jieqiUserAvatar'] = $user->getVar('avatar', 'n');
	$_SESSION['jieqiUserScore'] = $user->getVar('score', 'n');
	$_SESSION['jieqiUserExperience'] = $user->getVar('experience', 'n');
	$_SESSION['jieqiUserVip'] = $user->getVar('isvip', 'n');
	$_SESSION['jieqiUserEgold'] = ($user->getVar('egold', 'n')>0 || $user->getVar('esilver', 'n')>0) ? 1 : 0;
	jieqi_getconfigs('system', 'honors'); //ͷ��
	$honorid=intval(jieqi_gethonorid($user->getVar('score'), $jieqiHonors));
	$_SESSION['jieqiUserHonorid'] = $honorid;
	$_SESSION['jieqiUserHonor'] = isset($jieqiHonors[$honorid]['name'][intval($user->getVar('workid', 'n'))]) ? $jieqiHonors[$honorid]['name'][intval($user->getVar('workid', 'n'))] : $jieqiHonors[$honorid]['caption'];
	if(!empty($jieqiModules['badge']['publish'])){
		$_SESSION['jieqiUserBadges'] = $user->getVar('badges', 'n'); //����
	}
	$_SESSION['jieqiUserSet'] = unserialize($user->getVar('setting','n'));
}

/**
 * ���ӵ�ǰurl����
 * 
 * @param      array      $varary ��Ҫ���ӵı�������
 * @param      bool       $addget �Ƿ��Զ�����GET������Ĭ����
 * @param      bool       $addpost �Ƿ��Զ�����POST������Ĭ�Ϸ�
 * @param      array      $filter ������Щ������
 * @access     public
 * @return     string
 */
function jieqi_addurlvars($varary, $addget=true, $addpost=false, $filter=''){
	if(!empty($_SERVER['PHP_SELF'])) $ret=$_SERVER['PHP_SELF'];
	elseif(!empty($_SERVER['SCRIPT_NAME']) && substr($_SERVER['SCRIPT_NAME'],-4)=='.php') $ret=$_SERVER['SCRIPT_NAME'];
	else $ret='';
	$start=0;
	if(!is_array($filter)) $filter=array();
	if($addget){
		foreach($_GET as $k=>$v){
			if (!array_key_exists($k, $varary) && !in_array($k, $filter) && is_string($v)){
				$ret.=($start++ > 0) ? '&'.$k.'='.urlencode($v) : '?'.$k.'='.urlencode($v);
			}
		}
	}
	if($addpost){
		foreach($_POST as $k=>$v){
			if (!array_key_exists($k, $varary) && !in_array($k, $filter) && is_string($v)){
				$ret.=($start++ > 0) ? '&'.$k.'='.urlencode($v) : '?'.$k.'='.urlencode($v);
			}
		}
	}
	if(is_array($varary)){
		foreach($varary as $k=>$v){
			$ret.=($start++ > 0) ? '&'.$k.'='.$v : '?'.$k.'='.$v;
		}
	}
	return $ret;
}

/**
 * �������ݿ���
 * 
 * @param      void
 * @access     public
 * @return     void
 */
function jieqi_includedb(){
	if(!defined('JIEQI_DBCLASS_INCLUDE')){
		include_once(JIEQI_ROOT_PATH.'/lib/database/database.php');
		define('JIEQI_DBCLASS_INCLUDE', true);
	}
}

/**
 * �ر����ݿ�����
 * 
 * @param      void
 * @access     public
 * @return     void
 */
function jieqi_closedb($db = NULL){
	if(defined('JIEQI_DB_CONNECTED') && !defined('JIEQI_DB_NOTCLOSE') && JIEQI_DB_PCONNECT == false) JieqiDatabase::close($db);
}

/**
 * �ر�ftp����
 * 
 * @param      void
 * @access     public
 * @return     void
 */
function jieqi_closeftp($ftp = NULL){
	if(defined('JIEQI_FTP_CONNECTED') && !defined('JIEQI_FTP_NOTCLOSE')) JieqiFTP::close($ftp);
}

/**
 * ��ʼ�����棬���������ಢ���ػ���ʵ��
 * 
 * @param      object      $jieqiCache
 * @access     public
 * @return     bool
*/
function &jieqi_initcache(){
	if(strtolower(substr(trim(JIEQI_CACHE_DIR), 0, 12)) != 'memcached://'){
		$jieqiCache =& JieqiCache::getInstance('file');
	}else{
		$params = @parse_url(trim(JIEQI_CACHE_DIR));
		$jieqiCache =& JieqiCache::getInstance('memcached', array('host'=>strval($params['host']), 'port'=>intval($params['port'])));
	}

	return $jieqiCache;
}

/**
 * �ر�memcached����
 * 
 * @param      void
 * @access     public
 * @return     void
 */
function jieqi_closecache($cache = NULL){
	if(defined('JIEQI_CACHE_CONNECTED') && !defined('JIEQI_CACHE_NOTCLOSE')) JieqiCache::close($cache);
}

/**
 * �ͷ�ռ�õ���Դ�������ݿ����ӣ�ftp���ӣ�����Զ�̷���ȣ�
 * 
 * @param      void
 * @access     public
 * @return     void
 */
function jieqi_freeresource(){
	jieqi_closedb();
	jieqi_closeftp();
	jieqi_closecache();
}

/**
 * �������԰�
 * 
 * @param      string     $fname ���԰��ļ�����������׺
 * @param      string     $module ģ������Ĭ���� 'system'
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_loadlang($fname, $module='system'){
	global $jieqiLang;
	global $jieqiModules;
	if(empty($jieqiLang[$module][$fname])){
		if($module=='system' || $module=='') $file=JIEQI_ROOT_PATH.'/lang/lang_'.$fname.'.php';
		else $file=$jieqiModules[$module]['path'].'/lang/lang_'.$fname.'.php';
		$file = @realpath($file);
		if (is_file($file) && preg_match('/\.php$/i', $file)){
			include_once($file);
			return true;
		}else return false;
	}
}

/**
 * ���ݻ��ֻ���û�ͷ��ID
 * 
 * @param      int        $userscore �û�����
 * @param      array      $jieqiHonors ͷ����������
 * @access     public
 * @return     int
 */
function jieqi_gethonorid($userscore=0, $jieqiHonors=array()){
	if(is_array($jieqiHonors)){
		foreach($jieqiHonors as $k=>$v){
			if($userscore >= $v['minscore'] && $userscore < $v['maxscore']) return $k;
		}
	}
	return false;
}

//  ------------------------------------------------------------------------
//  �ַ�������
//  ------------------------------------------------------------------------

/**
 * ���ַ���ת��Ϊhtm��ʽ
 * 
 * @param      string     $str ������ַ���
 * @param      int        $quote_style ת����־��Ĭ��ENT_QUOTES��ʾת��������
 * @access     public
 * @return     string
 */
function jieqi_htmlstr($str, $quote_style=ENT_QUOTES){
	$str = htmlspecialchars($str, $quote_style);
	$str = nl2br($str);
	$str = str_replace("  ", "&nbsp;&nbsp;", $str);
	$str = preg_replace("/&amp;#(\d+);/isU", "&#\\1;", $str);
	return $str;
}

/**
 * �ַ�����ȡ��������Ӧ����
 * 
 * @param      string     $str  ԭʼ�ַ���
 * @param      int        $start  ��ʼλ��
 * @param      int        $length  ��ȡ����
 * @param      string     $trimmarker  �����ַ���
 * @access     public
 * @return     string
 */
function jieqi_substr($str, $start, $length, $trimmarker = '...'){
	$strlen = $start + $length - strlen($trimmarker);
	$len=strlen($str);
	if($strlen > $len) $strlen=$len;
	$tmpstr = "";
	for($i = 0;$i < $strlen;$i++) {
		if (ord($str[$i]) > 0x80) {
			if($i >= $start) $tmpstr .= $str[$i].$str[$i+1];
			$i++;
		} else if ($i >= $start) $tmpstr .= $str[$i];
	}
	if($strlen<$len) $tmpstr.= $trimmarker;
	return $tmpstr;
}

/**
 * ���ַ����ĺ���Ӧ�õ���������,�����������������ַ�����ĳ����������һ��
 * 
 * @param      string     $funname  ������
 * @param      array      $ary �ַ�������
 * @access     public
 * @return     array
 */
function jieqi_funtoarray($funname, $ary){
	if (is_array($ary)){
		foreach($ary as $k=>$v){
			if(is_string($v)){
				$ary[$k] = $funname($v);
			}elseif(is_array($v)){
				$ary[$k] = jieqi_funtoarray($funname, $v);
			}
		}
	}else{
		$ary = $funname($ary);
	}
	return $ary;
}

/**
 * ���ݱ��ǰ׺
 * 
 * @param      string     $tbname  ���ݱ���
 * @param      bool       $fullname �Ƿ��Ѿ��������ı�����Ĭ�Ϸ�
 * @access     public
 * @return     string
 */
function jieqi_dbprefix($tbname, $fullname=false){
	if (JIEQI_DB_PREFIX=='' || $fullname) return $tbname;
	else return JIEQI_DB_PREFIX.'_'.$tbname;
}

/**
 * ʹ�÷�б�������ַ���
 * 
 * @param      string     $str ������ַ���
 * @param      string     $filter ���ӷ�б�ߵ��ַ�
 * @access     public
 * @return     string
 */
function jieqi_setslashes($str, $filter=''){
	if($filter == '"') return str_replace(array('\\', '\''), array('\\\\', '\\\''), $str);
	elseif($filter == '\'') return str_replace(array('\\', '"'), array('\\\\', '\\"'), $str);
	else return addslashes($str);
}


/**
 * ׼������sql�������ݷ�б�ߴ���
 * 
 * @param      string     $str ������ַ���
 * @param      bool       $use_slashes �Ƿ��Ѿ��ӹ���б�ߣ�Ĭ�Ϸ�
 * @access     public
 * @return     string
 */
function jieqi_dbslashes($str, $use_slashes=false){
	if($use_slashes) return $str;
	else{
		//Ϊ�˽�� ���� ����
		if(JIEQI_SYSTEM_CHARSET == 'big5' && JIEQI_DB_CHARSET != 'big5'){
			$str=strval($str);
			$l=strlen($str);
			$ret='';
			for($i=0; $i<$l; $i++){
				$o=ord($str[$i]);
				if($o > 0x80) {
					$ret.=$str[$i].$str[$i+1];
					$i++;
				}elseif($o == 0 || $o == 34 || $o == 39 || $o == 92){
					$ret.=chr(92).$str[$i];
				}else{
					$ret.=$str[$i];
				}
			}
			return $ret;
		}else{
			return addslashes($str);
		}
	}
}

/**
 * ���ַ�������ת����һ���ַ���
 * 
 * @param      array      $ary �ַ�������
 * @param      string     $equal �������ƺ�ֵ֮��ķָ���
 * @param      string     $split ��������֮��ķָ���
 * @access     public
 * @return     string
 */
function jieqi_sarytostr($ary, $equal='=', $split=','){
	$ret='';
	foreach($ary as $k=>$v){
		if(!empty($ret)) $ret.=$split;
		$ret.=$k.$equal.$v;
	}
	return $ret;
}

/**
 * ��һ���ַ�����ԭ���ַ�������
 * 
 * @param      string     $str ������ַ���
 * @param      string     $equal �������ƺ�ֵ֮��ķָ���
 * @param      string     $split ��������֮��ķָ���
 * @access     public
 * @return     array
 */
function jieqi_strtosary($str, $equal='=', $split=','){
	$ret=array();
	$tmpary=explode($split, $str);
	foreach($tmpary as $v){
		$idx=strpos($v, $equal);
		if($idx>0) $ret[substr($v,0,$idx)]=substr($v,$idx+1);
	}
	return $ret;
}

//  ------------------------------------------------------------------------
//  �ļ�����
//  ------------------------------------------------------------------------

/**
 * ��ȡһ���ļ�����
 * 
 * @param      string     $file_name �ļ���
 * @access     public
 * @return     string      �����ļ�����
 */
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

/**
 * ������д��һ���ļ�
 * 
 * @param      string     $file_name �ļ���
 * @param      string     $data ����
 * @param      string     $method д��ģʽ��Ĭ�� "wb" ��ָ�����Ʒ�ʽд
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
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

/**
 * ɾ���ļ�
 * 
 * @param      string     $file_name �ļ���
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_delfile($file_name){
	$file_name = trim($file_name);
	$matches = array();
	if(!preg_match('/^(ftps?):\/\/([^:\/]+):([^:\/]*)@([0-9a-z\-\.]+)(:(\d+))?([0-9a-z_\-\/\.]*)/is', $file_name, $matches)){
		return @unlink($file_name);
	}else{
		include_once(JIEQI_ROOT_PATH.'/lib/ftp/ftp.php');
		$ftpssl = (strtolower($matches[1]) == 'ftps') ? 1 : 0;
		$matches[6]=intval(trim($matches[6]));
		$ftpport = ($matches[6] > 0) ? $matches[6] : 21;
		$ftp =& JieqiFTP::getInstance($matches[4], $matches[2], $matches[3], '.', $ftpport, 0, $ftpssl);
		if(!$ftp) return false;
		$matches[7] = trim($matches[7]);
		return $ftp->ftp_delete($matches[7]);
	}
}

/**
 * ɾ��Ŀ¼
 * 
 * @param      string     $dirname Ŀ¼��
 * @param      bool       $flag true��ʾɾ��Ŀ¼����Ĭ�ϣ���false��ʾ���Ŀ¼��������
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_delfolder($dirname, $flag = true){
	$dirname = trim($dirname);
	$matches = array();
	if(!preg_match('/^(ftps?):\/\/([^:\/]+):([^:\/]*)@([0-9a-z\-\.]+)(:(\d+))?([0-9a-z_\-\/\.]*)/is', $dirname, $matches)){
		$handle = @opendir($dirname);
		while (($file = @readdir($handle)) !== false) {
			if($file != '.' && $file != '..'){
				if (is_dir($dirname . DIRECTORY_SEPARATOR . $file)){
					jieqi_delfolder($dirname . DIRECTORY_SEPARATOR . $file, true);
				}else{
					@unlink($dirname . DIRECTORY_SEPARATOR . $file);
				}
			}
		}
		@closedir($handle);
		if ($flag) @rmdir($dirname);
		return true;
	}else{
		include_once(JIEQI_ROOT_PATH.'/lib/ftp/ftp.php');
		$ftpssl = (strtolower($matches[1]) == 'ftps') ? 1 : 0;
		$matches[6]=intval(trim($matches[6]));
		$ftpport = ($matches[6] > 0) ? $matches[6] : 21;
		$ftp =& JieqiFTP::getInstance($matches[4], $matches[2], $matches[3], '.', $ftpport, 0, $ftpssl);
		if(!$ftp) return false;
		$matches[7] = trim($matches[7]);
		return $ftp->ftp_delfolder($matches[7], $flag);
	}
}

/**
 * ����Ŀ¼
 * 
 * @param      string     $dirname Ŀ¼��
 * @param      int        $mode �������Ŀ¼Ȩ��
 * @param      bool       $recursive �Ƿ�֧�ֶ༶Ŀ¼������Ĭ�Ϸ�
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_createdir($dirname, $mode=0777, $recursive = false){
	if (!$recursive) {
		$ret=@mkdir($dirname, $mode);
		if($ret) @chmod($dirname, $mode);
		return $ret;
	}
	if(is_dir($dirname)){
		return true;
	}elseif(jieqi_createdir(dirname($dirname), $mode, true)){
		$ret=@mkdir($dirname, $mode);
		if($ret) @chmod($dirname, $mode);
		return $ret;
	}else{
		return false;
	}
}

/**
 * ���Ŀ¼�Ƿ���ڣ������ڳ����Զ�����
 * 
 * @param      string     $dirname Ŀ¼��
 * @param      bool       $autocreate Ŀ¼�������Ƿ����Զ�������Ĭ�Ϸ�
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_checkdir($dirname, $autocreate=false){
	if(is_dir($dirname)){
		return true;
	}else{
		if(empty($autocreate)) return false;
		else return jieqi_createdir($dirname, 0777, true);
	}
}

/**
 * ���������ļ���Ϣ
 * 
 * @param      string     $filename �ļ���
 * @param      string     $contenttype �ļ�mime����
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_downfile($filename, $contenttype='application/octet-stream'){
	if(file_exists($filename)){
		header("Content-type: ".$contenttype);
		header("Accept-Ranges: bytes");
		header("Content-Disposition: attachment; filename=".basename($filename));
		echo jieqi_readfile($filename);
		return true;
	}else{
		return false;
	}
}

/**
 * ���������ƶ��ļ�
 * 
 * @param      string     $from_file ԭʼ�ļ���
 * @param      string     $to_file �������ļ�����֧��ftpģʽ���� ftp://user:password@host/dir/file.txt
 * @param      int        $mode �������ļ�Ȩ��
 * @param      bool       $move �Ƿ��ƶ��ļ���Ĭ��false��ʾ������true��ʾ�ƶ�
 * @access     public
 * @return     bool       �ɹ�����true��ʧ�ܷ���false
 */
function jieqi_copyfile($from_file, $to_file, $mode = 0777, $move = false){
	$from_file = trim($from_file);
	if(!is_file($from_file)) return false;
	$to_file = trim($to_file);
	$matches = array();
	if(!preg_match('/^(ftps?):\/\/([^:\/]+):([^:\/]*)@([0-9a-z\-\.]+)(:(\d+))?([0-9a-z_\-\/\.]*)/is', $to_file, $matches)){
		jieqi_checkdir(dirname($to_file), true);
		if(is_file($to_file)) @unlink($to_file);
		if($move) $ret = rename($from_file, $to_file);
		else $ret = copy($from_file, $to_file);
		if($ret && $mode) @chmod($to_file, $mode);
		return $ret;
	}else{
		include_once(JIEQI_ROOT_PATH.'/lib/ftp/ftp.php');
		$ftpssl = (strtolower($matches[1]) == 'ftps') ? 1 : 0;
		$matches[6]=intval(trim($matches[6]));
		$ftpport = ($matches[6] > 0) ? $matches[6] : 21;
		$ftp =& JieqiFTP::getInstance($matches[4], $matches[2], $matches[3], '.', $ftpport, 0, $ftpssl);
		if(!$ftp) return false;
		$matches[7] = trim($matches[7]);
		if(!$ftp->ftp_chdir(dirname($matches[7]))){
			if(substr($matches[7],0,1) == '/') $matches[7] = substr($matches[7],1);
			$pathary = explode('/', dirname($matches[7]));
			foreach ($pathary as $v){
				$v=trim($v);
				if(strlen($v) > 0){
					if($ftp->ftp_mkdir($v) !== false && $mode) $ftp->ftp_chmod($mode, $v);
					$ftp->ftp_chdir($v);
				}
			}
		}
		$ret = $ftp->ftp_put(basename($matches[7]), $from_file);
		if($ret && $mode) $ftp->ftp_chmod($mode, basename($matches[7]));
		//$ftp->ftp_close();
		if($move) @unlink($from_file);
		return $ret;
	}
}

/**
 * ��һ������ת���ɿɱ����������ļ����ַ���
 * 
 * @param      string     $varname ������
 * @param      mixed      $vars Ҫ����ı���
 * @access     public
 * @return     string
 */
function jieqi_extractvars($varname, &$vars){
	$extract_array_str='';
	if (is_array($vars)) {
		foreach($vars as $key=>$val) {
			if (is_array($val)) {
				$extract_array_str .= jieqi_extractvars($varname."['".jieqi_setslashes($key, '"')."']", $vars[$key]);
			}else {
				$extract_array_str .= '$' . $varname . "['" . jieqi_setslashes($key, '"') . "'] = '" . jieqi_setslashes($val, '"') . "';\n";
			}
		}
	}else{
		$extract_array_str .= '$' .$varname . " = '" . jieqi_setslashes($vars, '"') . "';\n";
	}
	return  $extract_array_str;
}


/**
 * ���������ļ���ͨ���ǰ�һ��������php�ļ���
 * 
 * @param      string     $fname �ļ�����������׺
 * @param      string     $varname ������
 * @param      mixed      $vars Ҫ����ı���
 * @param      string     $module ģ������Ĭ��'system'
 * @access     public
 * @return     bool
 */
function jieqi_setconfigs($fname='', $varname, &$vars, $module='system'){
	global $jieqiModules;
	if(strlen($fname) > 0 && strlen($varname) > 0){
		$dir = JIEQI_ROOT_PATH.'/configs';
		if(!file_exists($dir)) @mkdir($dir, 0777);
		@chmod($dir, 0777);
		if($module != 'system' && isset($jieqiModules[$module])){
			$dir.='/'.$module;
			if(!file_exists($dir)) @mkdir($dir, 0777);
			@chmod($dir, 0777);
		}
		$dir.='/'.$fname.'.php';
		if(file_exists($dir)) @chmod($dir, 0777);
		$varstring="<?php\n".jieqi_extractvars($varname, $vars)."\n?>";
		return jieqi_writefile($dir, $varstring);
	}
	return false;
}

/**
 * ���滺�����
 * 
 * @param      string     $fname �ļ�����������׺
 * @param      string     $varname ������
 * @param      mixed      $vars Ҫ����ı���
 * @param      string     $module ģ������Ĭ��'system'
 * @param      int        $cacheid ����id
 * @access     public
 * @return     bool
 */
function jieqi_setcachevars($fname='', $varname, &$vars, $module='system', $cacheid = 0){
	global $jieqiModules;
	global $jieqiCache;
	if(empty($fname) || empty($varname)) return false;
	$cachefile = JIEQI_CACHE_PATH.'/cachevars';
	if(isset($jieqiModules[$module])) $cachefile .= '/'.$module;
	if(empty($cacheid)){
		$cachefile .= '/'.$fname.'.php';
	}else{
		$cacheid = intval($cacheid);
		$cachefile .= '/'.$fname.jieqi_getsubdir($cacheid).'/'.$cacheid.'.php';
	}
	if(is_a($jieqiCache, 'JieqiCacheMemcached')){
		return $jieqiCache->set($cachefile, $vars);
	}else{
		$varstring="<?php\n".jieqi_extractvars($varname, $vars)."\n?>";
		return $jieqiCache->set($cachefile, $varstring);
	}
}

/**
 * �������ļ���ñ���(һ�������ò���������configsĿ¼��)
 * 
 * @param      string     $module ģ����
 * @param      string     $fname �ļ�����������׺
 * @param      string     $vname ��ȡ�ı�����
 * @access     public
 * @return     bool
 */
function jieqi_getconfigs($module, $fname, $vname=''){
	if($vname !== false){
		if($vname=='') $vname='jieqi'.ucfirst($fname);
		global ${$vname};
	}
	//����Ĳ���ֻ����һ��
	if($vname == 'jieqiBlocks' && isset($jieqiBlocks)){
		return true;
	}else{
		if($module=='system' || $module=='') $file=JIEQI_ROOT_PATH.'/configs/'.$fname.'.php';
		else $file=JIEQI_ROOT_PATH.'/configs/'.$module.'/'.$fname.'.php';
		$file = @realpath($file);
		if (preg_match('/\.php$/i', $file)){
			include_once($file);
			return true;
		}else return false;
	}
}

/**
 * ��ȡ�������
 * 
 * @param      string     $module ģ����
 * @param      string     $fname �ļ�����������׺
 * @param      string     $vname ��ȡ�ı�����
 * @param      int        $cacheid ����id
 * @access     public
 * @return     bool
 */
function jieqi_getcachevars($module, $fname, $vname='', $cacheid = 0){
	global $jieqiModules;
	global $jieqiCache;
	if(empty($module) || empty($fname)) return false;
	if($vname !== false){
		if($vname=='') $vname='jieqi'.ucfirst($fname);
		global ${$vname};
	}
	$cachefile = JIEQI_CACHE_PATH.'/cachevars';
	if(isset($jieqiModules[$module])) $cachefile .= '/'.$module;
	if(empty($cacheid)){
		$cachefile .= '/'.$fname.'.php';
	}else{
		$cacheid = intval($cacheid);
		$cachefile .= '/'.$fname.jieqi_getsubdir($cacheid).'/'.$cacheid.'.php';
	}
	if(is_a($jieqiCache, 'JieqiCacheMemcached')){
		${$vname} = $jieqiCache->get($cachefile);
	}else{
		$cachefile = @realpath($cachefile);
		if(is_file($cachefile) && preg_match('/\.php$/i', $cachefile)) include_once($cachefile);
	}
}

//******************************************************
//����
//******************************************************

/**
 * ͨ�õĶ������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiObject{
	//�������б���
	var $vars = array();
	//��������
	var $errors = array();

	/**
	 * ���캯��
	 * 
	 * @param      void       
	 * @access     private
	 * @return     void
	 */
	function JieqiObject(){

	}

	/**
	 * ����һ��ʵ��
	 * 
	 * @param      string     $classname ����
	 * @param      array      $valarray ��ʼ������
	 * @access     public
	 * @return     object
	 */
	function &getInstance($classname, $valarray=''){
		static $instance;
		if (!isset($instance)) {
			if (class_exists($classname)) {
				if ($valarray==''){
					$instance = new $classname();
				}else{
					if (is_array($valarray)){
						$instance = new $classname(implode(', ',$valarray));
					}else{
						$instance = new $classname($valarray);
					}
				}
			} else {
				return false;
			}
		}
		return $instance;
	}

	/**
	 * ȡ�ñ���ֵ
	 * 
	 * @param      string     $key ������
	 * @param      string     $format ����ĸ�ʽ����ʽ 's'-html��ʾ��ʽ, 'e'-html�༭��ʽ, 'q'-���ݿ��ѯ��ʽ��'n'-�����и�ʽ����
	 * @access     public
	 * @return     mixed
	 */
	function getVar($key, $format = 's'){
		if (isset($this->vars[$key])) {
			if(is_string($this->vars[$key])){
				switch (strtolower($format)) {
					case 's':
						return jieqi_htmlstr($this->vars[$key]);
					case 'e':
						return htmlspecialchars($this->vars[$key],ENT_QUOTES);
					case 'q':
						return jieqi_dbslashes($this->vars[$key]);
					case 'n':
					default:
						return $this->vars[$key];
				}
			}else return $this->vars[$key];
		}else{
			return false;
		}
	}

	/**
	 * ȡ�����б���
	 * 
	 * @param      void
	 * @access     public
	 * @return     mixed
	 */
	function getVars(){
		return $this->vars;
	}

	/**
	 * ����һ������
	 * 
	 * @param      string     $key ������
	 * @param      mixed      $value ����ֵ
	 * @access     public
	 * @return     void
	 */
	function setVar($key, $value){
		$this->vars[$key] = $value;
	}

	/**
	 * �������ñ���
	 * 
	 * @param      array      $var_arr �������飬���Ǳ�������ֵ�Ǳ���ֵ
	 * @access     public
	 * @return     void
	 */
	function setVars($var_arr){
		foreach ($var_arr as $key => $value){
			$this->setVar($key, $value);
		}
	}

	/**
	 * ȡ�����б�������
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function clearVars(){
		$this->vars=array();
	}

	/**
	 * ����һ������
	 * 
	 * @param      string     $message ������Ϣ
	 * @param      int        $mode ��������
	 * @access     public
	 * @return     void
	 */
	function raiseError($message='unknown error!', $mode=JIEQI_ERROR_DIE){
		switch ($mode) {
			case JIEQI_ERROR_DIE:
				jieqi_printfail($message);
				//$this->errors[$mode][] = $message;
				break;
			case JIEQI_ERROR_RETURN:
			case JIEQI_ERROR_PRINT:
				$this->errors[$mode][] = $message;
				break;
			default:
				$this->errors[JIEQI_ERROR_RETURN][] = $message;
				break;
		}
	}

	/**
	 * ����Ƿ��д���
	 * 
	 * @param      int        $mode ��������
	 * @access     public
	 * @return     int         ����0��ʾû���󣬴���0��ʾ�д���
	 */
	function isError($mode=0){
		if (empty($mode)) return count($this->errors);
		elseif(isset($this->errors[$mode])) return count($this->errors[$mode]);
		else return 0;
	}

	/**
	 * ��ô�����Ϣ
	 * 
	 * @param      int        $mode ��������
	 * @access     public
	 * @return     array      ������Ϣ����
	 */
	function getErrors($mode=''){
		if (empty($mode)) return $this->errors;
		return $this->errors[$mode];
	}

	/**
	 * ���������Ϣ
	 * 
	 * @param      int        $mode ��������
	 * @access     public
	 * @return     void
	 */
	function clearErrors($mode=''){
		if (empty($mode)) $this->errors = array();
		else $this->errors[$mode] = array();
	}
}

//******************************************************
//������
//******************************************************
/**
 * ������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiBlock extends JieqiObject{
	var $blockvars = array(); //�����������
	var $module = '';  //��������ģ��
	var $template = ''; //����ģ���ļ�����ע��Ĭ�ϵ�ģ����Ҫ�ͳ����ļ���һ�£�һ������������� block_file.php��ģ������ block_file.html��
	var $cachetime = JIEQI_CACHE_LIFETIME; //����ʱ������ -1 ��ʾ������ 0 ��ʾĬ��ϵͳ����ʱ�� >0 ��ʾ�Զ��建��ʱ��

	/**
	 * ���캯������ʼ������ֵ
	 * 
	 * @param      array
	 * @access     private
	 * @return     void
	 */
	function JieqiBlock(&$vars){
		global $jieqiModules;
		global $jieqiTpl;
		$this->blockvars=$vars;
		if(empty($this->module)) $this->module = (empty($this->blockvars['module'])) ? 'system' : $this->blockvars['module'];
		if(empty($this->blockvars['template'])) $this->blockvars['template'] = $this->template;
		if(!empty($this->blockvars['template'])){
			$this->blockvars['tlpfile'] = $jieqiModules[$this->module]['path'].'/templates/blocks/'.$this->blockvars['template'];
		}else $this->blockvars['tlpfile'] = '';
		if($this->cachetime == 0) $this->cachetime = JIEQI_CACHE_LIFETIME;
		if(empty($this->blockvars['cachetime'])) $this->blockvars['cachetime'] = $this->cachetime;
		if(empty($this->blockvars['overtime'])) $this->blockvars['overtime'] = 0;
		if(empty($this->blockvars['cacheid'])) $this->blockvars['cacheid'] = NULL;
		if(empty($this->blockvars['compileid'])) $this->blockvars['compileid'] = NULL;

		if(!empty($this->blockvars['template'])) $this->template = $this->blockvars['template'];
		if(!is_object($jieqiTpl) && !empty($this->blockvars['tlpfile'])){
			include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
			$jieqiTpl =& JieqiTpl::getInstance();
		}
	}

	/**
	 * ����������
	 * 
	 * @param      void
	 * @access     private
	 * @return     string
	 */
	function getTitle(){
		return isset($this->blockvars['title']) ? $this->blockvars['title'] : '';
	}

	/**
	 * �����������
	 * 
	 * @param      void
	 * @access     private
	 * @return     string
	 */
	function getContent(){
		global $jieqiTpl;
		if(JIEQI_USE_CACHE && !empty($this->blockvars['tlpfile']) && $this->blockvars['cachetime'] > 0 && $jieqiTpl->is_cached($this->blockvars['tlpfile'], $this->blockvars['cacheid'], $this->blockvars['compileid'], $this->blockvars['cachetime'], $this->blockvars['overtime'])){
			$jieqiTpl->setCaching(1);
			return $jieqiTpl->fetch($this->blockvars['tlpfile'], $this->blockvars['cacheid'], $this->blockvars['compileid'], $this->blockvars['cachetime'], $this->blockvars['overtime'], false);
		}else{
			return $this->updateContent(true);
		}
	}

	/**
	 * �������黺��
	 * 
	 * @param      bool        $isreturn �Ƿ񷵻�����
	 * @access     private
	 * @return     string
	 */
	function updateContent($isreturn=false){
		global $jieqiTpl;
		$this->setContent();
		if(!empty($this->blockvars['tlpfile'])){
			if(JIEQI_USE_CACHE && $this->blockvars['cachetime'] > 0){
				$jieqiTpl->setCaching(2);
				//$jieqiTpl->setCacheTime($this->blockvars['cachetime']);
				//$jieqiTpl->setOverTime($this->blockvars['overtime']);
			}else{
				$jieqiTpl->setCaching(0);
			}
			$tmpvar=$jieqiTpl->fetch($this->blockvars['tlpfile'], $this->blockvars['cacheid'], $this->blockvars['compileid'], $this->blockvars['cachetime'], $this->blockvars['overtime'], false);
			if($isreturn) return $tmpvar;
		}
	}

	/**
	 * ��ֵ��������
	 * 
	 * @param      void
	 * @access     private
	 * @return     void
	 */
	function setContent($isreturn=false){
	}

}

//******************************************************
//������
//******************************************************

/**
 * ������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiCache extends JieqiObject{
	/**
	 * ���ؾ�̬ʵ������������
	 * 
	 * @param      void       
	 * @access     private
	 * @return     array
	 */
	function &retInstance(){
		static $instance = array();
		return $instance;
	}

	/**
	 * �ر���������
	 * 
	 * @param      void
	 * @access     public
	 * @return     bool
	 */
	function close($cache = NULL) {
		if(is_object($cache)){
			$cache->close();
		}else{
			$instance =& JieqiCache::retInstance();
			if(!empty($instance)){
				foreach($instance as $cache){
					$cache->close();
				}
			}
		}
	}

	//����һ��ʵ��
	function &getInstance($type = false, $options = array()){
		if(in_array(strtolower($type), array('file', 'memcached'))) $type = strtolower($type);
		else $type = 'file';
		if(JIEQI_VERSION_TYPE == '' || JIEQI_VERSION_TYPE == 'Free') $type = 'file';
		$class = 'JieqiCache'.ucfirst($type);
		$instance =& JieqiCache::retInstance();
		$inskey = md5($class.'::'.serialize($options));
		if (!isset($instance[$inskey])) {
			$instance[$inskey] = new $class($options);
			if($type != 'file' && $instance[$inskey] === false) $instance[$inskey] = new JieqiCacheFile($options);
		}
		if(!defined('JIEQI_CACHE_CONNECTED')) @define('JIEQI_CACHE_CONNECTED',true);
		return $instance[$inskey];
	}
}

/**
 * �ļ�������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiCacheFile extends JieqiCache{

	/**
	 * ��������
	 * 
	 * @access     public
	 * @return     bool
	 */
	function JieqiCacheFile(){
		return true;
	}

	/**
	 * �ر���������
	 * 
	 * @param      void
	 * @access     public
	 * @return     bool
	 */
	function close($cache = NULL) {
		return true;
	}

	/**
	 * �Ƿ��Ѿ�����
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @param      int         $ttl ����ʱ��
	 * @access     public
	 * @return     boolean
	 */
	function iscached($name, $ttl = 0, $over = 0){
		if(empty($ttl) && empty($over)){
			return is_file($name);
		}else{
			$ftime = @filemtime($name);
			if(!$ftime) return false;
			if(($ttl > 0 && JIEQI_NOW_TIME - $ftime > $ttl) || ($over > 0 && $over > $ftime)){
				jieqi_delfile($name);
				return false;
			}else{
				return true;
			}
		}
	}

	/**
	 * ���ػ����ʱ��
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @access     public
	 * @return     boolean
	 */
	function cachedtime($name){
		if(file_exists($name)) return filemtime($name);
		else return 0;
	}

	/**
	 * ���»���ʱ��
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @access     public
	 * @return     boolean
	 */
	function uptime($name){
		@touch($name, time());
		@clearstatcache();
	}

	/**
	 * ��û���
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @param      int         $ttl ����ʱ��
	 * @access     public
	 * @return     string
	 */
	function get($name, $ttl = 0, $over = 0){
		if(empty($ttl) && empty($over)){
			return jieqi_readfile($name);
		}else{
			$ftime = @filemtime($name);
			if(!$ftime) return false;
			if(($ttl > 0 && JIEQI_NOW_TIME - $ftime > $ttl) || ($over > 0 && $over > $ftime)){
				jieqi_delfile($name);
				return false;
			}else{
				return jieqi_readfile($name);
			}
		}
	}

	/**
	 * ���û���
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @param      string      $value ���������
	 * @param      int         $ttl ����ʱ��
	 * @access     public
	 * @return     bool
	 */
	function set($name, $value, $ttl = 0, $over = 0){
		if(jieqi_checkdir(dirname($name), true)) return jieqi_writefile($name, $value);
		else return false;
	}

	/**
	 * ɾ������
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @access     public
	 * @return     bool
	 */
	function delete($name){
		return jieqi_delfile($name);
	}

	/**
	 * ������
	 * 
	 * @param      void
	 * @access     public
	 * @return     bool
	 */
	function clear($path=''){
		if(!empty($path) && is_dir($path)) jieqi_delfolder($path);
	}
}

/**
 * memcached������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiCacheMemcached extends JieqiCache{

	var $_connected; //�Ƿ��Ѿ�����
	var $_mc; //memcached����
	var $_md5key = true; //��ֵ�Ƿ�md5�󱣴�
	var $_keyext = '.mt'; //�����ֵʱ�򣬸���һ����׺��Ϊ�µļ�����ʱ��

	/**
	 * ��������������memcached����
	 * 
	 * @param      array      $options ��������
	 * @access     public
	 * @return     bool
	 */
	function JieqiCacheMemcached($options){
		if(!class_exists('Memcache')) exit('Memcache class not exists');
		if(!isset($options['host'])) $options['host'] = '127.0.0.1';
		if(!isset($options['port'])) $options['port'] = 11211;
		if(!isset($options['timeout'])) $options['timeout'] = false;
		if(!isset($options['persistent'])) $options['persistent'] = false;

		$func = $options['persistent'] ? 'pconnect' : 'connect';
		$this->_mc  = &new Memcache;
		$this->_connected = ($options['timeout'] === false) ? @$this->_mc->$func($options['host'], $options['port']) : @$this->_mc->func($options['host'], $options['port'], $options['timeout']);
		if(!$this->_connected && JIEQI_ERROR_MODE > 0) echo 'Could not connect to memcache and try to use file cache now!<br />';
		return $this->_connected;
	}

	/**
	 * �ر���������
	 * 
	 * @param      void
	 * @access     public
	 * @return     bool
	 */
	function close($cache = NULL) {
		if(is_object($this->_mc)) return $this->_mc->close();
		else return true;
	}

	/**
	 * �Ƿ��Ѿ�����
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @param      int         $ttl ����ʱ��
	 * @access     public
	 * @return     boolean
	 */
	function iscached($name, $ttl = 0, $over = 0){
		return ($this->get($name, $ttl, $over) === false) ? false : true;
	}

	/**
	 * ���ػ����ʱ��
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @access     public
	 * @return     boolean
	 */
	function cachedtime($name){
		if($this->_md5key) $name = md5($name);
		return intval($this->_mc->get($name.$this->_keyext));
	}

	/**
	 * ���»���ʱ��
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @access     public
	 * @return     boolean
	 */
	function uptime($name){
		if($this->_md5key) $name = md5($name);
		return $this->_mc->set($name.$this->_keyext, time(), 0, 0);
	}

	/**
	 * ��û���
	 * 
	 * @param      string      $name ����ļ���
	 * @param      int         $ttl ����ʱ��
	 * @access     public
	 * @return     string
	 */
	function get($name, $ttl = 0, $over = 0){
		$key = ($this->_md5key == true) ? md5($name) : $name;
		$ret = $this->_mc->get($key);
		if($ret === false || (empty($ttl) && empty($over))) return $ret;
		else{
			$ctime = $this->cachedtime($name);
			if(($ttl > 0 && JIEQI_NOW_TIME - $ctime > $ttl) || ($over > 0 && $over > $ctime)){
				$this->delete($name);
				return false;
			}else{
				return $ret;
			}
		}
	}

	/**
	 * ���û���
	 * 
	 * @param      string      $name ����ļ���
	 * @param      string      $value ���������
	 * @access     public
	 * @return     bool
	 */
	function set($name, $value, $ttl=0, $over = 0){
		if($ttl > 2592000) $ttl = 0;
		if($this->_md5key) $name = md5($name);
		if($over > JIEQI_NOW_TIME && $over - JIEQI_NOW_TIME < $ttl) $ttl = $over - JIEQI_NOW_TIME;
		return ($this->_mc->set($name.$this->_keyext, time(), 0, $ttl) && $this->_mc->set($name, $value, 0, $ttl));
	}

	/**
	 * ɾ������
	 * 
	 * @param      string      $name ����ļ������������ļ�����
	 * @access     public
	 * @return     bool
	 */
	function delete($name){
		if($this->_md5key) $name = md5($name);
		return ($this->_mc->delete($name.$this->_keyext) && $this->_mc->delete($name));
	}

	/**
	 * ������
	 * 
	 * @param      void
	 * @access     public
	 * @return     bool
	 */
	function clear(){
		return $this->_mc->flush();
	}
}

?>