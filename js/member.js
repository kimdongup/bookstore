<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT LANGUAGE="JavaScript">
<!--

function seoromf_check(f)
{
if (f.member_id.value == '')
   { alert('아이디를 입력하세요.'); f.member_id.focus(); return false; }
if (f.id_check.value == '')
   { alert('아이디가 정상적으로 신청되지 않았습니다.\n아이디를 다시 신청하세요.'); f.member_id.focus(); return false; }
if (f.pass1.value == '')
   { alert('비밀번호를 입력하세요.'); f.pass1.focus(); return false; }
if (f.pass2.value == '')
   { alert('비밀번호를 입력하세요.'); f.pass2.focus(); return false; }
if (f.name.value == '')
   { alert('이름을 입력하세요.'); f.name.focus(); return false; }
if (f.jumin1.value.length < 6)
   { alert('주민번호 앞자리를 입력하세요.'); f.jumin1.focus(); return false; }
if (f.jumin2.value.length < 7)
   { alert('주민번호 뒷자리를 입력하세요.'); f.jumin2.focus(); return false; }

// 주민번호 숫자와 문자 검사
ju_ch1 = isNaN(f.jumin1.value)
ju_ch2 = isNaN(f.jumin2.value)
if ((ju_ch1 == true) || (ju_ch2 == true)){
alert("주민번호가 잘못되었습니다.\n다시 입력해 주십시오."); f.jumin1.focus(); return false;
}

// 주민번호 월, 일의 검사
var jumin_ch = f.jumin1.value;
ch2_month = jumin_ch.substr(2,2)
ch3_date = jumin_ch.substr(4,2)
if(ch2_month > 12) {alert("주민번호가 잘못되었습니다.\n다시 입력해 주십시오."); f.jumin1.focus(); return false; }
if(ch3_date > 31) {alert("주민번호가 잘못되었습니다.\n다시 입력해 주십시오."); f.jumin1.focus(); return false; }

// 주민번호 타당성 검사
var jumin_t_ch1 = f.jumin1.value;
var jumin_t_ch2 = f.jumin2.value;
jsum=0
jnum = new Array(13)

for(i=1;i<7;i++)jnum[i] = jumin_t_ch1.charAt(i-1)
for(i=7;i<14;i++)jnum[i] = jumin_t_ch2.charAt(i-7)
// charAt(a) 문자열 좌측부터 0으로 시작 a번째의 문자를 표시함 

for(i=1;i<13;i++){
k=i+1
if(k>9)k=(k%10)+2
jsum = jsum + (jnum[i] * k)
}

last_num = (11-(jsum % 11)) % 10
if(last_num != jnum[13])
{
	alert("잘못된 주민등록번호입니다.\n다시 입력해 주십시오.");
	f.jumin1.focus();
		return false;
}

if (f.htel1.value == '')
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
if (f.nickname.value == '')
   { alert('닉네임을 입력하세요.'); f.nickname.focus(); return false; }
if (f.nn_check.value == '')
   { alert('닉네임이 정상적으로 신청되지 않았습니다.\n닉네임을 다시 신청하세요.'); f.nickname.focus(); return false; }
if (f.email.value == '')
   { alert('이메일을 입력하세요.'); f.email.focus(); return false; }
if (f.email_check.value == '')
   { alert('이메일이 정상적으로 신청되지 않았습니다.\n이메일을 다시 신청하세요.'); f.email.focus(); return false; }

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

// 주민번호 자동으로 다음칸 넘기기
function nextjmfd() {
	var str = document.seoromf.jumin1.value.length;
	if(str == 6)
		document.seoromf.jumin2.focus();
}

// 아이디 검사
function IdCheck(){
window.open("check_id.php","","left=0,top=0,scrollbars=auto,resizable=no,width=380,height=250");
}

// 닉네임 검사
function NnCheck(){
window.open("check_nn.php","","left=0,top=0,scrollbars=auto,resizable=no,width=380,height=250");
}

// 이메일 검사
function EmailCheck(){
window.open("check_email.php","","left=0,top=0,scrollbars=auto,resizable=no,width=380,height=250");
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