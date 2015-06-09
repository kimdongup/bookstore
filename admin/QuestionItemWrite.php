<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}
if(!isset($_REQUEST['titlenum'])){$titlenum ="";} else {$titlenum = $_REQUEST['titlenum'];}

if($my_admin_id && $my_admin_pwd){
$query2=mysqli_query($link,"select * from question where id='$id'");
$row2=mysqli_fetch_array($query2);
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.itemnum.value) {
	alert("보기번호를 입력하세요.");
	Fm.itemnum.focus();
	return; } 
    if(!Fm.item.value) {
	alert("보기 내용을 입력하세요.");
	Fm.item.focus();
	return; }

	document.Form1.action = 'questionItemInsert.php';
	document.Form1.submit();
}

//-->
</SCRIPT>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="questioninsert">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="titlenum" value="<?php echo $titlenum?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>보기 등록하기</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="900" height="40">
<b>질문 :
<?php
echo $row2['title']."</b><p>";

$query3=mysqli_query($link,"select * from question where titlenum='$titlenum' && itemnum!='0' order by itemnum asc");
while($row3=mysqli_fetch_array($query3)){
echo "&nbsp;&nbsp;&nbsp;&nbsp;".$row3['itemnum'].". ".$row3['item']."<br>";
}
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
				<font color="red">*</font> 보기번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="itemnum" value="" maxlength="30" style="width:50px"> 같은 번호를 사용하지 마세요.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 보기내용
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="item" value="" maxlength="30" style="width:500px">
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
}else{ msg("이곳은 관리자 메뉴입니다."); }
include "bottom.html";     // 하단 구성
?>