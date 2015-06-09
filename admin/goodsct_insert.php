<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}

if(!isset($_REQUEST['mod'])){$mod = "";} else {$mod  = $_REQUEST['mod'];}

if(!isset($_REQUEST['gsid'])){$gsid = "";} else {$gsid  = $_REQUEST['gsid'];}
if(!isset($_REQUEST['gsintro'])){$gsintro = "";} else {$gsintro  = $_REQUEST['gsintro'];}
if(!isset($_REQUEST['auintro'])){$auintro = "";} else {$auintro  = $_REQUEST['auintro'];}
if(!isset($_REQUEST['content'])){$content = "";} else {$content  = $_REQUEST['content'];}
if(!isset($_REQUEST['preview'])){$preview = "";} else {$preview  = $_REQUEST['preview'];}

if($my_admin_id && $my_admin_pwd){
    if($mod == "good_insert"){
        $insert = "insert into goodsct values ".
                "('$gsid','$gsintro','$auintro','$content','$preview')";
        $result=mysqli_query($link,$insert);

        $result=mysqli_query($link,"select name,gs2id from goods3 where id='$gs3id' ");
        $row=mysqli_fetch_array($result);
        $fixid3=$row['gs2id'];
        $name3=$row['name'];
        $result=mysqli_query($link,"select fixnum,name from goods2 where id='$fixid3' ");
        $row=mysqli_fetch_array($result);
        $fixid2=$row['fixnum'];
        $name2=$row['name'];
        $result=mysqli_query($link,"select fixnum,name from goods1 where fixnum='$fixid2' ");
        $row=mysqli_fetch_array($result);
        $fixid1=$row['fixnum'];
        $name1=$row['name'];

        $searchwd=$name1.$name2.$name3.$name;

        $insert2 = "insert into goodssc values ".
                "('$gsid','$searchwd')";
        $result2=mysqli_query($link,$insert2);

        mysqli_close($link);

        echo ("<meta http-equiv='Refresh' content='0; URL=goods_list.php'>");
    } else { echo "잘못된 접근입니다."; }
} else { echo "이곳은 관리자 페이지입니다."; }
?>