<?php
echo '<script language="javascript" type="text/javascript">
<!--
function frmtip_validate(){
  if(document.frmtip.payegold.value == ""){
    alert("���������'.$this->_tpl_vars['egoldname'].'");
    document.frmtip.payegold.focus();
    return false;
  }

  if(parseInt(document.frmtip.payegold.value) < 5){
    alert("���ٴ���'.$this->_tpl_vars['egoldname'].'5����");
    document.frmtip.payegold.focus();
    return false;
  }

  if(parseInt(document.frmtip.payegold.value) > '.$this->_tpl_vars['useremoney'].'){
    alert("����'.$this->_tpl_vars['egoldname'].'����");
    document.frmtip.payegold.focus();
    return false;
  }
}
//-->
</script>
<br />
<form name="frmtip" id="frmtip" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/tip.php?do=submit" method="post" onsubmit="return frmtip_validate();" enctype="multipart/form-data">
<table width="500" class="grid" cellspacing="1" align="center">
<caption>������Ʒ</caption>
<tr valign="middle" align="left">
  <td width="20%">С˵��</td>
  <td><a href="'.jieqi_geturl('article','article',$this->_tpl_vars['articleid'],'info').'">'.$this->_tpl_vars['articlename'].'</a></td>
</tr>
<tr valign="middle" align="left">
  <td width="20%">�ҵ�'.$this->_tpl_vars['egoldname'].'</td>
  <td>'.$this->_tpl_vars['useremoney'].' '.$this->_tpl_vars['egoldname'].'  </td>
</tr>
<tr valign="middle" align="left">
  <td width="20%">����'.$this->_tpl_vars['egoldname'].'</td>
  <td>
  <input type="text" class="text" name="payegold" id="payegold" size="10" maxlength="10" value="" /> <span class="hottext">���� 5 ����</span>  </td>
</tr>
<tr valign="middle" align="left">
  <td width="20%">˵��</td>
  <td>��������ָ��'.$this->_tpl_vars['egoldname'].'���͸���ϲ������Ʒ�����ߣ���л�������ߵĹ�����֧�֣�</td>
</tr>
<tr valign="middle" align="left">
  <td width="20%">
  &nbsp;
  <input type="hidden" name="action" id="action" value="post" />
  <input type="hidden" name="id" id="id" value="'.$this->_tpl_vars['articleid'].'" />  </td>
  <td>
  ';
if($this->_tpl_vars['ajax_request'] > 0){
echo '
  <input type="button" name="Submit" class="button" value="�� ��" style="cursor:pointer;" onclick="Ajax.Request(\'frmtip\',{onLoading:function(){Form.disable(\'frmtip\');},onComplete:function(){alert(this.response.replace(/<br[^<>]*>/g,\'\\n\'));Form.enable(\'frmtip\');closeDialog();
}});">
  ';
}else{
echo '
  <input type="submit" class="button" name="submit"  id="submit" value="�� ��" />
  ';
}
echo '
  </td>
</tr>
</table>
</form>';
?>