<?php
$GLOBALS['jieqiTset']['jieqi_blocks_module'] = 'system';
echo '
<link href="/css/nt.css" rel="stylesheet" type="text/css" />
<!--���Ĳ���-->
	<div class="homecon">
		<div class="homedh">
			<div class="hometit1">
				<ul>
					<li class="homesy"><a href="/userdetail.php" class="size14">�û�����</a></li>
					<li class="homesy2"><a target="_blank" href="/modules/article/applywriter.php"
						class="size14">��������</a></li>
				</ul>
			</div>
			<div class="cl">
			</div>
			<div>
			</div>
		</div>
		<div class="homedown">
			<!--��Ա���-->
			<div class="homeDL">
	<div class="photo">
		<div class="photo_pic">
			<div>
				<a href="touxiang.aspx">
					<img style="width: 80px; height: 80px; border: 1px solid #ccc;" id="imagesrc" src="'.jieqi_geturl('system','avatar',$this->_tpl_vars['uid'],'l',$this->_tpl_vars['avatar']).'" /></a>
			</div>
			<div class="photo_name">'.$this->_tpl_vars['jieqi_username'].'
			</div>
		</div>
	</div>
	<div class="homeleft_dh">
		<ul>
			<li class="myaccount"><a href="/userdetail.php" title="�˻�">�˻�</a></li>
			<li class="myaccount" style="background-position: 0px -705px;"><a href="/setavatar.php"
				title="ͷ��">ͷ��</a></li>
			<li class="mybookcase"><a href="/modules/article/bookcase.php" title="���">���</a></li>
			<li class="mymsg"><a href="/message.php?box=inbox" title="��Ϣ">��Ϣ</a></li>
			<li class="myfootmark"><a href="/ptopics.php?uid=self" title="���">���</a></li>
			<li class="myhelp"><a target="_blank" href="/modules/forum/" title="����">����</a></li>
			<li class="zuxiao"><a href="/logout.php" title="ע��">ע��</a></li>
		</ul>
	</div>
</div>

			<!--��Ա��߽���-->
			<div class="homeDR">
                <div class="homezhdh">
					<ul>
						<li><a href="/message.php?box=inbox">�ռ���</a></li><li><a href="/message.php?box=outbox">������</a></li><li><a href="/newmessage.php">������Ϣ</a></li><li><a href="/newmessage.php?tosys=1">д������Ա</a></li>
					</ul>
				</div>

				<div class="homeDRcon">
					<div class="myinformation">
						<form action="'.$this->_tpl_vars['url_action'].'" method="post" name="checkform" id="checkform">
<table class="grid" width="100%" align="center">
<caption>����/�����乲������Ϣ����'.$this->_tpl_vars['maxmessage'].'��������Ϣ����'.$this->_tpl_vars['nowmessage'].'��</caption>
  <tr>
    <th width="5%"><input type="checkbox" id="checkall" name="checkall" value="checkall" onclick="javascript: for(var i=0;i<this.form.elements.length;i++){ if(this.form.elements[i].name != \'checkkall\') this.form.elements[i].checked = form.checkall.checked; }"></th>
    <th width="20%">'.$this->_tpl_vars['usertitle'].'</th>
    <th width="50%">����</th>
    <th width="15%">����</th>
    <th width="10%">״̬</th>
  </tr>
';
if (empty($this->_tpl_vars['messagerows'])) $this->_tpl_vars['messagerows'] = array();
elseif (!is_array($this->_tpl_vars['messagerows'])) $this->_tpl_vars['messagerows'] = (array)$this->_tpl_vars['messagerows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['messagerows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['messagerows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['messagerows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['messagerows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['messagerows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td class="odd" align="center"><input type="checkbox" id="checkid[]" name="checkid[]" value="'.$this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['messageid'].'"></td>
    <td class="even">';
if($this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['userid'] > 0){
echo '<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['userid']).'" target="_blank">'.$this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['username'].'</a>';
}else{
echo '<span class="hottext">��վ����Ա</span>';
}
echo '</td>
    <td class="odd"><a href="'.$this->_tpl_vars['jieqi_url'].'/messagedetail.php?id='.$this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['messageid'].'">'.$this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['title'].'</a></td>
    <td class="even" align="center">'.date('Y-m-d',$this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['postdate']).'</td>
    <td class="odd" align="center">';
if($this->_tpl_vars['messagerows'][$this->_tpl_vars['i']['key']]['isread'] == 0){
echo '<span class="hottext">δ��</a>';
}else{
echo '�Ѷ�';
}
echo '</td>
  </tr>
';
}
echo '
  <tr>
    <td colspan="5" class="foot">&nbsp;<input type="button" name="allcheck" value="ȫ��ѡ��" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ this.form.elements[i].checked = true; }">&nbsp;&nbsp;<input type="button" name="nocheck" value="ȫ��ȡ��" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ this.form.elements[i].checked = false; }">&nbsp;&nbsp;<input type="button" name="delcheck" value="ɾ��ѡ�м�¼" class="button" onclick="javascript:if(confirm(\'ȷʵҪɾ��ѡ�м�¼ô��\')){ this.form.checkaction.value=\'1\'; this.form.submit();}">&nbsp;&nbsp;<input type="button" name="delall" value="������м�¼" class="button" onclick="javascript:if(confirm(\'ȷʵҪ������м�¼ô��\'))document.location=\''.$this->_tpl_vars['url_delete'].'\'"><input name="checkaction" type="hidden" id="checkaction" value="0"></td>
  </tr>
</table>
</form>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>


						<div class="cl">
						</div>
					</div>
				</div>
			</div>
			<div class="cl">
			</div>
		</div>
	</div>

';
?>