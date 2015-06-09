<?php
include "top.php";
include "main_left.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1 ="";} else {$my_pass1 = $_SESSION['my_pass1'];}
if(!isset($_SESSION['ordernum'])){$ordernum ="";} else {$ordernum = $_SESSION['ordernum'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}

$Pamount=0;$Bamount=0;$Mamount=0;$TransCost=0;
$my_htel1  = $_SESSION['my_htel1'];
$my_htel2  = $_SESSION['my_htel2'];
$my_htel3  = $_SESSION['my_htel3'];
$my_tel1  = $_SESSION['my_tel1'];
$my_tel2  = $_SESSION['my_tel2'];
$my_tel3  = $_SESSION['my_tel3'];
$post1  = $_SESSION['post1'];
$post2  = $_SESSION['post2'];
$address = $_SESSION['address'];
$post_num = $_SESSION['post_num'];
$my_email = $_SESSION['my_email'];

?>
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

	document.Form1.action = 'order_insert.php?mod2=OrderOk';
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
<?php
if($mod == "memberNo"){ // 비회원 주문
    ?>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
    <tr>
    <td width="190" height="30" align="center">상품명</td>
    <td width="70" height="30" align="right">| 예상출고일</td>
    <td width="70" height="30" align="right">| &nbsp; &nbsp; &nbsp; 정가</td>
    <td width="100" height="30" align="right">| 판매가(할인율)</td>
    <td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp;수 량&nbsp; &nbsp; &nbsp;</td>
    <td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;합계</td>
    <td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp;<a href="basket_buy.php?mod=alldel">전체 삭제</a></td>
    </tr>
    <tr><td colspan="7" height="2" bgcolor="#6699FF"></td></tr>
    <tr><td colspan="7" height="5"></td></tr>
    <?php
    $querybasket=mysqli_query($link,"select * from basket where ordernum='$ordernum' ");
    $countall=mysqli_num_rows($querybasket);
    if($countall < 1){
    echo "<tr><td colspan=7 height=5>장바구니에 담긴 상품이 없습니다.</td></tr>";
    } else {
    while($rowbasket=mysqli_fetch_array($querybasket))
    {
    ?>
    <tr>
    <td width="190" height="30"><?php echo $rowbasket['name']; ?></td>
    <td width="70" height="30" align="right"><?php echo $rowbasket['dday']; ?>일 이내</td>
    <td width="70" height="30" align="right"><s><?php echo number_format($rowbasket['fixprice']); ?>원</s></td>
    <td width="100" height="30" align="right">
    <font color="#DF5B0B">
    <?php
    $dcvalue = ($rowbasket['fixprice'] - $rowbasket['price']);
    $dcrate=round(($dcvalue/$rowbasket['fixprice'])*100) ;
    echo number_format($rowbasket['price']); 
    ?>원(<?php echo $dcrate; ?>%)</font>
    </td>
    <td width="100" height="30" align="right"><b><?php echo $rowbasket['quantity']; ?></b>
    <span style=font-size:9pt;><a href="goodsview.php?id=<?php echo $rowbasket['goodsid']?>">[수량수정]</a></span></td>
    <td width="100" height="30" align="right">
    <font color="#DF5B0B">
    <?php
    $recordsum=$rowbasket['price'] * $rowbasket['quantity'];
    $RerPosum=$rowbasket['point'] * $rowbasket['quantity'];
    $ManiaPosum=$rowbasket['maniapoint'] * $rowbasket['quantity'];
    $basketsum[]=$recordsum;
    $pointsum[]=$RerPosum;
    $maniasum[]=$ManiaPosum;
    echo number_format($recordsum);

    ?>
    원</font>
    </td>
    <td width="100" height="30" align="right"><a href="goodsview.php?id=<?php echo $rowbasket['goodsid']?>">수정</a> <a href="basket_buy.php?delid=<?php echo $rowbasket['id']?>&mod=recorddel">삭제</a></td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#CCCCCC"></td></tr>
    <?php
    }
    ?>

    <tr><td colspan="7" height="5"></td></tr>

    </table>


    <table width="730" border="0" cellpadding="0" cellspacing="0">
    <tr><td align="right" width="350" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    주문 상품 수  : </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php echo $countall; ?> 건
    </td>
    <td align="right" width="200" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    기본 적립금 :
    </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php
    for($p=0; $p<$countall; $p++){
            $Pamount+=$pointsum[$p];
    }
    echo number_format($Pamount);
    echo " 원";
    ?>
    </td>
    </tr>
    <tr><td align="right" width="350" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    상품 총 금액 : </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php
    for($b=0; $b<$countall; $b++){
            $Bamount+=$basketsum[$b];
    }
    echo number_format($Bamount);
    echo " 원";
    ?>
    </td>
    <td align="right" width="200" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    특별 적립금 :
    </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php 
    $SpecialAll=$Bamount*$specialpoint; // link_config.php 파일에서 설정
    $SpecialAll=round($SpecialAll,-1); // 5 이상은 반올림
    echo number_format($SpecialAll);
    ?> 원  
    </td>
    </tr>
    <tr><td align="right" width="350" height="25">
    배 송 비 : </td>
    <td align="right" width="80">
    <?php
    $queryTrans=mysqli_num_rows(mysqli_query($link,"select id from basket where dcost='1' && ordernum='$ordernum' "));
    if($queryTrans > 0){ // 유료배송이 하나라도 있다면 유료배송 적용함

    if($Bamount < $delivery_limit){
    $TransCost=$delivery;
    }else{
    $TransCost=0;
    }
    }
    echo number_format($TransCost);
    ?> 원
    </td>
    <td align="right" width="200">
    매니아 적립금 :
    </td>
    <td align="right" width="80">
    <?php
    for($m=0; $m<$countall; $m++){
            $Mamount+=$maniasum[$m];
    }
    echo number_format($Mamount);
    echo " 원";
    ?>
    </td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
    <tr><td align="right" width="350" height="25">
    <font color="#DF5B0B">지불 총 금액 :</font> 
    </td>
    <td align="right" width="80">
    <b><font color="#DF5B0B">
    <?php
    $AllCash=$Bamount+$TransCost;
    echo number_format($AllCash); 
    ?> 
     원
    </td>
    <td align="right" width="200">
    <font color="#009900">총 적립금 :</font>
    </td>
    <td align="right" width="80">
    <b><font color="#009900">
    <?php
    $AllPoint=$Pamount+$SpecialAll+$Mamount;
    echo number_format($AllPoint);
    echo " 원</font>";
    ?>
    </td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
    <tr><td align="center" colspan="7" height="30">
    </td></tr></table>
    <?php }  // 등록 된 상품 조사, 주문목록 끝 ?>

    <form name=Form1 method=post enctype=multipart/form-data>
    <input type="hidden" name="AllCash" value="<?php echo $AllCash; ?>">
    <input type="hidden" name="AllPoint" value="<?php echo $AllPoint; ?>">
    <input type="hidden" name="cashcharge" value="0"><!-- 비회원은 캐쉬 충전이 없음 -->
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
    <tr>
    <td width="20" height="40">
    <img src="image/green_folder.jpg" border="0">  
    </td>
    <td width="880"> &nbsp;<B>상품주문(비회원)</B>
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
            <b><?php echo $ordernum; ?></b> (* 주문상태, 배송상태의 검색을 원하시면 반드시 기억하세요.)
            </td>
            </tr>
            <tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
            <tr>
            <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
            <font color="red">*</font> 주문자 이름
            </td>
            <td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="text" name="ordername" value="" maxlength="50" style="width:300px">
            </td>
            </tr>
            <tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
            <tr>
            <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
            <font color="red">*</font> 비밀번호
            </td>
            <td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="text" name="pwd" value="" maxlength="50" style="width:100px">
            <br> * 수정시 반드시 필요합니다.
            </td>
            </tr>
            <tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
            <tr>
            <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
            <font color="blue">*</font> 주문자 전화
            </td>
            <td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
        <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="tel1" value=""></font> -
            <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="tel2" value=""></font> -
            <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="tel3" value=""> </font>
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
            <option value="010">010</option>
            <option value="011">011</option>
            <option value="016">016</option>
            <option value="017">017</option>
            <option value="018">018</option>
            <option value="019">019</option>	
            </select> -
            <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="htel2" value=""></font> -
            <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="htel3" value=""></font>
            </td>
            </tr>
            <tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
            <tr>
            <td style="padding-left:15px" class="bgc_table2" height="55">
            <font color="red">*</font> 주문자 주소
            </td>
            <td bgcolor="#fcfcfc" style="padding-left:10px">
            <font size="3" face="굴림체">	
            <INPUT  TYPE=text  name=post1  size=3 maxlength=3> - 
            <INPUT  TYPE=text  name=post2  size=3 maxlength=3>
            <INPUT TYPE=button value=검색 onClick="PostCheck()"><br>
            <input type="text" name="address" value="" maxlength="70" style="width:300px"><br>
            <input type="text" name="post_num" value="" maxlength="50" style="width:300px">	
            </font>
            </td>
            </tr>
            <tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
            <tr>
            <td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
            <font color="red">*</font> 주문자 이메일
            </td>
            <td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
            <input type="text" name="email" value="" maxlength="60" style="width:300px">
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
    <a href="basket_buy.php"><img src="image/before30.gif" border="0"></a>
    <a href="javascript:recording();"><img src="image/account30.gif" border="0"></a>
    </div>
    </p>
    <?php
} else if($mod == "memberYes") { // 회원주문
    if($my_member_id && $my_pass1){
    ?>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
    <tr>
    <td width="190" height="30" align="center">상품명</td>
    <td width="70" height="30" align="right">| 예상출고일</td>
    <td width="70" height="30" align="right">| &nbsp; &nbsp; &nbsp; 정가</td>
    <td width="100" height="30" align="right">| 판매가(할인율)</td>
    <td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp;수 량&nbsp; &nbsp; &nbsp;</td>
    <td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;합계</td>
    <td width="100" height="30" align="right">| &nbsp; &nbsp; &nbsp; &nbsp;<a href="basket_buy.php?mod=alldel">전체 삭제</a></td>
    </tr>
    <tr><td colspan="7" height="2" bgcolor="#6699FF"></td></tr>
    <tr><td colspan="7" height="5"></td></tr>
    <?php
    $querybasket=mysqli_query($link,"select * from basket where ordernum='$ordernum' ");
    $countall=mysqli_num_rows($querybasket);
    if($countall < 1){ // 장바구니에 상품이 있는지 조사
    echo "<tr><td colspan=7 height=5>장바구니에 담긴 상품이 없습니다.</td></tr>";
    } else {
    while($rowbasket=mysqli_fetch_array($querybasket))
    {
    ?>
    <tr>
    <td width="190" height="30"><?php echo $rowbasket['name']; ?></td>
    <td width="70" height="30" align="right"><?php echo $rowbasket['dday'] ?>일 이내</td>
    <td width="70" height="30" align="right"><s><?php echo number_format($rowbasket['fixprice']); ?>원</s></td>
    <td width="100" height="30" align="right">
    <font color="#DF5B0B">
    <?php
    $dcvalue = ($rowbasket['fixprice'] - $rowbasket['price']);
    $dcrate=round(($dcvalue/$rowbasket['fixprice'])*100) ;
    echo number_format($rowbasket['price']); 
    ?>원(<?php echo $dcrate; ?>%)</font>
    </td>
    <td width="100" height="30" align="right"><b><?php echo $rowbasket['quantity']; ?></b>
    <span style=font-size:9pt;><a href="goodsview.php?id=<?php echo $rowbasket['goodsid']?>">[수량수정]</a></span></td>
    <td width="100" height="30" align="right">
    <font color="#DF5B0B">
    <?php
    $recordsum=$rowbasket['price'] * $rowbasket['quantity'];
    $RerPosum=$rowbasket['point'] * $rowbasket['quantity'];
    $ManiaPosum=$rowbasket['maniapoint'] * $rowbasket['quantity'];
    $basketsum[]=$recordsum;
    $pointsum[]=$RerPosum;
    $maniasum[]=$ManiaPosum;
    echo number_format($recordsum);

    ?>
    원</font>
    </td>
    <td width="100" height="30" align="right"><a href="goodsview.php?id=<?php echo $rowbasket['goodsid']?>">수정</a> <a href="basket_buy.php?delid=<?php echo $rowbasket['id']?>&mod=recorddel">삭제</a></td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#CCCCCC"></td></tr>
    <?php
    }
    ?>

    <tr><td colspan="7" height="5"></td></tr>

    </table>


    <table width="730" border="0" cellpadding="0" cellspacing="0">
    <tr><td align="right" width="350" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    주문 상품 수  : </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php echo $countall; ?> 건
    </td>
    <td align="right" width="200" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    기본 적립금 :
    </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php
    for($p=0; $p<$countall; $p++){
            $Pamount+=$pointsum[$p];
    }
    echo number_format($Pamount);
    echo " 원";
    ?>
    </td>
    </tr>
    <tr><td align="right" width="350" height="25" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    상품 총 금액 : </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php
    for($b=0; $b<$countall; $b++){
            $Bamount+=$basketsum[$b];
    }
    echo number_format($Bamount);
    echo " 원";
    ?>
    </td>
    <td align="right" width="200" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    특별 적립금 :
    </td>
    <td align="right" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
    <?php 
    $SpecialAll=$Bamount*$specialpoint; // link_config.php 파일에서 설정
    $SpecialAll=round($SpecialAll,-1); // 5 이상은 반올림
    echo number_format($SpecialAll);
    ?> 원  
    </td>
    </tr>
    <tr><td align="right" width="350" height="25">
    배 송 비 : </td>
    <td align="right" width="80">
    <?php
    $queryTrans=mysqli_num_rows(mysqli_query($link,"select id from basket where dcost='1' && ordernum='$ordernum' "));
    if($queryTrans > 0){ // 유료배송이 하나라도 있다면 유료배송 적용함

    if($Bamount < $delivery_limit){
    $TransCost=$delivery;
    }else{
    $TransCost=0;
    }
    }
    echo number_format($TransCost);
    ?> 원
    </td>
    <td align="right" width="200">
    매니아 적립금 :
    </td>
    <td align="right" width="80">
    <?php
    for($m=0; $m<$countall; $m++){
            $Mamount+=$maniasum[$m];
    }
    echo number_format($Mamount);
    echo " 원";
    ?>
    </td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
    <tr><td align="right" width="350" height="25">
    <font color="#DF5B0B">지불 총 금액 :</font> 
    </td>
    <td align="right" width="80">
    <b><font color="#DF5B0B">
    <?php 
    $AllCash=$Bamount+$TransCost;
    echo number_format($AllCash);
    ?> 
     원
    </td>
    <td align="right" width="200">
    <font color="#009900">총 적립금 :</font>
    </td>
    <td align="right" width="80">
    <b><font color="#009900">
    <?php
    $AllPoint=$Pamount+$SpecialAll+$Mamount;
    echo number_format($AllPoint);
    echo " 원</font>";
    ?>
    </td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
    <tr><td align="right" width="350" height="25">
    <font color="#DF5B0B">사용가능한 현재 캐쉬 충전금 :</font> 
    </td>
    <td align="right" width="80">
    <b><font color="#DF5B0B">
    <?php 
    $querymb=mysqli_query($link,"select cash,point from member where member_id='$my_member_id'"); 
    $rowmember=mysqli_fetch_array($querymb);
    $cashcharge=$rowmember['cash'];
    echo number_format($cashcharge);
    ?> 
     원
    </td>
    <td align="right" width="200">
    <font color="#009900">현재 적립금 :</font>
    </td>
    <td align="right" width="80">
    <b><font color="#009900">
    <?php
    $pointcharge=$rowmember['point'];
    echo number_format($pointcharge);
    echo " 원</font>";
    ?>
    </td>
    </tr>
    <tr><td colspan="7" height="1" bgcolor="#6699FF"></td></tr>
    <tr><td colspan="7" height="25">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
    <tr><td height="1" bgcolor="#6699FF"></td></tr>
    <?php
    if($cashcharge > $AllCash){ // 현재 총액보다 캐쉬충전금이 클 경우 바로 구입
    ?>
    <tr><td height="25" align="center">캐쉬 충전금이 구입총액보다 많으므로, 전액을 캐쉬충전금으로 결제합니다.</td></tr>
    <?php
    }else{
    ?>
    <tr><td height="25" align="center">캐쉬 충전금이 구입총액보다 적으므로, 캐쉬충전금은 사용하지 않습니다.</td></tr>
    <?php
    }
    ?>
    <tr><td height="1" bgcolor="#6699FF"></td></tr>
    </table>	
    </td></tr>
    <tr><td align="center" colspan="7" height="30">
    </td></tr></table>
    <?php
    }  // 장바구니에 상품이 있는지 조사  끝 
    ?>
    <form name=Form1 method=post enctype=multipart/form-data>
    <input type="hidden" name="AllCash" value="<?php echo $AllCash; ?>">
    <input type="hidden" name="AllPoint" value="<?php echo $AllPoint; ?>">
    <input type="hidden" name="cashcharge" value="<?php echo $cashcharge; ?>">

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
    <tr>
    <td width="20" height="40">
    <img src="image/green_folder.jpg" border="0">  
    </td>
    <td width="880"> &nbsp;<B>상품주문(회원)</B>
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
            <b><?php echo $ordernum; ?></b>
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
            <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="htel2" value="<?php echo $my_tel2; ?>"></font> -
            <font size="3" face="굴림체"><input type="text" style="width:40px" maxlength="4" name="htel3" value="<?php echo $my_tel3; ?>"></font>
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
    <a href="basket_buy.php"><img src="image/before30.gif" border="0"></a>
    <a href="javascript:recording();"><img src="image/account30.gif" border="0"></a>
    </div>
    </p>
    <?php
    } else {
        echo ("<meta http-equiv='Refresh' content='0; URL=login.php'>");
    }
}

include "bottom.php";     // 하단 구성
?>