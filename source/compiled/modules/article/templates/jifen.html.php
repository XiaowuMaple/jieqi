<?php
$GLOBALS['jieqiTset']['jieqi_blocks_module'] = 'article';
echo '
';
$GLOBALS['jieqiTset']['jieqi_blocks_config'] = 'guideblocks';
echo '
';
$this->_tpl_vars['jieqi_pagetitle'] = "����-�ʻ����� - {$this->_tpl_vars['jieqi_sitename']}";
echo '
';
$this->_tpl_vars['meta_keywords'] = "{$this->_tpl_vars['articlename']} {$this->_tpl_vars['author']}";
echo '
<div id="content">

<form action="/modules/article/jifen.php" method="post">
<table width="580" class="grid" cellspacing="1" align="center">
<caption>���ֶһ��ʻ�/����</caption>

<tr valign="middle" align="left">
  <td class="odd" width="174">�û���</td>
  <td class="even" width="399">'.$this->_tpl_vars['username'].'</td>
</tr>
<tr valign="middle" align="left">

  <td class="odd" width="174">���л���</td>
  <td class="even" width="399">'.$this->_tpl_vars['scorenums'].'</td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="174">�����ʻ���</td>
  <td class="even" width="399">'.$this->_tpl_vars['flowernums'].'</td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="174">���м���</td>

  <td class="even" width="399">'.$this->_tpl_vars['eggnums'].'</td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="174">1����ֶһ�1���ʻ�</td>
  <td class="even" width="399"><input type="text" class="text" name="dhflower" size="15" maxlength="11" value="" />*��������Ҫ�һ����ʻ���,����Ϊ0</td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="174">1����ֶһ�1������</td>
  <td class="even" width="399"><input type="text" class="text" name="dhegg" size="15" maxlength="11" value="" />*��������Ҫ�һ��ļ�����</td>
</tr>
<tr valign="middle" align="left">
  <td class="odd" width="174">&nbsp;<input type="hidden" name="action" id="action" value="update" /><a href="/userdetail.php">��λ�û���</a></td>
  <td class="even" width="399"><input type="submit" class="button" name="submit"  id="submit" value=" ��ʼ�һ� " />    ע�����ֶһ��󲻿�ת�أ� </td>
</tr>
</table>
</form>
</div>
';
?>