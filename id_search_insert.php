<?php
include "top.php";
include "main_left.php";
if(!isset($_REQUEST['member'])){$member  ="";} else {$member = $_REQUEST['member'];} 
if(!isset($_REQUEST['name'])){$name  ="";} else {$name = $_REQUEST['name'];} 
if(!isset($_REQUEST['jumin1'])){$jumin1  ="";} else {$jumin1 = $_REQUEST['jumin1'];} 
if(!isset($_REQUEST['jumin2'])){$jumin2  ="";} else {$jumin2 = $_REQUEST['jumin2'];} 

$result=mysqli_query($link,"select id from $member where name='$name' and jumin1='$jumin1' and jumin2='$jumin2'");
$numrows=mysqli_num_rows($result);
if($numrows<1){
?>
이름과 주민번호가 다릅니다.
<SCRIPT LANGUAGE='javascript'>
<!--
function seoromf_check(f)
{
if (f.name.value == '')
   { alert('이름을 입력하세요.'); f.name.focus(); return false; }
if (f.jumin1.value.length < 6)
   { alert('주민번호 앞자리를 입력하세요.'); f.jumin1.focus(); return false; }
if (f.jumin2.value.length < 7)
   { alert('주민번호 뒷자리를 입력하세요.'); f.jumin2.focus(); return false; }
}
//-->
</SCRIPT>

<!-- Document Start -->
<form action=id_search_insert.php method=post  name="seoromf" onSubmit="return seoromf_check(this);"> 
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
			<td valign="bottom" width="20" height="25">
				<img src="image/green_folder.jpg" border="0" vspace="5"> 
			</td>
			<td width="710">
			<span style=font-size:16pt;><b>아이디 및 비밀번호 찾기</b></span>
			</td>
			<td align="right">
             &nbsp;
			</td>
		</tr>
		</table>
		<p align="left">
		&nbsp; <font color="red">*</font> 는 반드시 입력해야 합니다.
		<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
		<tr>
			<td width="155" class="bgc_bar" height="2"></td>
			<td class="bgc_bar2"></td>
		</tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
			<font color="red">*</font> 이름</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="text" name="name" value="" maxlength="20" style="width:122px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 주민번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<input type="text" name="jumin1" value="" maxlength="6" style="width:50px">- 
			<input type="password" name="jumin2" value="" maxlength="7" style="width:60px">						
			</td>
		</tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
				&nbsp;		
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<INPUT type=submit name=submit size=10 value=" 이메일로 신청">
			</td>
		</tr>	
		</table>
</form>
<!-- Document End -->
	
<?php
} else {

$result2=mysqli_query($link,"select * from $member where name='$name' and jumin1='$jumin1' and jumin2='$jumin2'");
$row=mysqli_fetch_array($result2);
$memberid=$row['member_id'];
$memberpwd=$row['pass1'];
$membername=$row['name'];
$memberemail=$row['email'];


$subject = "온라인서점 회원 아이디 및 비밀번호 요청";
$content = "
<HTML>
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<title>온라인서점</title></head><body>$membername 님 온라인서점 회원정보입니다.<p><table border=\"0\"><tr><td></td></tr><tr><td><a href=\"http://localhost\" target=\"_blank\">온라인서점 바로가기</a><p>아이디 : $memberid <br>비밀번호 : $memberpwd <br><br></td></tr></table></body></html>
";

// 회원가입자에게 메일 보내기
mailer($admin_name, $admin_email, $memberemail, $subject, $content);

echo ("<meta http-equiv='Refresh' content='0; URL=home.php'>");

}
include "bottom.php";     // 하단 구성
?>
