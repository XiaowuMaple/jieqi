<link rel="stylesheet" type="text/css" media="all" href="/templates/admin/style.css" />
<style>
	.even textarea{font-size:12px;}
</style>
<div id="content">

<table class="grid" width="100%" align="center">
  <tr align="center">
    <td width="98%" class="title">�༭��������</td>
  </tr>
</table>
<form name="frmcollect" id="frmcollect" action="/modules/article/admin/type.php?action=edit" method="post">
<table class="grid" width="100%" align="center">
  <tr align="center">
    <td width="98%" class="title">
        �ϼ����ࣺ<select name="newbig">
                    <?php foreach($jieqiSort['article'] as $key=>$value){?>
                    <option value="<?php echo $key;?>"><?php echo $value[caption]?></option>
                    <?php } ?>
                </select>
        ��������<input name="newname" type="text" value="<?php echo $editsort['0']['caption'];?>" />
        ��ţ�<input name="newxuhao" type="text" value="<?php echo $editsort['0']['weight'];?>" />
        <input type="hidden" name="sortid" value="<?php echo $editsort['0']['sortid'];?>" /><input name="submit" type="submit" value="ȷ��" />
    </td>
  </tr>
</table>
</form>
</div>