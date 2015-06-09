<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
	if(!Fm.pass.value) {
	alert("비밀번호를 입력하세요.");
	Fm.pass.focus();
	return; }
	document.Form1.action = 'goods1_del.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>대분류 삭제</B>
</td>
</tr>
<tr><td colspan="2" class="bgc_bar" height="2"></td></tr>
</table>
<form method="post" name=Form1>
<input type="hidden" name="mod" value="del_ok">
<INPUT type=hidden name=id value="<?php echo $id; ?>">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
				* 비밀번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
				<input type=password name="pass" size=12>
			</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left" style="padding-left:150px">
<a href="javascript:recording();"><b>[삭제 처리하기]</b></a>
</div>
<p>
<?php 
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html"; ?>