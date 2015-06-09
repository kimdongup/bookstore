<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['fixid'])){$fixid  ="";} else {$fixid  = $_REQUEST['fixid'];}
if(!isset($_REQUEST['name'])){$name  ="";} else {$name  = $_REQUEST['name'];}
if(!isset($_REQUEST['number'])){$number  ="";} else {$number  = $_REQUEST['number'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "good1_insert"){

$update = "update goods1 set fixnum='$fixid',name='$name',number='$number' where id='$id' ";
$result=mysqli_query($link,$update);

mysqli_close($link);

echo ("<meta http-equiv='Refresh' content='0; URL=goods1_list.php'>");

// 저장후에 다음 다음 페이지로 이동해서 결제하도록 해야 함. 중복 저장 될 수 있음	
} else { echo "잘못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
?>