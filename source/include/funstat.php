<?php
/**
 * ������Ƽ���ͶƱ��ͳ�ƺ���
 *
 * ������Ƽ���ͶƱ��ͳ�ƺ���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funstat.php 286 2008-12-23 03:04:17Z juny $
 */

/**
 * ��鱾�ε��ʱ����Ч�ĵ��
 * 
 * @param      int         $id �������ID
 * @param      string      $vname �����־������
 * @param      bool        $save �Ƿ��¼���ε����Ĭ���ǣ�
 * @access     public
 * @return     bool
 */
function jieqi_visit_valid($id, $vname, $save=true){
	if(!is_numeric($id) || intval($id) <= 0) return false;
	$sname = '';
	if(isset($_SESSION[$vname])) $arysession=unserialize($_SESSION[$vname]);
	else $arysession=array();
	if(!is_array($arysession)) $arysession=array();

	$tmpary=array();
	$arycookie=array();
	if(isset($_COOKIE['jieqiVisitId'])){
		$tmpary = jieqi_strtosary($_COOKIE['jieqiVisitId'], '=', ',');
		if(isset($tmpary[$vname])) $arycookie = explode('|', $tmpary[$vname]);
	}
	if(!is_array($arycookie)) $arycookie=array();
	if(in_array($id,$arysession) || in_array($id,$arycookie)) return false;

	if($save){
		if(!in_array($id,$arysession) && isset($_SESSION)){
			$arysession[]=$id;
			$_SESSION[$vname]=serialize($arysession);
		}
		if(!in_array($id,$arycookie)){
			$arycookie[]=$id;
			$tmpary[$vname] = implode('|', $arycookie);
			setcookie('jieqiVisitId', jieqi_sarytostr($tmpary, '=', ','), JIEQI_NOW_TIME+3600, '/',  JIEQI_COOKIE_DOMAIN, 0);
		}
	}
	return true;
}

/**
 * ���ص��ͳ�����飬֧�ֵ������
 * 
 * @param      int         $id �������ID
 * @param      string      $vname �����־������
 * @param      int         $lastvisit ��һ�θ��·���ͳ��ʱ�䣨��Ҫ��������ͳ��ʱ���õ���
 * @access     public
 * @return     mixed       ������汾���������false�����򷵻����飬����array('1'=>array('visitnum'=>2, 'lastvisit'=>'12345678'), '5'=>array('visitnum'=>1, 'lastvisit'=>'12345678')),����ļ�ֵ��ʾ��¼ID��visitnum��ʾ�������˼��Σ�lastvisit�������·���ͳ�Ƶ�ʱ��
 */
function jieqi_visit_ids($id, $vname, $lastvisit=-1){
	if(!is_numeric($id) || intval($id) <= 0) return false;
	if(!preg_match('/^\w+$/is', $vname)) return false;
	$vname = strtolower($vname);
	$ret=array();
	if (JIEQI_ENABLE_CACHE){
		$logfile = JIEQI_CACHE_PATH.'/cachevars/cachevisit/'.$vname.'.php';
		jieqi_checkdir(dirname($logfile), true);
		//���û��棬�ٷ�֮һ������»���
		if(rand(1, 100) == 1) {
			$visitary = @file($logfile);
			if($fp = @fopen($logfile, 'w')) @fclose($fp);
			$visitary[] = $lastvisit >= 0 ? $id.'|'.$lastvisit : $id;
			foreach($visitary as $v){
				$v=trim($v);
				$tmpary=explode('|', $v);
				$tmpary[0]=intval($tmpary[0]);
				if(!empty($tmpary[0])){
					if(key_exists($tmpary[0], $ret)) $ret[$tmpary[0]]['visitnum']++;
					else $ret[$tmpary[0]]['visitnum']=1;
					if(isset($tmpary[1])) $ret[$tmpary[0]]['lastvisit']=intval($tmpary[1]);
					else $ret[$tmpary[0]]['lastvisit']=-1;
				}
			}
		}else{
			if($fp = @fopen($logfile, 'a')) {
				@flock($filenum, LOCK_EX);
				if($lastvisit >= 0)	@fwrite($fp, $id.'|'.$lastvisit."\r\n");
				else @fwrite($fp, $id."\r\n");
				@flock($filenum, LOCK_UN);
				@fclose($fp);
				@chmod($logfile, 0777);
			}
		}
	}else{
		$ret[$id]=array('visitnum'=>1, 'lastvisit'=>$lastvisit);
	}
	return empty($ret) ? false : $ret;
}


/**
 * ͨ�õĵ��ͳ�ƴ���
 * 
 * ���ж��Ƿ��ظ��ĵ����Ȼ�����Ƿ񻺴�����Ȼ����µ����
 * 
 * @param      int         $id �������ID
 * @param      string      $table ����������
 * @param      string      $fieldstat ��������ֶ���
 * @param      string      $fieldid ID���ֶ���
 * @param      object      $query ��ѯ���󣬲����ڻ��Զ�����
 * @param      int         $addnum ÿ�ε���Ӽ����������Ĭ��1
 * @access     public
 * @return     bool
 */
function jieqi_visit_stat($id, $table, $fieldstat, $fieldid, $query=NULL, $addnum=1){
	if(jieqi_visit_valid($id, $table)){
		if($ids = jieqi_visit_ids($id, $table)){
			global $query;
			if(!is_a($query, 'JieqiQueryHandler')){
				jieqi_includedb();
				$query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
			}
			foreach($ids as $k=>$v){
				$v['visitnum'] = intval($v['visitnum'] * $addnum);
				$sql='UPDATE '.$table.' SET '.$fieldstat.'='.$fieldstat.'+'.$v['visitnum'].' WHERE '.$fieldid.'='.intval($k);
				$query->execute($sql);
			}
		}
		return true;
	}else{
		return false;
	}
}

?>