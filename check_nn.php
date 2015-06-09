<HTML>
<HEAD>
<title>닉네임체크-</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script language=javascript>
<!--
function seoromf_check(f){

if (f.nickname.value.length < 2)
   { alert('2자이상만 가능합니다.'); f.nickname.focus(); return false; }

}
//-->
</script>
</head>
		
		<font color="red">*</font>닉네임을 신청하세요.
<form action=check_nn_insert.php method=post  name=seoromf onSubmit="return seoromf_check(this);"> 
<INPUT type=hidden name=mod value="yes">

		<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
		<tr>
			<td width="100" bgcolor="#6666CC" height="2"></td>
			<td bgcolor="#9999FF"></td>
		</tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
				<font color="red">*</font> 닉네임
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
				<font size="3" face="굴림체">				
						<input type="text" name="nickname"  onblur="javascript:this.value=this.value.toLowerCase();" value="" maxlength="20" style="width:122px"></font>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
				&nbsp;		
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<INPUT type=submit name=submit size=10 value=" 신 청 ">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<INPUT type=reset name=submit size=10 value=" 다 시 ">
			</td>
		</tr>	
		</table>
</form>
<script>document.seoromf.nickname.focus();</script>
</body>
</html>