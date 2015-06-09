<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['mod2'])){$mod2 ="";} else {$mod2 = $_REQUEST['mod2'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}
if(!isset($_REQUEST['delname'])){$delname ="";} else {$delname = $_REQUEST['delname'];}


if($my_admin_id && $my_admin_pwd){
	if($mod=='largepurdel'){ 

	if($mod2=='delok'){
		$querydel=mysqli_query($link,"delete from largepurchase where id=$id");
		returnurl('largePurList.php');
	}else{
	?>
		<p><b><?php echo $delname; ?></b></p>
		이 상품을 정말로 삭제하시겠습니까?<p>
		<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?id=<?php echo $id?>&mod=largepurdel&mod2=delok>[예]</a>
	<?php
	}
	}else{
		err_msg('You are trying bad connection.');
	}
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";  
?>