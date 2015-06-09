<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
?>
<HTML>
<HEAD>
<title>앙케트조사</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="author" content="서로닷컴(seoro.com)">
<meta name="keywords" content="서로닷컴,홈페이지제작,무료홈페이지제작,홈페이지제작업체,쇼핑몰제작,쇼핑몰제작업체,기업홈페이지제작,개인홈페이지제작,홈페이지제작업체,홈페이지제작템플릿,홈페이지만들기,홈페이지관리,홈페이지보수,홈페이지소스,홈페이지리모델링,홈페이지등록,홈페이지광고,도메인등록,도메인관리,웹호스팅,서버호스팅,">
<meta name="description" content="서로닷컴,홈페이지제작,무료홈페이지제작,홈페이지제작업체,쇼핑몰제작,쇼핑몰제작업체,기업홈페이지제작,개인홈페이지제작,홈페이지제작업체,홈페이지제작템플릿,홈페이지만들기,홈페이지관리,홈페이지보수,홈페이지소스,홈페이지리모델링,홈페이지등록,홈페이지광고,도메인등록,도메인관리,웹호스팅,서버호스팅,">
<meta name="classification" content="서로닷컴,홈페이지제작,무료홈페이지제작,홈페이지제작업체,쇼핑몰제작,쇼핑몰제작업체,기업홈페이지제작,개인홈페이지제작,홈페이지제작업체,홈페이지제작템플릿,홈페이지만들기,홈페이지관리,홈페이지보수,홈페이지소스,홈페이지리모델링,홈페이지등록,홈페이지광고,도메인등록,도메인관리,웹호스팅,서버호스팅,">
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table align="center" border="0" cellspacing="0" cellpadding="1" width="500" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 온라인 서점 앙케트 조사</b></p>
        </td>
    </tr>
</table>
<form name=Form1 method=post action="QuestionPollInsert.php">
<input type="hidden" name="mod" value="questionpollinsert">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="500">
<tr><td colspan="2" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="2" height="5"></td></tr>
<?php
$queryorder=mysql_query("select * from question where itemnum='0' order by rdate asc");
$countall=mysql_num_rows($queryorder);
if($countall < 1){
echo "<tr><td colspan=7 height=5>".$my_name. "등록된 앙케트 내역이 없습니다.</td></tr>";
} else {
while($roworder=mysql_fetch_array($queryorder))
{
?>
<tr>
<td width="50" align="center" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php echo $roworder[titlenum]; ?></td>
<td width="450" height="30" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;"><?php echo $roworder[title]; ?></td>
</tr>
<tr>
<td colspan="2" width="500" height="30">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="500">
<tr>
<td width="50" align="center" class="bgc_table2"></td>
<td width="450">
<span style=font-size:3pt;>&nbsp;</span><br>
<?php
$query2=mysql_query("select * from question where  titlenum='$roworder[titlenum]' && itemnum!='0' order by itemnum asc");
while($row2=mysql_fetch_array($query2))
{
?>
<input type="radio" name="a<?php=$roworder[id]?>" value="<?php=$row2[id]?>">&nbsp;&nbsp;
<?php
	echo $row2[id].". ".$row2[itemnum].". ".$row2[item]."<br>";
}
?>
<br><span style=font-size:3pt;>&nbsp;</span>
</td>
</tr>
</table>

</td>
</tr>
<tr><td colspan="2" height="3" bgcolor="#CCCCCC"></td></tr>
<?php
}
}
?>
<tr><td colspan="2" height="5">
<p>&nbsp;</p>
<p align="center"><input type=submit value="참가하기"></p>
</td></tr>
</table>
</body>
</html>