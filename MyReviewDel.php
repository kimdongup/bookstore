<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_REQUEST['mod2'])){$mod2  ="";} else {$mod2 = $_REQUEST['mod2'];} 
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['delid'])){$delid  ="";} else {$delid  = $_REQUEST['delid'];}
if($my_member_id){
	if($mod=='myreviewdel'){ 

	if($mod2=='delok'){
		$querydel=mysqli_query($link,"delete from myreview where id=$delid && memberid='$my_member_id'");
		echo ("<meta http-equiv='Refresh' content='0 URL=MyReviewListAll.php?id=$id'>");
	}else{
	?>
		<p>&nbsp;</p>리뷰를 정말로 삭제하시겠습니까?<p>
		<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?id=<?php echo $id?>&delid=<?php echo $delid?>&mod=myreviewdel&mod2=delok>[예]</a>
	<?php
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
include "bottom.php";  
?>