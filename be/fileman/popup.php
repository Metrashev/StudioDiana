<?php
$GLOBALS['FMAN_IMAGES_ABS_PATH'] = __DIR__."/../../files/custom";
$GLOBALS['FMAN_IMAGES_URL_PATH'] = '/files/custom';

\ITTI\FW::$HTMLPage->SkinFile=null;

include(__DIR__."/../../itti/php/FileMan.php");



$basedir=getBaseDir();
$dir=getDir($basedir);
if($dir===false) myError(1);

$selector=$_GET['selector'];

$sortorder=$_POST['sortorder'];
$sortfield=$_POST['sortfield'];
if ($sortorder!="asc" && $sortorder!="desc" )
	$sortorder= "asc";
if ($sortfield!=1 && $sortfield!=2 && $sortfield!=3)
	$sortfield= 0;


$fm=new CFManInterface($basedir,$dir,$_POST);


?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<title>File Manager</title>
<script type="text/javascript">
<!--


function insertMyImage(href) {
	tinyMCEPopup.editor.execCommand('mceInsertContent',false,'<img src="'+href+'" alt="" />');
	tinyMCEPopup.close();
}

function getFileSize(size) {


	if(size<1024) {
		return size+' bytes';
	}
	if(size<1048576) {
		var t=(size/1024).toFixed(0);
		return t+"Kb";
	}
	var t=(size/1048576).toFixed(0);
	return t+"Mb";
}

function getFileExt(filename) {
	var s=filename.lastIndexOf(".");
	if(s==-1)
		return '';
	if(s>=filename.length-1)
		return -1;
	s=filename.substr(s+1,filename.length-1);
	return s;
}



function insertMyLink(href,filename,filesize) {

	var conf =new Array (
		new Array('pdf','pdfStyle'),
		new Array('doc','docStyle'),
		new Array('zip','zipStyle')
		);

	var style=null;
	var ext=getFileExt(filename).toLowerCase();
	if(ext!='') {
		for(i=0;i<conf.length;i++) {
			if(ext==conf[i][0]) {

				style=conf[i][1];

				break;
			}
		}
	}

	style = 'DownloadLink';
	filename+=" ("+getFileSize(filesize)+")";

	var ed=tinyMCEPopup.editor;
	var n = ed.selection.getNode();
	if(n.nodeName=='A'){
		ed.execCommand('mceInsertLink', false, href);
	} else if(ed.selection.isCollapsed()) {
			href = href.replace('"', "&quot;");
			filename = filename.replace(/&quot;/g, '"');
			ed.execCommand('mceInsertContent', false, '<a href="'+href+'" class="'+style+'">'+filename+'</a>');
	} else {
		ed.execCommand('mceInsertLink', false, href);
	}
tinyMCEPopup.close();
}


var i=1;

history[history.length]='';
history[history.length-1]='';

function br_onclick() {
	if (i<30) {
		j=i;
		i++;
		eval("document.f2.elements.userfile"+j).insertAdjacentHTML("AfterEnd","<br id=\"brid"+i+"\"><input type=\"file\" name=\"userfile"+i+"\" size=\"40\">");
		cf.innerHTML=i;
		document.f2.elements.urlcount.value=i;
	}
}
function bl_onclick() {
	if (i>1) {
		j=i;
		i--;
		eval("document.f2.elements.userfile"+j+".outerHTML=\"\"");
		cf.innerHTML=i;
		document.f2.elements.urlcount.value=i;
		eval("brid"+j+".outerHTML=\"\"");
	}
}

function setsort(sortfield) {
	if (sortfield==document.f2.sortfield.value) {
		document.f2.sortorder.value=='asc'?document.f2.sortorder.value='desc':document.f2.sortorder.value='asc';
	} else {
		document.f2.sortfield.value=sortfield;
	}
	document.f2.submit();
	return false;
}

function GoBack(){
	str=document.f2.dir.value;
	if (str=="/") return false;
	str=str.substring(0,str.lastIndexOf("/"));
	str=str.substring(0,str.lastIndexOf("/")+1);
	document.f2.dir.value=str;
	document.f2.submit();
	return false;
}

function GoToFolder(folder){
	if(folder.substring(0,1)=="/") document.f2.dir.value=folder;
	else document.f2.dir.value+=folder+"/";
	document.f2.submit();
	return false;
}

function CopyToClipboard(){
	tmp="";
	for (i=0; i<document.f2.elements.length; i++) {
		if( (document.f2.elements[i].name=='files[]') && (document.f2.elements[i].checked) )
			tmp+="|"+document.f2.elements[i].value;
	}
	if (tmp.length>1) {
		document.f2.clipboard.value=document.f2.dir.value+tmp;
	} else {
		document.f2.clipboard.value='';
	}

	return false;
}

function CheckClipboard(){
	str=document.f2.clipboard.value;
	if(str.length>1) {
		str=str.substring(0,str.lastIndexOf("|"));
		if (str!=document.f2.dir.value) return true;
	}
	alert("There's nothing to paste!");
	return false;
}

function CheckNewDir(){
	str=document.f2.newfoldername.value;
	if(str.length>=1 && str.indexOf("/")==-1) return true;
	alert(str+" is Invalid Name!");
	return false;
}

function CheckDelete(){
	tmp="";
	for (i=0; i<document.f2.elements.length; i++) {
		if( (document.f2.elements[i].name=='files[]') && (document.f2.elements[i].checked) )
			tmp+=document.f2.elements[i].value+"\n";
	}
	if (tmp.length>1) {
		return confirm("are you sure you want to delete:\n"+tmp);
	} else {
		alert("nothing to delete");
	}
	return false;
}

function TransferSelected(){
	var args = top.tinymce.activeEditor.windowManager.getParams();
	var form  = document.forms[0];

	base_virtual_disk_URL = "<? echo $base_virtual_disk_URL; ?>"+form.dir.value;
	for (var i=0; i<form.elements.length; i++) {
		if( (form.elements[i].name=='files[]') && (form.elements[i].checked) ) {

			args.target_ctrl.value = base_virtual_disk_URL+form.elements[i].value+(form.elements[i].getAttribute('isdir')=="1"?"/":"");

		}
	}
	top.tinymce.activeEditor.windowManager.close();
}

function checkthis(){
	return true;
}


-->


</script>

</head>
<body bgcolor="#999999" text="#000000" topmargin="2" marginheight="2" leftmargin="2" marginwidth="2">




<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center" bgcolor="#CCCCCC">
  <tr>
    <td valign="top" colspan="2" class="hnm">
<form name="f2" method="post" enctype="multipart/form-data" action="<?echo basename($PHP_SELF);?>" onSubmit="return checkthis();">
<table border=0 cellpadding=2 cellspacing=0 bgcolor=#ffffff width="100%">
<tr><td bgcolor=#cccc99 width=1% class="hnm">&nbsp;Location&nbsp;</td><td bgcolor=#cccc99><input name="dir" value="<? echo $dir ?>">
<input type="submit" value="Go">
<input type="button" value="Back" onClick="return GoBack();">
<input type="submit" value="Delete" name="delete" onClick="return CheckDelete();">
<input type="button" value="Cut" name="Cut" onClick="return CopyToClipboard();">
<input type="submit" value="Paste" name="paste" onClick="return CheckClipboard();">
<input type="button" value="Select" name="fselect" onClick="TransferSelected();">
</td></tr>
</table>
<table border=0 cellpadding=0 cellspacing=1 bgcolor=#ffffff width="100%">
<tr bgcolor=#cccc99>
	<td width=20>&nbsp;</td>
	<td class="hnm">&nbsp;<a href="#" onClick="return setsort('0');">Name</a><? if ($sortfield=='0') echo $sortorder=="asc" ? "▲" : "▼"; ?></td>
	<td  class="hnm" width=100 align=right><? if ($sortfield=='1') echo $sortorder=="asc" ? "▲" : "▼"; ?><a href="#" onClick="return setsort('1');">Size</a>&nbsp;</td>
	<td  class="hnm" width=100>&nbsp;<a href="#" onClick="return setsort('2');">Modified</a><? if ($sortfield=='2') echo $sortorder=="asc" ? "▲" : "▼"; ?></td>
</tr>

<?
	$fm->render();
//	print_dir($dir,$sortfield,$sortorder);
	printf("<tr bgcolor=\"#D5D5D5\"><td class=\"hnm\" colspan=4>&nbsp;%s</td></tr>", $fm->status_line);
?>
</table>

<hr width="100%" noshade size="1" align=left>

<select name="command">
<option value="1">New Dir</option>
<option value="3">New HTML Document</option>
<option value="2">Rename first checked to</option>
</select>
<input type="text" name="newfoldername" value="" size="20"><input type="submit" value=" Do It " name="commandbtn" onClick="return CheckNewDir();">

<hr width="100%" noshade size="1" align=left>
<table><tr><td>

	<input type="button" value="&lt;&lt;" name="xxl" onClick="bl_onclick(this)">&nbsp;&nbsp;&nbsp;</td>
	<td><div id="cf">1</div></td>
	<td>&nbsp;&nbsp;&nbsp;<input type="button" value="&gt;&gt;" name="xxr" onClick="br_onclick(this)">&nbsp;&nbsp;&nbsp;&nbsp;files
</td></tr></table>
<input type="hidden" name="urlcount" value="1">
<input type="file" name="userfile1" size="40">

	<input type="submit" value="Upload" name="upload">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="sortorder" value="<? echo $fm->sortorder ?>">
<input type="hidden" name="sortfield" value="<? echo $fm->sortfield ?>">
<input type="hidden" name="clipboard" value="<? echo $fm->clipboard ?>">
<input type="hidden" name="resource" value="<? echo $resource ?>">
<input type="hidden" name="selector" value="<? echo htmlspecialchars(stripslashes($_GET['selector'])) ?>">
</form>
    </td>
  </tr>
</table>
</body>
</html>