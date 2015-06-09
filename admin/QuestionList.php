<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['delid'])){$delid ="";} else {$delid = $_REQUEST['delid'];}
if(!isset($_REQUEST['itemdelid'])){$itemdelid ="";} else {$itemdelid = $_REQUEST['itemdelid'];}
if(!isset($_REQUEST['titlenum'])){$titlenum ="";} else {$titlenum = $_REQUEST['titlenum'];}

if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}

if($my_admin_id && $my_admin_pwd){
    if($mod=="questiondel"){ // 질문을 삭제하면 보기도 모두 삭제
    $del = "delete from question where titlenum='$titlenum' ";
    $result=mysqli_query($link,$del);
    $del2 = "delete from question where id='$delid' ";
    $result=mysqli_query($link,$del2);
    }
    if($mod=="questionitemdel"){ 
    $del2 = "delete from question where id='$itemdelid' ";
    $result=mysqli_query($link,$del2);
    }
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="900" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 앙케트 내역</b> <a href="QuestionWrite.php">[앙케트 등록]</a></p>
        </td>
        <td align="right" width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="50" height="30" align="center">번호</td>
<td width="250" height="30" align="center">질문</td>
<td width="100" height="30" align="center">시작일</td>
<td width="100" height="30" align="center">마감일</td>
<td width="100" height="30" align="center">실시유무</td>
<td width="100" height="30" align="center">수정삭제</td>
<td width="100" height="30" align="center">보기등록</td>
</tr>
<tr><td colspan="8" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="8" height="5"></td></tr>
<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$queryorder=mysqli_query($link,"select * from question where itemnum='0' order by rdate desc limit $fromnum,$limit50");
$countall=mysqli_num_rows($queryorder);
$totalpage = ceil($countall / $limit50);

if($countall < 1){
echo "<tr><td colspan=7 height=5>".$my_name. "등록된 앙케트 내역이 없습니다.</td></tr>";
} else {
while($roworder=mysqli_fetch_array($queryorder))
{
?>
<tr>
<td width="50" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php echo $roworder['titlenum']; ?>.</td>
<td width="250" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php echo $roworder['title']; ?></td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"> 
<?php 
$ordertime=$roworder['sdate'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"> 
<?php 
$ordertime=$roworder['edate'];
$orderyear = date('Y',$ordertime);
$ordermonth = date('m',$ordertime);
$orderday = date('d',$ordertime);
echo $orderyear."/".$ordermonth."/".$orderday;
?>
</td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php if($roworder['yesno']=="y"){echo "yes";}else{echo "no";}; ?></td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<a href=QuestionModify.php?modifyid=<?php echo $roworder['id']?>&mod=questionmodify>[수정]</a>
    <a href=<?php echo $_SERVER['SCRIPT_NAME']?>?delid=<?php echo $roworder['id']?>&titlenum=<?php echo $roworder['titlenum']?>&mod=questiondel>[삭제]</a>
</td>
<td width="100" height="30" align="center" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><a href="QuestionItemWrite.php?id=<?php echo $roworder['id']?>&titlenum=<?php echo $roworder['titlenum']?>">보기등록</a></td>
</tr>
<tr>
<td colspan="8" width="900" height="30">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="50" align="center" class="bgc_table2"><b>보기</b></td>
<td width="850">
<span style=font-size:3pt;>&nbsp;</span><br>
<?php
$query2=mysqli_query($link,"select * from question where  titlenum='$roworder[titlenum]' && itemnum!='0' order by itemnum asc");
while($row2=mysqli_fetch_array($query2))
{
echo $row2['itemnum'].". ".$row2['item']."&nbsp;&nbsp;";
?>
<table border="0" cellpadding="0" cellspacing="0" width="850">
<tr>
<td width="400">
<!-- <a href=QuestionItemModify.php?modifyid=<?php echo $row2['id']?>&mod=questionitemmodify>[수정]</a> -->
<a href=<?php echo $_SERVER['SCRIPT_NAME']?>?itemdelid=<?php echo $row2['id']?>&mod=questionitemdel>[삭제]</a>
</td>
<td width="100">
투표수(<?php echo $row2['poll']; ?>)
</td>
<td width="350">
<?php
if($row2['poll'] != "0"){
?>
<table border="0" cellpadding="0" cellspacing="0" width="<?php echo $row2['poll']*10?>">
<tr>
<td width="<?php echo $row2['poll']*10?>" bgcolor="blue">
&nbsp;
</td>
</tr>
</table>
<?php
}
?>
</td>
</tr>
</table>
<?php
echo "<br>";
}
?>
<br><span style=font-size:3pt;>&nbsp;</span>
</td>
</tr>
</table>

</td>
</tr>
<tr><td colspan="8" height="3" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="8" height="5"></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{ msg("이곳은 관리자 메뉴입니다."); }
include "bottom.html";     // 하단 구성
?>