<?php
include "top.php";
include "main_left.php";
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}

$query=mysqli_query($link,"select * from goods where id=$id");
$row=mysqli_fetch_array($query);
$name=$row[name];
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
    if(!Fm.receivername.value) {
	alert("받는사람 이름을 입력하세요.");
	Fm.receivername.focus();
	return; } 
    if(!Fm.receiveremail.value) {
	alert("받는사람 이메일을 입력하세요.");
	Fm.receiveremail.focus();
	return; }
    if(!Fm.sendname.value) {
	alert("보내는사람 이름을 입력하세요.");
	Fm.sendname.focus();
	return; }
    if(!Fm.sendemail.value) {
	alert("보내는사람 이메일을 입력하세요.");
	Fm.sendemail.focus();
	return; }
    
	document.Form1.action = 'MyReviewEmailSend.php?mod2=OrderOk';
	document.Form1.submit();
}
//-->
</SCRIPT>

<form name=Form1 method=post>
<input type="hidden" name="id" value="<?php echo $id?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B>[<?php echo $name; ?>] 추천메일 보내기</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 받는사람
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="receivername" value="" maxlength="50" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 받는사람 이메일
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="receiveremail" value="" maxlength="50" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 보내는사람
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="sendname" value="<?php echo $my_name; ?>" maxlength="50" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 보내는사람 이메일
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="sendemail" value="<?php echo $my_email; ?>" maxlength="50" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font >전하실 말씀	
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<textarea name=message rows=5 cols=90></textarea> 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="green"></td></tr>
</table>
</form>
<div align="left">
<p align="center">
<a href="javascript:recording();"><img src="image/next.jpg" border="0"></a>
</div>
</p>
<?php
include "bottom.php";     // 하단 구성
?>