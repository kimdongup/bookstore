<SCRIPT LANGUAGE='javascript'>
<!--
function login_check(fr) {
    var Fm = document.login;

	if(!Fm.id.value) {
	alert("아이디를 입력하세요.");
	Fm.id.focus();
	return; 
	}
     if(!Fm.pwd.value) {
	alert("비밀번호를 입력하세요.");
	Fm.pwd.focus();
	return; }    
	
    if (fr == "mod1") { 
        Fm.action = "login_search.php"
        Fm.submit(); 
    }
}

	function login_ag() 
	{
		var forms = document.login_agree;
		var Fm = document.login_agree;
		if (!forms.agreement.checked) 
		{
			alert("자동로그인 신청합니다에  체크 하지 않으셨습니다.\n체크 하셔야 자동로그인을 신청할 수 있습니다.");
			forms.agreement.focus();
			return;
		}
		if(!Fm.id.value) {
		alert("아이디를 입력하세요.");
		Fm.id.focus();
		return; 
		}
		if(!Fm.pwd.value) {
		alert("비밀번호를 입력하세요.");
		Fm.pwd.focus();
		return; }  

		document.login_agree.action = 'login_search.php?mod=auto_login_ok';
	    document.login_agree.submit();
    }
//-->
</SCRIPT>

<p>&nbsp;</p>
<?php
if ($my_member_id && $my_pass1 && $my_name){
echo $my_name." 님께서는 이미 로그인이 되셨습니다.";
}else{
?>
<table align="center" border="1" cellpadding="2" cellspacing="0" width="730" bgcolor="white" bordercolordark="white" bordercolorlight="#CCCCCC">
	<tr>                                    
	<td width="300"> 
	<form name=login method=post>
	<INPUT type=hidden name=mod value="login_ck">
	<table width=300 border=0 cellpadding=0 cellspacing=0 align=center>
		<tr>
		<td width="160">

		<table width=160 border=0 cellpadding=0 cellspacing=0 align=center>
			<tr>
			<td width=60 align="right">아이디&nbsp;</td>
			<td width=80><INPUT type=text name=id style="width:70px" maxlength=20 value="<?php echo $my_member_id; ?>"></td>
			</tr>
			<tr>
			<td align="right">비밀번호&nbsp;</td> 
			<td><INPUT type=password name=pwd style="width:70px" maxlength=20 ></td>
			</tr>	
		</table>
		</td>
		<td width="140" valign="middle">
		<img src="image/login_go.gif" border="0"  onClick="login_check('mod1');" style="cursor:hand"> 
		</td></form>
		</tr>
	</table>
	<td width="430">
		<span style="font-size:3pt;">&nbsp;</span><br>
	* 아이디는 소문자만 허용됩니다.
	<br><span style="font-size:3pt;">&nbsp;</span><br>
	* 비밀번호는 대소문자 구별됩니다.
	<br><span style="font-size:3pt;">&nbsp;</span><br> 
	&nbsp;&nbsp<a href="id_search.php"><b>아이디 찾기</b></a> /
	<a href="id_search.php"><b>비밀번호 찾기</b></a>
	<br><span style="font-size:3pt;">&nbsp;</span><br> 
	</td>
	</tr>
</table>
<?php
}
?>
<br><span style="font-size:3pt;">&nbsp;</span><br> 
<table align="center" border="1" cellpadding="2" cellspacing="0" width="730" bgcolor="white" bordercolordark="white" bordercolorlight="#CCCCCC">
	<tr>                                    
	<td align="center" width="730"> 
	<table width=700 border=0 cellpadding=0 cellspacing=0 align=center>
		<tr>
		<td width="700">
		<br><span style="font-size:3pt;">&nbsp;</span><br>
		<b>자동로그인 신청</b>
		<br><span style="font-size:8pt;">&nbsp;</span><br>
		* 공공의 장소에 설치된 컴퓨터에서는 자동로그인 신청을 하지 마세요.
		<br><span style="font-size:3pt;">&nbsp;</span><br> 
		* 자동로그인이 신청된 컴퓨터는 누구나 로그인이 가능합니다.
		<br><span style="font-size:3pt;">&nbsp;</span><br>
		* 혼자 사용하는 컴퓨터에서만 자동로그인을 신청하세요.

		<form name="login_agree" method="post">
		<div align="left">자동로그인 신청합니다. 
		<input type="checkbox" name="agreement" value="">
		<br><span style="font-size:3pt;">&nbsp;</span><br>
		아이디 : <INPUT type=text name=id style="width:70px" maxlength=20 value="<?php echo $my_member_id; ?>">
		비밀번호 : <INPUT type=password name=pwd style="width:70px" maxlength=20 >
		</div>
		</form>
		<div align="left">
		<a href="javascript:login_ag();">
		<img src="image/application.gif" border="0"></a>
		</div>

		</td>
		</tr>
	</table>

	</td>
	</tr>
</table>
<p>&nbsp;</p>