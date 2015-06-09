<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}

if(!isset($_REQUEST['goodsid'])){$goodsid  ="";} else {$goodsid  = $_REQUEST['goodsid'];}
if(!isset($_REQUEST['hidf1'])){$hidf1  ="";} else {$hidf1  = $_REQUEST['hidf1'];}
if(!isset($_REQUEST['hidf2'])){$hidf2  ="";} else {$hidf2  = $_REQUEST['hidf2'];}
if(!isset($_REQUEST['hidf3'])){$hidf3  ="";} else {$hidf3  = $_REQUEST['hidf3'];}
if(!isset($_REQUEST['smallquantity'])){$smallquantity  =0;} else {$smallquantity  = $_REQUEST['smallquantity'];}

if($my_admin_id && $my_admin_pwd){
if($mod == 'largepur'){

$insert = "insert into largepurchase values ".
	"('','$goodsid','$hidf1','$hidf2','$hidf3',0,'$smallquantity',0,0)";
$result=mysqli_query($link,$insert);
echo $insert;echo $result;
//returnurl('largePurWrite.php');
}else{
	err_msg("잘못된 접근입니다.");
	}
	}else{
	err_msg("이곳은 관리자 페이지입니다.");
}
mysqli_close($link);
?>