<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['pass'])){$pass  ="";} else {$pass  = $_REQUEST['pass'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "del_ok"){
if($pass == "$my_admin_pwd"){

$dbdel = "delete from goods1 where id=$id ";
$result=mysqli_query($link,$dbdel);
mysqli_close($link);
echo ("<meta http-equiv='Refresh' content='0; URL=goods1_list.php'>");

}else{ echo "비밀번호가 틀립니다."; }
}else{ echo "잘 못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
?>