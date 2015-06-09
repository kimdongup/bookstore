<?php
include "config/session_inc.php";
include "config/lib.php";
$mod=$_REQUEST['mod'];
$member_id=$_REQUEST['member_id'];

if($mod)
{
$query="select member_id from $member where member_id='$member_id' ";
if(mysqli_num_rows(mysqli_query($link,$query)) > 0) {
?>
<HTML>
<HEAD>
<title>아이디 체크</title>
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
			신청 아이디(ID)
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
     		<?php echo $member_id; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
			결과
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<?php echo "이미 존재하는 아이디(ID)입니다.<br>다시 신청해 주십시오."; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
			&nbsp;
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<a href="check_id.php"><img src="image/application2.gif" border="0"></a>
			</td>
		</tr>
		</table>
<?php				
}else{
?>

<HTML>
<HEAD>
<title>서로닷컴-아이디 체크</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script language=javascript>
<!--
function id_insert(member_id,check_id)
{
    opener.document.seoromf.member_id.value = member_id;
    opener.document.seoromf.id_check.value = check_id;
	opener.document.seoromf.pass1.focus();
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
			신청 아이디(ID)
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
     		<?php echo $member_id; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
			결과
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<?php echo "축하합니다.<br>사용할 수 있는 아이디(ID)입니다."; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
			&nbsp;
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<a href="javascript:id_insert('<?php echo $member_id; ?>','y');"><img src="image/application.gif" border="0"></a>
			</td>
		</tr>
		</table>
<?php
}
}else{
$message="잘못된 접근입니다.";
}

?>