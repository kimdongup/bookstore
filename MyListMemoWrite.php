<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_REQUEST['goodsid'])){$goodsid  ="";} else {$goodsid = $_REQUEST['goodsid'];} 
if(!isset($_REQUEST['gsid'])){$gsid  ="";} else {$gsid = $_REQUEST['gsid'];} 
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
	if(!Fm.memo.value) {
	alert("메모를 입력하세요.");
	Fm.memo.focus();
	return; }
	document.Form1.action = 'MyListMemoIns.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<form name=Form1 method=post>
<input type="hidden" name="mod" value="MyListMemoW">
<input type="hidden" name="goodsid" value="<?php echo $gsid?>">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>마이리스트 메모입력</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 메모
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	&nbsp; <textarea name=memo rows=5 cols=85></textarea>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	</td>
	</tr>
</table>

</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[메모등록하기]</b></a>
</div>
<p>
<?php
include "bottom.php";     // 하단 구성
?>