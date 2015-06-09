<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if($my_admin_id && $my_admin_pwd){
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>대분류</B> <a href="goods1_list.php">[목록보기]</a> <a href="goods1_write.php">[등록하기]</a>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="5" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="100" height="30" align="center" background="../image/bg_center.jpg">
<b>고유번호</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>대분류명</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>순서</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>수정삭제</b>
</td>
<td width="500" align="center" background="../image/bg_center.jpg">
&nbsp;
</td>
</tr>
<tr><td colspan="5" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="5" height="3"></td></tr>
<?php
$query=mysqli_query($link,"select * from goods1 order by id desc limit 3");
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
<a href="goods2_write.php?fixid=<?php echo $row['fixnum']; ?>"><?php echo $row['name']; ?></a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="goods2_write.php?fixid=<?php echo $row['number']; ?>"><?php echo $row['number']; ?></a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="goods1_modify.php?id=<?php echo $row['id'] ?>">수정</a> <a href="goods1_delcheck.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>">삭제</a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
&nbsp;
</td>
</tr>
<tr><td colspan="5" height="1" bgcolor="#cccccc"></td></tr>
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
<!-- 중분류 -->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>중분류</B> <a href="goods2_list.php">[목록보기]</a>
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
<b>중분류명</b>
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
$query=mysqli_query($link,"select * from goods2 order by id desc limit 3");
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
<a href="goods3_write.php?fixid=<?php echo $row['fixnum']; ?>&gs2id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="goods2_modify.php?id=<?php echo $row['id'] ?>">수정</a> <a href="goods2_delcheck.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>">삭제</a>
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
<!-- 소분류 -->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>소분류</B> <a href="goods3_list.php">[목록보기]</a>
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
$query=mysqli_query($link,"select * from goods3 order by id desc limit 3");
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
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>