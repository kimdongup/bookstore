<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['titlenum'])){$titlenum ="";} else {$titlenum = $_REQUEST['titlenum'];}
if(!isset($_REQUEST['itemnum'])){$itemnum ="";} else {$itemnum = $_REQUEST['itemnum'];}
if(!isset($_REQUEST['item'])){$item ="";} else {$item = $_REQUEST['item'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "questioninsert"){
$timeno=mktime();

$insert = "insert into question values ".
	"('','$titlenum',$itemnum,'','$item','','','','','')";
$result=mysqli_query($link,$insert);


echo ("<meta http-equiv='Refresh' content='0; URL=questionList.php'>");

mysqli_close($link);

}else{ err_msg("잘못된 접근을 시도하고 있습니다."); }
}else{ msg("이곳은 관리자 메뉴입니다."); }
include "bottom.html";     // 하단 구성
?>