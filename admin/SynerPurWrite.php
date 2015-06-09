<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
include "../js/SynerWriteCheck.js";
include "../js/NumComma.js";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if($my_admin_id && $my_admin_pwd){
?>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="synerpur">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>공동구매등록</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 상품고유번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="goodsid" value="" maxlength="20" style="width:50px"> 
	<a href="goods_list.php"><b>상품(등록,목록)</b></a>을 클릭하면 상품고유번호를 보실 수 있습니다.(단,중복 등록은 하지  마세요)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>	
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 시작가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf1' size="15" value='' onkeyup='hidnum1()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf1">원 (처음은 시작가와 같을 수 있음)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>	
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 현재가격
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf2' size="15" value='' onkeyup='hidnum2()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf2">원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 최저가격
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf3' size="15" value='' onkeyup='hidnum3()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf3">원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 할인가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='dcprice' size="15" value='' style='text-align:right;'>원 
		(하나 구매할 때마다 할인되는 금액)		
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 등록수량
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='recordquantity' size="15" value='' style='text-align:right;'>개 
		(공동구매로 등록할 상품 수량)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[등록하기]</b></a>
</div>
<p>
<?php
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>