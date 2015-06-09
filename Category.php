<?php
include "top.php";
include "main_left.php";	
include "config/config.php";
$categoryname = $_REQUEST['categoryname'];
$categorycolumn = $_REQUEST['categorycolumn'];
$categoryvalue = $_REQUEST['categoryvalue'];
$numresults=mysqli_query($link,"select id from goods where $categorycolumn='$categoryvalue' ");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if(!isset($_REQUEST['page '])){$page  =1;} else {$page  = $_REQUEST['page '];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="730" height="40">
<b>◎ <?php echo $categoryname; ?></b> 
</td>
</tr>
<tr><td colspan="2" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="2" height="5"></td></tr>
</table>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<?php
if($numrows < 1)
echo "<tr><td colspan=3 height=25>상품이 없습니다.</td></tr>";
?>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;

$query=mysqli_query($link,"select * from goods where $categorycolumn='$categoryvalue' order by id desc limit $fromnum,$limit50");
$num=1;
while ($rowbody=mysqli_fetch_array($query))
{
?>
<tr>
<td width="20" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<?php echo $num; ?>.
</td>
<td width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
if($rowbody['filename']){
?>
<a href="goodsview.php?id=<?php echo $rowbody['id']; ?>">
<img src="s_goodsimg/<?php echo $rowbody['filename']; ?>" border="0" width="67" height="100">
</a>
<?php
}
?>
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<table width="630" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="330">
<span style=font-size:3pt;>&nbsp;</span><br>
<a href="goodsview.php?id=<?php echo $rowbody['id']; ?>"><b>[도서]<?php echo $rowbody['name']; ?></b></a>
<br><?php echo $rowbody['author']; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>/<?php echo $rowbody['pmonth']; ?>/ <?php echo $rowbody['pday']; ?> 출간
<br><s><?php echo number_format($rowbody['fixprice']); ?></s> 
→ 
<b><font color="#DF5B0B">
<?php
$dcvalue = ($rowbody['fixprice'] - $rowbody['price']);
$dcrate=round(($dcvalue/$rowbody['fixprice'])*100) ;
echo number_format($rowbody['price']); 
?>원</b>(<?php echo $dcrate; ?>%</font>할인)
<br><?php echo $rowbody['dday']; ?>일이내 배송(수령일은 근무일 기준 1~2일 소요)
<br><?php if($rowbody['dcost']==2){ "[국내 무료배송]"; } ?> <?php if($rowbody['recomend']==1){ echo "추천"; } ?>
</td>
<td>
<a href="basket_buy.php?id=<?php echo $rowbody['id']; ?>&mod=basket&QuantityNum=1">[장바구니담기]</a>
<br><a href="MyList.php?id=<?php echo $rowbody['id']; ?>&mod=mylist">[리스트에 넣기]</a>
<br><a href="instant_buy.php?id=<?php echo $rowbody['id']; ?>&mod=instant&QuantityNum=1">[바로구매]</a>
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
<center><?php echo pagenavigate($page, $totalpage, "$_SERVER[REQUEST_URI]")?></center>
<p>
<?php
include "bottom.php";     // 하단 구성
?>