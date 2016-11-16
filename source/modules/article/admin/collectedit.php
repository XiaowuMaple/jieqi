<?php 
/**
 * �༭�ɼ�����
 *
 * �༭�ɼ�����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: collectedit.php 228 2008-11-27 06:44:31Z juny $
 */

define('JIEQI_MODULE_NAME', 'article');
require_once('../../../global.php');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');
//��������Ȩ��
jieqi_checkpower($jieqiPower['article']['adminconfig'], $jieqiUsersStatus, $jieqiUsersGroup, false);
jieqi_loadlang('collect', JIEQI_MODULE_NAME);
jieqi_getconfigs(JIEQI_MODULE_NAME, 'collectsite');
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$article_static_url = (empty($jieqiConfigs['article']['staticurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl'];
$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl'])) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl'];
if(empty($_REQUEST['config']) || !file_exists(JIEQI_ROOT_PATH.'/configs/article/site_'.$_REQUEST['config'].'.php')) jieqi_printfail($jieqiLang['article']['rule_not_exists']);
include_once(JIEQI_ROOT_PATH.'/configs/article/site_'.$_REQUEST['config'].'.php');
include_once($jieqiModules['article']['path'].'/include/collectfunction.php');
if (!isset($_REQUEST['action'])) $_REQUEST['action'] = 'show';

switch($_REQUEST['action']){
	case 'edit':
		$editCollect=array();
		$editCollect['sitename']=trim($_POST['sitename']);  //վ��
		$editCollect['siteurl']=trim($_POST['siteurl']); //��ַ
		if(is_numeric(str_replace(array('<{articleid}>', '<{chapterid}>', 'ceil', 'floor', 'round', 'substr', 'intval', 'is_numeric', '+', '-', '*', '/', '%', ',', '?', '=', '>', '<', ':', '(', ')', ' '), '', $_POST['subarticleid']))) $editCollect['subarticleid']=str_replace(array('<{articleid}>', '<{chapterid}>'), array('$articleid', '$chapterid'), trim($_POST['subarticleid'])); //������������㷽ʽ
		else $editCollect['subarticleid']='';
		if(is_numeric(str_replace(array('<{articleid}>', '<{chapterid}>', 'ceil', 'floor', 'round', 'substr', 'intval', 'is_numeric', '+', '-', '*', '/', '%', ',', '?', '=', '>', '<', ':', '(', ')', ' '), '', $_POST['subchapterid']))) $editCollect['subchapterid']=str_replace(array('<{articleid}>', '<{chapterid}>'), array('$articleid', '$chapterid'), trim($_POST['subchapterid'])); //��������㷽ʽ
		else $editCollect['subchapterid']='';
		//�����������ַ
		$editCollect['proxy_host']=trim($_POST['proxy_host']);
		//����������˿�
		$editCollect['proxy_port']=trim($_POST['proxy_port']);
		//����������ʺ�
		//$editCollect['proxy_user']=trim($_POST['proxy_user']);
		//�������������
		//$editCollect['proxy_pass']=trim($_POST['proxy_pass']);
		
		//�½��޷���Ӧ���Ƿ��Զ�������²ɼ�
		$editCollect['autoclear']=trim($_POST['autoclear']);
		//�Ƿ�Ĭ��ȫ��
		$editCollect['defaultfull']=trim($_POST['defaultfull']);
		//����referer
		$editCollect['referer']=trim($_POST['referer']);
		//��ҳ����
		$editCollect['pagecharset']=trim($_POST['pagecharset']);
		//������Ϣҳ��
		$editCollect['urlarticle']=trim($_POST['urlarticle']);
		//���±���
		$editCollect['articletitle']=jieqi_collectptos($_POST['articletitle']);
		//����
		$editCollect['author']=jieqi_collectptos($_POST['author']);
		//����
		$editCollect['sort']=jieqi_collectptos($_POST['sort']);
		//�ؼ���
		$editCollect['keyword']=jieqi_collectptos($_POST['keyword']);
		//���
		$editCollect['intro']=jieqi_collectptos($_POST['intro']);
		//����
		$editCollect['articleimage']=jieqi_collectptos($_POST['articleimage']);
		//���˷���
		$editCollect['filterimage']=trim($_POST['filterimage']);
		//Ŀ¼ҳ����
		$editCollect['indexlink']=jieqi_collectptos($_POST['indexlink']);
		//ȫ�ı��
		$editCollect['fullarticle']=jieqi_collectptos($_POST['fullarticle']);
		
		//�������Ͷ�Ӧid
		$sortary=explode('||', trim($_POST['sortid']));
		$editCollect['sortid']=array();
		foreach($sortary as $v){
			$tmpary=explode('=>', trim($v));
			if(count($tmpary)==2){
				$sname=trim($tmpary[0]);
				$sid=trim($tmpary[1]);
				if(is_numeric($sid)) $editCollect['sortid'][$sname]=$sid;
			}
		}

		$editCollect['urlindex']=trim($_POST['urlindex']); //����Ŀ¼ҳ��
		//�־�����
		$editCollect['volume']=jieqi_collectptos($_POST['volume']);
		//�½�����
		$editCollect['chapter']=jieqi_collectptos($_POST['chapter']);
		//�½����
		$editCollect['chapterid']=jieqi_collectptos($_POST['chapterid']);

		$editCollect['urlchapter']=trim($_POST['urlchapter']); //�½�����ҳ��
		//�½�����
		$editCollect['content']=jieqi_collectptos($_POST['content']);
		//�½�����1
		//$editCollect['content1']=jieqi_collectptos($_POST['content1']);
		//�½����ݹ���
		$editCollect['contentfilter']=trim($_POST['contentfilter']);
		//�½������滻
		$editCollect['contentreplace']=trim($_POST['contentreplace']);
		//�Ƿ�ɼ�ͼƬ
		$editCollect['collectimage']=trim($_POST['collectimage']);
		//�Ƿ�����ͼƬ����
		$editCollect['imagetranslate']=trim($_POST['imagetranslate']);
		//�Ƿ��ˮӡ
		$editCollect['addimagewater']=trim($_POST['addimagewater']);
		//ͼƬ����ɫ
		$editCollect['imagebgcolor']=trim($_POST['imagebgcolor']);
		//����������
		$editCollect['imageareaclean']=trim($_POST['imageareaclean']);
		//����ɫ����
		$editCollect['imagecolorclean']=trim($_POST['imagecolorclean']);

		$editCollect['listcollect']=$jieqiCollect['listcollect'];
		$configstr="<?php\n".jieqi_extractvars('jieqiCollect', $editCollect)."\n?>";
		jieqi_writefile(JIEQI_ROOT_PATH.'/configs/article/site_'.$_POST['config'].'.php', $configstr);
		$siteid=-1;
		reset($jieqiCollectsite);
		while(list($k, $v) = each($jieqiCollectsite)) {
			if($v['config']==$_POST['config']){
				$siteid=$k;
				break;
			}
		}
		if($siteid>=0) $jieqiCollectsite[$siteid]=array('name'=>$editCollect['sitename'], 'config'=>$_POST['config'], 'url'=>$editCollect['siteurl'], 'subarticleid'=>$editCollect['subarticleid'], 'enable'=>'1');
		else $jieqiCollectsite[]=array('name'=>$editCollect['sitename'], 'config'=>$_POST['config'], 'url'=>$editCollect['siteurl'], 'subarticleid'=>$editCollect['subarticleid'], 'enable'=>'1');
		jieqi_setconfigs('collectsite', 'jieqiCollectsite', $jieqiCollectsite, JIEQI_MODULE_NAME);
		jieqi_jumppage($article_static_url.'/admin/collectset.php', LANG_DO_SUCCESS, $jieqiLang['article']['rule_edit_success']);
		break;
	case 'show':
	default:
		include_once(JIEQI_ROOT_PATH.'/admin/header.php');
		$jieqiTpl->assign('article_static_url',$article_static_url);
		$jieqiTpl->assign('article_dynamic_url',$article_dynamic_url);
		include_once(JIEQI_ROOT_PATH.'/lib/html/formloader.php');
		$collect_form = new JieqiThemeForm($jieqiLang['article']['rule_edit'], 'collectedit', $article_static_url.'/admin/collectedit.php');
		$collect_form->addElement(new JieqiFormLabel($jieqiLang['article']['collect_rule_note'], $jieqiLang['article']['collect_rule_description']));
		$collect_form->addElement(new JieqiFormLabel('', $jieqiLang['article']['collect_rule_basic']));
		$collect_form->addElement(new JieqiFormLabel($jieqiLang['article']['rule_site_id'], $_REQUEST['config']));
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_site_name'], 'sitename', 60, 50, htmlspecialchars($jieqiCollect['sitename'], ENT_QUOTES)), true);
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_site_url'], 'siteurl', 60, 100, htmlspecialchars($jieqiCollect['siteurl'], ENT_QUOTES)), true);
		$tmpstr=str_replace(array('$articleid', '$chapterid', '$'),array('<{articleid}>', '<{chapterid}>', ''),$jieqiCollect['subarticleid']);
		$subarticleid=new JieqiFormText($jieqiLang['article']['rule_subarticleid'], 'subarticleid', 60, 100, htmlspecialchars($tmpstr, ENT_QUOTES));
		$subarticleid->setDescription($jieqiLang['article']['rule_operation_note']);
		$collect_form->addElement($subarticleid);
		
		$tmpstr=str_replace(array('$articleid', '$chapterid', '$'),array('<{articleid}>', '<{chapterid}>', ''),$jieqiCollect['subchapterid']);
		$subchapterid=new JieqiFormText($jieqiLang['article']['rule_subchapterid'], 'subchapterid', 60, 100, htmlspecialchars($tmpstr, ENT_QUOTES));
		$subchapterid->setDescription($jieqiLang['article']['rule_operation_note']);
		$collect_form->addElement($subchapterid);
		
		$proxy_host=new JieqiFormText($jieqiLang['article']['rule_proxy_host'], 'proxy_host', 20, 100, $jieqiCollect['proxy_host']);
		$proxy_host->setDescription($jieqiLang['article']['rule_proxyhost_note']);
		$collect_form->addElement($proxy_host);
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_proxy_port'], 'proxy_port', 20, 20, $jieqiCollect['proxy_port']));
		//$proxy_user=new JieqiFormText($jieqiLang['article']['rule_proxy_user'], 'proxy_user', 20, 100, $jieqiCollect['proxy_user']);
		//$proxy_user->setDescription($jieqiLang['article']['rule_proxyuser_note']);
		//$collect_form->addElement($proxy_user);
		//$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_proxy_pass'], 'proxy_pass', 20, 100, $jieqiCollect['proxy_pass']));
		
		$autoclear=new JieqiFormRadio($jieqiLang['article']['rule_auto_clean'], 'autoclear', $jieqiCollect['autoclear']);
		$autoclear->addOption('1', LANG_YES);
		$autoclear->addOption('0', LANG_NO);
		$collect_form->addElement($autoclear);
		$defaultfull=new JieqiFormRadio($jieqiLang['article']['rule_default_full'], 'defaultfull', $jieqiCollect['defaultfull']);
		$defaultfull->addOption('1', LANG_YES);
		$defaultfull->addOption('0', LANG_NO);
		$collect_form->addElement($defaultfull);
		
		$referer=new JieqiFormRadio($jieqiLang['article']['rule_send_referer'], 'referer', $jieqiCollect['referer']);
		$referer->addOption('1', LANG_YES);
		$referer->addOption('0', LANG_NO);
		$collect_form->addElement($referer);
		
		if(empty($jieqiCollect['pagecharset'])) $jieqiCollect['pagecharset']='auto';
		$pagecharset=new JieqiFormSelect($jieqiLang['article']['rule_page_charset'], 'pagecharset', $jieqiCollect['pagecharset']);
		$pagecharset->addOption('auto', $jieqiLang['article']['rule_charset_auto']);
		$pagecharset->addOption('gbk', $jieqiLang['article']['rule_charset_gb']);
		$pagecharset->addOption('utf8', $jieqiLang['article']['rule_charset_utf8']);
		$pagecharset->addOption('big5', $jieqiLang['article']['rule_charset_big5']);
		$pagecharset->setDescription($jieqiLang['article']['rule_charset_note']);
		$collect_form->addElement($pagecharset);
		
		$collect_form->addElement(new JieqiFormLabel('', $jieqiLang['article']['collect_rule_articleinfo']));
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_articleinfo_url'], 'urlarticle', 60, 250, htmlspecialchars($jieqiCollect['urlarticle'], ENT_QUOTES)), true);
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_article_title'], 'articletitle', htmlspecialchars(jieqi_collectstop($jieqiCollect['articletitle']), ENT_QUOTES), 5, 60), true);
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_article_author'], 'author', htmlspecialchars(jieqi_collectstop($jieqiCollect['author']), ENT_QUOTES), 5, 60));
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_article_sort'], 'sort', htmlspecialchars(jieqi_collectstop($jieqiCollect['sort']), ENT_QUOTES), 5, 60));
		if(!is_array($jieqiCollect['sortid'])) $jieqiCollect['sortid']=array();
		$tmpstr='';
		foreach($jieqiCollect['sortid'] as $k=>$v){
			if(!empty($tmpstr)) $tmpstr.='||';
			$tmpstr.=$k.'=>'.$v;
		}
		$sortelement=new JieqiFormText($jieqiLang['article']['rule_sort_relation'], 'sortid', 60, 10000, htmlspecialchars($tmpstr, ENT_QUOTES));
		$sortelement->setIntro($jieqiLang['article']['rule_sort_note']);
		jieqi_getconfigs(JIEQI_MODULE_NAME, 'sort');
		$sortstr='';
		foreach($jieqiSort['article'] as $k=>$v){
			if(!empty($sortstr)) $sortstr.='||';
			$sortstr.=$v['caption'].'=>'.$k;
		}
		$sortelement->setDescription(sprintf($jieqiLang['article']['rule_sort_guide'], $sortstr));
		$collect_form->addElement($sortelement);

		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_article_keywords'], 'keyword', htmlspecialchars(jieqi_collectstop($jieqiCollect['keyword']), ENT_QUOTES), 5, 60));
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_article_intro'], 'intro', htmlspecialchars(jieqi_collectstop($jieqiCollect['intro']), ENT_QUOTES), 5, 60));
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_article_image'], 'articleimage', htmlspecialchars(jieqi_collectstop($jieqiCollect['articleimage']), ENT_QUOTES), 5, 60));
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_articleimage_filter'], 'filterimage', 60, 250, htmlspecialchars($jieqiCollect['filterimage'], ENT_QUOTES)));
		
		$indexelement=new JieqiFormTextArea($jieqiLang['article']['rule_articleindex_url'], 'indexlink', htmlspecialchars(jieqi_collectstop($jieqiCollect['indexlink']), ENT_QUOTES), 5, 60);
		$indexelement->setIntro($jieqiLang['article']['rule_articleindex_note']);
		$collect_form->addElement($indexelement);
		
		$fullelement=new JieqiFormTextArea($jieqiLang['article']['rule_article_full'], 'fullarticle', htmlspecialchars(jieqi_collectstop($jieqiCollect['fullarticle']), ENT_QUOTES), 5, 60);
		$fullelement->setIntro($jieqiLang['article']['rule_articlefull_note']);
		$collect_form->addElement($fullelement);


		$collect_form->addElement(new JieqiFormLabel('', $jieqiLang['article']['collect_rule_index']));
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_index_url'], 'urlindex', 60, 250, htmlspecialchars($jieqiCollect['urlindex'], ENT_QUOTES)), true);
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_volume_name'], 'volume', htmlspecialchars(jieqi_collectstop($jieqiCollect['volume']), ENT_QUOTES), 5, 60));
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_chapter_name'], 'chapter', htmlspecialchars(jieqi_collectstop($jieqiCollect['chapter']), ENT_QUOTES), 5, 60), true);
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_chapter_id'], 'chapterid', htmlspecialchars(jieqi_collectstop($jieqiCollect['chapterid']), ENT_QUOTES), 5, 60), true);

		$collect_form->addElement(new JieqiFormLabel('', $jieqiLang['article']['collect_rule_chapter']));
		$collect_form->addElement(new JieqiFormText($jieqiLang['article']['rule_chapter_url'], 'urlchapter', 60, 250, htmlspecialchars($jieqiCollect['urlchapter'], ENT_QUOTES)), true);
		$collect_form->addElement(new JieqiFormTextArea($jieqiLang['article']['rule_chapter_content'], 'content', htmlspecialchars(jieqi_collectstop($jieqiCollect['content']), ENT_QUOTES), 5, 60), true);
		
		$filterelement=new JieqiFormTextArea($jieqiLang['article']['rule_chapter_filter'], 'contentfilter', htmlspecialchars(jieqi_collectstop($jieqiCollect['contentfilter']), ENT_QUOTES), 5, 60);
		$filterelement->setIntro($jieqiLang['article']['rule_chapterfilter_note']);
		$collect_form->addElement($filterelement);
		
		$replaceelement=new JieqiFormTextArea($jieqiLang['article']['rule_chapter_replace'], 'contentreplace', htmlspecialchars(jieqi_collectstop($jieqiCollect['contentreplace']), ENT_QUOTES), 5, 60);
		$replaceelement->setIntro($jieqiLang['article']['rule_chapterreplace_note']);
		$collect_form->addElement($replaceelement);
		
		$collectimage=new JieqiFormRadio($jieqiLang['article']['rule_or_articleimage'], 'collectimage', $jieqiCollect['collectimage']);
		$collectimage->addOption('1', LANG_YES);
		$collectimage->addOption('0', LANG_NO);
		$collect_form->addElement($collectimage);
		
		//ͼƬ����
		$collect_form->addElement(new JieqiFormLabel('', $jieqiLang['article']['collect_rule_imagetranslate']));
		
		$imagetranslate=new JieqiFormRadio($jieqiLang['article']['rule_or_imagetranslate'], 'imagetranslate', intval($jieqiCollect['imagetranslate']));
		$imagetranslate->addOption('1', LANG_YES);
		$imagetranslate->addOption('0', LANG_NO);
		$imagetranslate->setDescription($jieqiLang['article']['rule_or_imagetranslatedec']);
		$collect_form->addElement($imagetranslate);
		
		$addimagewater=new JieqiFormRadio($jieqiLang['article']['rule_or_imagewater'], 'addimagewater', intval($jieqiCollect['addimagewater']));
		$addimagewater->addOption('1', LANG_YES);
		$addimagewater->addOption('0', LANG_NO);
		$addimagewater->setDescription($jieqiLang['article']['rule_or_imagewaterdec']);
		$collect_form->addElement($addimagewater);
		
		$imagebgcolor=new JieqiFormText($jieqiLang['article']['rule_image_bgcolor'], 'imagebgcolor', 60, 20, htmlspecialchars($jieqiCollect['imagebgcolor'], ENT_QUOTES));
		$imagebgcolor->setDescription($jieqiLang['article']['rule_image_bgcolordec']);
		$collect_form->addElement($imagebgcolor);
		
		$imageareaclean=new JieqiFormText($jieqiLang['article']['rule_image_areaclean'], 'imageareaclean', 60, 1000, htmlspecialchars($jieqiCollect['imageareaclean'], ENT_QUOTES));
		$imageareaclean->setDescription($jieqiLang['article']['rule_image_areacleandec']);
		$collect_form->addElement($imageareaclean);
		
		$imagecolorclean=new JieqiFormText($jieqiLang['article']['rule_image_colorclean'], 'imagecolorclean', 60, 1000, htmlspecialchars($jieqiCollect['imagecolorclean'], ENT_QUOTES));
		$imagecolorclean->setDescription($jieqiLang['article']['rule_image_colorcleandec']);
		$collect_form->addElement($imagecolorclean);


		$collect_form->addElement(new JieqiFormHidden('action', 'edit'));
		$collect_form->addElement(new JieqiFormHidden('config', htmlspecialchars($_REQUEST['config'], ENT_QUOTES)));
		$collect_form->addElement(new JieqiFormButton('&nbsp;', 'submit', $jieqiLang['article']['rule_save_edit'], 'submit'));

		$jieqiTpl->assign('jieqi_contents', '<br />'.$collect_form->render(JIEQI_FORM_MIDDLE).'<br />');
		include_once(JIEQI_ROOT_PATH.'/admin/footer.php');
		break;
}
?>