<?php
echo '<script language="javascript" src="js/jumpmenu.js"></script>
<div class="block-head">'.$this->_tpl_vars['step_menu1'].'</div>
<div class="block-title">'.$this->_tpl_vars['step_title'].'</div>
<div class="block-summary">'.$this->_tpl_vars['step_summary'].'</div>
<div class="block-content">
<select name="s1" onchange="MM_jumpMenu(\'self\',this,0);">
	<option value="'.$this->_tpl_vars['jump_url'].'?charset=gbk"';
if($this->_tpl_vars['jieqi_charset'] != 'big5'){
echo ' selected';
}
echo '>��������[gbk]</option>
	<option value="'.$this->_tpl_vars['jump_url'].'?charset=big5"';
if($this->_tpl_vars['jieqi_charset'] == 'big5'){
echo ' selected';
}
echo '>��������[big5]</option>
</select>
</div>
<div class="block-menu">
	<input type="button" name="bt0" value="���ذ�װ��ҳ" class="button" onclick="window.location=\'./index.php\';"><span class="span-space"></span>
	<input type="button" name="bt1" value="��һ��" class="button" onclick="window.location=\''.$this->_tpl_vars['next_page'].'\';">
</div>';
?>