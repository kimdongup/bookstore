<script language = 'javascript'>
<!--
function openWindow()
{
    window.open("","Window","width=330, height=430, scrollbars=no,status=no, resizable=no,menubar=no");
document.mainForm.action = "데이콤이 부여한 주소";
    document.mainForm.target = "Window";
    document.mainForm.submit();
}
//-->
</script>

<p>&nbsp;</p>
<table align="center" border="0" cellpadding="6" cellspacing="1" width="450" height="300"  bgcolor="gray">
  <tr>
     <td width="400" align="center" bgcolor="#f4f4f4">
	<font color=navy><b>주문 번호 : <?php echo $user; ?></b></font><br>
	(주문번호를 꼭 메모해 두세요)<p>

     계좌이체 금액: <font color=red><b><?php echo number_format($all_hap); ?></b></font> 원을<br><br>
     <font color=blue>데이콤</font> 지불시스템을 이용하여<br><br>계좌이체 합니다.<br><br>
     계좌이체가 완료 되어야 주문이 성사됩니다<br><br>

	 100,000원 이상은 자동으로 에스크로 구매가 됩니다. <br>
	 따라서 100,000원 이상 구매고객께서는 <br>
	 상품 수령시 반드시 '주문조회 > 구매확인'을 통해<br>
	 "수령확인"을 해 주시기 바랍니다. <br><br>



<form name="mainForm" method="POST" action="">

<!-- 결제를 위한 필수 hidden정보 -->
<input type="hidden" name="mid" value="데이콤에서 부여한 ID">
<input type="hidden" name="oid" value="장바구니번호">
<input type="hidden" name="amount" value="결제총금액">
<input type="hidden" name="ret_url" value="결제성공 리튼URL">
<input type="hidden" name="fail_url" value="결제실패 리튼URL">
<input type="hidden" name="buyer" value="구매자이름">
<INPUT type="hidden" name="mertkey" value="데이콤에서 부여한 mertkey 값">
<?php
if(결제총금액 > 100000){
?>
<input type="hidden" name="escrowflag" value="Y"> 
<?php
}else{
?>
<input type="hidden" name="escrowflag" value="N">
<?php
}
?>
<input type="hidden" name="deliveryinfo" value="쇼핑몰에서 지정한 값"> 

<!-- 통계서비스를 위한 선택적인 hidden정보 -->
<input type="hidden" name="buyerid" value="">
<input type="hidden" name="buyeraddress" value="">
<input type="hidden" name="buyerphone" value="">