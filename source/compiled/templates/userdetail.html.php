<?php
$GLOBALS['jieqiTset']['jieqi_blocks_module'] = 'system';
echo '
<link href="/css/nt.css" rel="stylesheet" type="text/css" />
<!--���Ĳ���-->
	<div class="homecon">
		<div class="homedh">
			<div class="hometit1">
				<ul>
					<li class="homesy"><a href="/userdetail.php" class="size14">�û�����</a></li>
					<li class="homesy2"><a target="_blank" href="/modules/article/applywriter.php"
						class="size14">��������</a></li>
				</ul>
			</div>
			<div class="cl">
			</div>
			<div>
			</div>
		</div>
		<div class="homedown">
			<!--��Ա���-->
			<div class="homeDL">
	<div class="photo">
		<div class="photo_pic">
			<div>
				<a href="touxiang.aspx">
					<img style="width: 80px; height: 80px; border: 1px solid #ccc;" id="imagesrc" src="'.jieqi_geturl('system','avatar',$this->_tpl_vars['uid'],'l',$this->_tpl_vars['avatar']).'" /></a>
			</div>
			<div class="photo_name">'.$this->_tpl_vars['uname'].'
			</div>
		</div>
	</div>
	<div class="homeleft_dh">
		<ul>
			<li class="myaccount"><a href="/userdetail.php" title="�˻�">�˻�</a></li>
			<li class="myaccount" style="background-position: 0px -705px;"><a href="/setavatar.php"
				title="ͷ��">ͷ��</a></li>
			<li class="mybookcase"><a href="/modules/article/bookcase.php" title="���">���</a></li>
			<li class="mymsg"><a href="/message.php?box=inbox" title="��Ϣ">��Ϣ</a></li>
			<li class="myfootmark"><a href="/ptopics.php?uid=self" title="���">���</a></li>
			<li class="myhelp"><a target="_blank" href="/modules/forum/" title="����">����</a></li>
			<li class="zuxiao"><a href="/logout.php" title="ע��">ע��</a></li>
		</ul>
	</div>
</div>

			<!--��Ա��߽���-->
			<div class="homeDR">
            <div class="homezhdh">
					<ul>
						<li><a href="/userdetail.php">��������</a></li><li><a href="/passedit.php">�޸�����</a></li><li><a href="/useredit.php">�޸�����</a></li>
					</ul>
				</div>
				<div class="homeDRcon">
					<div class="myinformation">
						<ul>
							<li>�û��ǳƣ�<span style="color: red">'.$this->_tpl_vars['uname'].'</span></li>
							<li class="marlet10">�û��ȼ���'.$this->_tpl_vars['group'].'</li>
							<li>�û����֣�'.$this->_tpl_vars['score'].'</li>
							<li class="marlet10">ͷ�Σ�'.$this->_tpl_vars['honor'].'</li>
							<li>�Ա�'.$this->_tpl_vars['sex'].'</li>
							<li class="marlet10">QQ��'.$this->_tpl_vars['qq'].'</li>
							<li>����ֵ��'.$this->_tpl_vars['credit'].'</li>
							<li class="marlet10">����ֵ��'.$this->_tpl_vars['experience'].'</li>
							<li>����������'.$this->_tpl_vars['system_maxfriends'].'</li>
							<li class="marlet10">�����Ϣ����'.$this->_tpl_vars['system_maxmessages'].'</li>
							<li>����ղ�����'.$this->_tpl_vars['article_maxbookmarks'].'</li>
							<li class="marlet10">ÿ���Ƽ�������'.$this->_tpl_vars['article_dayvotes'].'</li>
							<li>ע�����ڣ�'.$this->_tpl_vars['regdate'].'</li>
							<li class="marlet10">���䣺<a href="mailto:'.$this->_tpl_vars['email'].'">'.$this->_tpl_vars['email'].'</a></li>
							<li>VIP���ͣ�';
if($this->_tpl_vars['isvip'] <= 0){
echo '��vip��Ա';
}else{
echo 'VIP��Ա';
}
echo '</li>
                            <li class="marlet10">'.$this->_tpl_vars['egoldname'].'��';
if($this->_tpl_vars['jieqi_silverusage']==1){
echo $this->_tpl_vars['emoney'];
}else{
echo $this->_tpl_vars['egold'];
}
echo '</li>
							<li>��������'.$this->_tpl_vars['egg'].'</li>
							<li>�ʻ�����'.$this->_tpl_vars['flower'].'</li>

						</ul>
						<div class="cl">
						</div>
					</div>
				</div>
			</div>
			<div class="cl">
			</div>
		</div>
	</div>
';
?>