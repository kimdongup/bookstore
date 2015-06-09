<?php
include "../config/session_inc.php";
include "../config/lib.php";

$StoreCode  = $_REQUEST['StoreCode'];
$OrderCode = $_REQUEST['OrderCode'];
$AccountCode = $_REQUEST['AccountCode'];
$Amount = $_REQUEST['Amount'];
$AllPoint = $_REQUEST['AllPoint'];
$OrderName = $_REQUEST['OrderName'];
$BrandName = $_REQUEST['BrandName'];
$OrderHTel = $_REQUEST['OrderHTel'];
$Email = $_REQUEST['Email'];
$OrderAddr = $_REQUEST['OrderAddr'];
$DbName = $_REQUEST['DbName'];
$SuccessPage = $_REQUEST['SuccessPage'];
$ErrorPage = $_REQUEST['ErrorPage'];      
?>
<HTML>
<HEAD>
<title>전자결제 시스템</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="온라인서점">
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#99CCFF">
<table align="center" border="0" cellspacing="0" cellpadding="0" width="450">
<tr>
<td width="10">&nbsp;</td>
<td width="110" valign="top">
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="109">
<?php
if($AccountCode == 66){
?>
<tr><td width="110" height="25" bgcolor="white"><b>&nbsp; 무통장결제 ☞</b></td></tr>
<?php } ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 카드결제</td></tr>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 계좌이체</td></tr>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 휴대폰결제</td></tr>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; ARS결제</td></tr>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 폰빌결제</td>
</table>

<td width="330" valign="top">
<p>&nbsp;</p>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="330" bgcolor="white">
<tr>
<td width="10">&nbsp;</td>
<td width="320">
<p>&nbsp;</p>
<?php
echo "<b>주문번호 : ".$OrderCode."</b><p>";
echo "<b>결제금액 : ".number_format($Amount)."원</b><p>";
if($AccountCode == 66){
    echo $BankNum[0]."<br>";
    echo $BankNum[1]."<br>";
    echo $BankNum[2]."<p>";
    echo "<font color=blue>무통장으로 입금하시고<br>전화로 주문번호(<font color=red>".$OrderCode."</font>)를<br> 알려 주시면 더욱 빨리 처리됩니다.<p>전화 : 02-000-2222</font>";
    $update = "update $DbName set confirmation='66' where ordernum='$OrderCode' ";
    $result=mysqli_query($update); // 66은 무통장, 99는 주문만하고 결제를 하지 않음, 1은 신용카드...
    unset($_SESSION['ordernum']);
} else {
    echo ("<meta http-equiv='Refresh' content='0; URL=../pgco/PgPay.php?StoreCode=$StoreCode&OrderCode=$OrderCode&AccountCode=$AccountCode&Amount=$Amount&AllPoint=$AllPoint&OrderName=$OrderName&BrandName=$BrandName&OrderHTel=$OrderHTel&Email=$Email&OrderAddr=$OrderAddr&DbName=$DbName&SuccessPage=$SuccessPage&ErrorPage=$ErrorPage'>");
}
?><form>
<input type=image src="../image/close.gif" border=0 onclick="self.close();" name="Button"> 
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</td></tr></table>
</td></tr></table>
</body>
</html>