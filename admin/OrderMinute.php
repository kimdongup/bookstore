<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['orderid'])){$orderid ="";} else {$orderid = $_REQUEST['orderid'];}

if($my_admin_id && $my_admin_pwd){
?>
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<table align="center" border="0" cellspacing="0" cellpadding="1" width="780" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 상세내역</b></p>
        </td>
        <td align="right" width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="780">
<tr>
<td width="100" height="30" align="left">주문번호</td>
<td width="100" height="30" align="center">상품명</td>
<td width="80" height="30" align="center">수령자</td>
<td width="100" height="30" align="center">수령자전화</td>
<td width="100" height="30" align="center">결제상태</td>
<td width="100" height="30" align="center">주문날자</td>
<td width="100" height="30" align="center">운송장번호</td>
<td width="100" height="30" align="center">배송예정일(회사)</td>
</tr>
<tr><td colspan="8" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<?php
$queryorder=mysqli_query($link,"select * from myorder where id=$orderid");
$roworder=mysqli_fetch_array($queryorder);

$querytrans=mysqli_query($link,"select * from transport where ordernum='$roworder[ordernum]'");
$rowtrans=mysqli_fetch_array($querytrans);
?>
<tr>
<td width="100" height="30"><?php echo $roworder['ordernum']; ?></td>
<td width="100" height="30" align="center">
<?php
$querybasket=mysqli_query($link,"select * from basket where ordernum='$roworder[ordernum]' ");
while($rowbasket=mysqli_fetch_array($querybasket)){
// 문자열 자르기
$str=$rowbasket['name']; 
$length=10;
$str = chop(substr($str, 0, $length));
preg_match('/^([\x00-\x7e]|.{2})*/', $str, $titleok);
echo $titleok[0]."..";
?>
</td>
<td width="80" height="30" align="center"><?php echo$roworder['bname']; ?></td>
<td width="100" height="30" align="center"><?php echo $roworder['btel1']." - ".$roworder['btel2']." - ".$roworder['btel3']; ?></td>
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
24시간이내<br>
(<?php echo $rowtrans['transco']; ?>)
</td>
</tr>
<tr><td colspan="8"><font color="blue">

<?php
$sototal=$rowbasket['price'] * $rowbasket['quantity'];
?>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="450">
<font color="blue">상품명 : <?php echo $rowbasket['name']; ?> / 단가 : <?php echo number_format($rowbasket['price']); ?>원 / 수량 : <?php echo number_format($rowbasket['quantity']); ?>개</font><br> 
</td>
<td width="150" align="right">
<font color="#663300">☜ 소계 : <?php echo number_format($sototal) ?> 원</font>
</td>
</tr>
</table>
<?php
}
?>

<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="600" align="right">
<font color="red">총액 : <?php echo number_format($roworder['allcash']); ?> 원</font>
</td>
</tr>
</table>


</td></tr>
<tr><td colspan="8" height="1" bgcolor="#CCCCCC"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<tr><td colspan="8" height="25">
<b>수령자</b> : <?php echo $roworder['bname']; ?> &nbsp; 
<b>수령자전화</b> : <?php echo $roworder['btel1']." - ".$roworder['btel2']." - ".$roworder['btel3']; ?> &nbsp; 
<b>수령자휴대폰</b> : <?php echo $roworder['bhtel1']." - ".$roworder['bhtel2']." - ".$roworder['bhtel3']; ?> &nbsp; 
<b>수령자이메일</b> : <a href=mailto:<?php echo $roworder['bemail']; ?>><?php echo $roworder['bemail']; ?></a>
</td></tr>
<tr><td colspan="8" height="25">
<b>수령자주소</b> : <?php echo $roworder['bpost1']."-".$roworder['bpost1']." ".$roworder['baddress']." ".$roworder['bpost_num'] ; ?> 
</td></tr>
<tr><td colspan="8" height="1" bgcolor="#CCCCCC"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<tr><td colspan="8" height="30">
<b>하고싶은말</b> : <?php echo $roworder['content']; ?>
</td></tr>
<!-- 주문자 정보 -->
<tr><td colspan="8" height="5"></td></tr>
<tr><td colspan="8" height="2" bgcolor="#cccccc"></td></tr>
<tr><td colspan="8" height="25" bgcolor="#dddddd">&nbsp;<b>◎ 주문자 상세내역</b></td></tr>
<tr><td colspan="8" height="2" bgcolor="#cccccc"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<tr><td colspan="8" height="25">
<b>주문자</b> : <?php echo $roworder['ordername']; ?> &nbsp; 
<b>주문자전화</b> : <?php echo $roworder['tel1']." - ".$roworder['tel2']." - ".$roworder['tel3']; ?> &nbsp; 
<b>주문자대폰</b> : <?php echo $roworder['htel1']." - ".$roworder['htel2']." - ".$roworder['htel3']; ?> &nbsp; 
<b>주문자이메일</b> : <a href=mailto:<?php echo $roworder['email']; ?>><?php echo $roworder['email']; ?></a>
</td></tr>
<tr><td colspan="8" height="25">
<b>주문자주소</b> : <?php echo $roworder['post1']."-".$roworder['post1']." ".$roworder['address']." ".$roworder['post_num'] ; ?> 
</td></tr>

</table>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
?>