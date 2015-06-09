<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if($my_member_id){
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.cstitle.value) {
	alert("제목을 입력하세요.");
	Fm.title.focus();
	return; } 
    if(!Fm.content.value) {
	alert("상담 내용을 입력하세요.");
	Fm.content.focus();
	return; }

	document.Form1.action = 'ConsultInsert.php';
	document.Form1.submit();
}

//-->
</SCRIPT>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="consultinsert">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>1 : 1 상담 신청하기</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 신청자
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<?php echo $my_member_id; ?>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 제목
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="cstitle" value="" maxlength="30" style="width:500px">
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
<a href="javascript:recording();" style="padding-left:170px"><img src="image/record.gif" border="0"></a>
</div>
<p>
<?php
}else{ echo "로그인 후에 사용할 수 있습니다."; }
include "bottom.php";     // 하단 구성
?>