<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
?>
<html>
<head>
<title>팝업창</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>
<script language="javascript">
<!--
function setCookie(name,value,expiredays)
{
   var todayDate = new Date();
   todayDate.setDate( todayDate.getDate() + expiredays );
   document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}
function pop_cookie(){
	setCookie("seoropopup","Y",1);
	self.close();
}
//-->
</script>
	<?php
	$query=mysql_query("select * from popupnews order by rdate desc limit 1");
	while ($row=mysql_fetch_array($query))
	{
	?>
<body topmargin="0" leftmargin="0" background="../popupnewsimg/<?php=$row[filename]?>">
<table width="<?php=$row[imgwidth]?>" height="<?php=$row[imgheight]?>" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td align="right" valign="bottom" height="<?php=$row[imgheight]?>">
	<span class="fontcolor">오늘하루 열지 않음 
	<input type="checkbox" name="checkbox" value="checkbox" onclick="pop_cookie()">&nbsp;</span>
	</td>
  </tr>
</table>

	<?php
	}
	?>
</body>
</html>