<?php
echo '<br /><br />
<form name="frmbuyobook" method="post" action="'.$this->_tpl_vars['url_buyobook'].'">
 <table class="grid" width="400" align="center">
    <caption>����VIP�½�</caption>
	<tr>
	  <td width="100" align="right" class="odd">�½��б�</td>
	  <td width="300" class="even">
	  <ul>
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
	  <li>'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['obookname'].' - '.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].' ('.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['saleprice'].')<input type="hidden" name="checkid[]" value="'.$this->_tpl_vars['ochapterrows'][$this->_tpl_vars['i']['key']]['ochapterid'].'"></li>
	  ';
}
echo '
	  </ul></td>
    </tr>
	<tr>
	  <td class="odd" align="right">�ϼƼ۸�</td>
	  <td class="even">'.$this->_tpl_vars['saleprice'].$this->_tpl_vars['egoldname'].'</td>
    </tr>
	<tr>
	  <td class="odd" align="right">�����û���</td>
	  <td class="even">'.$this->_tpl_vars['username'].'</td>
    </tr>
	<tr>
	  <td class="odd" align="right">������</td>
	  <td class="even">'.$this->_tpl_vars['useremoney'].$this->_tpl_vars['egoldname'].'</td>
    </tr>
	<tr align="center">
	  <td colspan="2" class="odd"><input type="hidden" name="action" value="buy">
      <input type="hidden" name="oid" value="'.$this->_tpl_vars['oid'].'">      <input type="submit" class="button" value="ȷ�������Ķ�" name="submit"></td>
    </tr>
	<tr align="center">
	  <td colspan="2" class="foot"> <a href="'.$this->_tpl_vars['url_obookinfo'].'">�鿴������Ϣ</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$this->_tpl_vars['url_buyegold'].'">�ҵ��ʻ���ֵ</a>      </td> 
    </tr>
  </table>
</form><br /><br />';
?>