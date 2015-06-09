<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_REQUEST['delid'])){$delid  ="";} else {$delid = $_REQUEST['delid'];} 

if($my_member_id){
	if($mod=='mylistmemodel'){ // 삭제
		$querydel2=mysqli_query($link,"delete from mylistmemo where id=$delid && orderer='$my_member_id'");
	}else{
		echo ("
			<script>
		alert('You are trying bad connection.')
		history.go(-1)
		</script>
		");
		exit;
}
}else{
include "link_login.php";
}
?>
<meta http-equiv='Refresh' content='0 URL=MyList.php'>