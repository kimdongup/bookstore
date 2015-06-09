<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
$SaleAccount=0;$SaleAccount7=0;$SaleAccount30=0;$SaleAccount182=0;$SaleAccount365 =0;

if($my_admin_id && $my_admin_pwd){
$queryorder=mysqli_query($link,"select * from myorder where completion='1' ");
$saleall=mysqli_num_rows($queryorder);
if($saleall < 1){
echo "계산할 상품이 없습니다.</td></tr>";
} else {
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
<tr>
	<td width="400" height="30" bgcolor="#99CCFF">
	<p>&nbsp;<b>◎ 매출 내역</b></p>
	</td>
	<td align="right" width="500" height="30" bgcolor="#99CCFF">
	<p><a href="SaleGraph.php">[주간동향 그래프로보기]</a>&nbsp;</p>
	</td>
</tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr><td height="30">
<?php
while($roworder=mysqli_fetch_array($queryorder))
{
$salesum=$roworder['allcash'];
$SaleAllsum[]=$salesum;
}
for($b=0; $b<$saleall; $b++){
	$SaleAccount+=$SaleAllsum[$b];
}
?>
<b>전체 매출</b> : 
<?php
echo number_format($SaleAccount);
echo "원";

$queryorderstart=mysqli_query($link,"select * from myorder where completion='1' order by orderday asc limit 1");
$queryorderstart=mysqli_fetch_array($queryorderstart);
$queryorderend=mysqli_query($link,"select * from myorder where completion='1' order by orderday desc limit 1");
$queryorderend=mysqli_fetch_array($queryorderend);
echo " &nbsp; [";
$startyear = date('Y',$queryorderstart['orderday']);
$startmonth = date('m',$queryorderstart['orderday']);
$startday = date('d',$queryorderstart['orderday']);
echo $startyear."/".$startmonth."/".$startday;
echo " ~ ";
$endyear = date('Y',$queryorderend['orderday']);
$endmonth = date('m',$queryorderend['orderday']);
$endday = date('d',$queryorderend['orderday']);
echo $endyear."/".$endmonth."/".$endday;
echo "]";
?>
</td></tr>
<tr><td height="1" bgcolor="#cccccc"></td></tr>
<tr><td height="30">
<?php
$timemk=mktime();
$weektime=$timemk-604800;
$queryorder7=mysqli_query($link,"select * from myorder where completion='1' && orderday >= $weektime ");
$saleall7=mysqli_num_rows($queryorder7);
while($roworder7=mysqli_fetch_array($queryorder7))
{
$salesum7=$roworder7['allcash'];
$SaleAllsum7[]=$salesum7;
}
for($b7=0; $b7<$saleall7; $b7++){
	$SaleAccount7+=$SaleAllsum7[$b7];
}
?>
<b>1주간 매출</b> : 
<?php
echo number_format($SaleAccount7);
echo "원";
echo " &nbsp; [";
$startyear7 = date('Y',$weektime);
$startmonth7 = date('m',$weektime);
$startday7 = date('d',$weektime);
echo $startyear7."/".$startmonth7."/".$startday7;
echo " ~ ";
$endyear7 = date('Y',$timemk);
$endmonth7 = date('m',$timemk);
$endday7 = date('d',$timemk);
echo $endyear7."/".$endmonth7."/".$endday7;
echo "]";
?>
</td></tr>
<tr><td colspan="10" height="1" bgcolor="#cccccc"></td></tr>
<tr><td height="30">
<?php
$monthtime=$timemk-2592000;
$queryorder30=mysqli_query($link,"select * from myorder where completion='1' && orderday >= $monthtime ");
$saleall30=mysqli_num_rows($queryorder30);
while($roworder30=mysqli_fetch_array($queryorder30))
{
$salesum30=$roworder30['allcash'];
$SaleAllsum30[]=$salesum30;
}
for($b30=0; $b30<$saleall30; $b30++){
	$SaleAccount30+=$SaleAllsum30[$b30];
}
?>
<b>1개월 매출</b> : 
<?php
echo number_format($SaleAccount30);
echo "원";
echo " &nbsp; [";
$startyear30 = date('Y',$monthtime);
$startmonth30 = date('m',$monthtime);
$startday30 = date('d',$monthtime);
echo $startyear30."/".$startmonth30."/".$startday30;
echo " ~ ";
$endyear30 = date('Y',$timemk);
$endmonth30 = date('m',$timemk);
$endday30 = date('d',$timemk);
echo $endyear30."/".$endmonth30."/".$endday30;
echo "]";
?>
</td></tr>
<tr><td colspan="10" height="1" bgcolor="#cccccc"></td></tr>
<tr><td height="30">
<?php
$monthstime=$timemk-15724800;
$queryorder182=mysqli_query($link,"select * from myorder where completion='1' && orderday >= $monthstime ");
$saleall182=mysqli_num_rows($queryorder182);
while($roworder182=mysqli_fetch_array($queryorder182))
{
$salesum182=$roworder182['allcash'];
$SaleAllsum182[]=$salesum182;
}
for($b182=0; $b182<$saleall182; $b182++){
	$SaleAccount182+=$SaleAllsum182[$b182];
}
?>
<b>6개월 매출</b> : 
<?php
echo number_format($SaleAccount182);
echo "원";
echo " &nbsp; [";
$startyear182 = date('Y',$monthstime);
$startmonth182 = date('m',$monthstime);
$startday182 = date('d',$monthstime);
echo $startyear182."/".$startmonth182."/".$startday182;
echo " ~ ";
$endyear182 = date('Y',$timemk);
$endmonth182 = date('m',$timemk);
$endday182 = date('d',$timemk);
echo $endyear182."/".$endmonth182."/".$endday182;
echo "]";
?>
</td></tr>
<tr><td colspan="10" height="1" bgcolor="#cccccc"></td></tr>
<tr><td height="30">
<?php
$yeartime=$timemk-31536000;
$queryorder365=mysqli_query($link,"select * from myorder where completion='1' && orderday >= $yeartime ");
$saleall365=mysqli_num_rows($queryorder365);
while($roworder365=mysqli_fetch_array($queryorder365))
{
$salesum365=$roworder365['allcash'];
$SaleAllsum365[]=$salesum365;
}
for($b365=0; $b365<$saleall365; $b365++){
	$SaleAccount365+=$SaleAllsum365[$b365];
}
?>
<b> &nbsp; 1년 매출</b> : 
<?php
echo number_format($SaleAccount365);
echo "원";
echo " &nbsp; [";
$startyear365 = date('Y',$yeartime);
$startmonth365 = date('m',$yeartime);
$startday365 = date('d',$yeartime);
echo $startyear365."/".$startmonth365."/".$startday365;
echo " ~ ";
$endyear365 = date('Y',$timemk);
$endmonth365 = date('m',$timemk);
$endday365 = date('d',$timemk);
echo $endyear365."/".$endmonth365."/".$endday365;
echo "]";
?>
</td></tr>
<tr><td height="1" bgcolor="#cccccc"></td></tr>
<tr><td height="5"></td></tr>
</td></tr></table>
<?php }  // 등록 된 상품 조사 ?>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html"; 
?>