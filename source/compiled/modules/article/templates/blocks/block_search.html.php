<?php
echo '<form name="articlesearch" method="post" action="'.$this->_tpl_vars['url_articlesearch'].'" target="_blank">
<ul class="ulrow">
<li>��&nbsp; ����<select name="searchtype" id="searchtype" class="select">
    <option value="articlename" selected>��������</option>
    <option value="author">��������</option>
  </select></li>
<li>�ؼ��֣�<input name="searchkey" type="text" class="text" id="searchkey" size="10" maxlength="50"></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" class="button" value=" �� �� "></li>
</ul>
</form>';
?>