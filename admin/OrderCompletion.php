<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['orderid'])){$orderid ="";} else {$orderid = $_REQUEST['orderid'];}

if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_admin_id && $my_admin_pwd){
if($mod=="completionok2"){ 
$update = "update myorder set completion='0' where id='$orderid' ";
$result=mysqli_query($link,$update);
}

$numresults=mysqli_query($link,"select id from myorder where completion='1'");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
<tr>
	<td width="400" height="30" bgcolor="#99CCFF">
	<p>&nbsp;<b>◎ 완료내역</b></p>
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
<td width="100" height="30" align="center">수령자전화</td>
<td width="100" height="30" align="center">결제상태</td>
<td width="100" height="30" align="center">주문날자</td>
<td width="100" height="30" align="center">운송장번호</td>
<td width="100" height="30" align="center">배송예정일(회사)</td>
<td width="60" height="30" align="center">상세보기</td>
<td width="60" height="30" align="right">완료취소</td>
</tr>
<tr><td colspan="10" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="10" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$queryorder=mysqli_query($link,"select * from myorder where completion='1' order by orderday desc limit $fromnum,$limit50");
$countall=mysqli_num_rows($queryorder);
if($countall < 1){
echo "<tr><td colspan=7 height=5>완료내역이 없습니다.</td></tr>";
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
<input type="button" Value="상세보기" onClick="window.open ('OrderMinute.php?orderid=<?php echo $roworder['id']?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=800, height=300')">
</td></form>
<td width="60" height="30" align="right">
<?php
if($roworder['allpoint'] == '0'){ // 포인터를 캐쉬로 변환을 허락하면 변경이 불가함
	echo "<font color=red>변경불가</font>";
}else{
?>
<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?orderid=<?php echo $roworder['id']?>&mod=completionok2>완료취소</a>
<?php
}
?>
</td>
<tr><td colspan="7"><font color="blue">
<?php
$querybasket=mysqli_query($link,"select * from basket where ordernum='$roworder[ordernum]' ");
while($rowbasket=mysqli_fetch_array($querybasket)){
$sototal=$rowbasket['price'] * $rowbasket['quantity'];
?>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="450">
<font color="blue">상품명 : <?php echo $rowbasket['name']; ?> / 단가 : <?php echo number_format($rowbasket['price']); ?>원 / 수량 : <?php echo number_format($rowbasket['quantity']); ?>개</font><br>
<font color="#FF6633">포인터 : <?php echo number_format($roworder['allpoint']); ?> 점</font>
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

</td>
<td width="220" colspan="3">
<?php
if($roworder['allpoint'] == '0'){ // 9는 포인터를 주었음
	echo "<font color=red>포인터가 없거나 드렸음</font>";
}else{
?>

<form name=Form1 method=post action="pointchang2.php">
<input type="hidden" name="mod" value="pointcashok2">
<input type="hidden" name="ordernum" value="<?php echo $roworder['ordernum']?>">
<input type="submit" value="포인터를 캐쉬로 드림">
</form>

<?php
}
?>
</td></tr>
<tr><td colspan="10" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="10" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>