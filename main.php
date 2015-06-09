<?php
include "main_left.php";	
function strcut_utf8($str, $len, $checkmb=false, $tail='') {
    /**
     * UTF-8 Format
     * 0xxxxxxx = ASCII, 110xxxxx 10xxxxxx or 1110xxxx 10xxxxxx 10xxxxxx
     * latin, greek, cyrillic, coptic, armenian, hebrew, arab characters consist of 2bytes
     * BMP(Basic Mulitilingual Plane) including Hangul, Japanese consist of 3bytes
     **/
    preg_match_all('/[\xE0-\xFF][\x80-\xFF]{2}|./', $str, $match); // target for BMP

    $m = $match[0];
    $slen = strlen($str); // length of source string
    $tlen = strlen($tail); // length of tail string
    $mlen = count($m); // length of matched characters

    if ($slen <= $len) return $str;
    if (!$checkmb && $mlen <= $len) return $str;

    $ret = array();
    $count = 0;
    for ($i=0; $i < $len; $i++) {
        $count += ($checkmb && strlen($m[$i]) > 1)?2:1;
        if ($count + $tlen > $len) break;
        $ret[] = $m[$i];
    }

    return join('', $ret).$tail;
}
?>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" height="1" bgcolor="#cccccc"></td></tr>
<?php
$query=mysqli_query($link,"select * from goods order by id desc limit 5");
while ($rowbody=mysqli_fetch_array($query))
{
?>
<tr>
<td width="20" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
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
//$str = trim(substr($str, 0, $length));
//preg_match('/^([\x00-\x7e]|.{2})*/', $str, $titleok);
//echo $titleok[0]."...";
echo strcut_utf8($str, $length, true, "...");
?>

<br> <span style=font-size:5pt;>&nbsp;</span>
</td>
</tr>
</table>

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