<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}
if(!isset($_REQUEST['delid'])){$delid  ="";} else {$delid  = $_REQUEST['delid'];}
if(!isset($_REQUEST['delfilename'])){$delfilename  ="";} else {$delfilename  = $_REQUEST['delfilename'];}
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_admin_id && $my_admin_pwd){
if($mod=="bannerdel"){ // 배너삭제
$delfilename1="../bannerimg/$delfilename";
if(!@unlink($delfilename1)) {
	echo "파일삭제 실패";
} else {
	echo "파일 삭제 성공";
}
$del = "delete from banner where id='$delid' ";
$result=mysqli_query($link,$del);
}
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 배너 로테이션 광고</b> <a href="banner_write.php">[배너 로테이션 광고 신청]</a></p>
        </td>
        <td align="right" width="400" height="30" bgcolor="#99CCFF">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="110" height="30" align="center">이미지</td>
<td width="240" height="30" align="center">url</td>
<td width="100" height="30" align="center">광고번호</td>
<td width="250" height="30" align="center">내용</td>
<td width="100" height="30" align="center">등록일</td>
<td width="100" height="30" align="center">수정삭제</td>
</tr>
<tr><td colspan="6" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="6" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$queryorder=mysqli_query($link,"select * from banner order by rdate desc limit $fromnum,$limit50");
$countall=mysqli_num_rows($queryorder);
$totalpage = ceil($countall / $limit50);

if($countall < 1){
echo "<tr><td colspan=7 height=5>배너 내역이 없습니다.</td></tr>";
} else {
while($roworder=mysqli_fetch_array($queryorder))
{
?>
<tr>
<td width="110" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<img src="../bannerimg/<?php echo $roworder['filename']?>" width="100" height="75"></td>
<td width="240" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php echo $roworder['url']; ?></td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"> 
<?php echo $roworder['action']; ?>
</td>
<td width="250" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"> 
<?php echo $roworder['content']; ?>
</td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
$ordertime=$roworder['rdate'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<a href="banner_modify.php?modifyid=<?php echo $roworder['id']?>&mod=bannermodify">수정</a> 
<a href="<?php echo $_SERVER['SCRIPT_NAME']?>?delid=<?php echo $roworder['id']?>&delfilename=<?php echo $roworder['filename']?>&mod=bannerdel">삭제</a>
</td>
</tr>
<?php
}
}
?>
<tr><td colspan="6" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>