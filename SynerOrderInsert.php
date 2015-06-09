<?php
include "top.php";
include "main_left.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1 ="";} else {$my_pass1 = $_SESSION['my_pass1'];}
if(!isset($_REQUEST['synerordernum'])){$synerordernum  =1;} else {$synerordernum  = $_REQUEST['synerordernum'];}
if(!isset($_REQUEST['id'])){$id  =1;} else {$id  = $_REQUEST['id'];}
if(!isset($_REQUEST['goodsid'])){$goodsid  =1;} else {$goodsid  = $_REQUEST['goodsid'];}
if(!isset($_REQUEST['ordername'])){$ordername  =1;} else {$ordername  = $_REQUEST['ordername'];}
if(!isset($_REQUEST['tel1'])){$tel1  =1;} else {$tel1  = $_REQUEST['tel1'];}
if(!isset($_REQUEST['tel2'])){$tel2  =1;} else {$tel2  = $_REQUEST['tel2'];}
if(!isset($_REQUEST['tel3'])){$tel3  =1;} else {$tel3  = $_REQUEST['tel3'];}
if(!isset($_REQUEST['htel1'])){$htel1  =1;} else {$htel1  = $_REQUEST['htel1'];}
if(!isset($_REQUEST['htel2'])){$htel2  =1;} else {$htel2  = $_REQUEST['htel2'];}
if(!isset($_REQUEST['htel3'])){$htel3  =1;} else {$htel3  = $_REQUEST['htel3'];}
if(!isset($_REQUEST['post1'])){$post1  =1;} else {$post1  = $_REQUEST['post1'];}
if(!isset($_REQUEST['post2'])){$post2  =1;} else {$post2  = $_REQUEST['post2'];}
if(!isset($_REQUEST['address'])){$address  =1;} else {$address  = $_REQUEST['address'];}
if(!isset($_REQUEST['post_num'])){$post_num  =1;} else {$post_num  = $_REQUEST['post_num'];}
if(!isset($_REQUEST['email'])){$email  =1;} else {$email  = $_REQUEST['email'];}
if(!isset($_REQUEST['bname'])){$bname  =1;} else {$bname  = $_REQUEST['bname'];}
if(!isset($_REQUEST['btel1'])){$btel1  =1;} else {$btel1  = $_REQUEST['btel1'];}
if(!isset($_REQUEST['btel2'])){$btel2  =1;} else {$btel2  = $_REQUEST['btel2'];}
if(!isset($_REQUEST['btel3'])){$btel3  =1;} else {$btel3  = $_REQUEST['btel3'];}
if(!isset($_REQUEST['bhtel1'])){$bhtel1  =1;} else {$bhtel1  = $_REQUEST['bhtel1'];}
if(!isset($_REQUEST['bhtel2'])){$bhtel2  =1;} else {$bhtel2  = $_REQUEST['bhtel2'];}
if(!isset($_REQUEST['bhtel3'])){$bhtel3  =1;} else {$bhtel3  = $_REQUEST['bhtel3'];}
if(!isset($_REQUEST['bpost1'])){$bpost1  =1;} else {$bpost1  = $_REQUEST['bpost1'];}
if(!isset($_REQUEST['bpost2'])){$bpost2  =1;} else {$bpost2  = $_REQUEST['bpost2'];}
if(!isset($_REQUEST['baddress'])){$baddress  =1;} else {$baddress  = $_REQUEST['baddress'];}
if(!isset($_REQUEST['bpost_num'])){$bpost_num  =1;} else {$bpost_num  = $_REQUEST['bpost_num'];}
if(!isset($_REQUEST['bemail'])){$bemail  =1;} else {$bemail  = $_REQUEST['bemail'];}
if(!isset($_REQUEST['content'])){$content  =1;} else {$content  = $_REQUEST['content'];}

if($my_member_id && $my_pass1){
$timeno=mktime();
$result=mysqli_query($link,"select * from synergicpurchase where id='$id'");
$row=mysqli_fetch_array($result);
$result2=mysqli_query($link,"select * from goods where id='$goodsid'");
$row2=mysqli_fetch_array($result2);

$synerprice=$row['price'] - $row['dcprice'];
$update = "update synergicpurchase set price='$synerprice' where id='$id' ";
$result=mysqli_query($link,$update);

$soquantity=$row['orderquantity']+1;
$update2 = "update synergicpurchase set orderquantity='$soquantity' where id='$id' ";
$result2=mysqli_query($link,$update2);

$querymyorder=mysqli_num_rows(mysqli_query($link,"select id from synerorder where ordernum='$synerordernum' "));
if($querymyorder < 1){ // 사용한 장바구니 체크
$insert = "insert into synerorder values ".
	"('','$synerordernum','$my_member_id','$ordername','$row[id]',".
	"'$tel1','$tel2','$tel3','$htel1','$htel2','$htel3',".
	"'$post1','$post2','$address','$post_num','$email',".	"'$bname','$btel1','$btel2','$btel3','$bhtel1','$bhtel2','$bhtel3',".
	"'$bpost1','$bpost2','$baddress','$bpost_num','$bemail',".	
	"'$content','0','1','$timeno')";
$result=mysqli_query($link,$insert);
unset($_SESSION['synerordernum']);
mysqli_close($link);
echo ("<meta http-equiv='Refresh' content='0; URL=MyPage.php'>");
}else{
echo "<p>이미 사용한 장바구니 입니다.<br>";
echo "다시 쇼핑하기를 원하시면 확인 버튼을 클릭해 주세요.<p>";
echo "<a href=home.php><img src=image/confirmation.gif border=0></a>";
}
}else{
echo ("<meta http-equiv='Refresh' content='0; URL=login.php'>");
}
include "bottom.php";
?>