<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['goodsid'])){$goodsid  ="";} else {$goodsid  = $_REQUEST['goodsid'];}
if(!isset($_REQUEST['RVtitle'])){$RVtitle  ="";} else {$RVtitle  = $_REQUEST['RVtitle'];}
if(!isset($_REQUEST['content'])){$content  ="";} else {$content  = $_REQUEST['content'];}
if(!isset($_REQUEST['mark'])){$mark  ="";} else {$mark  = $_REQUEST['mark'];}

if($mod == "yes"){

$insert = "insert into myreview values ".
	"('','$goodsid','$my_member_id','$RVtitle','$content','$mark',now())";
$result=mysqli_query($link,$insert);

echo ("<meta http-equiv='Refresh' content='0; URL=goodsview.php?id=$goodsid'>");
}
include "bottom.php";
?>