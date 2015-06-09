<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['content'])){$content  ="";} else {$content  = $_REQUEST['content'];}
if(!isset($_REQUEST['question'])){$question  ="";} else {$question  = $_REQUEST['question'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "jinsert"){
$update = "insert into faq value ('$question','$content')";
$result=mysqli_query($link,$update);
mysqli_close($link);

echo ("<meta http-equiv='Refresh' content='0; URL=faq_admin.php'>");

} else { echo "잘못된 접근입니다."; }
} else { echo "잘못된 접근입니다."; } 
?>