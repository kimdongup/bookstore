<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1 ="";} else {$my_pass1 = $_SESSION['my_pass1'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}

?>
<script language="javascript">
<!--
function PgCoGo(frm) {	
    	location.href="../loading.php";
	//window.open(frm.action, frm.target, "toolbar=no,scrollbars=no,resizable=yes,status=yes,location=no,width=450,height=550");
        var gsWin = window.open('null.php','payviewer',"toolbar=no,scrollbars=no,resizable=yes,status=yes,location=no,width=450,height=550");
        document.Form1.action = 'null.php';
        document.Form1.target ="payviewer";
        document.Form1.method ="post";
        document.Form1.submit();
}
// -->
</script>
</script>
<p>&nbsp;</p>
<?php
if ($my_member_id && $my_pass1 && $my_name){
$query=mysqli_query($link,"select * from member where member_id='$my_member_id'");
$row=mysqli_fetch_array($query);
$OrderHTel=$row['htel1']."-".$row['htel2']."-".$row['htel3'];
$OrderAddr=$row['post1']."-".$row['post2']." &nbsp; ".$row['address']." ".$row['post_num'];
?>
<form name="Form1"  action="modules/null.php" target="popup" >
<table align="center" border="1" cellspacing="0" cellpadding="1" width="730" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="730" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ <?php echo $my_name; ?> 님의 캐쉬 충전소 입니다.</b></p>
        </td>
    </tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
  <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
  결제금액
  </td>
<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
<span style="font-size:3pt;">&nbsp;</span><br>
<input type="radio" name="Amount" value="50000">50,000원
<input type="radio" name="Amount" value="100000" checked>100,000원
<input type="radio" name="Amount" value="150000">150,000원
<input type="radio" name="Amount" value="200000">200,000원
<input type="radio" name="Amount" value="300000">300,000원
<br><span style="font-size:1pt;">&nbsp;</span>    
</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
<tr>
  <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
  결제유형
  </td>
<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
<span style="font-size:3pt;">&nbsp;</span><br>
<input type="radio" name="AccountCode" value="1" checked>신용카드
<input type="radio" name="AccountCode" value="2">계좌이체
<input type="radio" name="AccountCode" value="3">휴대폰
<input type="radio" name="AccountCode" value="4">ARS
<input type="radio" name="AccountCode" value="5">폰빌
<input type="radio" name="AccountCode" value="6">무통장입금
<br><span style="font-size:1pt;">&nbsp;</span>    
</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc">
    <input type="submit" value="결제하기">
    </td></tr>
</table>
<input type="hidden" name="StoreCode" value="20060707120101">
<input type="hidden" name="OrderCode" value="<?php echo $row['id']; ?>">
<input type="hidden" name="OrderName"  value="<?php echo $row['name']; ?>">
<input type="hidden" name="BrandName"  value="캐쉬충전">
<input type="hidden" name="OrderHTel" value="<?php echo $OrderHTel; ?>">
<input type="hidden" name="Email"      value="<?php echo $row['email']; ?>">
<input type="hidden" name="OrderAddr"  value="<?php echo $OrderAddr; ?>">
<input type="hidden" name="DbName"  value="member">
<input type="hidden" name="SuccessPage" value="../modules/return_true.php">
<input type="hidden" name="ErrorPage"  value="../modules/return_false.php">

</form>
<p align="center"><a href="javascript:PgCoGo(document.Form1);"><img src="image/account30.gif" border="0"></a>

<?php
}else{
include "link_login.php";
}
?>
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<table align="center" border="1" cellpadding="2" cellspacing="0" width="730" bgcolor="white" bordercolordark="white" bordercolorlight="#CCCCCC">
	<tr>                                    
	<td align="center" width="730"> 
	<table width=700 border=0 cellpadding=0 cellspacing=0 align=center>
		<tr>
		<td width="700">
		<br><span style="font-size:3pt;">&nbsp;</span><br>
		<b>캐쉬 충전 안내</b>
		<br><span style="font-size:8pt;">&nbsp;</span><br>
		* 캐쉬 충전 반환을 요구할 경우 10% 삭감된 금액이 지불 됩니다. 
		<br><span style="font-size:8pt;">&nbsp;</span><br> 
		</td>
		</tr>
	</table>

	</td>
	</tr>
</table>
<p>&nbsp;</p>
<?php
include "bottom.php";     // 하단 구성
?>