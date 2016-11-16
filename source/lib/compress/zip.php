<?php
/**
 * ����ZIP�ļ���
 *
 * ���÷ֿ��ȡ�������������ļ��ķ�ʽ���ȽϽ�Լ�ڴ棬��Ҫzlib�⡣
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: zip.php 197 2008-11-25 03:00:05Z juny $
 */

/*
�÷�
$zip=new JieqiZip(); //��������
$zip->addFile('/file/or/pathname'); //����ļ�����·������Ӷ�����ظ����ñ�����
$zip->addData('filename', 'filedata'); //ֱ��������ݣ������ֱ����ļ������ļ�����
$zip->setComment('comment'); //���ñ�ע
$zip->makezip('zipname.zip'); //ѹ�������ZIP�ļ�

����һ������������������ѹ����
$zip=new JieqiZip(); //��������
$zip->zipstart('zipname.zip'); //����ZIP�ļ���׼���������
$zip->zipadd('filename', 'filedata'); //������ݲ�ֱ��������ļ��������ֱ����ļ������ļ�����
$zip->setComment('comment'); //���ñ�ע
$zip->zipend(); //���zip�ļ����
*/

class JieqiZip
{
	var $zip_fd; //Ŀ���ļ�ָ��
	var $max_block_file = 1048576; //�ļ����ڶ��ٿ�ʼ�ֿ��ȡ
	var $read_block_size = 2048; //���ļ�ʱ��ÿ�μ����ֽ�
	var $filelist = array(); //��Ҫ������ļ��б�
	var $filedata = array(); //��Ҫ������ļ�����
	var $headerlist = array(); //ͷ��Ϣ
	var $comment = ''; //��ע

	//����һ���ļ�����Ŀ¼
	function addFile($file){
		if(is_dir($file)){
			if ($file != "." && $file != "..") $this->filelist[]=$file;
			if ($file != ".") $dir = $file.'/';
			else $dir = '';
			$dh = opendir($file);
			while(false !== ($fname = readdir($dh))){
				if ($fname != "." && $fname != ".."){
					if(is_dir($dir.$fname)){
						$this->addfile($dir.$fname);
					}else{
						$this->filelist[]=$dir.$fname;
					}
				}
			}
			closedir($dh);
		}elseif(is_file($file)){
			$this->filelist[]=$file;
		}
	}

	//ֱ�������ļ�����
	function addData($fname, $fdata){
		$this->filedata[$fname]=$fdata;
	}

	//���ñ�ע
	function setComment($comment=''){
		$this->comment=$comment;
	}

	//ѹ�������
	function makezip($zipfile){
		//���gzѹ�������Ƿ����
		if(!function_exists('gzopen')) return false;
		//����ļ��б�������Ƿ�Ϊ��
		if(empty($this->filelist) && empty($this->filedata)) return false;

		//����ļ��Ƿ��д
		$this->zip_fd = @fopen($zipfile, 'wb');
		if(!$this->zip_fd) return false;

		//�����ļ�
		@flock($this->zip_fd, LOCK_EX);

		//ͷ����Ϣ
		$v_header_list = array();
		$p_result_list = array();
		$v_header = array();
		$v_nb = count($v_header_list);

		$filenum=count($this->filelist);
		//zip���汣���·��
		$stored_files=array();
		$root_path='';
		$prevary=array();
		$curary=array();
		$prenum=0;
		$curnum=0;

		for ($i=0; $i<$filenum; $i++) {
			//·�����桰\���ĳɡ�/��
			$this->filelist[$i] = $this->translatewinpath($this->filelist[$i], false);
			//·������ȥ����./������../��
			$stored_files[$i] = $this->pathreduction($this->filelist[$i]);
			//��ͬ�ĸ�·�����˵�
			if($i == 0){
				if(is_file($this->filelist[$i])) $root_path=dirname($stored_files[$i]);
				elseif(is_dir($this->filelist[$i])) $root_path=$stored_files[$i];
			}elseif($i > 0 && $root_path != ''){

				$prevary=explode('/',$root_path);
				$prenum=count($prevary);
				$curary=explode('/',$stored_files[$i]);
				$curnum=count($curary);
				$j=0;
				$root_path='';
				while($j<$curnum && $j<$prenum && $curary[$j]==$prevary[$j]){
					if($root_path != '') $root_path.='/';
					$root_path.=$curary[$j];
					$j++;
				}
			}
		}
		$rootlen=strlen($root_path);
		//ѭ��ѹ���ļ�
		for ($i=0; $i<$filenum; $i++) {
			//�������ļ���
			if ($this->filelist[$i] == '') continue;
			//�ļ�������Ҳ����
			if (!file_exists($this->filelist[$i])) continue;
			//zip�����·��
			if($rootlen > 0 && substr($stored_files[$i],0,$rootlen)==$root_path){
				$stored_files[$i]=substr($stored_files[$i],$rootlen);
				if(substr($stored_files[$i],0,1)=='/') $stored_files[$i]=substr($stored_files[$i],1);
			}
			if($stored_files[$i] == '') continue;
			//����һ���ļ�
			$this->addfile2zip($this->filelist[$i], $stored_files[$i], $v_header);
			$v_header_list[$v_nb++] = $v_header;
		}

		//ѭ����������
		foreach($this->filedata as $fname=>$fdata){
			//·�����桰\���ĳɡ�/��
			$fname = $this->translatewinpath($fname, false);
			//·������ȥ����./������../��
			$fname = $this->pathreduction($fname);
			if($fname == '') continue;
			$this->adddata2zip($fname,$fdata, $v_header);
			$v_header_list[$v_nb++] = $v_header;
		}

		//��ȡ��ǰ�ļ�ָ��
		$v_offset = @ftell($this->zip_fd);
		//�����ļ�ͷ��Ϣ
		$filenum=count($v_header_list);
		$v_count=0;
		for ($i=0; $i<$filenum; $i++){
			//дͷ��Ϣ
			if ($v_header_list[$i]['status'] == 'ok') {
				$this->writecentralfileheader($v_header_list[$i]);
				$v_count++;
			}
			//ͷ����Ϣ�ĳ��ļ���Ϣ
			$this->header2fileinfo($v_header_list[$i], $p_result_list[$i]);
		}

		//ע��
		$v_comment = $this->comment;
		//����ͷ����Ϣ����
		$v_size = @ftell($this->zip_fd)-$v_offset;
		//д�ܵ�ͷ��Ϣ
		$this->writecentralheader($v_count, $v_size, $v_offset, $v_comment);

		//�ļ������رշ���
		@flock($this->zip_fd, LOCK_UN);
		@fclose($this->zip_fd);
		$this->zip_fd = 0;
		return true;
	}


	//��ʼ����ѹ���ļ�
	function zipstart($zipfile){
		//���gzѹ�������Ƿ����
		if(!function_exists('gzopen')) return false;
		//����ļ��Ƿ��д
		$this->zip_fd = @fopen($zipfile, 'wb');
		if(!$this->zip_fd) return false;
		//�����ļ�
		@flock($this->zip_fd, LOCK_EX);
		$this->headerlist = array();
		return true;
	}

	//���ѹ������
	function zipadd($fname, $fdata){
		//·�����桰\���ĳɡ�/��
		$fname = $this->translatewinpath($fname, false);
		//·������ȥ����./������../��
		$fname = $this->pathreduction($fname);
		if($fname == '') return false;
		$this->adddata2zip($fname, $fdata, $v_header);
		$this->headerlist[] = $v_header;
		return true;
	}

	//�������ѹ���ļ�
	function zipend(){
		//��ȡ��ǰ�ļ�ָ��
		$v_offset = @ftell($this->zip_fd);
		//�����ļ�ͷ��Ϣ
		$filenum=count($this->headerlist);
		$v_count=0;
		for ($i=0; $i<$filenum; $i++){
			//дͷ��Ϣ
			if ($this->headerlist[$i]['status'] == 'ok') {
				$this->writecentralfileheader($this->headerlist[$i]);
				$v_count++;
			}
			//ͷ����Ϣ�ĳ��ļ���Ϣ
			$this->header2fileinfo($this->headerlist[$i], $p_result_list[$i]);
		}

		//ע��
		$v_comment = $this->comment;
		//����ͷ����Ϣ����
		$v_size = @ftell($this->zip_fd)-$v_offset;
		//д�ܵ�ͷ��Ϣ
		$this->writecentralheader($v_count, $v_size, $v_offset, $v_comment);

		//�ļ������رշ���
		@flock($this->zip_fd, LOCK_UN);
		@fclose($this->zip_fd);
		$this->zip_fd = 0;
		$this->headerlist = array();
		return true;
	}


	//д�ļ�ͷ��Ϣ
	function writefileheader(&$p_header){
		$p_header['offset'] = ftell($this->zip_fd);
		//��UNIX��ʽʱ��ת����DOS��ʽʱ��
		$v_date = getdate($p_header['mtime']);
		$v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
		$v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];

		//�����Ϣ
		$v_binary_data = pack("VvvvvvVVVvv", 0x04034b50,
		$p_header['version_extracted'], $p_header['flag'],
		$p_header['compression'], $v_mtime, $v_mdate,
		$p_header['crc'], $p_header['compressed_size'],
		$p_header['size'],
		strlen($p_header['stored_filename']),
		$p_header['extra_len']);

		//дͷ��30���ֽ�
		fputs($this->zip_fd, $v_binary_data, 30);

		//д�ļ���Ϣ
		if (strlen($p_header['stored_filename']) != 0){
			fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
		}
		if ($p_header['extra_len'] != 0){
			fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
		}
	}

	//ͷ����Ϣ�ĳ��ļ���Ϣ
	function header2fileinfo($p_header, &$p_info){
		$p_info['filename'] = $p_header['filename'];
		$p_info['stored_filename'] = $p_header['stored_filename'];
		$p_info['size'] = $p_header['size'];
		$p_info['compressed_size'] = $p_header['compressed_size'];
		$p_info['mtime'] = $p_header['mtime'];
		$p_info['comment'] = $p_header['comment'];
		$p_info['folder'] = (($p_header['external']&0x00000010)==0x00000010);
		$p_info['index'] = $p_header['index'];
		$p_info['status'] = $p_header['status'];
	}

	//д�ܵ�ͷ��Ϣ
	function writecentralheader($p_nb_entries, $p_size, $p_offset, $p_comment){
		$v_binary_data = pack("VvvvvVVv", 0x06054b50, 0, 0, $p_nb_entries,
		$p_nb_entries, $p_size,
		$p_offset, strlen($p_comment));
		//д22���ֽ�ͷ��Ϣ
		fputs($this->zip_fd, $v_binary_data, 22);
		//д��ע
		if (strlen($p_comment) != 0){
			fputs($this->zip_fd, $p_comment, strlen($p_comment));
		}
	}

	//д�ļ�ͷ��Ϣ
	function writecentralfileheader(&$p_header){
		//��UNIX��ʽʱ��ת����DOS��ʽʱ��
		$v_date = getdate($p_header['mtime']);
		$v_mtime = ($v_date['hours']<<11) + ($v_date['minutes']<<5) + $v_date['seconds']/2;
		$v_mdate = (($v_date['year']-1980)<<9) + ($v_date['mon']<<5) + $v_date['mday'];

		//�������
		$v_binary_data = pack("VvvvvvvVVVvvvvvVV", 0x02014b50,
		$p_header['version'], $p_header['version_extracted'],
		$p_header['flag'], $p_header['compression'],
		$v_mtime, $v_mdate, $p_header['crc'],
		$p_header['compressed_size'], $p_header['size'],
		strlen($p_header['stored_filename']),
		$p_header['extra_len'], $p_header['comment_len'],
		$p_header['disk'], $p_header['internal'],
		$p_header['external'], $p_header['offset']);

		//д42�ֽ�ͷ��Ϣ
		fputs($this->zip_fd, $v_binary_data, 46);

		//д����
		if (strlen($p_header['stored_filename']) != 0){
			fputs($this->zip_fd, $p_header['stored_filename'], strlen($p_header['stored_filename']));
		}
		if ($p_header['extra_len'] != 0){
			fputs($this->zip_fd, $p_header['extra'], $p_header['extra_len']);
		}
		if ($p_header['comment_len'] != 0){
			fputs($this->zip_fd, $p_header['comment'], $p_header['comment_len']);
		}
	}

	//�ı�windows��ʽ·��
	function translatewinpath($p_path, $p_remove_disk_letter=true){
		if (stristr(php_uname(), 'win')) {
			//ȥ��windows·�������̷�
			if (($p_remove_disk_letter) && (($v_position = strpos($p_path, ':')) != false)) {
				$p_path = substr($p_path, $v_position+1);
			}
			//��·�������б��
			if ((strpos($p_path, '\\') > 0) || (substr($p_path, 0,1) == '\\')) {
				$p_path = strtr($p_path, '\\', '/');
			}
		}
		return $p_path;
	}

	//����һ���ļ�������ѹ��
	function addfile2zip($p_filename, $stored_filename, &$p_header){
		//�����ļ�����
		clearstatcache();
		$p_header['version'] = 20;
		$p_header['version_extracted'] = 10;
		$p_header['flag'] = 0;
		$p_header['compression'] = 0;
		$p_header['mtime'] = filemtime($p_filename);
		$p_header['crc'] = 0;
		$p_header['compressed_size'] = 0;
		$p_header['size'] = filesize($p_filename);
		$p_header['filename_len'] = strlen($p_filename);
		$p_header['extra_len'] = 0;
		$p_header['comment_len'] = 0;
		$p_header['disk'] = 0;
		$p_header['internal'] = 0;
		$p_header['external'] = (is_file($p_filename)?0x00000000:0x00000010);
		$p_header['offset'] = 0;
		$p_header['filename'] = $p_filename;
		$p_header['stored_filename'] = $stored_filename;
		$p_header['extra'] = '';
		$p_header['comment'] = '';
		$p_header['status'] = 'ok';
		$p_header['index'] = -1;

		//���ʵ���ļ����Ƿ�Ϊ��
		if ($p_header['stored_filename'] == "") {
			$p_header['status'] = "filtered";
		}

		//���·���ǲ���̫��
		if (strlen($p_header['stored_filename']) > 0xFF) {
			$p_header['status'] = 'filename_too_long';
		}

		//������
		if ($p_header['status'] == 'ok') {
			if (is_file($p_filename)){
				//���ļ������
				$v_size = filesize($p_filename);
				if($v_size < $this->max_block_file){
					if (($v_file = @fopen($p_filename, "rb")) == 0) return false;
					//�ļ��Ƚ�С��ֱ��������ȡ
					//���ļ�
					$v_content = @fread($v_file, $p_header['size']);
					//����CRCУ��
					$p_header['crc'] = @crc32($v_content);
					//gzѹ��
					$v_content_compressed = @gzdeflate($v_content);
					//����ͷ������
					$p_header['compressed_size'] = strlen($v_content_compressed);
					$p_header['compression'] = 8;

					//дͷ��Ϣ
					$this->writefileheader($p_header);
					//дѹ����Ϣ
					@fwrite($this->zip_fd, $v_content_compressed, $p_header['compressed_size']);
					//�ر��ļ�
					@fclose($v_file);
				}else{
					//�ļ��Ƚϴ󣬷ֿ��ȡ������ʱ�ļ��ټ��뵽ѹ���ļ�
					$tmp_gzfile = tempnam('','');
					if (($v_file_compressed = @gzopen($tmp_gzfile, "wb")) == 0) return false;
					if (($v_file = @fopen($p_filename, "rb")) == 0) return false;
					while ($v_size != 0){
						$v_read_size = ($v_size < $this->read_block_size ? $v_size : $this->read_block_size);
						$v_buffer = fread($v_file, $v_read_size);
						$v_binary_data = pack('a'.$v_read_size, $v_buffer);
						@gzputs($v_file_compressed, $v_binary_data, $v_read_size);
						$v_size -= $v_read_size;
					}
					@fclose($v_file);
					@gzclose($v_file_compressed); //��ʱ��gz�ļ��������
					//gz�ļ�̫С
					if (filesize($tmp_gzfile) < 18){
						@unlink($tmp_gzfile);
						return false;
					}

					// ����ʱgz�ļ�
					if (($v_file_compressed = @fopen($tmp_gzfile, "rb")) == 0){
						@unlink($tmp_gzfile);
						return false;
					}

					// ��ͷ����Ϣ
					$v_binary_data = @fread($v_file_compressed, 10);
					$v_data_header = unpack('a1id1/a1id2/a1cm/a1flag/Vmtime/a1xfl/a1os', $v_binary_data);
					$v_data_header['os'] = bin2hex($v_data_header['os']);
					@fseek($v_file_compressed, filesize($tmp_gzfile)-8);
					$v_binary_data = @fread($v_file_compressed, 8);
					$v_data_footer = unpack('Vcrc/Vcompressed_size', $v_binary_data);

					//������Ҫ��ͷ��Ϣ
					$p_header['compression'] = ord($v_data_header['cm']);
					$p_header['crc'] = $v_data_footer['crc'];
					$p_header['compressed_size'] = filesize($tmp_gzfile)-18;
					
					
					//дͷ��Ϣ
					$this->writefileheader($p_header);
					//дѹ����Ϣ
					@fwrite($this->zip_fd, $v_content_compressed, $p_header['compressed_size']);
					@rewind($v_file_compressed);

					fseek($v_file_compressed, 10);
					$v_size = $p_header['compressed_size'];
					while ($v_size != 0){
						$v_read_size = ($v_size < $this->read_block_size ? $v_size : $this->read_block_size);
						$v_buffer = fread($v_file_compressed, $v_read_size);
						$v_binary_data = pack('a'.$v_read_size, $v_buffer);
						@fwrite($this->zip_fd, $v_binary_data, $v_read_size);
						$v_size -= $v_read_size;
					}
					@fclose($v_file_compressed);
					@unlink($tmp_gzfile);
				}
			}else{
				//��Ŀ¼�����
				//������'/'
				if (@substr($p_header['stored_filename'], -1) != '/') {
					$p_header['stored_filename'] .= '/';
				}

				//��������
				$p_header['size'] = 0;
				//$p_header['external'] = 0x41FF0010;   // Value for a folder : to be checked
				$p_header['external'] = 0x00000010;   // Value for a folder : to be checked

				//����ͷ��Ϣ
				$this->writefileheader($p_header);
			}
		}
	}

	//����һ���ļ�������ѹ��
	function adddata2zip($fname, $fdata, &$p_header){
		//�����ļ�����
		clearstatcache();
		$p_header['version'] = 20;
		$p_header['version_extracted'] = 10;
		$p_header['flag'] = 0;
		$p_header['compression'] = 0;
		$p_header['mtime'] = time();
		$p_header['crc'] = 0;
		$p_header['compressed_size'] = 0;
		$p_header['size'] = strlen($fdata);
		$p_header['filename_len'] = strlen($fname);
		$p_header['extra_len'] = 0;
		$p_header['comment_len'] = 0;
		$p_header['disk'] = 0;
		$p_header['internal'] = 0;
		$p_header['external'] = (($fdata === false) ? 0x00000010 : 0x00000000);
		$p_header['offset'] = 0;
		$p_header['filename'] = $fname;
		$p_header['stored_filename'] = $fname;
		$p_header['extra'] = '';
		$p_header['comment'] = '';
		$p_header['status'] = 'ok';
		$p_header['index'] = -1;

		//���ʵ���ļ����Ƿ�Ϊ��
		if ($p_header['stored_filename'] == "") {
			$p_header['status'] = "filtered";
		}

		//���·���ǲ���̫��
		if (strlen($p_header['stored_filename']) > 0xFF) {
			$p_header['status'] = 'filename_too_long';
		}

		//������
		if ($p_header['status'] == 'ok') {
			if ($fdata !== false){
				//���ļ������
				//����CRCУ��
				$p_header['crc'] = @crc32($fdata);
				//gzѹ��
				$v_content_compressed = @gzdeflate($fdata);
				//����ͷ������
				$p_header['compressed_size'] = strlen($v_content_compressed);
				$p_header['compression'] = 8;
				//дͷ��Ϣ
				$this->writefileheader($p_header);
				//дѹ����Ϣ
				@fwrite($this->zip_fd, $v_content_compressed, $p_header['compressed_size']);
			}else{
				//��Ŀ¼�����
				//������'/'
				if (@substr($p_header['stored_filename'], -1) != '/') {
					$p_header['stored_filename'] .= '/';
				}
				//��������
				$p_header['size'] = 0;
				//$p_header['external'] = 0x41FF0010;   // Value for a folder : to be checked
				$p_header['external'] = 0x00000010;   // Value for a folder : to be checked
				//����ͷ��Ϣ
				$this->writefileheader($p_header);
			}
		}
	}

	//ȡ��ʽ·�� /ab/cd/../ef �ĳ� /ab/ef
	function pathreduction($p_dir)
	{
		$v_result = "";

		if ($p_dir != "") {
			//�ָ�༶Ŀ¼
			$v_list = explode("/", $p_dir);
			$v_skip = 0;
			$v_listnum=count($v_list);
			for ($i=$v_listnum-1; $i>=0; $i--) {
				//�������Ŀ¼����
				if ($v_list[$i] == ".") {
					//����
				}else if ($v_list[$i] == "..") {
					$v_skip++;
				}else if ($v_list[$i] == "") {
					//����ǵ�һ��"/"
					if ($i == 0) {
						$v_result = "/".$v_result;
						if ($v_skip > 0) {
							//����·�������ֲ���
							$v_result = $p_dir;
							$v_skip = 0;
						}
					}else if ($i == ($v_listnum-1)){
						//�����·����������"/"
						$v_result = $v_list[$i];
					}else {
						//����˫б��"//"
					}
				}else{
					if ($v_skip > 0) {
						$v_skip--;
					}else{
						$v_result = $v_list[$i].($i!=($v_listnum-1)?"/".$v_result:"");
					}
				}
			}
			//����'../�����'
			if ($v_skip > 0) {
				while ($v_skip > 0) {
					$v_result = '../'.$v_result;
					$v_skip--;
				}
			}
		}
		return $v_result;
	}
}

?>