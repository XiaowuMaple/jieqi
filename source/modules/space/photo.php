<?php
/**
 * �����Ƭ�б�
 *
 * �����Ƭ�б�
 * 
 * ����ģ�壺$jieqiModules['space']['path'].'/templates/photo.html
 * 
 * @category   jieqicms
 * @package    space
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 * @version 1.0
 */
define('JIEQI_MODULE_NAME','space');
require_once('../../global.php');
include_once($jieqiModules['space']['path'].'/spaceheader.php');
jieqi_loadlang('setblogcat',JIEQI_MODULE_NAME);
jieqi_getconfigs('space', 'blogblocks','jieqiBlocks');
//check power
if(empty($_REQUEST['uid'])) {
	jieqi_checklogin();
	$_REQUEST['uid'] = $_SESSION['jieqiUserId'];
}

//��֤��Ὺʼ
        $pagesize = 20; //ÿ��ʮҳ��ҳ
        $_REQUEST['catid']=intval($_REQUEST['catid']);
		$_REQUEST['page']=intval($_REQUEST['page']);
		$_REQUEST['page'] = $_REQUEST['page']<1 ?1 :$_REQUEST['page'];
		$start = ($_REQUEST['page']-1)*$pagesize;
		$max = $start+$pagesize-1;
		space_get_blog_cat('image');
		if(!array_key_exists($_REQUEST['catid'],$blog_cats)) jieqi_printfail($jieqiLang['space']['no_this_user']);
//��֤����
        $jieqiTpl->assign('image',$blog_cats[$_REQUEST['catid']]);
//��ȡ������µ�ͼƬ�б�
        $photostr = '';
        $photoarray = array();
		$photostr = $blog_cats[$_REQUEST['catid']]['attachment'];
		$photoarray = unserialize($photostr);
		$imagearr = array();
		for($i=$start;$i<=$max;$i++){
		  $imagearr[] = $photoarray[$i];
		}
		//exit;
		
		//����ҳ����ת
		include_once(JIEQI_ROOT_PATH.'/lib/html/page.php');
		$jumppage = new JieqiPage(count($photoarray),$pagesize,$_REQUEST['page']);
		$jieqiTpl->assign('url_jumppage',$jumppage->whole_bar());		
		$jieqiTpl->assign('catid',$_REQUEST['catid']);
		$jieqiTpl->assign('image_cats',$imagearr);
		$jieqiTset['jieqi_contents_template'] = $jieqiModules['space']['path'].'/templates/photo.html';
		include_once($jieqiModules['space']['path'].'/spacefooter.php');

?>