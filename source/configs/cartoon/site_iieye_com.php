<?php
//***************************************************************************
//��������
//***************************************************************************
$jieqiCollect['pagecharset'] = ''; //Ĭ�ϱ���
$jieqiCollect['referer']=0; //�Ƿ���referer
$jieqiCollect['proxy_host']=''; //�������������
$jieqiCollect['proxy_port']='';
$jieqiCollect['proxy_user']='';
$jieqiCollect['proxy_pass']='';
$jieqiCollect['loginexpire']=3600; //��ʱʱ��
$jieqiCollect['cookiefile']='iieye_com'; //�Ƿ�ʹ��cookie,�ǵĻ�����cookie�ļ���׼, ������ó� abc ��ʵ��cookie�ļ��� cookie_abc.php
$jieqiCollect['urlsite']='http://www.iieye.com'; //��ַ
$jieqiCollect['sitename']='������';  //վ��

//***************************************************************************
//������Ϣ�ɼ�
//***************************************************************************
$jieqiCollect['urlcartoon']='http://www.iieye.com/comic/<{cartoonid}>/index.html'; //������Ϣҳ��
//***************************************************************************
//��������
$jieqiCollect['cartoontitle']=array('left'=>'<span id="spTitle">', 'right'=>'</span>', 'middle'=>'!!!!'); 
//����
$jieqiCollect['author']=array('left'=>'<a target=_blank href=\'/author/goauthor.aspx?author=~\'>', 'right'=>'</a>', 'middle'=>'!!!!');
//�ؼ���
$jieqiCollect['keyword']='';
//���
//$jieqiCollect['intro']=array('left'=>'<TD vAlign="top"><span id="labMemo" style="color:#404040;">', 'right'=>'</span></TD>!<TD width="7" align="right"><IMG src="/img/1point.gif"></TD>', 'middle'=>'****');
//����
$jieqiCollect['sort']=array('left'=>'<li>!�������ͣ�', 'right'=>'<li>', 'middle'=>'!!!!');
//����ͼƬ
$jieqiCollect['cartoonimage']=array('left'=>'<input name="hdID" id="hdID" type="hidden" value="$" /><input name="hdDefaultImg" id="hdDefaultImg" type="hidden" value="', 'right'=>'" />', 'middle'=>'~~~~');
//���˵ķ���
$jieqiCollect['filterimage']='';
//ȫ�ı��
$jieqiCollect['fullcartoon']='';
//�������Ͷ�Ӧid
$jieqiCollect['sortid']=array('������'=>1, '��������'=>2, '����/BL'=>3, '��̽����'=>4, '����ϲ��'=>5, 'ħ��ð��'=>6, '����ֲ�'=>7, '��������'=>8, 'ս������'=>9,  'default'=>10);

//***************************************************************************
//����Ŀ¼�ɼ�
//***************************************************************************
$jieqiCollect['urlindex']='http://www.iieye.com/xml/comicVol/<{cartoonid}>.xml'; //����Ŀ¼ҳ��
$jieqiCollect['indexcharset']='utf8';
//***************************************************************************
//�־�����
$jieqiCollect['volume']=array('left'=>'<voldata id="~" cTitle="', 'right'=>'" cUserID="~">', 'middle'=>'~~~~');
//�־����
$jieqiCollect['volumeid']=array('left'=>'<voldata id="', 'right'=>'" cTitle="~" cUserID="~">', 'middle'=>'$$$$');

//***************************************************************************
//ȡ�÷־�ͼƬ��
//***************************************************************************

//$jieqiCollect['urlvolumeimages']=array('http://www.iieye.com/xml/comicVol/<{cartoonid}>.xml', 'http://www.iieye.com/comic/<{volumeid}>/1/index.html'); //�־�ͼƬ��
$jieqiCollect['urlvolumeimages']=array('http://www.iieye.com/comic/viewcomic.aspx?&ID=<{volumeid}>', 'http://www.iieye.com/comic/<{volumeid}>/1/index.html'); //�־�ͼƬ��
//$jieqiCollect['urlvolumeimages']=array('http://www.iieye.com/comic/<{volumeid}>/<{pageid}>/index.html', 'http://www.iieye.com/ct/xmlgetViewTxt.aspx?pi=1'); //�־�ͼƬ��

//http://ct.iieye.com/UserCt/comic/15818/104075/eye0001-15544.JPG|http://ct.iieye.com/UserCt/comic/15818/104075/eye0002-20541.JPG|194|NANA[���İ�] �� Vol_15|��������
$jieqiCollect['volumeimagenum']=array('left'=>'<input name="hdDataCount" id="hdDataCount" type="hidden" value="', 'right'=>'" />', 'middle'=>'$$$$'); //����ͼƬ��

$jieqiCollect['vimagematchall']='0'; //ƥ������Ȼ��ͳ��ͼƬ��

//***************************************************************************
//ȡ�÷־�ͼƬ��ַ
//***************************************************************************

$jieqiCollect['urlpageimage']='http://www.iieye.com/comic/<{volumeid}>/<{pageid}>/index.html'; //ĳҳͼƬ��ַ

$jieqiCollect['pageimageurl']=array('left'=>'<input name="hdUrl" id="hdUrl" type="hidden" value="', 'right'=>'" />', 'middle'=>'~~~~'); //����ͼƬ��(������òɼ�������)
$jieqiCollect['pageimagename']=array('left'=>'<input name="hdCuImgName" id="hdCuImgName" type="hidden" value="', 'right'=>'" />', 'middle'=>'~~~~'); //����ͼƬ��(������òɼ�������)

//***************************************************************************
//������鼰����
//***************************************************************************
$jieqiCollect['urlcartoonxml']='http://www.iieye.com/xml/comicMemo/<{cartoonid}>.xml'; //�����������ҳ��
$jieqiCollect['introcharset']='utf8';
//***************************************************************************
//���
$jieqiCollect['intro']=array('left'=>'<cTxt><![CDATA[', 'right'=>']]></cTxt>', 'middle'=>'****');
?>