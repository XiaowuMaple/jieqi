<?php 
/**
 * ���url·����غ���
 *
 * ���url·����غ���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser.php 243 2008-11-28 02:59:57Z juny $
 */

/**
 * �û���Ϣ���url
 * 
 * @param      int         $id �û�id
 * @param      string      $type ҳ������ 'info' - ������Ϣҳ, 'space' - ���˿ռ�ҳ(Ĭ��)
 * @access     public
 * @return     string
 */
function jieqi_url_system_user($id, $type=''){
	global $jieqiModules;
	switch($type){
		case 'info':
			return JIEQI_USER_URL.'/userinfo.php?id='.$id;
			break;
		case 'page':
			return JIEQI_USER_URL.'/userpage.php?uid='.$id;
			break;
		case 'space':
		default:
			return !empty($jieqiModules['space']['publish']) ? $jieqiModules['space']['url'].'/space.php?uid='.$id : JIEQI_USER_URL.'/userpage.php?uid='.$id;
			break;
	}
}

/**
 * �����û�ͷ��ͼƬurl
 * 
 * @param      int         $uid �û�id
 * @param      int         $size �������� 'd'=>ͼƬĿ¼�� 'l'=>��ͼ(Ĭ��)�� 's'=>Сͼ, 'i'=>ͼ��, 'a'=>����ǰ�漸���ϲ�������
 * @param      int         $type ͼƬ���� -1 ϵͳ�Զ��жϣ�0 ��ͷ�� 1=>'.gif', 2=>'.jpg', 3=>'.jpeg', 4=>'.png', 5=>'.bmp'
 * @param      bool        $retdft ��ͷ���Ƿ񷵻�Ĭ��ͷ���ַ��true-�ǣ�Ĭ�ϣ���false-��
 * @access     public
 * @return     mixed
 */
function jieqi_url_system_avatar($uid, $size = 'l', $type = -1, $retdft = true){
	global $jieqiConfigs;
	global $jieqi_image_type;
	if(!isset($jieqiConfigs['system'])) jieqi_getconfigs('system', 'configs');
	if(empty($jieqi_image_type)) $jieqi_image_type=array(1=>'.gif', 2=>'.jpg', 3=>'.jpeg', 4=>'.png', 5=>'.bmp');
	$base_avatar = '';
	if($uid == 0 || $type == 0 || ($type > 0 && !isset($jieqi_image_type[$type]))){
		if($retdft){
			$base_avatar = JIEQI_USER_URL.'/images';
			$type = 2;
			$uid = 'noavatar';
		}else{
			return false;
		}
	}elseif($type < 0){
		return JIEQI_USER_URL.'/avatar.php?uid='.$uid.'&size='.$size;
		//��������òü����ܣ�ͳһͷ��ͼƬ .jpg������û�и�ֵͷ�����;��ó������
		//if(function_exists('gd_info') && $jieqiConfigs['system']['avatarcut']) $type = 2;
		//else return JIEQI_USER_URL.'/avatar.php?uid='.$uid.'&size='.$size;
	}
	$prefix = $jieqi_image_type[$type];
	if(empty($base_avatar)) $base_avatar = jieqi_uploadurl($jieqiConfigs['system']['avatardir'], $jieqiConfigs['system']['avatarurl'], 'system').jieqi_getsubdir($uid);
	switch($size){
		case 'd':
			return $base_avatar;
			break;
		case 'l':
			return $base_avatar.'/'.$uid.$prefix;
			break;
		case 's':
			return $base_avatar.'/'.$uid.'s'.$prefix;
			break;
		case 'i':
			return $base_avatar.'/'.$uid.'i'.$prefix;
			break;
		case 'a':
		default:
			return array('l'=>$base_avatar.'/'.$uid.$prefix, 's'=>$base_avatar.'/'.$uid.'s'.$prefix, 'i'=>$base_avatar.'/'.$uid.'i'.$prefix, 'd'=>$base_avatar);
			break;
	}

}


/**
 * ����PATH_INFOα��̬URL
 * 
 * @param      string      $url Ĭ�ϵĶ�̬url
 * @param      string      $prefix α��̬��ַ��׺���� .html��Ĭ��Ϊ��
 * @access     public
 * @return     string
 */
function jieqi_url_system_pathinfo($url, $prefix=''){
	if(!in_array($prefix, array('.html', '.htm'))) $prefix='';
	$pos=strpos($url, '?');
	if($pos > 0){
		$parmary = explode('&', substr($url, $pos+1));
		$pstr='';
		foreach($parmary as $v){
			$tmpary = explode('=', $v);
			if(isset($tmpary[1])) $pstr.='/'.$tmpary[0].'/'.$tmpary[1];
		}
		return substr($url, 0, $pos).$pstr.$prefix;
	}else{
		return $url;
	}
}

?>