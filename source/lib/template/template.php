<?php
/**
 * ģ������
 *
 * ģ������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: template.php 332 2009-02-23 09:15:08Z juny $
 */

if (!defined('TEMPLATE_DIR')) {
	define('TEMPLATE_DIR', dirname(__FILE__) . '/');
}
$jieqiTset = array(); //��ʼ��ģ���������

/**
 * �ַ�����ȡ����
 * 
 * @param      string      $text ������ַ���
 * @param      int         $length ��ȡ�ĳ���
 * @param      string      $trimmarker ��ȡ��ĩβ����
 * @param      int         $html �ַ����Ƿ�html����
 * @access     public
 * @return     string
 */
function truncate($str, $length=10, $trimmarker='', $html=1){
	$start=0;
	if($html && (strpos($str, '<') !== false || strpos($str, '&') !== false)){
		$tmpstr = ''; //���ص��ַ���
		$tmplen = 0; //�����ַ�������
		$cutlen = $length - strlen($trimmarker); //Ҫ��ȡ���ַ���
		$len = strlen($str); //ԭ�ַ�������
		$i=0; //ԭ�ַ���ָ��
		$s=0; //Դ�ַ�����ʼ���ֲ���ȡ��ָ��
		$htmltag = ''; //html�����ʱ�洢
		$htmlflag = 1; //html������� 1 - <>, 2 - &nbsp;
		while($i<$len && $tmplen<$cutlen){
			$add = 1;
			if($str[$i] == '<')	$htmlflag = 1;
			elseif($str[$i] == '&') $htmlflag = 2;
			if($htmlflag > 0){
				$htmltag .= $str[$i];
				if(($htmlflag == 1 && $str[$i] == '>') || ($htmlflag == 2 && $str[$i] == ';')){
					if($s >= $start) $tmpstr .= $htmltag;
					$htmlflag = 0;
					$htmltag = '';
				}
			}else{
				if (ord($str[$i]) > 0x80) {
					if($s >= $start){
						$tmpstr .= $str[$i].$str[$i+1];
						$tmplen += 2;
					}
					$add = 2;
				}elseif($s >= $start){
					$tmpstr .= $str[$i];
					$tmplen ++;
				}
				$s+=$add;
			}
			$i+=$add;
		}
		if($i<$len) $tmpstr.= $trimmarker;
		return $tmpstr;
	}else{
		return jieqi_substr($str, $start, $length, $trimmarker);
	}
}

/**
 * �������㺯��
 * 
 * @param      string      $str ������ַ���
 * @param      string      $opt ������
 * @param      mixed       $val ������ֵ
 * @param      int         $front ������ֵ�ں��滹��ǰ��
 * @access     public
 * @return     string
 */
function arithmetic($str, $opt='', $val=0, $front=0){
	$optary=array('+', '-', '*', '/', '%');
	if(is_numeric($str) && is_numeric($val) && in_array($opt, $optary)){
		if(!$front) eval('$ret = $str '.$opt.' $val;');
		else eval('$ret = $val '.$opt.' $str;');
		return $ret;
	}else{
		return $str;
	}
}

/**
 * ȡ����Ŀ¼
 * 
 * @param      int         $id ����ID
 * @access     public
 * @return     string
 */
function subdirectory($id){
	return jieqi_getsubdir($id);
}

/**
 * ���������ڻ���Ϊ��ʹ��Ĭ��ֵ
 * 
 * @param      string      $str ����ı���
 * @param      string      $val �滻��ֵ
 * @access     public
 * @return     string
 */
function defaultval($str,$val){
	if (!isset($str) || empty($str) || (is_array($str) && count($str) == 0)) $str = $val;
	return $str;
}

/**
 * ģ����
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiTpl{
	var $template_dir    =  'templates';  //ģ��Ĭ��Ŀ¼
	var $compile_dir     =  'compiled';   //�����ļ�Ŀ¼
	var $compile_check   =  true;  //����Ƿ���Ҫ���±���
	var $force_compile   =  false;  //ÿ��ǿ�Ʊ���
	var $caching         =  0;  //cacheģʽ 0-��cache 1��ʹ��Ĭ�ϵ�cache_lifetime
	var $cache_dir       =  'cache';  //cache�ļ�����Ŀ¼
	var $cache_lifetime  =  3600;  //cache����ʱ�䣨�룩 0��ÿ�ζ���������cache -1=cache��������
	var $cache_overtime  =  0;  //��ʱʱ�䣬�����������һ��int�͵�ʱ�䣬�����ʱ��������ʱ�����Ϊ����ʧЧ��Ĭ��0��ʾ������������
	var $left_delimiter  =  '{\?';  //ģ������
	var $right_delimiter =  '\?}';  //ģ���ұ��
	var $left_comments  =  '{\*';  //ע������
	var $right_comments =  '\*}';  //ע���ұ��
	var $compile_id      = NULL;  //���ñ���ID��ͬһģ��������ò�ͬid����Դ�������Ժ���Ч
	//********************************************************
	//���ò�����ɣ������ڲ�����
	var $_tpl_vars       = array();  //ģ�����
	var $_tmp_vars       = array(); //�����ģ���������ʱ����
	var $_file_perms     = 0777;  //Ĭ���ļ���дȨ��
	var $_dir_perms      = 0777;  //Ĭ��Ŀ¼Ȩ��
	var $_compile_prefix = '.php'; //�����ļ���׺
	var $_include_prefix = '.inc.php'; //��������ļ���׺

	/**
	 * ���캯��
	 * 
	 * @param      void       
	 * @access     private
	 * @return     void
	 */
	function JieqiTpl(){
		global $jieqiModules;
		$this->template_dir = JIEQI_ROOT_PATH;
		$this->cache_dir = JIEQI_CACHE_PATH;
		$this->compile_dir = JIEQI_COMPILED_PATH;
		if (JIEQI_USE_CACHE) $this->caching = 1;
		else $this->caching = 0;
		$this->cache_lifetime = JIEQI_CACHE_LIFETIME;
		$this->assign(array('jieqi_url' => JIEQI_URL, 'jieqi_rootpath' => JIEQI_ROOT_PATH, 'jieqi_charset' => JIEQI_CHAR_SET, 'jieqi_version' => JIEQI_VERSION, 'jieqi_main_url' => JIEQI_MAIN_URL, 'jieqi_user_url' => JIEQI_USER_URL, 'jieqi_local_url' => JIEQI_LOCAL_URL, 'jieqi_theme' => JIEQI_THEME_NAME, 'jieqi_themeurl' => JIEQI_URL.'/themes/'.JIEQI_THEME_NAME.'/',  'jieqi_sitename' => JIEQI_SITE_NAME, 'jieqi_email' => JIEQI_CONTACT_EMAIL, 'meta_keywords' => JIEQI_META_KEYWORDS, 'meta_description' => JIEQI_META_DESCRIPTION, 'meta_copyright' => JIEQI_META_COPYRIGHT, 'meta_author' => 'http://www.jieqi.com (jieqi cms)', 'jieqi_host'=>JIEQI_LOCAL_HOST, 'jieqi_time'=>JIEQI_NOW_TIME, 'egoldname'=>JIEQI_EGOLD_NAME, 'fun'=>NULL));  //Ĭ�ϲ���
		if(defined('JIEQI_SILVER_USAGE') && JIEQI_SILVER_USAGE==1) $this->assign('jieqi_silverusage', 1);
		else $this->assign('jieqi_silverusage', 0);
		if(!empty($_REQUEST['ajax_request'])) $this->assign('ajax_request', 1);
		else $this->assign('ajax_request', 0);
		$this->assign_by_ref('jieqi_modules', $jieqiModules);
	}

	/**
	 * ����һ��ʵ��
	 * 
	 * @param      void
	 * @access     public
	 * @return     object
	 */
	function &getInstance(){
		static $instance;
		if (!isset($instance)) $instance = new JieqiTpl();
		return $instance;
	}
	
	/**
	 * ���cacheģʽ 0 ������ 1 �Զ����� 2 ���β����浫�Ǳ��滺��
	 * 
	 * @param      int         $num
	 * @access     public
	 * @return     void
	 */
	function getCaching(){
		return $this->caching;
	}

	/**
	 * ����cacheģʽ 0 ������ 1 �Զ����� 2 ���β����浫�Ǳ��滺��
	 * 
	 * @param      int         $num
	 * @access     public
	 * @return     void
	 */
	function setCaching($num=0){
		$this->caching = (int)$num;
	}
	
	/**
	 * ���cache�����ڣ���λ����
	 * 
	 * @param      int         $num
	 * @access     public
	 * @return     void
	 */
	function getCacheTime(){
		return $this->cache_lifetime;
	}
		

	/**
	 * ����cache�����ڣ���λ����
	 * 
	 * @param      int         $num
	 * @access     public
	 * @return     void
	 */
	function setCacheTime($num=0){
		$this->cache_lifetime = (int)$num;
	}
	
	/**
	 * ���cache��ʱʱ��
	 * 
	 * @param      int         $num
	 * @access     public
	 * @return     void
	 */
	function getOverTime(){
		return $this->cache_overtime;
	}
		

	/**
	 * ����cache��ʱʱ��
	 * 
	 * @param      int         $num
	 * @access     public
	 * @return     void
	 */
	function setOverTime($num=0){
		$this->cache_overtime = (int)$num;
	}

	/**
	 * ģ�������ֵ(�����ǵ�������������)
	 * 
	 * @param      string      $tpl_var ������
	 * @param      mixed       $value ����ֵ
	 * @access     public
	 * @return     void
	 */
	function assign($tpl_var, $value = NULL){
		if (is_array($tpl_var)){
			foreach ($tpl_var as $key => $val) {
				if ($key != '') {
					$this->_tpl_vars[$key] = $val;
				}
			}
		} else {
			if ($tpl_var != '')
			$this->_tpl_vars[$tpl_var] = $value;
		}
	}

	/**
	 * ���ø�ֵ
	 * 
	 * @param      string      $tpl_var ������
	 * @param      mixed       $value ����ֵ
	 * @access     public
	 * @return     void
	 */
	function assign_by_ref($tpl_var, &$value){
		if ($tpl_var != '')
		$this->_tpl_vars[$tpl_var] = &$value;
	}

	/**
	 * ���ĳ������
	 * 
	 * @param      string      $tpl_var ������
	 * @access     public
	 * @return     void
	 */
	function clear_assign($tpl_var){
		if (is_array($tpl_var)){
			foreach ($tpl_var as $curr_var){
				unset($this->_tpl_vars[$curr_var]);
			}
		}else{
			unset($this->_tpl_vars[$tpl_var]);
		}
	}

	/**
	 * ������и�ֵ
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function clear_all_assign(){
		$this->_tpl_vars = array();
	}

	/**
	 * ������и�ֵ
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function get_all_assign(){
		return $this->_tpl_vars;
	}

	/**
	 * �������и�ֵ
	 * 
	 * @param      array      $vars
	 * @access     public
	 * @return     void
	 */
	function set_all_assign($vars){
		$this->_tpl_vars = $vars;
	}

	/**
	 * ���ģ���cache
	 * 
	 * @param      string      $tpl_file ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @access     public
	 * @return     void
	 */
	function clear_cache($tpl_file = NULL, $cache_id = NULL, $compile_id = NULL){
		global $jieqiCache;
		if (!isset($compile_id)) $compile_id = $this->compile_id;
		if (!isset($tpl_file)) $compile_id = NULL;
		$_auto_id = $this->_get_auto_id($cache_id, $compile_id);
		$_tname = $this->_get_auto_filename($this->cache_dir, $tpl_file, $_auto_id);
		$jieqiCache->delete($_tname);
	}

	/**
	 * �������cache
	 * 
	 * @access     public
	 * @return     void
	 */
	function clear_all_cache(){
		global $jieqiCache;
		$jieqiCache->clear();
	}

	/**
	 * �ж�ĳһģ���Ƿ���cache
	 * 
	 * @param      string      $tpl_file ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @param      int         $cache_time ����ʱ��
	 * @param      bool        $return_value �Ƿ񷵻ػ�������
	 * @access     public
	 * @return     mixed
	 */
	function is_cached($tpl_file, $cache_id = NULL, $compile_id = NULL, $cache_time = NULL, $over_time = NULL, $return_value = false){
		global $jieqiCache;
		//if (!$this->caching) return false;
		
		if(!JIEQI_USE_CACHE) return false;
		if ($this->force_compile) return false;

		if (!isset($compile_id)) $compile_id = $this->compile_id;
		$_auto_id = $this->_get_auto_id($cache_id, $compile_id);
		$_cache_file = $this->_get_auto_filename($this->cache_dir, $tpl_file, $_auto_id);
		
		if(is_null($cache_time)) $cache_time = $this->cache_lifetime;
		if(is_null($over_time)) $over_time = $this->cache_overtime;
		if(empty($over_time)) $over_time = filemtime($tpl_file);
		
		if(!$return_value){
			return $jieqiCache->iscached($_cache_file, $cache_time, $over_time);
		}else{
			return $jieqiCache->get($_cache_file, $cache_time, $over_time);
		}
	}
	
	/**
	 * ��û���������ļ�����
	 * 
	 * @param      string      $tpl_file ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @access     public
	 * @return     string
	 */
	function get_cachekey($tpl_file, $cache_id = NULL, $compile_id = NULL){
		return $this->_get_auto_filename($this->cache_dir, $tpl_file, $this->_get_auto_id($cache_id, $compile_id));
	}

	/**
	 * ��û����ʱ��
	 * 
	 * @param      string      $tpl_file ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @access     public
	 * @return     int
	 */
	function get_cachedtime($tpl_file, $cache_id = NULL, $compile_id = NULL){
		global $jieqiCache;
		$cachefile = $this->_get_auto_filename($this->cache_dir, $tpl_file, $this->_get_auto_id($cache_id, $compile_id));
		return $jieqiCache->cachedtime($cachefile);
	}
	
	/**
	 * ˢ�»���ʱ��
	 * 
	 * @param      string      $tpl_file ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @access     public
	 * @return     int
	 */
	function update_cachedtime($tpl_file, $cache_id = NULL, $compile_id = NULL){
		global $jieqiCache;
		$cachefile = $this->_get_auto_filename($this->cache_dir, $tpl_file, $this->_get_auto_id($cache_id, $compile_id));
		return $jieqiCache->uptime($cachefile);
	}


	/**
	 * ���ĳһģ��ı����ļ��������ָ������������ļ�
	 * 
	 * @param      string      $tpl_file ģ����
	 * @param      string      $compile_id
	 * @access     public
	 * @return     string
	 */
	function clear_compiled_tpl($tpl_file = NULL, $compile_id = NULL){
		if (!isset($compile_id)) $compile_id = $this->compile_id;
		$_tname = $this->_get_auto_filename($this->compile_dir, $tpl_file, $compile_id);
		@unlink($_tname.'.php');
		@unlink($_tname.'.inc.php');
	}

	/**
	 * ģ���Ƿ����
	 * 
	 * @param      string      $tpl_file ģ����
	 * @access     public
	 * @return     bool
	 */
	function template_exists($tpl_file){
		return is_file($tpl_file);
	}

	/**
	 * ȡ��ģ�����
	 * 
	 * @param      string      $name ������
	 * @access     public
	 * @return     array
	 */
	function &get_template_vars($name=NULL){
		if(!isset($name)) {
			return $this->_tpl_vars;
		}
		if(isset($this->_tpl_vars[$name])) {
			return $this->_tpl_vars[$name];
		}
	}

	/**
	 * ��ñ����ļ��������ļ���
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $compile_id
	 * @access     public
	 * @return     mixed
	 */
	function get_compiled_inc($resource_name, $compile_id = NULL){
		$resource_dir=dirname($resource_name);
		if(empty($resource_dir) || $resource_dir=='.') $resource_name=$this->template_dir.'/'.$resource_name;
		if (!isset($compile_id)) $compile_id = $this->compile_id;
		$_template_compile_path = $this->_get_compile_path($resource_name);
		if ($this->_is_compiled($resource_name, $_template_compile_path)
		|| $this->_compile_resource($resource_name, $_template_compile_path)){
			$incfile = $_template_compile_path . $this->_include_prefix;
			if(is_file($incfile)) return $incfile;
			else return false;
		}
	}

	/**
	 * ���������ļ��������ļ�
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $compile_id
	 * @param      bool        $retfname �Ƿ񷵻��ļ�����Ĭ�ϲ�����ֱ��include
	 * @access     public
	 * @return     mixed
	 */
	function include_compiled_inc($resource_name, $compile_id = NULL){
		$incfile = $this->get_compiled_inc($resource_name, $compile_id);
		if(!empty($incfile)) include_once($incfile);
	}

	/**
	 * ���������ҳ��
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @access     public
	 * @return     string
	 */
	function display($resource_name, $cache_id = NULL, $compile_id = NULL, $cache_time = NULL, $over_time = NULL){
		$this->fetch($resource_name, $cache_id, $compile_id, $cache_time, $over_time, true);
	}

	/**
	 * ��ʾ�򷵻ش�����
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @param      bool        $display �Ƿ�ֱ����ʾ
	 * @access     public
	 * @return     string
	 */
	function fetch($resource_name, $cache_id = NULL, $compile_id = NULL, $cache_time = NULL, $over_time = NULL, $display = false){
		global $jieqiCache;
		$resource_dir=dirname($resource_name);
		if(empty($resource_dir) || $resource_dir=='.') $resource_name=$this->template_dir.'/'.$resource_name;
		if (!isset($compile_id)) $compile_id = $this->compile_id;
		$_template_compile_path = $this->_get_compile_path($resource_name);
		if(is_null($cache_time)) $cache_time = $this->cache_lifetime;
		if(is_null($over_time)) $over_time = $this->cache_overtime;
		
		//�����cache��ֱ�ӵ���cache
		if ($this->caching == 1) {
			$_template_results=$this->is_cached($resource_name, $cache_id, $compile_id, $cache_time, $over_time, true);
			if (false !== $_template_results) {
				$this->include_compiled_inc($resource_name, $compile_id);
				if ($display) {
					echo $_template_results;
					return true;
				} else {
					return $_template_results;
				}
			} else {
				if ($display) {
					header("Last-Modified: ".date('D, d M Y H:i:s', JIEQI_NOW_TIME).' GMT');
				}
			}
		}
		ob_start();
		if ($this->_is_compiled($resource_name, $_template_compile_path)
		|| $this->_compile_resource($resource_name, $_template_compile_path)){
			include($_template_compile_path . $this->_compile_prefix);
		}
		$_template_results = ob_get_contents();
		ob_end_clean();
		//����cache
		if ($this->caching) {
			$_auto_id = $this->_get_auto_id($cache_id, $compile_id);
			$_cache_file = $this->_get_auto_filename($this->cache_dir, $resource_name, $_auto_id);
			$jieqiCache->set($_cache_file, $_template_results, $cache_time, $over_time);
		}
		if ($display) {
			if (isset($_template_results)) echo $_template_results;
			return true;
		} else {
			if (isset($_template_results)) return $_template_results;
		}
	}

	/**
	 * ���ģ���ʽ�ַ��������Ĵ������ִ�н��
	 * 
	 * @param      string      $str ģ���ַ���
	 * @param      bool        $retcode ���ر����Ĵ��뻹�Ǳ����ִ�н����Ĭ�Ϸ��غ���
	 * @access     private
	 * @return     string
	 */
	function parse_string($str, $retcode = false){
		include_once(TEMPLATE_DIR . 'compiler.php');
		$template_compiler =& JieqiCompiler::getInstance();
		$template_compiler->_init_template_vars($this);
		$compiled_content = $template_compiler->_compile_file($str, false);
		if($retcode){
			return $compiled_content;
		}else{
			ob_start();
			eval($compiled_content);
			$results = ob_get_contents();
			ob_end_clean();
			return $results;
		}
	}

	/**
	 * �Ƿ���Ҫ����
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $compile_path ����·��
	 * @access     private
	 * @return     bool
	 */
	function _is_compiled($resource_name, $compile_path){
		$compile_path .= $this->_compile_prefix;
		if (!$this->force_compile && file_exists($compile_path)) {
			if (!$this->compile_check)  return true;
			else{
				if (!is_file($resource_name)) return false;
				if (filemtime($resource_name) <= filemtime($compile_path)) return true;
				else return false;
			}
		}else{
			return false;
		}
	}

	/**
	 * д�����ļ�
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $compile_path ����·��
	 * @access     private
	 * @return     bool
	 */
	function _compile_resource($resource_name, $compile_path){
		if (!is_file($resource_name)) {
			echo 'Template file ('.str_replace(JIEQI_ROOT_PATH, '', $resource_name).') is not exists!';
			return false;
		}
		$_resource_timestamp = filemtime($resource_name);
		$this->_compile_source($resource_name, $_compiled_content, $_compiled_include);

		$_compile_file = $compile_path.$this->_compile_prefix;
		if(jieqi_checkdir(dirname($_compile_file), true)){
			$ret = jieqi_writefile($_compile_file, $_compiled_content);
			if($ret && $_resource_timestamp) @touch($_compile_file, $_resource_timestamp);
		}

		if(strlen($_compiled_include) > 0){
			$_compile_infile = $compile_path.$this->_include_prefix;
			if(jieqi_checkdir(dirname($_compile_infile), true)){
				$ret1 = jieqi_writefile($_compile_infile, $_compiled_include);
				if($ret1 && $_resource_timestamp) @touch($_compile_infile, $_resource_timestamp);
			}
		}else{
			$this->_unlink($compile_path.$this->_include_prefix);
		}
		if($ret && $_resource_timestamp) @clearstatcache();
		return $ret;
	}

	/**
	 * ����ģ��
	 * 
	 * @param      string      $resource_name ģ����
	 * @param      string      $compiled_content ����������
	 * @param      string      $compiled_include ������Ҫinclude���ļ�
	 * @access     private
	 * @return     bool
	 */
	function _compile_source($resource_name, &$compiled_content, &$compiled_include){
		include_once(TEMPLATE_DIR . 'compiler.php');
		$template_compiler =& JieqiCompiler::getInstance();
		$template_compiler->_init_template_vars($this);
		$compiled_content = '<?php'."\r\n".$template_compiler->_compile_file($resource_name)."\r\n".'?>';
		$compiled_include = strlen($template_compiler->tplinc) == '' ? '' : '<?php'."\r\n".$template_compiler->tplinc."\r\n".'?>';

		return true;
	}

	/**
	 * ȡ�ñ���·��
	 * 
	 * @param      string      $resource_name ģ����
	 * @access     private
	 * @return     string
	 */
	function _get_compile_path($resource_name){
		return $this->_get_auto_filename($this->compile_dir, $resource_name,
		$this->compile_id);
	}

	/**
	 * ȡ��cache�������ļ�����
	 * 
	 * @param      string      $auto_base
	 * @param      string      $auto_source
	 * @param      string      $auto_id
	 * @access     private
	 * @return     string
	 */
	function _get_auto_filename($auto_base, $auto_source = NULL, $auto_id = NULL){
		//$auto_source = trim($auto_source);
		$_filename = basename($auto_source);
		$_dir = dirname($auto_source);
		$_return = str_replace(JIEQI_ROOT_PATH, $auto_base, $_dir);
		if($_return == $_dir){
			$_dir = trim(str_replace(array('\\',':'), array('/', ''), $_dir));
			if($dir[0] != '/') $_return=$auto_base.'/'.$_dir;
			else $_return=$auto_base.$_dir;
		}
		if(isset($auto_id) && strlen($auto_id) > 0) {
			$_return .= '/'.$_filename;
			if(is_numeric($auto_id)) $_return .= jieqi_getsubdir(intval($auto_id)).'/'.$auto_id;
			elseif(preg_match('/^\w+$/', $auto_id)) $_return .= '/'.str_replace(array('/', '.', '|'), array('-', '+', '/'), $auto_id);
			else $_return .= '/'.md5($auto_id);
			$_return .= strrchr($_filename,".");
		}else{
			$_return .= '/'.$_filename;
		}
		return $_return;
	}
	
	/**
	 * �Զ���ȡid
	 * 
	 * @param      string      $cache_id
	 * @param      string      $compile_id
	 * @access     private
	 * @return     bool
	 */
	function _get_auto_id($cache_id=NULL, $compile_id=NULL){
		if(isset($cache_id)) return (isset($compile_id)) ? $cache_id . '|' . $compile_id  : $cache_id;
		elseif(isset($compile_id)) return $compile_id;
		else return NULL;
	}

	/**
	 * ɾ�������ļ�
	 * 
	 * @param      string      $resource
	 * @param      int         $exp_time
	 * @access     private
	 * @return     bool
	 */
	function _unlink($resource, $exp_time = NULL){
		if(isset($exp_time)) {
			if(JIEQI_NOW_TIME - @filemtime($resource) >= $exp_time) {
				return @unlink($resource);
			}
		} else {
			return @unlink($resource);
		}
	}

	/**
	 * ����һ��ģ��
	 * 
	 * @param      array       $params
	 * @access     private
	 * @return     void
	 */
	function _template_include($params){
		$this->_tpl_vars = array_merge($this->_tpl_vars, $params['template_include_vars']);
		$params['template_include_tpl_file']=trim($params['template_include_tpl_file']);
		if($params['template_include_tpl_file'][0] != '/' && $params['template_include_tpl_file'][1] != ':') $params['template_include_tpl_file']=$this->template_dir.'/'.$params['template_include_tpl_file'];

		$_template_compile_path = $this->_get_compile_path($params['template_include_tpl_file']);

		if ($this->_is_compiled($params['template_include_tpl_file'], $_template_compile_path)
		|| $this->_compile_resource($params['template_include_tpl_file'], $_template_compile_path)){
			include($_template_compile_path . $this->_compile_prefix);
		}
	}
}
?>