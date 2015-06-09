<?php 
include "config/session_inc.php"; 
include "config/lib.php"; 
if(!isset($_REQUEST['id'])){$id  =1;} else {$id  = $_REQUEST['id'];}

$query=mysqli_query($link,"select * from goods where id=$id");
$rowbody=mysqli_fetch_array($query);
?>
<html>
<head>
<title>큰이미지로 보기</title>
<SCRIPT LANGUAGE='javascript'>
<!--
function basketwin(trd) {
	opener.document.location = 'basket_buy.php?id=<?php echo $rowbody['id']; ?>&mod=basket&QuantityNum=1 ';
	self.close();
}
function listwin() {
	opener.document.location = 'MyList.php?id=<?php echo $rowbody['id']; ?>&mod=mylist';
	self.close();
}
function instantwin() {
	opener.document.location = 'instant_buy.php?id=<?php echo $rowbody['id']; ?>&mod=instant ';
	self.close();
}
//-->
</SCRIPT>
</head>
<body>
<table width="680" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="300">
<?php 
if($rowbody['filename2']){
?>
<input type="image" src="goodsimg/<?php echo $rowbody['filename2']; ?>" onclick="self.close()">
<?php
}
?>
</td>
<td width="380">

<table width="380" border="0" cellpadding="0" cellspacing="0">
<tr><td width="380">
<b>[도서]<?php echo $rowbody['name']; ?></b>
<br>
<?php echo $rowbody['author']; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>/<?php echo $rowbody['pmonth']; ?>/<?php echo $rowbody['pday']; ?>
<hr color="#336677">
판매가 : 
<font color="#DF5B0B"><b>
<?php
$dcvalue = ($rowbody['fixprice'] - $rowbody['price']);
$dcrate=round(($dcvalue/$rowbody['fixprice'])*100) ;
echo number_format($rowbody['price']); 
?>원</b>(<?php echo $dcrate; ?>%</font>할인)
<br>
포인터 : 
<font color="#DF5B0B">
<?php 
$povalue = ($rowbody['fixprice'] - $rowbody['point']);
$porate= (int)(($povalue/$rowbody['fixprice'])*100) ;
$pointrate= (100-$porate);
echo number_format($rowbody['point']); ?>원
(<?php echo $pointrate; ?>%</font>지급) 
<?php if($rowbody['mania'] == 1){ echo " + [매니아추가적립]"; } ?>
<hr color="#336677">
</td></tr>
<tr><td>

<table width="380" border="0" cellpadding="0" cellspacing="0">
<tr><td width="280" align="right" valign="top">
<span style=font-size:5pt;>&nbsp;</span><br>
&nbsp;
</td><td width="20">
</td><td width="180">
<a href="javascript:basketwin(3);"><img src="image/basket.gif" border="0"></a>
<br>
<a href="javascript:listwin();"><img src="image/list_buy.gif" border="0"></a>
<br>
<a href="javascript:instantwin();"><img src="image/instant_buy.gif" border="0"></a>

</td></tr></table>
</td></tr></table>
</body>
</html> 