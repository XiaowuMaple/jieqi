<?php
$jieqiCollect['siteurl']='http://hjsm.tom.com'; //��ַ
$jieqiCollect['sitename']='�ý�����';  //վ��
$jieqiCollect['subarticleid']='';  //���������
$jieqiCollect['subchapterid']='';  //�½������
$jieqiCollect['autoclear']=0; //�½��޷���Ӧ���Ƿ��Զ�������²ɼ�
$jieqiCollect['defaultfull']=0; //Ĭ���Ƿ�ȫ��
$jieqiCollect['referer']=0; //�Ƿ���referer
$jieqiCollect['proxy_host']=''; //�������������
$jieqiCollect['proxy_port']='';
$jieqiCollect['proxy_user']='';
$jieqiCollect['proxy_pass']='';
//****************************************************************************************
$jieqiCollect['urlarticle']='http://hjsm.tom.com/book.php?book_id=<{articleid}>'; //������Ϣҳ��
//���±���
$jieqiCollect['articletitle']=array('left'=>'<li id=sm><strong>', 'right'=>'</strong></li>', 'middle'=>'!!!!'); 
//����
$jieqiCollect['author']=array('left'=>'<li id=zzm><strong>', 'right'=>'</strong></li>', 'middle'=>'!!!!');

//����
$jieqiCollect['sort']=array('left'=>'<li>�֡����� ', 'right'=>'</li>', 'middle'=>'!!!!');;
//�ؼ���
$jieqiCollect['keyword']='';
//���
$jieqiCollect['intro']=array('left'=>'<div id=wz>', 'right'=>'</div>!</div>!<div class=an>', 'middle'=>'****');
//����ͼƬ
$jieqiCollect['articleimage']=array('left'=>'<img src="', 'right'=>'" alt="~" width=100 height=150 border=1 align=left>', 'middle'=>'~~~~');
//���˵ķ���
$jieqiCollect['filterimage']='http://pic.hjsm.tom.com/cover/cover.jpg';
//�������Ͷ�Ӧid
$jieqiCollect['sortid']=array('�� ��'=>1, '�� ��'=>2, '�� ��'=>3, '�� ��'=>8, '�� ��'=>3, '�� Ϸ'=>6, '�� ��'=>7, '�� ʷ'=>4, '�� ��'=>4, 'default'=>10);

//****************************************************************************************
$jieqiCollect['urlindex']='http://hjsm.tom.com/volume.php?book_id=<{articleid}>'; //����Ŀ¼ҳ��
$jieqiCollect['volume']=array('left'=>'<td><strong>!</strong>&nbsp;<b>', 'right'=>'</b> ��<a href="~">�־��Ķ�</a>', 'middle'=>'!!!!');
//�½�����
$jieqiCollect['chapter']=array('left'=>'<td><a href=" http://html.hjsm.tom.com/html/book/~"  title="~" >', 'right'=>'</a></td>', 'middle'=>'!!!!');
//�½����
$jieqiCollect['chapterid']=array('left'=>'<td><a href=" http://html.hjsm.tom.com/html/book/', 'right'=>'.htm "  title="~" >!</a></td>', 'middle'=>'~~~~');


//****************************************************************************************
$jieqiCollect['urlchapter']='http://html.hjsm.tom.com/html/book/<{chapterid}>.htm'; //�½�����ҳ��
//�½�����
$jieqiCollect['content']=array('left'=>'<div id="zw">', 'right'=>'</div>!<div id="ts">', 'middle'=>'****');
$jieqiCollect['contentfilter'] = '<script!></script>
<div!>!</div>
<font!>!</font>
<span!>!</span>';
$jieqiCollect['collectimage']=1; //ͼƬ�����Ƿ�ɼ�������
//ҳ�������ɼ�
//****************************************************************************************
$jieqiCollect['listcollect'][0]['title']='�������'; //�ɼ���������
$jieqiCollect['listcollect'][0]['urlpage']='http://hjsm.tom.com/?mod=book&act=moreupdate&type=2&page=<{pageid}>'; //�ɼ���ַ
$jieqiCollect['listcollect'][0]['articleid']=array('left'=>'<td height="13">&nbsp;<a href="http://hjsm.tom.com/book.php?book_id=', 'right'=>'">', 'middle'=>'$$$$');  //��ȡ����id����
$jieqiCollect['listcollect'][0]['articlename']=array('left'=>'<td height="13">&nbsp;<a href="http://hjsm.tom.com/book.php?book_id=$">', 'right'=>'</a></td>', 'middle'=>'!!!!');  //��ȡ�������ƹ���
$jieqiCollect['listcollect'][0]['startpageid']='1';  //��һҳ����
$jieqiCollect['listcollect'][0]['nextpageid']='++'; //��ȡ��һҳ����
$jieqiCollect['listcollect'][0]['maxpagenum']=3;  //���ɼ���ҳ
?>