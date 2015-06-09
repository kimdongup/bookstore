<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['delid'])){$delid  ="";} else {$delid  = $_REQUEST['delid'];}

if($my_admin_id && $my_admin_pwd){
if($mod=="consutdel"){ // 답변삭제
$del = "delete from consult where id='$delid' ";
$result=mysqli_query($link,$del);
}
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 1 : 1 상담 내역</b></p>
        </td>
        <td align="right" width="670" height="30" bgcolor="#99CCFF">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" height="30" align="left">신청자</td>
<td width="400" height="30" align="center">제목</td>
<td width="100" height="30" align="center">등록일</td>
<td width="300" height="30" align="center">&nbsp;</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="4" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$queryorder=mysqli_query($link,"select * from consult where reply='0' order by rdate desc limit $fromnum,$limit50");
$countall=mysqli_num_rows($queryorder);
$totalpage = ceil($countall / $limit50);

if($countall < 1){
echo "<tr><td colspan=7 height=5>".$my_name. "님의 상담 신청 내역이 없습니다.</td></tr>";
} else {
while($roworder=mysqli_fetch_array($queryorder))
{
?>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php echo $roworder['memberid']; ?></td>
<td width="400" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php echo $roworder['title']; ?></td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"> 
<?php 
$ordertime=$roworder['rdate'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="300" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">&nbsp;
</td>
</tr>
<tr>
<td colspan="4" width="900" height="30">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" align="center" class="bgc_table2"><b>질문</b></td>
<td width="800">
<span style=font-size:3pt;>&nbsp;</span><br>
<?php echo nl2br($roworder['content']); ?>
<br><span style=font-size:3pt;>&nbsp;</span>
</td>
</tr>
</table>

</td>
</tr>
<tr><td colspan="4" height="1" bgcolor="#CCCCCC"></td></tr>
<tr>
<td colspan="4" width="900" height="30">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" align="center" class="bgc_table2"><b>답변</b></td>
<td width="800">
<span style=font-size:3pt;>&nbsp;</span><br>
<?php
$querycs=mysqli_query($link,"select * from consult where reply='$roworder[id]' order by id desc");
$countcs=mysqli_num_rows($querycs);
if($countcs > 0){
while($rowcs=mysqli_fetch_array($querycs)){
?>
<span style=font-size:3pt;>&nbsp;</span><br>
<?php echo nl2br($rowcs['content']); ?>
<br><span style=font-size:3pt;>&nbsp;</span><br>
<a href="direct_modify.php?modifyid=<?php echo $rowcs['id']?>&mod=consutmodify">[수정]</a>
<a href="<?php echo $_SERVER['SCRIPT_NAME']?>?delid=<?php echo $rowcs['id']?>&mod=consutdel">[삭제]</a>
<?php
}
}else{
echo "<a href=direct_write.php?id=$roworder[id]>[답변하기]</a>";
}
?>
<br><span style=font-size:3pt;>&nbsp;</span>
</td>
</tr>
</table>

</td>
</tr>
<tr><td colspan="4" height="3" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="4" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>