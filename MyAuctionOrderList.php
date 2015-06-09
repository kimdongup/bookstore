<?php
include "top.php";
include "MyPageLeft.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}
if(!isset($_REQUEST['delid'])){$delid  ="";} else {$delid  = $_REQUEST['delid'];}
if(!isset($_REQUEST['updateid'])){$updateid  ="";} else {$updateid  = $_REQUEST['updateid'];}

if($my_member_id){
    if($mod=="auctionorderdel"){ // 주문취소
        $queryu=mysqli_query($link,"select * from auctionpurchase where id='$updateid'");
        $rowu=mysqli_fetch_array($queryu);
        $uquantity=$rowu['orderquantity']-1;

        $update2 = "update auctionpurchase set orderquantity='$uquantity' where id='$updateid' ";
        $result2=mysqli_query($link,$update2);

        $del = "delete from auctionorder where id='$delid' ";
        $result=mysqli_query($link,$del);
    }
    $numresults=mysqli_query($link,"select id from auctionorder where orderer='$my_member_id'");
    $numrows=mysqli_num_rows($numresults);
    $totalpage = ceil($numrows / $limit50);
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B>경매 주문내역(총등록수 : <?php echo number_format($numrows); ?>건)</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100" height="30" align="center">경매번호(입찰)</td>
<td width="100" height="30" align="center">주문번호</td>
<td width="100" height="30" align="center">상품명</td>
<td width="100" height="30" align="center">즉시구매가</td>
<td width="100" height="30" align="center">입찰가</td>
<td width="80" height="30" align="center">마감일자</td>
<td width="100" height="30" align="center">입찰날자</td>
<td width="50" height="30" align="center">주문취소</td>
</tr>
<tr><td colspan="8" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$num=1;
$numresult=mysqli_query($link,"select * from auctionorder where orderer='$my_member_id' order by auctionid desc, auctionprice desc limit $fromnum,$limit50");
while ($row=mysqli_fetch_array($numresult)){

if($numrows < 1)
echo "<tr><td colspan=3 height=25>경매 주문내역이 없습니다.</td></tr>";

$query2=mysqli_query($link,"select * from auctionpurchase where id='$row[auctionid]'");
$row2=mysqli_fetch_array($query2);

$query=mysqli_query($link,"select * from goods where id='$row2[goodsid]'");
$rowbody=mysqli_fetch_array($query);
?>
<tr>
<td width="100" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<b><?php echo number_format($row2['id']); ?>(<?php echo number_format($row2['orderquantity']); ?>)</b>
</td>
<td width="100" align="center" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo $row['ordernum']; ?>
</td>
<td width="100" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo $rowbody['name']; ?>
</td>
<td width="100" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo number_format($row2['fixprice']); ?>원
</td>
<td width="100" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo $row['auctionprice']; ?>
</td>
<td width="100" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
$ordertime=$row2['enddate'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="100" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
$ordertime=$row['orderday'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="50" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<a href="<?php echo $_SERVER['SCRIPT_NAME']?>?delid=<?php echo $row['id']?>&quantity=<?php echo $row['quantity']?>&updateid=<?php echo $row2['id']?>&mod=auctionorderdel">주문취소</a>
</td>
</tr> 
<?php
}
?>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="730">
<tr><td height="10"></td></tr>
<tr><td height="1" bgcolor="#6699FF"></td></tr>
<tr><td height="5"></td></tr>
<tr><td ></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{
include "link_login.php";
}
include "bottom.php";     // 하단 구성
?>