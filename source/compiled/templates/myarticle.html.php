<?php
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>��������-����ԭ����ѧ��</title>
<link href="/themes/chaoliu/css/authorcenter.css" rel="stylesheet"/>
<script type="text/javascript" src="/themes/chaoliu//js/common.js"></script>

<script type="text/javascript" src="/themes/chaoliu/js/jquery-1.9.1.min.js"></script>
<style>
.wzgg{border: 2px solid #c99500;border-right:none;
background-color: white;}
.menu .cjzp{border:none;background:url(/themes/chaoliu/images/chuangjian_14.gif) 27px center no-repeat;}
</style>
<style type="text/css">
body {
	background:url(/themes/chaoliu/images/bg_01.jpg) #ebe6d6 top center no-repeat;
}
#top {
	width:960px;
	margin:0 auto;
	height:30px;
	line-height:30px;
	color:#a29999;
}
#top a {
	color:#a29999;
}
#top a:hover {
	color:#c99500;
}
.top_left {
	float:left;
}
.top_left a{
	padding-right:10px;
}
.top_right {
	float:right;
	width:300px;
	text-align:right;
}
.top_right a{
	padding-left:10px;
}
#head {
	width:960px;
	margin:0 auto;
	padding-top:30px;
}
.logo {
	display:block;
	float:left;
	width:219px;
	height:64px;
}
.top_nav {
	width:500px;
	padding-top:40px;
	text-align:right;
	float:right;
}
.top_nav  a {
	padding-left:20px;
	color:#863a16;
	font-weight:bold;
	font-size:14px;
}
#main {
	width:960px;
	min-height:560px;
    _height:560px;
    overflow:auto;
	_overflow:visible;
	margin:0 auto;
	margin-top:20px;
	background-color:white;
	border: 4px solid #c99500;
	border-radius: 12px;
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.2);
}
.menu {
	float: left;
	width: 172px;
	height:auto;
	padding-top: 50px;
	border-radius: 12px 0px 0px 0px;
	padding-bottom:30px;
	border-bottom:2px solid #c99500;
	background: url(/themes/chaoliu/images/menu_bg_03.gif) repeat-y left top;
}
.content {
	float:right;
	width:740px;
	height:auto;
	background-color:#fff;
	border-radius: 0px 12px 12px 0px;
	padding:40px 20px;
}
.menu li a {
	font-weight:bold;
	font-size:14px;
	color:#505050;
}
.zzxx,.wzgg,.cjzp,.zpgl,.zpcj,.wdgf,.cgx,.znx{
	display:block;
	height: 50px;
	line-height: 50px;
	margin-left:15px;
	padding-left:65px;
	cursor:pointer;
}
.zzxx {
    background: url(/themes/chaoliu/images/zuozhexinxi_13.gif) 27px center no-repeat;
}
.wzgg {
    background: url(/themes/chaoliu/images/xttz_03.gif) 27px center no-repeat;
}
.cjzp {
    background: url(/themes/chaoliu/images/chuangjian_14.gif) 27px center no-repeat;
}
.zpgl {
    background: url(/themes/chaoliu/images/zpgl_17.gif) 27px center no-repeat;
}
.zpcj {
    background: url(/themes/chaoliu/images/zpcj_26.gif) 27px center no-repeat;
}
.wdgf {
    background: url(/themes/chaoliu/images/wdgf_31.gif) 27px center no-repeat;
}
.cgx {
    background: url(/themes/chaoliu/images/cgx_33.gif) 27px center no-repeat;
}
.znx {
    background: url(/themes/chaoliu/images/znx_35.gif) 27px center no-repeat;
}
.menu li a:hover{
	padding-left: 60px;
	margin-left: 15px;
	border:2px solid #c99500;
	border-right-color:white;
	background-color:white;
	background-position: 20px center;
}
.menu .wzgg {
	padding-left: 60px;
	margin-left: 15px;
	border:2px solid #c99500;
	border-right-color:white;
	background-color:white;
	background-position: 20px center;
}

.content h2 {
	color: rgb(102, 102, 102);
	width: 740px;
	font-size: 18px;
	height: 50px;
	line-height:25px;
	background:url(/themes/chaoliu/images/tanchu_03.gif) #fff 0px 40px repeat-x;	
}
#navigation {
	padding-top:10px;
}
.xinwen li {
	
}

.gray {
	padding-left:10px;
	color:#666666;
}
.xinwen_con {
	padding-top: 10px;
	font-size: 12px;
	color: #666666;
	font-weight: normal;
	text-align: justify;
	line-height: 20px;
}
#navigation li{ background:url(/themes/chaoliu/images/g1-bg01.gif) repeat-x left bottom; }
#navigation li p{ padding:10px 40px; line-height:24px;}
span.head{ display:block; padding-left:41px; height:30px;line-height:30px;}


#footer {
	padding:25px 0px;
	width:960px;
	margin:0 auto;
	text-align:center;
	color:#999999;
}
#footer p {
	padding-top:10px;
}
</style>

</head>
<body>

<div id="top" >
<div class="top_inner">
<div class="left orangea"><div style="float:left; height:30px; line-height:30px;"><img src="/themes/chaoliu/images/time.gif"
    align="absmiddle" /> <script type="text/javascript"  src="/themes/chaoliu/js/time.js"></script>&nbsp;  </div>
    <div style="float:right;">
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
<div id="head">
	<a class="logo"><img src="/themes/chaoliu/images/logo_03.gif" /></a>

	<div class="clear"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	//$(\'.head\').css(\'background\',\'url(/themes/chaoliu/images/g1-icon01.gif) no-repeat 15px 5px\')
	$(\'.head\').click(function(){
			//$(\'.head\').css(\'background\',\'url(/themes/chaoliu/images/g1-icon01.gif) no-repeat 15px 5px\')
			$(this).css(\'background\',\'url(/themes/chaoliu/images/g1-icon02.gif) no-repeat 15px 5px\')
			$(\'#navigation li\').css(\'background\',\'#fff\')
			//$(this).parent().css(\'background\',\'#f6f6f6\')
			$(this).next(\'.xinwen_con\').css(\'color\',\'#888\')
			$(\'.xinwen_con\').slideUp(200)
			if($(this).next(\'.xinwen_con\').css(\'display\')==\'none\'){
				$(this).next(\'.xinwen_con\').slideDown(200)
			}else{
				$(this).next(\'.xinwen_con\').slideUp(200)
			}
			})
			
		
	
})
</script>
<div id="main">
	<ul class="menu">
    	<li><a href="/modules/article/myarticle.php" class="wzgg">��վ����</a></li>
        <li><a href="/modules/article/newarticle.php" class="cjzp">������Ʒ</a></li>
        <li><a href="/modules/article/masterpage.php" class="zpgl">��Ʒ����</a></li>
        <li><a href="/modules/article/newdraft.php" class="cgx">�ݸ���</a></li>
        <li><a href="/modules/obook/newobook.php" class="wdgf">�½�������</a></li>
    	<li><a href="/modules/obook/masterpage.php" class="zzxx">�ҵĵ�����</a></li>
        <li><a href="/message.php?box=inbox" class="znx">վ����</a></li>
</ul>    <div class="content">
    	<h2>�������Ĺ���</h2>
        <div style="width:100%; float:left;">
    	<ul id="navigation">
		        	<li>
               <span class="head">��վ����̳�û�����ͨ˵��<span class="gray">2013-11-20 11:47:52</span></span>
                <div class="xinwen_con" style="display:none"><blockquote>
	<div style="margin-left: 40px">
		<span style="font-family: ����"><strong><span style="font-size: 16px">&nbsp; �װ��������ǣ�</span></strong></span></div>
	<div style="margin-left: 40px">
		<span style="font-family: ����"><strong><span style="font-size: 16px"><br />
		</span></strong></span></div>
	<div style="margin-left: 40px">
		<span style="font-family: ����"><strong><span style="font-size: 16px">&nbsp;&nbsp;&nbsp;��վ���ڽ�����վ�û�������̳�û������ϵĹ����������Ͻ�������վ�û���������̳ʹ����������ע�ᡣ��������䣬��վ����̳�����û����ܳ����������⣺</span></strong></span></div>
	<div style="margin-left: 40px">
		<span style="font-family: ����"><strong><span style="font-size: 16px"><br />
		1����վ�û�������̳�״ε�½����������֤һ���û��������롣<br />
		2����̳����ʾ���û����ϸ��������ѵǼ�������ʾ�쳣�����⣬��λ�����޸�Ϊ��ȷ�����ַ���ɣ���Ӱ�칦��ʹ�á�<br />
		3������վע��ʱ����д���û�����������Ϣ����̳ע��ʱ��д���û�����������Ϣ��ͬ�������벻ͬ����������̳�������޸���̳��������վ����һ�£����򵥶���½��̳����ͬʱ��½��վ����ʹ��ԭ��̳��½���롣<br />
		4������δ�����ἰ�����û�����̳��½�������������վһ�¡�֮ǰ��̳�е���ע����û���Ϣ�Խ�ͬʱ��Ч������������վ��ʹ�á�<br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ������ע���û�����ֱ��ʹ�ã������ע������Ϣ��<br />
		<br />
		</span></strong></span></div>
	<div style="text-align: right; margin-left: 40px">
		<span style="font-family: ����"><strong><span style="font-size: 16px"><br />
		</span></strong></span><span style="font-family: ����"><strong><span style="font-size: 16px">����sky��Ӫ�Ŷ�</span></strong></span><span style="font-family: ����"><strong><span style="font-size: 16px">&nbsp;</span></strong></span></div>
	<div style="margin-left: 40px">
		&nbsp;</div>
	<div style="text-align: right; margin-left: 40px">
		<span style="font-family: ����"><strong><span style="font-size: 16px">2013-11-15</span></strong></span></div>
</blockquote>
</div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">10�¸�ѷ��Ź���<span class="gray">2013-11-20 11:43:51</span></span>
                <div class="xinwen_con" style="display:none"><p class="MsoNormal">
	<strong><span style="font-size: 16px"><span style="font-family: ����">��ܰ��ʾ��</span></span></strong></p>
<p class="MsoNormal">
	<strong><span style="font-size: 16px"><span style="font-family: ����">&nbsp;&nbsp;&nbsp; ����������ʮ�·ݸ���ҷ��Ϸ������������ߣ���Ѿ��ѷ��š�������������������δ�鵽���˼�¼�뼰ʱ��������ϵ��������ϸ���¡�</span></span></strong><br />
	<img alt="" height="784" src="/userfiles/image/20131120/20114249fd2d8200d51350.jpg" width="219" /></p>
<p class="MsoNormal">
	<strong><span style="font-size: 16px"><span style="font-family: ����">&nbsp;&nbsp; �򽫽���ף��ֽ�<span lang="EN-US">5-15��������</span>���������ѷ�������������������£����Ҽ�֤������չ��</span></span></strong></p>
<p class="MsoNormal">
	<span style="font-family: ����; mso-bidi-font-size: 10.5pt; mso-ascii-theme-font: minor-fareast; mso-fareast-font-family: ����; mso-fareast-theme-font: minor-fareast; mso-hansi-theme-font: minor-fareast"><img alt="" height="799" src="/userfiles/image/20131120/20114325de4335d3da7367.jpg" width="614" /><br />
	</span></p>
<p align="left" class="MsoNormal" style="text-align: left; text-indent: 21pt; mso-char-indent-count: 2.0; mso-pagination: widow-orphan">
	<strong><span style="font-size: 16px"><span style="font-family: ����">&nbsp;�����շ��ֲ��ֽ�����Ʒ���������ظ����⣬�硶�ҵ��绨���졷һ�飬�½�<span lang="EN-US">11</span>������Ů���½�<span lang="EN-US">12</span>���ܼ�<span lang="EN-US">&nbsp;</span>���������ظ����½�<span lang="EN-US">13</span>��һ˿����<span lang="EN-US">&nbsp;</span>���½�<span lang="EN-US">14</span>���㵽����ô�ˣ�<span lang="EN-US">&nbsp;</span>���������ظ����½�<span lang="EN-US">59</span>����å��һ�������ظ��ȵȣ�����׸�١����ڴ��ֶ����ظ���Ϊ����ԭ����ѧ�����۳������ߵ�����δ�������ʾ���ͣ�Ҳ��������������Ϊ����</span></span></strong><strong><span style="font-size: 16px"><span style="font-family: ����"><span lang="EN-US"><br />
	&nbsp;&nbsp;&nbsp; </span>������ѧ��ϣ�������а�����ѧ���������ṩ���ɵĴ���������Ҳ����ǩԼ�����ǶԵ�����վ�����Ρ�������������д��ʱ���ִ�����ˮ�����������ݣ��Լ�������Ʒ�ϸ����أ��մ˷�չ��������վ�����ò���̨��Ӧ��ʩ����Լ����ͷ����뱾��Ӧ�и��ȴδ�յ���ѵ�������ϵ�༭�������������վ�ٷ��ֶ����ˮ���ظ����ݣ���ϮΥ���������ֱ�ӿ۳���ѡ�<span lang="EN-US"><br />
	&nbsp;&nbsp; &nbsp;</span>�����������మ��һ���ˣ��������ھ��ӣ�������</span></span></strong></p>
<p class="MsoNormal" style="text-align: right; text-indent: 21pt">
	&nbsp;</p>
<p class="MsoNormal" style="text-align: right; text-indent: 21pt">
	<strong><span style="font-size: 16px"><span style="font-family: ����"><span style="mso-bidi-font-family: \'times new roman\'; mso-ascii-theme-font: minor-fareast; mso-fareast-theme-font: minor-fareast; mso-hansi-theme-font: minor-fareast; mso-bidi-theme-font: minor-bidi; mso-ansi-language: en-us; mso-fareast-language: zh-cn; mso-bidi-language: ar-sa">����<span lang="EN-US">SKY</span>��Ӫ�Ŷ�<span lang="EN-US"><br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2013.11.15</span></span></span></span></strong></p></div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">9�¸�ѷ��Ź���<span class="gray">2013-11-20 11:29:32</span></span>
                <div class="xinwen_con" style="display:none"><p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">��ܰ��ʾ��<br />
	<br />
	������������·ݸ������ߣ���Ѿ��ѷ��š�������������������δ�鵽���˼�¼�뼰ʱ��������ϵ��<br />
	&nbsp;<br />
	��������Ϊ���·��¸�����������ǰʮ�������߼�������飺<br />
	&nbsp;<br />
	1��������**��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺3569.8<br />
	<br />
	2�������� *��*&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺3223&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
	&nbsp;<br />
	3����������**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2456.1<br />
	&nbsp;<br />
	4��������*��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2032.48<br />
	<br />
	5��������*��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2969.4<br />
	&nbsp;<br />
	6����������**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2583.9<br />
	&nbsp;<br />
	7��������*��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2159.4<br />
	&nbsp;<br />
	8����������*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2002<br />
	<br />
	9. ������ҹ*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2194.3<br />
	&nbsp;<br />
	10����������**��&nbsp;&nbsp; Ӧ����꣺2090.4<br />
	</span></strong></span></p>
<p>
	&nbsp;</p>
<p style="text-align: right">
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><br />
	<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ����SKY��Ӫ�Ŷ�</strong></span></span></p>
<p style="text-align: right">
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 2013.10.15&nbsp;<br />
	</strong></span></span></p></div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">8�¸�ѷ��Ź���<span class="gray">2013-11-20 11:27:09</span></span>
                <div class="xinwen_con" style="display:none"><span style="font-size: 16px"><strong><span style="font-family: ����_gb2312"><br />
	��ܰ��ʾ��<br />
	<br />
	������������·ݸ������ߣ���Ѿ��ѷ��š�������������������δ�鵽���˼�¼�뼰ʱ��������ϵ��<br />
	&nbsp;<br />
	��������Ϊ���·��¸�����������ǰʮ�������߼�������飺<br />
	&nbsp;<br />
	1����������*��*��**&nbsp; Ӧ����꣺4080.2<br />
	<br />
	2�������� ��*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2983.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
	&nbsp;<br />
	3��������*С*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2607.8<br />
	&nbsp;<br />
	4��������*��*ˮ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2255.9<br />
	<br />
	5��������ĭ*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺2732.2<br />
	&nbsp;<br />
	6��������*��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺1464.4<br />
	&nbsp;<br />
	7��������*ͬ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺1600<br />
	&nbsp;<br />
	8��������ҹ**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺1488.9<br />
	<br />
	9. ������*��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ӧ����꣺1676.1<br />
	&nbsp;<br />
	10��������**��&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Ӧ����꣺1401.2</span></strong></span><br />
	<br />
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><span style="font-size: 16px"><span style="font-family: ����_gb2312">����SKY��Ӫ�Ŷ�<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2013.9.16<br />
	</span></span></strong></div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">7�¸�ѷ��ż���ƪ��ѡ����<span class="gray">2013-11-20 11:19:43</span></span>
                <div class="xinwen_con" style="display:none"><p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">��ܰ��ʾ��<br />
	<br />
	�������������·ݸ������ߣ���Ѿ��ѷ��š�������������������δ�鵽���˼�¼�뼰ʱ��������ϵ��</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">��������Ϊ���·��¸�����������ǰʮ�������߼�������飺</span></strong></span></p>
<p>
	<strong style="font-family: ����_gb2312"><span style="font-size: 16px">1��������*�� &nbsp; &nbsp; &nbsp; &nbsp; Ӧ����꣺1466.1</span></strong></p>
<p>
	<strong style="font-family: ����_gb2312"><span style="font-size: 16px">2��������**Ȼ &nbsp; &nbsp; &nbsp; &nbsp;Ӧ����꣺1264.0</span></strong></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">3����������**�� &nbsp; &nbsp; &nbsp;Ӧ����꣺2082</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">4��������*��**ϣ &nbsp; &nbsp; Ӧ����꣺1443.8</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">5��������**�� &nbsp; &nbsp; &nbsp; &nbsp;Ӧ����꣺2236.3</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><span style="font-size: 16px"><strong>6��������*��*�� &nbsp; &nbsp; &nbsp;Ӧ����꣺1302.8</strong></span></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">7��������*��*�� &nbsp; &nbsp; &nbsp;Ӧ����꣺1182.9</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><span style="font-size: 16px"><strong>8��������*ͬ &nbsp; &nbsp; &nbsp; &nbsp; Ӧ����꣺1282.9</strong></span></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">9��������*�� &nbsp; &nbsp; &nbsp; &nbsp; Ӧ����꣺1412.7</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">10����������**��* &nbsp; &nbsp;Ӧ����꣺1143.8<br />
	<br />
	<br />
	����������ѡ��7�¶�ƪǰ����Ϊ��<br />
	<br />
	��һ�����̺����� ���ߣ��򻴰� ����300<br />
	<br />
	�ڶ���������������ô�� ���ߣ���ʱ��� ����200<br />
	<br />
	����������ɢ����ϯ ���ߣ���С�� ����100<br />
	<br />
	��������λ�񽱶�ƪ���߼����������ϵ�����༭QQ��295743468<br />
	<br />
	<br />
	<br />
	����SKY��Ӫ�Ŷ�</span></strong></span></p>
<p>
	<span style="font-family: ����_gb2312"><strong><span style="font-size: 16px">2013.8.15</span></strong></span></p></div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">������ѧ�ܹ�ע ����ԭ����ѧ����������<span class="gray">2013-11-20 11:16:49</span></span>
                <div class="xinwen_con" style="display:none"><p>
	&nbsp;</p>
<p>
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong>��λ�װ������ߡ��������ѣ�</strong></span></span></p>
<p>
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong>&nbsp;&nbsp;&nbsp; ��л��λ���賱��ԭ����ѧ���Ĺ��ĺ�֧�֣��ڴ�ҵ�һ·����£�����ԭ����ѧ��ӭ����ո�µĿ��ˡ�����TOM��Գ���ԭ����ѧ�������˹�ע�ͱ�����</strong></span></span></p>
<p>
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong>&nbsp;&nbsp; &nbsp;<a href="http://post.yule.tom.com/2C001E1C508.html">http://post.yule.tom.com/2C001E1C508.html</a>&nbsp;</strong></span></span></p>
<p>
	<strong style="font-family: ����_gb2312; font-size: 16px">&nbsp;&nbsp;&nbsp; ������ѧ�ܹ�ע&nbsp;����ԭ����ѧ����������</strong></p>
<p>
	<strong style="font-family: ����_gb2312; font-size: 16px">&nbsp;&nbsp;&nbsp; ���Ǽ��ų���ԭ����ѧ��������Я������һ��ո���һԻ͵�δ����</strong></p>
<p>
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong><br />
	</strong></span></span></p>
<p style="text-align: right">
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong>&nbsp; &nbsp; &nbsp;����SKY��Ӫ�Ŷ�</strong></span></span></p>
<p style="text-align: right">
	<span style="font-size: 16px"><span style="font-family: ����_gb2312"><strong>&nbsp; &nbsp; &nbsp; &nbsp;2013.7.26<br />
	<br />
	</strong></span></span></p></div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">6�·ݸ�귢�ż���ƪ��ѡ����<span class="gray">2013-11-20 11:02:25</span></span>
                <div class="xinwen_con" style="display:none"><p>
	&nbsp;</p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">��ܰ��ʾ��</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">�������������·ݸ������ߣ���Ѿ��ѷ��š�������������������δ�鵽���˼�¼�뼰ʱ��������ϵ��</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">��������Ϊ���·��¸�����������ǰʮ�������߼�������飺</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">1��������*��&nbsp; &nbsp; &nbsp; &nbsp;Ӧ����꣺2416&nbsp;</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">2��������**Ȼ&nbsp; &nbsp; &nbsp;&nbsp;Ӧ����꣺1225.7</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">3����������**��* &nbsp;&nbsp;Ӧ����꣺2039.1</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">4��������*��&nbsp; &nbsp; &nbsp; &nbsp;Ӧ����꣺2268.5</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">5��������**��&nbsp; &nbsp; &nbsp;&nbsp;Ӧ����꣺2526</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">6��������**��&nbsp; &nbsp; &nbsp;&nbsp;Ӧ����꣺1117.3</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">7����������**��&nbsp; &nbsp;&nbsp;Ӧ����꣺1112.1</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">8����������*��**&nbsp;&nbsp; Ӧ����꣺1789.6</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">9��������*��&nbsp; &nbsp; &nbsp; &nbsp;Ӧ����꣺1658</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">10��������*�&nbsp; &nbsp; &nbsp;&nbsp;Ӧ����꣺1325.7</span></strong></span></p>
<p>
	<o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312"><br />
	</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">����������ѡ��5��6�¶�ƪǰ����Ϊ��</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">��һ����������䣬ĺȻ����&nbsp; &nbsp; &nbsp;���ߣ���Ȼ����&nbsp; &nbsp;&nbsp;����300</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">�ڶ���������˭���ɶ�����&nbsp;&nbsp; ���ߣ�����΢��&nbsp; &nbsp; &nbsp; &nbsp;����200</span></strong></span><o:p></o:p></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">��������ʱ�⣬����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ���ߣ���ζ��&nbsp;&nbsp;&nbsp;&nbsp; ����100</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">��������λ�񽱶�ƪ���߼����������ϵ�����༭QQ��295743468</span></strong></span></p>
<p>
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312"><br />
	</span></strong></span></p>
<p style="text-align: right">
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">����SKY��Ӫ�Ŷ�</span></strong></span><o:p></o:p></p>
<p style="text-align: right">
	<span style="font-size: 16px"><strong><span style="font-family: ����_gb2312">2013.7.16</span></strong></span><o:p></o:p></p>
<p class="MsoNormal">
	<span lang="EN-US" style="font-family: ����; font-size: 12pt; mso-bidi-font-family: ����; mso-font-kerning: 0pt"><o:p></o:p></span></p></div>

            </li><div style="clear:both;"></div>
                	<li>
               <span class="head">��������<span class="gray">2013-07-29 09:56:15</span></span>
                <div class="xinwen_con" style="display:none"><p>
	<strong><span style="font-family: ����_gb2312"><span style="font-size: 16px">&nbsp;&nbsp;&nbsp;����֮��(����)�Ƽ����޹�˾��רҵ�����й������뻥������ҵӦ�õĹ�˾��ͬʱҲ��רҵ�о�����Ӧ�������뻥����Ӧ���뿪������Ϊһ���Ȩ����λ������֮���������й��񻪼��ţ�������������ǿ���������ϵ�Լ���ҵ��������Ӧ������Ŀ������ƹ���˶������,Ϊ�ƶ��й����߻��������������������г������չ��������ĥ��Ĺ��ס�<br />
	��������֮��һֱ��ȡ����ʽ���г������Լ���۵�ս�Է��룬������г��֧�ֺ��������£����Ź�ƽ��������������ԭ�����г��������������ľ�������Ϊ������ҵ�ṩ��Ч�ĿƼ���������Ϊ��ֵ���������ĺ�����顣<br />
	��������֮�����й��ƶ����й���ͨ���й���������ܵ�ս�Ժ�����飬����ҵ�����о����г�ʵʩ�ڹ���һֱ�������ȵ�λ������֮�����ϴ����&ldquo;��ҵӦ���ȷ�&rdquo;��&ldquo;����Ӧ��֧���Ƽ�&rdquo;��&ldquo;������Ӧ��֧���Ƽ�&rdquo;�������ս�ߣ�Ϊ�������ҵ�����ܺ�ʹ�á�����֮��һֱʹ���Լ���ʵ�Ļ�������������ҵ�����˼ά���о��ɳ����Է�չ���ø�����ҵ���ݵ��������Ǽ�˵ĿƼ�ʵ�ֶ����г���ֵ��<br />
	��������ԭ����ѧ����<a href="http://www.chaoliuyc.com">www.chaoliuyc.com</a>��������2011�꣬��2013��4��������֮�����������Ƽ����޹�˾�չ���ȫ��ӹܣ�Ŀǰ���ǹ���������ԭ��С˵��վ֮һ����վ��ԭ�����Ķ���������ֵ����ʵ�����Ϊһ�壬���ۺ��Ե�������ѧƽ̨��<br />
	&nbsp;&nbsp;&nbsp;&nbsp;����ԭ����ѧ��һֱ���ƶ��й���ѧԭ����ҵΪ��ּ�����ھ�ԭ����ѧ����������Ϊ���Ρ�������չ����ƽ̨�������ṩȫ��λ�����ʷ����Լ�ͨ����������������ṩ��Ϊ�������Ʒ��<br />
	&nbsp;&nbsp;&nbsp;&nbsp;��Ϊ����������ѧ������Ӫ�̣�����ԭ����ѧ��ӵ��һ֧��רҵ�����˲š���Ӫ�˲š��߻��˲š�����༭������ɵ��Ӵ������Ŷӡ���������һ����������ɫΪһ���һ������������ѧ��վ��<br />
	&nbsp;&nbsp;&nbsp;&nbsp;����ԭ����ѧ�����ҳ����磬������Ӫ�̴��������õĺ�����ϵ���������Ļ���չ�����ֳ��桢ʵ��������������������Խ��������վ�����Գ�ƪ��ƷΪ�������������á���������á��������������顢�ഺУ԰��������ɡ���̽���������̸����ʱ���¡����ξ����ȸ��ֲ�ͬ���͵ĸ�Ʒ�ʴ������Ķ�����ͬʱ��������ж�Ƭ��ʫ�衢���ġ�ɢ�ġ��ռǡ��籾����ɫר����Ϊ����������ṩȫ��λ�����ʷ������ܡ�<br />
	&nbsp;&nbsp;&nbsp;&nbsp;��վ�����˲żüã���۵��д�������Ĺ����ߺ����ߡ��������ţ�����д���������Ķ���Ŭ������һ��������������ѧƽ̨��������Ҳ�һ����ȫ�����ܡ�<br />
	</span></span></strong></p>
<p>
	<strong><span style="font-family: ����_gb2312"><span style="font-size: 16px"><br />
	��ϵ�绰��010-82349385<br />
	��ַ��������������ũ����·1�Ź������</span></span></strong></p></div>

            </li><div style="clear:both;"></div>
        		<div style="float:right;height:30px;line-height:30px">
		
		</div>
      </ul>
    </div>
    </div>
</div>
</body>
</html>
';
?>