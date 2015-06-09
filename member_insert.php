<?php
include "config/session_inc.php";
include "config/lib.php";
$mod=$_REQUEST['mod'];
$member_id=$_REQUEST['member_id'];
$pass1=$_REQUEST['pass1'];
$pass2=$_REQUEST['pass2'];
$cash=$_REQUEST['cash'];
$cashday=$_REQUEST['cashday'];
$point=$_REQUEST['point'];
$pointok=$_REQUEST['po  intok'];
$name=$_REQUEST['name'];
$jumin1=$_REQUEST['jumin1'];
$jumin2=$_REQUEST['jumin2'];
$tel1=$_REQUEST['tel1'];
$tel2=$_REQUEST['tel2'];
$tel3=$_REQUEST['tel3'];
$htel1=$_REQUEST['htel1'];
$htel2=$_REQUEST['htel2'];
$htel3=$_REQUEST['htel3'];
$post1=$_REQUEST['post1'];
$post2=$_REQUEST['post2'];
$address=$_REQUEST['address'];
$post_num=$_REQUEST['post_num'];
$nickname=$_REQUEST['nickname'];
$email=$_REQUEST['email'];
$mailing=$_REQUEST['mailing'];
$hobby1=$_REQUEST['hobby1'];
$hobby2=$_REQUEST['hobby2'];
$hobby3=$_REQUEST['hobby3'];
$hobby4=$_REQUEST['hobby4'];
$hobby5=$_REQUEST['hobby5'];
$hobby6=$_REQUEST['hobby6'];
$hobby7=$_REQUEST['hobby7'];
$job=$_REQUEST['job'];
$url=$_REQUEST['url'];
$sms=$_REQUEST['sms'];
$avatar=$_REQUEST['avatar'];
$imgup1_name1=$_REQUEST['imgup1_name1'];
$myinfo=$_REQUEST['myinfo'];

if($mod){

if (eregi("김동업|maramura|kimdongup|마라무라|관리자|운영자|admin|씨발|섹스",$name)) {
echo ("
<script>
alert('홈 관련어 또는 욕설등 닉네임으로 적합하지 내용이 포함되어 있습니다.')
history.go(-1)
</script>
");
exit;
} 

if (eregi("서로닷컴|seoro|관리자|운영자|admin|씨발|섹스",$nickname)) {
echo ("
<script>
alert('홈 관련어 또는 욕설등 닉네임으로 적합하지 내용이 포함되어 있습니다.')
history.go(-1)
</script>
");
exit;
} 
$member_id2=strtolower($member_id);
$query2="select id from member where member_id='$member_id2' ";
if(mysqli_num_rows(mysqli_query($link,$query2)) > 0) {
echo ("
<script>
alert('동일한 아이디가 존재합니다.다른 아이디를 사용하세요.')
history.go(-1)
</script>
");
exit;
}


$query="select id from member where jumin1='$jumin1' && jumin2='$jumin2' ";
if(mysqli_num_rows(mysqli_query($link,$query)) > 5) {
echo ("
<script>
alert('동일한 주민번호가 5개 이상 존재합니다. 더 이상 같은 주민번호로 등록할 수 없습니다.')
history.go(-1)
</script>
");
exit;
}

$nickname2=strtolower($nickname);
$query2="select id from member where nickname='$nickname2' ";
if(mysqli_num_rows(mysqli_query($link,$query2)) > 0) {
echo ("
<script>
alert('동일한 닉네임이 존재합니다.다른 닉네임을 사용하세요.')
history.go(-1)
</script>
");
exit;
}



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
}


$timeno=mktime();
// 이미지 저장 디렉토리명
$save_dir = "memberimg";

// 사진1 

if(is_uploaded_file($_FILES["imgup1"]["tmp_name"])) {
 	$imgup1_size=$_FILES["imgup1"]["size"];
    if($imgup1_size > 10 && $imgup1_size < 300000){ 

		$filewidth1=stripslashes($_FILES["imgup1"]["tmp_name"]);
        $widthsize1=@GetImageSize($filewidth1); //이미지의 가로세로길이를 가져온다.
        $fwidth1=640;  //화면에 보여질 최대 넓이를 정한다.
		$fheight1=480;  //화면에 보여질 최대 높이를 정한다.

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

   // 썸네일  
	
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


} // 확장자검사
} // 이미지넓이
} // 이미지 크기
} // 파일 검사

$insert1 = "insert into member values ".
	"('','$member_id','$pass1','$pass2','$cash','$cashday','$point','$pointok','1','10','$name','$jumin1','$jumin2',".
	"'$tel1','$tel2','$tel3','$htel1','$htel2','$htel3','$post1','$post2','$address','$post_num','$nickname',".	"'$email','$mailing','$hobby1','$hobby2','$hobby3','$hobby4','$hobby5','$hobby6','$hobby7','$job',".
	"'$url','$sms','$_SESSION[REMOTE_ADDR]','$avatar','$imgup1_name1','$myinfo','$timeno')";
$result1=mysqli_query($link,$insert1);

// 자신의 컴퓨터에서 테스트 할 때는 이메일과 sms는 삭제하고 하세요. 

/*
// 이메일 시작
$subject = "서로닷컴(seoro.com) 회원가입을 축하합니다.";
$content = "
<HTML>
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=EUC-KR\">
<title>서로닷컴(seoro.com)</title></head><body>$name 님 서로닷컴(seoro.com) 회원가입을 진심으로 환영합니다.<p><table border=\"0\"><tr><td></td></tr><tr><td><a href=\"http://www.seoro.com\" target=\"_blank\"><img src=\"http://www.seoro.com/image/member_email.jpg\" border=\"0\" alt=\"서로닷컴\"></a></td></tr></table></body></html>
";
// 운영자에게 메일 보내기
mailer($admin_name, $admin_email, $admin_email, $subject, $content);
// 회원가입자에게 메일 보내기
mailer($admin_name, $admin_email, $email, $subject, $content);
// 이메일 끝

$hphone=$htel1."-".$htel2."-".$htel3;

// 문자메시지 보내기  
$connect1 = @mysql_connect('120.160.220.113','smsid','smspw') or Error("DB 접속시 에러가 발생했습니다");
			@mysql_select_db('smsdb', $connect1) or Error("DB Select 에러가 발생했습니다","");
			$sql = "INSERT INTO em_tran ( tran_pr, tran_id, tran_etc1, tran_phone, tran_callback, tran_status, tran_date, tran_msg) VALUES ( null, 'seoro', '$name', '$hphone', '$co_htel', '1', sysdate(), '서로닷컴(seoro.com) 회원가입을 진심으로 환영합니다.')";
			$result1 = mysqli_query($link,$sql,$connect1); // 운영자에게 보내기

			$sql2 = "INSERT INTO em_tran ( tran_pr, tran_id, tran_etc1, tran_phone, tran_callback, tran_status, tran_date, tran_msg) VALUES ( null, 'seoro', '서로닷컴운영자', '$co_htel', '$hphone', '1', sysdate(), '서로닷컴(seoro.com) 회원가입을 진심으로 환영합니다.')";
			$result2 = mysqli_query($link,$sql2,$connect1);
			mysql_close($connect1); // 가입자에게 보내기
// 문자메시지 보내기 끝 
*/ 

mysqli_close($link);
echo ("<meta http-equiv='Refresh' content='0; URL=home.php'>");
}
?>