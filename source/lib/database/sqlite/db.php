<?php
/**
 * SQLITE���ݿ���
 *
 * ����SQLITE���ݿ����ز���
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: db.php 198 2008-11-25 05:38:31Z juny $
 */


/**
 * SQLITE���ݿ���
 * 
 * @category   jieqicms
 * @package    system
 */
class JieqiSQLiteDatabase extends JieqiObject
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
	function JieqiSQLiteDatabase($db=''){
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
		if (JIEQI_DB_PCONNECT == 1) {
			$this->conn = @sqlite_open($dbname, 0666, $sqliteerror);
		} else {
			$this->conn = @sqlite_popen($dbname, 0666, $sqliteerror);
		}
	
		if (!$this->conn)  return false;	
		else return true;
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
		return @sqlite_fetch_array($result,SQLITE_NUM);
	}

	/**
	 * ȡһ�У����������������飩
	 * 
	 * @param      resource     $result
	 * @access     public
	 * @return     array        ����������������
	 */
	function fetchArray($result){
		return @sqlite_fetch_array($result,SQLITE_ASSOC);
	}

	/**
	 * ȡ�����²���ID
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getInsertId()
	{
		return sqlite_last_insert_rowid($this->conn);
	}

	/**
	 * ���ز�ѯ�������
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getRowsNum($result){
		return @sqlite_num_rows($result);
	}

	/**
	 * ���ز�ѯӰ�������
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function getAffectedRows(){
		return sqlite_changes($this->conn);
	}

	/**
	 * �ر�����
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function close(){
		@sqlite_close($this->conn);
	}

	/**
	 * �ͷŲ�ѯ���
	 * 
	 * @param      void
	 * @access     public
	 * @return     void
	 */
	function freeRecordSet($result){
		return true;
	}

	/**
	 * ���ش�����Ϣ
	 * 
	 * @param      void
	 * @access     public
	 * @return     string
	 */
	function error()
	{
		$errno=@sqlite_last_error($this->conn);
		if(!empty($errno)) return @sqlite_error_string($errno);
		else return '';
	}

	/**
	 * ���ش������
	 * 
	 * @param      void
	 * @access     public
	 * @return     int
	 */
	function errno(){
		return @sqlite_last_error($this->conn);
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
		if ( !empty($limit) ) {
			if (empty($start)) {
				$start = 0;
			}
			$sql = $sql. ' LIMIT '.(int)$start.', '.(int)$limit;
		}
		//slqite��sql����ת�� \' -> '', \" -> ", \\ -> \
		$sql=str_replace(array('\\\'', '\"', '\\\\'),array('\'\'', '"', '\\'),$sql);

		if($nobuffer) $result = sqlite_unbuffered_query($sql, $this->conn);
		else $result = sqlite_query($sql, $this->conn);

		if ( $result ) {
			if(!$result) $this->raiseError('SQL: '.$sql, JIEQI_ERROR_RETURN);
			return $result;
        } else {
        	$this->raiseError('SQL: '.$sql, JIEQI_ERROR_RETURN);
			return false;
        }
    }

    /**
	 * �г�һ�����ݿ������б�
	 * 
	 * @param      void
	 * @access     public
	 * @return     array
	 */
    function list_tables(){
		if (function_exists ('sqlite_list_tables')) {
			return sqlite_list_tables();
		}else{
			$tables = array ();
            $sql = "SELECT name FROM sqlite_master WHERE (type = 'table')";
            if ($res = sqlite_query ($this->conn, $sql)) {
                while (sqlite_has_more($res)) {
                   $tables[] = sqlite_fetch_single($res);
                }
            }
           return $tables;
       }
    }

     /**
	 * �ж�һ�����Ƿ����
	 * 
	 * @param      string      $table ����
	 * @access     public
	 * @return     bool
	 */
    function table_exists($table){
        if (function_exists ('sqlite_table_exists')) {
			return sqlite_table_exists($this->conn, $table);
		}else{
            $sql = "SELECT count(name) FROM sqlite_master WHERE ((type = 'table') and (name = '$table'))";
           if ($res = sqlite_query ($this->conn, $sql)) {
               return sqlite_fetch_single($res)>0;
           } else {
               return false; 
           }
        }
    }

}
?>