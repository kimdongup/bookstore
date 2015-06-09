<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}

if($my_admin_id && $my_admin_pwd){
    $numresults=mysqli_query($link,"select id from goods where $find like '%$search%'");
    $numrows=mysqli_num_rows($numresults);
    $totalpage = ceil($numrows / $limit50);
    if($numrows < 1)
        echo "상품이 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>상품관리</B>(총등록수 : <?php echo number_format($numrows); ?>건) <a href="goods3_list.php">[상품등록하기]</a>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<!-- 검색 -->
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
	if(!Fm.search.value) {
	alert("상품명을 입력하세요.");
	Fm.search.focus();
	return; }
	document.Form1.action = 'goods_search.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<table width="900"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="200">
</td>
<td width="500" height="30" style="padding-bottom:5px" valign="bottom">
<form name=Form1 method=post>
<select name=find>
<option value=name>상품명</option>
</select>
<input type=text name=search size=12>
<a href="javascript:recording();" style="padding-left:0px"><img src="../image/search_top" border="0" align="absmiddle"></a>
</td>
<td width="200" valign="middle">
&nbsp;
</td></form>
</tr>
</table>
<!-- 차량검색 끝 -->

<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="40" height="30" align="center" background="../image/bg_center.jpg">
<b>사진</b>
</td>
<td width="70" align="center" background="../image/bg_center.jpg">
<b>판매가</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>배송일</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>배송비용</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>배송지역</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>최저보상</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>신상품</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>베스트셀러</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>추천상품</b>
</td>
<td width="70" align="center" background="../image/bg_center.jpg">
<b>세일상품</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>등록일</b>
</td>
<td width="80" align="center" background="../image/bg_center.jpg">
<b>수정삭제</b>
</td>
</tr>
<tr><td colspan="12" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="12" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from goods where $find like '%$search%' order by id desc limit $fromnum,$limit50");
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
<img src="../s_goodsimg/<?php echo $row['filename']; ?>" border="0" height="50">
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
<a href="goods_modify.php?id=<?php echo $row['id'] ?>">수정</a> <a href="goods_delcheck.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>">삭제</a>
</td>
</tr>
<tr>
<td colspan="11" bgcolor="<?php echo $bgcolor; ?>">

<table width="860" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="300">
         <b>상품고유번호:<?php echo $row['id']; ?></b>
		 <br>제목 : <?php echo $row['name']; ?>
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
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>