<?php 
/**
 * �ռ����ò˵�����
 *
 * �ռ����ò˵�
 * 
 * ����ģ�壺/modules/space/templates/blocks/block_setnav.html
 * 
 * @category   jieqicms
 * @package    space
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 */
//�ҵ������б�(ԭ��)(��̬)
class BlockSpaceSetNav extends JieqiBlock
{
	var $module = 'space';
	var $template='block_setnav.html';
	var $cachetime = -1;
	function setContent(){
		global $jieqiTpl;
		global $jieqiConfigs;
		global $jieqiModules;
		global $uid;
		$jieqiTpl->assign('set_basic_url',$jieqiModules['space']['url'].'/set.php?uid='.$uid);
		$jieqiTpl->assign('set_theme_url',$jieqiModules['space']['url'].'/settheme.php?uid='.$uid);
		$jieqiTpl->assign('set_blog_cat_url',$jieqiModules['space']['url'].'/setblogcat.php?uid='.$uid.'&type=blog');
		$jieqiTpl->assign('set_album_cat_url',$jieqiModules['space']['url'].'/setblogcat.php?uid='.$uid.'&type=image');
	}
}
?>