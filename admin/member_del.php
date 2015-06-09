<?php
include "../config/session_inc.php";
include "../config/lib.php";

if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['name'])){$name ="";} else {$name = $_REQUEST['name'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}
if(!isset($_REQUEST['pass'])){$pass ="";} else {$pass = $_REQUEST['pass'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "del_ok"){

$query=mysqli_query($link,"select * from member where id=$id ");
$row=mysqli_fetch_array($query);

if($row['pass1'] == $pass){

    if($row['filename']) {
    $delfilename1="../memberimg/$row[filename]";
    if(!@unlink($delfilename1)) {
            echo "파일삭제 실패패패패패";
    } else {
            echo "파일삭제 성공";
    }

    $delfilename1_1="../s_memberimg/$row[filename]";
    if(!@unlink($delfilename1_1)) {
            echo "파일삭제 실패패패패패";
    } else {
            echo "파일삭제 성공";
    }
    }

    $dbdel = "delete from member where id=$id ";
    $result=mysqli_query($link,$dbdel);

    mysqli_close($link);

    echo ("<meta http-equiv='Refresh' content='0; URL=member_admin.php'>");

}else{
	
  echo ("
  <script>
  alert('비밀번호가 틀렸습니다.')
  history.go(-1)
  </script>
  ");
  exit;
}
} else { echo "잘못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
?>