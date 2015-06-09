<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['modifyid'])){$modifyid  ="";} else {$modifyid  = $_REQUEST['modifyid'];}

if($my_admin_id && $my_admin_pwd){
if($mod=="bannermodify"){  
$result=mysqli_query($link,"select * from banner where id='$modifyid' ");
$rowbody=mysqli_fetch_array($result);
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
    if(!Fm.url.value) {
	alert("url을 입력하세요.");
	Fm.url.focus();
	return; } 
    if(!Fm.content.value) {
	alert("상담 내용을 입력하세요.");
	Fm.content.focus();
	return; }

	document.Form1.action = 'banner_modify_insert.php';
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
<input type="hidden" name="mod" value="bannermodifyinsert">
<input type="hidden" name="id" value="<?php echo $modifyid?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>배너 신청</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> url
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="url" value="<?php echo $rowbody['url']?>" maxlength="30" style="width:500px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 광고번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="text" name="action2" value="<?php echo $rowbody['action']?>" maxlength="30" style="width:50px">
			<BR>지금 즉시 로테이션 광고를 하려면 0 이상의 숫자를 넣으세요.
			<BR>단, 광고번호가 중복되면 안됩니다.
			<BR>지금 광고를 하지 않을 경우 0을 입력하세요. 
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 내용
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<textarea name=content rows=10 cols=90><?php echo $rowbody['content']?></textarea>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font> 배너이미지			
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
		<table align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td width="475">
			<input type="file" size="60" name="imgup1" class="input" onChange="show_pic('1','imgup1');"></font>
				</td>
				<td width="100">				
				<img id="pic1" width="42" height="55" src="<?php if($row['filename'] !== ""){ echo "../bannerimg/$rowbody[filename]"; } else { echo "../image/jeungm.jpg"; } ?>" align="absbottom" onLoad="if(this.fileSize>300000)alert('300000kbyte가 넘습니다.\n이사진은 업로드되지 않습니다.\n다시 넣어 주세요.')";>
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
}else{ err_msg("잘못된 접근을 시도하고 있습니다."); }
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>