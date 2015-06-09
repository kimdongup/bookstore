<?php
session_cache_limiter('nocache, must-revalidate');
include "top.php";  // 상단 메뉴
include "main_left.php";  // 상단 메뉴
include "js/member.js";  
?>
<!-- Document Start -->
<form action="member_insert.php" method=post  name="seoromf" enctype=multipart/form-data onSubmit="return seoromf_check(this);"> 
<INPUT type=hidden name=mod value="yes">

		<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
		<tr>
			<td valign="bottom" width="20" height="25">
				<img src="image/green_folder.jpg" border="0" vspace="5"> 
			</td>
			<td width="710">
			<span style=font-size:16pt;><b>회원가입을 진심으로 환영합니다.</b></span>
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
						<input type="text" name="member_id" value="" maxlength="20" style="width:122px" Onclick="IdCheck()">
						<INPUT type=hidden name=id_check size="1">
				<br style="font-size:4">
				필드 안을 클릭하시면 입력창이 나타납니다. 그 창에서 신청하세요.
				<br>다시 수정하고 싶을 때도 필드 안을 클릭만 하시면 창이 나타납니다.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 비밀번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="password" name="pass1" value="" maxlength="20" style="width:122px">
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 비밀번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="password" name="pass2" value="" maxlength="20" style="width:122px" onBlur="checkPwd()">
			<br style="font-size:4">확인을 위해 한번 더 넣으세요.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
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
			<input type="text" name="jumin1" value="" maxlength="6" style="width:50px" OnKeyUp="nextjmfd();">- 
			<input type="password" name="jumin2" value="" maxlength="7" style="width:60px">						
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 전화
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
                        <input type="text" style="width:40px" maxlength="4" name="tel1" value=""> -
						<input type="text" style="width:40px" maxlength="4" name="tel2" value=""> -
						<input type="text" style="width:40px" maxlength="4" name="tel3" value=""> 				
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				 <font color="red">*</font> 휴대폰
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
                                        <select name="htel1">
                                        <option value="">핸드폰 선택</option>
										<option value="010">010</option>
										<option value="011">011</option>
                                        <option value="016">016</option>
                                        <option value="017">017</option>
                                        <option value="018">018</option>
                                        <option value="019">019</option>
                                        
                                </select> -
						<input type="text" style="width:40px" maxlength="4" name="htel2" value=""> -
						<input type="text" style="width:40px" maxlength="4" name="htel3" value="">
		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 주소
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">					
			 <INPUT  TYPE=text  name=post1  size=3 maxlength=3> - 
             <INPUT  TYPE=text  name=post2  size=3 maxlength=3>
             <INPUT TYPE=button value=검색 onClick="PostCheck()"><br>
			 <input type="text" name="address" value="" maxlength="70" style="width:300px"><br>
			 <input type="text" name="post_num" value="" maxlength="50" style="width:300px">			 
         </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 닉네임
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
						<input type="text" name="nickname" value="" maxlength="20" style="width:122px" Onclick="NnCheck()">
						<INPUT type=hidden name=nn_check size="1">
				<br style="font-size:4">
				필드 안을 클릭하시면 입력창이 나타납니다. 그 창에서 신청하세요.
				<br>다시 수정하고 싶을 때도 필드 안을 클릭만 하시면 창이 나타납니다.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> E-mail(중요)				
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
						<input type="text" name="email" value="" maxlength="50" style="width:200px" Onclick="EmailCheck()">
						<INPUT type=hidden name=email_check size="1">
				<br style="font-size:4">
				필드 안을 클릭하시면 입력창이 나타납니다. 그 창에서 신청하세요.
				<br>다시 수정하고 싶을 때도 필드 안을 클릭만 하시면 창이 나타납니다.
				<br>* 본 이메일은 아이디,비밀번호등의 귀중한 자료 요청시 사용되므로 정확하게 입력하세요. 
				<br>* 본 이메일의 잘못된 입력이나 분실등의 모든 사항은 본인에게 책임이 있습니다.
				<br>* 따라서 본 이메일은 항상 사용하며 앞으로도 변하지 않을 이메일을 사용하세요. 
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 메일링
			</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="radio" name="mailing" value="1" checked>수신함&nbsp;&nbsp;
            <input type="radio" name="mailing" value="2">수신하지 않음
		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>		
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 관심분야			
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
          <INPUT TYPE=checkbox name="hobby1" value="1">php 
          <INPUT TYPE=checkbox name="hobby2" value="1">jsp 
		  <INPUT TYPE=checkbox name="hobby3" value="1">asp
          <INPUT TYPE=checkbox name="hobby4" value="1">java
          <INPUT TYPE=checkbox name="hobby5" value="1">포토샵 
          <INPUT TYPE=checkbox name="hobby6" value="1">플래시 
		  <INPUT TYPE=checkbox name="hobby7" value="1">프리미어
		  </td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> 직업
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<select name="job">
			<option value="">직업 선택</option>
			<option value="프로그래머/개발자">프로그래머/개발자</option>
			<option value="데이타베이스관리자">데이타베이스관리자</option>
			<option value="시스템관리자">시스템관리자</option>
			<option value="네트워크관리자">네트워크관리자</option>
			<option value="시스템설계자">시스템설계자</option>
			<option value="디자이너">디자이너</option>
			<option value="기타">기타</option>
		</select>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font > URL(홈페이지)				
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">								
			<input type="text" name="url" value="" maxlength="50" style="width:300px">
			<br>http://는 입력하지 마세요.
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font> SMS수신
				</td>
			<td bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="radio" name="sms" value="1" checked>수신함&nbsp;&nbsp;
            <input type="radio" name="sms" value="2">수신하지 않음
		  </td>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="blue">*</font > 아바타			
				</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<input type="radio" name="avatar" value="1" checked><img src="image/greekmyth_athena.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="2"><img src="image/greekmyth_dionysos.gif" border="0">&nbsp;
			<input type="radio" name="avatar" value="3"><img src="image/greekmyth_zeus.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="4"><img src="image/greekmyth_hermes.gif" border="0"><br>
			<input type="radio" name="avatar" value="5"><img src="image/greekmyth_artemis.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="6"><img src="image/greekmyth_demeter.gif" border="0">&nbsp;
			<input type="radio" name="avatar" value="7"><img src="image/greekmyth_aphrodite.gif" border="0">&nbsp;
            <input type="radio" name="avatar" value="8"><img src="image/greekmyth_eros.gif" border="0">&nbsp;
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
				<img id="pic1" width="42" height="55" src="image/jeungm.jpg" align="absbottom" onLoad="if(this.fileSize>300000)alert('300kbyte가 넘습니다.\n이사진은 업로드되지 않습니다.\n다시 넣어 주세요.')";>
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
								
						<input type="text" name="myinfo" value="" maxlength="100" style="width:550px">
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
			<INPUT type=submit name=submit size=10 value=" 회원가입 ">
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