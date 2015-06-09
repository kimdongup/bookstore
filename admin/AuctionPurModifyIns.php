<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}

if(!isset($_REQUEST['goodsid'])){$goodsid  ="";} else {$goodsid  = $_REQUEST['goodsid'];}
if(!isset($_REQUEST['hidf1'])){$hidf1  =0;} else {$hidf1  = $_REQUEST['hidf1'];}
if(!isset($_REQUEST['hidf2'])){$hidf2  =0;} else {$hidf2  = $_REQUEST['hidf2'];}
if(!isset($_REQUEST['hidf3'])){$hidf3  =0;} else {$hidf3  = $_REQUEST['hidf3'];}
if(!isset($_REQUEST['hidf3'])){$hidf3  =0;} else {$hidf3  = $_REQUEST['hidf3'];}
if(!isset($_REQUEST['dcprice'])){$dcprice  =0;} else {$dcprice  = $_REQUEST['dcprice'];}
if(!isset($_REQUEST['recordquantity'])){$recordquantity  =0;} else {$recordquantity  = $_REQUEST['recordquantity'];}
if(!isset($_REQUEST['orderquantity'])){$orderquantity  =0;} else {$orderquantity  = $_REQUEST['orderquantity'];}
if(!isset($_REQUEST['id'])){$id  =1;} else {$id  = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
if($mod == 'auctionpur'){
$update = "update auctionpurchase set goodsid='$goodsid',fixprice='$hidf1',price='$hidf2',endprice='$hidf3',dcprice='$dcprice',recordquantity='$recordquantity',orderquantity='$orderquantity' where id=$id";
$result=mysqli_query($link,$update);
returnurl("auctionPurModify.php?id=".$id);
}else{
	err_msg("잘못된 접근입니다.");
	}
	}else{
	err_msg("이곳은 관리자 페이지입니다.");
}
mysqli_close($link);
?>