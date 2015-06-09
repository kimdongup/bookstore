<?php
include "config/session_inc.php";
include "config/lib.php"; 
if(!isset($_REQUEST['mod'])){ $mod="";} else {$mod = $_REQUEST['mod'];}
if(!isset($_REQUEST['search'])){ $search="";}else {$search = $_REQUEST['search'];}
?>
<HTML>
<HEAD>
<title>우편번호 검색</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" type="text/css" href="css/stylesheet.css">
<script language=javascript>
<!--
function post_insert(pt1,pt2,pt3)
{
    opener.document.Form1.bpost1.value = pt1;
    opener.document.Form1.bpost2.value = pt2;
	opener.document.Form1.baddress.value = pt3;
	opener.document.Form1.bpost_num.focus();
	self.close();
}
//-->
</script>
</head>
<body>
<table width="500" border="0">
<tr>
<td align="center" width="450">
<b>우편번호 찾기</b>
</td>
</tr>
<tr>
<td align="center">

<form name="seorocp" method="post" action=check_post3.php>
<input type="hidden" name="mod" value="yes">
<table  border=0>
<tr><td>읍,면,동 :</td>
<td><input type=text name=search size=12>
<input  type=submit  name=submit value="검색"> 
</td>
</tr>
</table>
</form>
<script>document.seorocp.search.focus();</script>
</td></tr></table>
</body>
</html>
<?php
if($mod){
    $postcheck="select * from post where umdong like '$search%'";
    $post_num=mysqli_num_rows(mysqli_query($link,$postcheck));
    if($post_num > 0) {
        $postquery=mysqli_query($link,"select * from post where umdong like '$search%'");
        while ($row=mysqli_fetch_array($postquery)) {
            $pt1=substr($row['num'],0,3);
            $pt2=substr($row['num'],3,3);
            $pt3=$row['sido']." ".$row['gugun']." ".$row['umdong'];
?>
<a href="javascript:post_insert('<?php echo $pt1; ?>','<?php echo $pt2; ?>','<?php echo $pt3; ?>')">
<?php echo $row['sido']." ".$row['gugun']." ".$row['umdong']." ".$row['bunji']; ?> [선택] </a>
<p>
<?php
        }
    }else{
        echo "<p align=center>* 검색된 주소가 없습니다.";
    }
}
?>