<?php
$mysql_host = 'localhost';     // 호스트명 
$mysql_user = 'root';     // 사용자 계정 
$mysql_pwd  = '';      // 비밀번호 
$mysql_db   = 'online';       // DB(데이터베이스)명) 
$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pwd, $mysql_db);if (mysqli_connect_errno()) {printf("Connect failed: \%s\n", mysqli_connect_error());exit();}
?>