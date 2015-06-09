<?php
include "top.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['$my_grade'])){$my_grade ="";} else {$$my_grade = $_SESSION['$my_grade'];}
$publishname = $_REQUEST['publishname'];
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page '])){$page  =1;} else {$page  = $_REQUEST['page '];}

if($my_member_id){
	if($my_grade < 6){ // 5보다 적어야 관리자
$numresults=mysqli_query($link,"select id from goods where publishing='$publishname'");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if($numrows < 1)
    echo "상품이 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B><?php echo $publishname; ?> 출판사 상품관리</B>(총등록수 : <?php echo number_format($numrows); ?>건)
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="40" height="30" align="center" background="image/bg_center.jpg">
<b>사진</b>
</td>
<td width="70" align="center" background="image/bg_center.jpg">
<b>판매가</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>배송일</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>배송비용</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>배송지역</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>최저보상</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>신상품</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>베스트셀러</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>추천상품</b>
</td>
<td width="70" align="center" background="image/bg_center.jpg">
<b>세일상품</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>등록일</b>
</td>
<td width="80" align="center" background="image/bg_center.jpg">
<b>수정</b>
</td>
</tr>
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="12" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from goods where publishing='$publishname' order by id desc limit $fromnum,$limit50");
$i=1;
while ($row=mysqli_fetch_array($query))
{

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
if($row['filename']){
?>
<img src="s_goodsimg/<?php echo $row['filename']; ?>" border="0" height="50">
<?php
}
?>
</td>
<td align="right" height="25" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['price']); ?>원
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['dday']; ?>일이내
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['dcost']==1){ echo "배송비(유)"; }else{ echo "배송비(무)"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['dcountry']==1){ echo "국내가능"; }else{ echo "해외가능"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['lowest']==1){ echo "최저보상"; }else{ echo "최저불가"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['gsnew']==1){ echo "신상품(Y)"; }else{ echo "신상품(N)"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['best']==1){ echo "베스트(Y)"; }else{ echo "베스트(N)"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['recomend']==1){ echo "추천(Y)"; }else{ echo "추천(N)"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['sale']==1){ echo "세일(Y)"; }else{ echo "세일(N)"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php 
$drtime=$row['rdate'];
$year = date('Y',$drtime);
$month = date('m',$drtime);
$day = date('d',$drtime);
echo $year."/".$month."/".$day;
?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="PublishingModify.php?id=<?php echo $row['id'] ?>&bookname=<?php=$row['name']?>">수정</a>
</td>
</tr>
<tr>
<td colspan="11" bgcolor="<?php echo $bgcolor; ?>">

<table width="860" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="300">
            제목 : <?php echo $row['name']; ?>
        </td>
        <td width="560">
            [저자:<?php echo $row['author']; ?> 출판사:<?php echo $row['publishing']; ?> 출간:<?php echo $row['pyear']; ?>/<?php echo $row['pmonth']; ?>/<?php echo $row['pday']; ?> 쪽수:<?php echo $row['epage']; ?> ISBN:<?php echo $row['isbn']; ?> 포인터:<?php echo $row['point']; ?> 매니아:<?php if($row['mania']==1){ echo "(Y)"; }else{ echo "(N)"; } ?> ]
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
<center><?php echo pagenavigate($page, $totalpage, "$_SERVER[REQUEST_URI]")?></center>
<p>
<?php
}else{ msg("관리자가 아닙니다."); }
}else{ include "link_login.php"; }
include "bottom.php";     // 하단 구성
?>