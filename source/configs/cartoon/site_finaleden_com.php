<?php
//***************************************************************************
//��������
//***************************************************************************
$jieqiCollect['pagecharset'] = 'utf-8'; //Ĭ�ϱ���
$jieqiCollect['referer']=1; //�Ƿ���referer
$jieqiCollect['proxy_host']=''; //�������������
$jieqiCollect['proxy_port']='';
$jieqiCollect['proxy_user']='';
$jieqiCollect['proxy_pass']='';
$jieqiCollect['loginexpire']=3600; //��ʱʱ��
$jieqiCollect['cookiefile']='finaleden_com'; //�Ƿ�ʹ��cookie,�ǵĻ�����cookie�ļ���׼, ������ó� abc ��ʵ��cookie�ļ��� cookie_abc.php
$jieqiCollect['urlsite']='http://www.finaleden.com'; //��ַ
$jieqiCollect['sitename']='����ҵ���������';  //վ��

//***************************************************************************
//������Ϣ�ɼ�
//***************************************************************************
$jieqiCollect['urlcartoon']='http://www.finaleden.com/Type.aspx?id=<{cartoonid}>'; //������Ϣҳ��
//***************************************************************************
//��������
$jieqiCollect['cartoontitle']=array('left'=>'<table width="100%"><tr><td align="center" width="$"><b>', 'right'=>'</b><br /><div id="pic">', 'middle'=>'!!!!'); 
//����
$jieqiCollect['author']=array('left'=>'</div><span class="Whitblack"> ���ߣ�', 'right'=>' | ״̬��<span class="time">', 'middle'=>'!!!!');
//�ؼ���
$jieqiCollect['keyword']='';
//���
$jieqiCollect['intro']=array('left'=>'<td align="left" width="100%">&nbsp;&nbsp;�����ݼ�顿��</span>', 'right'=>'</td></tr><tr><td>', 'middle'=>'****');
//����
$jieqiCollect['sort']=array('left'=>'<div id="pic"><img src="', 'right'=>'" class="bk" border="0" alt="~" />', 'middle'=>'!!!!');
//����ͼƬ
$jieqiCollect['cartoonimage']=array('left'=>'<div id="pic"><img src="', 'right'=>'" class="bk" border="0" alt="~" />', 'middle'=>'!!!!');
$jieqiCollect['cartoonimageinurl']=1; //�ɼ����������Ƿ���Ҫ�ȷ��ʷ�������ҳ���ܷ��ʣ��ɼ���
//���˵ķ���
$jieqiCollect['filterimage']='';
//ȫ�ı��
$jieqiCollect['fullcartoon']='';
//�������Ͷ�Ӧid
$jieqiCollect['sortid']=array('������'=>1, '��������'=>2, '����/BL'=>3, '��̽����'=>4, '����ϲ��'=>5, 'ħ��ð��'=>6, '����ֲ�'=>7, '��������'=>8, 'ս������'=>9,  'default'=>10);

//***************************************************************************
//����Ŀ¼�ɼ�
//***************************************************************************
$jieqiCollect['urlindex']='http://www.finaleden.com/Type.aspx?id=<{cartoonid}>'; //����Ŀ¼ҳ��
//$jieqiCollect['indexcharset']='utf8';
//***************************************************************************
//<a href="http://www.finaleden.com/ShowDialog.aspx?id=37674" target="_blank">��ħʥ��_VOL10</a><br><span class="time">2007-8-30 12:40:00</span><br></td>
//<a href="http://www.finaleden.com/ShowDialog.aspx?id=37676" target="_blank">���Ǵ�_CH161</a></td><td align="center" >
//�־�����
$jieqiCollect['volume']=array('left'=>'<a href="~ShowDialog.aspx?id=$" target="_blank">', 'right'=>'</a></td>', 'middle'=>'~~~~');
//�־����
$jieqiCollect['volumeid']=array('left'=>'<a href="~ShowDialog.aspx?id=', 'right'=>'" target="_blank">!</a></td>', 'middle'=>'$$$$');
$jieqiCollect['reverse'] = 1; //�Է���վ���ǴӴ�С���еģ����ǲɼ���ʱ����Ҫ��С����ɼ�
//***************************************************************************
//ȡ�÷־�ͼƬ��
//***************************************************************************

//$jieqiCollect['urlvolumeimages']=array('http://www.iieye.com/xml/comicVol/<{cartoonid}>.xml', 'http://www.iieye.com/comic/<{volumeid}>/1/index.html'); //�־�ͼƬ��
$jieqiCollect['urlvolumeimages']=array('http://www.finaleden.com/ShowDialog.aspx?id=<{volumeid}>','http://www.finaleden.com/display.aspx?id=<{volumeid}>'); //�־�ͼƬ��
//$jieqiCollect['urlvolumeimages']=array('http://www.iieye.com/comic/<{volumeid}>/<{pageid}>/index.html', 'http://www.iieye.com/ct/xmlgetViewTxt.aspx?pi=1'); //�־�ͼƬ��

//http://ct.iieye.com/UserCt/comic/15818/104075/eye0001-15544.JPG|http://ct.iieye.com/UserCt/comic/15818/104075/eye0002-20541.JPG|194|NANA[���İ�] �� Vol_15|��������
$jieqiCollect['volumeimagenum']=array('left'=>'array_img[$] = \'', 'right'=>'\';', 'middle'=>'~~~~'); //����ͼƬ��

$jieqiCollect['vimagematchall']='1'; //ƥ������Ȼ��ͳ��ͼƬ��

//***************************************************************************
//ȡ�÷־�ͼƬ��ַ
//***************************************************************************

//$jieqiCollect['urlpageimage']=array('http://www.finaleden.com/ShowDialog.aspx?id=<{volumeid}>','http://www.finaleden.com/display.aspx?id=<{volumeid}>'); //ĳҳͼƬ��ַ
$jieqiCollect['urlvimagelist']='http://www.finaleden.com/ShowDialog.aspx?id=<{volumeid}>'; //ĳҳͼƬ��ַ
$jieqiCollect['urlvimagelist2']='http://www.finaleden.com/display.aspx?id=<{volumeid}>'; //ĳҳͼƬ��ַ

//$jieqiCollect['pageimageurl']=array('left'=>'array_img[$] = \'', 'right'=>'\';', 'middle'=>'~~~~'); //����ͼƬ��(������òɼ�������)
$jieqiCollect['colvimagelist']=array('left'=>'array_img[$] = \'', 'right'=>'\';', 'middle'=>'~~~~'); //����ͼƬ��(������òɼ�������)
//$jieqiCollect['pageimagename']=array('left'=>'<input name="hdCuImgName" id="hdCuImgName" type="hidden" value="', 'right'=>'" />', 'middle'=>'~~~~'); //����ͼƬ��(������òɼ�������)

//***************************************************************************
//������鼰����
//***************************************************************************
//$jieqiCollect['urlcartoonxml']='http://www.iieye.com/xml/comicMemo/<{cartoonid}>.xml'; //�����������ҳ��
//$jieqiCollect['introcharset']='utf8';
//***************************************************************************
//���
//$jieqiCollect['intro']=array('left'=>'<cTxt><![CDATA[', 'right'=>']]></cTxt>', 'middle'=>'****');



//���� ��������Javascript��unescape����unescape
function jieqi_utf8RawUrlDecode($source) { 
    $decodedStr = ""; 
    $pos = 0; 
    $len = strlen ($source); 
    while ($pos < $len) { 
        $charAt = substr ($source, $pos, 1); 
        if ($charAt == '%') { 
            $pos++; 
            $charAt = substr ($source, $pos, 1); 
            if ($charAt == 'u') { 
                // we got a unicode character 
                $pos++; 
                $unicodeHexVal = substr ($source, $pos, 4); 
                $unicode = hexdec ($unicodeHexVal); 
                $entity = "&#". $unicode . ';'; 
                $decodedStr .= utf8_encode ($entity); 
                $pos += 4; 
            } 
            else { 
                // we have an escaped ascii character 
                $hexVal = substr ($source, $pos, 2); 
                $decodedStr .= chr (hexdec ($hexVal)); 
                $pos += 2; 
            } 
        } else { 
            $decodedStr .= $charAt; 
            $pos++; 
        } 
    } 
    return $decodedStr; 
}

/*
function jieqi_unescape($str) { 
         $str = rawurldecode($str); 
         preg_match_all("/%u.{4}|&#x.{4};|&#d+;|.+/U",$str,$r); 
         $ar = $r[0]; 
         foreach($ar as $k=>$v) { 
                  if(substr($v,0,2) == "%u") 
                           $ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,-4))); 
                  elseif(substr($v,0,3) == "&#x") 
                           $ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,3,-1))); 
                  elseif(substr($v,0,2) == "&#") { 
                           $ar[$k] = iconv("UCS-2","GBK",pack("n",substr($v,2,-1))); 
                  } 
         } 
         return join("",$ar); 
}
*/

//2007.09.04 Yingxiangjun�޸İ�
function jieqi_unescape($str) { 
         $str = rawurldecode($str); 
         preg_match_all("/%u.{4}|&#x.{4};|&#d+;|.+/U",$str,$r); 
         $ar = $r[0]; 
         foreach($ar as $k=>$v) { 
                  if(substr($v,0,2) == "%u") 
                           $ar[$k] = iconv("UCS-2BE","GBK//IGNORE",pack("H4",substr($v,-4))); 
                  elseif(substr($v,0,3) == "&#x") 
                           $ar[$k] = iconv("UCS-2BE","GBK//IGNORE",pack("H4",substr($v,3,-1))); 
                  elseif(substr($v,0,2) == "&#") { 
                           $ar[$k] = iconv("UCS-2BE","GBK//IGNORE",pack("n",substr($v,2,-1))); 
                  } 
         } 
         return join("",$ar); 
}

function jieqi_colimageurl_custom($params=array()){
	global $colary;
	global $jieqiCollect;
	global $col_image_path;
	global $col_volume_images;

	//�ȷ����ܵ���ҳ�����ڼ�¼cookie
/*	$url=str_replace(array('<{cartoonid}>', '<{volumeid}>', '<{pageid}>'), array($params['fromcid'], $params['fromvid'], $params['frompid']), $jieqiCollect['colvimagelist']);
	$res=jieqi_httpcontents($url, $colary);
	//�����·�������ڣ���ȡ·��
	if(!isset($col_image_path[$params['fromcid']])){
		$url=str_replace(array('<{cartoonid}>', '<{volumeid}>', '<{pageid}>'), array($params['fromcid'], $params['fromvid'], $params['frompid']), $jieqiCollect['urimagepath']);
		$res=jieqi_httpcontents($url, $colary);

		$col_image_path[$params['fromcid']]='';
		$pregstr=jieqi_collectstoe($jieqiCollect['colimagepath']);
		if(!empty($pregstr)){
			$matchvar=jieqi_cmatchone($pregstr, $res);
			if(!empty($matchvar)) $col_image_path[$params['fromcid']]=unescape($matchvar);
		}
	} */

//���ͼƬ�б����ڣ���ȡͼƬ�б�
if(!isset($col_volume_images[$params['fromvid']])){
	$colary['charset']='utf-8'; 
	$url=str_replace(array('<{cartoonid}>', '<{volumeid}>'), array($params['fromcid'], $params['fromvid']), $jieqiCollect['urlvimagelist']);
	$res=jieqi_httpcontents($url, $colary);
	$url=str_replace(array('<{cartoonid}>', '<{volumeid}>'), array($params['fromcid'], $params['fromvid']), $jieqiCollect['urlvimagelist2']);
	$res=jieqi_httpcontents($url, $colary);
	$col_volume_images[$params['fromvid']]=array();
	$pregstr=jieqi_collectstoe($jieqiCollect['colvimagelist']);
	if(!empty($pregstr)){
		$matchvar=jieqi_cmatchall($pregstr, $res);
		if(!empty($matchvar)) $col_volume_images[$params['fromvid']]=$matchvar;
	}
}

//������ַ
return jieqi_unescape($col_volume_images[$params['fromvid']][$params['frompid']-1]);
}

//�������
$jieqiCollect['listcollect'][0]['title']='�������'; //�ɼ���������
$jieqiCollect['listcollect'][0]['urlpage']='http://www.finaleden.com/NewComic.aspx?page=<{pageid}>'; //�ɼ���ַ
$jieqiCollect['listcollect'][0]['cartoonid']=array('left'=>'" /></a></div><a href="Type.aspx?id=', 'right'=>'">~', 'middle'=>'$$$$');  //��ȡ����id����
$jieqiCollect['listcollect'][0]['cartoonname']=array('left'=>'" /></a></div><a href="Type.aspx?id=$">', 'right'=>'', 'middle'=>'~~~~');  //��ȡ�������ƹ���
$jieqiCollect['listcollect'][0]['nextpageid']=array('left'=>'<a href="NewComic.aspx?page=">', 'right'=>'">', 'middle'=>'!!!!'); //��ȡ��һҳ����
$jieqiCollect['listcollect'][0]['startpageid']='';  //��һҳ����
$jieqiCollect['listcollect'][0]['maxpagenum']=5;  //���ɼ���ҳ


?>