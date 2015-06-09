<?php
session_cache_limiter('nocache, must-revalidate');
include "top.php";  // 상단 메뉴
include "MyPageLeft.php";  // 상단 메뉴
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}

$query=mysqli_query($link,"select * from member where member_id='$my_member_id'");
$row=mysqli_fetch_array($query);
?>
<!-- Document Start -->
<SCRIPT LANGUAGE="JavaScript">
<!--

function seoromf_check(f)
{
if (f.pass1.value == '')
   { alert('비밀번호를 입력하세요.'); f.pass1.focus(); return false; }
if (f.pass2.value == '')
   { alert('비밀번호를 입력하세요.'); f.pass2.focus(); return false; }
if (f.htel.value == '')
   { alert('휴대폰을 입력하세요.'); f.htel1.focus(); return false; }
if (f.htel2.value == '')
   { alert('휴대폰을 입력하세요.'); f.htel2.focus(); return false; }
if (f.htel3.value == '')
   { alert('휴대폰을 입력하세요.'); f.htel3.focus(); return false; }
if (f.post1.value == '')
   { alert('검색으로 자신의 주소를 찾으세요.'); f.post1.focus(); return false; }
if (f.post2.value == '')
   { alert('검색으로 자신의 주소를 찾으세요.'); f.post2.focus(); return false; }
if (f.address.value == '')
   { alert('검색으로 자신의 주소를 찾으세요.'); f.address.focus(); return false; }
if (f.nn_check.value == '')
   { alert('이메일을 입력하세요.'); f.emial.focus(); return false; }
return (true);
}

// 비밀번호 검사
function checkPwd()
{
  if( document.seoromf.pass1.value != document.seoromf.pass2.value )
  {
    alert("비밀번호가 일치하지 않습니다.");
    document.seoromf.pass1.value="";
    document.seoromf.pass2.value="";
    document.seoromf.pass1.focus();
    return false;
  }

}

// 우편번호 검사  
function PostCheck(){
	window.open("check_post.php","","left=0,top=0,scrollbars=yes,resizable=no,width=550,height=200");
}

function show_pic(img,names) {
var oInput = event.srcElement; 
var fname = oInput.value; 
if((/(.jpg|.jpeg|.gif|.png)$/i).test(fname))
	{
  oInput.parentElement.children[0].src = fname;
    document.images["pic"+img].style.display = "none";
    document.images["pic"+img].style.display = "";
    document.images["pic"+img].src = seoromf.elements[names].value; 

	}
else {
  alert('이미지는 gif, jpg, png 파일만 가능합니다. 다시 넣으세요.');
}

}

// --></SCRIPT>

<form action=MyInfoIns.php method=post  name="seoromf" enctype=multipart/form-data onSubmit="return seoromf_check(this);"> 
<INPUT type=hidden name=mod value="yes">
<INPUT type=hidden name=id value="<?php echo $row['id']?>">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
			<td valign="bottom" width="20" height="25">
				<img src="image/green_folder.jpg" border="0" vspace="5"> 
			</td>
			<td width="710">
			<span style=font-size:16pt;><b><?php echo $my_name; ?>님 정보(변경)</b></span>
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
				<font color="red">*</font> 아이디(ID)
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<?php echo $my_member_id; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 비밀번호변경여부
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
            <input type="radio" name="pwdchange" value="1" checked>비밀번호 변경하지 않음&nbsp;&nbsp;
            <input type="radio" name="pwdchange" value="2">비밀번호 변경함
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 비밀번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="password" name="pass1" value="<?php echo $row['pass1']; ?>" maxlength="20" style="width:122px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 비밀번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="password" name="pass2" value="<?php echo $row['pass1']; ?>" maxlength="20" style="width:122px" onBlur="checkPwd()">
			<br style="font-size:4">확인을 위해 한번 더 넣으세요.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
			<font color="red">*</font> 이름</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<?php echo $row['name']; ?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 주민번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<?php echo $row['jumin1']; ?> - *******		
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 전화
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
                        <input type="text" style="width:40px" maxlength="4" name="tel1" value="<?php echo $row['tel1']; ?>"> -
						<input type="text" style="width:40px" maxlength="4" name="tel2" value="<?php echo $row['tel2']; ?>"> -
						<input type="text" style="width:40px" maxlength="4" name="tel3" value="<?php echo $row['tel3']; ?>"> 				
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				 <font color="red">*</font> 휴대폰
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
                                        <select name="htel1">
                                        <option value=""<?php if($row['htel1']== "") echo "selected" ?>>핸드폰 선택</option>
					<option value="010"<?php if($row['htel1']=="010") echo "selected" ?>>010</option>
					<option value="011"<?php if($row['htel1']=="011") echo "selected" ?>>011</option>
                                        <option value="016"<?php if($row['htel1']=="016") echo "selected" ?>>016</option>
                                        <option value="017"<?php if($row['htel1']=="017") echo "selected" ?>>017</option>
                                        <option value="018"<?php if($row['htel1']=="018") echo "selected" ?>>018</option>
                                        <option value="019"<?php if($row['htel1']=="019") echo "selected" ?>>019</option>
                                        
                                </select> -
						<input type="text" style="width:40px" maxlength="4" name="htel2" value="<?php echo $row['htel2']; ?>"> -
						<input type="text" style="width:40px" maxlength="4" name="htel3" value="<?php echo $row['htel3']; ?>">
		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 주소
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">					
			 <INPUT  TYPE=text  name=post1  size=3 maxlength=3 value="<?php echo $row['post1']?>"> - 
             <INPUT  TYPE=text  name=post2  size=3 maxlength=3 value="<?php echo $row['post2']?>">
             <INPUT TYPE=button value=검색 onClick="PostCheck()"><br>
			 <input type="text" name="address" value="<?php echo $row['address']?>" maxlength="70" style="width:300px"><br>
			 <input type="text" name="post_num" value="<?php echo $row['post_num']?>" maxlength="50" style="width:300px">			 
         </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 닉네임
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<?php echo $row['nickname']?>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 이메일변경여부
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
            <input type="radio" name="emailsj" value="1" checked>이메일 변경하지 않음&nbsp;&nbsp;
            <input type="radio" name="emailsj" value="2">이메일 변경함
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> E-mail(중요)				
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
						<input type="text" name="email" value="<?php echo $row['email']?>" maxlength="50" style="width:200px">
				<br>* 이메일을 변경하고 싶을 때는 변경할 이메일을 입력하세요.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 메일링
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="radio" name="mailing" value="1"<?php if($row['mailing']=="1") echo "checked" ?>>수신함&nbsp;&nbsp;
            <input type="radio" name="mailing" value="2"<?php if($row['mailing']=="2") echo "checked" ?>>수신하지 않음
		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>		
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 관심분야			
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
          <INPUT TYPE=checkbox name="hobby1" value="1"<?php if($row['hobby1']=="1") echo "checked" ?>>php 
          <INPUT TYPE=checkbox name="hobby2" value="1"<?php if($row['hobby2']=="1") echo "checked" ?>>jsp 
	  <INPUT TYPE=checkbox name="hobby3" value="1"<?php if($row['hobby3']=="1") echo "checked" ?>>asp
          <INPUT TYPE=checkbox name="hobby4" value="1"<?php if($row['hobby4']=="1") echo "checked" ?>>java
          <INPUT TYPE=checkbox name="hobby5" value="1"<?php if($row['hobby5']=="1") echo "checked" ?>>포토샵 
          <INPUT TYPE=checkbox name="hobby6" value="1"<?php if($row['hobby6']=="1") echo "checked" ?>>플래시 
	  <INPUT TYPE=checkbox name="hobby7" value="1"<?php if($row['hobby7']=="1") echo "checked" ?>>프리미어
		  </td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 직업
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<select name="job">
			<option value=""<?php if($row['job']=="") echo "selected" ?>>직업 선택</option>
			<option value="프로그래머/개발자"<?php if($row['job']=="프로그래머/개발자") echo "selected" ?>>프로그래머/개발자</option>
			<option value="데이타베이스관리자"<?php if($row['job']=="데이타베이스관리자") echo "selected" ?>>데이타베이스관리자</option>
			<option value="시스템관리자"<?php if($row['job']=="시스템관리자") echo "selected" ?>>시스템관리자</option>
			<option value="네트워크관리자"<?php if($row['job']=="네트워크관리자") echo "selected" ?>>네트워크관리자</option>
			<option value="시스템설계자"<?php if($row['job']=="시스템설계자") echo "selected" ?>>시스템설계자</option>
			<option value="디자이너"<?php if($row['job']=="디자이너") echo "selected" ?>>디자이너</option>
			<option value="기타"<?php if($row['job']=="기타") echo "selected" ?>>기타</option>
		</select>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font > URL(홈페이지)				
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="text" name="url" value="<?php echo $row['url']?>" maxlength="50" style="width:300px">
			<br>http://는 입력하지 마세요.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> SMS수신
				</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="radio" name="sms" value="1"<?php if($row['sms']=="1") echo "checked" ?>>수신함&nbsp;&nbsp;
            <input type="radio" name="sms" value="2"<?php if($row['sms']=="2") echo "checked" ?>>수신하지 않음
		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font > 아바타			
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<input type="radio" name="avatar" value="1"<?php if($row['avatar']=="1") echo "checked" ?>><img src="image/greekmyth_athena.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="2"<?php if($row['avatar']=="2") echo "checked" ?>><img src="image/greekmyth_dionysos.gif" border="0">&nbsp;
			<input type="radio" name="avatar" value="3"<?php if($row['avatar']=="3") echo "checked" ?>><img src="image/greekmyth_zeus.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="4"<?php if($row['avatar']=="4") echo "checked" ?>><img src="image/greekmyth_hermes.gif" border="0"><br>
			<input type="radio" name="avatar" value="5"<?php if($row['avatar']=="5") echo "checked" ?>><img src="image/greekmyth_artemis.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="6"<?php if($row['avatar']=="6") echo "checked" ?>><img src="image/greekmyth_demeter.gif" border="0">&nbsp;
			<input type="radio" name="avatar" value="7"<?php if($row['avatar']=="7") echo "checked" ?>><img src="image/greekmyth_aphrodite.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="8"<?php if($row['avatar']=="8") echo "checked" ?>><img src="image/greekmyth_eros.gif" border="0">&nbsp;
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 내사진					
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<table align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td width="475">								
				<input type="file" size="60" name="imgup1" class="input" onChange="show_pic('1','imgup1');">
				<br style="font-size:4">
				사진은 100*130 픽셀(최대크기:640*480)로 보입니다.<br>
				내사진이 아바타를 우선합니다.<br>
				내 사진을 업로드하면 아바타 대신 사진이 보입니다.
				</td>
				<td width="100">				
				<img id="pic1" width="42" height="55" src="<?php if($row['filename'] !== ""){ echo "s_memberimg/$row[filename]"; } else { echo "image/jeungm.jpg"; } ?>" align="absbottom" onLoad="if(this.fileSize>300000)alert('300kbyte가 넘습니다.\n이사진은 업로드되지 않습니다.\n다시 넣어 주세요.')";>
				</td>
				</tr>
				</table>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font > 자기소개			
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
								
						<input type="text" name="myinfo" value="<?php echo $row['myinfo']; ?>" maxlength="100" style="width:550px">
				<br style="font-size:4">
				100자 이내로 자신을 잘 소개하세요. 
				<br>게시판이나 기타 등록물 출력 때 소개됩니다.<br>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" bgcolor="#fcfcfc" height="55">
				&nbsp;		
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<INPUT type=submit name=submit size=10 value=" 정보수정 ">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<INPUT type=reset name=submit size=10 value="다시작성">
			</td>
		</tr>	
		</table>
</form>
<!-- Document End -->
<?php
include "bottom.php";     // 하단 구성
?>