<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
$resultbody=mysqli_query($link,"select * from goods where id='$id' ");
$rowbody=mysqli_fetch_array($resultbody);
$gs3id=$rowbody['gs3id'];
$name=$rowbody['name'];
?>
<SCRIPT LANGUAGE='javascript'>
<!--
function recording() {
	var Fm = document.Form1;
    if(!Fm.pwd.value) {
	alert("출판사 비밀번호를 입력하세요.");
	Fm.pwd.focus();
	return; } 
    if(!Fm.name.value) {
	alert("상품명을 입력하세요.");
	Fm.name.focus();
	return; }
    if(!Fm.author.value) {
	alert("자자명을 입력하세요.");
	Fm.author.focus();
	return; }
    if(!Fm.publishing.value) {
	alert("출판사명을 입력하세요.");
	Fm.publishing.focus();
	return; }
    if(!Fm.pyear.value) {
	alert("출간 년을 입력하세요.");
	Fm.pyear.focus();
	return; }
    if(!Fm.pmonth.value) {
	alert("출간 월을 입력하세요.");
	Fm.pmonth.focus();
	return; }
    if(!Fm.pday.value) {
	alert("출간 일을 입력하세요.");
	Fm.pday.focus();
	return; }
    if(!Fm.epage.value) {
	alert("쪽수를 입력하세요.");
	Fm.epage.focus();
	return; }
    if(!Fm.isbn.value) {
	alert("ISBN을 입력하세요.");
	Fm.isbn.focus();
	return; }
    if(!Fm.hidf1.value) {
	alert("고정가를 입력하세요.");
	Fm.cashf1.focus();
	return; }    
    if(!Fm.hidf2.value) {
	alert("판매가를 입력하세요.");
	Fm.cashf2.focus();
	return; }
    if(!Fm.dday.value) {
	alert("배송예정일을 입력하세요.");
	Fm.dday.focus();
	return; } 
	
	document.Form1.action = 'goods_modify_insert.php';
	document.Form1.submit();
}

function show_pic(img,names) {
var oInput = event.srcElement; 
var fname = oInput.value; 
if((/(.jpg|.jpeg|.gif|.png)$/i).test(fname))
	{
  oInput.parentElement.children[0].src = fname;
    document.images["pic"+img].style.display = "none";
    document.images["pic"+img].style.display = "";
    document.images["pic"+img].src = Form1.elements[names].value; 

	}
else {
  alert('이미지는 gif, jpg, png 파일만 가능합니다. 다시 넣으세요.');
}

}

function usekey(){
if (((event.keyCode>=48)&&(event.keyCode<=57)) || ((event.keyCode>=96)&&(event.keyCode<=105)) || event.keyCode==46 || event.keyCode==8) { 
 event.returnValue=true;return; } else { 
 alert('숫자만  사용하세요.');
 event.returnValue=false; return;
 }
}

function hidnum1(){
	Form1.hidf1.value = Form1.cashf1.value.replace(/,|\s+/g,''); // hidf1에는 콤마 없는 값 입력
	Form1.cashf1.value = comma1(Form1.hidf1);
}

function comma1(comma1){
	    len = Form1.hidf1.value.length;
		loop =len/3; 
		offset = len % 3;
		if(offset == 0) offset = 3;
		val = Form1.hidf1.value.substring(0,offset); // substring(인덱스1,인덱스3) 인덱스1에서 인덱스3 사이에 있는 문자열을 문장 중에 추출한다.
		for(var i=1;i<loop;i++){
			val +="," +Form1.hidf1.value.substring(offset,offset+3);
			offset +=3;
		}
	return val;
}

function hidnum2(){
	Form1.hidf2.value = Form1.cashf2.value.replace(/,|\s+/g,''); // hidf2에는 콤마 없는 값 입력
	Form1.cashf2.value = comma2(Form1.hidf2);
}

function comma2(comma2){
	    len = Form1.hidf2.value.length;
		loop =len/3; 
		offset = len % 3;
		if(offset == 0) offset = 3;
		val = Form1.hidf2.value.substring(0,offset); // substring(인덱스1,인덱스3) 인덱스1에서 인덱스3 사이에 있는 문자열을 문장 중에 추출한다.
		for(var i=1;i<loop;i++){
			val +="," +Form1.hidf2.value.substring(offset,offset+3);
			offset +=3;
		}
	return val;
}
//-->
</SCRIPT>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="good_md_insert">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>상품수정</B>
<?php
$result=mysqli_query($link,"select name,gs2id from goods3 where id='$gs3id' ");
$row=mysqli_fetch_array($result);
$fixid3=$row['gs2id'];
$name3=$row['name'];
$result=mysqli_query($link,"select fixnum,name from goods2 where id='$fixid3' ");
$row=mysqli_fetch_array($result);
$fixid2=$row['fixnum'];
$name2=$row['name'];
$result=mysqli_query($link,"select fixnum,name from goods1 where fixnum='$fixid2' ");
$row=mysqli_fetch_array($result);
$fixid1=$row['fixnum'];
$name1=$row['name'];

echo ">".$name1;
echo ">".$name2;
echo ">".$name3;
echo ">".$name;
?>	
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 출판사 비밀번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="pwd" value="<?php echo $rowbody['pwd']?>" maxlength="50" style="width:120px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 고유번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="fixid" value="<?php echo $rowbody['fixnum']; ?>" maxlength="20" style="width:122px"> 본 번호는 중분류,소분류,상품에 모두 적용됩니다.
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 상품명(책제목)
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="name" value="<?php echo $rowbody['name']; ?>" maxlength="50" style="width:300px"> (ex : PHP5 온라인 서점 만들기) 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 저자명
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="author" value="<?php echo $rowbody['author']; ?>" maxlength="20" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 출판사
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="publishing" value="<?php echo $rowbody['publishing']; ?>" maxlength="20" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 출간일
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="pyear" value="<?php echo $rowbody['pyear']; ?>" maxlength="4" style="width:40px">년 &nbsp;
	<input type="text" name="pmonth" value="<?php echo $rowbody['pmonth']; ?>" maxlength="4" style="width:20px">월 &nbsp;
	<input type="text" name="pday" value="<?php echo $rowbody['pday']; ?>" maxlength="4" style="width:20px">일  
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 쪽수
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="epage" value="<?php echo $rowbody['epage']; ?>" maxlength="6" style="width:50px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> ISBN
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="isbn" value="<?php echo $rowbody['isbn']; ?>" maxlength="30" style="width:300px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 정가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf1' size="15" value='<?php echo $rowbody['fixprice']; ?>' onkeyup='hidnum1()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf1" value='<?php echo $rowbody['fixprice']; ?>'>원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 판매가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf2' size="15" value='<?php echo $rowbody['price']; ?>' onkeyup='hidnum2()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf2" value='<?php echo $rowbody['price']; ?>'>원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 배송예정일
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='dday' size="5" value='<?php echo $rowbody['dday']; ?>' style='text-align:right;'>일 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 배송비용
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="dcost" value="1"<?php if($rowbody['dcost'] == "1") echo "checked"; ?>>있음&nbsp;&nbsp;
    <input type="radio" name="dcost" value="2"<?php if($rowbody['dcost'] == "2") echo "checked"; ?>>무료&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 배송가능지역
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="dcountry" value="1"<?php if($rowbody['dcountry'] == "1") echo "checked"; ?>>국내가능&nbsp;&nbsp;
    <input type="radio" name="dcountryt" value="2"<?php if($rowbody['dcountry'] == "2") echo "checked"; ?>>해외가능&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 최저보상제도
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="lowest" value="1"<?php if($rowbody['lowest'] == "1") echo "checked"; ?>>실시함&nbsp;&nbsp;
    <input type="radio" name="lowest" value="2"<?php if($rowbody['lowest'] == "2") echo "checked"; ?>>실시하지 않음&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 신상품
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="gsnew" value="1"<?php if($rowbody['gsnew'] == "1") echo "checked"; ?>>신상품으로 등록함&nbsp;&nbsp;
    <input type="radio" name="gsnew" value="2"<?php if($rowbody['gsnew'] == "2") echo "checked"; ?>>신상품으로 등록하지 않음&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 베스트셀러
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="best" value="1"<?php if($rowbody['best'] == "1") echo "checked"; ?>>베스트셀러로 등록함 &nbsp;&nbsp;
    <input type="radio" name="best" value="2"<?php if($rowbody['best'] == "2") echo "checked"; ?>>베스트셀러로 등록하지 않음&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 추천상품
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="recomend" value="1"<?php if($rowbody['recomend'] == "1") echo "checked"; ?>>추천상품으로 등록함 &nbsp;&nbsp;
    <input type="radio" name="recomend" value="2"<?php if($rowbody['recomend'] == "2") echo "checked"; ?>>추천상품으로 등록하지 않음&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 세일그룹
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
    <input type="radio" name="sale" value="1"<?php if($rowbody['sale'] == "1") echo "checked"; ?>>세일그룹에 등록함&nbsp;&nbsp;
    <input type="radio" name="sale" value="2"<?php if($rowbody['sale'] == "2") echo "checked"; ?>>세일그룹에 등록하지 않음&nbsp;&nbsp;
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 관련상품
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='rela' size="20" value='<?php echo $rowbody['rela']; ?>' style='text-align:right;'> 관련상품끼리 동일한 영문,숫자를 입력하세요.  
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 포인터
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='point' size="12" value='<?php echo $rowbody['point']; ?>' style='text-align:right;'>원 (이 상품을 구입함으로 발생되는 포인터가 있다면 넣으세요.) 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 매니아포인터
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="radio" name="mania" value="1"<?php if($rowbody['mania'] == "1") echo "checked"; ?>>매니아 포인터 채택&nbsp;&nbsp;
    <input type="radio" name="mania" value="2"<?php if($rowbody['mania'] == "2") echo "checked"; ?>>매니아 포인터 불채택&nbsp;&nbsp;
	(매니아 포인터를 채택하면 회원등급에 따라 포인터를 발생시킴) 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font> 작은사진			
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
		<table align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td width="475">
			<input type="file" size="60" name="imgup1" class="input" onChange="show_pic('1','imgup1');"></font>
				<br style="font-size:4">
				사진 가로의 최대크기 250픽셀(관리자 리스트용으로 34*50로 자동축소)<br>
				</td>
				<td width="100">				
				<img id="pic1" width="42" height="55" src="<?php if($row['filename'] !== ""){ echo "../goodsimg/$rowbody[filename]"; } else { echo "../image/jeungm.jpg"; } ?>" align="absbottom" onLoad="if(this.fileSize>100000)alert('100000kbyte가 넘습니다.\n이사진은 업로드되지 않습니다.\n다시 넣어 주세요.')";>
				</td>
			</tr>
		</table>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>

	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="blue">*</font> 큰사진			
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
		<table align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td width="475">
			<input type="file" size="60" name="imgup2" class="input" onChange="show_pic('2','imgup2');"></font>
				<br style="font-size:4">
				사진의 최대크기:640*480픽셀<br>
				</td>
				<td width="100">				
				<img id="pic2" width="42" height="55" src="<?php if($row['filename2'] !== ""){ echo "../goodsimg/$rowbody[filename2]"; } else { echo "../image/jeungm.jpg"; } ?>" align="absbottom" onLoad="if(this.fileSize>300000)alert('300000kbyte가 넘습니다.\n이사진은 업로드되지 않습니다.\n다시 넣어 주세요.')";>
				</td>
			</tr>
		</table>
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[다음으로 이동하기]</b></a>
</div>
<p>
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
include "bottom.html";     // 하단 구성
?>