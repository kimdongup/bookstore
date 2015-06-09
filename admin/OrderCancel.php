<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['orderid'])){$orderid ="";} else {$orderid = $_REQUEST['orderid'];}

if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_admin_id && $my_admin_pwd){
if($mod=="orderdel"){ // 취소한 상품 다시 주문
$timen=mktime();
$update = "update myorder set confirmation='88',orderday='$timen' where id='$orderid' ";
$result=mysqli_query($link,$update);
}
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
<tr>
	<td width="400" height="30" bgcolor="#99CCFF">
	<p>&nbsp;<b>◎ 취소내역</b></p>
	</td>
	<td align="right" width="500" height="30" bgcolor="#99CCFF">
	<p><a href="OrderList.php">[주문내역]</a>&nbsp;<a href="OrderCancel.php">[취소내역]</a>&nbsp;<a href="OrderCompletion.php">[완료내역]</a>&nbsp;</p>
	</td>
</tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" height="30" align="left">주문번호</td>
<td width="100" height="30" align="center">상품명</td>
<td width="80" height="30" align="center">수령자</td>
<td width="100" height="30" align="center">결제상태</td>
<td width="100" height="30" align="center">주문날자</td>
<td width="100" height="30" align="center">운송장번호</td>
<td width="100" height="30" align="center">배송예정일(회사)</td>
<td width="50" height="30" align="right">다시주문</td>
</tr>
<tr><td colspan="8" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$queryorder=mysqli_query($link,"select * from myorder where confirmation='0' && orderer!='' order by orderday desc limit $fromnum,$limit50");
$countall=mysqli_num_rows($queryorder);
$totalpage = ceil($countall / $limit50);

if($countall < 1){
echo "<tr><td colspan=7 height=5>".$my_name. "취소한 상품이 없습니다.</td></tr>";
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
<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?orderid=<?php echo $roworder['id']?>&mod=orderdel>다시주문</a>
</td>

<tr><td colspan="8" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="8" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html"; 
?>