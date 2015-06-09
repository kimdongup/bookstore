<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
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
<td width="880"> &nbsp;<B>접속통계</B> <a href="connect_referer_list.php">[상세보기](아이피,레퍼러,브라우즈,접속일)</a>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
전체접속자
</td>
<td width="100" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$querytotal=mysqli_query($link,"select cdate from connectsum");
$total=mysqli_num_rows($querytotal);
echo number_format($total); ?> 명
</td>
<td width="700" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$queryorderstart=mysqli_query($link,"select * from connectsum order by cdate asc limit 1");
$queryorderstart=mysqli_fetch_array($queryorderstart);
$queryorderend=mysqli_query($link,"select * from connectsum order by cdate desc limit 1");
$queryorderend=mysqli_fetch_array($queryorderend);
echo "[";
$startyear = date('Y',$queryorderstart['cdate']);
$startmonth = date('m',$queryorderstart['cdate']);
$startday = date('d',$queryorderstart['cdate']);
echo $startyear."/".$startmonth."/".$startday;
echo " ~ ";
$endyear = date('Y',$queryorderend['cdate']);
$endmonth = date('m',$queryorderend['cdate']);
$endday = date('d',$queryorderend['cdate']);
echo $endyear."/".$endmonth."/".$endday;
echo "]";
?>
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
1주간
</td>
<td width="100" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$timemk=mktime();
$weektime=$timemk-604800;
$queryorder7=mysqli_query($link,"select * from connectsum where cdate >= $weektime ");
$saleall7=mysqli_num_rows($queryorder7);
echo number_format($saleall7); ?> 명
</td>
<td width="700" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
echo "[";
$startyear7 = date('Y',$weektime);
$startmonth7 = date('m',$weektime);
$startday7 = date('d',$weektime);
echo $startyear7."/".$startmonth7."/".$startday7;
echo " ~ ";
$endyear7 = date('Y',$timemk);
$endmonth7 = date('m',$timemk);
$endday7 = date('d',$timemk);
echo $endyear7."/".$endmonth7."/".$endday7;
echo "]";
?>
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
1개월간
</td>
<td width="100" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$monthtime=$timemk-2592000;
$queryorder30=mysqli_query($link,"select * from connectsum where cdate >= $monthtime ");
$saleall30=mysqli_num_rows($queryorder30);
echo number_format($saleall30); ?> 명
</td>
<td width="700" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
echo "[";
$startyear30 = date('Y',$monthtime);
$startmonth30 = date('m',$monthtime);
$startday30 = date('d',$monthtime);
echo $startyear30."/".$startmonth30."/".$startday30;
echo " ~ ";
$endyear30 = date('Y',$timemk);
$endmonth30 = date('m',$timemk);
$endday30 = date('d',$timemk);
echo $endyear30."/".$endmonth30."/".$endday30;
echo "]";
?>
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
6개월간
</td>
<td width="100" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$monthstime=$timemk-15724800;
$queryorder182=mysqli_query($link,"select * from connectsum where cdate >= $monthstime ");
$saleall182=mysqli_num_rows($queryorder182);
echo number_format($saleall182); ?> 명
</td>
<td width="700" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
echo "[";
$startyear182 = date('Y',$monthstime);
$startmonth182 = date('m',$monthstime);
$startday182 = date('d',$monthstime);
echo $startyear182."/".$startmonth182."/".$startday182;
echo " ~ ";
$endyear182 = date('Y',$timemk);
$endmonth182 = date('m',$timemk);
$endday182 = date('d',$timemk);
echo $endyear182."/".$endmonth182."/".$endday182;
echo "]";
?>
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
1년간
</td>
<td width="100" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$yeartime=$timemk-31536000;
$queryorder365=mysqli_query($link,"select * from connectsum where cdate >= $yeartime ");
$saleall365=mysqli_num_rows($queryorder365);
echo number_format($saleall365); ?> 명
</td>
<td width="700" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
echo "[";
$startyear365 = date('Y',$yeartime);
$startmonth365 = date('m',$yeartime);
$startday365 = date('d',$yeartime);
echo $startyear365."/".$startmonth365."/".$startday365;
echo " ~ ";
$endyear365 = date('Y',$timemk);
$endmonth365 = date('m',$timemk);
$endday365 = date('d',$timemk);
echo $endyear365."/".$endmonth365."/".$endday365;
echo "]";
?>
</td>
</tr>
</table>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>브라우즈 접속통계</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<!-- 브라우즈별 통계 -->
<?php
$querywin=mysqli_query($link,"select * from connectsum where browser='windows'");
$winnums=mysqli_num_rows($querywin);
$querylinux=mysqli_query($link,"select * from connectsum where browser='linux'");
$linuxnums=mysqli_num_rows($querylinux);
$querymac=mysqli_query($link,"select * from connectsum where browser='macintosh'");
$macnums=mysqli_num_rows($querymac);
$queryunix=mysqli_query($link,"select * from connectsum where browser='unix'");
$unixnums=mysqli_num_rows($queryunix);
$queryetc=mysqli_query($link,"select * from connectsum where browser='etc'");
$etcnums=mysqli_num_rows($queryetc);
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
Windews
</td>
<td width="800" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo number_format($winnums); ?> 명
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
Linux
</td>
<td width="800" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo number_format($linuxnums); ?> 명
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
Macintosh
</td>
<td width="800" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo number_format($macnums); ?> 명
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
Unix
</td>
<td width="800" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo number_format($unixnums); ?> 명
</td>
</tr>
<tr>
<td width="100" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
Etc
</td>
<td width="800" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo number_format($etcnums); ?> 명
</td>
</tr>
</table>

<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>