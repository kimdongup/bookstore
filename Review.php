<?php
include "top.php";
include "main_left.php";	
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}

if($my_member_id){
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="735" bordercolordark="white" bordercolorlight="#0072D1">
    <tr>
        <td width="730" height="30" bgcolor="#99CCFF">
            <p>&nbsp;<b>◎ 리뷰 전체보기</b></p>
        </td>
    </tr>
</table>
<?php
$query2=mysqli_query($link,"select * from myreview");
$numrows2=mysqli_num_rows($query2);
if($numrows2 > 0){
	while($rowbody2=mysqli_fetch_array($query2)){
		$query=mysqli_query($link,"select * from goods where id='$rowbody2[goodsid]'");
		$rowbody=mysqli_fetch_array($query);
?>
<table align="center" border="0" cellspacing="0" cellpadding="1" width="730">
<tr><td width="100" valign="top" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<a href="goodsview.php?id=<?php echo $rowbody['id']?>">
<img src="s_goodsimg/<?php echo $rowbody['filename']; ?>" border="0"></a><br>
<form>
<input type="button" Value="상세내용" onClick="window.open ('big_img.php?id=<?php echo $rowbody['id']?>', 'new', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto, resizable=no,copyhistory=no,width=700, height=500')">
</form>
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<table width="630" border="0" cellpadding="0" cellspacing="0">
<tr>
<td style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php
$query3=mysqli_query($link,"select * from myreview where goodsid=$rowbody[id] limit 2");
while($rowbody3=mysqli_fetch_array($query3)){
echo "<b>".$rowbody3['title']."</b><br>";
echo $rowbody3['memberid']."님 | ".$rowbody3['drdate']." | ";
if($rowbody3['mark']==1){	?>
	<img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==2){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==3){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==4){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markno.jpg" border="0">
<?php }else if($rowbody3['mark']==5){ ?>
	<img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0"><img src="image/markok.jpg" border="0">
<?php } ?>
<hr color="white" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<?php 
echo nl2br($rowbody3['content']); 
} 
?>
</td>
</tr>
</table>

</td>
</tr>
</table>

<p>
<?php
	}
}
		
}else{
include "link_login.php";
}
include "bottom.php";     // 하단 구성
?>