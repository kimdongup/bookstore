<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){ $mod=""; } else {$mod=$_REQUEST['mod'];} 
if(!isset($_REQUEST['point'])){ $point=0; } else {$point=$_REQUEST['point'];} 

if($my_member_id){
    $querymb=mysqli_query($link,"select cash,point,pointok from member where member_id='$my_member_id' ");
    $rowmb=mysqli_fetch_array($querymb);

    if($mod=='cashchange'){ // 포인터를 캐쉬로 변환
        if($rowmb['pointok']=='2'){
            $CashChange=$rowmb['cash']+$rowmb['point'];
            $timenow=mktime();
            $update=mysqli_query($link,"update member set cash='$CashChange',point='0', pointok='0', cashday='$timenow' where member_id='$my_member_id'");
            echo "<meta http-equiv='Refresh' content='0 URL=$_SERVER[REQUEST_URI]' ";
        }else{
            echo "<p>&nbsp;</p>캐쉬로 변환 할 포인터가 없습니다.";
            exit();
        }
    }else{
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="735" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 포인터를 캐쉬로 변환하기</b></p>
        </td>
        <td align="right" width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="730" >
<tr>
	<td width=200 align="right">변환 포인터 총액 :</td>
	<td width=200 align="right" height="25"><?php echo number_format($rowmb['point']); ?>원<td>
	<td width=30>&nbsp;</td>
	<td width=300> 주문한 상품이 완료 되었을 경우에만 변환 됩니다.</td> 
</tr>
<tr><td colspan="5" height="1" bgcolor="#CCCCCC"></td></tr>
<tr>
	<td width=200 align="right"></td>
	<td width=200 align="right" height="25"><td>
	<td width=30>&nbsp;</td>
	<td width=300><a href="PointCashC.php?mod=cashchange">[변환실행]</a></td> 
</tr>
<tr><td colspan="5" height="1" bgcolor="#CCCCCC"></td></tr>
</table>


<p>
<?php
    }
} else {
    include "link_login.php";
}
include "bottom.php";     // 하단 구성
?>