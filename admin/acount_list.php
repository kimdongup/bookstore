<?php
require_once "../config/session_inc.php";
include_once "../config/lib.php";
include "../config/config.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
    
if($my_admin_id && $my_admin_pwd){
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>무통장 계좌 보기</B>
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>
<table width="900" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<?php
echo $BankNum[0]."<br>";
echo $BankNum[1]."<br>";
echo $BankNum[2]."<p>";
?>
</td>
</tr>
<tr>
<td><font color=blue>
무통장 계좌의 추가 or 삭제는 
<br>config 폴더의 config.php 파일의 13라인에서 하세요.
</font><p></td>
</tr>
<tr>
<td><font color=red>
2006년보월 1일부터 에스크로 제도가 시행되었습니다.
<br>따라서 10만원 이상의 거래가 가능한 온라인 쇼핑몰은 모두 이 제도를 따라야합니다.
<br>전자보증 없이 무통장 거래만 하는 것은 불가능합니다. 
<br>차질 없으시길 바랍니다.
</font></td>
</tr>
</table>
<p>
<?php
}else{ err_msg("이곳은 관리자 페이지입니다."); }
include "bottom.html";     // 하단 구성
?>