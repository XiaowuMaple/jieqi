<?php
$GLOBALS['jieqiTset']['jieqi_blocks_module'] = 'article';
echo '
';
$GLOBALS['jieqiTset']['jieqi_blocks_config'] = 'authorblocks';
echo '
<form action="" method="post" name="checkform" id="checkform">
<table class="grid" width="100%" align="center">
  <caption>���Ĳݸ���</caption>
</table>
<table class="grid" width="100%" align="center">
  <tr align="center" valign="middle">
    <th width="5%">'.$this->_tpl_vars['checkall'].'</th>
    <th width="30%">��������</th>
    <th width="45%">�½ڱ���</th>
    <th width="30%">����</th>
  </tr>
';
if (empty($this->_tpl_vars['draftrows'])) $this->_tpl_vars['draftrows'] = array();
elseif (!is_array($this->_tpl_vars['draftrows'])) $this->_tpl_vars['draftrows'] = (array)$this->_tpl_vars['draftrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['draftrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['draftrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['draftrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['draftrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['draftrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr valign="middle">
    <td align="center" class="odd">'.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['checkbox'].'</td>
    <td class="even"><a href="'.$this->_tpl_vars['article_static_url'].'/articlemanage.php?id='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articleid'].'">'.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articlename'].'</a></td>
    <td class="odd"><a href="'.$this->_tpl_vars['article_static_url'].'/draftedit.php?id='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftid'].'">'.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftname'].'</a></td>
    <td align="center" class="even"><a href="'.$this->_tpl_vars['article_static_url'].'/draftedit.php?id='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftid'].'">�༭</a> <a href="javascript:if(confirm(\'ȷʵҪɾ�����½�ô��\')) document.location=\''.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['url_delete'].'\';">ɾ��</a> ';
if($this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articleid'] == 0){
echo '&nbsp;&nbsp;&nbsp;&nbsp;';
}else{
echo '<a href="'.$this->_tpl_vars['article_static_url'].'/newchapter.php?aid='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articleid'].'&draftid='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftid'].'">����</a>';
}
echo '</td>
';
}
echo '
  </tr>
</table>
</form>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
';
?>