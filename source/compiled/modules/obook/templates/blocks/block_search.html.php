<?php
echo '<form name="obooksearch" method="post" action="'.$this->_tpl_vars['url_obooksearch'].'" target="_blank">
<ul class="ulrow">
<li>��&nbsp; ����<select name="searchtype" id="searchtype" class="select">
    <option value="obookname" selected>&nbsp;&nbsp;�� ��&nbsp;&nbsp;</option>
    <option value="author">&nbsp;&nbsp;�� ��&nbsp;&nbsp;</option>
  </select></li>
<li>�ؼ��֣�<input name="searchkey" type="text" class="text" id="searchkey" size="12" maxlength="50"></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" class="button" value=" �� �� "></li>
</ul>
</form>';
?>