<?php
echo '<!--<table class="grid" width="100%" align="center">
  <tr>
    <td class="odd">&nbsp;&nbsp;&nbsp; �����ļ�д����ָ�û���ĳЩҳ���û������û�����ֱ��ѡ��Ҫ��ʾ�����鲢���������ļ���ÿ�������������ļ��е�д�����£����и�����������Ϊ��\'bid\' - ��������, \'blockname\' - \'��������\', \'module\' - ģ������, \'filename\' - ���鴦��������ƣ�������׺, \'classname\' - �����������, \'side\' - ������ʾ��λ��(0:��ߣ�1:�ұߣ�2:����3:���֣�4:���ϣ�5:���У�6:���£�7:������8:�ײ�), \'title\'- �������, \'vars\' - ����Ĳ���, \'template\' - �����ģ���ļ���, \'contenttype\' - ��������, \'custom\' - �Ƿ��Զ�������, \'publish\' - �Ƿ���ʾ��0:����ʾ��1:��½ǰ��ʾ��2:��½����ʾ��3:����ʾ��, \'hasvars\' - �Ƿ�����������á���һ����Ҫ�����ľ�������λ�ú��Ƿ���ʾ��������ο�����Ĳ��䣩</td>
  </tr>
</table>--><br />
<div class="gridtop">�������
  <select class="select" name="modules" id="modules" onchange="document.location=\'blocks.php?modules=\'+this.options[this.selectedIndex].value;">
     <option value="">��ʾȫ��</option>
	';
if (empty($this->_tpl_vars['jieqi_modules'])) $this->_tpl_vars['jieqi_modules'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_modules'])) $this->_tpl_vars['jieqi_modules'] = (array)$this->_tpl_vars['jieqi_modules'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_modules']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_modules']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_modules']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_modules']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_modules']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
      <option value="'.$this->_tpl_vars['i']['key'].'"';
if($this->_tpl_vars['modules'] == $this->_tpl_vars['i']['key']){
echo ' selected';
}
echo '>'.$this->_tpl_vars['jieqi_modules'][$this->_tpl_vars['i']['key']]['caption'].'</option>
	';
}
echo '  
  </select> | <a href="#addblock">�����Զ�������</a></div>
<table class="grid" width="100%" align="center">
  <tr align="center">
    <th width="5%">���</th>
    <th width="14%">������</th>
    <th width="10%">ģ����</th>
    <th width="7%">λ��</th>
    <th width="7%">����</th>
    <th width="9%">��ʾ����</th>
    <th width="17%">�����ļ�д��</th>
    <th width="17%">Զ�̵���js</th>
    <th width="14%">����</th>
  </tr>
  ';
if (empty($this->_tpl_vars['blocks'])) $this->_tpl_vars['blocks'] = array();
elseif (!is_array($this->_tpl_vars['blocks'])) $this->_tpl_vars['blocks'] = (array)$this->_tpl_vars['blocks'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['blocks']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['blocks']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['blocks']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['blocks']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['blocks']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td class="odd" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['bid'].'</td>
    <td class="even" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['blockname'].'</td>
    <td class="odd" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['modname'].'</td>
    <td class="even" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['side'].'</td>
    <td class="odd" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['weight'].'</td>
    <td class="even" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['publish'].'</td>
    <td class="odd" align="center"><input name="txtconfig'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['bid'].'" type="text" size="20" value="'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['configtext'].'" onFocus="this.select()"></td>
    <td class="even" align="center"><input name="txtjs'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['bid'].'" type="text" size="20" value="'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['jstext'].'" onFocus="this.select()"></td>
    <td class="even" align="center">'.$this->_tpl_vars['blocks'][$this->_tpl_vars['i']['key']]['action'].'</td>
  </tr>
  ';
}
echo '
  <tr>
    <td colspan="9" class="foot">&nbsp;</td>
  </tr>
</table>
<br /><a name="addblock"></a>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">'.$this->_tpl_vars['form_addblock'].'</td>
  </tr>
</table>
';
?>