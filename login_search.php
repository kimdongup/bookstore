<?php
include "config/session_inc.php";
include "config/lib.php";
$mod=$_REQUEST['mod'];
$id=$_REQUEST['id'];
$pwd=$_REQUEST['pwd'];

if($mod == "auto_login_ok") {
    $member_search=mysqli_query($link,"select * from $member where member_id='$id' && pass1='$pwd'");
    if(mysqli_num_rows($member_search) > 0) {
	$row=mysqli_fetch_array($member_search);
	$auto_id_value=$row['member_id'];
	$auto_pwd_value=$row['pass1'];
	?>
	<script language="javascript">
	<!--
	function setCookie(name,value,expiredays)
	{
	   var todayDate = new Date();
	   todayDate.setDate( todayDate.getDate() + expiredays );
	   document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
	}
            setCookie("auto_id",'<?php echo $auto_id_value; ?>',30);
            setCookie("auto_pwd",'<?php echo $auto_pwd_value; ?>',30);
	//-->
	</script>
	<?php
	echo ("<meta http-equiv='Refresh' content='0; URL=home.php'>");
    }else{
	echo ("
	<script>
	alert('회원이 아니십니다. 아이디(ID)나 비밀번호가 틀릴 수도 있습니다.');
	history.go(-1)
	</script>
	");
    } 
} else if($mod == "login_ck") {
    $member_search=mysqli_query($link,"select * from $member where member_id='$id' && pass1='$pwd'");
    if(mysqli_num_rows($member_search) > 0) {
	$row=mysqli_fetch_array($member_search);
	$_SESSION['my_member_id']=$row['member_id'];
	$_SESSION['my_pass1']=$row['pass1'];
	$_SESSION['my_visit']=$row['visit'];
	$_SESSION['my_grade']=$row['grade'];
	$_SESSION['my_name']=$row['name'];
	$_SESSION['my_tel1']=$row['tel1'];
	$_SESSION['my_tel2']=$row['tel2'];
	$_SESSION['my_tel3']=$row['tel3'];
	$_SESSION['my_htel1']=$row['htel1'];
	$_SESSION['my_htel2']=$row['htel2'];
	$_SESSION['my_htel3']=$row['htel3'];
	$_SESSION['my_nickname']=$row['nickname'];
	$_SESSION['my_email']=$row['email'];
	$_SESSION['my_url']=$row['url'];
	$_SESSION['my_filename']=$row['filename'];
	$my_add=explode(" ",$row['address']);
	$_SESSION['my_address']=$my_add[0]." ".$my_add[1];
	$_SESSION['post1']=$row['post1'];
	$_SESSION['post2']=$row['post2'];
	$_SESSION['address']=$row['address'];
	$_SESSION['post_num']=$row['post_num'];
	$_SESSION['cash']=$row['cash'];
        $_SESSION['point']=$row['point'];
	$querymylist=mysqli_num_rows(mysqli_query($link,"select id from blogname where blogname='$id' "));
	if($querymylist > 0){ // 블로그가 있다면 
		$_SESSION['blogis']=$row['member_id'];
	}
	$visited=$row['visit']+1;
	$visit_update=mysqli_query($link,"update $member set visit=$visited where member_id='$id'");
	mysqli_close($link);

        echo ("
        <script>
        history.go(-2)
        </script>
        ");
    } else {
	echo ("
	<script>
	alert('회원이 아니십니다. 아이디(ID)나 비밀번호가 틀릴 수도 있습니다.');
	history.go(-1)
	</script>
	");
    }
} else { // mod 검색
    echo ("
    <script>
    alert('잘못된 접근입니다.');
    history.go(-1)
    </script>
    ");
}
?>