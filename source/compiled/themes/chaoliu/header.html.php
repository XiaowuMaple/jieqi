<?php
echo '<div id="top" >
<div class="top_inner">
<div class="left orangea"><div style="float:left; height:30px; line-height:30px;"><img src="/themes/chaoliu/images/time.gif"
    align="absmiddle" /> <script type="text/javascript"  src="/themes/chaoliu/js/time.js"></script>&nbsp;  </div>
    <div style="float:right; width:600px;">
		<div class="m_top">
&nbsp;';
if($this->_tpl_vars['jieqi_userid'] == 0){
echo $this->_tpl_vars['jieqi_sitename'].'��ӭ����������ѡ��[<a href="'.$this->_tpl_vars['jieqi_user_url'].'/register.php">��¼</a>]����[<a href="'.$this->_tpl_vars['jieqi_user_url'].'/register.php">ע�����û�</a>]��';
}else{
echo $this->_tpl_vars['jieqi_sitename'].'��ӭ����'.$this->_tpl_vars['jieqi_username'].'&nbsp; <span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_user_url'].'/userdetail.php" style="margin:0 8px;">��������</a><span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/bookcase.php" style="margin:0 8px;">�ҵ����</a><span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/myarticle.php" style="margin:0 8px;">����ר��</a><span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_url'].'/message.php?box=inbox" style="margin:0 8px;">����Ϣ</a><span style="color:#dbdbdb;">|</span><a target="_blank" href="'.$this->_tpl_vars['jieqi_user_url'].'/logout.php" style="margin:0 8px;">�˳���¼</a>';
}
echo '
</div>
    </div><div class="clear"></div></div>
</div>
</div>
<div id="header">
<div class="header_l">
<a href="/" class="logo pngFix"><img src="/themes/chaoliu/images/logo_06.png" alt="����ԭ��"/></a>
</div>
<div class="header_m">
<form id="searchform" name="articlesearch" action="/modules/article/search.php" method="post"  target="_blank">
<input class="search-l" name="searchkey" type="text" value="" /><input name=\'searchtype\' value=\'articlename\' type=\'hidden\'><input  class="search-r" type="image"    src="/themes/chaoliu/images/search_r_10.gif" />
</form>
<p class="remensousuo">���������� '.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvisit,4,0,0,0,0', 'template'=>'hot_search.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</p>
</div>
<div class="header_r">
<a href="/fuli.html" target="_blank" class="pngFix" >
<img src="/themes/chaoliu/images/fuli_03.png" alt=\'���Ҹ���\' /></a>
</div>
<div class="clear"></div>
</div>
<div id="nav">
<ul class="nav_ul">
    <li class="shouye"><a href="/">��ҳ</a></li>
    <li class="np"><a href="/men.php">��Ƶ</a></li>
    <li class="nvp"><a href="/women.php">ŮƵ</a></li>
    <li class="jingdian"><a href="/jingdian.php">����</a></li>
    <li class="chaoliuzhi"><a href="/modules/article/articlelist.php?class=23">����־</a></li>
    <li class="xiaoshuoph"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/toplist.php?sort=allvisit">С˵����</a></li>
    <li class="quanbensk"><a href="/modules/article/articlelist.php?fullflag=1">ȫ�����</a></li>
    <li class="chaoliult"><a href="/bbs">������̳</a></li>
    <li class="chongzhizx"><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">��ֵ����</a></li>
    <li class="zuozhefuli"><a href="/fuli.html" target="_blank">���߸���</a></li>
    <li class="bangzhu"><a href="/help.html" target="_blank">��������</a></li>
    <div class="clear"></div>
</ul>
</div>
<div class="sub_nav">
    <div class="sub_nav_inner">
        <p style=" float:left;padding-right:43px">��Ƶ >
			<a href="/modules/article/articlelist.php?class=1">����</a>
			<a href="/modules/article/articlelist.php?class=2">���</a>
			<a href="/modules/article/articlelist.php?class=3">����</a>
			<a href="/modules/article/articlelist.php?class=4">����</a>
			<a href="/modules/article/articlelist.php?class=5">����</a>
			<a href="/modules/article/articlelist.php?class=6">����</a>
			<a href="/modules/article/articlelist.php?class=7">�ٳ�</a>
			<a href="/modules/article/articlelist.php?class=8">��ս</a>
		</p>
        <p style=" float:left;padding-right:43px">ŮƵ >
			<a href="/modules/article/articlelist.php?class=9" >����</a>
			<a href="/modules/article/articlelist.php?class=10">У԰</a>
			<a href="/modules/article/articlelist.php?class=11">�ܲ�</a>
			<a href="/modules/article/articlelist.php?class=12">ͬ��</a>
			<a href="/modules/article/articlelist.php?class=13">��Խ</a>
			<a href="/modules/article/articlelist.php?class=14">����</a>
			<a href="/modules/article/articlelist.php?class=15">Ů��</a>
			<a href="/modules/article/articlelist.php?class=16">����</a>
		</p>
        <p style=" float:left">���� >
			<a href="/modules/article/articlelist.php?class=17">��ʷ</a>
			<a href="/modules/article/articlelist.php?class=18">����</a>
			<a href="/modules/article/articlelist.php?class=19">����</a>
			<a href="/modules/article/articlelist.php?class=20">�ƻ�</a>
			<a href="/modules/article/articlelist.php?class=21">����</a>
			<a href="/modules/article/articlelist.php?class=22">���</a>
		</p>
        <div class="clear"></div>
    </div>
</div>';
?>