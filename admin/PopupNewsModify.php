<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
$resultbody=mysqli_query($link,"select * from popupnews where id='$id' ");
$rowbody=mysqli_fetch_array($resultbody);
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.imgwidth.value) {
	alert("가로픽셀을 입력하세요.");
	Fm.imgwidth.focus();
	return; } 
    if(!Fm.imgheight.value) {
	alert("세로픽셀을 입력하세요.");
	Fm.imgheight.focus();
	return; }

	document.Form1.action = 'PopupNewsModifyInsert.php';
	document.Form1.submit();
}

function show_pic(img,names) {
var oInput = event.srcElement; 
var fname = oInput.value; 
if((/(.jpg|.jpeg|.gif|.png)$/i).test(fname))
	{
  oInput.parentElement.children[0].src = fname;
    document.images["pic"+img].style.display = "none";
    document.images["pic"+img].style.display = "";
    document.images["pic"+img].src = Form1.elements[names].value; 

	}
else {
  alert('이미지는 gif, jpg, png 파일만 가능합니다. 다시 넣으세요.');
}

}
//-->
</SCRIPT>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="popupnewsmodify">
<input type="hidden" name="id" value="<?php echo $id?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>팝업공지</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 띄우기
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="imgopen" value="1"<?php if($rowbody['imgopen']=="1"){ echo "checked"; } ?>>지금 띄움&nbsp;&nbsp;
    <input type="radio" name="imgopen" value="2"<?php if($rowbody['imgopen']=="2"){ echo "checked"; } ?>>나중에 띄움&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 팝업창 넓이
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="imgwidth" value="<?php echo $rowbody['imgwidth']?>" style="width:122px"> 픽셀(pixel)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 팝업창 높이
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="imgheight" value="<?php echo $rowbody['imgheight']?>"" style="width:122px"> 픽셀(pixel)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 이미지			
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
		<table align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td width="475">
			<input type="file" size="60" name="imgup1" class="input" onChange="show_pic('1','imgup1');"></font>
				<br style="font-size:4">
				이미지 크기:400*400픽셀<br>
				</td>
				<td width="100">				
				<img id="pic1" width="42" height="55" src="<?php if($row['filename'] !== ""){ echo "../popupnewsimg/$rowbody[filename]"; } else { echo "../image/jeungm.jpg"; } ?>" align="absbottom" onLoad="if(this.fileSize>100000)alert('300000kbyte가 넘습니다.\n이사진은 업로드되지 않습니다.\n다시 넣어 주세요.')";>
				</td>
			</tr>
		</table>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><img src="../image/record.gif" border="0"></a>
</div>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>