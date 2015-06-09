<?php
include "../config/session_inc.php";
include "../config/lib.php";

if(!isset($_REQUEST['mod'])){$mod  =1;} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['pwd'])){$pwd  ="";} else {$pwd  = $_REQUEST['pwd'];}

if($mod == "admin_login_ck") {
$member_search=mysqli_query($link,"select * from admin where admin_id='$id' && admin_pwd='$pwd'");
if(mysqli_num_rows($member_search) > 0) {
	$row=mysqli_fetch_array($member_search);
	$my_admin_id=$row['admin_id'];
	$my_admin_pwd=$row['admin_pwd'];
	
	$_SESSION['my_admin_id']= $my_admin_id;
        $_SESSION['my_admin_pwd']= $my_admin_pwd;
	mysqli_close($link);

    echo ("<meta http-equiv='Refresh' content='0; URL=admin_start.php'>");
} else {
	echo ("
	<script>
	alert('관리자가 아니십니다. 관리자가 아니시면 절대 접근하지 마세요.');
	history.go(-1)
	</script>
	");
}

} else { // mod 검색
	echo ("
	<script>
	alert('잘못된 접근입니다.');
	history.go(-1)
	</script>
	");
}
?>