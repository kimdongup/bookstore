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
$numresults=mysqli_query($link,"select id from popupnews");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if($numrows < 1)
echo "등록된 팝업공지가 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>팝업공지</B>(총등록수 : <?php echo number_format($numrows); ?>건) <a href="PopupNewsWrite.php">[팝업공지 등록하기]</a>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="5" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="200" height="30" align="center" background="../image/bg_center.jpg">
<b>사진</b>
</td>
<td width="200" align="center" background="../image/bg_center.jpg">
<b>팝업창 넓이</b>
</td>
<td width="200" align="center" background="../image/bg_center.jpg">
<b>팝업창 높이</b>
</td>
<td width="200" align="center" background="../image/bg_center.jpg">
<b>팝업창띄움</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>수정삭제</b>
</td>
</tr>
<tr><td colspan="5" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="5" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from popupnews order by rdate desc limit $fromnum,$limit50");
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
<img src="../s_popupnewsimg/<?php echo $row['filename']; ?>" border="0" height="50">
<?php
}
?>
</td>
<td align="center" height="25" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['imgwidth']); ?> 픽셀
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo number_format($row['imgheight']); ?> 픽셀
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php if($row['imgopen']==1){ echo "띄움"; }else{ echo "띄우지 않음"; } ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="PopupNewsModify.php?id=<?php echo $row['id'] ?>">수정</a> <a href="PopupNewsDelCheck.php?id=<?php echo $row['id'] ?>">삭제</a>
</td>
</tr>
<tr>
<td colspan="11" bgcolor="<?php echo $bgcolor; ?>">

</td>
</tr>
<tr><td colspan="5" height="1" bgcolor="#cccccc"></td></tr>
<?php
$i++;
}
?>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="900">
<tr><td colspan="5" height="10"></td></tr>
<tr><td colspan="5" height="1" bgcolor="#6699FF"></td></tr>
<tr><td colspan="5" height="5"></td></tr>
<tr><td colspan="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>