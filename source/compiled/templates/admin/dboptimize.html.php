<?php
echo '<table class="grid" width="100%" align="center">
  <caption>��ʾ</caption>
  <tr class="odd"><td>
  <ul>
  <li>���ݱ��Ż�����ȥ�����ݿ��е���Ƭ��ʹ��¼���н��ܣ���߶�д�ٶȡ�</li>
  <li>���ݱ��޸����޸����ݿ��ڽ��в�ѯ��ɾ�������µȲ���ʱ�����Ĵ���</li>
  </ul>
  </td></tr>
</table>
<br />
<form action="'.$this->_tpl_vars['url_action'].'" method="post" name="checkform" id="checkform">
<table class="grid" width="100%" align="center">
<caption>���ݱ��Ż�/�޸�</caption>
  <tr>
    <th width="5%">'.$this->_tpl_vars['checkall'].'</th>
    <th width="30%">���ݱ�</th>
    <th width="13%">����</th>
    <th width="13%">��¼��</th>
    <th width="13%">����</th>
	<th width="13%">����</th>
	<th width="13%">��Ƭ</th>
  </tr>
';
if (empty($this->_tpl_vars['tablerows'])) $this->_tpl_vars['tablerows'] = array();
elseif (!is_array($this->_tpl_vars['tablerows'])) $this->_tpl_vars['tablerows'] = (array)$this->_tpl_vars['tablerows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['tablerows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['tablerows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['tablerows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['tablerows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['tablerows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td class="odd">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['checkbox'].'</td>
    <td class="even">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['Name'].'</td>
    <td class="odd">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['Type'].'</td>
    <td class="even">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['Rows'].'</td>
    <td class="odd">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['Data_length'].'</td>
	<td class="even">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['Index_length'].'</td>
    <td class="odd">'.$this->_tpl_vars['tablerows'][$this->_tpl_vars['i']['key']]['Data_free'].'</td>
  </tr>
';
}
echo '
  <tr>
    <th></th>
    <th>'.$this->_tpl_vars['totaltable'].'����</th>
    <th></th>
    <th>'.$this->_tpl_vars['totalrows'].'����¼</th>
    <th>'.$this->_tpl_vars['totalsize'].'</th>
	<th>'.$this->_tpl_vars['totalindex'].'</th>
    <th>'.$this->_tpl_vars['totalfree'].'</th>
  </tr>
  <tr>
    <td colspan="7" class="foot"><input type="button" name="allcheck" value="ȫ��ѡ��" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ if(this.form.elements[i].type == \'checkbox\') this.form.elements[i].checked = true; }">&nbsp;&nbsp;<input type="button" name="nocheck" value="ȫ��ȡ��" class="button" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ if(this.form.elements[i].type == \'checkbox\') this.form.elements[i].checked = false; }">&nbsp;&nbsp;<input name="action" type="radio" value="optimize"';
if($this->_tpl_vars['option'] == "optimize"){
echo ' checked="checked"';
}
echo ' />
      �Ż��� <input name="action" type="radio" value="repair"';
if($this->_tpl_vars['option'] == "repair"){
echo ' checked="checked"';
}
echo ' />�޸��� &nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" class="button" value=" �� �� " /></td>
  </tr>
</table>
</form>
<br /><br />';
?>