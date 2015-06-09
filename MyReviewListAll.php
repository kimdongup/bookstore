<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}

$query=mysqli_query($link,"select * from goods where id=$id");
$rowbody=mysqli_fetch_array($query);
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="735" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="730" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ [리뷰보기]<?php echo $rowbody['name']; ?> </b></p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="730">
<tr><td width="230">
<img src="goodsimg/<?php echo $rowbody['filename']; ?>" border="0"><br>
<td>
<?php echo $rowbody['author']; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>년<?php echo $rowbody['pmonth']; ?>월 <?php echo $rowbody['pday']; ?>일
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

<form>
<input type="button" Value="큰 그림으로 상세내용보기" onClick="window.open ('big_img.php?id=<?php echo $id; ?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=700, height=500')">
</form>
</td></tr>
</table>
<hr color=green>
<?php
$query3=mysqli_query($link,"select * from myreview where goodsid=$rowbody[id] limit 100");
while($rowbody3=mysqli_fetch_array($query3)){
echo "<b>".$rowbody3['title']."</b><br>";
echo $rowbody3['memberid']."님 | ".$rowbody3['drdate']." | ";
if($rowbody3['mark']==1){	?>
	<img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==2){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==3){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==4){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==5){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0">
<?php } ?>
<hr color="white" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
echo nl2br($rowbody3[content])." <a href=MyReviewDel.php?id=$rowbody[id]&delid=$rowbody3[id]&mod=myreviewdel>[삭제]</a>"; 
echo "<hr color=green>";
} 
?>

<p>
<?php
include "bottom.php";     // 하단 구성
?>