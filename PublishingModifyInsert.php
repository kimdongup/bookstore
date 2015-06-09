<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['$my_grade'])){$my_grade ="";} else {$my_grade = $_SESSION['$my_grade'];}
if($my_member_id){
if($mod == "pubishinsert"){
	if($my_grade < 6){ // 5보다 적어야 관리자
$query=mysqli_query($link,"select * from goods where id='$goodsid' ");
$row=mysqli_fetch_array($query);
$pass=$row['pwd'];
if(($pwd == $pass) || ($pwd == $my_admin_pwd)){
$update = "update goodsct set gsintro='$gsintro',auintro='$auintro',content='$content',preview='$preview' where goodsid='$id' ";
$result=mysqli_query($link,$update);
}else{ err_msg("비밀번호가 틀립니다."); }
mysqli_close($link);

echo ("<meta http-equiv='Refresh' content='0; URL=publishing.php'>");
}else{ msg("관리자가 아닙니다."); }
} else { echo "잘못된 접근입니다."; }
}else{ msg("로그인 페이지 입니다."); }
?>