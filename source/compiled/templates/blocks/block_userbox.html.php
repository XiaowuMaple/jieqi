<?php
echo '<ul class="ulitem">
<li><a href="'.$this->_tpl_vars['jieqi_url'].'/myfriends.php">�ҵĺ���</a></li>
<li><a href="'.$this->_tpl_vars['jieqi_url'].'/ptopics.php?uid=self">�ҵĻ����</a></li>
<li><a href="'.$this->_tpl_vars['jieqi_url'].'/mylink.php">�ҵ�����</a></li>
';
if($this->_tpl_vars['jieqi_modules']['article']['publish'] > 0){
echo '
<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php">�ҵ����</a></li>
';
}
echo '
';
if($this->_tpl_vars['jieqi_modules']['obook']['publish'] > 0){
echo '
<li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/obookcase.php">�������</a></li>
';
}
echo '
';
if($this->_tpl_vars['jieqi_modules']['obook']['publish'] > 0){
echo '
<li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/buylog.php">�ҵĵ�����</a></li>
';
}
echo '
';
if($this->_tpl_vars['jieqi_modules']['pay']['publish'] > 0){
echo '
<li><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">����'.$this->_tpl_vars['egoldname'].'</a></li>
';
}
echo '
';
if($this->_tpl_vars['jieqi_modules']['article']['publish'] > 0){
echo '
<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/applywriter.php">��������</a></li>
';
}
echo '
<li><a href="'.$this->_tpl_vars['jieqi_url'].'/online.php">�����û�</a></li>
</ul>';
?>