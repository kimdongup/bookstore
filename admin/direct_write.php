<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
    if(!Fm.cstitle.value) {
	alert("제목을 입력하세요.");
	Fm.cstitle.focus();
	return; } 
    if(!Fm.content.value) {
	alert("상담 내용을 입력하세요.");
	Fm.content.focus();
	return; }

	document.Form1.action = 'direct_insert.php';
	document.Form1.submit();
}

//-->
</SCRIPT>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="directinsert">
<input type="hidden" name="id" value="<?php echo $id?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>1 : 1 상담 답변하기</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" align="center" class="bgc_table2"><B>질문</B></td>
<td width="800">
<?php
$query=mysqli_query($link,"select * from consult where id='$id'");
$row=mysqli_fetch_array($query);
echo nl2br($row['content']);
?>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 신청자
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<?php echo $row['memberid']; ?>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 제목
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="cstitle" value="RE : <?php echo $row['title']; ?>" maxlength="30" style="width:500px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 내용
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<textarea name=content rows=10 cols=90></textarea>
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
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>