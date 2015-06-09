<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['mod2'])){$mod2 ="";} else {$mod2 = $_REQUEST['mod2'];}
if(!isset($_REQUEST['orderid'])){$orderid ="";} else {$orderid = $_REQUEST['orderid'];}

if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}
if(!isset($_REQUEST['delfixnum'])){$delfixnum  =1;} else {$delfixnum  = $_REQUEST['delfixnum'];}

if($my_admin_id && $my_admin_pwd){
$numresults=mysqli_query($link,"select id from myorder");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);

// 주문취소 시작
if($mod=="orderdel"){ 
if($mod2=="orderdelok"){
$update = "update myorder set confirmation='0' where id='$orderid' ";
$result=mysqli_query($link,$update);
}else{
	?>
	<p><b><?php echo $delfixnum?></b>번을 정말로 주문을 취소하시겠습니까?<p>
	<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?orderid=<?php echo $orderid?>&mod=orderdel&mod2=orderdelok><b>[예]</b></a> &nbsp; 
	<a href=<?php echo $_SERVER['SCRIPT_NAME']?>><b>[아니오]</b></a><p>
	<?php
}
}
// 주문취소 끝, 배송완료 시작
if($mod=="completionok"){ 
$update = "update myorder set completion='1' where id='$orderid' ";
$result=mysqli_query($link,$update);
} 
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
<tr>
	<td width="400" height="30" bgcolor="#99CCFF">
	<p>&nbsp;<b>◎ 주문/배송내역</b></p>
	</td>
	<td align="right" width="500" height="30" bgcolor="#99CCFF">
	<p><a href="OrderCancel.php">[취소내역]</a>&nbsp;<a href="OrderCompletion.php">[완료내역]</a>&nbsp;</p>
	</td>
</tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="90" height="30" align="left">주문번호</td>
<td width="100" height="30" align="center">상품명</td>
<td width="80" height="30" align="center">수령자</td>
<td width="90" height="30" align="center">수령자전화</td>
<td width="70" height="30" align="center">결제상태</td>
<td width="80" height="30" align="center">주문날자</td>
<td width="80" height="30" align="center">운송장번호</td>
<td width="80" height="30" align="center">배송예정일<br>(회사)</td>
<td width="40" height="30" align="center">상세</td>
<td width="40" height="30" align="center">결제</td>
<td width="40" height="30" align="center">배송</td>
<td width="60" height="30" align="center">완료처리</td>
<td width="60" height="30" align="right">주문취소</td>
</tr>
<tr><td colspan="13" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="13" height="5"></td></tr>
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
<td width="70" height="30" align="center">
<?php 
$ordcomfir=$roworder['confirmation'];
if($ordcomfir > 0 && $ordcomfir < 9){
	echo "결제완료";
}else{
	echo "미결제";
}

if($roworder['confirmation']=='1'){
	echo "<br>(신용카드)"; }
	else if($roworder['confirmation']=='2'){
	echo "<br>(계좌이체)"; }
	else if($roworder['confirmation']=='3'){
	echo "<br>(휴대폰)"; }
	else if($roworder['confirmation']=='4'){
	echo "<br>(ARS)"; }
	else if($roworder['confirmation']=='5'){
	echo "<br>(폰빌)"; }
	else if($roworder['confirmation']=='6'){
	echo "<br>(무통장완료)"; }
	else if($roworder['confirmation']=='8'){
	echo "<br>(캐쉬)"; }
	else if($roworder['confirmation']=='66'){
	echo "<br>(무통장주문)"; }
	else if($roworder['confirmation']=='88'){
	echo "<br>(재주문)"; }
	else if($roworder['confirmation']=='99'){
	echo "<br>(미선택)"; }
?>
</td>
<td width="80" height="30" align="center">
<?php 
$ordertime=$roworder['orderday'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="80" height="30" align="center"><?php echo$rowtrans['transnum']; ?></td>
<td width="80" height="30" align="center">
<?php 
$transtime=$rowtrans['transday'];
$transyear = date('Y',$transtime);
$transmonth = date('m',$transtime);
$transday = date('d',$transtime);
echo $transyear."/".$transmonth."/".$transday;
?>
<br>(<?php echo $rowtrans['transco']; ?>)
</td>
<td width="40" height="30" align="right">
<form>
<input type="button" Value="상세" onClick="window.open ('OrderMinute.php?orderid=<?php echo $roworder['id']?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=800, height=300')">
</td></form>
<td width="40" height="30" align="right">
<form>
<input type="button" Value="결제" onClick="window.open ('payhandling.php?orderid=<?php echo $roworder['id']?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=800, height=300')">
</td></form>
<td width="40" height="30" align="right">
<form>
<input type="button" Value="배송" onClick="window.open ('delihandling.php?orderid=<?php echo $roworder['id']?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=800, height=300')">
</td></form>
<td width="60" height="30" align="right">
<a href=<?php echo $_SERVER['SCRIPT_NAME']  ?>?orderid=<?php echo $roworder['id']?>&mod=completionok>완료처리</a>
</td>
<td width="60" height="30" align="right">
<?php
if($roworder['completion']=='7'){
	echo "<font color=red>배송중</font>";
}else{
	?>
<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?orderid=<?php echo $roworder['id']?>&delfixnum=<?php echo $roworder['ordernum']?>&mod=orderdel>주문취소</a>
<?php
}
	?>
</td>
<tr><td colspan="13">
<font color=blue>총금액 : <?php echo number_format($roworder['allcash']);?> 원</font> / <font color=blue>포인터 : <?php echo number_format($roworder['allpoint']);?> 점</font>
</td></tr>
<tr><td colspan="13" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="13" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>