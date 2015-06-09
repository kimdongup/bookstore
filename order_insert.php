<?php
include "top.php";
include "main_left.php";

if(!isset($_REQUEST['mod2'])){$mod2  ="";} else {$mod2 = $_REQUEST['mod2'];} 
if(!isset($_REQUEST['pwd'])){$pwd  ="";} else {$pwd = $_REQUEST['pwd'];} 
if(!isset($_SESSION['ordernum'])){$ordernum ="";} else {$ordernum = $_SESSION['ordernum'];}
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['passwd'])){$passwd ="";} else {$passwd = $_SESSION['passwd'];}
$ordername = $_REQUEST['ordername'];
$AllCash = $_REQUEST['AllCash'];
$AllPoint = $_REQUEST['AllPoint'];
$tel1 = $_REQUEST['tel1'];
$tel2 = $_REQUEST['tel2'];
$tel3 = $_REQUEST['tel3'];
$htel1 = $_REQUEST['htel1'];
$htel2 = $_REQUEST['htel2'];
$htel3 = $_REQUEST['htel3'];
$post1 = $_REQUEST['post1'];
$post2 = $_REQUEST['post2'];
$address = $_REQUEST['address'];
$post_num = $_REQUEST['post_num'];
$email = $_REQUEST['email'];
$bname = $_REQUEST['bname'];
$btel1 = $_REQUEST['btel1'];
$btel2 = $_REQUEST['btel2'];
$btel3 = $_REQUEST['btel3'];
$bhtel1 = $_REQUEST['bhtel1'];
$bhtel2 = $_REQUEST['bhtel2'];
$bhtel3 = $_REQUEST['bhtel3'];
$bpost1 = $_REQUEST['bpost1'];
$bpost2 = $_REQUEST['bpost2'];
$baddress = $_REQUEST['baddress'];
$bpost_num = $_REQUEST['bpost_num'];
$bemail = $_REQUEST['bemail'];
$content = $_REQUEST['content'];
$cashcharge = $_REQUEST['cashcharge'];        
if($mod2 == "OrderOk"){
	if($pwd){
		$passwd=$pwd;
	}else{
		$passwd=$my_pass1;
	}
	if(!$passwd){
		echo ("
		<script>
		alert('패스워드가 없습니다.');
		history.go(-1)
		</script>
		");
	}
	$timeno=mktime();

	$querymyorder=mysqli_num_rows(mysqli_query($link,"select id from myorder where ordernum='$ordernum' "));
	if($querymyorder < 1){ // 사용한 장바구니 체크
		$insert = "insert into myorder values ".
			"('','$ordernum','$my_member_id','$ordername','$AllCash','$AllPoint','$passwd',".
			"'$tel1','$tel2','$tel3','$htel1','$htel2','$htel3',".
			"'$post1','$post2','$address','$post_num','$email',".	"'$bname','$btel1','$btel2','$btel3','$bhtel1','$bhtel2','$bhtel3',".
			"'$bpost1','$bpost2','$baddress','$bpost_num','$bemail',".	
			"'$content','0','99','$timeno')"; // 99는 주문만 한 상태, 66은 무통장 주문
		$result=mysqli_query($link,$insert);

		$transday=$timeno+432000; // 기본 배송일자 : 주문시간보다 12시간 이후에 배송함

		$insert = "insert into transport values "."('','$ordernum','','$transday','')";
		$result=mysqli_query($link,$insert);
		// 결제 시작
		if($cashcharge > $AllCash){ // 현재 총액보다 캐쉬충전금이 클 경우 결제 완료처리
			$querymb=mysqli_query($link,"select cash,point from member where member_id='$my_member_id'"); 
			$rowmember=mysqli_fetch_array($querymb);
			$cashcharge=$rowmember['cash'];
			$pointcharge=$rowmember['point'];
			$NewCash=$cashcharge-$AllCash;

			$update = "update member set cash='$NewCash' where member_id='$my_member_id' ";
			$result=mysqli_query($link,$update);
			$update2 = "update myorder set confirmation='8' where ordernum='$ordernum' "; // 주문결제방식 8은 캐쉬충전금사용
			$result2=mysqli_query($link,$update2);
			unset($_SESSION['ordernum'])    ;
			echo ("<meta http-equiv='Refresh' content='0; URL=MyPage.php'>");
		} else {
			echo ("<meta http-equiv='Refresh' content='0; URL=modules/payment.php'>");
		}
		// 결제 끝
		mysqli_close($link);
	} else {
		echo "<p>사용한 장바구니 입니다.<br>";
		echo "마이페이지에서 내가 사용한 장바구니 인지를 확일 할 수 있습니다.<br>";
		echo "다시 쇼핑하기를 원하시면 확인 버튼을 클릭해 주세요.<p>";
		unset($_SESSION['ordernum']);
		echo "<a href=home.php><img src=image/confirmation.gif border=0></a>";
	}
}

include "bottom.php";
?>