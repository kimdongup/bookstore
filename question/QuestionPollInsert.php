<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";

if($pollok=="yes"){
err_msg("이미 설문조사에 참가 했습니다.");
}else{
$pollok="yes";
session_register("pollok");

$query=mysql_query("select id from question order by id desc limit 1");
$row=mysql_fetch_array($query);
$nums=$row[id];
if($mod == "questionpollinsert"){
for($i=1; $i<$nums; $i++){
	$b="a".$i;
	$c=$$b;
// $b가 a1 이라면 $c 는 그 값이 된다. 그 값은 id 값이다.
$query2=mysql_query("select poll from question where  id='$c' ");
$row2=mysql_fetch_array($query2);
$polladd=$row2[poll]+1;
$update = "update question set poll='$polladd' where id='$c' ";
$result=mysql_query($update);
}

echo ("<meta http-equiv='Refresh' content='0; URL=QuestionGuestList.php'>");

mysql_close();

}else{ err_msg("잘못된 접근을 시도하고 있습니다."); }
}
?>