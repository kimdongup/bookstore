<?php
include "top.php";
include "main_left.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['cstitle'])){$cstitle  ="";} else {$cstitle  = $_REQUEST['cstitle'];}
if(!isset($_REQUEST['content'])){$content  ="";} else {$content  = $_REQUEST['content'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}


if($mod == "consultinsert"){
$timeno=mktime();

$insert = "insert into consult values ".
	"('','0','$my_member_id','$cstitle','$content','$timeno')";
$result=mysqli_query($link,$insert);

echo ("<meta http-equiv='Refresh' content='0; URL=ConsultList.php'>");
mysqli_close($link);

}else{ err_msg("잘못된 접근을 시도하고 있습니다."); }
include "bottom.php";
?>