<?php
echo '<div class="block-head">'.$this->_tpl_vars['step_menu8'].'</div>
<div class="block-title">'.$this->_tpl_vars['step_title'].'</div>
<div class="block-summary">'.$this->_tpl_vars['step_summary'].'</div>
<div class="block-content">
';
if($this->_tpl_vars['status'] == 1){
echo '<span class="span-green">';
}else{
echo '<span class="span-red">';
}
echo '
'.$this->_tpl_vars['step_content'].'
</span>
</div>
<div class="block-menu">
	<input type="button" name="bt0" value="���ذ�װ��ҳ" class="button" onclick="window.location=\'./index.php\';"><span class="span-space"></span>
	<input type="button" name="bt1" value="��¼��̨" class="button" onclick="window.location=\''.$this->_tpl_vars['admin_page'].'\';">
	<input type="button" name="bt2" value="������ҳ" class="button" onclick="window.location=\''.$this->_tpl_vars['index_page'].'\';">
	<input type="button" name="bt3" value="�رձ�ҳ" class="button" onclick="window.close();">
</div>';
?>