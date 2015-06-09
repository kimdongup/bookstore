<?php
session_start(); 
// extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_SESSION_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_SERVER_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_POST_FILES, EXTR_PREFIX_SAME,"");
include "config/lib.php";

$result=mysqli_query($link,"create table test".
        "(member_id varchar(20) not null,".
		"index member_id(member_id))");

if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}
mysqli_close($link);
?>