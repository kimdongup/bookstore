<?php
include "config/session_inc.php";
include "config/lib.php";
$query=mysqli_query($link,"select * from myorder where ordernum='$ordernum'");
$row=mysqli_fetch_array($query);

?>
<title>영수증 인쇄</title>
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<table cellspacing="0" width="710" border="1" bordercolordark="white" bordercolorlight="black">
    <tr>
        <td width="710" colspan="8">
            <p align="center"><b><span style="font-size:16pt;">영 수 증</span></b></p>
            <p align="center"><b>&nbsp;</b></p>
        </td>
    </tr>
    <tr>
        <td width="48">
            <p align="right"><b>NO :</b></p>
        </td>
        <td width="126">
            <p>611-03-66666</p>
        </td>
        <td width="179" colspan="2">
            <p align="center"><b>[공 급 자]</b></p>
        </td>
        <td width="64">
            <p align="right"><b>주문자 :</b></p>
        </td>
        <td width="116">
            <p><?php echo $row['ordername']; ?></p>
        </td>
        <td width="177" colspan="2">
            <p align="center"><b>[공급받는자]</b></p>
        </td>
    </tr>
    <tr>
        <td width="48">
            <p align="right"><b>주소 :</b></p>
        </td>
        <td width="305" colspan="3">
            <p>대구광역시 남구 이천로 82</p>
        </td>
        <td width="64">
            <p align="right"><b>전화 :</b></p>
        </td>
        <td width="116">
            <p><?php echo $row['tel1']."-".$row['tel2']."-".$row['tel3']; ?></p>
        </td>
        <td width="66">
            <p align="right"><b>휴대폰 :</b></p>
        </td>
        <td width="111">
            <p><?php echo $row['htel1']."-".$row['htel2']."-".$row['htel3']; ?></p>
        </td>
    </tr>
    <tr>
        <td width="48">
            <p align="right"><b>업태 :</b></p>
        </td>
        <td width="126">
            <p>유통업</p>
        </td>
        <td width="45">
            <p>업종 :</p>
        </td>
        <td width="134">
            <p>의료기기 유통</p>
        </td>
        <td width="64">
            <p align="right"><b>주소 :</b></p>
        </td>
        <td width="293" colspan="3">
            <p><?php echo $row['address']." ".$row['post_num']; ?></p>
        </td>
    </tr>
    <tr>
        <td width="710" height="18" colspan="8">
            <p><b>구입년월일 :
<?php 
$drtime=$row['orderday'];
$year = date('Y',$drtime);
$month = date('m',$drtime);
$day = date('d',$drtime);
echo $year."/".$month."/".$day;
?>		
			</b></p>
        </td>
    </tr>
    <tr>
        <td width="710" colspan="8">
            <table border="1" cellspacing="0" width="100%" bordercolordark="white" bordercolorlight="black">
                <tr>
                    <td width="71">
                        <p align="center">월/일</p>
                    </td>
                    <td width="355">
                        <p align="center">품목</p>
                    </td>
                    <td width="73">
                        <p align="center">수량</p>
                    </td>
                    <td width="181">
                        <p align="center">단가</p>
                    </td>
                </tr>
<?php
$query2=mysqli_query($link,"select * from basket where ordernum='$ordernum'");
while($row2=mysqli_fetch_array($query2)){
?>
                <tr>
                    <td width="71">
                      <?php echo $month."/".$day; ?>
                    </td>
                    <td width="355">
                        <p align="center"><?php echo $row2['name']; ?></p>
                    </td>
                    <td width="73">
                        <p align="center"><?php echo number_format($row2['quantity']); ?></p>
                    </td>
                    <td width="181">
                        <p align="center"><?php echo number_format($row2['price']); ?></p>
                    </td>
                </tr>
<?php
}
?>


            </table>
            <p><b>합계금액 : <?php echo number_format($row['allcash']); ?> 원</b>(택배비 포함)</p>
        </td>
    </tr>
</table>
<?php mysqli_close($link); ?>
<script>print();</script>