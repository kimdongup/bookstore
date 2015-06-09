<?php
include "top.php";
include "main_left.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['$my_grade'])){$my_grade ="";} else {$my_grade = $_SESSION['$my_grade'];}
if($my_member_id){
	if($my_grade < 6){ // 5보다 적어야 관리자
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
    if(!Fm.publishname.value) {
	alert("출판사명을 입력하세요.");
	Fm.publishname.focus();
	return; }  	
	document.Form1.action = 'PublishList.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<form name=Form1 method=post enctype=multipart/form-data>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 출판사명
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="publishname" value="" maxlength="30" style="width:200px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><img src="image/confirmation.gif" border="0"></a>
</div>
<p>
<?php
}else{ msg("관리자가 아닙니다."); }
}else{ include "link_login.php"; }
include "bottom.php";
?>