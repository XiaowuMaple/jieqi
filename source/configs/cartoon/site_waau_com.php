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
$jieqiCollect['cookiefile']='waau_com'; //�Ƿ�ʹ��cookie,�ǵĻ�����cookie�ļ���׼, ������ó� abc ��ʵ��cookie�ļ��� cookie_abc.php
$jieqiCollect['urlsite']='www.waau.com'; //��ַ
$jieqiCollect['sitename']='���޶���';  //վ��

//***************************************************************************
//������Ϣ�ɼ�
//***************************************************************************
$jieqiCollect['urlcartoon']='http://www.waau.com/comiclist/<{cartoonid}>/index.htm'; //������Ϣҳ��<{cartoonid}>
//***************************************************************************
//��������
$jieqiCollect['cartoontitle']=array('left'=>'<P>��', 'right'=>'��~', 'middle'=>'!!!!'); 
//����
$jieqiCollect['author']=array('left'=>'*���ߣ�', 'right'=>'- �����*', 'middle'=>'!!!!');
//�ؼ���
$jieqiCollect['keyword']='';
//���
$jieqiCollect['intro']=array('left'=>'<div  class=mhjj id=\'ComicInfo\'>', 'right'=>'</div>	  	  </div>		</div>', 'middle'=>'****');
//����
$jieqiCollect['sort']=array('left'=>'<li>!�������ͣ�', 'right'=>'<li>', 'middle'=>'!!!!');
//����ͼƬ
$jieqiCollect['cartoonimage']=array('left'=>'class=\'sp1\'><img src=\'', 'right'=>'\' width=\'150\' height=\'200\'', 'middle'=>'~~~~');
//���˵ķ���
$jieqiCollect['filterimage']='';
//ȫ�ı��
$jieqiCollect['fullcartoon']='';
//�������Ͷ�Ӧid
$jieqiCollect['sortid']=array('������'=>1, '��������'=>2, '����/BL'=>3, '��̽����'=>4, '����ϲ��'=>5, 'ħ��ð��'=>6, '����ֲ�'=>7, '��������'=>8, 'ս������'=>9,  'default'=>10);

//***************************************************************************
//����Ŀ¼�ɼ�
//***************************************************************************
$jieqiCollect['urlindex']='http://www.waau.com/comiclist/<{cartoonid}>/index.htm'; //����Ŀ¼ҳ��
//$jieqiCollect['indexcharset']='utf8';
//***************************************************************************
//�־�����
$jieqiCollect['volume']=array('left'=>'<a href=\'/comiclist/~\'>', 'right'=>'</a></dd>', 'middle'=>'~~~~');
//�־����
$jieqiCollect['volumeid']=array('left'=>'<a href=\'/comiclist/$/', 'right'=>'/1.htm\'>', 'middle'=>'$$$$');

$jieqiCollect['reverse'] = 1; //�Է���վ���ǴӴ�С���еģ����ǲɼ���ʱ����Ҫ��С����ɼ�
//***************************************************************************
//ȡ�÷־�ͼƬ��
//***************************************************************************

//$jieqiCollect['urlvolumeimages']=array('http://www.iieye.com/xml/comicVol/<{cartoonid}>.xml', 'http://www.iieye.com/comic/<{volumeid}>/1/index.html'); //�־�ͼƬ��
$jieqiCollect['urlvolumeimages']=array('http://www.waau.com/comiclist/<{cartoonid}>/<{volumeid}>/1.htm'); //�־�ͼƬ��
//http://www.waau.com/comiclist/1937/11340/1.htm

//http://ct.iieye.com/UserCt/comic/15818/104075/eye0001-15544.JPG|http://ct.iieye.com/UserCt/comic/15818/104075/eye0002-20541.JPG|194|NANA[���İ�] �� Vol_15|��������
$jieqiCollect['volumeimagenum']=array('left'=>'��ǰ��1 | ����', 'right'=>' | ��һҳ&nbsp;', 'middle'=>'$$$$'); //����ͼƬ��

$jieqiCollect['vimagematchall']='0'; //ƥ������Ȼ��ͳ��ͼƬ��

//***************************************************************************
//ȡ�÷־�ͼƬ��ַ
//***************************************************************************

$jieqiCollect['urlpageimage']='http://www.waau.com/comiclist/<{cartoonid}>/<{volumeid}>/<{pageid}>.htm'; //ĳҳͼƬ��ַ

$jieqiCollect['pageimageurl']=array('left'=>'<img src=\'', 'right'=>'\' name=ComicPic border=\'0\' id=ComicPic />', 'middle'=>'~~~~'); //����ͼƬ��ַ
$jieqiCollect['pageimagename']=array('left'=>'<input name="hdCuImgName" id="hdCuImgName" type="hidden" value="', 'right'=>'" />', 'middle'=>'~~~~'); //����ͼƬ��(������òɼ�������)

//***************************************************************************
//������鼰����
//***************************************************************************
//$jieqiCollect['urlcartoonxml']='http://www.waau.com/comiclist/<{cartoonid}/index.htm'; //�����������ҳ��
//$jieqiCollect['introcharset']='utf8';
//***************************************************************************
//���
//$jieqiCollect['intro']=array('left'=>'class=mhjj id=\'ComicInfo\'>', 'right'=>'</div>	  	  </div>', 'middle'=>'****');
?>