//ͼƬ��Ŀ¼
var imageurl=siteurl+'/files/cartoon/page/'+Math.floor(cartoonid / 1000)+'/'+cartoonid+'/'+volumeid+'/';

//ͼƬ״̬λ��
var Obj='';
var imgstatus=0;
var pX;
var pY;
var mycartoonid;
var volumeid;
if(remotepicurl != '')
{
	imageurl='http://'+remotepicurl+'/'+remotepicpath+'/'+Math.floor(cartoonid / 1000)+'/'+cartoonid+'/'+volumeid+'/';
}

//Ĭ��ҳ��
var page=getParameter('p');
page = parseInt(page);
imagenum = parseInt(imagenum);
if(page == null || isNaN(page) || page <= 0 || page > imagenum) page=1;


//��ʾĬ��ͼƬ

function pageload(){
	var readdiv=document.getElementById('readdiv');
	readdiv.innerHTML='��������ͼƬ�����Ժ�...';
	if(getreadcookie('imgW') != null)
	{
		readdiv.innerHTML='<img id="readimage" src="'+imageurl+page+'.pic" border="0" onmousedown="imgdown(this)" onmousemove="imgmove()" onmouseup="imgup()" style="position:relative;" width="'+getreadcookie('imgW')+'" height="'+getreadcookie('imgH')+'" onload="fimg()" onmouseout="imgup()">';
	}
	else
	{
		readdiv.innerHTML='<img id="readimage" src="'+imageurl+page+'.pic" border="0" onmousedown="imgdown(this)" onmousemove="imgmove()" onmouseup="imgup()" style="position:relative;" onload="fimg()" onmouseout="imgup()">';
	}
	var loadinginfo=document.getElementById('loadinginfo');
	npage=page+1;
	MM_preloadImages(imageurl+npage+'.pic');
}

function fimg()
{
	cartoonpic = document.getElementById("readimage");
	if(getreadcookie('selfW')!=null)
	{
		selfW=getreadcookie('selfW');
		selfH=getreadcookie('selfH');
	}
	else
	{
		picW = cartoonpic.width;
		picH = cartoonpic.height;
		selfW = picW;
		selfH = picH;
	}
}

function gimg()
{
	cartoonpic = document.getElementById("readimage");
	selfW2 = cartoonpic.width;
	selfH2 = cartoonpic.height;
}

//Ԥ����ͼƬ
function MM_preloadImages() { //v3.0
var d=document; if(d.images){ 
if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments;
for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ 
d.MM_p[j]=new Image; 
d.MM_p[j++].src=a[i];
}
}
}



//��ʾVIPͼƬ
function vippageload(){
	var readdiv=document.getElementById('readdiv');
	readdiv.innerHTML='��������ͼƬ�����Ժ�...';
	
	if(getreadcookie('imgW') != null)
	{
		
		readdiv.innerHTML='<img id="readimage" src="'+siteurl+'/modules/cartoon/vipimg.php?aid='+cartoonid+'&vid='+volumeid+'&p='+page+'" border="0" onmousedown="imgdown(this)" width="'+getreadcookie('imgW')+'" height="'+getreadcookie('imgH')+'"   onmousemove="imgmove()" onmouseup="imgup()" onmouseout="imgup()">';
	}
	else
	{
		readdiv.innerHTML='<img id="readimage" src="'+siteurl+'/modules/cartoon/vipimg.php?aid='+cartoonid+'&vid='+volumeid+'&p='+page+'" border="0" onmousedown="imgdown(this)"   onmousemove="imgmove()" onmouseup="imgup()" onmouseout="imgup()">';
	}
	
	
	readdiv.innerHTML='<img id="readimage" src="'+siteurl+'/modules/cartoon/vipimg.php?aid='+cartoonid+'&vid='+volumeid+'&p='+page+'" border="0" onmousedown="imgdown(this)"   onmousemove="imgmove()" onmouseup="imgup()" onmouseout="imgup()">';
	
	var loadinginfo=document.getElementById('loadinginfo');
	
	cartoonpic = document.getElementById("readimage");
	picW = cartoonpic.width;
	picH = cartoonpic.height;
	selfW = picW;
	selfH = picH;	
		
	npage=page+1;
	MM_preloadImages(siteurl+'/modules/cartoon/vipimg.php?aid='+cartoonid+'&vid='+volumeid+'&p='+npage);
}

//�ƶ�ͼƬ

//ͼƬ�ϰ������
function imgdown(Object){
	Obj=Object.id;
	document.all(Obj).setCapture();
	pX=event.clientX-document.all(Obj).style.pixelLeft;
	pY=event.clientY-document.all(Obj).style.pixelTop;
}

function imgmove(){
	if(Obj!='')
	{
	document.all(Obj).style.left=event.clientX-pX;
	document.all(Obj).style.top=event.clientY-pY;
	}
}

//ͼƬ���ͷ����
function imgup(){
	if(Obj!='')
	{
		document.all(Obj).releaseCapture();
		Obj='';
	}
}

function zoom()
{
	gimg();
	if (selfH2 > 0 && selfW2 > 0)
		{
			selfH2 = selfH2 * 130 / 100;
			selfW2 = selfW2*130/100;
			cartoonpic.height = selfH2;
			cartoonpic.width = selfW2;
		}
		saveimg();
}

function mini()
{
	gimg();
	if (selfH2 > 0 && selfW2 > 0)
		{
			if (selfH2 > 100 || selfW2 > 100)
			{
				selfH2 = selfH2 * 70 / 100;
				selfW2 = selfW2 * 70 / 100;
				cartoonpic.height = selfH2;
				cartoonpic.width = selfW2;
			}
		}
	saveimg();
}

function self()
{
	document.all('readimage').style.left=0;
	document.all('readimage').style.top=0;
	cartoonpic.height = selfH;
	cartoonpic.width = selfW;
	saveimg();
}

function wellsize()
{
	document.all('readimage').style.left=0;
	document.all('readimage').style.top=0;

	var oBody = document.body;

	var tH = oBody.clientHeight;
	var tW;
	if (tH > 700)
	{
		tW = 900;
	}
	else
	{
		tW = 900;
	}
	//var tH =	500;
	//var tW = 800;
	//document.write("here:"+tH);

	if (selfH > tH)	
	{
		cartoonpic.height = tH;
		cartoonpic.width = selfW*tH/selfH;
	}
	else if (selfW > tW)
	{
		cartoonpic.width = tW;
		cartoonpic.height= selfH*tW/selfW; 
	}
	saveimg();
}

function saveimg()//��¼ͼƬ��С��cookie
{
	cartoonpic = document.getElementById("readimage");
	selfW2 = cartoonpic.width;
	selfH2 = cartoonpic.height;
	setreadcookie('imgW',selfW2);
	setreadcookie('imgH',selfH2);
	if(getreadcookie('selfW')==null)
	{
		setreadcookie('selfW',selfW);
		setreadcookie('selfH',selfH);
	}
}



//��ʾ��ҳ����ת
function showpagelink(){
	document.write('<input type="button" class="button" value="�Ŵ�ͼƬ" onClick="javascript:zoom()"> ');
	
	document.write('<input type="button" class="button" value="��СͼƬ" onClick="javascript:mini()"> ');
	
	document.write('<input type="button" class="button" value="��ԭͼƬ" onClick="javascript:self()"> ');
	
	document.write('<input type="button" class="button" value="���ʴ�С" onClick="javascript:wellsize()"> ');
	
	document.write('<input name="prevpage" type="button" class="button" value="��һҳ" onClick="javascript:prevpage()"> ');

	document.write('<select name="jumppage" class="select" onChange="javascript:jumppage(this.value)">');
	for (i=1;i<=imagenum;i++){
		document.write('<option value="'+ i +'"');
		if(i==page) document.write(' selected');
		document.write('>��'+ i +'ҳ</option>');
	}
	document.write('</select>');

	document.write(' <input name="nextpage" type="button" class="button" value="��һҳ" onClick="javascript:nextpage()">');
}

//ҳ����ת
function jumppage(v){
	if(v > 0 && v <= imagenum){
		page = v;
		showimg(v);
	}
}

//ȡ��ַ������
function getParameter(varName){
	var query = location.search;
	if (query != null || query != "")
	{
		query = query.replace(/^\?+/, "");
		var qArray = query.split("&");
		var len = qArray.length;
		if (len > 0)
		{
			for (var i=0; i<len; i++)
			{
				var sArray = qArray[i].split("=", 2);
				if (sArray[0] && sArray[1] && sArray[0] == varName)
				{
					return unescape(sArray[1]);
				}
			}
		}
	}
	return null;
}

//��ʾͼƬ
function showimg(v){
	url = location.search;
	vv=getParameter("p");
	if(vv!=null){
		search='p='+vv;
		replace='p='+v;
		var regex = new RegExp(search, "g");
		url=url.replace(regex, replace);
	}else{
		url=url+'&p='+v;
	}
	for(i=0; i<document.getElementsByName('jumppage').length; i++) document.getElementsByName('jumppage')[i].value=v;
	window.location=url;
}

//��һҳ
function prevpage(){
	page--;
	if (page < 1){
		alert('�Ѿ�����һҳ��');
		page = 1;
	}else{
		showimg(page);
	}
}

//��һҳ
function nextpage(){
	page++;
	if (page > imagenum ){
		alert('�Ѿ������һҳ��');
		page = imagenum;
	}else{
		showimg(page);
	}
}

//��������
function keydown(){
	if(event.ctrlKey == true || event.shiftKey == true)	return false;
}

//�����¼�
function keyup(){
	if (event.keyCode == 188){
		prevpage();
	}
	if (event.keyCode == 190 || window.event.keyCode == 32){
		nextpage();
	}
	if(event.keyCode == 187 && document.images['readimage'].width < 2000){
		document.images['readimage'].width = document.images['readimage'].width * 1.2
	}	
	if( event.keyCode == 189 && document.images['readimage'].width > 200){
		document.images['readimage'].width = document.images['readimage'].width / 1.2
	}
}

//����cookie
function setreadcookie(cname, cvalue) {
	var expdate = new Date((new Date()).getTime() + (24 * 60 * 60 * 1000 * 1));
	document.cookie = cname + "=" + escape(cvalue) + ";expires="+expdate.toGMTString() +";";
}

//��ȡcookie
function getreadcookie(cname)	{
	var aCookie = document.cookie.split("; ");
	for (var i=0; i < aCookie.length; i++) {
		var aCrumb = aCookie[i].split("=");
		if (cname == aCrumb[0]) 
		return unescape(aCrumb[1]);
	}
	return null;
}

//������ǩ
function addbookmark(){
	var url=siteurl+'/modules/cartoon/addbookcase.php?bid='+cartoonid+'&vid='+volumeid+'&page='+page;
	window.open(url);
}