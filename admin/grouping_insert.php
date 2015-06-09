<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['fixid'])){$fixid  ="";} else {$fixid  = $_REQUEST['fixid'];}
if(!isset($_REQUEST['gs2id'])){$gs2id  ="";} else {$gs2id  = $_REQUEST['gs2id'];}
if(!isset($_REQUEST['name'])){$name  ="";} else {$name  = $_REQUEST['name'];}
if(!isset($_REQUEST['number'])){$number  ="";} else {$number  = $_REQUEST['number'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "good1_insert"){
$insert = mysqli_query($link,"insert into goods1 values('','$fixid','$name','$number')");
mysqli_close($link);
echo ("<meta http-equiv='Refresh' content='0; URL=goods1_list.php'>");
}else if($mod == "good2_insert"){
$insert = mysqli_query($link,"insert into goods2 values('','$fixid','$name')");
mysqli_close($link);
echo ("<meta http-equiv='Refresh' content='0; URL=goods1_list.php'>");
}else if($mod == "good3_insert"){
$insert = mysqli_query($link,"insert into goods3 values('','$fixid','$gs2id','$name')");
mysqli_close($link);
echo ("<meta http-equiv='Refresh' content='0; URL=goods2_list.php'>");
} else { echo "잘못된 접근입니다."; }
} else { echo "이곳은 관리자 페이지입니다."; }
?>