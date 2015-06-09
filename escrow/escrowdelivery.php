<script language = 'javascript'>
<!--
function openWindow()
{
    window.open("","Window","width=330, height=430, scrollbars=no,status=no, resizable=no,menubar=no");
document.mainForm.action = "데이콤에서 부여하는 주소";
    document.mainForm.target = "Window";
    document.mainForm.submit();
}
//-->
</script>

<?php
$result=mysql_query("select * from 주문테이블 where ordernum='$oid' ");
$row=mysql_fetch_array($result);

$Eyear = date("Y");
$Emonth = date("m");
$Eday = date("d");
$Ehour = date("H");
$Eminute = date("i");
$Edlvdate = $Eyear.$Emonth.$Eday.$Ehour.$Eminute;

$mid = "상점아이디";						// 상점ID
$oid = $oid;						// 주문번호
$dlvtype = "03";				// 등록내용구분
$dlvdate = $Edlvdate;				// 발송일자
$dlvcompcode = "HJ";		// 배송회사코드
$dlvno = $dlvno;					// 운송장번호
$dlvworker = "배송자";			// 배송자명
$dlvworkertel = "전화";		// 배송자전화번호
$productid = $row[id];			// 상품ID

$mertkey = "데이콤에서 부여하는 키 값";	

$hashdata = md5($mid.$oid.$dlvdate.$dlvcompcode.$dlvno.$mertkey);
?>
<p>&nbsp;</p>
<table align="center" border="0" cellpadding="6" cellspacing="1" width="450" height="300"  bgcolor="gray">
  <tr>
     <td width="400" align="center" bgcolor="#f4f4f4">
	<font color=navy><b>주문 번호 : <? echo $oid; ?></b></font><br>
	<font color=navy><b>운송장번호 : <? echo $dlvno; ?></b></font><br>
	<font color=navy><b>배송일자 : <? echo $Edlvdate; ?></b></font><br>

<form name="mainForm" method="POST" action="">

<!-- 결제를 위한 필수 hidden정보 -->
<input type="hidden" name="mid" value="<?php=$mid?>">
<input type="hidden" name="oid" value="<?php=$oid?>">
<input type="hidden" name="dlvtype" value="<?php=$dlvtype?>">
<input type="hidden" name="dlvdate" value="<?php=$Edlvdate?>">
<input type="hidden" name="dlvcompcode" value="<?php=$dlvcompcode?>">
<input type="hidden" name="dlvno" value="<?php=$dlvno?>">
<input type="hidden" name="dlvworker" value="<?php=$dlvworker?>">
<input type="hidden" name="dlvworkertel" value="<?php=$dlvworkertel?>">
<input type="hidden" name="hashdata" value="<?php=$hashdata?>">
<input type="hidden" name="productid" value="<?php=$productid?>">

<input type="submit" value="배송결과송신" onclick="javascript:openWindow()">
</form>
     </td>
   </tr>
</table>