<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_admin_id && $my_admin_pwd){
    $numresults=mysqli_query($link,"select id from goods3");
    $numrows=mysqli_num_rows($numresults);
    $totalpage = ceil($numrows / $limit50);
    if($numrows < 1) 
    echo "소분류명이 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>소분류</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="4" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="100" height="30" align="center" background="../image/bg_center.jpg">
<b>고유번호</b>
</td>
<td width="200" align="center" background="../image/bg_center.jpg">
<b>소분류명</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>수정삭제</b>
</td>
<td width="500" align="center" background="../image/bg_center.jpg">
&nbsp;
</td>
</tr>
<tr><td colspan="4" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="4" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from goods3 limit $fromnum,$limit50");
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
<td align="center" height="25" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['fixnum']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="goods_write.php?fixid=<?php echo $row['fixnum']; ?>&gs2id=<?php echo $row['gs2id']; ?>&gs3id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="goods3_modify.php?id=<?php echo $row['id'] ?>">수정</a> <a href="goods3_delcheck.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>">삭제</a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
&nbsp;
</td>
</tr>
<tr><td colspan="4" height="1" bgcolor="#cccccc"></td></tr>
<?php
$i++;
}
?>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="900">
<tr><td colspan="7" height="10"></td></tr>
<tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
<tr><td colspan="7" height="5"></td></tr>
<tr><td colspan="7"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>