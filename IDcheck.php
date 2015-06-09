<SCRIPT LANGUAGE="JavaScript">
function IDCheck(){
window.open("ID_check.php?member_id=" + document.seoromf.member_id.value, "IDWin", "width=350,height=200,toolbar=no,status=no,scrollbars=auto");
}
// -->
</SCRIPT>

<form action="member_insert.php" method=post  name="seoromf" onSubmit="return seoromf_check(this);"> 
<INPUT type=text name=member_id size=10 maxlength=10 >
<INPUT type=button value='중복체크' onclick="IDCheck()">
</form>