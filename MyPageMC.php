<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}

if($my_member_id){
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="735" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 나의통장내역</b></p>
        </td>
        <td align="right" width="500" height="30" bgcolor="#99CCFF">
        </td>
    </tr>
</table>
<?php
$querymb=mysqli_query($link,"select cash,point from member where member_id='$my_member_id' ");
$rowmb=mysqli_fetch_array($querymb);
?>

<table align="center" border="0" cellspacing="0" cellpadding="0" width="730" >
<tr>
	<td width=200 align="right" height="25">캐쉬충전금 :</td>
	<td width=200 align="right"><?php echo number_format($rowmb['cash']); ?>원<td>
	<td width=30>&nbsp;</td>
	<td width=300>현금으로 사용이 가능합니다.</td> 
</tr>
<tr><td colspan="5" height="1" bgcolor="#CCCCCC"></td></tr>
<tr>
	<td width=200 align="right">포인터 :</td>
	<td width=200 align="right" height="25"><?php echo number_format($rowmb['point']); ?>원<td>
	<td width=30>&nbsp;</td>
	<td width=300>캐쉬로 변경해야 현금으로 사용이 가능합니다.</td> 
</tr>
<tr><td colspan="5" height="1" bgcolor="#CCCCCC"></td></tr>
<tr>
	<td width=200 align="right"></td>
	<td width=200 align="right" height="25"><td>
	<td width=30>&nbsp;</td>
	<td width=300><a href="PointCashC.php">[포인터를 캐쉬로 변환하기]</a></td> 
</tr>
<tr><td colspan="5" height="1" bgcolor="#CCCCCC"></td></tr>
</table>
<p>
<?php
}else{
include "link_login.php";
}
include "bottom.php";     // 하단 구성
?>