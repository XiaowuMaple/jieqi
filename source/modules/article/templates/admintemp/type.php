<link rel="stylesheet" type="text/css" media="all" href="/templates/admin/style.css" />
<style>
	.even textarea{font-size:12px;}
</style>
<div id="content">


<form name="frmcollect" id="frmcollect" action="/modules/article/admin/type.php" method="post">
<table class="grid" width="100%" align="center">
  <tr align="center">
    <td width="5%" class="title">���ID</td>
    <td width="20%" class="title">�������</td>
    <td width="10%" class="title">������</td>
  </tr>
  <?php foreach($jieqiSort['article'] as $key=>$value){?>
  <tr>
    <td class="even" align="center"><?php echo $key;?></td>
    <td class="odd"><a href="/modules/article/articlelist.php?class=<?php echo $key?>" target="_blank"><?php echo $value[caption]?><br />
</a></td>
    <td align="center" class="odd"><?php echo $value[shortname];?></td>
  </tr>
  <?php $sortlist = getsamllsort($key);?>
  <?php if($sortlist){?>
  <tr>
    <td></td>
    <td><?php foreach($sortlist as $keys=>$values){?>
        <div style="float:left;">���ţ�<?php echo $values[sortid];?></div><div style="float:left;margin-left:10px;"><a href="/modules/article/articlelist.php?class=<?php echo $key?>&type=<?php echo $values[sortid];?>"><?php echo $values[caption];?></a></div><div style="float:left;margin-left:10px;"><a href="/modules/article/admin/type.php?action=edit&typeid=<?php echo $values[sortid];?>">[�༭]</a><a href="/modules/article/admin/type.php?action=delete&typeid=<?php echo $values[sortid];?>">[ɾ��]</a></div>
        <div style="clear:both"></div>
        <?php } ?>
    </td>
    <td></td>
  </tr>
  <?php } ?>
  <?php } ?>
</table>
<div style="margin-top:10px;">
    <div class="title">���Ӷ������</div>
    <div style="">
        <form action="" method="post">
            <div style="">ѡ���ϼ�Ŀ¼��
                <select name="bigsort">
                    <?php foreach($jieqiSort['article'] as $key=>$value){?>
                    <option value="<?php echo $key;?>"><?php echo $value[caption]?></option>
                    <?php } ?>
                </select>
            </div>
            <div style="margin-top:10px;">�½��������<input type="text" name="sortname" value="" />*С�ڵ���4������</div>
            <div style="margin-top:10px;">�½��������<input type="text" name="weight" value="" />*����Խ��Խǰ,����Ϊ0</div>
            <input name="submit" type="submit" value="ȷ��" />
        </form>
    </div>
</div>
</div>
