<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}

if($my_admin_id && $my_admin_pwd){
    if($mod == "popupnewsmodify"){

    $query=mysqli_query($link,"select * from popupnews where id='$id' ");
    $rowbody=mysqli_fetch_array($query);

    if($_FILES["imgup1"]["name"]){
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
    }

    $timeno=mktime();
    // 이미지 저장 디렉토리명
    $save_dir = "popupnewsimg";

    // 사진1 

    if(is_uploaded_file($_FILES["imgup1"]["tmp_name"])) {
            $imgup1_size=$_FILES["imgup1"]["size"];
        if($imgup1_size > 10 && $imgup1_size < 300000){ 

                    $filewidth1=stripslashes($_FILES["imgup1"]["tmp_name"]);
            $widthsize1=@GetImageSize($filewidth1); 
            $fwidth1=800;  // 최대 넓이
                    $fheight1=600;  //최대 높이

              // 이미지 사이즈가 지정된 넓이보다 작거나 같으면 현재 사이즈를 유지
              if($widthsize1[0]<=$fwidth1 && $widthsize1[1]<=$fheight1) {

            $imgup1_name=$_FILES["imgup1"]["name"];
            $file_ext1 = strtolower(substr(strrchr($imgup1_name,"."), 1));
            if (eregi("jpg|jpeg|gif|png",$file_ext1)) {
            $timeno1=$timeno+1; 
            $imgup1_name1=$timeno1.".".$file_ext1;
            $dest = "../".$save_dir . "/" . $imgup1_name1;
       if(!move_uploaded_file($_FILES['imgup1']['tmp_name'],$dest)) {
          die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");      
       }

       // 썸네일  

            if($file_ext1 == 'jpg' || $file_ext1 == 'jpeg'){
            ?>
            <img src=img_thum_goods_jpg.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
            <?php
            } else if($file_ext1 == 'gif'){
            ?>
            <img src=img_thum_goods_gif.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
            <?php
            } else if($file_ext1 == 'png'){
            ?>
            <img src=img_thum_goods_png.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
            <?php
            }

    $update = "update popupnews set filename='$imgup1_name1' where id=$id ";
    $result=mysqli_query($link,$update);

    } // 확장자검사
    } // 이미지넓이
    } // 이미지 크기
    } // 파일 검사

    $update = "update popupnews set imgopen='$imgopen',imgwidth='$imgwidth',imgheight='$imgheight',rdate='$timeno' where id='$id' ";
    $result=mysqli_query($link,$update);

    echo ("<meta http-equiv='Refresh' content='0; URL=PopupNewsList.php'>");
    } else { echo "잘못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
mysqli_close($link);
include "bottom.html";
?>