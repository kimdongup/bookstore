<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['fixid'])){$fixid  ="";} else {$fixid  = $_REQUEST['fixid'];}
if(!isset($_REQUEST['gs2id'])){$gs2id  ="";} else {$gs2id  = $_REQUEST['gs2id'];}


if($my_admin_id && $my_admin_pwd){
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
	if(!Fm.name.value) {
	alert("중분류명을 입력하세요.");
	Fm.name.focus();
	return; }
	document.Form1.action = 'grouping_insert.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<form name=Form1 method=post>
<input type="hidden" name="mod" value="good2_insert">
<input type="hidden" name="fixid" value="<?php echo $fixid; ?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>중분류</B> 
<?php
$result=mysqli_query($link,"select name from goods1 where fixnum=$fixid");
$row=mysqli_fetch_array($result);
echo ">".$row['name'];
?>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 중분류명
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="name" value="" maxlength="20" style="width:122px"> 중간 분류( ex : 한국소설, 영미소설, 일본소설)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	</td>
	</tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[중분류등록하기]</b></a>
</div>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>