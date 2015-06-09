<?php
include "top.php";
include "MyPageLeft.php";
include "config/config.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id ="";} else {$my_member_id = $_SESSION['my_member_id'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod = $_REQUEST['mod'];} 
if(!isset($_SESSION['ordernum'])){$ordernum  ="";} else {$ordernum = $_SESSION['ordernum'];} 
if(!isset($_REQUEST['delid'])){$delid  ="";} else {$delid = $_REQUEST['delid'];} 
if(!isset($_REQUEST['id'])){$id  ="";} else {$id = $_REQUEST['id'];} 
if(!isset($_REQUEST['dbarray'])){$dbarray ="";} else {$dbarray = $_REQUEST['dbarray'];} 
if(!isset($_REQUEST['fromnum'])){$fromnum =0;} else {$fromnum = $_REQUEST['fromnum'];}
if(!isset($_REQUEST['page'])){$page  =1;} else {$page  = $_REQUEST['page'];}
$ColumName="";$AscDesc="";
if($my_member_id){
    if($mod=='mylistdel'){ // 삭제
	$querydel=mysqli_query($link,"delete from mylist where goodsid='$delid' && orderer='$my_member_id' ");
	$querydel2=mysqli_query($link,"delete from mylistmemo where goodsid='$delid' && orderer='$my_member_id' ");
    }
    if($mod=='mylist'){
        $querymylist=mysqli_num_rows(mysqli_query($link,"select id from mylist where goodsid='$id' "));
        if($querymylist < 1){
            $querygs=mysqli_query($link,"select name,price from goods where id='$id' ");
            $rowgs=mysqli_fetch_array($querygs);
            $queryins=mysqli_query($link,"insert into mylist values('','$id','$rowgs[name]','$rowgs[price]','$my_member_id')");
            $queryins=mysqli_query($link,"insert into mylistmemo values('','$id','$my_member_id','')");
        }else{
            echo ("
            <script>
            alert('마이리스트에 이미 있는 상품입니다');
            history.go(-1)
            </script>
            ");
        }
    } // 리스트 넣기에서만 저장, 조회 때는 저장 안됨 
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function BoxMyList(MyListBox) 
{ 
for( var j=0; j<MyListBox.elements.length; j++) { 
var box = MyListBox.elements[j]; 
if(box.checked == false){
box.checked = true; 
}
} 
} 
function unBoxMyList(MyListBox) 
{ 
for( var j=0; j<MyListBox.elements.length; j++) { 
var box = MyListBox.elements[j]; 
if(box.checked == true){
box.checked = false; 
}
} 
} 
// -->
</script> 

<form name=MyListBox action="MyListDel.php?mod=mylistdel" method="post">
<table width="730" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" height="1" bgcolor="#cccccc"></td></tr>
<tr><td colspan="3" height="35" align="right">
	<table width="730" border="0" cellpadding="0" cellspacing="0">
	<tr><td width="400">
	<input type="button" Value="전체선택" onClick="BoxMyList(MyListBox)"> 
	<input type="button" Value="선택해제" onClick="unBoxMyList(MyListBox)">
	<input type="submit" value=" 선택삭제 "> 
	</td><td width="330" align="right"> | 
	<a href=<?php echo $_SERVER['SCRIPT_NAME']; ?>>추가순</a> | 
	<a href=<?php echo $_SERVER['SCRIPT_NAME']; ?>?dbarray=priceup>가격↑</a> | 
	<a href=<?php echo $_SERVER['SCRIPT_NAME']; ?>?dbarray=pricedown>가격↓</a> | 
	<a href=<?php echo $_SERVER['SCRIPT_NAME']; ?>?dbarray=gsname>상품명</a> |
	</td></tr>
	</table>
</td></tr>
<tr><td colspan="3" height="1" bgcolor="#cccccc"></td></tr>

<?php
if($dbarray=='priceup'){
    $ColumName='price';
    $AscDesc='desc';
}else if($dbarray=='pricedown'){
    $ColumName='price';
    $AscDesc='asc';
}else if($dbarray=='gsname'){
    $ColumName='name';
    $AscDesc='asc';
}
if(!$page) $page = 1; 
if($fromnum == 0 ) $fromnum = 0;
$numresults=mysqli_query($link,"select * from mylist where orderer='$my_member_id' order by '$ColumName' $AscDesc limit $fromnum,$limit50"); // 칼럼명은 ''로 처리 desc,asc는 ''처리 하지 않는다.
$numrows=mysqli_num_rows($numresults);
$totalpage = ceil($numrows / $limit50);
if($numrows < 1)
echo "<tr><td colspan=3 height=25>마이리스트에 상품이 없습니다.</td></tr>";
?>
<?php
$num=1;
while ($row=mysqli_fetch_array($numresults))
{
$querybody=mysqli_query($link,"select * from goods where id='$row[goodsid]' order by id desc limit $fromnum,$limit50");
$rowbody=mysqli_fetch_array($querybody);
?>
<tr>
<td valign="top" width="20" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<p>&nbsp;</p><p>&nbsp;</p>
<input type='checkbox' name='check[]' value='<?php echo $rowbody['id']; ?>'>
</td>
<td valign="top" width="80" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">
<p>&nbsp;</p>
<?php 
if($rowbody['filename']){
?>
<a href="goodsview.php?id=<?php echo $rowbody['id']; ?>">
<img src="s_goodsimg/<?php echo $rowbody['filename']; ?>" border="0" width="67" height="100">
</a>
<?php
}
?>
</td>
<td width="630" style="border-bottom-width:1; border-bottom-color:CFCADF; border-bottom-style:dotted;">

<table width="630" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="330">
<span style=font-size:8pt;>&nbsp;</span><br>
<a href="goodsview.php?id=<?php echo $rowbody['id']; ?>"><b>[도서]<?php echo $rowbody['name']; ?></b></a>
<br><?php echo $rowbody['author']; ?> | <?php echo $rowbody['publishing']; ?> | <?php echo $rowbody['pyear']; ?>/<?php echo $rowbody['pmonth']; ?>/ <?php echo $rowbody['pday']; ?> 출간
<br><s><?php echo number_format($rowbody['fixprice']); ?></s> → <b><font color="#DF5B0B"><?php echo number_format($rowbody['price']); ?>원()</font></b>
<br><?php echo $rowbody['dday']; ?>일이내 배송(수령일은 근무일 기준 1~2일 소요)
<br><?php if($rowbody['dcost']==2){ "[국내 무료배송]"; } ?> <?php if($rowbody['recomend']==1){ echo "추천"; } ?>
</td>
<td>
<a href="basket_buy.php?id=<?php echo $rowbody['id']; ?>&mod=basket&QuantityNum=1">[장바구니담기]</a>
<br><a href="instant_buy.php?id=<?php echo $rowbody['id']; ?>&mod=instant&QuantityNum=1">[바로구매]</a>
<br><a href="<?php echo $_SERVER['SCRIPT_NAME'] ?>?delid=<?php echo $rowbody['id']; ?>&mod=mylistdel">[삭제]</a><!-- mylist id -->
</td>
</tr>
<tr>
<td colspan="2">
<span style=font-size:5pt;>&nbsp;</span><br> 
<?php
$queryct=mysqli_query($link,"select gsintro from goodsct where goodsid='$rowbody[id]' ");
$rowct=mysqli_fetch_array($queryct);
// 문자열 자르기
$str=$rowct['gsintro']; 
$length=200;
$str = chop(substr($str, 0, $length));
preg_match('/^([\x00-\x7e]|.{2})*/', $str, $titleok);
echo $titleok[0]."...";
?>
<br> <span style=font-size:5pt;>&nbsp;</span>
</td>
</tr>
<tr><td><b>
	<a href="MyListMemoWrite.php?gsid=<?php echo $rowbody['id']?>&mod=mylistmemo"><font color="blue">[메모하기]</font></a></b>
</td></tr>
<tr><td>
<?php
$queryMemo=mysqli_query($link,"select * from mylistmemo where goodsid=$rowbody[id] && orderer='$my_member_id' order by id desc");
while($rowmemo=mysqli_fetch_array($queryMemo)){
    echo "[".$rowmemo['drdate']."] <a href=MyListMemoDel.php?delid=$rowmemo[id]&mod=mylistmemodel>[삭제]</a><br>";
    echo $rowmemo['memo']."<hr color=#E9E8E8>";
}
?>
</td></tr>
<tr><td height="10"></td></tr>



</table>
</td>
</tr>
<?php
$num++;
}
?>
</table>
	</form>
<table border="0" cellpadding="0" cellspacing="0" width="730">
<tr><td height="10"></td></tr>
<tr><td height="1" bgcolor="#6699FF"></td></tr>
<tr><td height="5"></td></tr>
<tr><td ></td></tr>
</table>
<p>
<center><?php echo pagenavigate($page, $totalpage, $_SERVER['SCRIPT_NAME'])?></center>
<p>
<?php
}else{
include "link_login.php";
}
include "bottom.php";     // 하단 구성
?>