<?php
echo '<form name="frmsearch" method="post" action="'.$this->_tpl_vars['url_article'].'">
<table class="grid" width="100%" align="center">
    <tr>
        <td class="odd">�ؼ��֣�
            <input name="keyword" type="text" id="keyword" class="text" size="15" maxlength="50"> <input name="keytype" type="radio" class="radio" value="0" checked>��������
            <input type="radio" name="keytype" class="radio" value="1">���� 
			<input type="radio" name="keytype" class="radio" value="2">������ 
            <input type="submit" name="btnsearch" class="button" value="�� ��">
            &nbsp;&nbsp;<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/admin/article.php">ȫ������</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/admin/article.php?display=ready">��������</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/admin/article.php?display=show">��������</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/admin/article.php?display=hide">��������</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/admin/article.php?display=cool">��������</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/admin/article.php?display=empty">������</a>         
        </td>
    </tr>
</table>
</form>
<br />
<form action="'.$this->_tpl_vars['url_batchdel'].'" method="post" name="checkform" id="checkform" onSubmit="javascript:if(confirm(\'ȷʵҪ����ɾ������ô��\')) return true; else return false;">
<table class="grid" width="100%" align="center">
<caption>'.$this->_tpl_vars['articletitle'].'</caption>
  <tr align="center">
    <th width="4%">&nbsp;</th>
    <th width="14%">��������</th>
    <th width="24%">�����½�</th>
    <th width="10%">����</th>
    <th width="10%">������</th>
    <th width="8%">����</th>
    <th width="30%">����</th>
  </tr>
  ';
if (empty($this->_tpl_vars['articlerows'])) $this->_tpl_vars['articlerows'] = array();
elseif (!is_array($this->_tpl_vars['articlerows'])) $this->_tpl_vars['articlerows'] = (array)$this->_tpl_vars['articlerows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['articlerows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['articlerows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['articlerows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['articlerows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['articlerows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td class="odd" align="center">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['checkbox'].'</td>
    <td class="even"><a href="'.jieqi_geturl('article','article',$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'],'info').'" target="_blank">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articlename'].'</a></td>
    <td class="odd"><a href="'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['url_lastchapter'].'" target="_blank">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['lastvolume'].' '.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['lastchapter'].'</a></td>
    <td class="even">';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['authorid'] == 0){
echo $this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['author'];
}else{
echo '<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/authorpage.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['authorid'].'" target="_blank">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['author'].'</a>';
}
echo '</td>
    <td class="odd" align="center"><a href="'.jieqi_geturl('system','user',$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['posterid']).'" target="_blank">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['poster'].'</a></td>
    <td class="even" align="center">'.date('m-d',$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['lastupdate']).'</td>
    <td class="odd" align="center">';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['display'] == 0){
echo '<a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/article.php?action=hide&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'">����</a> <a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/article.php?action=ready&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'">����</a>';
}elseif($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['display'] == 1){
echo '<a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/article.php?action=hide&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'">����</a> <a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/article.php?action=show&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'">���</a>';
}else{
echo '<a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/article.php?action=show&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'">��ʾ</a> <a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/article.php?action=ready&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'">����</a>';
}
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['display'] == 0){
echo ' <a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/setgood.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'" target="_blank">�Ƽ�</a>/<a href="'.$this->_tpl_vars['article_dynamic_url'].'/admin/setgood.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&action=no&display='.$this->_tpl_vars['display'].'" target="_blank">����</a>';
}else{
echo ' �Ƽ�/����';
}
echo ' <a href="'.$this->_tpl_vars['article_static_url'].'/articlemanage.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'" target="_blank">����</a> <a href="'.$this->_tpl_vars['article_static_url'].'/articleedit.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'" target="_blank">�༭</a> <a href="javascript:if(confirm(\'ȷʵҪɾ��������ô��\')) document.location=\''.$this->_tpl_vars['article_static_url'].'/admin/article.php?action=del&id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'&display='.$this->_tpl_vars['display'].'\'">ɾ��</a></td>
  </tr>
  ';
}
echo '
  <tr>
    <td width="5%" class="odd" align="center">'.$this->_tpl_vars['checkall'].'</td>
    <td colspan="6" align="left" class="odd"><input type="submit" name="Submit" value="����ɾ��" class="button"><input name="batchdel" type="hidden" value="1"><input name="url_jump" type="hidden" value="'.$this->_tpl_vars['url_jump'].'"><strong></strong></td>
  </tr>
</table>
</form>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>';
?>