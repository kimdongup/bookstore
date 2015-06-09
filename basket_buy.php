<?php
include "top.php";
include "main_left.php";
include "config/config.php";
//unset($_SESSION['ordernum']);
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['mod2'])){$mod2 ="";} else {$mod2 = $_REQUEST['mod2'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}
if(!isset($_REQUEST['delid'])){$delid ="";} else {$delid = $_REQUEST['delid'];}
if(!isset($_REQUEST['QuantityNum'])){$QuantityNum ="";} else {$QuantityNum = $_REQUEST['QuantityNum'];}
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
if(!isset($_SESSION['ordernum'])) {
    $timenum=mktime();
    $ipnum = strtolower(substr(strrchr($_SERVER['REMOTE_ADDR'],"."), 1));
    $ordernum=$timenum.$ipnum;
    $_SESSION['ordernum']=$ordernum; 
} else { $ordernum=$_SESSION['ordernum'];}

$maniapoint=0;
$Pamount = 0; $Bamount=0;$Mamount =0;
$TransCost=0;

if($mod=="alldel"){ // 바구니 전체 삭제
    $queryAD=mysqli_query($link,"delete from basket where ordernum='$ordernum' ");
    unset($_SESSION['ordernum']);
}else if($mod=="recorddel"){ // 상품 개별 삭제
    $queryAD=mysqli_query($link,"delete from basket where ordernum='$ordernum' && id='$delid' ");
}

if($mod=="basket"){ // 장바구니 담기 페이지(middle_group.php,goodsview.php,big_img.php)에서만 적용 시작
	if($mod2 == "manyorder"){ // 관련서적, 이분야 베스트셀러 주문(goodsview.php) 시작
		for($i=0;$i<count($check);$i++) { // 관련서적, 이분야 베스트셀러 전체선택, 개별선택 처리
			$querygoods=mysqli_query($link,"select * from goods where id=$check[$i]");
			$rowgoods=mysqli_fetch_array($querygoods);
			if($rowgoods['mania'] == 1){
			$maniacash=$rowgoods['price'];
			$maniacash2=$maniacash*0.1;
			$maniapoint=ceil($maniacash2/10)*10;
			}
			$querybasket=mysqli_num_rows(mysqli_query($link,"select id from basket where goodsid='$check[$i]' && ordernum='$ordernum' "));

			if($querybasket < 1){
                            $insert = "insert into basket values ".	"('','$check[$i]','$ordernum','$my_member_id','$rowgoods[name]','$rowgoods[fixprice]',".
                            "'$rowgoods[price]','$rowgoods[point]','$maniapoint','1','$rowgoods[dday]','$rowgoods[dcost]')";
                            $result=mysqli_query($link,$insert);
			} else {
                            $update = "update basket set quantity='1' where goodsid='$check[$i]' && ordernum='$ordernum' ";
                            $result=mysqli_query($link,$update);
			}
		} // for문 end
	} else { // 관련서적, 이분야 베스트셀러 주문 끝 그 외 주문 시작
		$querygoods=mysqli_query($link,"select * from goods where id=$id");
		$rowgoods=mysqli_fetch_array($querygoods);
		if($rowgoods['mania'] == 1){
			$maniacash=$rowgoods['price'];
			$maniacash2=$maniacash*0.1;
			$maniapoint=ceil($maniacash2/10)*10;
		}
		$querybasket=mysqli_num_rows(mysqli_query($link,"select id from basket where goodsid='$id' && ordernum='$ordernum' "));

		if($querybasket < 1){
			$insert = "insert into basket values ".	"('','$id','$ordernum','$my_member_id','$rowgoods[name]','$rowgoods[fixprice]',".
			"'$rowgoods[price]','$rowgoods[point]','$maniapoint','$QuantityNum','$rowgoods[dday]','$rowgoods[dcost]')";
			$result=mysqli_query($link,$insert);
		} else {
			$update = "update basket set quantity='$QuantityNum' where goodsid='$id' && ordernum='$ordernum' ";
			$result=mysqli_query($link,$update);
		}
	} // 관련서적, 이분야 베스트셀러 외 주문 끝
} // 장담구니 담기 페이지에서만 적용 끝
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="190" height="30" align="center">상품명</td>
<td width="70" height="30" align="right">| 예상출고일</td>
<td width="70" height="30" align="right">| &nbsp; &nbsp; &nbsp; 정가</td>
<td width="100" height="30" align="right">| 판매가(할인율)</td>
<td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp;수 량&nbsp; &nbsp; &nbsp;</td>
<td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;합계</td>
<td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME'] ?>?mod=alldel">전체 삭제</a></td>
</tr>
<tr><td colspan="7" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="7" height="5"></td></tr>
<?php
$querybasket=mysqli_query($link,"select * from basket where ordernum='$ordernum' ");
$countall=mysqli_num_rows($querybasket);
if($countall < 1){
echo "<tr><td colspan=7 height=5>장바구니에 담긴 상품이 없습니다.</td></tr>";
} else {
while($rowbasket=mysqli_fetch_array($querybasket))
{
?>
<tr>
<td width="190" height="30"><?php echo $rowbasket['name']; ?></td>
<td width="70" height="30" align="right"><?php echo $rowbasket['dday'] ?>일 이내</td>
<td width="70" height="30" align="right"><s><?php echo number_format($rowbasket['fixprice']); ?>원</s></td>
<td width="100" height="30" align="right">
<font color="#DF5B0B">
<?php
$dcvalue = ($rowbasket['fixprice'] - $rowbasket['price']);
$dcrate=round(($dcvalue/$rowbasket['fixprice'])*100) ;
echo number_format($rowbasket['price']); 
?>원(<?php echo $dcrate; ?>%)</font>
</td>
<td width="100" height="30" align="right"><b><?php echo $rowbasket['quantity']; ?></b>
<span style=font-size:9pt;><a href="goodsview.php?id=<?php echo $rowbasket['goodsid']?>">[수량수정]</a></span></td>
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
<td width="100" height="30" align="right">
    <a href="goodsview.php?id=<?php echo $rowbasket['goodsid']?>">수정</a> 
    <a href="basket_buy.php?delid= <?php echo $rowbasket['id']?>&mod=recorddel">삭제</a></td>
</tr>
<tr><td colspan="7" height="1" bgcolor="#CCCCCC"></td></tr>
<?php
}
?>

<tr><td colspan="7" height="5"></td></tr>

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
<tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
<tr><td align="right" width="350" height="25">
<font color="#DF5B0B">지불 총 금액 :</font> 
</td>
<td align="right" width="80">
<b><font color="#DF5B0B">
<?php echo number_format($Bamount+$TransCost); ?> 
 원
</td>
<td align="right" width="200">
<font color="#009900">총 적립금 :</font>
</td>
<td align="right" width="80">
<b><font color="#009900">
<?php
echo number_format($Pamount+$SpecialAll+$Mamount);
echo " 원</font>";
?>
</td>
</tr>
<tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
<tr><td align="center" colspan="7" height="30">

<table width="685" border="0" cellpadding="0" cellspacing="0">
<tr><td align="right" width="270">
<span style=font-size:5pt;>&nbsp;</span><br>
<form name=OrderSend action="order_write.php?mod=memberYes" method="post">
<input type="submit" value=" 회원주문 " style="height:30;">
</form></td>
<td width="10">&nbsp;</td>
<td align="center" width="120">
<span style=font-size:5pt;>&nbsp;</span><br>
<form name=OrderSend action="order_write.php?mod=memberNo" method="post">
<input type="submit" value=" 비회원주문 " style="height:30;"> 
</form></td>
<td width="10">&nbsp;</td>
<td width="270" valign="middle">
<span style=font-size:9pt;>&nbsp;</span><br>
<a href="index.php"><img src="image/shopgo.jpg" border="0"></a>
</td>
</tr></table>
<?php }  // 등록 된 상품 조사 ?>
</td></tr></table>
<p>
<?php
include "bottom.php";     // 하단 구성
?>