<?php
echo '<link rel="stylesheet" type="text/css" href="/themes/chaoliu/css/top.css" />

<style type="text/css">
#lm2{width:306px;float:left;height:265px;margin-right:3px;margin-left:3px;margin-top:10px;}
#menu #menu_1{display:none;}
#menu #menu_3{display:block;}
</style>
<script type="text/javascript">
function changecla(id){
    var arcid1 = id.slice(-2,-1);
    var arcid2 = id.slice(-2);
    for(var i=1; i<=3; i++){
        $("font_" + arcid1 + i).className = "";
        $("dd_" + arcid1 + i).style.display = "none";
    }
    $("font_" + arcid2).className = "act";
    $("dd_" + arcid2).style.display = "";
    
}
function changecla1(id){
    var arcid1 = id.slice(-3,-1);
    var arcid2 = id.slice(-3);
    for(var i=1; i<=3; i++){
        $("font_" + arcid1 + i).className = "";
        $("dd_" + arcid1 + i).style.display = "none";
    }
    $("font_" + arcid2).className = "act";
    $("dd_" + arcid2).style.display = "";
    
}
</script>
<div id="main">
<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />ŮƵ�����</strong><font onmouseover="changecla(this.id);" id="font_13">��</font><font onmouseover="changecla(this.id);" id="font_12">��</font><font onmouseover="changecla(this.id);" id="font_11">��</font></dt>
<dd id="dd_11" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvisit,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_12" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'monthvisit,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_13" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'weekvisit,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
</div>

<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />��Ƶ�����</strong><font onmouseover="changecla(this.id);" id="font_23">��</font><font onmouseover="changecla(this.id);" id="font_22">��</font><font onmouseover="changecla(this.id);" id="font_21">��</font></dt>
<dd id="dd_21" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvisit,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_22" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'monthvisit,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_23" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'weekvisit,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
</div>
<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />��������</strong><font onmouseover="changecla(this.id);" id="font_33">��</font><font onmouseover="changecla(this.id);" id="font_32">��</font><font onmouseover="changecla(this.id);" id="font_31">��</font></dt>
<dd id="dd_31" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvisit,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_32" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'monthvisit,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_33" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'weekvisit,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
</div>
<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />ŮƵ�Ƽ���</strong><font onmouseover="changecla(this.id);" id="font_43">��</font><font onmouseover="changecla(this.id);" id="font_42">��</font><font onmouseover="changecla(this.id);" id="font_41">��</font></dt>
<dd id="dd_41" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvote,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_42" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'monthvote,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_43" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'weekvote,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
</div>

<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />��Ƶ�Ƽ���</strong><font onmouseover="changecla(this.id);" id="font_53">��</font><font onmouseover="changecla(this.id);" id="font_52">��</font><font onmouseover="changecla(this.id);" id="font_51">��</font></dt>
<dd id="dd_51" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvote,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_52" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'monthvote,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_53" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'weekvote,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
</div>

<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />�����Ƽ���</strong><font onmouseover="changecla(this.id);" id="font_63">��</font><font onmouseover="changecla(this.id);" id="font_62">��</font><font onmouseover="changecla(this.id);" id="font_61">��</font></dt>
<dd id="dd_61" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'allvote,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_62" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'monthvote,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_63" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'weekvote,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
</div>

<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />ŮƵ�ղذ�</strong><font onmouseover="changecla(this.id);" id="font_73">��</font><font onmouseover="changecla(this.id);" id="font_72">��</font><font onmouseover="changecla(this.id);" id="font_71">��</font></dt>
<dd id="dd_71" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_72" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>

<dd id="dd_73" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,9|10|11|12|13|14|15|16,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd></div>

<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />��Ƶ�ղذ�</strong><font onmouseover="changecla(this.id);" id="font_83">��</font><font onmouseover="changecla(this.id);" id="font_82">��</font><font onmouseover="changecla(this.id);" id="font_81">��</font></dt>
<dd id="dd_81" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
<dd id="dd_82" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
<dd id="dd_83" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,1|2|3|4|5|6|7|8,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd></div>

<div id="lm2" class="lmc">
<dt><strong><img src="http://www.chaoliuyc.com/template/newchaoliu/images/tuijian2ico.gif"  align="absmiddle" />�����ղذ�</strong><font onmouseover="changecla(this.id);" id="font_93">��</font><font onmouseover="changecla(this.id);" id="font_92">��</font><font onmouseover="changecla(this.id);" id="font_91">��</font></dt>
<dd id="dd_91" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
<dd id="dd_92" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd>
<dd id="dd_93" class="txt_tab" style="display:none"><ul>'.jieqi_get_block(array('bid'=>'89', 'module'=>'article', 'filename'=>'block_articlelist', 'classname'=>'BlockArticleArticlelist', 'side'=>'0', 'title'=>'', 'vars'=>'goodnum,10,17|18|19|20|21|22,0,0,0', 'template'=>'index_top.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'3'), 1).'</ul></dd></div>

<script type="text/javascript">
for(var i=1; i<=100; i++){
    if($("font_" + i + 1)){
        $("font_" + i + 1).className = "act";
        $("dd_" + i + 1).style.display = "";
    }
    else{break;}
}
</script>
';
?>