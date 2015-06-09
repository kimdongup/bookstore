<?php
include "top.php";
$ordernum = $_SESSION['ordernum'];
$Pamount=0;;$specialpoint=0;$Bamount=0;$delivery_limit=0;$Mamount=0;$TransCost=0;
?>
<script language="javascript">
<!--
function PgCoGo(frm) {	
    	location.href="../loading.php";
	//window.open(frm.action, frm.target, "toolbar=no,scrollbars=no,resizable=yes,status=yes,location=no,width=450,height=550");
        var gsWin = window.open('null.php','payviewer',"toolbar=no,scrollbars=no,resizable=yes,status=yes,location=no,width=450,height=550");
        document.Form1.action = 'null.php';
        document.Form1.target ="payviewer";
        document.Form1.method ="post";
        document.Form1.submit();
}
// -->
</script>
<span style=font-size:5pt;>&nbsp;</span><br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
	<td>■ &nbsp;<b>결제 정보</b></td>
	<br><span style=font-size:5pt;>&nbsp;</span>
</tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr><td colspan="6" height="5"></td></tr>
<tr><td colspan="6" height="2" bgcolor="#6699FF"></td></tr>
<tr>
<td width="230" height="30" align="center">상품명</td>
<td width="100" height="30" align="right">| 예상출고일</td>
<td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; 정가</td>
<td width="100" height="30" align="right">| 판매가(할인율)</td>
<td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp;수 량&nbsp; &nbsp; &nbsp;</td>
<td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;합계</td>
</tr>
<tr><td colspan="6" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="6" height="5"></td></tr>
<?php
$querybasket=mysqli_query($link,"select * from basket where ordernum='$ordernum' ");
$countall=mysqli_num_rows($querybasket);
if($countall < 1){
echo "<tr><td colspan=7 height=5>장바구니에 담긴 상품이 없습니다.</td></tr>";
} else {
while($rowbasket=mysqli_fetch_array($querybasket))
{
$BrandName=$rowbasket['name'];
?>
<tr>
<td width="230" height="30"><?php echo $BrandName; ?></td>
<td width="100" height="30" align="right"><?php echo $rowbasket['dday'] ?>일 이내</td>
<td width="100" height="30" align="right"><s><?php echo number_format($rowbasket['fixprice']); ?>원</s></td>
<td width="100" height="30" align="right">
<font color="#DF5B0B">
<?php
$dcvalue = ($rowbasket['fixprice'] - $rowbasket['price']);
$dcrate=round(($dcvalue/$rowbasket['fixprice'])*100) ;
echo number_format($rowbasket['price']); 
?>원(<?php echo $dcrate; ?>%)</font>
</td>
<td width="100" height="30" align="right"><b><?php echo $rowbasket['quantity']; ?></b>
</td>
<td width="100" height="30" align="right">
<font color="#DF5B0B">
<?php
$recordsum=$rowbasket['price'] * $rowbasket['quantity'];
$RerPosum=$rowbasket['point'] * $rowbasket['quantity'];
$ManiaPosum=$rowbasket['maniapoint'] * $rowbasket['quantity'];
$basketsum[]=$recordsum;
$pointsum[]=$RerPosum;
$maniasum[]=$ManiaPosum;
echo number_format($recordsum);

?>
원</font>
</td>
</tr>
<tr><td colspan="6" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
?>
<tr><td colspan="6" height="5"></td></tr>
</table>
<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td align="right" width="350" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
주문 상품 수  : </td>
<td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo $countall; ?> 건
</td>
<td align="right" width="200" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
기본 적립금 :
</td>
<td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
for($p=0; $p<$countall; $p++){
	$Pamount+=$pointsum[$p];
}
echo number_format($Pamount);
echo " 원";
?>
</td>
</tr>
<tr><td align="right" width="350" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
상품 총 금액 : </td>
<td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
for($b=0; $b<$countall; $b++){
	$Bamount+=$basketsum[$b];
}
echo number_format($Bamount);
echo " 원";
?>
</td>
<td align="right" width="200" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
특별 적립금 :
</td>
<td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
$SpecialAll=$Bamount*$specialpoint; // link_config.php 파일에서 설정
$SpecialAll=round($SpecialAll,-1); // 5 이상은 반올림
echo number_format($SpecialAll);
?> 원  
</td>
</tr>
<tr><td align="right" width="350" height="25">
배 송 비 : </td>
<td align="right" width="80">
<?php
$queryTrans=mysqli_num_rows(mysqli_query($link,"select id from basket where dcost='1' && ordernum='$ordernum' "));
if($queryTrans > 0){ // 유료배송이 하나라도 있다면 유료배송 적용함

if($Bamount < $delivery_limit){
$TransCost=$delivery;
}else{
$TransCost=0;
}
}
echo number_format($TransCost);
?> 원
</td>
<td align="right" width="200">
매니아 적립금 :
</td>
<td align="right" width="80">
<?php
for($m=0; $m<$countall; $m++){
	$Mamount+=$maniasum[$m];
}
echo number_format($Mamount);
echo " 원";
?>
</td>
</tr>
<tr><td colspan="6" height="1" bgcolor="#6699FF"></td></tr>
<tr><td align="right" width="350" height="25">
<font color="#DF5B0B">결제 금액 :</font> 
</td>
<td align="right" width="80">
<b><font color="#DF5B0B">
<?php 
$Allmoney=$Bamount+$TransCost;

echo number_format($Allmoney); ?> 
 원
</td>
<td align="right" width="200">
<font color="#009900">총 적립금 :</font>
</td>
<td align="right" width="80">
<b><font color="#009900">
<?php
$AllPoint=$Pamount+$SpecialAll+$Mamount;
echo number_format($AllPoint);
echo " 원</font>";
?>
</td>
</tr>
<tr><td colspan="6" height="1" bgcolor="#6699FF"></td></tr>
<tr><td align="center" colspan="6" height="30">
</td></tr></table>
<?php
}  // 등록 된 상품 조사, 주문목록 끝 

$queryorder=mysqli_query($link,"select * from myorder where ordernum='$ordernum' ");
$roworder=mysqli_fetch_array($queryorder);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
	<td>■ &nbsp;<b>결제자(주문자) 정보</b></td>
	<br><span style=font-size:5pt;>&nbsp;</span>
</tr>
</table>

<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
<tr>
	<td width="730" colspan="2" class="bgc_bar" height="2"></td>
</tr>
<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
* 성명
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">

<?php echo $roworder['ordername']; ?>
	</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
* 전화
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <?php 
	$OrderTel=$roworder['tel1']."-".$roworder['tel2']."-".$roworder['tel3'];
	echo $OrderTel; 
	?>
	</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
* 휴대폰
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <?php 
	$OrderHTel=$roworder['htel1']."-".$roworder['htel2']."-".$roworder['htel3'];
	echo $OrderHTel; 
	?>
	</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
* E-mail
</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<?php echo $roworder['email']; ?>
	</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
* 주소	
</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<?php 
	$OrderAddr=$roworder['post1']."-".$roworder['post2']." &nbsp; ".$roworder['address']." ".$roworder['post_num'];
	echo $OrderAddr; 
	?>
	</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
<p>

<form name="Form1" action="null.php" target="popup"  >
<table align="center" border="1" cellspacing="0" cellpadding="1" width="730" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="730" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 결제유형 선택</b>(결제유형을 선택하세요)</p>
        </td>
    </tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
  <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
  결제유형
  </td>
<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
<span style="font-size:3pt;">&nbsp;</span><br>
<input type="radio" name="AccountCode" value="1">신용카드
<input type="radio" name="AccountCode" value="2">계좌이체
<input type="radio" name="AccountCode" value="3" checked>휴대폰
<input type="radio" name="AccountCode" value="4">ARS
<input type="radio" name="AccountCode" value="5">폰빌
<input type="radio" name="AccountCode" value="66">무통장입금
<br><span style="font-size:1pt;">&nbsp;</span>    
</td>
</tr>
<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
<p>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="155">&nbsp;
</td>
<td width="675" bgcolor="#fcfcfc" style="padding-left:10px">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="javascript:PgCoGo(document.Form1);"><img src="../image/account30.gif" border="0"></a>
<input type="submit" value="결제하기">
</td>
</tr>
</table>
<p>&nbsp;</p>
<input type="hidden" name="StoreCode" value="20060707120101">
<input type="hidden" name="OrderCode" value="<?php echo $ordernum; ?>">
<input type="hidden" name="Amount"     value="<?php echo $Allmoney; ?>">
<input type="hidden" name="AllPoint"     value="<?php echo $AllPoint; ?>">
<input type="hidden" name="OrderName"  value="<?php echo $roworder['ordername']; ?>">
<input type="hidden" name="BrandName"  value="<?php echo $BrandName; ?>">
<input type="hidden" name="OrderHTel" value="<?php echo $OrderHTel; ?>">
<input type="hidden" name="Email"      value="<?php echo $rowbasket['email']; ?>">
<input type="hidden" name="OrderAddr"  value="<?php echo $OrderAddr; ?>">
<input type="hidden" name="DbName"  value="myorder">
<input type="hidden" name="SuccessPage" value="../modules/return_true.php">
<input type="hidden" name="ErrorPage"  value="../modules/return_false.php">
</form>
<?php
include "bottom.php";
?>