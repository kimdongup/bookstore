<?php
include "top.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
if(!isset($_SESSION['my_grade'])){$my_grade ="";} else {$my_grade = $_SESSION['my_grade'];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_member_id){
	if($my_grade < 6){ // 5보다 적어야 관리자
$numresults=mysqli_query($link,"select id from myorder");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
<tr>
	<td width="400" height="30" bgcolor="#99CCFF">
	<p>&nbsp;<b>◎ 택배회사 관리</b></p>
	</td>
	<td align="right" width="500" height="30" bgcolor="#99CCFF">	
	</td>
</tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="90" height="30" align="left">주문번호</td>
<td width="100" height="30" align="center">상품명</td>
<td width="80" height="30" align="center">수령자</td>
<td width="90" height="30" align="center">수령자전화</td>
<td width="80" height="30" align="center">결제상태</td>
<td width="90" height="30" align="center">주문날자</td>
<td width="100" height="30" align="center">운송장번호</td>
<td width="100" height="30" align="center">배송예정일(회사)</td>
<td width="60" height="30" align="center">상세보기</td>
<td width="120" height="30" align="center">운송장입력</td>
</tr>
<tr><td colspan="10" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="10" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$queryorder=mysqli_query($link,"select * from myorder where confirmation!='0' && completion!='1' order by orderday desc limit $fromnum,$limit50");
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
<td width="90" height="30"><?php echo $roworder['ordernum']; ?></td>
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
<td width="90" height="30" align="center"><?php echo $roworder['btel1']." - ".$roworder['btel2']." - ".$roworder['btel3']; ?></td>
<td width="80" height="30" align="center">
<?php 
$ordcomfir=$roworder['confirmation'];
if($ordcomfir > 0 && $ordcomfir < 9){
	echo "결제완료";
}else{
	echo "미결제";
}
?>
</td>
<td width="90" height="30" align="center">
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
<td width="60" height="30" align="right">
<form>
<input type="button" Value="상세보기" onClick="window.open ('admin/OrderMinute.php?orderid=<?php=$roworder['id']?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=800, height=300')">
</td></form>
<td width="120" height="30" align="right">
<form>
<input type="button" Value="운송장입력" onClick="window.open ('TransNumModify.php?kordernum=<?php=$roworder['ordernum']?>&mod=transportinsert', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=800, height=300')">
</td></form>
<tr><td colspan="10" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="10" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, "$_SERVER[REQUEST_URI]")?></center>
<p>
<?php
}else{ msg("관리자가 아닙니다."); }
}else{ include "link_login.php"; }
include "bottom.php";     // 하단 구성
?>