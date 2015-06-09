<?php
include "top.php";
include "main_left.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}

if(!isset($_REQUEST['id'])){$id  =1;} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['goodsid'])){$goodsid  =1;} else {$goodsid  = $_REQUEST['goodsid'];}

if($my_member_id){
$result=mysqli_query($link,"select * from synergicpurchase where id='$id'");
$row=mysqli_fetch_array($result);
$result2=mysqli_query($link,"select * from goods where id='$goodsid'");
$row2=mysqli_fetch_array($result2);
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B><?php echo $my_name; ?> 님의 공동구매 정보</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="400">

<table width="400" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
상품명 :
</td>
<td width="300" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo $row2['name'];?>
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
시작가 : 
</td>
<td width="300"  style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo number_format($row['fixprice']); ?>원
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
즉시가 : 
</td>
<td width="300" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo number_format($row2['price']); ?>원
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
현재가 : 
</td>
<td width="300" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<font color=red><?php
$dcvalue = ($row['fixprice'] - ($row['price'] - $row['dcprice']));
$dcrate=round(($dcvalue/$row['fixprice'])*100) ;
echo number_format($row['price'] - $row['dcprice']); 
?>원</b>(<?php echo $dcrate; ?>%할인)</font>
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
참가자 수 : 
</td>
<td width="300" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo number_format($row['orderquantity']); ?>명
</td>
</tr>
</table>

</td>
<td width="30">
</td>
<td width="300">
현재 구매 수 : <?php echo number_format($row['orderquantity']); ?>개
<p>등록 상품 수 : <?php echo number_format($row['recordquantity']); ?>개
<p>마감날자 : <?php echo $row['enddate']; ?>
</td>
</tr>
</table>

<p>
<font color=red>
* 공동구매 상품은 참가자 수가 많을수록 계속 할인됩니다.
<br>* 마이페이지에서 언제든지 확인해 볼 수 있습니다.
</font>
<form name=Form1 method=post action="SynerOrderWrite.php">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="goodsid" value="<?php echo $goodsid?>">
<input type="hidden" name="mod" value="synerorder">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<input type="submit" value="주문하기">
</form>
<p>
<?php
}else{
include "link_login.php";
}
include "bottom.php";     // 하단 구성
?>