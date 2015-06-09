<?php
include "top.php";
include "main_left.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}

if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_member_id){
$numresults=mysqli_query($link,"select id from synergicpurchase");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B>공동구매(총등록수 : <?php echo number_format($numrows); ?>건)</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$num=1;
$numresult=mysqli_query($link,"select * from synergicpurchase order by id desc limit $fromnum,$limit50");
while ($row=mysqli_fetch_array($numresult)){
?>
<table width="730" border="0" cellpadding="0" cellspacing="0">
<?php
if($numrows < 1)
echo "<tr><td colspan=3 height=25>상품이 없습니다.</td></tr>";

$query=mysqli_query($link,"select * from goods where id='$row[goodsid]'");
$rowbody=mysqli_fetch_array($query);
?>
<tr>
<td width="20" valign="top" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<p>&nbsp;</p>
<?php echo $num; ?>.
</td>
<td width="80" valign="top" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<span style=font-size:3pt;>&nbsp;</span><br>
<?php 
if($rowbody['filename']){
?>
<img src="s_goodsimg/<?php echo $rowbody['filename']; ?>" border="0" width="67" height="100">
<?php
}
?>
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<table width="630" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="330">
<span style=font-size:3pt;>&nbsp;</span><br>
<b>[도서]<?php echo $rowbody['name']; ?></b>
<br><?php echo $rowbody['author']; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>/<?php echo $rowbody['pmonth']; ?>/ <?php echo $rowbody['pday']; ?> 출간
<br><span style=font-size:3pt;>&nbsp;</span><br>
<br>시작가 : <?php echo number_format($row['fixprice']); ?>
<br><font color=red>즉시가 : <?php echo number_format($rowbody['price']); ?></font>
<br><b>현재가 : <font color="#DF5B0B">
<?php
$dcvalue = ($row['fixprice'] - $row['price']);
$dcrate=round(($dcvalue/$row['fixprice'])*100) ;
echo number_format($row['price']); 
?>원</b>(<?php echo $dcrate; ?>%</font>할인)
<br><font color="blue">공동구매 참가 할인가 : <?php echo number_format($row['dcprice']); ?>원</font>
<br>현재 구매 수 : <?php echo number_format($row['orderquantity']); ?>개
<br>등록 상품 수 : <?php echo number_format($row['recordquantity']); ?>개
<br>마감날자 : <?php echo $row['enddate']; ?>


<br><span style=font-size:3pt;>&nbsp;</span>
<br><?php echo $rowbody['dday']; ?>일이내 배송(수령일은 근무일 기준 1~2일 소요)
<br><?php if($rowbody['dcost']==2){ "[국내 무료배송]"; } ?> <?php if($rowbody['recomend']==1){ echo "추천"; } ?>
</td>
<td>
<a href="SynerBuy.php?id=<?php echo $row['id']; ?>&goodsid=<?php echo $rowbody['id']; ?>"><b>[공동구매 참가하기]</b></a>
<br><span style=font-size:5pt;>&nbsp;</span><br> 
<a href="goodsview.php?id=<?php echo $rowbody['id']; ?>"><b>[즉시구매]</b></a>
</td>
</tr>
<tr>
<td colspan="2">
<span style=font-size:5pt;>&nbsp;</span><br> 
<?php
$queryct=mysqli_query($link,"select gsintro from goodsct where goodsid='$rowbody[id]' ");
$rowct=mysqli_fetch_array($queryct);
// 문자열 자르기
$str=$rowct['gsintro']; 
$length=200;
$str = chop(substr($str, 0, $length));
preg_match('/^([\x00-\x7e]|.{2})*/', $str, $titleok);
echo $titleok[0]."...";
?>
<br> <span style=font-size:5pt;>&nbsp;</span>
</td>
</tr>
</table>

</td>
</tr>
 
<?php
$num++;
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