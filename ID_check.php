<?php
include "config/session_inc.php";
include "config/lib.php";
if(!isset($_REQUEST['member_id'])){$member_id  ="";} else {$member_id = $_REQUEST['member_id'];} 

?>
<html>
<head>
<title> 아이디체크</title>
<LINK rel="stylesheet" type="text/css" href="./css/stylesheet.css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
if(!$member_id){
	echo "아이디를 먼저 넣어세요.";
}else{
	$query="select member_id from member where member_id='$member_id' ";
	$result=mysqli_query($link,$query);
	$num=mysqli_num_rows($result);
	if ($num)
		{
		echo "이미 존재하는 아이디입니다.";		
		}else{
			echo "사용할 수 있는 아이디입니다";
			}
}
?>
</body>
</html>