<?php 
/**
 * ɾ��Ȧ������
 *
 * ɾ��Ȧ������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    group
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: tab $
 */
define('JIEQI_MODULE_NAME', 'group');
require_once('../../global.php');
jieqi_loadlang('topic',JIEQI_MODULE_NAME);
$gid = intval($_REQUEST['g']);
if($gid == 0){
	header("Location: ".JIEQI_URL);
}
if(empty($_REQUEST['pid']) || !is_numeric($_REQUEST['pid'])) jieqi_printfail(LANG_ERROR_PARAMETER);
jieqi_loadlang('post', JIEQI_MODULE_NAME);
include_once(JIEQI_ROOT_PATH.'/modules/'.JIEQI_MODULE_NAME.'/header.php');
//���Ȩ��
include_once("include/functions.php");
setpower($gid);


if(!$allowmantopic){
	jieqi_printfail($jieqiLang['group']['noper_delete_post']);
}

//��ѯ���Ӽ�¼
jieqi_includedb();
$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
$criteria=new CriteriaCompo(new Criteria('p.postid', $_REQUEST['pid']));
$criteria->setTables(jieqi_dbprefix('group_posts').' p LEFT JOIN '.jieqi_dbprefix('group_group').' f ON p.ownerid=f.gid');
$query->queryObjects($criteria);
$post=$query->getObject();
unset($criteria);
if(!$post) jieqi_printfail($jieqiLang['group']['post_not_exists']);

$tid=$post->getVar('topicid');
$fid=$post->getVar('forumid');

jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$jieqiConfigs['group']['attachdir'] = $groupUserfile['attachdir'];
//����������ɾ���������Ӽ��ظ�
if($post->getVar('istopic')==1){
	//ɾ������
	if(!jieqi_forum_deltopic($post->getVar('topicid'), $post->getVar('forumid'), $jieqiConfigs['group'])) jieqi_printfail($jieqiLang['group']['delete_post_failure']);
	$group_handler->updatefields('topicnum=topicnum-1',$criteria);
	jieqi_jumppage($jieqiModules['group']['url'].'/topiclist.php?g='.$gid, LANG_DO_SUCCESS, $jieqiLang['group']['delete_post_success']);
}else{
	//ɾ���ظ���
	if(!jieqi_forum_delpost($post->getVar('postid'), $post->getVar('topicid'), $post->getVar('forumid'), $jieqiConfigs['group'])) jieqi_printfail($jieqiLang['group']['delete_post_failure']);
	$group_handler->updatefields('gtopics=gtopics-1',$criteria);
	jieqi_jumppage($jieqiModules['group']['url'].'/topic.php?g='.$gid.'&tid='.$post->getVar('topicid'), LANG_DO_SUCCESS, $jieqiLang['group']['delete_post_success']);
}
/**
 * ɾ����������
 * 
 * @param      int         $tid ��������id
 * @param      int         $fid ��̳ID
 * @param      array       $configs ���ò���
 * @access     public
 * @return     bool
 */
function jieqi_forum_deltopic($tid, $fid, $configs){
	global $query;
	if(!is_a($query, 'JieqiQueryHandler')){
		jieqi_includedb();
		$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
	}
	
	//ɾ������
	$sql="DELETE FROM ".jieqi_dbprefix('group_topics')." WHERE topicid=".intval($tid);
	$res=$query->execute($sql);
	if(!$res) return false;

	//ͳ�ƻظ��ˣ����ڴ������
	$posterary=array();
	if(!empty($configs['scoretopic']) || !empty($configs['scorereply'])){
		include_once($GLOBALS['jieqiModules']['group']['path'].'/class/groupposts.php');
		$post_handler =& JieqiGrouppostHandler::getInstance('JieqiGrouppostHandler');
		$criteria = new CriteriaCompo(new Criteria('topicid', intval($tid)));
		$post_handler->queryObjects($criteria);
		while($postobj = $post_handler->getObject()){
			$posterid = intval($postobj->getVar('posterid'));
			$tmpscore = intval($postobj->getVar('istopic','n')) == 0 ? intval($configs['scorereply']) : intval($configs['scoretopic']);
			if(isset($posterary[$posterid])) $posterary[$posterid] += $tmpscore;
			else $posterary[$posterid] = $tmpscore;
		}
	}
	//ɾ���ظ�
	$sql="DELETE FROM ".jieqi_dbprefix('group_posts')." WHERE topicid=".intval($tid);
	$res=$query->execute($sql);
	$postnum=intval($query->db->getAffectedRows());
	if(!$res) return false;
	else{
		$sql="UPDATE ".jieqi_dbprefix('group_group')." SET gtopics=gtopics-1 WHERE gid=".intval($gid);
		$query->execute($sql);
		//�����û�����
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
		if(!empty($posterary)){
			foreach($posterary as $pid=>$pscore){
				$users_handler->changeScore($pid, $pscore, false);
			}
		}

		include_once($GLOBALS['jieqiModules']['group']['path'].'/class/groupattachs.php');
		$attachs_handler =& JieqiGroupattachsHandler::getInstance('JieqiGroupattachsHandler');
		$criteria=new CriteriaCompo(new Criteria('topicid', $tid));
		$attachs_handler->queryObjects($criteria);
		while($attchobj=$attachs_handler->getObject()){
			//ɾ������
			$afname = jieqi_uploadpath($configs['attachdir'], 'group').'/'.date('Ymd',$attchobj->getVar('uptime','n')).'/'.$attchobj->getVar('postid','n').'_'.$attchobj->getVar('attachid','n').'.'.$attchobj->getVar('postfix','n');
			if(file_exists($afname)) jieqi_delfile($afname);
		}
		//ɾ���������ݿ�
		$attachs_handler->delete($criteria);
	}
	return true;
}

/**
 * ɾ���ظ�����
 * 
 * @param      int         $pid ����id
 * @param      int         $tid ��������id
 * @param      int         $fid ��̳ID
 * @param      array       $configs ���ò���
 * @access     public
 * @return     bool
 */
function jieqi_forum_delpost($pid, $tid, $fid, $configs){
	global $query;
	if(!is_a($query, 'JieqiQueryHandler')){
		jieqi_includedb();
		$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
	}
	$sql="DELETE FROM ".jieqi_dbprefix('group_posts')." WHERE postid=".intval($pid);
	$res=$query->execute($sql);
	if(!$res) return false;
	else{
		//�������ӵĻظ���
		$sql="UPDATE ".jieqi_dbprefix('group_topics')." SET replies=replies-1 WHERE topicid=".intval($tid);
		$query->execute($sql);
		//�����û�����
		if(!empty($configs['scorereply'])){
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
			$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
			$users_handler->changeScore($pid, $configs['scorereply'], false);
		}
		include_once($GLOBALS['jieqiModules']['group']['path'].'/class/groupattachs.php');
		$attachs_handler =& JieqiGroupattachsHandler::getInstance('JieqiGroupattachsHandler');
		$criteria=new CriteriaCompo(new Criteria('postid', $pid));
		$attachs_handler->queryObjects($criteria);
		while($attchobj=$attachs_handler->getObject()){
			//ɾ������
			$afname = jieqi_uploadpath($configs['attachdir'], 'group').'/'.date('Ymd',$attchobj->getVar('uptime','n')).'/'.$attchobj->getVar('postid','n').'_'.$attchobj->getVar('attachid','n').'.'.$attchobj->getVar('postfix','n');
			if(file_exists($afname)) jieqi_delfile($afname);
		}
		//ɾ���������ݿ�
		$attachs_handler->delete($criteria);
	}
	return true;
}

?>