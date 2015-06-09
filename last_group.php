<?php
include "top.php";
include "main_left.php";
include "config/config.php";
if(!isset($_REQUEST['name'])){$name = "";} else {$name  = $_REQUEST['name'];}
if(!isset($_REQUEST['gs2id'])){$gs2id = "";} else {$gs2id  = $_REQUEST['gs2id'];}
if(!isset($_REQUEST['gs3id'])){$gs3id = "";} else {$gs3id  = $_REQUEST['gs3id'];}
if(!isset($_REQUEST['dbarray'])){$dbarray  = "";} else {$dbarray  = $_REQUEST['dbarray'];}
if(!isset($_REQUEST['lowname'])){$lowname = "";} else {$lowname  = $_REQUEST['lowname'];}
$numresults=mysqli_query($link,"select id from goods where gs3id='$gs3id' ");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="730" height="40">
<b><?php echo $name; ?></b> > <?php echo $lowname; ?>
(총등록수 : <?php echo number_format($numrows); ?>건)</a>
</td>
</tr>
<tr><td colspan="2" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="2" height="5"></td></tr>
</table>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="3" height="25" align="right">| <a href=<?php $_SERVER['SCRIPT_NAME']; ?>?name=<?php echo $name; ?>&lowname=<?php echo $lowname; ?>&gs3id=<?php echo $gs3id; ?>>기본순</a> | <a href=<?php $_SERVER['SCRIPT_NAME']; ?>?dbarray=nvolume&name=<?php echo $name; ?>&lowname=<?php echo $lowname; ?>&gs3id=<?php echo $gs3id; ?>>판매량</a> | <a href=<?php $_SERVER['SCRIPT_NAME']; ?>?dbarray=nnew&name=<?php echo $name; ?>&lowname=<?php echo $lowname; ?>&gs3id=<?php echo $gs3id; ?>>신상품</a> | <a href=<?php $_SERVER['SCRIPT_NAME']; ?>?dbarray=npricea&name=<?php echo $name; ?>&lowname=<?php echo $lowname; ?>&gs3id=<?php echo $gs3id; ?>>가격↑</a> | <a href=<?php $_SERVER['SCRIPT_NAME']; ?>?dbarray=npriced&name=<?php echo $name; ?>&lowname=<?php echo $lowname; ?>&gs3id=<?php echo $gs3id; ?>>가격↓</a> | <a href=<?php $_SERVER['SCRIPT_NAME']; ?>?dbarray=nname&name=<?php echo $name; ?>&lowname=<?php echo $lowname; ?>&gs3id=<?php echo $gs3id; ?>>상품명</a> |</td></tr>
<tr><td colspan="3" height="1" bgcolor="#cccccc"></td></tr>

<?php
if($numrows < 1)
echo "<tr><td colspan=3 height=25>상품이 없습니다.</td></tr>";

if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
if($dbarray=="nvolume"){
$query=mysqli_query($link,"select * from goods where gs3id='$gs3id' order by volume desc limit $fromnum,$limit50");
} else if($dbarray=="nnew"){
$query=mysqli_query($link,"select * from goods where gs3id='$gs3id' order by pmonth,pday desc limit $fromnum,$limit50");
} else if($dbarray=="npricea"){
$query=mysqli_query($link,"select * from goods where gs3id='$gs3id' order by price asc limit $fromnum,$limit50");
} else if($dbarray=="npriced"){
$query=mysqli_query($link,"select * from goods where gs3id='$gs3id' order by price desc limit $fromnum,$limit50");
} else if($dbarray=="nname"){
$query=mysqli_query($link,"select * from goods where gs3id='$gs3id' order by name desc limit $fromnum,$limit50");
} else {
$query=mysqli_query($link,"select * from goods where gs3id='$gs3id' order by id desc limit $fromnum,$limit50");
}
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
<br><s><?php echo number_format($rowbody['fixprice']); ?></s> → <b><font color="#DF5B0B"><?php echo number_format($rowbody['price']); ?>원()</font></b>
<br><?php echo $rowbody['dday']; ?>일이내 배송(수령일은 근무일 기준 1~2일 소요)
<br><?php if($rowbody['dcost']==2){ "[국내 무료배송]"; } ?> <?php if($rowbody['recomend']==1){ echo "추천"; } ?>
</td>
<td>
<a href="basket_buy.php?id=<?php echo $rowbody['id']; ?>">[장바구니담기]</a>
<br><a href="list_buy.php?id=<?php echo $rowbody['id']; ?>">[리스트에 넣기]</a>
<br><a href="instant_buy.php?id=<?php echo $rowbody['id']; ?>">[바로구매]</a>
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
include "bottom.php";     // 하단 구성
?>