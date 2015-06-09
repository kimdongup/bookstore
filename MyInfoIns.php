<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['id'])){$id  ="";} else {$id = $_REQUEST['id'];} 

if(!isset($_REQUEST['tel1'])){$tel1  =0;} else {$tel1  = $_REQUEST['tel1'];}
if(!isset($_REQUEST['tel2'])){$tel2  =0;} else {$tel2  = $_REQUEST['tel2'];}
if(!isset($_REQUEST['tel3'])){$tel3  =0;} else {$tel3  = $_REQUEST['tel3'];}
if(!isset($_REQUEST['htel1'])){$htel1  =0;} else {$htel1  = $_REQUEST['htel1'];}
if(!isset($_REQUEST['htel2'])){$htel2  =0;} else {$htel2  = $_REQUEST['htel2'];}
if(!isset($_REQUEST['htel3'])){$htel3  =0;} else {$htel3  = $_REQUEST['htel3'];}
if(!isset($_REQUEST['post1'])){$post1  =0;} else {$post1  = $_REQUEST['post1'];}
if(!isset($_REQUEST['post2'])){$post2  =0;} else {$post2  = $_REQUEST['post2'];}
if(!isset($_REQUEST['address'])){$address  =0;} else {$address  = $_REQUEST['address'];}
if(!isset($_REQUEST['post_num'])){$post_num  =0;} else {$post_num  = $_REQUEST['post_num'];}
if(!isset($_REQUEST['mailing'])){$mailing  =0;} else {$mailing  = $_REQUEST['mailing'];}

if(!isset($_REQUEST['pass1'])){$pass1  =0;} else {$pass1  = $_REQUEST['pass1'];}
if(!isset($_REQUEST['pass2'])){$pass2  =0;} else {$pass2  = $_REQUEST['pass2'];}
if(!isset($_REQUEST['hobby1'])){$hobby1  =0;} else {$hobby1  = $_REQUEST['hobby1'];}
if(!isset($_REQUEST['hobby2'])){$hobby2  =0;} else {$hobby2  = $_REQUEST['hobby2'];}
if(!isset($_REQUEST['hobby3'])){$hobby3  =0;} else {$hobby3  = $_REQUEST['hobby3'];}
if(!isset($_REQUEST['hobby4'])){$hobby4  =0;} else {$hobby4  = $_REQUEST['hobby4'];}
if(!isset($_REQUEST['hobby5'])){$hobby5  =0;} else {$hobby5  = $_REQUEST['hobby5'];}
if(!isset($_REQUEST['hobby6'])){$hobby6  =0;} else {$hobby6  = $_REQUEST['hobby6'];}
if(!isset($_REQUEST['hobby7'])){$hobby7  =0;} else {$hobby7  = $_REQUEST['hobby7'];}
if(!isset($_REQUEST['job'])){$job  =0;} else {$job  = $_REQUEST['job'];}
if(!isset($_REQUEST['url'])){$url  =0;} else {$url  = $_REQUEST['url'];}
if(!isset($_REQUEST['sms'])){$sms  =0;} else {$sms  = $_REQUEST['sms'];}
if(!isset($_REQUEST['avatar'])){$avatar  =0;} else {$avatar  = $_REQUEST['avatar'];}
if(!isset($_REQUEST['myinfo'])){$myinfo  =0;} else {$myinfo  = $_REQUEST['myinfo'];}

if($mod){
$query=mysqli_query($link,"select * from member where member_id='$my_member_id' ");
$row=mysqli_fetch_array($query);

if($_FILES["imgup1"]["name"]){
if($row[filename]) {
$delfilename1="memberimg/$row[filename]";
if(!@unlink($delfilename1)) {
	echo "파일삭제 실패";
} else {
	echo "파일 삭제 성공";
}

$delfilename1_1="s_memberimg/$row[filename]";
if(!@unlink($delfilename1_1)) {
	echo "파일삭제 실패";
} else {
	echo "파일 삭제 성공";
}
}
}

$timeno=mktime();
$save_dir = "memberimg"; // 사진 저장 디렉토리

// 사진1
if(is_uploaded_file($_FILES["imgup1"]["tmp_name"])) {
 	$imgup1_size=$_FILES["imgup1"]["size"];
    if($imgup1_size > 10 && $imgup1_size < 300000){ 

		$filewidth1=stripslashes($_FILES["imgup1"]["tmp_name"]);
        $widthsize1=@GetImageSize($filewidth1);
        $fwidth1=640; 
		$fheight1=480;
		if($widthsize1[0]<=$fwidth1 && $widthsize1[1]<=$fheight1) {

	$imgup1_name=$_FILES["imgup1"]["name"];
	$file_ext1 = strtolower(substr(strrchr($imgup1_name,"."), 1));
	if (eregi("jpg|jpeg|gif|png",$file_ext1)) {
	$timeno1=$timeno+1; 
	$imgup1_name1=$timeno1."_".$htel3.".".$file_ext1;
	$dest = $save_dir . "/" . $imgup1_name1;
   if(!move_uploaded_file($_FILES['imgup1']['tmp_name'],$dest)) {
      die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");      
   }
	
	if($file_ext1 == 'jpg' || $file_ext1 == 'jpeg'){
	?>
	<img src=img_thum_mem_jpg.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
	<?php
	} else if($file_ext1 == 'gif'){
	?>
	<img src=img_thum_mem_gif.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
	<?php
	} else if($file_ext1 == 'png'){
	?>
	<img src=img_thum_mem_png.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
	<?php
	}
$update = "update member set filename='$imgup1_name1' where member_id='$my_member_id' ";
$result=mysqli_query($link,$update);

} // 확장자검사
} // 이미지넓이
} // 이미지 크기
} // 파일 검사

if($pwdchange == 2){
$update = "update member set  pass1='$pass1',pass2='$pass2' where member_id='$my_member_id' && id='$id'";
$result=mysqli_query($link,$update);
} 

if($emailsj  == 2){
$update2 = "update member set  email='' where member_id='$my_member_id' && id='$id'";
$result2=mysqli_query($link,$update2);
$email2=strtolower($email);
$query3="select id from member where email='$email2' ";
if(mysqli_num_rows(mysqli_query($link,$query3)) > 0) {
echo ("
<script>
alert('동일한 이메일이 존재합니다.다른 이메일을 사용하세요.')
history.go(-1)
</script>
");
exit;
} else {
$update2 = "update member set  email='$email' where member_id='$my_member_id' ";
$result2=mysqli_query($link,$update2);
}
}

$update = "update member set tel1='$tel1',tel2='$tel2',tel3='$tel3',htel1='$htel1',htel2='$htel2',htel3='$htel3',post1='$post1',post2='$post2',address='$address',post_num='$post_num',mailing='$mailing',hobby1='$hobby1',hobby2='$hobby2',hobby3='$hobby3',hobby4='$hobby4',hobby5='$hobby5',hobby6='$hobby6',hobby7='$hobby7',job='$job',url='$url',sms='$sms',ip='$_SERVER[REMOTE_ADDR],avatar='$avatar',myinfo='$myinfo' where member_id='$my_member_id' ";
$result=mysqli_query($link,$update);

mysqli_close($link);

echo ("<meta http-equiv='Refresh' content='0; URL=MyInfo.php'>");

} else { echo "잘못된 접근입니다."; }
include "bottom.php"; 
?>