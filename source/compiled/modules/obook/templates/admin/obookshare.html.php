<?php
echo '<form name="frmsearch" method="post" action="'.$this->_tpl_vars['url_obook'].'">
<table class="grid" width="100%" align="center">
    <tr>
        <td class="odd">�ؼ��֣�
            <input name="keyword" type="text" id="keyword" class="text" size="15" maxlength="50"> 
            <input name="keytype" type="radio" class="radio" value="0" checked>����
            <input type="radio" name="keytype" class="radio" value="1">���� 
			<input type="radio" name="keytype" class="radio" value="2">������
			&nbsp;&nbsp;
            <input type="submit" name="btnsearch" class="button" value="�� ��">
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$this->_tpl_vars['obook_dynamic_url'].'/admin/obookshare.php">ȫ��������</a> | <a href="'.$this->_tpl_vars['obook_dynamic_url'].'/admin/obookshare.php?display=self">��վ������</a> | <a href="'.$this->_tpl_vars['obook_dynamic_url'].'/admin/obookshare.php?display=share">�ѹ��������</a> | <a href="'.$this->_tpl_vars['obook_dynamic_url'].'/admin/obookshare.php?display=unshare">δ���������</a>
        </td>
    </tr>
</table>
</form>
<br />
<form action="'.$this->_tpl_vars['url_obook'].'" method="post" name="checkform" id="checkform">
<table class="grid" width="100%" align="center">
<caption>'.$this->_tpl_vars['obooktitle'].'</caption>
  <tr align="center">
    <th width="20%">����������</th>
    <th width="28%">�����½�</th>
    <th width="8%">����</th>
    <th width="16%">�����۶�</th>
    <th width="8%">����</th>
	<th width="10%">״̬</th>
    <th width="10%">����</th>
  </tr>
  ';
if (empty($this->_tpl_vars['obookrows'])) $this->_tpl_vars['obookrows'] = array();
elseif (!is_array($this->_tpl_vars['obookrows'])) $this->_tpl_vars['obookrows'] = (array)$this->_tpl_vars['obookrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['obookrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['obookrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['obookrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['obookrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['obookrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td class="even"><a href="'.$this->_tpl_vars['obook_dynamic_url'].'/obookinfo.php?id='.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'" target="_blank">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookname'].'</a></td>
    <td class="odd"><a href="'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['url_lastchapter'].'" target="_blank">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['lastvolume'].' '.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['lastchapter'].'</a></td>
    <td class="even">';
if($this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['authorid'] == 0){
echo $this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['author'];
}else{
echo '<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['authorid']).'" target="_blank">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['author'].'</a>';
}
echo '</td>
    <td class="odd" align="center">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['sumemoney'];
if($this->_tpl_vars['jieqi_silverusage']==1){
echo '('.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['sumegold'].'/'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['sumesilver'].')';
}
echo '</td>
    <td class="even" align="center">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['lastupdate'].'</td>
	<td class="odd" align="center">';
if($this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['state'] == 1){
echo '�ѹ���';
}else{
echo 'δ����';
}
echo '</td>
    <td class="even" align="center">';
if($this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['state'] == 1){
echo '<a href="'.$this->_tpl_vars['obook_dynamic_url'].'/admin/obookshare.php?action=unshare&id='.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'&display='.$this->_tpl_vars['display'].'">ȡ������</a>';
}else{
echo '<a href="'.$this->_tpl_vars['obook_dynamic_url'].'/admin/obookshare.php?action=share&id='.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'&display='.$this->_tpl_vars['display'].'">��Ϊ����</a>';
}
echo '</td>
  </tr>
  ';
}
echo '
</table>
</form>
<table width="100%"  border="0" cellspacing="2" cellpadding="3">
  <tr>
    <td width="12%" align="right"><!--<input type="submit" name="Submit" value="����ɾ��" class="button">
                <input name="batchdel" type="hidden" value="1">--></td>
    <td width="88%" align="right">'.$this->_tpl_vars['url_jumppage'].'</td>
  </tr>
</table>

';
?>