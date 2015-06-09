<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['$my_grade'])){$my_grade ="";} else {$my_grade = $_SESSION['$my_grade'];}
if($my_member_id){
	if($my_grade < 6){ // 5보다 적어야 관리자
?>
<HTML>
<HEAD>
<title>택배관리사</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="온라인서점">
<meta name="keywords" content="온라인서점">
<meta name="description" content="온라인서점">
<meta name="classification" content="온라인서점">
<LINK rel="stylesheet" type="text/css" href="./css/stylesheet.css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.pwd.value) {
	alert("택배사 비밀번호를 입력하세요.");
	Fm.pwd.focus();
	return; } 
  
	document.Form1.action = 'TransNumModifyInsert.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="transportinsert">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B><?php echo $kordernum; ?> 운송장 입력 및 수정</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<?php
$query=mysqli_query($link,"select * from transport where ordernum='$kordernum' ");
$row=mysqli_fetch_array($query);
?>
<input type="hidden" name="kordernum" value="<?php echo $kordernum?>">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 택배사 비밀번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="pwd" value="" maxlength="50" style="width:120px">
	</td>
	</tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 택배회사명
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="transco" value="<?php echo $row['transco']?>" maxlength="50" style="width:120px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 운송장번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="transnum" value="<?php echo $row['transnum']?>" maxlength="50" style="width:120px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[저장하기]</b></a>
</div>
<p>
<?php
}else{ msg("관리자가 아닙니다."); }
}else{ include "link_login.php"; }
mysql_close();
?>
</body>
</html>