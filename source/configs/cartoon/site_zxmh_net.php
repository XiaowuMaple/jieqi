<?php
//***************************************************************************
//��������
//***************************************************************************
$jieqiCollect['pagecharset'] = ''; //Ĭ�ϱ���
$jieqiCollect['referer']=1; //�Ƿ���referer
$jieqiCollect['proxy_host']=''; //�������������
$jieqiCollect['proxy_port']='';
$jieqiCollect['proxy_user']='';
$jieqiCollect['proxy_pass']='';
$jieqiCollect['loginexpire']=3600; //��ʱʱ��
$jieqiCollect['cookiefile']='zxmh_net'; //�Ƿ�ʹ��cookie,�ǵĻ�����cookie�ļ���׼, ������ó� abc ��ʵ��cookie�ļ��� cookie_abc.php
$jieqiCollect['urlsite']='http://www.zxmh.net'; //��ַ
$jieqiCollect['sitename']='��������';  //վ��

//***************************************************************************
//������Ϣ�ɼ�
//***************************************************************************
$jieqiCollect['urlcartoon']='http://www.zxmh.net/html/book<{cartoonid}>/'; //������Ϣҳ��
//***************************************************************************
//��������
$jieqiCollect['cartoontitle']=array('left'=>'<div id="pageBody">!<div id="bodyMainWrapper">!<div id="position">����λ�ã�<a href="~">��ҳ</a> -><a href="!">!</a>->', 'right'=>'</div>', 'middle'=>'!!!!'); 

//����
$jieqiCollect['author']=array('left'=>'<br />���������ߡ� ', 'right'=>'<br />', 'middle'=>'!!!!');
//�ؼ���
$jieqiCollect['keyword']='';
//���
$jieqiCollect['intro']=array('left'=>'<br />�����ݼ�顿 <br />', 'right'=>'<hr>', 'middle'=>'!!!!');
//����
$jieqiCollect['sort']='';
//����ͼƬ
$jieqiCollect['cartoonimage']=array('left'=>'<div id="table_top"></div><a href="/html/book$/"!><img alt="~"  src="', 'right'=>'"!></a>', 'middle'=>'~~~~');

//���˵ķ���
$jieqiCollect['filterimage']='';
//ȫ�ı��
$jieqiCollect['fullcartoon']='�����</h1>';
//�������Ͷ�Ӧid
$jieqiCollect['sortid']=array('default'=>10);

//***************************************************************************
//����Ŀ¼�ɼ�
//***************************************************************************
$jieqiCollect['urlindex']='http://www.zxmh.net/html/book<{cartoonid}>/'; //����Ŀ¼ҳ��
//***************************************************************************
//�־�����

$jieqiCollect['volume']=array('left'=>'<li><a href="volume$.htm" >', 'right'=>'</a>', 'middle'=>'!!!!');
//�־����
$jieqiCollect['volumeid']=array('left'=>'<li><a href="volume', 'right'=>'.htm" >', 'middle'=>'$$$$');

//***************************************************************************
//ȡ�÷־�ͼƬ��
//***************************************************************************

$jieqiCollect['urlvolumeimages']=array('http://www.zxmh.net/html/book<{cartoonid}>/volume<{volumeid}>.htm', 'http://www.zxmh.net/jspage/<{cartoonid}>/<{volumeid}>.js'); //�־�ͼƬ��

//var datas = new Array();
//datas[1] = 'L2VuZC1hL2Fsc3h5L1ZvbF8wMS8=MDAxODYwMjJGLmpwZw==';
//datas[2] = 'L2VuZC1hL2Fsc3h5L1ZvbF8wMS8=MDAyODQwNDJBLmpwZw==';
//datas[3] = 'L2VuZC1hL2Fsc3h5L1ZvbF8wMS8=MDAzODIwNjI1LmpwZw==';
$jieqiCollect['volumeimagenum']=array('left'=>'datas[$] = \'', 'right'=>'\';', 'middle'=>'~~~~'); //����ͼƬ��
$jieqiCollect['vimagematchall']='1'; //ƥ������Ȼ��ͳ��ͼƬ��

//***************************************************************************
//ȡ�÷־�ͼƬ��ַ
//***************************************************************************

//$jieqiCollect['urlpageimage']=array('http://www.zxmh.net/html/book<{cartoonid}>/volume<{volumeid}>.htm?p=<{pageid}>'); //ĳҳͼƬ��ַ

//$jieqiCollect['pageimageurl']='/(http[^\|]+)\|http[^\|]+\|\d*\|/is'; //����ͼƬ��(������òɼ�������)


//�Ķ�ҳ��
$jieqiCollect['urlpageread']='http://www.zxmh.net/html/book<{cartoonid}>/volume<{volumeid}>.htm?p=<{pageid}>'; 
//��Ŀ¼ҳ��
$jieqiCollect['urimagepath']='http://www.zxmh.net/jsbook/<{cartoonid}>/pic_path.js';  //�޸� by wuqiang 2007.07.25
//var pic_path = 'aHR0cDovL3BpYzQuenhtaDIubmV0';
//��Ŀ¼����
$jieqiCollect['colimagepath']=array('left'=>'var pic_path = \'', 'right'=>'\';', 'middle'=>'~~~~');

//ͼƬ�б��ַ
$jieqiCollect['urlvimagelist']='http://www.zxmh.net/jspage/<{cartoonid}>/<{volumeid}>.js'; //�־�ͼƬ��
//ͼƬ�б����
$jieqiCollect['colvimagelist']=array('left'=>'datas[$] = \'', 'right'=>'\';', 'middle'=>'~~~~'); //����ͼƬ��


//ȡ��һ��ͼƬ��ַ
function jieqi_colimageurl_custom($params=array()){
	global $colary;
	global $jieqiCollect;
	global $col_image_path;
	global $col_volume_images;

	//�ȷ����ܵ���ҳ�����ڼ�¼cookie
	$url=str_replace(array('<{cartoonid}>', '<{volumeid}>', '<{pageid}>'), array($params['fromcid'], $params['fromvid'], $params['frompid']), $jieqiCollect['urlpageread']);
	$res=jieqi_httpcontents($url, $colary);
	//�����·�������ڣ���ȡ·��
	if(!isset($col_image_path[$params['fromcid']])){
		$url=str_replace(array('<{cartoonid}>', '<{volumeid}>', '<{pageid}>'), array($params['fromcid'], $params['fromvid'], $params['frompid']), $jieqiCollect['urimagepath']);
		$res=jieqi_httpcontents($url, $colary);

		$col_image_path[$params['fromcid']]='';
		$pregstr=jieqi_collectstoe($jieqiCollect['colimagepath']);
		if(!empty($pregstr)){
			$matchvar=jieqi_cmatchone($pregstr, $res);
			if(!empty($matchvar)) $col_image_path[$params['fromcid']]=jieqi_cartoon_decode64($matchvar);
		}
	} 

	//���ͼƬ�б����ڣ���ȡͼƬ�б�
	if(!isset($col_volume_images[$params['fromvid']])){
		$url=str_replace(array('<{cartoonid}>', '<{volumeid}>', '<{pageid}>'), array($params['fromcid'], $params['fromvid'], $params['frompid']), $jieqiCollect['urlvimagelist']);
		$res=jieqi_httpcontents($url, $colary);

		$col_volume_images[$params['fromvid']]=array();
		$pregstr=jieqi_collectstoe($jieqiCollect['colvimagelist']);
		if(!empty($pregstr)){
			$matchvar=jieqi_cmatchall($pregstr, $res);
			if(!empty($matchvar)) $col_volume_images[$params['fromvid']]=$matchvar;
		}
	}

	//������ַ
	return $col_image_path[$params['fromcid']].jieqi_cartoon_decode64($col_volume_images[$params['fromvid']][$params['frompid']-1]);
}

//�Զ���base64 decode
function jieqi_cartoon_decode64($input){
	$keystr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	$output = '';
	$i = 0;

	$len=strlen($input);
	if($len % 4 != 0) return '';
	$i=0;
	while($i<$len){
		$enc1=strpos($keystr, $input[$i++]);
		$enc2=strpos($keystr, $input[$i++]);
		$enc3=strpos($keystr, $input[$i++]);
		$enc4=strpos($keystr, $input[$i++]);

		$chr1 = ($enc1 << 2) | ($enc2 >> 4);
		$chr2 = (($enc2 & 15) << 4) | ($enc3 >> 2);
		$chr3 = (($enc3 & 3) << 6) | $enc4;

		$output .= chr($chr1);

		if ($enc3 != 64) {
			$output .= chr($chr2);
		}
		if ($enc4 != 64) {
			$output .= chr($chr3);
		}
	}
	return $output;
}
?>