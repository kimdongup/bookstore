<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
$SaleAccount1=0;$SaleAccount2=0;$SaleAccount3=0;$SaleAccount4=0;$SaleAccount5=0;
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
	<p>&nbsp;<b>◎ 주간별 동향 그래프</b></p>
	</td>
	<td align="right" width="500" height="30" bgcolor="#99CCFF">
	<p><a href="SaleAll.php">[매출현황]</a>&nbsp;</p>
	</td>
</tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr><td width="180" height="30">
<?php
$timemk=mktime();
$weektime1=$timemk-604800;
$queryorder1=mysqli_query($link,"select * from myorder where completion='1' && orderday >= $weektime1 ");
$saleall1=mysqli_num_rows($queryorder1);
while($roworder1=mysqli_fetch_array($queryorder1))
{
$salesum1=$roworder1['allcash'];
$SaleAllsum1[]=$salesum1;
}
for($b1=0; $b1<$saleall1; $b1++){
	$SaleAccount1+=$SaleAllsum1[$b1];
}
$GraphWith=$SaleAccount1/1000;

echo " &nbsp; [";
$startyear1 = date('Y',$weektime1);
$startmonth1 = date('m',$weektime1);
$startday1 = date('d',$weektime1);
echo $startyear1."/".$startmonth1."/".$startday1;
echo " ~ ";
$endyear1 = date('Y',$timemk);
$endmonth1 = date('m',$timemk);
$endday1 = date('d',$timemk);
echo $endyear1."/".$endmonth1."/".$endday1;
echo "]";
?>
</td>
<td width="720">
<?php if($SaleAccount1 > 0){ ?>
<table><tr><td width="<?php echo $GraphWith?>" bgcolor="blue"></td><td>
<?php
echo number_format($SaleAccount1);
echo "원";
?>
</td></tr></table>
<?php } ?>
</td></tr>
<!-- 2주 -->
<tr><td height="30">
<?php
$weektime2=$timemk-1209600;
$queryorder2=mysqli_query($link,"select * from myorder where completion='1' && orderday < $weektime1 && orderday >= $weektime2 ");
$saleall2=mysqli_num_rows($queryorder2);
while($roworder2=mysqli_fetch_array($queryorder2))
{
$salesum2=$roworder2['allcash'];
$SaleAllsum2[]=$salesum2;
}
for($b2=0; $b2<$saleall2; $b2++){
	$SaleAccount2+=$SaleAllsum2[$b2];
}
$GraphWith2=$SaleAccount2/1000;

echo " &nbsp; [";
$startyear2 = date('Y',$weektime2);
$startmonth2 = date('m',$weektime2);
$startday2 = date('d',$weektime2);
echo $startyear2."/".$startmonth2."/".$startday2;
echo " ~ ";
$endyear2 = date('Y',$weektime1);
$endmonth2 = date('m',$weektime1);
$endday2 = date('d',$weektime1);
echo $endyear2."/".$endmonth2."/".$endday2;
echo "]";
?>
</td>
<td width="720">
<?php if($SaleAccount2 > 0){ ?>
<table><tr><td width="<?php echo $GraphWith2?>" bgcolor="blue"></td><td>
<?php
echo number_format($SaleAccount2);
echo "원";
?>
</td></tr></table>
<?php } ?>
</td></tr>
<!-- 3주 -->
<tr><td height="30">
<?php
$weektime3=$timemk-1814400;
$queryorder3=mysqli_query($link,"select * from myorder where completion='1' && orderday < $weektime2 && orderday >= $weektime3 ");
$saleall3=mysqli_num_rows($queryorder3);
while($roworder3=mysqli_fetch_array($queryorder3))
{
$salesum3=$roworder3['allcash'];
$SaleAllsum3[]=$salesum3;
}
for($b3=0; $b3<$saleall3; $b3++){
	$SaleAccount3+=$SaleAllsum3[$b3];
}
$GraphWith3=$SaleAccount3/1000;

echo " &nbsp; [";
$startyear3 = date('Y',$weektime3);
$startmonth3 = date('m',$weektime3);
$startday3 = date('d',$weektime3);
echo $startyear3."/".$startmonth3."/".$startday3;
echo " ~ ";
$endyear3 = date('Y',$weektime2);
$endmonth3 = date('m',$weektime2);
$endday3 = date('d',$weektime2);
echo $endyear3."/".$endmonth3."/".$endday3;
echo "]";
?>
</td>
<td width="720">
<?php if($SaleAccount3 > 0){ ?>
<table><tr><td width="<?php echo $GraphWith3?>" bgcolor="blue"></td><td>
<?php
echo number_format($SaleAccount3);
echo "원";
?>
</td></tr></table>
<?php } ?>
</td></tr>
<!-- 4주 -->
<tr><td height="30">
<?php
$weektime4=$timemk-2419200;
$queryorder4=mysqli_query($link,"select * from myorder where completion='1' && orderday < $weektime3 && orderday >= $weektime4 ");
$saleall4=mysqli_num_rows($queryorder4);
while($roworder4=mysqli_fetch_array($queryorder4))
{
$salesum4=$roworder4['allcash'];
$SaleAllsum4[]=$salesum4;
}
for($b4=0; $b4<$saleall4; $b4++){
	$SaleAccount4+=$SaleAllsum4[$b4];
}
$GraphWith4=$SaleAccount4/1000;

echo " &nbsp; [";
$startyear4 = date('Y',$weektime4);
$startmonth4 = date('m',$weektime4);
$startday4 = date('d',$weektime4);
echo $startyear4."/".$startmonth4."/".$startday4;
echo " ~ ";
$endyear4 = date('Y',$weektime3);
$endmonth4 = date('m',$weektime3);
$endday4 = date('d',$weektime3);
echo $endyear4."/".$endmonth4."/".$endday4;
echo "]";
?>
</td>
<td width="720">
<?php if($SaleAccount4 > 0){ ?>
<table><tr><td width="<?php echo $GraphWith4?>" bgcolor="blue"></td><td>
<?php
echo number_format($SaleAccount4);
echo "원";
?>
</td></tr></table>
<?php } ?>
</td></tr>
<!-- 5주 -->
<tr><td height="30">
<?php
$weektime5=$timemk-3024000;
$queryorder5=mysqli_query($link,"select * from myorder where completion='1' && orderday < $weektime4 && orderday >= $weektime5 ");
$saleall5=mysqli_num_rows($queryorder5);
while($roworder5=mysqli_fetch_array($queryorder5))
{
$salesum5=$roworder5['allcash'];
$SaleAllsum5[]=$salesum5;
}
for($b5=0; $b5<$saleall5; $b5++){
	$SaleAccount5+=$SaleAllsum5[$b5];
}
$GraphWith5=$SaleAccount5/1000;

echo " &nbsp; [";
$startyear5 = date('Y',$weektime5);
$startmonth5 = date('m',$weektime5);
$startday5 = date('d',$weektime5);
echo $startyear5."/".$startmonth5."/".$startday5;
echo " ~ ";
$endyear5 = date('Y',$weektime4);
$endmonth5 = date('m',$weektime4);
$endday5 = date('d',$weektime4);
echo $endyear5."/".$endmonth5."/".$endday5;
echo "]";
?>
</td>
<td width="720">
<?php if($SaleAccount5 > 0){ ?>
<table><tr><td width="<?php echo $GraphWith5?>" bgcolor="blue"></td><td>
<?php
echo number_format($SaleAccount5);
echo "원";
?>
</td></tr></table>
<?php } ?>
</td></tr>






</table>
<?php }  // 등록 된 상품 조사 ?>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html"; 
?>