<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_REQUEST['name'])){$name ="";} else {$name = $_REQUEST['name'];}
if(!isset($_REQUEST['id'])){$id ="";} else {$id = $_REQUEST['id'];}
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

		var Fm = document.musimd;
		if(!Fm.pass.value) {
		alert("비밀번호를 입력하세요.");
		Fm.pass.focus();
		return; 
		}

		document.musimd.action = 'member_del.php';
	    document.musimd.submit();
    }

//-->	
</script>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B><?php echo $name; ?> 님 회원탈퇴</B>
</td>
</tr>
<tr><td colspan="2" class="bgc_bar" height="2"></td></tr>
</table>
<p>
              <table align="center" border="1" cellpadding="2" cellspacing="0" width="900" bgcolor="white" bordercolordark="white" bordercolorlight="#CCCCCC">
                <tr>
                  <td>
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
                <tr>
                  <td width="900">
						<span style="font-size:3pt;">&nbsp;</span><br>
                      * 회원탈퇴 하시면 모든 데이터가 삭제 됩니다.
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
<form method="post" name=musimd>
<input type="hidden" name="mod" value="del_ok">
<INPUT type=hidden name=id value="<?php echo $id; ?>">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td width="155" class="bgc_bar" height="2"></td>
			<td class="bgc_bar2"></td>
		</tr>
		<tr>
			<td width="155" nowrap style="padding-left:15px" class="bgc_table2" height="30">
				* 비밀번호
			</td>
			<td width="100%" bgcolor="#fcfcfc" style="padding-left:10px">
				<input type=password name="pass" size=12>
			</td>
		</tr>
		<tr><td colspan="2" height="1" bgcolor="#dcdcdc"></td></tr>
</table>
</form>
<div align="left" style="padding-left:150px">
<a href="javascript:member_ag();"><b>[회원탈퇴 처리하기]</b></a>
</div>
<p>
<?php include "bottom.html"; ?>