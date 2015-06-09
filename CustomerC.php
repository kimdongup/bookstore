<?php
include "top.php";
include "main_left.php";
include "config/config.php";
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}
?>
<script language="javascript">
var closeq = '';
function qclick(answer)
{
  if(closeq != answer) {
    if(closeq !='') {
      closeq.style.display = 'none';    
    }
    answer.style.display = '';
    closeq = answer;
  }
}
</script>
<p>&nbsp;</p> 
<table border="0" cellpadding="0" cellspacing="0" width="730">
<tr>
<td>
    <font size=6> FAQ </font>
</td>
</tr>

﻿<?php
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$numresults=mysqli_query($link,"select * from faq limit $fromnum,$limit50"); // 칼럼명은 ''로 처리 desc,asc는 ''처리 하지 않는다.
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);

while ($row=mysqli_fetch_array($numresults)){
?>
<tr>
<td align="left" height="50">  
    <span onclick="qclick(<?php echo "answer".$row['id']; ?>);" style="cursor:hand;"> <font size='5'> <?php echo $row['question']; ?> </font> </span></td></tr>
<tr>
<td align="left">
<span id=<?php echo "answer".$row['id']; ?> style="margin-left:7; display:none;">
<font color=red size='5'>
<?php echo $row['content']; ?>
</font>
</span>
</td>
</tr>
<?php } ?>
<tr><td>
    <center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME']) ?></center>
    </td></tr>
</table>
<?php
include "bottom.php";     // 하단 구성
?>