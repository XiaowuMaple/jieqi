<?php
$_template_tpl_vars = $this->_tpl_vars;
 $this->_template_include(array('template_include_tpl_file' => 'themes/chaoliu/zzheader.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo '

<style>
table tbody tr{height:30px;line-height:30px;}

.zzxx{border: 2px solid #c99500;border-right:none;
background-color: white;}
.menu .cjzp{border:none;background:url(/themes/chaoliu/images/chuangjian_14.gif) 27px center no-repeat;}
</style>
    	<h2>�ҵĵ�����</h2>
		<table class="grid" width="100%" align="center">
  <tr align="center">
    <th width="20%">����</th>
    <th width="26%">�����½�</th>
    <th width="10%">����</th>
    <th width="10%">�����½�</th>
    <th width="20%">�����۶�</th>
    <th width="8%">״̬</th>
    <th width="6%">����</th>
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
    <td class="even"><a href="'.$this->_tpl_vars['obook_dynamic_url'].'/obookinfo.php?id='.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookname'].'</a></td>
    <td class="odd"><a href="'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['url_lastchapter'].'" target="_blank">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['lastvolume'].' '.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['lastchapter'].'</a></td>
    <td class="even" align="center">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['lastupdate'].'</td>
    <td class="odd" align="center">';
if($this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['articleid'] > 0){
echo '<a href="'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['url_read'].'" target="_blank">�����½�</a>';
}
echo '</td>
    <td class="odd" align="center"><a href="'.$this->_tpl_vars['obook_dynamic_url'].'/chapterstat.php?oid='.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['sumemoney'];
if($this->_tpl_vars['jieqi_silverusage']==1){
echo '('.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['sumegold'].'/'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['sumesilver'].')';
}
echo '</a></td>
    <td class="odd" align="center">'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['salestatus'].'</td>
    <td class="odd" align="center"><a href="'.$this->_tpl_vars['obook_static_url'].'/obookmanage.php?id='.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'">����</a></td>
  </tr>
  ';
}
echo '
</table>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
    </div>
                
</div>

';
?>