<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_admin_id && $my_admin_pwd){
$numresults=mysqli_query($link,"select id from largepurchase");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if($numrows < 1)
echo "대량구매 상품이 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>대량구매 상품보기</B>(총등록수 : <?php echo number_format($numrows); ?>건)
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="50" height="30" align="center" background="../image/bg_center.jpg">
<b>사진</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>정가</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>현재가격</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>할인가</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>최소구매수량</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>구매수량</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>수정삭제</b>
</td>
</tr>
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="12" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from largepurchase order by id desc limit $fromnum,$limit50");
$i=1;
while ($row=mysqli_fetch_array($query))
{

$query2=mysqli_query($link,"select * from goods where id=$row[goodsid]");
$row2=mysqli_fetch_array($query2);

$bgnum=$i%2;
if($bgnum == 0){
$bgcolor=$bgcolor1;
} else {
$bgcolor=$bgcolor2;
}
?>
<tr>
<td height="25"  rowspan="2" bgcolor="<?php echo $bgcolor; ?>">
<?php 
if($row2['filename']){
?>
<img src="../s_goodsimg/<?php echo $row2['filename']; ?>" border="0" height="50">
<?php
}
?>
</td>
<td align="center" height="25" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['fixprice']); ?>원
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['price']); ?>원
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['dcprice']); ?>원
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['smallquantity']); ?>개
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['orderquantity']); ?>개
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="largePurModify.php?id=<?php echo $row['id'] ?>&modifyname=<?php echo $row2['name']?>&mod=largepurdel">수정</a> <a href="largePurDel.php?id=<?php echo $row['id'] ?>&delname=<?php echo $row2['name']?>&mod=largepurdel">삭제</a>
</td>
</tr>
<tr>
<td colspan="11" bgcolor="<?php echo $bgcolor; ?>">

<table width="860" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="300">
		<b>상품고유번호 : <?php echo $row2['id']; ?></b>
		<br>제목 : <?php echo $row2['name']; ?>
        </td>
        <td width="560">
            [저자:<?php echo $row2['author']; ?> 출판사:<?php echo $row2['publishing']; ?> 출간:<?php echo $row2['pyear']; ?>/<?php echo $row2['pmonth']; ?>/<?php echo $row2['pday']; ?> 쪽수:<?php echo $row2['epage']; ?> ISBN:<?php echo $row2['isbn']; ?>]
        </td>
    </tr>
</table>
 
</td>
</tr>
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<?php
$i++;
}
?>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="900">
<tr><td colspan="12" height="10"></td></tr>
<tr><td colspan="12" height="1" bgcolor="#6699FF"></td></tr>
<tr><td colspan="12" height="5"></td></tr>
<tr><td colspan="12"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>