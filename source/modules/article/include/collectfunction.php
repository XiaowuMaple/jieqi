<?php 
/**
 * ���²ɼ���غ�������
 *
 * ���²ɼ���غ�������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: collectfunction.php 230 2008-11-27 08:46:07Z juny $
 */

if(!defined('JIEQI_ROOT_PATH')) exit;

//�ύ�ı���ת�ɱ���ı���
function jieqi_collectptos($str){
	$str=trim($str);
	$middleary=array('****', '!!!!', '~~~~', '^^^^', '$$$$');
	while(list($k, $v) = each($middleary)){
		if(strpos($str, $v)!==false){
			$tmpary=explode($v, $str);
			return array('left'=>strval($tmpary[0]), 'right'=>strval($tmpary[1]), 'middle'=>$v);
		}
	}
	return $str;
}

//����ı���ת����ʾ�ı���
function jieqi_collectstop($str){
	if(is_array($str))return $str['left'].$str['middle'].$str['right'];
	else return $str;
}

//�����ݱ��ת����preg���
function jieqi_collectmtop($str){
	switch($str){
		case '!!!!':
			return '([^\>\<]*)';
			break;
		case '~~~~':
			return '([^\<\>\'"]*)';
			break;
		case '^^^^':
			return '([^\<\>\d]*)';
			break;
		case '$$$$':
			return '([\d]*)';
			break;
		case '****':
		default:
			return '(.*)';
			break;
	}
}

//������Ĳɼ�����ת����ִ�е�
function jieqi_collectstoe($str){
	if(is_array($str)){
		$pregstr='/'.jieqi_pregconvert($str['left']).jieqi_collectmtop($str['middle']).jieqi_pregconvert($str['right']).'/is';
	}else{
		$pregstr=trim($str);
		if(strlen($pregstr) > 0 && substr($pregstr,0,1) != '/') $pregstr='/'.str_replace(array(' ', '/'), array('\s', '\/'), preg_quote($pregstr)).'/is';
	}
	return $pregstr;
}

//ƥ��һ�����
function jieqi_cmatchone($pregstr, $source){
	$matches=array();
	preg_match($pregstr, $source, $matches);
	if(!is_array($matches) || count($matches)==0){
		return false;
	}else{
		return $matches[count($matches)-1];
	}
}

// ƥ�������
function jieqi_cmatchall($pregstr, $source, $flags=0){
	$matches=array();
	if($flags == PREG_OFFSET_CAPTURE) preg_match_all($pregstr, $source, $matches, PREG_OFFSET_CAPTURE + PREG_SET_ORDER);
	else preg_match_all($pregstr, $source, $matches, PREG_SET_ORDER);
	if(!is_array($matches) || count($matches)==0){
		return false;
	}else{
		$ret=array();
		foreach($matches as $v){
			if(is_array($v)) $ret[]=$v[count($v)-1];
			else $ret[]=$v;
		}
		return $ret;
	}
}

//�Ƚ������½��Ƿ���ͬ
function jieqi_equichapter($chapter1, $chapter2){
	$retfrom=array(' ', '��', '<', '>', '��', '��', '[', ']', '��', '��', '��', '��', '(', ')', 'T', 'ͼ');
	if($chapter1 == $chapter2){
		return true;
	}elseif(str_replace($retfrom, '', $chapter1)==str_replace($retfrom, '', $chapter2)){
		return true;
	}else{
		$tmpary1=jieqi_splitchapter($chapter1);
		$tmpary2=jieqi_splitchapter($chapter2);
		if($tmpary1['pnum']==$tmpary2['pnum'] && $tmpary1['cname']==$tmpary2['cname']) return true;
		else return false;
	}
}

//******************************************************************
/*
�ֽ�������½�
Array
(
    [vid] => 1 �־����
    [vname] =>xxxx �־���
    [fcid] => 0 ��ʼ�½����
    [fcname] =>xxxx  ��ʼ�½�
    [cid] => 17 �����½����
    [cname] =>xxxx �����½�
    [sid] => 1 �½������
    [sname] => �½�������
    [pnum] => 1001701 �ϲ����
)
*/
function jieqi_splitchapter($str){
	$ret=array('vid'=>0, 'vname'=>'', 'fcid'=>0, 'fcname'=>'', 'cid'=>0, 'cname'=>'', 'sid'=>0, 'sname'=>'', 'pnum'=>0);
	$numary=array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '��', 'һ', '��', '��', '��', '��', '��', '��', '��', '��', 'ʮ', '��', 'ǧ', '��', '��', '��', '��');
	$vary=array('��','��','��','ƪ');
	$cary=array('��', '��', '��');
	$sary=array(')', '��', '��');
	$aary=array('��', '��', '(', '��');
	$splitary=array_merge($vary,$cary,$sary,$aary);
	$str=trim($str);
	$str=str_replace(array('<', '>'),array('��', '��'), $str);
	$str=jieqi_textstr($str);
	$slen=strlen($str);

	//Ѱ�ҷ־�
	$i=0;

	$nstart=0;
	while($i<$slen){
		$tmpstr=$str[$i];
		if (ord($str[$i]) > 0x80 && $i < $slen -1) {
			$tmpstr .= $str[$i+1];
			$cl=2;
		}else{
			$cl=1;
		}
		$i+=$cl;
		if(in_array($tmpstr, $vary)){
			//�ҵ��־���
			if($i-$cl == 0){
				//������ǰ
				$k=$i;
				$numstr='';
				while($k<$slen){
					$tmpstr=$str[$k];
					if(ord($str[$k]) > 0x80 && $k < $slen -1){
						$tmpstr.=$str[$k+1];
						$k++;
					}
					$k++;
					if(in_array($tmpstr, $numary)) $numstr.=$tmpstr;
					elseif($tmpstr==' ');
					else break;
				}
				$ret['vid']=jieqi_numcntoab($numstr);
				$nstart=$k;
			}else{
				//�����ں�
				$k=$i-$cl;
				$numstr='';
				while($k>0){
					if($k>=2 && ord($str[$k-1]) > 0x80){
						$tmpstr=$str[$k-2].$str[$k-1];
						$k-=2;
					}else{
						$tmpstr=$str[$k-1];
						$k--;
					}
					if(in_array($tmpstr, $numary)) $numstr=$tmpstr.$numstr;
					elseif($tmpstr==' ');
					else break;
				}
				$ret['vid']=jieqi_numcntoab($numstr);
				$nstart=$i;
			}
			break;
		}

	}
	if($i>=$slen) $i=0;
	//*********************************************************
	//����᲻�����º���
	if($i>0){
		$j=0;
		while($j<$i){
			$tmpstr=$str[$j];
			if(ord($str[$j]) > 0x80 && $j < $slen -1) {
				$tmpstr .= $str[$j+1];
				$j++;
			}
			$j++;
			if(in_array($tmpstr, $cary)){
				$i=0;
				$nstart=0;
				$ret['vid']=0;
				break;
			}
		}
	}
	//Ѱ���½�
	while($i<$slen){
		$tmpstr=$str[$i];
		if (ord($str[$i]) > 0x80 && $i < $slen -1) {
			$tmpstr .= $str[$i+1];
			$cl=2;
		}else{
			$cl=1;
		}
		$i+=$cl;

		if(in_array($tmpstr, $cary)){
			//�ҵ��½ڱ��
			$k=$i-$cl;
			$numstr='';
			while($k>$nstart){
				if($k>=2 && ord($str[$k-1]) > 0x80){
					$tmpstr=$str[$k-2].$str[$k-1];
					$j=2;
				}else{
					$tmpstr=$str[$k-1];
					$j=1;
				}
				if(in_array($tmpstr, $numary)) $numstr=$tmpstr.$numstr;
				elseif($tmpstr==' ');
				else break;
				$k-=$j;
			}
			$ret['cid']=jieqi_numcntoab($numstr);


			//������û��ʼ�½�
			if($tmpstr != '��' && $tmpstr != ' '){
				$k-=$j;
				$numstr='';
				while($k>$nstart){
					if($k>=2 && ord($str[$k-1]) > 0x80){
						$tmpstr=$str[$k-2].$str[$k-1];
						$j=2;
					}else{
						$tmpstr=$str[$k-1];
						$j=1;
					}
					if(in_array($tmpstr, $numary)) $numstr=$tmpstr.$numstr;
					elseif($tmpstr==' ');
					else break;
					$k-=$j;
				}
				if(!empty($numstr)) $ret['fcid']=jieqi_numcntoab($numstr);
			}

			//ȡ�־�����
			if($k>$nstart) $ret['vname']=jieqi_usefultitle(substr($str,$nstart,$k-$nstart));
			$nstart=$i;
			break;
		}

	}
	if($i>=$slen) $i=0;
	//*********************************************************
	//����Ѱ����ֹ�½�
	$baki=$i;
	while($i<$slen){
		$tmpstr=$str[$i];
		if (ord($str[$i]) > 0x80 && $i < $slen -1) {
			$tmpstr .= $str[$i+1];
			$cl=2;
		}else{
			$cl=1;
		}
		$i+=$cl;

		if(in_array($tmpstr, $cary)){
			//�ҵ��½ڱ��
			$k=$i-$cl;
			$numstr='';
			while($k>$nstart){
				if($k>=2 && ord($str[$k-1]) > 0x80){
					$tmpstr=$str[$k-2].$str[$k-1];
					$j=2;
				}else{
					$tmpstr=$str[$k-1];
					$j=1;
				}
				if(in_array($tmpstr, $numary)) $numstr=$tmpstr.$numstr;
				elseif($tmpstr==' ');
				else break;
				$k-=$j;
			}
			if(!empty($numstr)){
				$ret['fcid']=$ret['cid'];
				$ret['cid']=jieqi_numcntoab($numstr);
				//ȡ��ʼ�½�����
				if($k>$nstart) $ret['fcname']=jieqi_usefultitle(substr($str,$nstart,$k-$nstart));
			}
			$nstart=$i;
			break;
		}

	}
	if($i>=$slen) $i=$baki;
	//*********************************************************
	//Ѱ�ҷֶ�
	$k=$slen;
	$tmpstr='';
	while($k>=2 && $k>$nstart){
		if(ord($str[$k-1]) > 0x80){
			$tmpstr=$str[$k-2].$str[$k-1];
			$cl=2;
		}else{
			$tmpstr=$str[$k-1];
			$cl=1;
		}
		$k-=$cl;
		if(in_array($tmpstr, $sary)){
			$numstr='';
			while($k>$i){
				if($k>=2 && ord($str[$k-1]) > 0x80){
					$tmpstr=$str[$k-2].$str[$k-1];
					$k-=2;
				}else{
					$tmpstr=$str[$k-1];
					$k--;
				}
				if(in_array($tmpstr, $numary)) $numstr=$tmpstr.$numstr;
				elseif($tmpstr==' ');
				else break;
			}
			
			if(!empty($numstr)) $ret['sid']=jieqi_numcntoab($numstr);
			else $k=$slen;
			break;
		}
	}
	if($k<=$nstart) $k=$slen;


	//ȡ�½�����
	while($k>$nstart){
		if($k>=2 && ord($str[$k-1]) > 0x80){
			$tmpstr=$str[$k-2].$str[$k-1];
			$j=2;
		}else{
			$tmpstr=$str[$k-1];
			$j=1;
		}
		if(!in_array($tmpstr, $aary)) break;
		$k-=$j;
	}
	if($k>$nstart) $ret['cname']=jieqi_usefultitle(substr($str,$nstart,$k-$nstart));
	
	//�־���Ų��ܴ���100, ���ı�ʾ��һ��
	if($ret['vid']>=100) $ret['vid']=0;
	elseif(substr($str,0,5)=='���� ') $ret['vid']=1;
	//�����ǵڼ��µڼ������
	if($ret['vid']==0 && $ret['cid']>0 && strpos($str,'��')>0 && strpos($str, '��')>0){
		$numstr1=jieqi_getsnumbyid($str, '��');
		$numstr2=jieqi_getsnumbyid($str, '��');
		if(!empty($numstr1) && !empty($numstr2)){
			$ret['vid']=jieqi_numcntoab($numstr1);
			$ret['cid']=jieqi_numcntoab($numstr2);
		}
	}
	//����½�û�У��зֶΣ��ѷֶ���Ϊ�½�
	if($ret['cid']==0 && $ret['sid']>0){
		$ret['cid']=$ret['sid'];
		$ret['sid']=0;
	}
	//����������־���½�
	if($ret['cid']==0){
		$numstr=jieqi_getsnumbyid($str, array('��', '��', '.', ':', ' '));
		if(!empty($numstr)){
			$ret['cid']=jieqi_numcntoab($numstr);
		}else{
			if(!empty($ret['vid'])){
				$numstr=jieqi_getsnumbyid($str, array('��', '��'));
				if(!empty($numstr)) $ret['cid']=jieqi_numcntoab($numstr);
			}
		}
	}
	//�����½����ƾ������ֵ����
	if($ret['vid']==0 && $ret['cid']==0 && $ret['sid']==0){
		$ret['cid']=jieqi_numcntoab($str);
	}
	//�½���Ų��ܴ���10000
	if($ret['cid']>=10000) $ret['cid']=$ret['cid'] % 10000;
	//�ֶ���Ų��ܴ���100
	if($ret['sid']>=100) $ret['sid']=$ret['sid'] % 100;
	//��Ȩ��
	$ret['pnum']=($ret['vid'] * 1000000) + ($ret['cid'] * 100) + $ret['sid'];
	return $ret;
}

//���ַ����и��ݱ��ȥ��߻����ұߵ����ֲ���
function jieqi_getsnumbyid($str, $id, $left=false, $start=0){
	if(is_array($id)) $idary=$id;
	else $idary[]=$id;
	$numstr='';
	$ret='';
	$numary=array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '��', 'һ', '��', '��', '��', '��', '��', '��', '��', '��', 'ʮ', '��', 'ǧ', '��', '��', '��', '��');
	
	$slen=strlen($str);
	$i=$start;
	while($i<$slen){
		$tmpstr=$str[$i];
		if (ord($str[$i]) > 0x80 && $i < $slen -1) {
			$tmpstr .= $str[$i+1];
			$cl=2;
		}else{
			$cl=1;
		}
		$i+=$cl;
		//�ҵ��ָ���
		if(in_array($tmpstr, $idary)){
			if($left){
				//�����ǰ
				$k=$i;
				while($k<$slen){
					$tmpstr=$str[$k];
					if(ord($str[$k]) > 0x80 && $k < $slen -1){
						$tmpstr.=$str[$k+1];
						$k++;
					}
					$k++;
					if(in_array($tmpstr, $numary)) $numstr.=$tmpstr;
					elseif($tmpstr==' ');
					else break;
				}
			}else{
				//����ں�
				$k=$i-$cl;
				$numstr='';
				while($k>0){
					if($k>=2 && ord($str[$k-1]) > 0x80){
						$tmpstr=$str[$k-2].$str[$k-1];
						$k-=2;
					}else{
						$tmpstr=$str[$k-1];
						$k--;
					}
					if(in_array($tmpstr, $numary)) $numstr=$tmpstr.$numstr;
					elseif($tmpstr==' ');
					else break;
				}
			}
			if(!empty($numstr)) break;
		}
	}
	return $numstr;
}

//��������ת���ɰ���������
function jieqi_numcntoab($str){
	$ret=0;
	$str=trim($str);
	if(is_numeric($str)) $ret=intval($str);
	else{
		$numary=array('0'=>'0', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '��'=>'0', 'һ'=>'1', '��'=>'2', '��'=>'3', '��'=>'4', '��'=>'5', '��'=>'6', '��'=>'7', '��'=>'8', '��'=>'9', '��'=>'1', '��'=>'2', '��'=>'3');
		$splitary=array('ʮ'=>1, '��'=>2, 'ǧ'=>3, '��'=>4);
		$slen=strlen($str);
		$numstr='';
		$i=$slen-1;
		$minlen=0;
		while($i>=0){
			if($i>0 && ord($str[$i]) > 0x80){
				$tmpstr=$str[$i-1].$str[$i];
				$i--;
			}else{
				$tmpstr=$str[$i];
			}
			$i--;
			if(isset($numary[$tmpstr])){
				$numstr=$numary[$tmpstr].$numstr;
			}elseif(isset($splitary[$tmpstr])){
				if(strlen($numstr) > $splitary[$tmpstr]){
					$numstr=substr($numstr,0,$splitary[$tmpstr]);
				}elseif(strlen($numstr) < $splitary[$tmpstr]){
					$start=strlen($numstr);
					for($j=$start; $j<$splitary[$tmpstr]; $j++) $numstr='0'.$numstr;
				}
				$minlen=$splitary[$tmpstr]+1;
			}else{
				$numstr='0';
				break;
			}
		}
		if(empty($numstr)) $numstr='0';
		if(strlen($numstr) < $minlen){
			$start=strlen($numstr);
			for($j=$start; $j<$minlen-1; $j++) $numstr='0'.$numstr;
			$numstr='1'.$numstr;
		}
		$ret=intval($numstr);
	}
	return $ret;
}

//ȡ�½ڻ��߾����Ч����
function jieqi_usefultitle($str){
	$str=trim($str);
	$sary=array(' ', '��', '��', ':', '~', '��', '-','��');
	$slen=strlen($str);
	$s=0;
	$e=$slen;
	while($s<$slen){
		$tmpstr=$str[$s];
		if(ord($str[$s]) > 0x80 && $s < $slen-1){
			$tmpstr.=$str[$s+1];
			$j=2;
		}else{
			$j=1;
		}
		if(!in_array($tmpstr, $sary)) break;
		$s+=$j;
	}

	while($e>0){
		$tmpstr=$str[$e-1];
		if(ord($str[$e-1]) > 0x80 && $e > 1){
			$tmpstr=$str[$e-2].$tmpstr;
			$j=2;
		}else{
			$j=1;
		}
		if(!in_array($tmpstr, $sary)) break;
		$e-=$j;
	}

	if($e>$s) $ret=substr($str,$s,$e-$s);
	else $ret='';
	return $ret;
}
?>