<?php 
session_start();
include "../config/lib.php";
if(!isset($_SESSION['mod2'])){$mod2  ="";} else {$mod2  = $_SESSION['mod'];}
if(!isset($_SESSION['ordernum2'])){$ordernum2  ="";} else {$ordernum2  = $_SESSION['ordernum2'];}

?>
<html>
<head><title>포인터 변환</title></head>
<body leftmargin="10" topmargin="10">
<?php 

$ordernum3=$_SESSION[ordernum2];

if($_SESSION[mod2] == "pointcashok2"){ // 페이지
    $queryorder=mysqli_query($link,"select * from myorder where ordernum='$ordernum3'"); 
    $roworder=mysqli_fetch_array($queryorder);
    $querymb=mysqli_query($link,"select point from member where member_id='$roworder[orderer]'"); 
    $rowmember=mysqli_fetch_array($querymb);
    $recordpoint=$rowmember['point']+$roworder['allpoint'];
    $update = "update member set point='$recordpoint',pointok='2' where member_id='$roworder[orderer]' ";
    $result=mysqli_query($link,$update);
    $update2 = "update myorder set allpoint='0' where ordernum='$ordernum3' ";
    $result2=mysqli_query($link,$update2);

    unset($_SESSION['mod2']);
    unset($_SESSION['ordernum2']);
}else{
    unset($_SESSION['mod2']);
    unset($_SESSION['ordernum2']);
    echo "잘 못된 접근입니다.";	
    exit;
}
mysqli_close($link);
?>
<meta http-equiv='Refresh' content='0; URL=OrderCompletion.php'>
</body>
</html>
