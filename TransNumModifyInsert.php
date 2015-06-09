<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['$my_grade'])){$my_grade ="";} else {$my_grade = $_SESSION['$my_grade'];}
if($my_member_id){
if($mod == "transportinsert"){
	if($my_grade < 6){ // 5보다 적어야 관리자
	if(($pwd == $trans_admin_pwd) || ($pwd == $my_admin_pwd)){ 
	$update = "update transport set transnum='$transnum', transco='$transco' where ordernum='$kordernum' ";
	$result=mysqli_query($link,$update);
	}else{ err_msg("비밀번호가 틀립니다."); }
	mysql_close();

	echo ("<meta http-equiv='Refresh' content='0; URL=TransNumModify.php?kordernum=$kordernum&mod=transportinsert'>");
	}else{ msg("관리자가 아닙니다."); }
} else { echo "잘못된 접근입니다."; }
}else{ msg("로그인 페이지 입니다."); }
?>