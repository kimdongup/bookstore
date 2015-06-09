<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
﻿<SCRIPT LANGUAGE='javascript'>
<!--
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

function hidnum3(){
	Form1.hidf3.value = Form1.cashf3.value.replace(/,|\s+/g,''); // hidf3에는 콤마 없는 값 입력
	Form1.cashf3.value = comma3(Form1.hidf3);
}

function comma3(comma3){
	    len = Form1.hidf3.value.length;
		loop =len/3; 
		offset = len % 3;
		if(offset == 0) offset = 3;
		val = Form1.hidf3.value.substring(0,offset); // substring(인덱스1,인덱스3) 인덱스1에서 인덱스3 사이에 있는 문자열을 문장 중에 추출한다.
		for(var i=1;i<loop;i++){
			val +="," +Form1.hidf3.value.substring(offset,offset+3);
			offset +=3;
		}
	return val;
}
//-->
</SCRIPT>