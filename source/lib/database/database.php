<?php
/**
 * ���ݿ�����ඨ��
 *
 * ������������ݿ⴦����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: database.php 318 2009-01-09 04:58:56Z juny $
 */

/**
 * ���ݿ������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiDatabase extends JieqiObject
{
	/**
	 * ���캯��
	 * 
	 * @param      void       
	 * @access     private
	 * @return     void
	 */
	function JieqiDatabase(){
		$this->JieqiObject();
	}
	
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
	 * ���ؾ�̬ʵ������������
	 * 
	 * @param      void       
	 * @access     private
	 * @return     array
	 */
	function close($db = NULL){
		if(is_object($db)){
			$db->close();
		}else{
			$instance =& JieqiDatabase::retInstance();
			if(!empty($instance)){
				foreach($instance as $db){
					$db->close();
				}
			}
		}
	}

	/**
	 * �������ݿ����ʹ���һ����
	 * 
	 * @param      string     $dbtype ���ݿ�����
	 * @param      string     $dbhost ���ݿ��������ַ
	 * @param      string     $dbuser ���ݿ��û���
	 * @param      string     $dbpass ���ݿ�����
	 * @param      string     $dbname ���ݿ���
	 * @param      bool       $getnew ���ǿ�ƴ�����ʵ����Ĭ�Ϸ�
	 * @access     public
	 * @return     object     �������ݿ�ʵ��
	 */
	function &getInstance($dbtype='', $dbhost='', $dbuser='', $dbpass='', $dbname='', $getnew=false){
		$instance =& JieqiDatabase::retInstance();

		if (empty($dbtype)) $dbtype=JIEQI_DB_TYPE;
		if (empty($dbhost)) $dbhost=JIEQI_DB_HOST;
		if (empty($dbuser)) $dbuser=JIEQI_DB_USER;
		if (empty($dbpass)) $dbpass=JIEQI_DB_PASS;
		if (empty($dbname)) $dbname=JIEQI_DB_NAME;
		
		$inskey = md5($dbtype.','.$dbhost.','.$dbuser.','.$dbpass.','.$dbname);

		$getnew = ($dbtype ==JIEQI_DB_TYPE && $dbhost == JIEQI_DB_HOST && $dbuser == JIEQI_DB_USER && $dbpass == JIEQI_DB_PASS && $dbname == JIEQI_DB_NAME) ? false : true;

		if(!isset($instance[$inskey]) || $getnew){
			switch($dbtype) {
				case 'mysql':
					require_once('mysql/db.php');
					if($getnew) $db = new JieqiMySQLDatabase();
					else $instance[$inskey] = new JieqiMySQLDatabase();
					break;
				case 'sqlite':
					require_once('sqlite/db.php');
					if($getnew) $db = new JieqiSQLiteDatabase();
					else $instance[$inskey] = new JieqiSQLiteDatabase();
					break;
				default:
					jieqi_printfail('The database type ('.$dbtype.') is not exists!');
					return false;
			}

			if($getnew){
				if (!$db->connect($dbhost, $dbuser, $dbpass, $dbname)) {
					jieqi_printfail('Can not connect to database!<br /><br />error: '.$db->error());
					return false;
				}else{
					return $db;
				}
			}else{
				if (!$instance[$inskey]->connect($dbhost, $dbuser, $dbpass, $dbname)) {
					jieqi_printfail('Can not connect to database!<br /><br />error: '.$instance[$inskey]->error());
					return false;
				}
			}
		}
		if(!defined('JIEQI_DB_CONNECTED')) @define('JIEQI_DB_CONNECTED',true);
		return $instance[$inskey];
	}
}

/**
 * ���ݱ������
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiObjectData extends JieqiObject{

	/**
	 * ����ʱ�������ݻ��Ǹ�������
	 */
	var $_isNew = false;

	/**
	 * ���캯��
	 * 
	 * @param      void       
	 * @access     private
	 * @return     void
	 */
	function JieqiObjectData(){
		$this->JieqiObject();
	}

	/**
	 * ���ö���Ϊ�½�״̬
	 * 
	 * @param      void       
	 * @access     public
	 * @return     void
	 */
	function setNew(){
		$this->_isNew = true;
	}
	
	/**
	 * ���ö���Ϊ���½�״̬
	 * 
	 * @param      void       
	 * @access     public
	 * @return     void
	 */
	function unsetNew(){
		$this->_isNew = false;
	}
	
	/**
	 * �ж϶����Ƿ�Ϊ�½�״̬
	 * 
	 * @param      void       
	 * @access     public
	 * @return     bool
	 */
	function isNew(){
		return $this->_isNew;
	}

	/**
	* ��ʼ������
	* 
	* @param      string      $key
	* @param      int         $type  ������������ (����ı���Ҫ���ˣ�������������������Ϊ JIEQI_TYPE_OTHER)
	* @param      mixed       $value ֵ
	* @param      bool        $required  ��Ҫ����
	* @param      int         $maxlength  �� JIEQI_TYPE_TXTBOX ����������󳤶�
	* @param      bool        $isdirty  �����Ƿ��޸Ĺ�
	* @access     public
	* @return     bool
	*/
	function initVar($key, $type, $value = NULL, $caption = '', $required = false, $maxlength = NULL, $isdirty=false){
		$this->vars[$key] = array('type' => $type, 'value' => $value, 'caption' => $caption, 'required' => $required, 'maxlength' => $maxlength, 'isdirty' => $isdirty, 'default'=>'', 'options'=>'');
	}
	
	/**
	* ���ÿ�ѡ��
	* 
	* @access     public
	* @param      string      $key ������
	* @param      array       $value ��ѡ����
	* @access     public
	* @return     bool
	*/
	function setOptions($key, $options){
		$this->vars[$key]['options'] = $options;
	}

	/**
	* ���ñ���
	* 
	* @access     public
	* @param      string      $key ������
	* @param      mixed       $value ����ֵ
	* @access     public
	* @return     bool
	*/
	function setVar($key, $value, $isdirty = true){
		if (!empty($key) && isset($value)) {
			if(!isset($this->vars[$key])){
				$this->initVar($key, JIEQI_TYPE_TXTBOX);
			}
			$this->vars[$key]['value'] = $value;
			$this->vars[$key]['isdirty'] = $isdirty;
		}
	}

	/**
	* �������ñ���
	* 
	* @param      array       $var_arr
	* @access     public
	* @return     bool
	*/
	function setVars($var_arr, $isdirty = false){
		if(is_array($var_arr)){
			foreach ($var_arr as $key => $value) {
				$this->setVar($key, $value, $isdirty);
			}
		}
	}

	/**
	* ȡ�ñ���
	* 
	* @param      void
	* @access     public
	* @return     array
	*/
	function getVars($format = ''){
		if(in_array($format, array('s', 'e', 'q', 't', 'o', 'n'))){
			$ret = array();
			foreach($this->vars as $k=>$v){
				$ret[$k] = $this->getVar($k, $fotmat);
			}
			return $ret;
		}else{
			return $this->vars;
		}
	}

	/**
	* ���غϸ�ʽ�������
	*
	* @param      string      $key ��ֵ
	* @param      string      $format ��ʽ��
	* @access     public
	* @return     mixed       ��ʽ�����ֵ
	*/
	function getVar($key, $format = 's'){
		if (isset($this->vars[$key]['value'])) {
			if(is_string($this->vars[$key]['value'])){
				switch (strtolower($format)) {
					case 's':
						return jieqi_htmlstr($this->vars[$key]['value']);
					case 'e':
						return preg_replace("/&amp;#(\d+);/isU", "&#\\1;", htmlspecialchars($this->vars[$key]['value'], ENT_QUOTES));
					case 'q':
						return jieqi_dbslashes($this->vars[$key]['value']);
					case 't':
						return $this->vars[$key]['caption'];
					case 'o':
						return !empty($this->vars[$key]['options'][$this->vars[$key]['value']]) ? $this->vars[$key]['options'][$this->vars[$key]['value']] : '';
					case 'n':
					default:
						return $this->vars[$key]['value'];
				}
			}else return $this->vars[$key]['value'];
		}else{
			return false;
		}
	}

}


/**
 * ���ݿ��ѯ�����
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiQueryHandler extends JieqiObject{
	/**
	 * ���ݿ����
	 *
	 * @var object
	 */
	var $db;
	/**
	 * ��ѯ�����Դ
	 *
	 * @var resource
	 */
	var $sqlres;
	
	/**
	 * ���캯��
	 *
	 * @param      object      $db ���ݿ����
	 * @access     private
	 * @return     void
	 */
	function JieqiQueryHandler($db=''){
		$this->JieqiObject();
		if (empty($db) || !is_object($db)) {
			$this->db =& JieqiDatabase::getInstance();
		} else {
			$this->db = &$db;
		}
	}

	/**
	 * �������ݿ�
	 *
	 * @param      object      $db ���ݿ����
	 * @access     public
	 * @return     void
	 */
	function setdb($db){
		$this->db = &$db;
	}

	/**
	 * ȡ�õ�ǰ���ݿ����
	 *
	 * @param      void
	 * @access     public
	 * @return     object
	 */
	function getdb(){
		return 	$this->db;
	}

	/**
	 * ִ��һ����ѯ
	 *
	 * @param      mixed       $criteria ��ѯ�ַ������߲�ѯ����
	 * @param      bool        $full criteria->getSql()�Ƿ񷵻�������ѯ�ַ���
	 * @param      bool        $nobuffer ��ѯ�Ƿ�����$nobufferѡ��
	 * @access     public
	 * @return     mixed        ִ�гɹ��������ݿ�������Դ�����򷵻�false
	 */
	function execute($criteria=NULL, $full=false, $nobuffer=false){
		if(is_object($criteria)){
			$sql=$criteria->getSql();
			if(!$full) $sql.= ' '.$criteria->renderWhere();
			$this->sqlres = $this->db->query($sql, 0, 0, $nobuffer);
			return $this->sqlres;
		}elseif(!empty($criteria)){
			$this->sqlres = $this->db->query($criteria, 0, 0, $nobuffer);
			return $this->sqlres;
		}
		return false;
	}

	/**
	 * ִ��һ�����ڲ�ѯ��Ĳ�ѯ
	 *
	 * @param      object      $criteria ��ѯ����
	 * @param      bool        $nobuffer ��ѯ�Ƿ�����$nobufferѡ��
	 * @access     public
	 * @return     mixed        ִ�гɹ��������ݿ�������Դ�����򷵻�false
	 */
	function queryObjects($criteria = NULL, $nobuffer=false){
		$limit = $start = 0;
		$sql = 'SELECT '.$criteria->getFields().' FROM '.$criteria->getTables().' '.$criteria->renderWhere();
		if ($criteria->getGroupby() != ''){
			$sql .= ' GROUP BY '.$criteria->getGroupby();
		}

		if ($criteria->getSort() != '') {
			$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
		}
		$limit = $criteria->getLimit();
		$start = $criteria->getStart();
		$this->sqlres = $this->db->query($sql, $limit, $start, $nobuffer);
		return $this->sqlres;
	}

	/**
	 * ��ȡ��һ����ѯ���
	 *
	 * @param      resource    $result ���ݿ�������Դ
	 * @access     public
	 * @return     object      ���ݱ����
	 */
	function getObject($result=''){
		if($result=='') $result=$this->sqlres;
		if(!$result) return false;
		else{
			$myrow = $this->db->fetchArray($result);
			if(!$myrow) return false;
			else{
				$dbrowobj = new JieqiObjectData();
				$dbrowobj->setVars($myrow);
				return $dbrowobj;
			}
		}
	}

	/**
	 * ��ȡ��һ����ѯ���
	 *
	 * @param      resource    $result ���ݿ�������Դ
	 * @access     public
	 * @return     array       ���ݿ�������
	 */
	function getRow($result=''){
		if($result=='') $result=$this->sqlres;
		if(!$result) return false;
		else{
			$myrow = $this->db->fetchArray($result);
			if(!$myrow) return false;
			else return $myrow;
		}
	}

	/**
	 * ��ȡ��ѯ�������
	 *
	 * @param      object      $criteria ��ѯ��
	 * @access     public
	 * @return     int         �������
	 */
	function getCount($criteria = NULL){
		if(is_object($criteria)){
			if ($criteria->getGroupby() == ''){
				$sql = 'SELECT COUNT(*) FROM '.$criteria->getTables().' '.$criteria->renderWhere();
				$nobuffer=true;
			}else{
				$sql = 'SELECT COUNT('.$criteria->getGroupby().') FROM '.$criteria->getTables().' '.$criteria->renderWhere().' GROUP BY '.$criteria->getGroupby();
				$nobuffer=false;
			}
			$result = $this->db->query($sql, 0, 0, $nobuffer);
			if (!$result) return 0;
			if ($criteria->getGroupby() == ''){
				list($count) = $this->db->fetchRow($result);
			}else{
				$count = $this->db->getRowsNum($result);
			}
			return $count;
		}
		return 0;
	}

	/**
	 * ������������
	 *
	 * @param      string      $table ���ݱ���
	 * @param      mixed       $fields Ҫ���µ��ֶΣ��ַ�����������
	 * @param      object      $criteria ��ѯ����
	 * @access     public
	 * @return     bool
	 */
	function updatefields($table, $fields, $criteria = NULL)
	{
		$sql = 'UPDATE '.$table.' SET ';
		$start=true;
		if(is_array($fields)){
			foreach($fields as $k=>$v){
				if(!$start){
					$sql.=', ';
				}else{
					$start=false;
				}
				if(is_numeric($v)){
					$sql.=$k.'='.$this->db->quoteString($v);
				}else{
					$sql.=$k.'='.$this->db->quoteString($v);
				}
			}
		}else{
			$sql.=$fields;
		}
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
		}
		return true;
	}
}

/**
 * ���ݱ�����
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiObjectHandler extends JieqiQueryHandler{
	/**
	 * ��Ļ�������
	 *
	 * @var string
	 */
	var $basename;
	/**
	 * Ψһ����ֶ�
	 *
	 * @var string
	 */
	var $autoid;
	/**
	 * ���ݱ����
	 *
	 * @var string
	 */
	var $dbname;
	/**
	 * �Ƿ������ı�����Ĭ�ϡ��񡱣�Ҫ��dbprefix�����������
	 *
	 * @var bool
	 */
	var $fullname=false; 


	/**
	 * ���캯��
	 *
	 * @param      object      $db ���ݿ����
	 * @access     private
	 * @return     void
	 */
	function JieqiObjectHandler($db='')
	{
		$this->JieqiQueryHandler($db);
	}

	/**
	 * �½����ݱ����
	 *
	 * @param      bool        $isNew �Ƿ�����Ϊ�½�״̬
	 * @access     public
	 * @return     object      ���ݱ����
	 */
	function create($isNew = true){
		$tmpvar='Jieqi'.ucfirst($this->basename);
		${$this->basename} = new $tmpvar();
		if ($isNew) {
			${$this->basename}->setNew();
		}
		return ${$this->basename};
	}

	/**
	 * ����idȡ��һ������
	 *
	 * @param      int         $id ���ݱ�Ψһid
	 * @access     public
	 * @return     object      ���ݱ����
	 */
	function get($id){
		if (is_numeric($id) && intval($id) > 0) {
			$id=intval($id);
			$sql = 'SELECT * FROM '.jieqi_dbprefix($this->dbname, $this->fullname).' WHERE '.$this->autoid.'='.$id;
			if (!$result = $this->db->query($sql, 0, 0, true)) {
				return false;
			}
			$datarow=$this->db->fetchArray($result);
			if (is_array($datarow)) {
				$tmpvar='Jieqi'.ucfirst($this->basename);
				${$this->basename} = new $tmpvar();
				${$this->basename}->setVars($datarow);
				return ${$this->basename};
			}
		}
		return false;
	}

	/**
	 * ��������һ������
	 *
	 * @param      object      $baseobj ���ݱ����
	 * @access     public
	 * @return     bool
	 */
	function insert(&$baseobj){
		if (strcasecmp(get_class($baseobj), 'jieqi'.$this->basename) != 0) {
			return false;
		}
		if ($baseobj->isNew()) {
			//�����¼
			if(is_numeric($baseobj->getVar($this->autoid,'n'))){
				${$this->autoid}=intval($baseobj->getVar($this->autoid,'n'));
			}else{
				${$this->autoid} = $this->db->genId($this->dbname.'_'.$this->autoid.'_seq');
			}
			$sql='INSERT INTO '.jieqi_dbprefix($this->dbname, $this->fullname).' (';
			$values=') VALUES (';
			$start=true;

			foreach ($baseobj->vars as $k => $v) {
				if(!$start){
					$sql.=', ';
					$values.=', ';
				}else{
					$start=false;
				}
				$sql.=$k;
				if($v['type']==JIEQI_TYPE_INT){
					if($k != $this->autoid){
						$values.=$this->db->quoteString($v['value']);
					}else{
						$values.=${$this->autoid};
					}
				}else{
					$values.=$this->db->quoteString($v['value']);
				}
			}
			$sql.=$values.')';
			unset($values);

		}else{
			//���¼�¼
			$sql='UPDATE '.jieqi_dbprefix($this->dbname, $this->fullname).' SET ';
			$start=true;
			foreach($baseobj->vars as $k => $v){
				if($k != $this->autoid && $v['isdirty']){
					if(!$start){
						$sql.=', ';
					}else{
						$start=false;
					}
					if($v['type']==JIEQI_TYPE_INT){
						$sql.=$k.'='.$this->db->quoteString($v['value']);
					}else{
						$sql.=$k.'='.$this->db->quoteString($v['value']);
					}
				}
			}
			if($start) return true;
			$sql.=' WHERE '.$this->autoid.'='.intval($baseobj->vars[$this->autoid]['value']);
		}
		$result = $this->db->query($sql);
		if (!$result) {
			return false;
		}
		if ($baseobj->isNew()) {
			$baseobj->setVar($this->autoid,$this->db->getInsertId());
		}
		return true;
	}

	/**
	 * ��id���ѯ����ɾ��
	 *
	 * @param      mixed       $criteria ���ݱ�Ψһid�������ݱ����
	 * @access     public
	 * @return     bool
	 */
	function delete($criteria = 0){
		$sql='';
		if(is_numeric($criteria)){
			$criteria=intval($criteria);
			$sql='DELETE FROM '.jieqi_dbprefix($this->dbname, $this->fullname).' WHERE '.$this->autoid.'='.$criteria;
		}elseif (is_object($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$tmpstr=$criteria->renderWhere();
			if(!empty($tmpstr))  $sql= 'DELETE FROM '.jieqi_dbprefix($this->dbname, $this->fullname).' '.$tmpstr;
		}
		if(empty($sql)) return false;
		$result = $this->db->query($sql);
		if (!$result) {
			return false;
		}
		return true;
	}

	/**
	 * ���ݲ�ѯ����ִ��һ����ѯ
	 *
	 * @param      object      $criteria ��ѯ����
	 * @param      bool        $nobuffer ��ѯ�Ƿ�����$nobufferѡ��
	 * @access     public
	 * @return     resource     ���ݿ�������Դ
	 */
	function queryObjects($criteria = NULL, $nobuffer=false){
		$limit = $start = 0;
		$sql = 'SELECT '.$criteria->getFields().' FROM '.jieqi_dbprefix($this->dbname, $this->fullname);
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
			if ($criteria->getGroupby() != ''){
				$sql .= ' GROUP BY '.$criteria->getGroupby();
			}
			if ($criteria->getSort() != '') {
				$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
			}
			$limit = $criteria->getLimit();
			$start = $criteria->getStart();
		}
		$this->sqlres = $this->db->query($sql, $limit, $start, $nobuffer);
		return $this->sqlres;
	}

	/**
	 * ��ȡ��һ����ѯ���
	 *
	 * @param      resource    $result ���ݿ�������Դ
	 * @access     public
	 * @return     object      ���ݱ����
	 */
	function getObject($result=''){
		if($result=='') $result=$this->sqlres;
		if(!$result) return false;
		else{
			$tmpvar='Jieqi'.ucfirst($this->basename);
			$myrow = $this->db->fetchArray($result);
			if(!$myrow) return false;
			else{
				$dbrowobj = new $tmpvar();
				$dbrowobj->setVars($myrow);
				return $dbrowobj;
			}
		}
	}

	/**
	 * ��ȡ��ѯ�����������
	 *
	 * @param      object      $criteria ��ѯ����
	 * @access     public
	 * @return     int         ��������
	 */
	function getCount($criteria = NULL){
		$sql = 'SELECT COUNT(*) FROM '.jieqi_dbprefix($this->dbname, $this->fullname);
		$nobuffer=true;
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
			if ($criteria->getGroupby() != ''){
				$sql = 'SELECT COUNT('.$criteria->getGroupby().') FROM '.jieqi_dbprefix($this->dbname, $this->fullname).' '.$criteria->renderWhere().' GROUP BY '.$criteria->getGroupby();
				$nobuffer=false;
			}
		}
		$result = $this->db->query($sql, 0, 0, $nobuffer);
		if (!$result) return 0;
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement') && $criteria->getGroupby() != ''){
			$count = $this->db->getRowsNum($result);
		}else{

			list($count) = $this->db->fetchRow($result);
		}

		return $count;
	}

	/**
	 * ������������
	 *
	 * @param      mixed       $fields ���µ��ֶΣ��ַ�����������
	 * @param      object      $criteria ��ѯ����
	 * @access     public
	 * @return     bool
	 */
	function updatefields($fields, $criteria = NULL){
		$sql = 'UPDATE '.jieqi_dbprefix($this->dbname, $this->fullname).' SET ';
		$start=true;
		if(is_array($fields)){
			foreach($fields as $k=>$v){
				if(!$start){
					$sql.=', ';
				}else{
					$start=false;
				}
				if(is_numeric($v)){
					$sql.=$k.'='.$this->db->quoteString($v);
				}else{
					$sql.=$k.'='.$this->db->quoteString($v);
				}
			}
		}else{
			$sql.=$fields;
		}
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
		}
		return true;
	}
}


/**
 * ��ѯ�����࣬��׼��SQL���
 * 
 * @category   jieqicms
 * @package    system
 */
class CriteriaElement extends JieqiObject{
	var $order = 'ASC';
	var $sort = '';
	var $limit = 0;
	var $start = 0;
	var $groupby = '';
	var $sql = '';
	var $fields='*';
	var $tables='';

	/**
	 * ���캯��
	 *
	 * @param      void
	 * @access     private
	 * @return     void
	 */
	function CriteriaElement(){
		$this->JieqiObject();
	}

	/**
	 * ���ò�ѯ���
	 *
	 * @param      string      $sql
	 * @access     public
	 * @return     void
	 */
	function setSql($sql){
		$this->sql = $sql;
	}

	/**
	 * ��ȡ��ѯ���
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function getSql(){
		return $this->sql;
	}

	/**
	 * ���ò�ѯ���ֶ�
	 *
	 * @param      string      $fields
	 * @access     public
	 * @return     void
	 */
	function setFields($fields){
		$this->fields = $fields;
	}

	/**
	 * ��ȡ��ѯ���ֶ�
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function getFields(){
		return $this->fields;
	}

	/**
	 * ���ò�ѯ�����ݱ�
	 *
	 * @param      string      $tables
	 * @access     public
	 * @return     void
	 */
	function setTables($tables){
		$this->tables = $tables;
	}

	/**
	 * ��ȡ��ѯ�����ݱ�
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function getTables(){
		return $this->tables;
	}

	/**
	 * ���ò�ѯ�����ֶ�
	 * 
	 * @param      string      $sort
	 * @access     public
	 * @return     void
	 */
	function setSort($sort){
		$this->sort = $sort;
	}

	/**
	 * ��ȡ��ѯ�����ֶ�
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function getSort(){
		return $this->sort;
	}

	/**
	 * ���ò�ѯ����ʽ
	 *
	 * @param      string      $order
	 * @access     public
	 * @return     void
	 */
	function setOrder($order){
		if ('DESC' == strtoupper($order)) {
			$this->order = 'DESC';
		}
	}

	/**
	 * ��ȡ��ѯ����ʽ
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function getOrder(){
		return $this->order;
	}

	/**
	 * ���ò�ѯ��������
	 *
	 * @param      int         $limit
	 * @access     public
	 * @return     void
	 */
	function setLimit($limit=0){
		if(isset($limit) && is_numeric($limit)) $this->limit = intval($limit);
		else $this->limit = 1;
	}

	/**
	 * ��ȡ��ѯ��������
	 *
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getLimit(){
		return $this->limit;
	}

	/**
	 * ���ò�ѯ��ʼ����
	 *
	 * @param      int         $start
	 * @access     public
	 * @return     void
	 */
	function setStart($start=0){
		$this->start = intval($start);
	}

	/**
	 * ��ȡ��ѯ��ʼ����
	 *
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getStart(){
		return $this->start;
	}

	/**
	 * ���ò�ѯ��������
	 *
	 * @param      string      $group
	 * @access     public
	 * @return     void
	 */
	function setGroupby($group){
		$this->groupby = $group;
	}

	/**
	 * ��ȡ��ѯ��������
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function getGroupby(){
		return $this->groupby;
	}
}

/**
 * ���������ϲ�ѯ��
 * 
 * @category   jieqicms
 * @package    system
 */
class CriteriaCompo extends CriteriaElement{

	var $criteriaElements = array();
	var $conditions = array();

	/**
	 * ���캯��
	 *
	 * @param      object      $ele ����������ѯ����
	 * @param      string      $condition �����ϲ���ʽ
	 * @access     private
	 * @return     void
	 */
	function CriteriaCompo($ele=NULL, $condition='AND'){
		if (isset($ele) && is_object($ele)) {
			$this->add($ele, $condition);
		}
	}

	/**
	 * ����һ����ѯ����
	 *
	 * @param      object      $criteriaElement ����������ѯ����
	 * @param      string      $condition �����ϲ���ʽ
	 * @access     public
	 * @return     object
	 */
	function add(&$criteriaElement, $condition='AND'){
		$this->criteriaElements[] =& $criteriaElement;
		$this->conditions[] = $condition;
		return $this;
	}

	/**
	 * ���ɲ�ѯSQL
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function render(){
		$ret = '';
		$count = count($this->criteriaElements);
		if ($count > 0) {
			$ret = '('. $this->criteriaElements[0]->render();
			for ($i = 1; $i < $count; $i++) {
				$ret .= ' '.$this->conditions[$i].' '.$this->criteriaElements[$i]->render();
			}
			$ret .= ')';
		}
		return $ret;
	}

	/**
	 * ���ɲ�ѯSQL����������
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function renderWhere(){
		$ret = $this->render();
		$ret = ($ret != '') ? 'WHERE ' . $ret : $ret;
		return $ret;
	}
}


/**
 * ����������ѯ��
 * 
 * @category   jieqicms
 * @package    system
 */
class Criteria extends CriteriaElement{

	var $column;
	var $operator;
	var $value;

	/**
	 * ���캯��
	 *
	 * @param      string      $column ���ݱ��ֶ���
	 * @param      string      $value ������ֵ
	 * @param      string      $operator �����ıȽϷ�ʽ
	 * @access     private
	 * @return     void
	 */
	function Criteria($column, $value='', $operator='='){
		$this->column = $column;
		$this->value = $value;
		$this->operator = $operator;
	}

	/**
	 * ���ɲ�ѯSQL
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function render(){
		if (!empty($this->column)) $clause = $this->column.' '.$this->operator;
		else $clause='';
		if (isset($this->value)) {
			if ($this->column == '' && $this->operator == '') {
				// ��� $column �� operator ��Ϊ��,��ٶ� value Ϊ�Զ����ѯ����
				$clause .= " ".trim($this->value);
			} elseif (strtoupper($this->operator) == 'IN') {
				$clause .= ' '.$this->value;
			} else {
				$clause .= " '".jieqi_dbslashes(trim($this->value))."'";
			}
		}
		return $clause;

	}

	/**
	 * ���ɲ�ѯSQL����������
	 *
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function renderWhere(){
		$ret = $this->render();
		$ret = ($ret != '') ? 'WHERE ' . $ret : $ret;
		return $ret;
	}
}
?>