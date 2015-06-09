<?php
include "top.php";
include "main_left.php";
if(!isset($_REQUEST['id'])){$id  ="";} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['receivername'])){$receivername  ="";} else {$receivername  = $_REQUEST['receivername'];}
if(!isset($_REQUEST['message'])){$message  ="";} else {$message  = $_REQUEST['message'];}
if(!isset($_REQUEST['name'])){$name  ="";} else {$name  = $_REQUEST['name'];}
if(!isset($_REQUEST['cont'])){$cont  ="";} else {$cont  = $_REQUEST['cont'];}

$query=mysqli_query($link,"select * from goods where id=$id");
$row=mysqli_fetch_array($query);
$query2=mysqli_query($link,"select * from goodsct where goodsid=$id");
$row2=mysqli_fetch_array($query2);
$name=$row[name];
$cont=$row2[gsintro];

$subject = $receivername."님께서 추천하셨습니다.";
$content = "
<HTML>
<head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<title>온라인 서점 만들기</title></head><body><p>$message<p><hr>$receivername 님께서 추천하는 책입니다.<p>$name<p>$cont<p><table border=\"0\"><tr><td></td></tr><tr><td><a href=\"http://localhost\" target=\"_blank\">온라인서점만들기</a></td></tr></table></body></html>
";
mailer($receivername, $receiveremail, $sendemail, $subject, $content);

echo "<p>잘 보냈습니다.";
include "bottom.php";
?>
