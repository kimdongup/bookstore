<?php
include "top.php";
include "main_left.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1 ="";} else {$my_pass1 = $_SESSION['my_pass1'];}
if(!isset($_SESSION['my_name'])){$my_name ="";} else {$my_name = $_SESSION['my_name'];}
if(!isset($_SESSION['my_tel1'])){$my_tel1 ="";} else {$my_tel1 = $_SESSION['my_tel1'];}
if(!isset($_SESSION['my_tel2'])){$my_tel2 ="";} else {$my_tel2 = $_SESSION['my_tel2'];}
if(!isset($_SESSION['my_tel3'])){$my_tel3 ="";} else {$my_tel3 = $_SESSION['my_tel3'];}
if(!isset($_SESSION['my_htel1'])){$my_htel1 ="";} else {$my_htel1 = $_SESSION['my_htel1'];}
if(!isset($_SESSION['my_htel2'])){$my_htel2 ="";} else {$my_htel2 = $_SESSION['my_htel2'];}
if(!isset($_SESSION['my_htel3'])){$my_htel3 ="";} else {$my_htel3 = $_SESSION['my_htel3'];}
if(!isset($_SESSION['post1'])){$post1 ="";} else {$post1 = $_SESSION['post1'];}
if(!isset($_SESSION['post2'])){$post2 ="";} else {$post2 = $_SESSION['post2'];}
if(!isset($_SESSION['address'])){$address ="";} else {$address = $_SESSION['address'];}
if(!isset($_SESSION['post_num'])){$post_num ="";} else {$post_num = $_SESSION['post_num'];}
if(!isset($_SESSION['my_email'])){$my_email ="";} else {$my_email = $_SESSION['my_email'];}
if(!isset($_REQUEST['orderquantity'])){$orderquantity ="";} else {$orderquantity = $_REQUEST['orderquantity'];}
if(!isset($_SESSION['largeordernum'])){$largeordernum  =1;} else {$largeordernum  = $_SESSION['largeordernum'];}
if(!isset($_REQUEST['id'])){$id  =1;} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['goodsid'])){$goodsid  =1;} else {$goodsid  = $_REQUEST['goodsid'];}

if($my_member_id && $my_pass1){
$timenum=mktime();
if (!$largeordernum) {
	$ipnum = strtolower(substr(strrchr($_SERVER['REMOTE_ADDR'],"."), 1));
	$largeordernum=$timenum.$ipnum;
	$_SESSION['largeordernum']= $largeordernum;
}
$result=mysqli_query($link,"select * from largepurchase where id='$id'");
$row=mysqli_fetch_array($result);
$result2=mysqli_query($link,"select * from goods where id='$goodsid'");
$row2=mysqli_fetch_array($result2);

if($orderquantity < $row['smallquantity']){
err_msg("최소 구매수량이 '$row[smallquantity]'EA 입니다.");
}
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B><?php echo $my_name; ?> 님의 대량구매 정보</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<b>구매수량</b> :
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<b><?php echo $orderquantity; ?></b> EA
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
상품명 :
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo $row2['name'];?>
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
정가 : 
</td>
<td width="630"  style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo number_format($row['fixprice']); ?>원
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
즉시가 : 
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<?php echo number_format($row2['price']); ?>원
</td>
</tr>
<tr>
<td width="100" height="25" align="right" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
구매가 : 
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
&nbsp;<font color=red>
<?php
$partsum=$row['price'] - $row['dcprice'];
echo $partsum." * ".$orderquantity." = ";
$allsum=$partsum * $orderquantity;
echo number_format($allsum); 
?>원</b></font>
</td>
</tr>
</table>



<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.ordername.value) {
	alert("주문자 이름을 입력하세요.");
	Fm.ordername.focus();
	return; } 
    if(!Fm.tel1.value) {
	alert("주문자 전화번호를 입력하세요.");
	Fm.tel1.focus();
	return; }
    if(!Fm.tel2.value) {
	alert("주문자 전화번호를 입력하세요.");
	Fm.tel2.focus();
	return; }
    if(!Fm.tel3.value) {
	alert("주문자 전화번호를 입력하세요.");
	Fm.tel3.focus();
	return; }
    if(!Fm.htel1.value) {
	alert("주문자 휴대폰번호를 입력하세요.");
	Fm.htel1.focus();
	return; }
    if(!Fm.htel2.value) {
	alert("주문자 휴대폰번호를 입력하세요.");
	Fm.htel2.focus();
	return; }
    if(!Fm.htel3.value) {
	alert("주문자 휴대폰번호를 입력하세요.");
	Fm.htel3.focus();
	return; }
    if(!Fm.bname.value) {
	alert("수령자 이름을 입력하세요.");
	Fm.bname.focus();
	return; } 
    if(!Fm.btel1.value) {
	alert("수령자 전화번호를 입력하세요.");
	Fm.btel1.focus();
	return; }
    if(!Fm.btel2.value) {
	alert("수령자 전화번호를 입력하세요.");
	Fm.btel2.focus();
	return; }
    if(!Fm.btel3.value) {
	alert("수령자 전화번호를 입력하세요.");
	Fm.btel3.focus();
	return; }
    if(!Fm.bhtel1.value) {
	alert("수령자 휴대폰번호를 입력하세요.");
	Fm.bhtel1.focus();
	return; }
    if(!Fm.bhtel2.value) {
	alert("수령자 휴대폰번호를 입력하세요.");
	Fm.bhtel2.focus();
	return; }
    if(!Fm.bhtel3.value) {
	alert("수령자 휴대폰번호를 입력하세요.");
	Fm.bhtel3.focus();
	return; }

	document.Form1.action = 'largeOrderInsert.php?mod2=OrderOk';
	document.Form1.submit();
}

function PostCheck(){
	window.open("check_post2.php","","left=0,top=0,scrollbars=yes,resizable=no,width=550,height=200");
}

function PostCheck3(){
	window.open("check_post3.php","","left=0,top=0,scrollbars=yes,resizable=no,width=550,height=200");
}

 function AutoRecord(frm) {
    if(frm.ARCheck.checked) {
      frm.bname.value  =  frm.ordername.value;
	 if (isNaN(frm.tel1.value)){
		 alert("전화번호를 숫자로 입력해주세요.");
		document.Form1.tel1.focus();
		return false;
	}
      frm.btel1.value  =  frm.tel1.value;
	 if (isNaN(frm.tel2.value)){
		 alert("전화번호를 숫자로 입력해주세요.");
		document.Form1.tel2.focus();
		return false;
	}
      frm.btel2.value  =  frm.tel2.value;
	 if (isNaN(frm.tel3.value)){
		 alert("전화번호를 숫자로 입력해주세요.");
		document.Form1.tel3.focus();
		return false;
	}
      frm.btel3.value  =  frm.tel3.value;
      frm.bhtel1.value  =  frm.htel1.value;
	 if (isNaN(frm.htel2.value)){
		 alert("휴대폰번호를 숫자로 입력해주세요.");
		document.Form1.htel2.focus();
		return false;
	}
      frm.bhtel2.value  =  frm.htel2.value;
	 if (isNaN(frm.tel3.value)){
		 alert("휴대폰번호를 숫자로 입력해주세요.");
		document.Form1.tel3.focus();
		return false;
	}
      frm.bhtel3.value  =  frm.htel3.value;
	 if (isNaN(frm.post1.value)){
		 alert("우편번호를 숫자로 입력해주세요.");
		document.Form1.post1.focus();
		return false;
	}
      frm.bpost1.value  =  frm.post1.value;
	 if (isNaN(frm.post2.value)){
		 alert("우편번호를 숫자로 입력해주세요.");
		document.Form1.post2.focus();
		return false;
	}
      frm.bpost2.value  =  frm.post2.value;
      frm.baddress.value  =  frm.address.value;
      frm.bpost_num.value  =  frm.post_num.value;
      frm.bemail.value  =  frm.email.value;
    } else {
      frm.bname.value = "";
      frm.btel1.value = "";
      frm.btel2.value = "";
      frm.btel3.value = "";
      frm.bhtel1.value = "";
      frm.bhtel2.value = "";
      frm.bhtel3.value = "";
      frm.bpost1.value = "";
      frm.bpost2.value = "";
      frm.baddress.value = "";
      frm.bpost_num.value = "";
      frm.bemail.value = "";
    }
  }
//-->
</SCRIPT>

<form name=Form1 method=post>
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="goodsid" value="<?php echo $goodsid?>">
<input type="hidden" name="orderquantity" value="<?php echo $orderquantity?>">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="710"> &nbsp;<B>주문,수령자 정보</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="730">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 주문번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<b><?php echo $largeordernum; ?></b>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 주문자 이름
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="ordername" value="<?php echo $my_name; ?>" maxlength="50" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font> 주문자 전화
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="tel1" value="<?php echo $my_tel1; ?>"></font> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="tel2" value="<?php echo $my_tel2; ?>"></font> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="tel3" value="<?php echo $my_tel3; ?>"> </font>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td style="padding-left:15px" class="bgc_table2" height="55">
    <font color="red">*</font> 주문자 휴대폰
	</td>
	<td bgcolor="#fcfcfc" style="padding-left:10px">
	<select name="htel1">
	<option value="">핸드폰 선택</option>
	<option value="010"<?php if($my_htel1 == "010") echo "selected"; ?>>010</option>
	<option value="011"<?php if($my_htel1 == "011") echo "selected"; ?>>011</option>
	<option value="016"<?php if($my_htel1 == "016") echo "selected"; ?>>016</option>
	<option value="017"<?php if($my_htel1 == "017") echo "selected"; ?>>017</option>
	<option value="018"<?php if($my_htel1 == "018") echo "selected"; ?>>018</option>
	<option value="019"<?php if($my_htel1 == "019") echo "selected"; ?>>019</option>	
	</select> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="htel2" value="<?php echo $my_htel2; ?>"></font> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="htel3" value="<?php echo $my_htel3; ?>"></font>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 주문자 주소
	</td>
	<td bgcolor="#fcfcfc" style="padding-left:10px">
	<font size="3" face="굴림체">	
	<INPUT  TYPE=text  name=post1 value="<?php echo $post1; ?>" size=3 maxlength=3> - 
	<INPUT  TYPE=text  name=post2 value="<?php echo $post2; ?>" size=3 maxlength=3>
	<INPUT TYPE=button value=검색 onClick="PostCheck()"><br>
	<input type="text" name="address" value="<?php echo $address; ?>" maxlength="70" style="width:300px"><br>
	<input type="text" name="post_num" value="<?php echo $post_num; ?>" maxlength="50" style="width:300px">	
	</font>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 주문자 이메일
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="email" value="<?php echo $my_email; ?>" maxlength="60" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="green"></td></tr>

	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">* 수령자 자동입력</font>
	</td><font color="red">
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=checkbox name=ARCheck onclick="AutoRecord(document.Form1)"> </font><font color="blue"> ☜ 주문자와 수령자가 같다면 체크하세요</font>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="green"></td></tr>

	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 수령자 이름
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="bname" value="" maxlength="50" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font> 수령자 전화
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="btel1" value=""></font> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="btel2" value=""></font> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="btel3" value=""> </font>	
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 수령자 휴대폰
	</td>
	<td bgcolor="#fcfcfc" style="padding-left:10px">
	<select name="bhtel1">
	<option value="">핸드폰 선택</option>
	<option value="010">010</option>
	<option value="011">011</option>
	<option value="016">016</option>
	<option value="017">017</option>
	<option value="018">018</option>
	<option value="019">019</option>	
	</select> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="bhtel2" value=""></font> -
	<font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="bhtel3" value=""></font>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 수령자 주소
	</td>
	<td bgcolor="#fcfcfc" style="padding-left:10px">
	<font size="3" face="굴림체">	
	<INPUT  TYPE=text  name=bpost1  size=3 maxlength=3> - 
	<INPUT  TYPE=text  name=bpost2  size=3 maxlength=3>
	<INPUT TYPE=button value=검색 onClick="PostCheck3()"><br>
	<input type="text" name="baddress" value="" maxlength="70" style="width:300px"><br>
	<input type="text" name="bpost_num" value="" maxlength="50" style="width:300px">	
	</font>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 수령자 이메일
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="bemail" value="" maxlength="60" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="green"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font >하고 싶은 말	
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="content" value="" maxlength="100" style="width:550px"></font>
	온라인서점이나 택배사에 전달할 메시지가 있다면 간단히 입력하세요. 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="green"></td></tr>
</table>
</form>
<div align="left">
<p align="center">
<a href="javascript:recording();"><img src="image/account30.gif" border="0"></a>
</div>
</p>
<?php
}else{
echo ("<meta http-equiv='Refresh' content='0; URL=login.php'>");
}
include "bottom.php";     // 하단 구성
?>