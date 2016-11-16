<?php
/**
 * MYSQL���ݿ���
 *
 * ����MYSQL���ݿ����ز���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: db.php 324 2009-01-20 04:47:10Z juny $
 */

/**
 * MYSQL���ݿ���
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiMySQLDatabase extends JieqiObject
{

	/**
	 * ���ݿ�������Դ
	 *
	 * @var resource
	 */
	var $conn;

	/**
	 * ���캯��
	 * 
	 * @param      void
	 * @access     private
	 * @return     void
	 */
	function JieqiMySQLDatabase($db=''){
		$this->JieqiObject();
	}

	/**
	 * �������ݿ�
	 * 
	 * @param      string     $dbhost ���ݿ��������ַ
	 * @param      string     $dbuser ���ݿ��û���
	 * @param      string     $dbpass ���ݿ�����
	 * @param      string     $dbname ���ݿ���
	 * @param      bool       $selectdb �Ƿ�ѡ�е�ǰ���ݿ�
	 * @access     public
	 * @return     bool
	 */
	function connect($dbhost='', $dbuser='', $dbpass='', $dbname='', $selectdb = true){
		if (JIEQI_DB_PCONNECT == 1) $this->conn = @mysql_pconnect($dbhost, $dbuser, $dbpass);
		else $this->conn = @mysql_connect($dbhost, $dbuser, $dbpass);
		if (!$this->conn) return false;
		$this->connectcharset();
		if($selectdb != false){
			if (!mysql_select_db($dbname))  return false;
		}

		return true;
	}
	
	/**
	 * �����������ݿ�
	 * 
	 * @param      void       
	 * @access     public
	 * @return     bool
	 */
	function reconnect(){
		$ret=mysql_ping($this->conn);
		$this->connectcharset();
		return $ret;
	}
	
	/**
	 * ���������ַ���
	 * 
	 * @param      void       
	 * @access     public
	 * @return     void
	 */
	function connectcharset(){
		$mysql_version = mysql_get_server_info();
		if($mysql_version > '4.1'){
			if(defined('JIEQI_DB_CHARSET')){
				if(JIEQI_DB_CHARSET != 'default') @mysql_query("SET character_set_connection=".JIEQI_DB_CHARSET.", character_set_results=".JIEQI_DB_CHARSET.", character_set_client=binary", $this->conn);
			}else{
				@mysql_query("SET character_set_connection=".JIEQI_SYSTEM_CHARSET.", character_set_results=".JIEQI_SYSTEM_CHARSET.", character_set_client=binary", $this->conn);
			}
		}
		if($mysql_version > '5.0') @mysql_query("SET sql_mode=''", $this->conn);
	}


	/**
	 * ȡ����һ��id
	 * 
	 * @param      string      $sequence       
	 * @access     public
	 * @return     int
	 */
	function genId($sequence=''){
		return 0;
	}

	/**
	 * ȡһ�У����������������飩
	 * 
	 * @param      resource     $result
	 * @access     public
	 * @return     array        ����������������
	 */
	function fetchRow($result){
		return @mysql_fetch_row($result);
	}

	/**
	 * ȡһ�У����������������飩
	 * 
	 * @param      resource     $result
	 * @access     public
	 * @return     array        ����������������
	 */
	function fetchArray($result){
		return @mysql_fetch_array($result,MYSQL_ASSOC);
	}

	/**
	 * ȡ�����²���ID
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getInsertId(){
		return mysql_insert_id($this->conn);
	}

	/**
	 * ���ز�ѯ�������
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getRowsNum($result){
		return @mysql_num_rows($result);
	}

	/**
	 * ���ز�ѯӰ�������
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getAffectedRows(){
		return mysql_affected_rows($this->conn);
	}

	/**
	 * �ر�����
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function close(){
		@mysql_close();
		//if(defined('JIEQI_DEBUG_MODE') && JIEQI_DEBUG_MODE > 0) $this->sqllog('show');
	}

	/**
	 * �ͷŲ�ѯ���
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function freeRecordSet($result){
		return mysql_free_result($result);
	}

	/**
	 * ���ش�����Ϣ
	 * 
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function error(){
		return @mysql_error();
	}

	/**
	 * ���ش������
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function errno(){
		return @mysql_errno();
	}

	/**
	 * ��ѯ�ַ��������ַ��滻
	 * 
	 * @param      string      $str
	 * @access     public
	 * @return     $str
	 */
	function quoteString($str){
		return "'".jieqi_dbslashes($str)."'";
	}
	
	function sqllog($do = 'add', $sql = ''){
		static $sqllog = array();
		switch($do){
			case 'add':
			if(!empty($sql)) $sqllog[] = $sql;
			break;
			case 'ret':
			return $sqllog;
			break;
			case 'count':
			return count($sqllog);
			break;
			case 'show':
			echo '<br />queries: '.count($sqllog);
			foreach($sqllog as $sql) echo '<br />'.jieqi_htmlstr($sql);
			break;
		}
	}

	/**
	 * ִ��һ����ѯ���
	 * 
	 * @param      string      $sql ��ѯ��SQL
	 * @param      int         $limit ��������
	 * @param      int         $start ��ʼ����
	 * @param      bool        $nobuffer �Ƿ�����nobuffer��ѯ
	 * @access     public
	 * @return     bool
	 */
	function query($sql, $limit=0, $start=0, $nobuffer=false){
		
		if (!empty($limit)) {
			if(empty($start)) $start = 0;
			$sql.=' LIMIT '.(int)$start.', '.(int)$limit;
		}
		/*
		if(preg_match('/(char|outfile|load_file)/is', $sql)){
			$sqllog = "Time: ".date('Y-m-d H:i:s')."\r\nUrl: ";
			$sqllog .= !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
			$sqllog .= "\r\nSql: ".$sql."\r\n\r\n";
			jieqi_checkdir(JIEQI_COMPILED_PATH.'/templates', true);
			jieqi_writefile(JIEQI_COMPILED_PATH.'/templates/sqllog.txt', $sqllog, 'ab');
		}
		*/
		if(defined('JIEQI_DEBUG_MODE') && JIEQI_DEBUG_MODE > 0) $this->sqllog('add', $sql);
		if($nobuffer) $result = mysql_unbuffered_query($sql, $this->conn);
		else $result = mysql_query($sql, $this->conn);
		if ($result) return $result;
		else{
			//�������Ϊʱ�䳤�˶Ͽ����ӣ��Զ����������²�ѯ
			if(mysql_errno($this->conn) == 2013){
				$this->reconnect();
				if($nobuffer) $result = mysql_unbuffered_query($sql, $this->conn);
				else $result = mysql_query($sql, $this->conn);
				if ($result) return $result;
			}
			if(defined('JIEQI_DEBUG_MODE') && JIEQI_DEBUG_MODE > 0){
				jieqi_printfail('SQL: '.jieqi_htmlstr($sql).'<br /><br />ERROR: '.mysql_error($this->conn).'('.mysql_errno($this->conn).')');
			}
			return false;
		}
	}
}
?>