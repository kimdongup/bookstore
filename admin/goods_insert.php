<?php
include "../config/session_inc.php";
include "../config/lib.php";
include "top.html";
if(!isset($_SESSION['my_admin_id'])){$my_admin_id ="";} else {$my_admin_id = $_SESSION['my_admin_id'];}
if(!isset($_SESSION['my_admin_pwd'])){$my_admin_pwd ="";} else {$my_admin_pwd = $_SESSION['my_admin_pwd'];}
if(!isset($_REQUEST['mod'])){$mod  ="";} else {$mod  = $_REQUEST['mod'];}

if(!isset($_REQUEST['pwd'])){$pwd  ="";} else {$pwd  = $_REQUEST['pwd'];}
if(!isset($_REQUEST['fixid'])){$fixid  ="";} else {$fixid  = $_REQUEST['fixid'];}
if(!isset($_REQUEST['gs2id'])){$gs2id  ="";} else {$gs2id  = $_REQUEST['gs2id'];}
if(!isset($_REQUEST['gs3id'])){$gs3id  ="";} else {$gs3id  = $_REQUEST['gs3id'];}
if(!isset($_REQUEST['name'])){$name  ="";} else {$name  = $_REQUEST['name'];}
if(!isset($_REQUEST['author'])){$author  ="";} else {$author  = $_REQUEST['author'];}
if(!isset($_REQUEST['publishing'])){$publishing  ="";} else {$publishing  = $_REQUEST['publishing'];}
if(!isset($_REQUEST['pyear'])){$pyear  ="";} else {$pyear  = $_REQUEST['pyear'];}
if(!isset($_REQUEST['pmonth'])){$pmonth  ="";} else {$pmonth  = $_REQUEST['pmonth'];}
if(!isset($_REQUEST['pday'])){$pday  ="";} else {$pday  = $_REQUEST['pday'];}
if(!isset($_REQUEST['epage'])){$epage  ="";} else {$epage  = $_REQUEST['epage'];}
if(!isset($_REQUEST['isbn'])){$isbn  ="";} else {$isbn  = $_REQUEST['isbn'];}
if(!isset($_REQUEST['hidf1'])){$hidf1  ="";} else {$hidf1  = $_REQUEST['hidf1'];}
if(!isset($_REQUEST['hidf2'])){$hidf2  ="";} else {$hidf2  = $_REQUEST['hidf2'];}
if(!isset($_REQUEST['dday'])){$dday  ="";} else {$dday  = $_REQUEST['dday'];}
if(!isset($_REQUEST['dcost'])){$dcost  ="";} else {$dcost  = $_REQUEST['dcost'];}
if(!isset($_REQUEST['dcountry'])){$dcountry  ="";} else {$dcountry  = $_REQUEST['dcountry'];}
if(!isset($_REQUEST['lowest'])){$lowest  ="";} else {$lowest  = $_REQUEST['lowest'];}
if(!isset($_REQUEST['gsnew'])){$gsnew  ="";} else {$gsnew  = $_REQUEST['gsnew'];}
if(!isset($_REQUEST['best'])){$best  ="";} else {$best  = $_REQUEST['best'];}
if(!isset($_REQUEST['recomend'])){$recomend  ="";} else {$recomend  = $_REQUEST['recomend'];}
if(!isset($_REQUEST['sale'])){$sale  ="";} else {$sale  = $_REQUEST['sale'];}
if(!isset($_REQUEST['rela'])){$rela  ="";} else {$rela  = $_REQUEST['rela'];}
if(!isset($_REQUEST['point'])){$point  ="";} else {$point  = $_REQUEST['point'];}
if(!isset($_REQUEST['mania'])){$mania  ="";} else {$mania  = $_REQUEST['mania'];}       

if($my_admin_id && $my_admin_pwd){
if($mod == "good_insert"){

$timeno=mktime();
// 이미지 저장 디렉토리명
$save_dir = "goodsimg";

// 사진1 

if(is_uploaded_file($_FILES["imgup1"]["tmp_name"])) {
 	$imgup1_size=$_FILES["imgup1"]["size"];
    if($imgup1_size > 10 && $imgup1_size < 100000){ 

		$filewidth1=stripslashes($_FILES["imgup1"]["tmp_name"]);
        $widthsize1=@GetImageSize($filewidth1); 
        $fwidth1=250;  // 최대 넓이
		$fheight1=350;  //최대 높이

          // 이미지 사이즈가 지정된 넓이보다 작거나 같으면 현재 사이즈를 유지
          if($widthsize1[0]<=$fwidth1 && $widthsize1[1]<=$fheight1) {

	$imgup1_name=$_FILES["imgup1"]["name"];
	$file_ext1 = strtolower(substr(strrchr($imgup1_name,"."), 1));
	if (eregi("jpg|jpeg|gif|png",$file_ext1)) {
	$timeno1=$timeno+1; 
	$imgup1_name1=$timeno1.".".$file_ext1;
	$dest = "../".$save_dir . "/" . $imgup1_name1;
   if(!move_uploaded_file($_FILES['imgup1']['tmp_name'],$dest)) {
      die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");      
   }

   // 썸네일  
	
	if($file_ext1 == 'jpg' || $file_ext1 == 'jpeg'){
	?>
	<img src=img_thum_goods_jpg.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
	<?php
	} else if($file_ext1 == 'gif'){
	?>
	<img src=img_thum_goods_gif.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
	<?php
	} else if($file_ext1 == 'png'){
	?>
	<img src=img_thum_goods_png.php?save_dir=<?php echo $save_dir; ?>&passimage=<?php echo $imgup1_name1; ?> width="0" height="0">
	<?php
	}

} // 확장자검사
} // 이미지넓이
} // 이미지 크기
} // 파일 검사

// 사진2 

if(is_uploaded_file($_FILES["imgup2"]["tmp_name"])) {
 	$imgup2_size=$_FILES["imgup2"]["size"];
    if($imgup2_size > 10 && $imgup2_size < 300000){ 

		$filewidth2=stripslashes($_FILES["imgup2"]["tmp_name"]);
        $widthsize2=@GetImageSize($filewidth2); 
        $fwidth2=640;  // 최대 넓이
		$fheight2=480;  //최대 높이

          // 이미지 사이즈가 지정된 넓이보다 작거나 같으면 현재 사이즈를 유지
          if($widthsize2[0]<=$fwidth2 && $widthsize2[1]<=$fheight2) {

	$imgup2_name=$_FILES["imgup2"]["name"];
	$file_ext2 = strtolower(substr(strrchr($imgup2_name,"."), 1));
	if (eregi("jpg|jpeg|gif|png",$file_ext2)) {
	$timeno2=$timeno+2; 
	$imgup2_name2=$timeno2.".".$file_ext2;
	$dest = "../".$save_dir . "/" . $imgup2_name2;
   if(!move_uploaded_file($_FILES['imgup2']['tmp_name'],$dest)) {
      die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");      
   }

} // 확장자검사
} // 이미지넓이
} // 이미지 크기
} // 파일 검사


$insert1 = "insert into goods values ".	"('','$pwd','$fixid','$gs2id','$gs3id','$name','$author','$publishing','$pyear','$pmonth','$pday','$epage','$isbn','$hidf1','$hidf2','$dday','$dcost','$dcountry','$lowest','$gsnew','$best','$recomend','$sale','$rela','$point','$mania','0','$timeno','$imgup1_name1','$imgup2_name2')";
$result1=mysqli_query($link,$insert1);

$resulte=mysqli_query($link,"select id from goods order by id desc limit 1");
$rowe=mysqli_fetch_array($resulte);
$gsid=$rowe['id'];
?>

<!--  내용 입력 시작 -->

<SCRIPT LANGUAGE='javascript'>
<!--
function recording(fr) {
	var Fm = document.Form1;
    if(!Fm.gsintro.value) {
	alert("책소개룰 입력하세요.");
	Fm.gsintro.focus();
	return; }  	
    if(!Fm.auintro.value) {
	alert("저자 및 역자 소개를 입력하세요.");
	Fm.auintro.focus();
	return; }    
    if(!Fm.content.value) {
	alert("목차를 입력하세요.");
	Fm.content.focus();
	return; }
    if(!Fm.preview.value) {
	alert("출판사 리뷸를 입력하세요.");
	Fm.preview.focus();
	return; } 

	document.Form1.action = 'goodsct_insert.php';
	document.Form1.submit();
}
//-->
</SCRIPT>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
<form name=Form1 method=post enctype=multipart/form-data>
<input type="hidden" name="mod" value="good_insert">
<input type="hidden" name="gsid" value="<?php echo $gsid; ?>">
<input type="hidden" name="gs3id" value="<?php echo $gs3id; ?>">
<input type="hidden" name="fixid" value="<?php echo $fixid; ?>">
<input type="hidden" name="name" value="<?php echo $name; ?>">
<tr>
<td width="20" height="40">
<img src="../image/green_folder.jpg" border="0">  
</td>
<td width="880"> &nbsp;<B>책 내용 등록</B>
<?php
$result=mysqli_query($link,"select name,gs2id from goods3 where id='$gs3id' ");
$row=mysqli_fetch_array($result);
$fixid3=$row['gs2id'];
$name3=$row['name'];
$result=mysqli_query($link,"select fixnum,name from goods2 where id='$fixid3' ");
$row=mysqli_fetch_array($result);
$fixid2=$row['fixnum'];
$name2=$row['name'];
$result=mysqli_query($link,"select fixnum,name from goods1 where fixnum='$fixid2' ");
$row=mysqli_fetch_array($result);
$fixid1=$row['fixnum'];
$name1=$row['name'];

echo ">".$name1;
echo ">".$name2;
echo ">".$name3;
echo ">".$name;
?>	
</td>
</tr>
<tr><td colspan="4" height="2" bgcolor="#6699FF"></td></tr>
<tr><td colspan="3" height="5"></td></tr>
</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>책소개</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=gsintro rows=15 cols=140></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>저자 및 역자 소개</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=auintro rows=15 cols=140></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>


	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>목차</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=content rows=15 cols=140></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
			<td valign="bottom" width="15" height="25">
			■
			</td>
			<td> &nbsp;<b>출판사 리뷰</b>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="bgc_bar2" height="2"></td>
		</tr>		
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="900">
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
			<td>
			&nbsp; <textarea name=preview rows=15 cols=140></textarea>
			</td>
		</tr>
		<tr>
		<td height="5"></td>
		</tr>
		<tr>
		<td height="1" bgcolor="#dcdcdc"></td>
		</tr>
	</table>

</form>
<div align="left">
<a href="javascript:recording();" style="padding-left:170px"><b>[내용 저장하기]</b></a>
</div>
<p>

<!--  내용 입력 끝 -->

<?php
} else { echo "잘못된 접근입니다."; }
}else{ echo "이곳은 관리자 페이지입니다."; }
mysqli_close($link);
include "bottom.html";
?>