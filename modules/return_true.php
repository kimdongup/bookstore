<?php 
include "../config/session_inc.php";
include "../config/lib.php";
?>
<html>
<head><title>결제성공</title></head>
<body leftmargin="10" topmargin="10">
<?php 
if($DbName == "myorder"){ // pg사에서 넘어온 값 처리
$update = "update $DbName set confirmation='$AccountCode' where ordernum='$OrderCode' ";
$result=mysqli_query($update);

}else if($DbName == "member"){ // 캐쉬충전
$querymb=mysqli_query("select cash from member where id='$OrderCode'");
$rowmember=mysqli_fetch_array($querymb);
$recordcash=$rowmember['cash']+$Amount;
$cashtime=mktime();
$update = "update $DbName set cash='$recordcash',cashday='$cashtime' where id='$OrderCode' ";
$result=mysqli_query($update);	

}
$_SESSION['ordernum']="";
mysqli_close();
?>
<meta http-equiv='Refresh' content='0; URL=../MyPage.php'>
</body>
</html>