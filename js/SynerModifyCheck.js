<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
﻿<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.goodsid.value) {
	alert("상품고유번호를 입력하세요.");
	Fm.goodsid.focus();
	return; } 
	if(!Fm.hidf1.value) {
	alert("시작가를 입력하세요.");
	Fm.cashf1.focus();
	return; }    
    if(!Fm.hidf2.value) {
	alert("현재가를 입력하세요.");
	Fm.cashf2.focus();
	return; }
    if(!Fm.hidf3.value) {
	alert("최저가를 입력하세요.");
	Fm.cashf3.focus();
	return; }
    if(!Fm.dcprice.value) {
	alert("할인가를 입력하세요.");
	Fm.dcprice.focus();
	return; } 
    if(!Fm.recordquantity.value) {
	alert("등록수량을 입력하세요.");
	Fm.recordquantity.focus();
	return; } 
  	
	document.Form1.action = 'SynerPurModifyIns.php';
	document.Form1.submit();
}
//-->
</SCRIPT>