<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if($my_admin_id && $my_admin_pwd){
?>
관리자 메뉴

<?php
}else{
echo "관리자 메뉴에 접근하지 마세요. 형사처벌의 대상이 될 수 있습니다.";
}
include "bottom.html"; 
?>