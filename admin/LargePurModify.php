<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
include "../js/LargeModifyCheck.js";
include "../js/NumComma.js";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['modifyname'])){$modifyname  ="";} else {$modifyname  = $_REQUEST['modifyname'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}

if($my_admin_id && $my_admin_pwd){
	$query=mysqli_query($link,"select * from largepurchase where id=$id");
	$row=mysqli_fetch_array($query);
?>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="largepur">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>대량구매 상품수정</B>(<?php echo $modifyname; ?>)
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 상품아이디
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="goodsid" value="<?php echo $row['goodsid']?>" maxlength="20" style="width:50px"> 
	상품의 수정,삭제에 마우스를 올려놓으면 아이디가 나타납니다.
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>	
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 정가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf1' size="15" value='<?php echo $row['fixprice']?>' onkeyup='hidnum1()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf1" value='<?php echo $row['fixprice']?>' >원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>	
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 현재가격
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf2' size="15" value='<?php echo $row['price']?>' onkeyup='hidnum2()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf2" value='<?php echo $row['price']?>'>원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 최저가격
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf3' size="15" value='<?php echo $row['endprice']?>' onkeyup='hidnum3()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf3" value='<?php echo $row['endprice']?>'>원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 할인가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='dcprice' size="15" value='<?php echo $row['dcprice']?>' style='text-align:right;'>원 
		(하나 구매할 때마다 할인되는 금액)		
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 등록수량
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='recordquantity' size="15" value='<?php echo $row['recordquantity']?>' style='text-align:right;'>개 
		(대량구매로 등록할 상품 수량)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 구매수량
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='orderquantity' size="15" value='<?php echo $row['orderquantity']?>' style='text-align:right;'>개 
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