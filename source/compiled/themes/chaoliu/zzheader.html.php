<?php
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>作家中心-潮流原创文学网</title>
<link href="/themes/chaoliu/css/authorcenter.css" rel="stylesheet"/>
<link href="/themes/chaoliu/style.css" rel="stylesheet"/>
<script type="text/javascript" src="include/js/common.js"></script>
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
echo $this->_tpl_vars['jieqi_sitename'].'欢迎您，您可以选择[<a href="'.$this->_tpl_vars['jieqi_user_url'].'/register.php">登录</a>]或者[<a href="'.$this->_tpl_vars['jieqi_user_url'].'/register.php">注册新用户</a>]！';
}else{
echo $this->_tpl_vars['jieqi_sitename'].'欢迎您，'.$this->_tpl_vars['jieqi_username'].'&nbsp; <span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_user_url'].'/userdetail.php" style="margin:0 8px;">个人中心</a><span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/bookcase.php" style="margin:0 8px;">我的书架</a><span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/myarticle.php" style="margin:0 8px;">作者专区</a><span style="color:#dbdbdb;">|</span><a href="'.$this->_tpl_vars['jieqi_url'].'/message.php?box=inbox" style="margin:0 8px;">短消息</a><span style="color:#dbdbdb;">|</span><a target="_blank" href="'.$this->_tpl_vars['jieqi_user_url'].'/logout.php" style="margin:0 8px;">退出登录</a>';
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
	$(\'.head\').css(\'background\',\'url(/themes/chaoliu/images/g1-icon01.gif) no-repeat 15px 5px\')
	$(\'.head\').click(function(){
			$(\'.head\').css(\'background\',\'url(/themes/chaoliu/images/g1-icon01.gif) no-repeat 15px 5px\')
			$(this).css(\'background\',\'url(/themes/chaoliu/images/g1-icon02.gif) no-repeat 15px 5px\')
			$(\'#navigation li\').css(\'background\',\'#fff\')
			$(this).parent().css(\'background\',\'#f6f6f6\')
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
<script language="javascript" type="text/javascript">
<!--
function frmnewarticle_validate(){
  if(document.frmnewarticle.sortid.value == ""){
    alert("请输入类别");
    document.frmnewarticle.sortid.focus();
    return false;
  }
  if(document.frmnewarticle.articlename.value == ""){
    alert("请输入文章名称");
    document.frmnewarticle.articlename.focus();
    return false;
  }
}
//-->
</script>
<div id="main">
	<ul class="menu">
    	<li><a href="/modules/article/myarticle.php" class="wzgg">网站公告</a></li>
        <li><a href="/modules/article/newarticle.php" class="cjzp">创建作品</a></li>
        <li><a href="/modules/article/masterpage.php" class="zpgl">作品管理</a></li>
        <li><a href="/modules/article/newdraft.php" class="cgx">草稿箱</a></li>
        <li><a href="/modules/obook/newobook.php" class="wdgf">新建电子书</a></li>
    	<li><a href="/modules/obook/masterpage.php" class="zzxx">我的电子书</a></li>
        <li><a href="/message.php?box=inbox" class="znx">站内信</a></li>
</ul>    <div class="content">';
?>