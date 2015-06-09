<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}

if(!isset($_REQUEST['Stimeh'])){$Stimeh  =0;} else {$Stimeh  = $_REQUEST['Stimeh'];}
if(!isset($_REQUEST['Stimem'])){$Stimem  =0;} else {$Stimem  = $_REQUEST['Stimem'];}
if(!isset($_REQUEST['Stimes'])){$Stimes  =0;} else {$Stimes  = $_REQUEST['Stimes'];}
if(!isset($_REQUEST['Sdatem'])){$Sdatem  =0;} else {$Sdatem  = $_REQUEST['Sdatem'];}
if(!isset($_REQUEST['Sdated'])){$Sdated  =0;} else {$Sdated  = $_REQUEST['Sdated'];}
if(!isset($_REQUEST['Sdatey'])){$Sdatey  =0;} else {$Sdatey  = $_REQUEST['Sdatey'];}

if(!isset($_REQUEST['goodsid'])){$goodsid  ="";} else {$goodsid  = $_REQUEST['goodsid'];}
if(!isset($_REQUEST['hidf1'])){$hidf1  =0;} else {$hidf1  = $_REQUEST['hidf1'];}
if(!isset($_REQUEST['hidf2'])){$hidf2  =0;} else {$hidf2  = $_REQUEST['hidf2'];}
if(!isset($_REQUEST['hidf3'])){$hidf3  =0;} else {$hidf3  = $_REQUEST['hidf3'];}
if(!isset($_REQUEST['recordquantity'])){$recordquantity  =1;} else {$recordquantity  = $_REQUEST['recordquantity'];}

if($my_admin_id && $my_admin_pwd){
if($mod == 'auctionpur'){

$timeno=mktime();
$Sdate=mktime($Stimeh,$Stimem,$Stimes,$Sdatem,$Sdated,$Sdatey);

$insert = "insert into auctionpurchase values ".
	"('','$goodsid','$hidf1','$hidf2','$hidf3',0,0,'$recordquantity',0,'$Sdate','$timeno')";
$result=mysqli_query($link,$insert);
echo $insert;echo $result;
//returnurl('auctionPurWrite.php');
}else{
	err_msg("잘못된 접근입니다.");
	}
	}else{
	err_msg("이곳은 관리자 페이지입니다.");
}
mysqli_close($link);
?>