<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_REQUEST['goodsid'])){$goodsid  ="";} else {$goodsid = $_REQUEST['goodsid'];} 
if(!isset($_REQUEST['memo'])){$memo  ="";} else {$memo = $_REQUEST['memo'];} 

if($mod == "MyListMemoW"){

$insert = "insert into mylistmemo values ".
	"('','$goodsid','$my_member_id','$memo',now())";
$result=mysqli_query($link,$insert);

echo ("<meta http-equiv='Refresh' content='0; URL=MyList.php'>");
}
include "bottom.php";
?>