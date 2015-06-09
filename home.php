<?php
include "config/session_inc.php";
include "config/lib.php";

$visitck="";$auto_id="";$includefile="";
$title="";$company="";$co_num=""; $co_tel="";$co_email="";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1 ="";} else {$my_pass1 = $_SESSION['my_pass1'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
///////////////////////// 자동로그인체크 //////////////////
if(!$visitck){
if($auto_id){
    $auto_result=mysqli_query($link, "select * from $member where member_id='$auto_id' && pass1='$auto_pwd'");
    if(mysql_num_rows($auto_result) > 0) {
	$row_home=mysqli_fetch_array($auto_result);
	$my_member_id=$row_home['member_id'];
	$my_pass1=$row_home['pass1'];
	$my_visit=$row_home['visit'];
	$my_grade=$row_home['grade'];
	$my_name=$row_home['name'];
	$my_tel1=$row_home['tel1'];
	$my_tel2=$row_home['tel2'];
	$my_tel3=$row_home['tel3'];
	$my_htel1=$row_home['htel1'];
	$my_htel2=$row_home['htel2'];
	$my_htel3=$row_home['htel3'];
	$my_nickname=$row_home['nickname'];
	$my_email=$row_home['email'];
	$my_url=$row_home['url'];
	$my_filename=$row_home['filename'];
	$my_add=explode(" ",$row_home['address']);
	$my_address=$my_add['0']." ".$my_add['1'];
	$post1=$row_home['post1'];
	$post2=$row_home['post2'];
	$address=$row_home['address'];
	$post_num=$row_home['post_num'];
	$_SESSION['post1'] = $post1;
	$_SESSION['post2'] = $post2;
	$_SESSION['address'] = $address;
	$_SESSION['post_num'] = $post_num;
	$_SESSION['my_address'] = $my_address;
	$_SESSION['my_member_id'] = $my_member_id;
	$_SESSION['my_pass1'] = $my_pass1;
	$_SESSION['my_visit'] = $my_visit;
	$_SESSION['my_grade'] = $my_grade;
	$_SESSION['my_name'] = $my_name;
	$_SESSION['my_bunryu'] = $my_bunryu;
	$_SESSION['my_company'] = $my_company;
	$_SESSION['my_jikwi'] = $my_jikwi;
	$_SESSION['my_tel1'] = $my_tel1;
	$_SESSION['my_tel2'] = $my_tel2;
	$_SESSION['my_tel3'] = $my_tel3;
	$_SESSION['my_htel1'] = $my_htel1;
	$_SESSION['my_htel2'] = $my_htel2;
	$_SESSION['my_htel3'] = $my_htel3;
	$_SESSION['my_nickname'] = $my_nickname;
	$_SESSION['my_email'] = $my_email;
	$_SESSION['my_url'] = $my_url;
	$_SESSION['my_filename'] = $my_filename;

	$visited=$row_home['visit']+1;
	$visit_update=mysqli_query($link,"update $member set visit=$visited where member_id='$auto_id'");

    } // 실제로 그런 아이디가 존재하는지 검사
} // 자동 로그인 아이디가 있는지 검사


$visitck="befor";
$_SESSION['visitck'] = $visitck;

// 접속통계 시작
if(eregi("win",$_SERVER['HTTP_USER_AGENT'])){
$browser = "windows";
}else if(eregi("linux",$_SERVER['HTTP_USER_AGENT'])){
$browser = "linux";
}else if(eregi("mac",$_SERVER['HTTP_USER_AGENT'])){
$browser = "macintosh";
}else if(eregi("unix|sunos|aix|hp-ux|irix|osf|bsd",$_SERVER['HTTP_USER_AGENT'])){
$browser = "unix";
}else{
$browser = "etc";
}

$timeno=mktime();
$insert1 = "insert into connectsum values ".
	"('$_SERVER[REMOTE_ADDR]','$browser','$_SERVER[REQUEST_URI]','$timeno')";
$result1=mysqli_query($link,$insert1);
// 접속 통계 끝

} // 두번째 방문부터 방문 카운터 작동금지

///////////////////////// TOP //////////////////
$includefile = implode("",file("design/top_head.html")); 
$includefile = eregi_replace("{TITLE}",$title,$includefile);
echo $includefile;
if ($my_member_id && $my_pass1 && $my_name){
include "design/top_body_login.html";
}else{
include "design/top_body_logout.html";
}

include "main.php";


///////////////////////// bottom //////////////////
$includefile = implode("",file("design/bottom.html")); 
$includefile = eregi_replace("{COMPANY}",$company,$includefile);
$includefile = eregi_replace("{CO_NUM}",$co_num,$includefile);
$includefile = eregi_replace("{CO_TEL}",$co_tel,$includefile);
$includefile = eregi_replace("{CO_EMAIL}",$co_email,$includefile);
echo $includefile;
?>