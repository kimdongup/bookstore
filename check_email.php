<HTML>
<HEAD>
<title>이메일 체크</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script language=javascript>
<!--
function seoromf_check(f){

if (f.email.value.length < 3)
   { alert('영문과 숫자, 3자 이상 가능합니다.'); f.email.focus(); return false; }

var EmailVal = f.email.value;
  for(var i=0; i<EmailVal.length;i ++) {
    var UseWd = EmailVal.charAt(i).toLowerCase(); // 소대문자통일시켜검사 charAt() 문자열 좌측부터 0으로 시작,  toLowerCase 문자열을 소문자로 바꾸는 메소드
    if(UseWd >="a" && UseWd <="z") continue;
    if(UseWd >="0" && UseWd <="9") continue;
    if(UseWd ="@") continue;
    alert("영문과 숫자만 가능합니다."); f.email.focus(); 
return false;    
  }


var emailg = f.email.value;
 if(emailg.search(/(\S+)@(\S+)\.(\S+)/)){
    alert ("잘 못된 형식입니다.");
    return false;
}


}
//-->
</script>
</head>
		
		<font color="red">*</font>이메일을 신청하세요.
<form action=check_email_insert.php method=post  name=seoromf onSubmit="return seoromf_check(this);"> 
<INPUT type=hidden name=mod value="yes">

		<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
		<tr>
			<td width="100" bgcolor="#6666CC" height="2"></td>
			<td bgcolor="#9999FF"></td>
		</tr>
		<tr>
			<td width="100" nowrap style="padding-left:15px" bgcolor="#CCCCFF" height="55">
				<font color="red">*</font> E-mail
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
				<font size="3" face="굴림체">				
						<input type="text" name="email"  onblur="javascript:this.value=this.value.toLowerCase();" value="" maxlength="50" style="width:122px"></font>
							<br style="font-size:4">
						[영문 소문자를 사용해 주세요.]

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
<script>document.seoromf.email.focus();</script>
</body>
</html>




