<?php
echo '<ul class="ulitem">
  <li><a href="'.$this->_tpl_vars['article_static_url'].'/newarticle.php">��������</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/newdraft.php">�½��ݸ�</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/draft.php">�� �� ��</a></li>
  <li><a href="'.$this->_tpl_vars['jieqi_url'].'/ptopics.php?oid=self">�� �� ��</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/authorpage.php">�ҵ�ר��</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/masterpage.php">�ҵ������б�</a></li>
  ';
if($this->_tpl_vars['jieqi_modules']['obook']['publish'] > 0){
echo '
  <li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/newobook.php">�½�������</a></li>
  <li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/masterpage.php">�ҵĵ�����</a></li>
  ';
}
echo '
</ul>';
?>