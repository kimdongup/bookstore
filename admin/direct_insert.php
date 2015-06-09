<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['cstitle'])){$cstitle ="";} else {$cstitle = $_REQUEST['cstitle'];}
if(!isset($_REQUEST['content'])){$content ="";} else {$content = $_REQUEST['content'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){

if($mod == "directinsert"){
$timeno=mktime();

$insert = "insert into consult values ".
	"('','$id','관리자','$cstitle','$content','$timeno')";
$result=mysqli_query($link,$insert);


echo ("<meta http-equiv='Refresh' content='0; URL=direct_list.php'>");

mysqli_close($link);
}
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>