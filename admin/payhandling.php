<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['orderid'])){$orderid ="";} else {$orderid = $_REQUEST['orderid'];}
if(!isset($_REQUEST['mod'])){$mod ="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['handnum'])){$handnum ="";} else {$handnum = $_REQUEST['handnum'];}

if($my_admin_id && $my_admin_pwd){

    $queryorder=mysqli_query($link,"select * from myorder where id='$orderid'");
    $roworder=mysqli_fetch_array($queryorder);
    $payhandok=$roworder['confirmation'];

    if($mod == 'paymenthandlingok'){
    $update = "update myorder set confirmation='$handnum' where id='$orderid' ";
    $result=mysqli_query($link,$update);

    echo "처리되었습니다.";
    exit();
}
?>
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<table align="center" border="0" cellspacing="0" cellpadding="1" width="780" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="230" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 결제처리</b></p>
        </td>
        <td align="right" width="500" height="30" bgcolor="#99CCFF">
            <p>&nbsp;</p>
        </td>
    </tr>
</table>


<form name=Form1 method=post action="<?php echo $_SERVER['SCRIPT_NAME']?>">
<input type="hidden" name="mod" value="paymenthandlingok">
<input type="hidden" name="orderid" value="<?php echo $roworder['id']?>">
	0:주문취소, 1:신용카드, 2:계좌이체, 3:휴대폰, 4:ARS, 5:폰빌, 6:무통장입금완료, 8:캐쉬결제, 66:무통장결제주문, 88:취소후재주문, 99:결제방식미선택

<table align="center" border="0" cellpadding="5" cellspacing="0" width="900">
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
	<tr>
	<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="55">
	<font color="red">*</font> 결제방식
	</td>
	<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
	<input type="text" name="handnum" value="<?php echo $roworder['confirmation']?>" maxlength="50" style="width:120px">
	</td>
	</tr>
	<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
<INPUT TYPE=SUBMIT NAME=SUBMIT VALUE=" 수정하기 ">
</form>
 
<?php
}else{ echo "이곳은 관리자 페이지입니다."; }
?>