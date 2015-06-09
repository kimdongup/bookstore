<?php
include "top.php";  // 상단 메뉴
include "main_left.php";  // 상단 메뉴
?>
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
include "bottom.php";     // 하단 구성
?>