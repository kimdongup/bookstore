<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}

if(!isset($_REQUEST['url'])){$url  ="";} else {$url  = $_REQUEST['url'];}
if(!isset($_REQUEST['action2'])){$action2  ="";} else {$action2  = $_REQUEST['action2'];}
if(!isset($_REQUEST['content'])){$content  ="";} else {$content  = $_REQUEST['content'];}

if($my_admin_id && $my_admin_pwd){

if($mod == "bannerinsert"){
$timeno=mktime();
$save_dir = "bannerimg";

// 사진1 

if(is_uploaded_file($_FILES["imgup1"]["tmp_name"])) {
    $imgup1_size=$_FILES["imgup1"]["size"];
    if($imgup1_size > 10 && $imgup1_size < 300000){ 

	$filewidth1=stripslashes($_FILES["imgup1"]["tmp_name"]);
        $widthsize1=@GetImageSize($filewidth1); 
        $fwidth1=900;  // 최대 넓이
	$fheight1=500;  //최대 높이

        // 이미지 사이즈가 지정된 넓이보다 작거나 같으면 현재 사이즈를 유지
        if($widthsize1[0]<=$fwidth1 && $widthsize1[1]<=$fheight1) {

	$imgup1_name=$_FILES["imgup1"]["name"];
	$file_ext1 = strtolower(substr(strrchr($imgup1_name,"."), 1));
	if (eregi("jpg|jpeg|gif|png",$file_ext1)) {
	$timeno1=$timeno+1; 
	$imgup1_name1=$timeno1.".".$file_ext1;
	$dest = "../".$save_dir . "/" . $imgup1_name1;
   if(!move_uploaded_file($_FILES['imgup1']['tmp_name'],$dest)) {
      die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");      
   }


} // 확장자검사
} // 이미지넓이
} // 이미지 크기
} // 파일 검사


$insert = "insert into banner values ".
	"('','$url','$imgup1_name1','$action2','$content','$timeno')";
$result=mysqli_query($link,$insert);

echo ("<meta http-equiv='Refresh' content='0; URL=banner_list.php'>");

mysqli_close($link);
}
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>