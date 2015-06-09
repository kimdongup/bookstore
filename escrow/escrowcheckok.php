<SCRIPT language=JavaScript src="데이콤 부여 주소"></SCRIPT>
<SCRIPT language=javascript> 
 function linkESCROW(mid,oid) 
 { 
   var merturl = "escrowsave.php" ; 
   checkDacomESC (mid, oid, ''); 
   location.reload(); 
 } 
</SCRIPT> 
</head>
<body>
<table align="center" border="0" cellpadding="6" cellspacing="1" width="450" height="300"  bgcolor="gray">
  <tr>
     <td width="400" align="center" bgcolor="#f4f4f4">
<b>에스크로 구매확인</b>
<p>&nbsp;</p>
주문번호 : <?php echo $oid; ?>을 수령하셨습니까?
<p>&nbsp;</p>
 
 <a href="javascript:linkESCROW('상점아이디', '<? echo $oid; ?>');"><b>[예]구매확인</b></a>
 </td> 
</tr> 
</table>