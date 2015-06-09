<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['pass'])){$pass ="";} else {$pass = $_REQUEST['pass'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
if($mod == "del_ok"){
    if($pass == "$my_admin_pwd"){
        $query=mysqli_query($link,"select * from popupnews where id='$id' ");
        $rowbody=mysqli_fetch_array($query);


        if($rowbody['filename']) {
        $delfilename1="../popupnewsimg/$rowbody[filename]";
        if(!@unlink($delfilename1)) {
                echo "파일삭제 실패";
        } else {
                echo "파일 삭제 성공";
        }

        $delfilename1_1="../s_popupnewsimg/$rowbody[filename]";
        if(!@unlink($delfilename1_1)) {
                echo "파일삭제 실패";
        } else {
                echo "파일 삭제 성공";
        }
        }

        $dbdel = "delete from popupnews where id=$id ";
        $result=mysqli_query($link,$dbdel);

        mysqli_close($link);
        echo ("<meta http-equiv='Refresh' content='0; URL=PopupNewsList.php'>");
    }else{ echo "비밀번호가 틀립니다."; }
}else{ echo "잘 못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
?>