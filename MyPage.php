<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 

if(!isset($_SESSION['cash'])){$cash  =0;} else {$cash = $_SESSION['cash'];} 
if(!isset($_SESSION['point'])){$point  =0;} else {$point = $_SESSION['point'];} 

if(!isset($_REQUEST['orderid'])){$orderid  ="";} else {$orderid = $_REQUEST['orderid'];} 

if($my_member_id){
if($mod=="orderdel"){ // 주문취소
$update = "update myorder set confirmation='0' where id='$orderid' ";
$result=mysqli_query($link,$update);
}
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="735" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 최근주문내역</b></p>
        </td>
        <td align="right" width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b><a href="MyPageOT.php">more &nbsp;</a></b></p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="100" height="30" align="left">주문번호</td>
<td width="100" height="30" align="center">상품명</td>
<td width="80" height="30" align="center">수령자</td>
<td width="100" height="30" align="center">결제상태</td>
<td width="100" height="30" align="center">주문날자</td>
<td width="100" height="30" align="center">운송장번호</td>
<td width="100" height="30" align="center">배송예정일(회사)</td>
<td width="50" height="30" align="right">주문취소</td>
</tr>
<tr><td colspan="8" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<?php
$queryorder=mysqli_query($link,"select * from myorder where confirmation!='0' && orderer!='' && orderer='$my_member_id' order by id desc limit 5 ");
$countall=mysqli_num_rows($queryorder);
if($countall < 1){
echo "<tr><td colspan=7 height=5>".$my_name. "님의 주문상품이 없습니다.</td></tr>";
} else {
while($roworder=mysqli_fetch_array($queryorder))
{
$querybasket=mysqli_query($link,"select name from basket where ordernum='$roworder[ordernum]' order by id asc limit 1");
$rowbasket=mysqli_fetch_array($querybasket);
$querytrans=mysqli_query($link,"select * from transport where ordernum='$roworder[ordernum]'");
$rowtrans=mysqli_fetch_array($querytrans);
?>
<tr>
<td width="100" height="30"><?php echo $roworder['ordernum']; ?></td>
<td width="100" height="30" align="center">
<?php
// 문자열 자르기
$str=$rowbasket['name']; 
$length=15;
$str = chop(substr($str, 0, $length));
preg_match('/^([\x00-\x7e]|.{2})*/', $str, $titleok);
echo $titleok[0]."..";
?>
</td>
<td width="80" height="30" align="center"><?php echo$roworder['bname']; ?></td>
<td width="100" height="30" align="center">
<?php 
$ordcomfir=$roworder['confirmation'];
if($ordcomfir > 0 && $ordcomfir < 9){
	echo "결제완료";
}else{
	echo "미결제";
}
?>
</td>
<td width="100" height="30" align="center">
<?php 
$ordertime=$roworder['orderday'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="100" height="30" align="center"><?php echo$rowtrans['transnum']; ?></td>
<td width="100" height="30" align="center">
<?php 
$transtime=$rowtrans['transday'];
$transyear = date('Y',$transtime);
$transmonth = date('m',$transtime);
$transday = date('d',$transtime);
echo $transyear."/".$transmonth."/".$transday;
?>
(<?php echo $rowtrans['transco']; ?>)
</td>
<td width="50" height="30" align="right">
<?php
if($roworder['completion']=='7'){
	echo "<font color=red>배송중</font>";
}else{
	?>
<a href=MyPage.php?orderid=<?php echo $roworder['id']?>&mod=orderdel>주문취소</a>
<?php
}
	?>
</td>
<tr><td colspan="8" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="8" height="5"></td></tr>
</table>

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