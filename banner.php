<?php
require_once "config/session_inc.php";
include_once "config/lib.php";
?>
<HTML>
<HEAD>
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<?php
if($seoropopup !== "Y"){
	$query=mysql_query("select * from popupnews order by rdate desc limit 1");
	while ($row=mysql_fetch_array($query)) //  where imgopen='1' 여러 개 띄우기
	{
	$imgwidth=$row[imgwidth];
	$imgheight=$row[imgheight];

?>
<SCRIPT language="javascript">	window.open("popup/popup.php","","left=0,top=0,scrollbars=auto,resizable=auto,width=<?=$imgwidth?>,height=<?=$imgwidth?>");
</SCRIPT>
</head>
<body leftmargin=0 topmargin=0>
<?php
}
}
?>
<!--
앙케트
<SCRIPT language="javascript">	window.open("question/QuestionGuestList.php","","left=0,top=0,scrollbars=auto,resizable=auto,width=500,height=600");
</SCRIPT>
-->

<!--
팝업공지
<SCRIPT language="javascript">	window.open("popup/popup.php","","left=0,top=0,scrollbars=auto,resizable=auto,width=<?=$imgwidth?>,height=<?=$imgwidth?>");
</SCRIPT>
-->

</BODY>
</HTML>


