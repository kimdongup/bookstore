<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['fixid'])){$fixid  ="";} else {$fixid  = $_REQUEST['fixid'];}
if(!isset($_REQUEST['name'])){$name  ="";} else {$name  = $_REQUEST['name'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "good1_insert"){

$query=mysqli_query($link,"select * from goods3 where id='$id' ");
$row=mysqli_fetch_array($query);

$update = "update goods3 set fixnum='$fixid',name='$name' where id='$id' ";
$result=mysqli_query($link,$update);

mysqli_close($link);

echo ("<meta http-equiv='Refresh' content='0; URL=goods3_list.php'>");

} else { echo "잘못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
?>