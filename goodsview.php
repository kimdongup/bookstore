<?php
include "top.php";
include "main_left.php";
$id=$_REQUEST['id'];
$query=mysqli_query($link,"select * from goods where id=$id");
$rowbody=mysqli_fetch_array($query);
?>
<frame name="main">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="730" height="30">
<?php
$result=mysqli_query($link,"select name,gs2id from goods3 where id='$rowbody[gs3id]' ");
$row=mysqli_fetch_array($result);
$fixid3=$row['gs2id'];
$name3=$row['name'];
$result=mysqli_query($link,"select fixnum,name from goods2 where id='$fixid3' ");
$row=mysqli_fetch_array($result);
$fixid2=$row['fixnum'];
$name2=$row['name'];
$result=mysqli_query($link,"select fixnum,name from goods1 where fixnum='$fixid2' ");
$row=mysqli_fetch_array($result);
$fixid1=$row['fixnum'];
$name1=$row['name'];

echo "<b>".$name1."</b>";
echo ">".$name2;
echo ">".$name3;
?>	
</td>
</tr>
<tr><td colspan="2" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="2" height="5"></td></tr>
</table>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="2" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><b>[도서]<?php echo $rowbody['name']; ?></b><?php if($rowbody['recomend']==1){ echo " [추천도서]"; } ?></td></tr>
<tr><td colspan="2" height="30"><?php echo $rowbody['author']; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>년<?php echo $rowbody['pmonth']; ?>월 <?php echo $rowbody['pday']; ?>일</td></tr>
<tr><td colspan="2" height="25"></td></tr>
<tr>
<td width="230" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
if($rowbody['filename']){
?>
<img src="goodsimg/<?php echo $rowbody['filename']; ?>" border="0">
<?php
}
?>
<br>
<?php
if($rowbody['filename2']){
?>
<form>
<input type="button" Value="큰그림보기" onClick="window.open ('big_img.php?id=<?php echo $id; ?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=700, height=500')">
</form>
<?php
}
?>

</td>
<td width="500" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="500" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100" height="20">
정가
</td>
<td width="400">:
<s><?php echo number_format($rowbody['fixprice']); ?>원</s>
</td>
</tr>
<tr>
<td width="100" height="20">
판매가
</td>
<td width="400">:
<b><font color="#DF5B0B">
<?php
$dcvalue = ($rowbody['fixprice'] - $rowbody['price']);
$dcrate=round(($dcvalue/$rowbody['fixprice'])*100) ;
echo number_format($rowbody['price']); 
?>원</b>(<?php echo $dcrate; ?>%</font>할인)
</td>
</tr>
<tr>
<td width="100" height="20">
포인터
<br><span style=font-size:5pt;>&nbsp;</span>
</td>
<td width="400">:
<font color="#DF5B0B">
<?php 
$povalue = ($rowbody['fixprice'] - $rowbody['point']);
$porate= (int)(($povalue/$rowbody['fixprice'])*100) ;
$pointrate= (100-$porate);
echo number_format($rowbody['point']); ?>원
(<?php echo $pointrate; ?>%</font>지급) 
<?php if($rowbody['mania'] == 1){ echo " + [매니아 추가적립금 지급]"; } ?>
<br><span style=font-size:5pt;>&nbsp;</span>
</td>
</tr>
</table>

</td>
</tr>
<tr>
<td style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<span style=font-size:5pt;>&nbsp;</span><br> 
<?php
if($rowbody['mania'] == 1){
echo "<img src=image/mania.gif border=0> ";	
}

if($rowbody['lowest'] == 1){
echo " <img src=image/lowest.gif border=0>";	
}
?>
</td>
</tr>
<tr>
<td style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<span style=font-size:5pt;>&nbsp;</span><br> 
판매중 | ISBN : <?php echo $rowbody['isbn'] ?> | 페이지 : <?php echo $rowbody['epage'] ?>
</td>
</tr>
<tr>
<td style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<span style=font-size:5pt;>&nbsp;</span><br> 
발송예정일 : <b><?php echo $rowbody['dday'] ?> 일 이내</b>(토요일, 일요일, 공휴일 제외)
</td>
</tr>
<tr>    
<td style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<span style=font-size:5pt;>&nbsp;</span><br> 
<?php 
if($rowbody['dcost'] == 2){ 
	echo "[국내무료배송]";
}
if($rowbody['dcountry'] == 2){
	echo " [해외배송가능]";
} else {
	echo " [해외배송불가]";
}
if($rowbody['lowest'] == 1){
	echo " [최저가격보상제]";	
}
if($rowbody['recomend']==1)
{ echo " [추천도서]"; } 
?>
</td>
</tr>
<tr>
<td>
<span style=font-size:5pt;>&nbsp;</span><br>
<SCRIPT LANGUAGE=javascript>
function QuantityUp(frm)
{
	AheadNum = parseInt(frm.QuantityNum.value);
	frm.QuantityNum.value = AheadNum + 1;
	return;
}
function QuantityDown(frm)
{
	AheadNum = parseInt(frm.QuantityNum.value);
	if(AheadNum > 1)
	{
		frm.QuantityNum.value = AheadNum - 1;
	}else{
		alert("0개 이하는 주문할 수 없습니다.");
	}
	return;
}
function KeyCheck(){
	if ( event.keyCode==8 || event.keyCode==37 || event.keyCode==39 || event.keyCode==46 ||((event.keyCode>=48)&&(event.keyCode<=57)) || ((event.keyCode>=96)&&(event.keyCode<=105))){ 
	return;
	}else{
		alert('숫자,백스페이스,delete,좌우 화살표만 사용가능');
		event.returnValue=false; 
	}
}

function ActionPage(fr) {
    var Fm = document.QuantityFr;

    if(!Fm.QuantityNum.value) {
	alert("수량을 넣으세요.");
	Fm.QuantityNum.focus();
	return; 
	}

    if (fr == "mod1") { 
        Fm.action = "basket_buy.php?mod=basket"
        Fm.submit(); 
    }
    else if(fr == "mod2") { 
	    Fm.action = "MyList.php?mod=mylist"
	    Fm.submit(); 
	} else if(fr == "mod3") { 
	    Fm.action = "instant_buy.php?mod=instant"
	    Fm.submit(); 
	}
}
</SCRIPT>
<form name='QuantityFr' method="post">
<input type="hidden" name="id" value="<?php echo $id?>">
<table cellpadding="0" cellspacing="0">
<tr><td width="100" rowspan="2">
주문수량 : <input type="text" size="5" style="border:solid 1px #CCCCCC; width:30;height:18; text-align:right; " name="QuantityNum" maxlength="5" value="1" onkeyDown="KeyCheck()" style='color:blue;font-weight:bold;'>
</td><td width="20">
<A href="javascript:QuantityUp(document.QuantityFr);"><img src="image/quantityup.gif" border=0></A>
</td></tr>
<tr><td width="20">
<A href="javascript:QuantityDown(document.QuantityFr);"><img src="image/quantitydown.gif" border=0></A>
</td></tr></table>

</td></tr>
<tr><td>
<span style=font-size:5pt;>&nbsp;</span><br>
<img src="image/basket.gif" border="0"  onClick="ActionPage('mod1');" style="cursor:hand"> 
<img src="image/list_buy.gif" border="0"  onClick="ActionPage('mod2');" style="cursor:hand"> 
<img src="image/instant_buy.gif" border="0"  onClick="ActionPage('mod3');" style="cursor:hand"> 
<br> <span style=font-size:5pt;>&nbsp;</span>
</td>
</tr>
</table>
</form>

</td>
</tr>
</table>

<?php
$query2=mysqli_query($link,"select * from goodsct where goodsid='$rowbody[id]'");
$rowbody2=mysqli_fetch_array($query2);
?>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" height="35" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td width="430" height="35">
<b><font color="#DF5B0B">바로가기</font></b> ☞ 
<?php
if($rowbody2['gsintro'] !== "없음"){
	echo "<a href=#1.책소개>책소개</a>"; 
}
if($rowbody2['auintro'] !== "없음"){
	echo " | <a href=#2.저자및역자소개>저자 및 역자 소개</a>"; 
}
if($rowbody2['content'] !== "없음"){
	echo " | <a href=#3.목차>목차</a>"; 
}
if($rowbody2['preview'] !== "없음"){
	echo " | <a href=#4.출판사리뷰>출판사리뷰</a>"; 
}
?>
</td><td width="300" height="35">
<a href="MyReviewWrite.php?id=<?php echo $rowbody[id]?>"><b>리뷰쓰기</b></a> | <a href="MyReviewListAll.php?id=<?php echo $rowbody[id]?>"><b>전체리뷰보기</b></a> | <a href="MyReviewEmail.php?id=<?php echo $rowbody[id]?>"><b>추천메일보내기</b></a>
</td></tr>
</table>
  
</td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr>
<td width="530" valign="top">
<?php
if($rowbody2['gsintro'] !== "없음"){
?>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<b>> <a name="1.책소개">책소개</b>
<br><span style=font-size:5pt;>&nbsp;</span><br>
<?php	echo nl2br($rowbody2['gsintro']); ?>
</td></tr></table>
<hr>
<?php
}
if($rowbody2['auintro'] !== "없음"){
?>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<b>> <a name="2.저자및역자소개">저자 및 역자 소개</b>
<br><span style=font-size:5pt;>&nbsp;</span><br>
<?php echo nl2br($rowbody2['auintro']); ?>
</td></tr></table>
<hr>
<?php
}
if($rowbody2['content'] !== "없음"){
?>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<b>> <a name="3.목차">목차</b>
<br><span style=font-size:5pt;>&nbsp;</span><br>
<?php echo nl2br($rowbody2['content']); ?>
</td>
</tr>
</table>
<hr>
<?php
}
if($rowbody2['preview'] !== "없음"){
?>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<b>> <a name="4.출판사리뷰">출판사리뷰</b>
<br><span style=font-size:5pt;>&nbsp;</span><br>
<?php echo nl2br($rowbody2['preview']); ?>
</td>
</tr>
</table>
<?php
}
?>
<hr color="#99CCFF">
<b>■ 회원리뷰</b> [<a href="MyReviewListAll.php?id=<?php echo $rowbody['id']?>">전체리뷰보기</a>]
<hr color="#99CCFF">
<?php
$query3=mysqli_query($link,"select * from myreview where goodsid='$rowbody[id]' limit 2");
while($rowbody3=mysqli_fetch_array($query3)){
echo "<b>".$rowbody3['title']."</b><br>";
echo $rowbody3['memberid']."님 | ".$rowbody3['drdate']." | ";
if($rowbody3['mark']==1){	?>
	<img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3[mark]==2){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3[mark]==3){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3[mark]==4){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3[mark]==5){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0">
<?php } ?>
<hr color="white" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
echo nl2br($rowbody3[content])." <a href=MyReviewDel.php?id=$rowbody[id]&delid=$rowbody3[id]&mod=myreviewdel>[삭제]</a>"; 
echo "<hr color=green>";
} 
?>
</td>
<td width="10" valign="top">
</td>
<td width="190" valign="top" align="right">

<SCRIPT LANGUAGE="JavaScript">
<!--
function BoxRela(RelaBox) 
{ 
for( var j=0; j<RelaBox.elements.length; j++) { 
var box = RelaBox.elements[j]; 
if(box.checked == false){
box.checked = true; 
}
} 
} 
function unBoxRela(RelaBox) 
{ 
for( var j=0; j<RelaBox.elements.length; j++) { 
var box = RelaBox.elements[j]; 
if(box.checked == true){
box.checked = false; 
}
} 
} 
// -->
</script> 
<?php
$queryrela=mysqli_query($link,"select * from goods where rela='$rowbody[rela]' && id != '$id' limit 5 ");
$numsrela=mysqli_num_rows($queryrela);
if($numsrela >= 1){ // 관련 서적이 있는지 검사 시작
?>
<table width="190" border="1" cellpadding="0" cellspacing="0" bordercolordark="white" bordercolorlight="#CCCCCC">
<tr><td>
<form name=RelaBox action="basket_buy.php?mod=basket&mod2=manyorder" method="post">
<table width="190" border="0" cellpadding="0" cellspacing="0">
<tr><td width="10" valign="top">&nbsp;</td>
<td width="170" valign="top">
<span style=font-size:5pt;>&nbsp;</span><br>
<b>◆ 관련서적</b>
<hr color="#336677">
<input type="button" Value="전체선택" onClick="BoxRela(RelaBox)"> 
<input type="button" Value="선택해제" onClick="unBoxRela(RelaBox)">
<br><span style=font-size:5pt;>&nbsp;</span><br> 
<?php
while($rowrela=mysqli_fetch_array($queryrela)){
?>
<input type='checkbox' name='check[]' value='<?php echo $rowrela['id']; ?>'><?php echo $rowrela['name']; ?> : 
<?php
$dcvalue2 = ($rowrela['fixprice'] - $rowrela['price']);
$dcrate2=round(($dcvalue2/$rowrela['fixprice'])*100) ;
echo number_format($rowrela['price']); 
?>원</b>(<?php echo $dcrate2; ?>%할인) 
<?php 
$povalue2 = ($rowrela['fixprice'] - $rowrela['point']);
$porate2= (int)(($povalue2/$rowrela['fixprice'])*100) ;
$pointrate2= (100-$porate2);
echo number_format($rowrela['point']); ?>원
(<?php echo $pointrate2; ?>%</font>지급) 
<?php if($rowrela['mania'] == 1){ echo " + [매니아 추가적립금 지급]"; } 

	if($rowrela['dcost'] == 2){ 
	echo "[국내무료배송]";
}
?>
<br><?php echo $rowrela['author']; ?> | <?php echo $rowrela['publishing']; ?><br>
<?php
}
?>
<span style=font-size:5pt;>&nbsp;</span><br>
<input type="submit" value=" 장바구니에 담기 " style="height:30;"> 
</form>

</td><td width="10" valign="top">&nbsp;</td>
</tr></table>
</td></tr></table>
<?php } // 관련서적이 있는지 검사 끝 ?>

<p>
<SCRIPT LANGUAGE="JavaScript">
<!--
function BoxBest(BestBox) 
{ 
for( var j=0; j<BestBox.elements.length; j++) { 
var box = BestBox.elements[j]; 
if(box.checked == false){
box.checked = true; 
}
} 
} 
function unBoxBest(BestBox) 
{ 
for( var j=0; j<BestBox.elements.length; j++) { 
var box = BestBox.elements[j]; 
if(box.checked == true){
box.checked = false; 
}
} 
} 
// -->
</script> 
<table width="190" border="1" cellpadding="0" cellspacing="0" bordercolordark="white" bordercolorlight="#CCCCCC">
<tr><td>
<form name=BestBox action="basket_buy.php?mod=basket&mod2=manyorder" method="post">
<table width="190" border="0" cellpadding="0" cellspacing="0">
<tr><td width="10" valign="top">&nbsp;</td>
<td width="170" valign="top">
<span style=font-size:5pt;>&nbsp;</span><br>
<b>◆ 이 분야 베스트셀러</b>
<hr color="#336677">
<input type="button" Value="전체선택" onClick="BoxBest(BestBox)"> 
<input type="button" Value="선택해제" onClick="unBoxBest(BestBox)">
<br><span style=font-size:5pt;>&nbsp;</span><br> 
<?php
$queryrela=mysqli_query($link,"select * from goods where rela='$rowbody[rela]' && best='1' limit 5 ");
while($rowrela=mysqli_fetch_array($queryrela)){
?>
<input type='checkbox' name='check[]' value='<?php echo $rowrela['id']; ?>'><?php echo $rowrela['name']; ?> : 
<?php
$dcvalue2 = ($rowrela['fixprice'] - $rowrela['price']);
$dcrate2=round(($dcvalue2/$rowrela['fixprice'])*100) ;
echo number_format($rowrela['price']); 
?>원</b>(<?php echo $dcrate2; ?>%할인) 
<?php 
$povalue2 = ($rowrela['fixprice'] - $rowrela['point']);
$porate2= (int)(($povalue2/$rowrela['fixprice'])*100) ;
$pointrate2= (100-$porate2);
echo number_format($rowrela['point']); ?>원
(<?php echo $pointrate2; ?>%</font>지급) 
<?php if($rowrela['mania'] == 1){ echo " + [매니아 추가적립금 지급]"; } 

	if($rowrela['dcost'] == 2){ 
	echo "[국내무료배송]";
}
?>
<br><?php echo $rowrela['author']; ?> | <?php echo $rowrela['publishing']; ?><br>
<?php
}
?>
<span style=font-size:5pt;>&nbsp;</span><br>
<input type="submit" value=" 장바구니에 담기 " style="height:30;"> 
</form>

</td><td width="10" valign="top">&nbsp;</td>
</tr></table>
</td></tr></table>

</td></tr></table>
<p>
<?php
include "bottom.php";     // 하단 구성
?>