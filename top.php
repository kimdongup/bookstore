<?php
include "config/session_inc.php";
include "config/lib.php";
?>
<frame name="main">
<?php
///////////////////////// TOP //////////////////
$title=""; 
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1 ="";} else {$my_pass1 = $_SESSION['my_pass1'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
$includefile = implode("",file("design/top_head.html")); 
$includefile = eregi_replace("{TITLE}",$title,$includefile);
echo $includefile;
if ($my_member_id && $my_pass1 && $my_name){
include "design/top_body_login.html";
}else{
include "design/top_body_logout.html";
}
?>