<?php
echo '<div class="block-head">'.$this->_tpl_vars['step_menu2'].'</div>
<div class="block-title">'.$this->_tpl_vars['step_title'].'</div>
<div class="block-summary">'.$this->_tpl_vars['step_summary'].'</div>
<div class="block-content">
<iframe class="license" src="templates/license.html" frameborder="0"></iframe>
</div>
<form name="f1">
<div class="block-summary"><input type="checkbox" onclick="doAgree();" name="cb1">�ҽ������Э��</div>
<div class="block-menu">
	<input type="button" name="bt0" value="���ذ�װ��ҳ" class="button" onclick="window.location=\'./index.php\';"><span class="span-space"></span>
	<input type="button" name="bt1" value="��һ��" class="button" onclick="window.location=\''.$this->_tpl_vars['next_page'].'\';">
</div>
</form>
<script language="javascript" src="js/license.js"></script>';
?>