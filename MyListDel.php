<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_REQUEST['check'])){$check = "";} else {$check = $_REQUEST['check'];} 
if($my_member_id){
	if($mod=='mylistdel'){ // 삭제
            if($check <> ""){
		for($i=0;$i<count($check);$i++) { // 관련서적, 이분야 베스트셀러 전체선택, 개별선택 처리
		$querydel=mysqli_query($link,"delete from mylist where goodsid=$check[$i] && orderer='$my_member_id'");
		$querydel2=mysqli_query($link,"delete from mylistmemo where goodsid=$check[$i] && orderer='$my_member_id'");
		}
            }
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