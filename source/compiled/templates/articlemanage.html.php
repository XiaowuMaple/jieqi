<?php
$_template_tpl_vars = $this->_tpl_vars;
 $this->_template_include(array('template_include_tpl_file' => 'themes/chaoliu/zzheader.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo '
<style>
.zpgl{border: 2px solid #c99500;border-right:none;
background-color: white;}
.menu .cjzp{border:none;background:url(/themes/chaoliu/images/chuangjian_14.gif) 27px center no-repeat;}
table tbody tr{height:30px;line-height:30px;}
caption{height:40px;line-height:40px;border-bottom:1px #ccc solid;}
a{color:#666;}
a:hover{color:red;}
</style>
    	<h2>��Ʒ����</h2>
      	<style type="text/css">
<!--
ul.chaplist{
	list-style: none;
	clear: both;
	text-align: left;
	width: 100%;
}

li.chapter{
	float: left;
	width: 49%;
	line-height: 150%;
}

li.volume{
	width: 100%;
	clear: both;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
	line-height: 150%;
	border-top: 1px solid #eaeaea;
	border-bottom: 1px solid #eaeaea;
}

ul.packflag{
	list-style: none;
	clear: both;
	text-align: left;
	width: 100%;
}

ul.packflag li{
	float: left;
	width: 49%;
	line-height: 150%;
}
-->
</style>

<table class="grid" cellspacing="1" width="100%" align="center">
<form name="chapterdel" id="chapterdel" action="'.$this->_tpl_vars['url_chaptersdel'].'" method="post">
 <caption>��'.$this->_tpl_vars['articlename'].'��[<a href="'.$this->_tpl_vars['url_articleinfo'].'" target="_blank">��Ϣ</a>] [<a href="'.$this->_tpl_vars['url_articleindex'].'" target="_blank">�Ķ�</a>]</caption>
 <tr>
   <td align="center" class="head">
   [<a href="'.$this->_tpl_vars['article_static_url'].'/newvolume.php?aid='.$this->_tpl_vars['articleid'].'">�½��־�</a>] 
   [<a href="'.$this->_tpl_vars['article_static_url'].'/newchapter.php?aid='.$this->_tpl_vars['articleid'].'">�����½�</a>] 
   [<a href="'.$this->_tpl_vars['article_static_url'].'/articleedit.php?id='.$this->_tpl_vars['articleid'].'">�༭����</a>] 
   [<a href="javascript:if(confirm(\'ȷʵҪɾ��������ô��\')) document.location=\''.$this->_tpl_vars['article_static_url'].'/articledel.php?id='.$this->_tpl_vars['articleid'].'\';">ɾ������</a>] 
   [<a href="javascript:if(confirm(\'ȷʵҪ��գ�ɾ�������½ڣ�������ô��\')) document.location=\''.$this->_tpl_vars['article_static_url'].'/articleclean.php?id='.$this->_tpl_vars['articleid'].'\';">�������</a>] 
   [<a href="'.$this->_tpl_vars['article_dynamic_url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'">��������</a>] 
   ';
if($this->_tpl_vars['articlevote'] > 0){
echo '
   [<a href="'.$this->_tpl_vars['article_static_url'].'/votenew.php?aid='.$this->_tpl_vars['articleid'].'">�½�ͶƱ</a>] 
   [<a href="'.$this->_tpl_vars['article_static_url'].'/votearticle.php?id='.$this->_tpl_vars['articleid'].'">����ͶƱ</a>]
   ';
}
echo '
   [<a href="http://chaoliu.com/modules/article/cuigengmanage.php?id=125">�鿴�߸�</a>]
   </td>
 </tr>
 <tr>
 <td class="odd">
 <ul class="chaplist">
 ';
if (empty($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = array();
elseif (!is_array($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = (array)$this->_tpl_vars['chapterrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['chapterrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['chapterrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['chapterrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
 ';
if($this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptertype'] == 0){
echo '
 <li class="chapter"><input type="checkbox" class="checkbox" name="chapterid[]" value="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chapterid'].'" /><a href="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapterread'].'" target="_blank">'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</a> <a href="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapteredit'].'">[��]</a> <a href="javascript:if(confirm(\'ȷʵҪɾ�����½�ô��\')) document.location=\''.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapterdelete'].'\';">[ɾ]</a></li>
 ';
}else{
echo '
 <li class="volume"><input type="checkbox" class="checkbox" name="chapterid[]" value="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chapterid'].'" /><a href="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapterread'].'" target="_blank">'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</a> <a href="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapteredit'].'">[��]</a> <a href="javascript:if(confirm(\'ȷʵҪɾ���÷־�ô��\')) document.location=\''.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapterdelete'].'\';">[ɾ]</a></li>
 ';
}
echo '
 ';
}
echo '
 </ul>
 </td>
 </tr>
 <tr>
   <td class="foot">
   <input type="hidden" name="articleid" id="articleid" value="'.$this->_tpl_vars['articleid'].'" />
   <input type="button" name="allcheck" value="ѡ��ȫ���½�" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ this.form.elements[i].checked = true; }">&nbsp;&nbsp;<input type="button" name="nocheck" value="ȡ��ȫ��ѡ��" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ this.form.elements[i].checked = false; }">&nbsp;&nbsp;<input type="button" name="delcheck" value="����ɾ���½�" class="button" onclick="javascript:if(confirm(\'ȷʵҪ����ɾ���½�ô��\')){this.form.submit();}">
   </td>
 </tr>
</form>
</table>

<br />
<table width="100%" class="grid" cellspacing="1" align="center">
<form name="chaptersort" id="chaptersort" action="'.$this->_tpl_vars['url_chaptersort'].'" method="post">
<caption>�½�����</caption>
<tr valign="middle" align="left">
  <td class="odd" width="25%">ѡ���½ڻ�־�</td>
  <td class="even">
  <select class="select"  size="1" name="fromid" id="fromid">
  ';
if (empty($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = array();
elseif (!is_array($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = (array)$this->_tpl_vars['chapterrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['chapterrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['chapterrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['chapterrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  ';
if($this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptertype'] == 0){
echo '
  <option value="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chapterorder'].'">|-'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</option>
  ';
}else{
echo '
  <option value="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chapterorder'].'">'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</option>
  ';
}
echo '
  ';
}
echo '
  </select>
  </td>
</tr>
  <tr valign="middle" align="left"><td class="odd" width="25%">�ƶ���</td>
  <td class="even">
  <select class="select"  size="1" name="toid" id="toid">
  <option value="0">--��ǰ��--</option>
  ';
if (empty($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = array();
elseif (!is_array($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = (array)$this->_tpl_vars['chapterrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['chapterrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['chapterrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['chapterrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  ';
if($this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptertype'] == 0){
echo '
  <option value="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chapterorder'].'">|-'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</option>
  ';
}else{
echo '
  <option value="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chapterorder'].'">'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</option>
  ';
}
echo '
  ';
}
echo '
  </select>
  <span class="hottext">֮��</span>
  </td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="25%">&nbsp;</td>
  <td class="even"><input type="submit" class="button" name="submit_sort"  id="submit_sort" value="ȷ ��" /><input type="hidden" name="aid" id="aid" value="'.$this->_tpl_vars['articleid'].'" /></td>
</tr>
</form>
</table>
<br/>

<table width="100%" class="grid" cellspacing="1" align="center">
<form name="repack" id="repack" action="'.$this->_tpl_vars['url_repack'].'" method="post">
<caption>��������</caption>
<tr valign="middle" align="left">
  <td class="odd" width="25%">����ѡ��</td>
  <td class="even">
  <ul class="packflag">
  ';
if (empty($this->_tpl_vars['packflag'])) $this->_tpl_vars['packflag'] = array();
elseif (!is_array($this->_tpl_vars['packflag'])) $this->_tpl_vars['packflag'] = (array)$this->_tpl_vars['packflag'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['packflag']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['packflag']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['packflag']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['packflag']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['packflag']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <li><input type="checkbox" class="checkbox" name="packflag[]" value="'.$this->_tpl_vars['packflag'][$this->_tpl_vars['i']['key']]['value'].'" />'.$this->_tpl_vars['packflag'][$this->_tpl_vars['i']['key']]['title'].' </li>
  ';
}
echo '
  </ul>
  </td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="25%">&nbsp;</td>
  <td class="even"><input type="submit" class="button" name="submit_repack" id="submit_repack" value="ȷ ��" /><input type="hidden" name="id" id="id" value="'.$this->_tpl_vars['articleid'].'" /></td>
</tr>
</form>
</table>
        
			    </div>
</div>

</body>
</html>
';
?>