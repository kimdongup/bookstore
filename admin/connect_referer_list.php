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
$numresults=mysqli_query($link,"select cdate from connectsum");
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if($numrows < 1)
echo "접속자가 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>접속자 상세보기</B>(총 접속자 : <?php echo number_format($numrows); ?> 명)
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="4" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="200" height="30" align="center" background="../image/bg_center.jpg">
<b>ip</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>브라우즈</b>
</td>
<td width="500" align="center" background="../image/bg_center.jpg">
<b>레퍼러</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>접속일자</b>
</td>
</tr>
<tr><td colspan="4" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="4" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from connectsum order by cdate desc limit $fromnum,$limit50");
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
<td height="25" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['ip']; ?>
</td>
<td align="center" height="25" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['browser']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['referer']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php
$year = date('Y',$row['cdate']);
$month = date('m',$row['cdate']);
$day = date('d',$row['cdate']);
echo $year."/".$month."/".$day;
?>
</td>
</tr>
<tr><td colspan="4" height="1" bgcolor="#cccccc"></td></tr>
<?php
$i++;
}
?>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="900">
<tr><td colspan="4" height="10"></td></tr>
<tr><td colspan="4" height="1" bgcolor="#6699FF"></td></tr>
<tr><td colspan="4" height="5"></td></tr>
<tr><td colspan="4"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>