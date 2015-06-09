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
<?php } if($AccountCode == 66){ ?>
<tr><td width="110" height="25" bgcolor="white">&nbsp; 무통장결제 ☞</td></tr>
<?php }else{ ?>
<tr><td width="110" height="25" bgcolor="#CCCCFF">&nbsp; 무통장결제</td></tr>
<?php } ?>
</table>

<td width="330" valign="top">
<p>&nbsp;</p>

<form name=Form1 method="post" action="SmsCheck.php?StoreCode=<?php echo $StoreCode?>&OrderCode=<?php echo $OrderCode?>&AccountCode=<?php echo $AccountCode?>&Amount=<?php echo $Amount?>&AllPoint=<?php echo $AllPoint?>&OrderName=<?php echo $OrderName?>&BrandName=<?php echo $BrandName?>&OrderHTel=<?php echo $OrderHTel?>&Email=<?php echo $Email?>&OrderAddr=<?php echo $OrderAddr?>&DbName=<?php echo $DbName?>&SuccessPage=<?php echo $SuccessPage; ?>&ErrorPage=<?php echo $ErrorPage?>" onSubmit="return Form1_check(this);">

<table align="center" border="0" cellspacing="0" cellpadding="0" width="330" bgcolor="white">
<tr>
<td width="10">&nbsp;</td>
<td width="320">
<br><span style="font-size:8pt;">&nbsp;</span><br> 
<?php
echo "<b>주문번호 : ".$OrderCode."</b><p>";
echo "<b>주문자 : ".$OrderName."</b><br>";
echo "<b>상품명 : ".$BrandName."</b><br>";
echo "<b>결제금액 : ".number_format($Amount)."원</b>";

if($AccountCode == 1){ // 신용카드결제 시작
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function Form1_check(f)
{
if (f.CardNum1.value == '')
   { alert('카드번호를 입력하세요.'); f.CardNum1.focus(); return false; }
if (f.CardNum2.value == '')
   { alert('카드번호를 입력하세요.'); f.CardNum2.focus(); return false; }
if (f.CardNum3.value == '')
   { alert('카드번호를 입력하세요.'); f.CardNum3.focus(); return false; }
if (f.CardNum4.value == '')
   { alert('카드번호를 입력하세요.'); f.CardNum4.focus(); return false; }
if (f.VMonth.value == '')
   { alert('유효기간 월을 선택하세요.'); f.VMonth.focus(); return false; }
if (f.VYear.value == '')
   { alert('유효기간 년을 선택하세요.'); f.VYear.focus(); return false; }
if (f.jumin2.value.length < 7)
   { alert('주민번호 뒷자리를 입력하세요.'); f.jumin2.focus(); return false; }
if (f.CardPwd.value.length < 2)
   { alert('비밀번호 2자리를 입력하세요.'); f.CardPwd.focus(); return false; }
}
// -->
</SCRIPT>
<br><span style="font-size:8pt;">&nbsp;</span><br> 
국민,BC카드의 ISP 결제를 하실 경우는 [ISP]<br>를 클릭하시기 바립니다.<br>
안심클릭 결제를 하실 경우는 [안심클릭]<br>클릭하시기 바랍니다.
<br><span style="font-size:8pt;">&nbsp;</span><br> 

<b>카드종류</b> : <br>
<input type="radio" name="CardKind" value="1" checked>국내발행 개인 신용카드<br>
<input type="radio" name="CardKind" value="2">해외발행 개인신용카드<br>
<input type="radio" name="CardKind" value="2">법인카드
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<b>카드번호</b> : 
<input type="text" style="width:40px" maxlength="4" name="CardNum1" value=""> -
<input type="text" style="width:40px" maxlength="4" name="CardNum2" value=""> -
<input type="text" style="width:40px" maxlength="4" name="CardNum3" value=""> -
<input type="text" style="width:40px" maxlength="4" name="CardNum4" value="">
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<b>유효기간</b> : 
<select name=VMonth>
<option value="">월</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
<select name=VYear>
<option value="">년</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select>
<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 카드상에(월/년)으로 표기됨
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<b>할부기간</b> : 
<select name=InsMonth>
<option value="99">일시불</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="24">24</option>
<option value="36">36</option>
<option value="48">48</option>
<option value="52">52</option>
</select>
<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (법인카드,해외카드는 할부가 되지 않습니다.)
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<b>주민등록번호</b> : 
XXXXXX - <input type="password" name="jumin2" value="" maxlength="7" style="width:60px">
<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (주민번호 뒷자리 7자리를 입력하세요.)	
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<b>비밀번호</b> : 
<input type="password" name="CardPwd" value="" maxlength="2" style="width:20px">XX
<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (신용카드 비밀번호 앞 2자리를 입력 하세요.)
<br><span style="font-size:8pt;">&nbsp;</span><br> 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="submit" value=" 다음 ▶ " style="height:30;">
</form>

<?php
} else if($AccountCode == 3){ // 신용카드결제 끝,휴대폰 결제 시작
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function Form1_check(f)
{
if (f.htel1.value == '')
   { alert('휴대폰 번호를 입력하세요.'); f.htel1.focus(); return false; }
if (f.htel2.value == '')
   { alert('휴대폰 번호를 입력하세요.'); f.htel2.focus(); return false; }
if (f.htel3.value == '')
   { alert('휴대폰 번호를 입력하세요.'); f.htel3.focus(); return false; }
if (f.jumin1.value.length < 6)
   { alert('주민번호 앞자리를 입력하세요.'); f.jumin1.focus(); return false; }
if (f.jumin2.value.length < 7)
   { alert('주민번호 뒷자리를 입력하세요.'); f.jumin2.focus(); return false; }
}
// -->
</SCRIPT>
<br>
<br>
결제하실 핸드폰 정보를 입력해 주세요.<p>
핸드폰 번호 
<input type="text" style="width:40px" maxlength="4" name="htel1" value=""> -
<input type="text" style="width:40px" maxlength="4" name="htel2" value=""> -
<input type="text" style="width:40px" maxlength="4" name="htel3" value="">
<p>
결제 통신사
<input type="radio" name="comco" value="skt" checked>SKT&nbsp;
<input type="radio" name="comco" value="ktf">KTF&nbsp;
<input type="radio" name="comco" value="lgt">LGT
<p>
주민등록번호
<input type="text" name="jumin1" value="" maxlength="6" style="width:50px">- 
<input type="password" name="jumin2" value="" maxlength="7" style="width:60px">	
<p><font color=blue>
SMS(휴대폰) 메시지가 도착할 때까지 기다려 주십시오.<br>
통신사의 사정에 따라 전송시간이 다소 지연될 수 있습니다.
</font><p>
<input type="submit" value=" 다음 ▶ " style="height:30;">
</form>
<script>
document.Form1.htel1.focus();
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