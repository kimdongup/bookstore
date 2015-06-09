<?php
include "../config/session_inc.php";
include "../config/lib.php";
$mod  = $_REQUEST['mod'];
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
<?php
if($mod){ // 확인 버튼 없이 즉시 상점으로 보내짐
?>
<SCRIPT LANGUAGE='javascript'>
<!--
	opener.document.location = '<?php echo $SuccessPage?>?StoreCode=<?php echo $StoreCode?>&OrderCode=<?php echo $OrderCode?>&AccountCode=<?php echo $AccountCode?>&Amount=<?php echo $Amount?>&AllPoint=<?php echo $AllPoint?>&OrderName=<?php echo $OrderName?>&BrandName=<?php echo $BrandName?>&OrderHTel=<?php echo $OrderHTel?>&Email=<?php echo $Email?>&OrderAddr=<?php echo $OrderAddr?>&DbName=<?php echo $DbName?>';
	self.close();
//-->
</SCRIPT>
<?php
}else{
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function SuccessOk() { // 확인 버튼 클릭시 보내짐
	opener.document.location = '<?php echo $SuccessPage?>?StoreCode=<?php echo $StoreCode?>&OrderCode=<?php echo $OrderCode?>&AccountCode=<?php echo $AccountCode?>&Amount=<?php echo $Amount?>&AllPoint=<?php echo $AllPoint?>&OrderName=<?php echo $OrderName?>&BrandName=<?php echo $BrandName?>&OrderHTel=<?php echo $OrderHTel?>&Email=<?php echo $Email?>&OrderAddr=<?php echo $OrderAddr?>&DbName=<?php echo $DbName?>';
	self.close();
}
//-->
</SCRIPT>
<?php } ?>
</head>
<body leftmargin="10" topmargin="10" bgcolor="#99CCFF">
<p>&nbsp;</p>
결제가 성공적으로 완료 되었습니다.<br>
아래의 확인 버튼을 클릭해 주십시오.
<p>&nbsp;</p>
<p>&nbsp;</p>
<a href="javascript:SuccessOk();"><img src="../image/confirmation.gif" border="0"></a>


</body>
</html>