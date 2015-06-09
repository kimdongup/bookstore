<table align="center" border="0" cellpadding="6" cellspacing="1" width="450" height="300"  bgcolor="gray">
  <tr>
     <td width="400" align="center" bgcolor="#f4f4f4">
<p>&nbsp;</p>
	 주문번호 : <?php echo $oid; ?> 
<br><span style=font-size:3pt;>&nbsp;</span><br>
배송자 : 김동업 / 배송자 전화 : 010-7359-7355 
<br><span style=font-size:3pt;>&nbsp;</span><br>
택배사 : 택배회사 
<br><span style=font-size:3pt;>&nbsp;</span><br>
<form name="mainForm" method="POST" action="escrowdelivery.php">
<font color=navy><b>운송장 번호</b></font>
<br><span style=font-size:3pt;>&nbsp;</span><br>
<input type="hidden" name="oid" value="<?php=$oid?>">
<input type="text" name="dlvno" value="" size="30">
<br><span style=font-size:3pt;>&nbsp;</span><br>
<input type="submit" value=" 다음 " onclick="javascript:openWindow()">
</form>
     </td>
   </tr>
</table>