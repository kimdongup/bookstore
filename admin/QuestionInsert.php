<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['titlenum'])){$titlenum ="";} else {$titlenum = $_REQUEST['titlenum'];}
if(!isset($_REQUEST['atitle'])){$atitle ="";} else {$atitle = $_REQUEST['atitle'];}
if(!isset($_REQUEST['yesno'])){$yesno ="";} else {$yesno = $_REQUEST['yesno'];}

if(!isset($_REQUEST['Stimeh'])){$Stimeh ="";} else {$Stimeh = $_REQUEST['Stimeh'];}
if(!isset($_REQUEST['Stimem'])){$Stimem ="";} else {$Stimem = $_REQUEST['Stimem'];}
if(!isset($_REQUEST['Stimes'])){$Stimes ="";} else {$Stimes = $_REQUEST['Stimes'];}
if(!isset($_REQUEST['Sdatem'])){$Sdatem ="";} else {$Sdatem = $_REQUEST['Sdatem'];}
if(!isset($_REQUEST['Sdated'])){$Sdated ="";} else {$Sdated = $_REQUEST['Sdated'];}
if(!isset($_REQUEST['Sdatey'])){$Sdatey ="";} else {$Sdatey = $_REQUEST['Sdatey'];}
if(!isset($_REQUEST['Etimeh'])){$Etimeh ="";} else {$Etimeh = $_REQUEST['Etimeh'];}
if(!isset($_REQUEST['Etimem'])){$Etimem ="";} else {$Etimem = $_REQUEST['Etimem'];}
if(!isset($_REQUEST['Etimes'])){$Etimes ="";} else {$Etimes = $_REQUEST['Etimes'];}
if(!isset($_REQUEST['Edatem'])){$Edatem ="";} else {$Edatem = $_REQUEST['Edatem'];}
if(!isset($_REQUEST['Edated'])){$Edated ="";} else {$Edated = $_REQUEST['Edated'];}
if(!isset($_REQUEST['Edatey'])){$Edatey ="";} else {$Edatey = $_REQUEST['Edatey'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "questioninsert"){
$timeno=mktime();
$Sdate=mktime($Stimeh,$Stimem,$Stimes,$Sdatem,$Sdated,$Sdatey);
$Edate=mktime($Etimeh,$Etimem,$Etimes,$Edatem,$Edated,$Edatey);
$insert = "insert into question values ".
	"('','$titlenum',0,'$atitle','','$Sdate','$Edate','$yesno','','$timeno')";
$result=mysqli_query($link,$insert);


echo ("<meta http-equiv='Refresh' content='0; URL=questionList.php'>");

mysqli_close($link);

}else{ err_msg("잘못된 접근을 시도하고 있습니다."); }
}else{ msg("이곳은 관리자 메뉴입니다."); }
include "bottom.html";     // 하단 구성
?>