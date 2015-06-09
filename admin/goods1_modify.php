<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
$result=mysqli_query($link,"select * from goods1 where id='$id' ");
$row=mysqli_fetch_array($result);
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
	if(!Fm.name.value) {
	alert("대분류명을 입력하세요.");
	Fm.name.focus();
	return; }
	document.Form1.action = 'goods1_modify_insert.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<form name=Form1 method=post>
<input type="hidden" name="mod" value="good1_insert">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>상품분류</B>(대분류)
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 고유번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="fixid" value="<?php echo $row['fixnum']; ?>" maxlength="20" style="width:122px"> 본 번호는 중분류,소분류,상품에 모두 적용됩니다.
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 대분류명
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="name" value="<?php echo $row['name']; ?>" maxlength="20" style="width:122px"> 가장 큰 분류( ex : 소설,시,에세이,컴퓨터)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	</td>
	</tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 출력순서
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="number" value="<?php echo $row['number']; ?>" maxlength="20" style="width:122px"> 초기화면 좌측에 출력될 순서(낮은 숫자일 수록 상위에 나타납니다.)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	</td>
	</tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[대분류 수정하기]</b></a>
</div>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>