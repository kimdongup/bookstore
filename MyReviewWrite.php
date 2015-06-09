<?php
session_cache_limiter('nocache, must-revalidate');
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}


if($my_member_id){

$query=mysqli_query($link,"select * from goods where id=$id");
$rowbody=mysqli_fetch_array($query);
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="730" height="30">
<?php
$result=mysqli_query($link,"select name,gs2id from goods3 where id='$rowbody[gs3id]' ");
$row=mysqli_fetch_array($result);
$fixid3=$row[gs2id];
$name3=$row[name];
$result=mysqli_query($link,"select fixnum,name from goods2 where id='$fixid3' ");
$row=mysqli_fetch_array($result);
$fixid2=$row[fixnum];
$name2=$row[name];
$result=mysqli_query($link,"select fixnum,name from goods1 where fixnum='$fixid2' ");
$row=mysqli_fetch_array($result);
$fixid1=$row[fixnum];
$name1=$row[name];

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
<tr><td colspan="2" height="30"><?php echo $rowbody[author]; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>년<?php echo $rowbody['pmonth']; ?>월 <?php echo $rowbody['pday']; ?>일</td></tr>
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
if($rowbody[mania] == 1){
echo "<img src=image/mania.gif border=0> ";	
}

if($rowbody[lowest] == 1){
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
if($rowbody[dcost] == 2){ 
	echo "[국내무료배송]";
}
if($rowbody[dcountry] == 2){
	echo " [해외배송가능]";
} else {
	echo " [해외배송불가]";
}
if($rowbody[lowest] == 1){
	echo " [최저가격보상제]";	
}
if($rowbody[recomend]==1)
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

<!-- 리뷰쓰기 -->
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
	if(!Fm.RVtitle.value) {
	alert("제목을 입력하세요.");
	Fm.RVtitle.focus();
	return; }
	if(!Fm.content.value) {
	alert("내용을 입력하세요.");
	Fm.content.focus();
	return; }
	document.Form1.action = 'MyReviewIns.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<form name=Form1 method=post>
<INPUT type=hidden name=mod value="yes">
<INPUT type=hidden name=goodsid value="<?php echo $id?>">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
			<td valign="bottom" width="20" height="25">
				<img src="image/green_folder.jpg" border="0" vspace="5"> 
			</td>
			<td width="710">
			<span style=font-size:16pt;><b>리뷰쓰기</b></span>
			</td>
			<td align="right">
             &nbsp;
			</td>
		</tr>
		</table>
		<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
		<tr>
			<td width="155" class="bgc_bar" height="2"></td>
			<td class="bgc_bar2"></td>
		</tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 제목
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<input type="text" name="RVtitle" value="" maxlength="30" style="width:500px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 내용
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
				<textarea name=content rows=10 cols=90></textarea>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 평점
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="radio" name="mark" value="1">
				<img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">&nbsp;
            <input type="radio" name="mark" value="2">
				<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">&nbsp;
            <input type="radio" name="mark" value="3" checked>
				<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">&nbsp;
            <input type="radio" name="mark" value="4">
				<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0">&nbsp;
            <input type="radio" name="mark" value="5">
				<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0">

		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>		
		</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><img src="image/record.gif" border="0"></a>
</div>
<p>&nbsp;</p> 
<?php
}
include "bottom.php";     // 하단 구성
?>