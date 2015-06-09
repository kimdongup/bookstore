<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 

if($mod == "consultmodifyinsert"){
$timeno=mktime();

$update = "update consult set title='$cstitle',content='$content',rdate='$timeno' where id='$id' ";
$result=mysqli_query($link,$update);

echo ("<meta http-equiv='Refresh' content='0; URL=ConsultList.php'>");

mysqli_close($link);

}else{ err_msg("잘못된 접근을 시도하고 있습니다."); }
include "bottom.php";
?>