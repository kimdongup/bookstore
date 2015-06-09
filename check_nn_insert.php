<?php
include "config/session_inc.php";
include "config/lib.php";
$mod=$_REQUEST['mod'];
$nickname=$_REQUEST['nickname'];

if($mod)
{
$query="select nickname from $member where nickname='$nickname' ";
if(mysqli_num_rows(mysqli_query($link,$query)) > 0) {
?>
<HTML>
<HEAD>
<title>닉네임 체크</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>

		<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
		<tr>
			<td width="100" bgcolor="#6666CC" height="2"></td>
			<td bgcolor="#9999FF"></td>
		</tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
			신청 닉네임
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
     		<?php echo $nickname; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
			결과
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<?php echo "이미 존재하는 닉네임입니다.<br>다시 신청해 주십시오."; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
			&nbsp;
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<a href="check_nn.php"><img src="image/application2.gif" border="0"></a>
			</td>
		</tr>
		</table>
</body>
</html>
<?php
}else{
?>
<HTML>
<HEAD>
<title>닉네임 체크</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script language=javascript>
<!--
function nn_insert(nickname,check_nn)
{
    opener.document.seoromf.nickname.value = nickname;
    opener.document.seoromf.nn_check.value = check_nn;
	opener.document.seoromf.email.focus();
	self.close();
}
//-->
</script>
</head>
<body>

		<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
		<tr>
			<td width="100" bgcolor="#6666CC" height="2"></td>
			<td bgcolor="#9999FF"></td>
		</tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
			신청 닉네임
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
     		<?php echo $nickname; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
			결과
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<?php echo "축하합니다.<br>사용할 수 있는 닉네임입니다."; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
			&nbsp;
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<a href="javascript:nn_insert('<?php echo $nickname; ?>','y');"><img src="image/application.gif" border="0"></a>
			</td>
		</tr>
		</table>
</body>
</html>
<?php
}
}else{
echo "잘못된 접근입니다.";
}
?>