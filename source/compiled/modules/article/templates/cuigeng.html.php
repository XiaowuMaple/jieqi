<?php
$GLOBALS['jieqiTset']['jieqi_blocks_module'] = 'article';
echo '
';
$GLOBALS['jieqiTset']['jieqi_blocks_config'] = 'guideblocks';
echo '
';
$this->_tpl_vars['jieqi_pagetitle'] = "�����߸� - {$this->_tpl_vars['jieqi_sitename']}";
echo '
';
$this->_tpl_vars['meta_keywords'] = "{$this->_tpl_vars['articlename']} {$this->_tpl_vars['author']}";
echo '
<style>
.articletitle{height:30px;text-align:center;line-height:30px;font-size:14px;font-weight:bold;margin-top:10px;text-align:left;padding:10px;}
#formsubmit{margin-top:20px;}
.hang{width:30%;float:left;margin-left:20px;height:100px;line-height:100px;margin-top:10px;}
.wenzi{width:26%;float:left;margin-left:40px;padding-left:5px;height:25px;line-height:25px;margin-top:10px;}
</style>
<div style="border:1px #ccc solid;height:880px;margin-bottom:10px;">
    <div class="articletitle"><font style="">��<a href="/modules/article/articleinfo.php?id='.$this->_tpl_vars['articleid'].'">'.$this->_tpl_vars['articlename'].'</a>��</font>����д��ʵ����̫���ˣ����Ǹ��²���񫣬�����߸�</div>
    <div style="margin-left:10px;">����ǰ��ʣ�� '.$this->_tpl_vars['eggold'].' �����ң�<a href="/modules/pay/buyegold.php">��Ҫ��ֵ</a></div>
    <div style="width:100%;display:block;">
        <div class="hang"><a href="/modules/article/cuigeng.php?id='.$this->_tpl_vars['articleid'].'&nums=100"><img src="/images/1.gif" /></a></div>
        <div class="hang"><a href="/modules/article/cuigeng.php?id='.$this->_tpl_vars['articleid'].'&nums=190"><img src="/images/2.gif" /></a></div>
        <div class="hang"><a href="/modules/article/cuigeng.php?id='.$this->_tpl_vars['articleid'].'&nums=280"><img src="/images/3.gif" /></a></div>
        <div class="wenzi">��Ҫ100������</div>
        <div class="wenzi">��Ҫ190������</div>
        <div class="wenzi">��Ҫ280������</div>
    </div>
    <div style="clear:both;">
    <div style="margin-top:10px;padding:10px;line-height:25px;text-align:left;">
<font color="#ff0000" style="font-size:16px;"><b>�߸�����˵��</b></font><br>
1��ʲô�Ǵ߸����������ĳ��Ʒ�ĸ����ٶȲ����⣬�Ϳ���ʹ�ô߸����ߴ���Ʒ�ĸ��£�ֻҪ�ڶ������ߵĸ������ܴﵽ�߸�Ҫ��ĸ��������߸����������ˣ�ͬʱ����Ҳ���Ի��һ�������档<br>
2�����;����<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�߸����ͣ�����������׼����Ϊ2000�֣�4000��6000����������(2012��5��1��ʵ��)<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�߸����ͶƱҪ��(2012��5��1��ʵ��)<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����Ҫ��2000�ֵĴ߸����ͶƱҪ��Ϊ100�������ҡ�<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����Ҫ��4000�ֵĴ߸����ͶƱҪ��Ϊ190�������ҡ�<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����Ҫ��6000�ֵĴ߸����ͶƱҪ��Ϊ280�������ҡ�<br>
3�����㷽ʽ��Ͷ���߸�Ʊ�����ߵڶ����������Ӧ���������ɻ�ö���Ͷ������Ӧ���ִ߸��ֳɽ������������û�и��µ���Ч���������ͳһ�Գ����ҵ���ʽ�˻����ʺ��ϡ�<br>
4����ʾλ�ã���Ʒ����ҳ<br>
5�����Ҳ�ѯλ�ã����Һ�̨<br>
6��ע�����<br>
�����߷�������Ʒ�����޹ص����������������������վ��Ȩ�ж�����Ĵ߸���Ч��<br>
��2012��5��1��ʵ����Ϊ�¹��ܲ��Խ׶Σ��ڼ����ݾ����������Ӧ�����������������й�����<br>
�����������н���Ȩ�鱾վ���С�
    </div>
</div>';
?>