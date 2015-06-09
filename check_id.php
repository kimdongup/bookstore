<HTML>
<HEAD>
<title>아이디 체크</title>
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script language=javascript>
<!--
function seoromf_check(f){

if (f.member_id.value.length < 3)
   { alert('영문과 숫자, 3자 이상 가능합니다.'); f.member_id.focus(); return false; }

var IdValue = f.member_id.value;
  for(var i=0; i<IdValue.length;i ++) {
    var UseWd = IdValue.charAt(i).toLowerCase();
    if(UseWd >="a" && UseWd <="z") continue;
    if(UseWd >="0" && UseWd <="9") continue;
    alert("영문과 숫자만 가능합니다."); f.member_id.focus(); 
return false;    
  }
}
//-->
</script>
</head>
		
		<font color="red">*</font>아이디를 신청하세요.
<form action=check_id_insert.php method=post  name=seoromf onSubmit="return seoromf_check(this);"> 
<INPUT type=hidden name=mod value="yes">

		<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
		<tr>
			<td width="100" bgcolor="#6666CC" height="2"></td>
			<td bgcolor="#9999FF"></td>
		</tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
				<font color="red">*</font> 아이디(ID)
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
				<font size="3" face="굴림체">				
						<input type="text" name="member_id" onblur="javascript:this.value=this.value.toLowerCase();" value="" maxlength="20" style="width:122px"></font>
							<br style="font-size:4">
						[영문 소문자와 숫자만 가능합니다.]

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
<script>document.seoromf.member_id.focus();</script>
</body>
</html>