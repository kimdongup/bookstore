<?php
include "top.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['$my_grade'])){$my_grade ="";} else {$my_grade = $_SESSION['$my_grade'];}
if($my_member_id){
	if($my_grade < 6){ // 5보다 적어야 관리자
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.pwd.value) {
	alert("출판사 비밀번호를 입력하세요.");
	Fm.pwd.focus();
	return; } 
    if(!Fm.gsintro.value) {
	alert("책소개룰 입력하세요.");
	Fm.gsintro.focus();
	return; }  	
    if(!Fm.auintro.value) {
	alert("저자 및 역자 소개를 입력하세요.");
	Fm.auintro.focus();
	return; }    
    if(!Fm.content.value) {
	alert("목차를 입력하세요.");
	Fm.content.focus();
	return; }
    if(!Fm.preview.value) {
	alert("출판사 리뷸를 입력하세요.");
	Fm.preview.focus();
	return; } 

	document.Form1.action = 'PublishingModifyInsert.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="pubishinsert">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="bookname" value="<?php echo $bookname; ?>">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B><?php echo $bookname; ?> 내용 수정</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<?php
$queryct=mysqli_query($link,"select * from goodsct where goodsid='$id' ");
$rowct=mysqli_fetch_array($queryct);
?>
<input type="hidden" name="goodsid" value="<?php echo $rowct['goodsid']?>">
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 출판사 비밀번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="pwd" value="" maxlength="50" style="width:120px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">

		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>책소개</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=gsintro rows=15 cols=140><?php echo $rowct['gsintro']; ?></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>저자 및 역자 소개</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=auintro rows=15 cols=140><?php echo $rowct['auintro']; ?></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>목차</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=content rows=15 cols=140><?php echo $rowct['content']; ?></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>출판사 리뷰</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=preview rows=15 cols=140><?php echo $rowct['preview']; ?></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[내용 저장하기]</b></a>
</div>
<p>

<!--  내용 입력 끝 -->

<?php
}else{ msg("관리자가 아닙니다."); }
}else{ include "link_login.php"; }
mysql_close();
include "bottom.php";
?>