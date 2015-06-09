<?php
include "config/session_inc.php";
include "config/lib.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['ordernum'])){$ordernum ="";} else {$ordernum = $_SESSION['ordernum'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['mod2'])){$mod2  ="";} else {$mod2  = $_REQUEST['mod2'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['QuantityNum'])){$QuantityNum  ="";} else {$QuantityNum  = $_REQUEST['QuantityNum'];}
$Pamount = 0; $Bamount=0;$Mamount =0;$TransCost=0;$maniapoint=0;

$timenum=mktime();
if (!isset($_SESSION['ordernum'])) {
	$ipnum = strtolower(substr(strrchr($_SERVER['REMOTE_ADDR'],"."), 1));
	$ordernum=$timenum.$ipnum;
	$_SESSION['ordernum']=$ordernum;
}

if($mod=="instant"){ // 바로구매 페이지(middle_group.php)에서만 적용 시작
$querygoods=mysqli_query($link,"select * from goods where id=$id");
$rowgoods=mysqli_fetch_array($querygoods);
if($rowgoods['mania'] == 1){
$maniacash=$rowgoods['price'];
$maniacash2=$maniacash*0.1;
$maniapoint=ceil($maniacash2/10)*10;
}
$querybasket=mysqli_num_rows(mysqli_query($link,"select id from basket where goodsid='$id' && ordernum='$ordernum' "));

if($querybasket < 1){
	$insert = "insert into basket values ".	"('','$id','$ordernum','$my_member_id','$rowgoods[name]','$rowgoods[fixprice]',".
	"'$rowgoods[price]','$rowgoods[point]','$maniapoint','$QuantityNum','$rowgoods[dday]','$rowgoods[dcost]')";
	$result=mysqli_query($link,$insert);
} else {
	$update = "update basket set quantity='$QuantityNum' where goodsid='$id' && ordernum='$ordernum' ";
	$result=mysqli_query($link,$update);
}

} // 바로구매페이지에서만 적용 끝
   echo "<meta http-equiv='Refresh' content='0 URL=order_write.php?mod=memberYes'>";
?>