<?php
/**
 * ����ϵͳ�Ĺ��������ļ�
 *
 * ����ϵͳ�Ĺ��������ļ�
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    space
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 * @version 1.0
 */
require_once(JIEQI_ROOT_PATH.'/header.php');
define(JIEQI_MODULE_NAME,'space');
//basic info about this space
jieqi_loadlang('header', JIEQI_MODULE_NAME);
if( !($uid=$_REQUEST['uid']) ){
	jieqi_checklogin();
	$uid = $_SESSION['jieqiUserId'];
}
$jieqiTpl->assign('uid',$uid);
$space_config_path = jieqi_uploadpath('spaceconfigs',JIEQI_MODULE_NAME);
jieqi_checkdir( $space_config_path.'/basic'.'/'.jieqi_getsubdir($uid),1);
jieqi_checkdir($space_config_path.'/blogcat'.'/'.jieqi_getsubdir($uid),1);
$space_basic_config_file = $space_config_path.'/basic'.jieqi_getsubdir($uid).'/'.$uid.'basic.php';
$space_cat_config_file =  $space_config_path.'/blogcat'.jieqi_getsubdir($uid).'/'.$uid.'blogcats.php';
$space_catimage_config_file =  $space_config_path.'/blogcat'.jieqi_getsubdir($uid).'/'.$uid.'imagecats.php';
//��ʼ��ϵͳ����
space_get_config();
$jieqiTpl->assign('space_url',$jieqiModules['space']['url'].'/space.php?uid='.$uid);
$jieqiTpl->assign('space_blog_url',$jieqiModules['space']['url'].'/blog.php?uid='.$uid);
$jieqiTpl->assign('space_album_url',$jieqiModules['space']['url'].'/album.php?uid='.$uid);
$jieqiTpl->assign('space_archives_url',$jieqiModules['space']['url'].'/archives.php?uid='.$uid);
$jieqiTpl->assign('space_friends_url',$jieqiModules['space']['url'].'/friends.php?uid='.$uid);
$jieqiTpl->assign('space_messages_url',$jieqiModules['space']['url'].'/messages.php?uid='.$uid);
$jieqiTpl->assign('space_album_create_url',$jieqiModules['space']['url'].'/setblogcat.php?uid='.$uid.'&type=image');
$jieqiTpl->assign('space_album_upload_url',$jieqiModules['space']['url'].'/upalbum.php?uid='.$uid);
$jieqiTpl->assign('jieqi_themeurl',$jieqiModules['space']['url'].'/themes/'.$theme.'/');
$jieqiTpl->assign('space_themeurl',$jieqiModules['space']['url'].'/themes/'.$theme.'/');
$jieqiTpl->assign('space_title',jieqi_htmlstr($title) );
$jieqiTpl->assign('brief',jieqi_htmlstr($brief) );

//check space_hoster
if($_SESSION['jieqiUserId'] == $uid || $_SESSION['jieqiUserGroup'] == 2 ){
	$space_hoster = 1;
	$jieqiTpl->assign('space_hoster',$space_hoster);
	$jieqiTpl->assign('space_set_url',$jieqiModules['space']['url'].'/set.php?uid='.$uid);
}else{
	$space_hoster = 0;
}

//get system parameter
jieqi_getconfigs('space','configs');

//add veiws
space_add_visit();
/**
����* ����bitsize,ʵ���ļ��ֽڵ�ת��
����*
����* �ļ��ֽڵ�ת�����㣬��������һ����num�ֽڴ�С���������ǵ�ת��ֵ
����* 
����* @param integer $num ����
����* @return string 
*/
function bitsize($num){
 if(!preg_match("/^[0-9]+$/", $num)) return 0;
 $type = array( "B", "KB", "MB", "GB", "TB", "PB" );
 
 $j = 0;
 while( $num >= 1024 ) {
  if( $j >= 5 ) return $num.$type[$j];
  $num = $num / 1024;
  $j++;
 }
 return ceil($num).$type[$j];
}
/**
����* ����space_edit_album,�������������Ϣ
����*
����* ��������Ŵ������������Ϣ������������������$dbobj,$catid,$urls
����* 
����* @param object $dbobj ���ݲ�������
����* @param integer $catid ���ID 
    * @param string $urls ��ḽ�����·��
	* @return empty
*/
function space_edit_album($dbobj,$catid,$urls=''){
	//�������������Ϣ
	$imgCriteria=new CriteriaCompo(new Criteria('catid',$catid,'='));
    $imgCriteria->setSort('isdefault DESC,attachid');
    $imgCriteria->setOrder('ASC');	
	$dbobj->queryObjects($imgCriteria);
	$rowsAttach=array();
	$i=0;
	$default = 0;
	$defaulturl = '';
	while($v = $dbobj->getObject()){
	      if($i==0){
		     $default = 1;
			 $defaulturl = $v->getVar('url');
		  }else {$default = 0;}
	      $arra=@getimagesize($urls.'../..'.$v->getVar('url'));
		  preg_match_all( '/\"(.*)\"/i',$arra[3],$data );
		  $splito = explode('" height="',$data[1][0]);
		  $st = $splito[0].'*'.$splito[1].' '.bitsize($v->getVar('size'));
		$oldattachary[]=array('name'=>$v->getVar('name'), 'class'=>$v->getVar('class'), 'postfix'=>$v->getVar('postfix'), 'size'=>$v->getVar('size'),'filebak'=>$v->getVar('filebak'),'attachid'=>$v->getVar('attachid'),'url'=>$v->getVar('url'),'catid'=>$v->getVar('catid'),'isdefault'=>$default,'other'=>$st);
		$i++;
	}			
	if(count($oldattachary)>0) $attachinfo=serialize($oldattachary);
	//�ж���ɾ��Ĭ�Ϸ���
	if($defaulturl=='') $defaulturl='/modules/space/templates/images/default.gif';
	$fieldstatu = ',image = \''.$defaulturl.'\'';
	//����ִ�������Ϣ
	$dbobj->db->query("UPDATE ".jieqi_dbprefix('space_blogcat')." SET attachment='".$attachinfo."',num='".count($oldattachary)."'".$fieldstatu." WHERE id=".$catid);	
	space_make_blog_cat('image');    
}
/**
����* ����space_get_blocks,��ȡҳ�����������
����*
����* ����ҳ���ʶ��ȡҳ�������������Ϣ����������һ������$page
����* @param string $page ҳ���ʶ
    * @return empty
*/
function space_get_blocks($page){
	global $jieqiModules;
	$path = JIEQI_ROOT_PATH.'/configs/'.JIEQI_MODULE_NAME.'/space_';
	if( file_exists($path.$page.'blocks.php') ){
		global $jieqiBlocks;
		jieqi_getconfigs(JIEQI_MODULE_NAME,'space_'.$page.'blocks','jieqiBlocks');
	}else{
		echo $path.''.$page.'blocks.php not exists ';
	}
}

function space_make_config($arr=''){
	global $space_basic_config_file;
	global $uid;
	global $jieqiLang;
	global $jieqiModules;
	global $space_config_path;
	global $blog_cat_handler;
	global $space_handler;
	global $space;
	jieqi_checkdir($space_config_path.'/basic',1);

	include_once($jieqiModules['space']['path'].'/class/space.php');
	$space_handler = JieqiSpaceHandler::getInstance('JieqiSpaceHandler');
	$space = $space_handler->get($uid);

	if(!is_object($space)){
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
		if( !($user = $users_handler->get($uid) ) ){
			jieqi_printfail( $jieqiLang['space']['no_this_user'] );
		}
		$space = $space_handler->create();
		jieqi_getconfigs('space','configs');
		global $jieqiConfigs;
		$space_title = sprintf($jieqiConfigs['space']['default_title'],$user->getVar('name') );
		$name = $user->getVar('name');
		$brief = sprintf($jieqiConfigs['space']['default_brief'],$name );
		$space->setVar('uid',$uid);
		$space->setVar('name',$name);
		$space->setVar('title',$space_title);
		$space->setVar('brief',$brief);
		$space->setVar('up_time',JIEQI_NOW_TIME);
		$space->setVar('theme',$jieqiConfigs['space']['default_theme']);
		$space_handler->insert($space);
		//$space = $space_handler->get($uid);
	}

	$arr['uid']  =  $space->getVar('uid');
	$arr['title'] = $space->getVar('title','e');
	$arr['brief'] = $space->getVar('brief','e');
	$arr['theme'] = $space->getVar('theme');
	$arr['open'] = $space->getVar('open');

	$tmpstr = "<?php\n  \$uid=$uid; \n \$title='$arr[title]';\n \$brief='$arr[brief]';\n \$theme='$arr[theme]';\n \$open='$arr[open]';\n \n?>";
	jieqi_writefile($space_basic_config_file,$tmpstr);
	unset($tmpstr);
}
/**
����* ����space_get_config,��ȡҳ�����������
����*
����* ����ҳ���ʶ��ȡ���͵�������Ϣ
    * @return bool
*/
function space_get_config(){
	global $space_basic_config_file;
	global $uid;
	global $title;
	global $brief;
	global $theme;
	global $open;
	global $jieqiConfigs;
	global $jieqiModules;
	global $space_handler;
	if(!file_exists($space_basic_config_file) ){
		//set basic info
		space_make_config('');
	}
	include_once($space_basic_config_file);
	return true;
}
/**
����* ����space_make_blog_cat,���ɲ��͵���������
����*
����* ������Ŀ����������Ŀ������Ϣ����������һ������$type [blog,image]
����* @param string $type ҳ���ʶ
    * @return empty
*/
function space_make_blog_cat($type='blog'){
	global $jieqiLang;
	global $uid;
	global $blog_cat_handler;
	global $space_cat_config_file,$space_catimage_config_file;
	global $jieqiModules;
	global $space_config_path;
	if(!$blog_cat_handler){
		include_once($jieqiModules['space']['path'].'/class/blogcat.php');
		$blog_cat_hanlder = JieqiSpaceBlogCatHandler::getInstance('JieqiSpaceBlogCatHandler');
	}
	include_once($jieqiModules['space']['path'].'/class/blogcat.php');
	$blog_cat_handler = JieqiSpaceBlogCatHandler::getInstance('JieqiSpaceBlogCatHandler');
	$criteria = new CriteriaCompo(new Criteria('`uid`',$uid) );
	$criteria->add(new Criteria('`default_cat`',1) );
	$criteria->add(new Criteria('`type`',$type,'=') );
	$blog_cat_handler->queryObjects($criteria);
	$v = $blog_cat_handler->getObject();
	if(empty($v) ){
		$default_cat = $blog_cat_handler->create();
		$default_cat->setVar('`name`',$jieqiLang['space']['default_'.$type] );
		$default_cat->setVar('`cat_order`',0 );
		$default_cat->setVar('`uid`',$uid);
		$default_cat->setVar('`default_cat`',1);
		$default_cat->setVar('`num`',0);
		//$default_cat->setVar('`image`','');
		$default_cat->setVar('`attachment`','');
		$default_cat->setVar('`type`',$type);
		$blog_cat_handler->insert($default_cat);
		space_make_blog_cat($type);
	}
	unset($v);
	$criteria = new CriteriaCompo(new Criteria('`uid`',$uid) );
	$criteria->setSort('`default_cat` desc,`cat_order`');
	$criteria->add(new Criteria('`type`',$type,'=') );
	$criteria->setOrder('asc');
	$blog_cat_handler->queryObjects($criteria);
	while($v = $blog_cat_handler->getObject() ){
		$blog_cats[$v->getVar('id')]=array(
		'name'=>$v->getVar('name'),
		'id'=>$v->getVar('id'),
		'uid'=>$v->getVar('uid'),
		'cat_order'=>$v->getVar('cat_order'),
		'default_cat'=>$v->getVar('default_cat'),
		'num'=>$v->getVar('num'),
		'image'=>$v->getVar('image'),
		'attachment'=>$v->getVar('attachment','n'),
		'type'=>$v->getVar('type') ?$v->getVar('type') :'blog',
		);
		if($v->getVar('default_cat')){
			$default_cat_id = $v->getVar('id');
		}
	}
	$tmpstr = "<?php  \n \$blog_cats = ".var_export($blog_cats,true)."; \n \$default_cat_id=$default_cat_id; \n  ?>";
	jieqi_checkdir($space_config_path.'/blogcat',1);
	$filename = $type=='blog' ?$space_cat_config_file :$space_catimage_config_file; 
	jieqi_writefile($filename,$tmpstr);
	unset($tmpstr);
}
/**
����* ����space_make_blog_cat,���ز��͵�ϵͳ����
����*
����* ������Ŀ���ͼ�����Ŀ������Ϣ����������һ������$type [blog,image]
����* @param string $type ҳ���ʶ
    * @return bool
*/
function space_get_blog_cat($type='blog'){
	global $space_cat_config_file,$space_catimage_config_file;
	global $uid;
	global $blog_cats;
	global $default_cat_id;
	$filename = $type=='blog' ?$space_cat_config_file :$space_catimage_config_file; 
	if(!file_exists($filename)){
		space_make_blog_cat($type);
	}
	include_once($filename);
	return true;
}

/**
����* ����space_add_visit,���Ӳ��ͷ�����Ϣ
����*
����* ���Ӳ��ͷ�����Ϣ
����* 
    * @return bool
*/
function space_add_visit(){
	global $uid;
	global $space_handler;
	global $jieqiModules;
	if(isset($_COOKIE['space_visited']) ){
		$visited_cookie_ar = unserialize($_COOKIE['space_visited']);
	}
	if(isset($_SESSION['space_visited']) ){
		$visited_session_ar = unserialize($_SESSION['space_visited']);
	}
	if(@in_array($uid,$visited_cookie_ar) || @in_array($uid,$visited_session_ar) ){
		return false;
	}else{
		$visited_cookie_ar[] = $uid;
		setcookie('space_visited',serialize($visited_cookie_ar),JIEQI_NOW_TIME+3600,'/',JIEQI_COOKIE_DOMAIN,0);
		$visited_session_ar[] = $uid;
		$_SESSION['space_visited'] = serialize($visited_session_ar);
	}

	if( !is_object($space_handler) ){
		include_once($jieqiModules['space']['path'].'/class/space.php');
		$space_handler = JieqiSpaceHandler::getInstance('JieqiSpaceHandler');
	}
	$criteria = new Criteria('uid',$uid);
	if( $space_handler->updatefields(" `visit_num`=`visit_num`+1 ",$criteria) ){
		return true;
	}else{
		jieqi_printfail('space insert visit_num error');
	}
}
/**
����* ����space_update_time,���¸��˲��͵��������ʱ��
����*
����* ���¸��˲��͵��������ʱ��
����* 
    * @return empty
*/
function space_update_time(){
	global $uid;
	global $space_hander;
	global $jieqiModules;
	if( !is_object($space_handler) ){
		include_once($jieqiModules['space']['path'].'/class/space.php');
		$space_handler = JieqiSpaceHandler::getInstance('JieqiSpaceHandler');
	}
	$criteria = new Criteria('uid',$uid);
	$space_handler->updatefields("`up_time`=".JIEQI_NOW_TIME,$criteria);
}

?>