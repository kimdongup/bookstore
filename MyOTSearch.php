<?php
include "top.php";  // 상단 메뉴
include "main_left.php";  // 상단 메뉴
if($my_member_id){ // 로그인시 마이페이지로 바로 이동
echo ("<meta http-equiv='Refresh' content='0; URL=MyPage.php'>");
}else{
?>
<!-- 비회원 주문조회 -->
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
	if(!Fm.ordernames.value) {
	alert("주문자이름을 입력하세요.");
	Fm.ordernames.focus();
	return; }
	if(!Fm.ordernums.value) {
	alert("주문번호를 입력하세요.");
	Fm.ordernums.focus();
	return; }
	document.Form1.action = 'MyOrderSearch.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<form name=Form1 method=post>
<INPUT type=hidden name=mod value="yes">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
			<td valign="bottom" width="20" height="25">
				<img src="image/green_folder.jpg" border="0" vspace="5"> 
			</td>
			<td width="710">
			<span style=font-size:16pt;><b>주문/배송조회</b></span>
			</td>
			<td align="right">
             &nbsp;
			</td>
		</tr>
		</table>
		<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
		<tr>
			<td width="155" class="bgc_bar" height="2"></td>
			<td class="bgc_bar2"></td>
		</tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 주문자명
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="ordernames" value="" maxlength="30" style="width:120px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 주문번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="ordernums" value="" maxlength="30" style="width:120px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><img src="image/confirmation.gif" border="0"></a>
</div>
<p>&nbsp;</p> 
<?php
}
include "bottom.php";     // 하단 구성
?>