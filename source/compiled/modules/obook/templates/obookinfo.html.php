<?php
$GLOBALS['jieqiTset']['jieqi_blocks_module'] = 'obook';
echo '
';
$GLOBALS['jieqiTset']['jieqi_blocks_config'] = 'guideblocks';
echo '
<table width="96%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="3">
      <tr align="center">
        <td colspan="3">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="80%" align="center" valign="middle"><span style="font-size:16px; font-weight:bold; line-height:150%;">'.$this->_tpl_vars['obookname'].'</span></td>
                </tr>
            </table></td>
        </tr>
      <tr>
        <td width="33%">��&nbsp;&nbsp;&nbsp; ��'.$this->_tpl_vars['sort'].'</td>
        <td width="33%">��&nbsp;&nbsp;&nbsp; �ߣ�';
if($this->_tpl_vars['authorid'] > 0){
echo '<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['authorid']).'" target="_blank">'.$this->_tpl_vars['author'].'</a>';
}else{
echo $this->_tpl_vars['author'];
}
echo '</td>
        <td width="33%">�� �� Ա��';
if($this->_tpl_vars['agentid'] > 0){
echo '<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['agentid']).'" target="_blank">'.$this->_tpl_vars['agent'].'</a>';
}else{
echo $this->_tpl_vars['agent'];
}
echo '</td>
        </tr>
      <tr>
        <td>������£�'.$this->_tpl_vars['lastupdate'].'</td>
        <td>�� �� ����'.$this->_tpl_vars['goodnum'].'</td>
        <td>ȫ�ĳ��ȣ�'.$this->_tpl_vars['size_c'].'��</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#000000" height="1"></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="20%" align="center" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td align="center"><a href="'.$this->_tpl_vars['url_read'].'" target="_blank">�����½�</a></td>
          </tr>
          <tr>
            <td align="center"><a href="'.$this->_tpl_vars['url_bookcase'].'" target="_blank">�������</a></td>
          </tr>
          <tr>
            <td align="center"><a href="'.$this->_tpl_vars['url_report'].'">����ٱ�</a></td>
          </tr>
          <tr>
            <td align="center"><a href="'.$this->_tpl_vars['url_manage'].'">������</a></td>
          </tr>
        </table></td>
        <td width="80%" valign="top">
          ';
if($this->_tpl_vars['hasimage'] == 1){
echo '<a href="'.$this->_tpl_vars['url_limage'].'" target="_blank"><img src="'.$this->_tpl_vars['url_simage'].'" border="0" width="100" height="125" align="right" hspace="5" vspace="5" /></a>';
}
echo '
          <span class="hottext">����½ڣ�</span><a href="'.$this->_tpl_vars['url_lastchapter'].'">'.$this->_tpl_vars['lastchapter'].'</a><br /><br/>
          <span class="hottext">���ݼ�飺</span><br />'.$this->_tpl_vars['intro'].'<br />
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
	<script language="javascript">
	function checkbuy(form){
	  var ischeck=0;
	  for (var i=0;i<form.elements.length;i++){ 
	    if (form.elements[i].name == \'checkid[]\' && form.elements[i].disabled == false && form.elements[i].checked == true) ischeck++;
	  }
	  if (ischeck == 0){
	    alert(\'����ѡ��Ҫ���ĵ��½ڣ�\');
		return false;
	  }
	  return true;
	}
	
	function selectall(form){
	  for (var i=0;i<form.elements.length;i++){ 
	    if (form.elements[i].name == \'checkid[]\' && form.elements[i].disabled == false) form.elements[i].checked = true;
	  }
	}
	
	function cancelall(form){
	  for (var i=0;i<form.elements.length;i++){ 
	    if (form.elements[i].name == \'checkid[]\' && form.elements[i].disabled == false) form.elements[i].checked = false;
	  }
	}
	</script>
	<form action="'.$this->_tpl_vars['url_buyobook'].'" method="post" name="frmbuy" onsubmit="return checkbuy(this);">
      <div style="text-align:center;padding:5px;"><input type="button" name="btnbuy1" value="ѡ��ȫ��δ�����½�" class="button" onclick="selectall(this.form)" />
	  &nbsp;&nbsp;<input type="button" name="btnbuy2" value="ȡ��ȫ��ѡ��" class="button" onclick="cancelall(this.form)" />
      &nbsp;&nbsp;<input type="submit" name="btnbuy3" value="����ѡ���½�" class="button" />
	  <input name="oid" type="hidden" value="'.$this->_tpl_vars['obookid'].'" />
      </div>
	  <table class="grid" width="100%" align="center">
      <caption>����½�</caption>
        <tr align="center">
          <th width="5%"><input type="checkbox" id="checkall" name="checkall" value="checkall" onclick="javascript: for (var i=0;i<this.form.elements.length;i++){ if (this.form.elements[i].name == \'checkid[]\' && this.form.elements[i].disabled == false) this.form.elements[i].checked = this.form.checkall.checked; }"></th>
          <th width="40%">�½�����</th>
          <th width="15%">����ʱ��</th>
          <th width="15%">����</th>
          <th width="15%">�۸�</th>
		  <th width="10%">����</th>
        </tr>
        ';
if (empty($this->_tpl_vars['ochapterrows'])) $this->_tpl_vars['ochapterrows'] = array();
elseif (!is_array($this->_tpl_vars['ochapterrows'])) $this->_tpl_vars['ochapterrows'] = (array)$this->_tpl_vars['ochapterrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['ochapterrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['ochapterrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['ochapterrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['ochapterrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['ochapterrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
        <tr>
          <td align="center" class="odd"><input type="checkbox" id="checkid[]" name="checkid[]" value="'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['ochapterid'].'"';
if($this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['isbuy'] == 1){
echo ' disabled="disabled"';
}
echo '></td>
          <td class="odd"><a href="'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['url_chapter'].'" target="_blank">'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</a></td>
          <td align="center" class="odd">'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['postdate'].'</td>
          <td align="center" class="odd">'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['size_c'].'</td>
          <td align="center" class="odd">'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['saleprice'].'</td>
		  <td align="center" class="odd"><a href="'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['url_chapter'].'" target="_blank">����</a></td>
        </tr>
        ';
}
echo '
      </table>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
';
?>