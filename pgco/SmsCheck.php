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

if($AccountCode == 1){ // 신용카드 시작
echo ("<meta http-equiv='Refresh' content='0; URL=StoreSend.php?StoreCode=$StoreCode&OrderCode=$OrderCode&AccountCode=$AccountCode&Amount=$Amount&AllPoint=$AllPoint&OrderName=$OrderName&BrandName=$BrandName&OrderHTel=$OrderHTel&Email=$Email&OrderAddr=$OrderAddr&DbName=$DbName&SuccessPage=$SuccessPage&ErrorPage=$ErrorPage'>");
}else{ // 신용카드 끝
?>
<HTML>
<HEAD>
<title>PG사 - 전자결제 시스템</title>
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
<?php if($AccountCode == 1){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; 신용카드결제 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 신용카드결제</td></tr>
<?php } if($AccountCode == 2){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; 계좌이체 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 계좌이체</td></tr>
<?php } if($AccountCode == 3){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; 휴대폰결제 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 휴대폰결제</td></tr>
<?php } if($AccountCode == 4){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; ARS결제 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; ARS결제</td></tr>
<?php } if($AccountCode == 5){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; 폰빌결제 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 폰빌결제</td></tr>
<?php } if($AccountCode == 6){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; 무통장결제 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 무통장결제</td></tr>
<?php } ?>
</table>

<td width="330" valign="top">
<p>&nbsp;</p>

<form name=Form1 method="post" action="StoreSend.php?StoreCode=<?php echo $StoreCode?>&OrderCode=<?php echo $OrderCode?>&AccountCode=<?php echo $AccountCode?>&Amount=<?php echo $Amount?>&AllPoint=<?php echo $AllPoint?>&OrderName=<?php echo $OrderName?>&BrandName=<?php echo $BrandName?>&OrderHTel=<?php echo $OrderHTel?>&Email=<?php echo $Email?>&OrderAddr=<?php echo $OrderAddr?>&DbName=<?php echo $DbName?>&SuccessPage=<?php echo $SuccessPage; ?>&ErrorPage=<?php echo $ErrorPage?>" onSubmit="return Form1_check(this);">

<table align="center" border="0" cellspacing="0" cellpadding="0" width="330" bgcolor="white">
<tr>
<td width="10">&nbsp;</td>
<td width="320">
<p>&nbsp;</p>
<?php
echo "<b>주문번호 : ".$OrderCode."</b><p>";
echo "<b>주문자 : ".$OrderName."</b><br>";
echo "<b>상품명 : ".$BrandName."</b><br>";
echo "<b>결제금액 : ".number_format($Amount)."원</b><p>";

if($AccountCode == 3){ //휴대폰 시작
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function Form1_check(f)
{
if (f.smsnum.value == '')
   { alert('인증번호를 입력하세요.'); f.smsnum.focus(); return false; }
}
// -->
</SCRIPT>
휴대폰에 도착한 인증번호를 입력하세요.<p>
인증번호 
<input type="text" style="width:120px" maxlength="12" name="smsnum" value="">
<p><font color=blue>
통신사의 사정에 따라 전송시간이 다소 지연될 수 있습니다.
</font><p>
<input type="submit" value=" 다음 ▶ " style="height:30;">
</form>
<script>
document.Form1.smsnum.focus();
</script>
<?php
} // 휴대폰 결제 끝
?>
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
<?php } ?>
