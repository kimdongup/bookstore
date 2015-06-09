<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
include "../js/auctionWriteCheck.js";
include "../js/NumComma.js";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if($my_admin_id && $my_admin_pwd){
?>
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="auctionpur">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>경매등록</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 상품고유번호
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="goodsid" value="" maxlength="20" style="width:50px"> 
	<a href="goods_list.php"><b>상품(등록,목록)</b></a>을 클릭하면 상품고유번호를 보실 수 있습니다.(단,중복 등록은 하지  마세요)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>	
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 즉시구매가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf1' size="15" value='' onkeyup='hidnum1()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf1">원
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>	
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 경매시작가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf2' size="15" value='' onkeyup='hidnum2()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf2">원 
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 현재가
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='cashf3' size="15" value='' onkeyup='hidnum3()' onkeyDown="usekey()" style='text-align:right;'><input type="hidden" name="hidf3">원 (처음엔 경매 시작가와 동일)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 등록수량
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type=text name='recordquantity' size="15" value='' style='text-align:right;'>개 
		(등록 상품 수량)
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
				<font color="red">*</font> 경매마감일
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
			<?php
			$SYear=date("Y");
			$SMonth=date("m");
			$SDay=date("d");
			$SHour=date("H");
			$SMinute=date("i");
			$SSecond=date("s");
			?>
			<select name=Sdatey>
			<option value="2015" <?php if($SYear=="2015") echo "selected"; ?>>2015년</option>
            <option value="2016" <?php if($SYear=="2016") echo "selected"; ?>>2016년</option>
			<option value="2017" <?php if($SYear=="2017") echo "selected"; ?>>2017년</option>
			</select>
			<select name=Sdatem>
			<option value="1" <?php if($SMonth=="01") echo "selected"; ?>>1월</option>
			<option value="2" <?php if($SMonth=="02") echo "selected"; ?>>2월</option>
			<option value="3" <?php if($SMonth=="03") echo "selected"; ?>>3월</option>
			<option value="4" <?php if($SMonth=="04") echo "selected"; ?>>4월</option>
			<option value="5" <?php if($SMonth=="05") echo "selected"; ?>>5월</option>
			<option value="6" <?php if($SMonth=="06") echo "selected"; ?>>6월</option>
			<option value="7" <?php if($SMonth=="07") echo "selected"; ?>>7월</option>
			<option value="8" <?php if($SMonth=="08") echo "selected"; ?>>8월</option>
			<option value="9" <?php if($SMonth=="09") echo "selected"; ?>>9월</option>
			<option value="10" <?php if($SMonth=="10") echo "selected"; ?>>10월</option>
			<option value="11" <?php if($SMonth=="11") echo "selected"; ?>>11월</option>
  			<option value="12" <?php if($SMonth=="12") echo "selected"; ?>>12월</option>
			</select>
			<select name=Sdated>
			<option value="1" <?php if($SDay=="01") echo "selected"; ?>>1일</option>
			<option value="2" <?php if($SDay=="02") echo "selected"; ?>>2일</option>
			<option value="3" <?php if($SDay=="03") echo "selected"; ?>>3일</option>
			<option value="4" <?php if($SDay=="04") echo "selected"; ?>>4일</option>
			<option value="5" <?php if($SDay=="05") echo "selected"; ?>>5일</option>
			<option value="6" <?php if($SDay=="06") echo "selected"; ?>>6일</option>
			<option value="7" <?php if($SDay=="07") echo "selected"; ?>>7일</option>
			<option value="8" <?php if($SDay=="08") echo "selected"; ?>>8일</option>
			<option value="9" <?php if($SDay=="09") echo "selected"; ?>>9일</option>
			<option value="10" <?php if($SDay=="10") echo "selected"; ?>>10일</option>
			<option value="11" <?php if($SDay=="11") echo "selected"; ?>>11일</option>
			<option value="12" <?php if($SDay=="12") echo "selected"; ?>>12일</option>
			<option value="13" <?php if($SDay=="13") echo "selected"; ?>>13일</option>
			<option value="14" <?php if($SDay=="14") echo "selected"; ?>>14일</option>
			<option value="15" <?php if($SDay=="15") echo "selected"; ?>>15일</option>
			<option value="16" <?php if($SDay=="16") echo "selected"; ?>>16일</option>
			<option value="17" <?php if($SDay=="17") echo "selected"; ?>>17일</option>
			<option value="18" <?php if($SDay=="18") echo "selected"; ?>>18일</option>
			<option value="19" <?php if($SDay=="19") echo "selected"; ?>>19일</option>
			<option value="20" <?php if($SDay=="20") echo "selected"; ?>>20일</option>
			<option value="21" <?php if($SDay=="21") echo "selected"; ?>>21일</option>
			<option value="22" <?php if($SDay=="22") echo "selected"; ?>>22일</option>
			<option value="23" <?php if($SDay=="23") echo "selected"; ?>>23일</option>
			<option value="24" <?php if($SDay=="24") echo "selected"; ?>>24일</option>
			<option value="25" <?php if($SDay=="25") echo "selected"; ?>>25일</option>
			<option value="26" <?php if($SDay=="26") echo "selected"; ?>>26일</option>
			<option value="27" <?php if($SDay=="27") echo "selected"; ?>>27일</option>
			<option value="28" <?php if($SDay=="28") echo "selected"; ?>>28일</option>
			<option value="29" <?php if($SDay=="29") echo "selected"; ?>>29일</option>
			<option value="30" <?php if($SDay=="30") echo "selected"; ?>>30일</option>
			<option value="31" <?php if($SDay=="31") echo "selected"; ?>>31일</option>
			</select>
			<select name=Stimeh>
			<option value="1" <?php if($SHour=="01") echo "selected"; ?>>1시</option>
			<option value="2" <?php if($SHour=="02") echo "selected"; ?>>2시</option>
			<option value="3" <?php if($SHour=="03") echo "selected"; ?>>3시</option>
			<option value="4" <?php if($SHour=="04") echo "selected"; ?>>4시</option>
			<option value="5" <?php if($SHour=="05") echo "selected"; ?>>5시</option>
			<option value="6" <?php if($SHour=="06") echo "selected"; ?>>6시</option>
			<option value="7" <?php if($SHour=="07") echo "selected"; ?>>7시</option>
			<option value="8" <?php if($SHour=="08") echo "selected"; ?>>8시</option>
			<option value="9" <?php if($SHour=="09") echo "selected"; ?>>9시</option>
			<option value="10" <?php if($SHour=="10") echo "selected"; ?>>10시</option>
			<option value="11" <?php if($SHour=="11") echo "selected"; ?>>11시</option>
  			<option value="12" <?php if($SHour=="12") echo "selected"; ?>>12시</option>
			<option value="13" <?php if($SHour=="13") echo "selected"; ?>>13시</option>
			<option value="14" <?php if($SHour=="14") echo "selected"; ?>>14시</option>
			<option value="15" <?php if($SHour=="15") echo "selected"; ?>>15시</option>
			<option value="16" <?php if($SHour=="16") echo "selected"; ?>>16시</option>
			<option value="17" <?php if($SHour=="17") echo "selected"; ?>>17시</option>
			<option value="18" <?php if($SHour=="18") echo "selected"; ?>>18시</option>
			<option value="19" <?php if($SHour=="19") echo "selected"; ?>>19시</option>
			<option value="20" <?php if($SHour=="20") echo "selected"; ?>>20시</option>
			<option value="21" <?php if($SHour=="21") echo "selected"; ?>>21시</option>
			<option value="22" <?php if($SHour=="22") echo "selected"; ?>>22시</option>
			<option value="23" <?php if($SHour=="23") echo "selected"; ?>>23시</option>
			<option value="24" <?php if($SHour=="24") echo "selected"; ?>>24시</option>
			</select>
			<select name=Stimem>
			<option value="1" <?php if($SMinute=="01") echo "selected"; ?>>1분</option>
			<option value="2" <?php if($SMinute=="02") echo "selected"; ?>>2분</option>
			<option value="3" <?php if($SMinute=="03") echo "selected"; ?>>3분</option>
			<option value="4" <?php if($SMinute=="04") echo "selected"; ?>>4분</option>
			<option value="5" <?php if($SMinute=="05") echo "selected"; ?>>5분</option>
			<option value="6" <?php if($SMinute=="06") echo "selected"; ?>>6분</option>
			<option value="7" <?php if($SMinute=="07") echo "selected"; ?>>7분</option>
			<option value="8" <?php if($SMinute=="08") echo "selected"; ?>>8분</option>
			<option value="9" <?php if($SMinute=="09") echo "selected"; ?>>9분</option>
			<option value="10" <?php if($SMinute=="10") echo "selected"; ?>>10분</option>
			<option value="11" <?php if($SMinute=="11") echo "selected"; ?>>11분</option>
			<option value="12" <?php if($SMinute=="12") echo "selected"; ?>>12분</option>
			<option value="13" <?php if($SMinute=="13") echo "selected"; ?>>13분</option>
			<option value="14" <?php if($SMinute=="14") echo "selected"; ?>>14분</option>
			<option value="15" <?php if($SMinute=="15") echo "selected"; ?>>15분</option>
			<option value="16" <?php if($SMinute=="16") echo "selected"; ?>>16분</option>
			<option value="17" <?php if($SMinute=="17") echo "selected"; ?>>17분</option>
			<option value="18" <?php if($SMinute=="18") echo "selected"; ?>>18분</option>
			<option value="19" <?php if($SMinute=="19") echo "selected"; ?>>19분</option>
			<option value="20" <?php if($SMinute=="20") echo "selected"; ?>>20분</option>
			<option value="21" <?php if($SMinute=="21") echo "selected"; ?>>21분</option>
			<option value="22" <?php if($SMinute=="22") echo "selected"; ?>>22분</option>
			<option value="23" <?php if($SMinute=="23") echo "selected"; ?>>23분</option>
			<option value="24" <?php if($SMinute=="24") echo "selected"; ?>>24분</option>
			<option value="25" <?php if($SMinute=="25") echo "selected"; ?>>25분</option>
			<option value="26" <?php if($SMinute=="26") echo "selected"; ?>>26분</option>
			<option value="27" <?php if($SMinute=="27") echo "selected"; ?>>27분</option>
			<option value="28" <?php if($SMinute=="28") echo "selected"; ?>>28분</option>
			<option value="29" <?php if($SMinute=="29") echo "selected"; ?>>29분</option>
			<option value="30" <?php if($SMinute=="30") echo "selected"; ?>>30분</option>
			<option value="31" <?php if($SMinute=="31") echo "selected"; ?>>31분</option>
			<option value="32" <?php if($SMinute=="32") echo "selected"; ?>>32분</option>
			<option value="33" <?php if($SMinute=="33") echo "selected"; ?>>33분</option>
			<option value="34" <?php if($SMinute=="34") echo "selected"; ?>>34분</option>
			<option value="35" <?php if($SMinute=="35") echo "selected"; ?>>35분</option>
			<option value="36" <?php if($SMinute=="36") echo "selected"; ?>>36분</option>
			<option value="37" <?php if($SMinute=="37") echo "selected"; ?>>37분</option>
			<option value="38" <?php if($SMinute=="38") echo "selected"; ?>>38분</option>
			<option value="39" <?php if($SMinute=="39") echo "selected"; ?>>39분</option>
			<option value="40" <?php if($SMinute=="40") echo "selected"; ?>>40분</option>
			<option value="41" <?php if($SMinute=="41") echo "selected"; ?>>41분</option>
			<option value="42" <?php if($SMinute=="42") echo "selected"; ?>>42분</option>
			<option value="43" <?php if($SMinute=="43") echo "selected"; ?>>43분</option>
			<option value="44" <?php if($SMinute=="44") echo "selected"; ?>>44분</option>
			<option value="45" <?php if($SMinute=="45") echo "selected"; ?>>45분</option>
			<option value="46" <?php if($SMinute=="46") echo "selected"; ?>>46분</option>
			<option value="47" <?php if($SMinute=="47") echo "selected"; ?>>47분</option>
			<option value="48" <?php if($SMinute=="48") echo "selected"; ?>>48분</option>
			<option value="49" <?php if($SMinute=="49") echo "selected"; ?>>49분</option>
			<option value="50" <?php if($SMinute=="50") echo "selected"; ?>>50분</option>
			<option value="51" <?php if($SMinute=="51") echo "selected"; ?>>51분</option>
			<option value="52" <?php if($SMinute=="52") echo "selected"; ?>>52분</option>
			<option value="53" <?php if($SMinute=="53") echo "selected"; ?>>53분</option>
			<option value="54" <?php if($SMinute=="54") echo "selected"; ?>>54분</option>
			<option value="55" <?php if($SMinute=="55") echo "selected"; ?>>55분</option>
			<option value="56" <?php if($SMinute=="56") echo "selected"; ?>>56분</option>
			<option value="57" <?php if($SMinute=="57") echo "selected"; ?>>57분</option>
			<option value="58" <?php if($SMinute=="58") echo "selected"; ?>>58분</option>
			<option value="59" <?php if($SMinute=="59") echo "selected"; ?>>59분</option>
			<option value="60" <?php if($SMinute=="60") echo "selected"; ?>>60분</option>
			</select>
			<select name=Stimes>
			<option value="1" <?php if($SSecond=="01") echo "selected"; ?>>1초</option>
			<option value="2" <?php if($SSecond=="02") echo "selected"; ?>>2초</option>
			<option value="3" <?php if($SSecond=="03") echo "selected"; ?>>3초</option>
			<option value="4" <?php if($SSecond=="04") echo "selected"; ?>>4초</option>
			<option value="5" <?php if($SSecond=="05") echo "selected"; ?>>5초</option>
			<option value="6" <?php if($SSecond=="06") echo "selected"; ?>>6초</option>
			<option value="7" <?php if($SSecond=="07") echo "selected"; ?>>7초</option>
			<option value="8" <?php if($SSecond=="08") echo "selected"; ?>>8초</option>
			<option value="9" <?php if($SSecond=="09") echo "selected"; ?>>9초</option>
			<option value="10" <?php if($SSecond=="10") echo "selected"; ?>>10초</option>
			<option value="11" <?php if($SSecond=="11") echo "selected"; ?>>11초</option>
			<option value="12" <?php if($SSecond=="12") echo "selected"; ?>>12초</option>
			<option value="13" <?php if($SSecond=="13") echo "selected"; ?>>13초</option>
			<option value="14" <?php if($SSecond=="14") echo "selected"; ?>>14초</option>
			<option value="15" <?php if($SSecond=="15") echo "selected"; ?>>15초</option>
			<option value="16" <?php if($SSecond=="16") echo "selected"; ?>>16초</option>
			<option value="17" <?php if($SSecond=="17") echo "selected"; ?>>17초</option>
			<option value="18" <?php if($SSecond=="18") echo "selected"; ?>>18초</option>
			<option value="19" <?php if($SSecond=="19") echo "selected"; ?>>19초</option>
			<option value="20" <?php if($SSecond=="20") echo "selected"; ?>>20초</option>
			<option value="21" <?php if($SSecond=="21") echo "selected"; ?>>21초</option>
			<option value="22" <?php if($SSecond=="22") echo "selected"; ?>>22초</option>
			<option value="23" <?php if($SSecond=="23") echo "selected"; ?>>23초</option>
			<option value="24" <?php if($SSecond=="24") echo "selected"; ?>>24초</option>
			<option value="25" <?php if($SSecond=="25") echo "selected"; ?>>25초</option>
			<option value="26" <?php if($SSecond=="26") echo "selected"; ?>>26초</option>
			<option value="27" <?php if($SSecond=="27") echo "selected"; ?>>27초</option>
			<option value="28" <?php if($SSecond=="28") echo "selected"; ?>>28초</option>
			<option value="29" <?php if($SSecond=="29") echo "selected"; ?>>29초</option>
			<option value="30" <?php if($SSecond=="30") echo "selected"; ?>>30초</option>
			<option value="31" <?php if($SSecond=="31") echo "selected"; ?>>31초</option>
			<option value="32" <?php if($SSecond=="32") echo "selected"; ?>>32초</option>
			<option value="33" <?php if($SSecond=="33") echo "selected"; ?>>33초</option>
			<option value="34" <?php if($SSecond=="34") echo "selected"; ?>>34초</option>
			<option value="35" <?php if($SSecond=="35") echo "selected"; ?>>35초</option>
			<option value="36" <?php if($SSecond=="36") echo "selected"; ?>>36초</option>
			<option value="37" <?php if($SSecond=="37") echo "selected"; ?>>37초</option>
			<option value="38" <?php if($SSecond=="38") echo "selected"; ?>>38초</option>
			<option value="39" <?php if($SSecond=="39") echo "selected"; ?>>39초</option>
			<option value="40" <?php if($SSecond=="40") echo "selected"; ?>>40초</option>
			<option value="41" <?php if($SSecond=="41") echo "selected"; ?>>41초</option>
			<option value="42" <?php if($SSecond=="42") echo "selected"; ?>>42초</option>
			<option value="43" <?php if($SSecond=="43") echo "selected"; ?>>43초</option>
			<option value="44" <?php if($SSecond=="44") echo "selected"; ?>>44초</option>
			<option value="45" <?php if($SSecond=="45") echo "selected"; ?>>45초</option>
			<option value="46" <?php if($SSecond=="46") echo "selected"; ?>>46초</option>
			<option value="47" <?php if($SSecond=="47") echo "selected"; ?>>47초</option>
			<option value="48" <?php if($SSecond=="48") echo "selected"; ?>>48초</option>
			<option value="49" <?php if($SSecond=="49") echo "selected"; ?>>49초</option>
			<option value="50" <?php if($SSecond=="50") echo "selected"; ?>>50초</option>
			<option value="51" <?php if($SSecond=="51") echo "selected"; ?>>51초</option>
			<option value="52" <?php if($SSecond=="52") echo "selected"; ?>>52초</option>
			<option value="53" <?php if($SSecond=="53") echo "selected"; ?>>53초</option>
			<option value="54" <?php if($SSecond=="54") echo "selected"; ?>>54초</option>
			<option value="55" <?php if($SSecond=="55") echo "selected"; ?>>55초</option>
			<option value="56" <?php if($SSecond=="56") echo "selected"; ?>>56초</option>
			<option value="57" <?php if($SSecond=="57") echo "selected"; ?>>57초</option>
			<option value="58" <?php if($SSecond=="58") echo "selected"; ?>>58초</option>
			<option value="59" <?php if($SSecond=="59") echo "selected"; ?>>59초</option>
			<option value="60" <?php if($SSecond=="60") echo "selected"; ?>>60초</option>
			</select>			
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[등록하기]</b></a>
</div>
<p>
<?php
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>