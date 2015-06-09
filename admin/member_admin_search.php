<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['find'])){$find ="";} else {$find = $_REQUEST['find'];}
if(!isset($_REQUEST['search'])){$search ="";} else {$search = $_REQUEST['search'];}

if($my_admin_id && $my_admin_pwd){
    $numresults=mysqli_query($link,"select id from member where $find like '%$search%'");
    $numrows=mysqli_num_rows($numresults);
    $totalpage = ceil($numrows / $limit50);
    if($numrows < 1)
    echo "회원이 없습니다.";
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>회원관리</B>(총회원수 : <?php echo number_format($numrows); ?>명)
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<!-- 검색 -->
<table width="900"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="200">
</td>
<td width="500" height="30" style="padding-bottom:5px" valign="bottom">
<FORM NAME=Form1 METHOD=Post ACTION="member_admin_search.php" onSubmit="return Form1_check(this);">
<select name=find>
<option value=name>이름</option>
<option value=nickname> 닉네임</option>
<option value=email> 이메일</option>
</select>
<input type=text name=search size=12>
<input type=image src="../image/search_top" align="absmiddle">
</td>
<td width="200" valign="middle">
&nbsp;
</td>
</tr></form>
</table>
<!-- 검색 끝 -->

<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="10" height="1" bgcolor="#cccccc"></td></tr>
<tr border="1" bordercolordark="#CCCCCC" bordercolorlight="white">
<td width="100" height="30" align="center" background="image/bg_center.jpg">
<b>아이디</b>
</td>
<td width="100" align="center" background="../image/bg_center.jpg">
<b>이름</b>
</td>
<td width="100" align="center" background="image/bg_center.jpg">
<b>전화</b>
</td>
<td width="100" align="center" background="image/bg_center.jpg">
<b>휴대폰</b>
</td>
<td width="200" align="center" background="image/bg_center.jpg">
<b>이메일</b>
</td>
<td width="50" align="center" background="image/bg_center.jpg">
<b>캐쉬</b>
</td>
<td width="50" align="center" background="image/bg_center.jpg">
<b>포인터</b>
</td>
<td width="50" align="center" background="image/bg_center.jpg">
<b>등급</b>
</td>
<td width="100" align="center" background="image/bg_center.jpg">
<b>가일일자</b>
</td>
<td width="100" align="center" background="image/bg_center.jpg">
<b>수정삭제</b>
</td>
</tr>
<tr><td colspan="10" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="10" height="3"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$query=mysqli_query($link,"select * from member where $find like '%$search%' order by id desc limit $fromnum,$limit50");
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
<?php echo $row['member_id']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['name']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['tel1']."-".$row['tel2']."-".$row['tel3']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['htel1']."-".$row['htel2']."-".$row['htel3']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['cash']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['point']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php echo $row['grade']; ?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<?php 
$drtime=$row['join_day'];
$year = date('Y',$drtime);
$month = date('m',$drtime);
$day = date('d',$drtime);
echo $year."/".$month."/".$day;
?>
</td>
<td align="center" bgcolor="<?php echo $bgcolor; ?>">
<a href="member_modify.php?id=<?php echo $row['id'] ?>">수정</a> <a href="member_delcheck.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>">삭제</a>
</td>
</tr>
<tr><td colspan="10" height="1" bgcolor="#cccccc"></td></tr>
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