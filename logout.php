<?php
include "config/session_inc.php";
	unset($_SESSION['post1']);
	unset($_SESSION['post2']);
	unset($_SESSION['address']);
	unset($_SESSION['post_num']);
	unset($_SESSION['my_address']);
	unset($_SESSION['my_member_id']);
	unset($_SESSION['my_pass1']);
	unset($_SESSION['my_visit']);
	unset($_SESSION['my_grade']);
	unset($_SESSION['my_name']);
	unset($_SESSION['my_bunryu']);
	unset($_SESSION['my_company']);
	unset($_SESSION['my_jikwi']);
	unset($_SESSION['my_tel1']);
	unset($_SESSION['my_tel2']);
	unset($_SESSION['my_tel3']);
	unset($_SESSION['my_htel1']);
	unset($_SESSION['my_htel2']);
	unset($_SESSION['my_htel3']);
	unset($_SESSION['my_nickname']);
	unset($_SESSION['my_email']);
	unset($_SESSION['my_url']);
	unset($_SESSION['my_filename']);
	unset($_SESSION['ordernum']);
	unset($_SESSION['blogis']);
	unset($_SESSION['blogvisitck']);
	setcookie("auto_id","");
	setcookie("auto_pwd","");
        unset($_SESSION);
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
echo ("
  <script>
  history.go(-1)
  </script>
  ");
?>