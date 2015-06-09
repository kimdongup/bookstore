<?php
include "../config/session_inc.php";
include "../config/lib.php";

if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
?>
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<SCRIPT LANGUAGE='javascript'>
<!--
function login_check(fr) {
    var Fm = document.login;

	if(!Fm.id.value) {
	alert("관리자 아이디를 입력하세요.");
	Fm.id.focus();
	return; 
	}
     if(!Fm.pwd.value) {
	alert("관리자 비밀번호를 입력하세요.");
	Fm.pwd.focus();
	return; }    
	
    if (fr == "mod1") { 
        Fm.action = "admin_login_search.php"
        Fm.submit(); 
    }
}

//-->
</SCRIPT>

<p>&nbsp;</p>
<table align="center" border="1" cellpadding="2" cellspacing="0" width="730" bgcolor="white" bordercolordark="white" bordercolorlight="#CCCCCC">
	<tr>                                    
	<td width="300"> 
	<form name=login method=post>
	<INPUT type=hidden name=mod value="admin_login_ck">
	<table width=300 border=0 cellpadding=0 cellspacing=0 align=center>
		<tr>
		<td width="200">

		<table width=200 border=0 cellpadding=0 cellspacing=0 align=center>
			<tr>
			<td width=120 align="right">관리자 아이디&nbsp;</td>
			<td width=80><INPUT type=text name=id style="width:70px" maxlength=20 value="<?php echo $my_member_id; ?>"></td>
			</tr>
			<tr>
			<td align="right">관리자 비밀번호&nbsp;</td> 
			<td><INPUT type=password name=pwd style="width:70px" maxlength=20 ></td>
			</tr>	
		</table>
		</td>
		<td width="100" valign="middle">
		<img src="../image/login_go.gif" border="0"  onClick="login_check('mod1');" style="cursor:hand"> 
		</td></form>
		</tr>
	</table>
	<td width="430">
		<span style="font-size:3pt;">&nbsp;</span><br>
	* 이곳은 온라인서점 쇼핑몰 관리자 로그인 페이지 입니다.
	<br><span style="font-size:3pt;">&nbsp;</span><br>
	* 관리자가 아닌 분이 접속을 시도하면 불법으로 형사처벌의 대상이 됩니다.
	<br><span style="font-size:3pt;">&nbsp;</span><br> 
	</td>
	</tr>
</table>