<?php
include "top.php";
include "MyPageLeft.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 

if($my_member_id){
	if($mod=='mymemberdel'){ // 회원탈퇴
		$querydel=mysqli_query($link,"delete from member where member_id='$my_member_id'");
		$querydel=mysqli_query($link,"delete from basket where orderer='$my_member_id'");
		$querydel=mysqli_query($link,"delete from mylist where orderer='$my_member_id'");
		$querydel=mysqli_query($link,"delete from mylistmemo where orderer='$my_member_id'");
		$querydel=mysqli_query($link,"delete from myorder where orderer='$my_member_id'");
		$querydel=mysqli_query($link,"delete from myreview where memberid='$my_member_id'");
		echo ("<meta http-equiv='Refresh' content='0 URL=MyList.php'>");
	}else{
?>

<script>
<!--
	function member_ag() 
	{
		var forms = document.member_tt_agree;
		if (!forms.agreement.checked) 
		{
			alert("회원 탈퇴에 동의하지 않으셨습니다.\n회원 탈퇴에 동의하셔야 회원탈퇴가 이루어집니다.");
			forms.agreement.focus();
			return;
		}

		document.member_tt_agree.action = 'MyMemberDel.php?mod=mymemberdel';
	    document.member_tt_agree.submit();
    }

//-->	
</script>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td width="20" height="40">
<img src="image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B><?php echo $my_name; ?> 님 회원탈퇴</B>
</td>
</tr>
<tr><td colspan="2" class="bgc_bar" height="2"></td></tr>
</table>
<p>
              <table align="center" border="1" cellpadding="2" cellspacing="0" width="730" bgcolor="white" bordercolordark="white" bordercolorlight="#CCCCCC">
                <tr>
                  <td>
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="730">
                <tr>
                  <td width="730">
						<span style="font-size:3pt;">&nbsp;</span><br>
                      * 회원탈퇴 하시면 장바구니, 마이리스트, 주문서, 리뷰등 모든 데이터가 삭제 됩니다.
					  <br><span style="font-size:3pt;">&nbsp;</span><br>
                      * 삭제된 데이터는 복구가 불가능합니다.
					  <br><span style="font-size:3pt;">&nbsp;</span><br>
                      * 위의 사항에 모두 동의하셔야 회원탈퇴가 이루어 집니다.
					  <br><span style="font-size:3pt;">&nbsp;</span><br>
						<form name="member_tt_agree" method="post">
						<div> 회원 탈퇴에 동의합니다. 
						<input type="checkbox" name="agreement" value="checkbox">
						</div>
						</form>
				  </td> 
                </tr>
              </table>
				  </td> 
                </tr>
              </table>

<p>
<div align="left" style="padding-left:150px">
<a href="javascript:member_ag();"><b>[회원탈퇴]</b></a> &nbsp; <a href="MyPage.php"><b>[아니오]</b>
</div>
<p>
<?php
}
}else{
include "link_login.php";
}
include "bottom.php";
?>
