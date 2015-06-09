<?php
session_cache_limiter('nocache, must-revalidate');
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if($my_admin_id && $my_admin_pwd){
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B>FAQ 관리</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<SCRIPT LANGUAGE='javascript'>
<!--
function action_pg(fr) {
    var Fm = document.Form1;
    if (fr == "mod1") { 
        Fm.action = "faq_admin_insert.php"
        Fm.submit(); 
    }
}
//-->
</SCRIPT>


<form method=post  name=Form1 action="faq_admin_insert.php" enctype=multipart/form-data>
<input type="hidden" name="mod" value="jinsert">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
			<td>
			&nbsp;■ &nbsp;<b>내용 수정</b>
			</td>
		</tr>
		<tr>
			<td class="bgc_bar2" height="2"></td>
			<td class="bgc_bar2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
		<td> &nbsp; <textarea name=question rows=2 cols=115>Question</textarea></td>
		</tr>
		<tr>
			<td>

			&nbsp; <textarea name=content rows=30 cols=115>Answer</textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
</table>

<p align=center> 
<img src="../image/record.gif" border="0"  onClick="action_pg('mod1');" style="cursor:hand"> 
</form>
<?php 
}else{
echo "잘못된 접근입니다.";
}
include "bottom.html";
?>