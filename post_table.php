<?php
include "config/session_inc.php"; 
include "config/lib.php";
?>
<script language="javascript">
<!--
function self_close(){
	self.close();
}
//-->
</script>
<?php
mysqli_query($link," CREATE TABLE post (
   num varchar(6) NOT NULL,
   sido varchar(4) NOT NULL,
   gugun varchar(20) NOT NULL,
   umdong varchar(50) NOT NULL,
   bunji varchar(20) NOT NULL,
   KEY num (num),
   KEY umdong (umdong)
) ");
$file = "post_table.sql";
$fileex=file_exists($file);
if($fileex == 'true'){ 
    $fp = fopen($file, "r");
    while(!feof($fp)) {
          $line = fgets($fp, 5000);
          mysqli_query($link,$line);
}
fclose($fp);

$results=mysqli_query($link,"select num from post");
$num=mysqli_num_rows($results);
echo "<p>db_connect.php 파일이 정상적으로 생성 되었습니다.<br>";
echo "모든 테이블이 정상적으로 생성 되었습니다.<br>";
echo $num."개의 우편번호 레코드가 생성되었습니다.";
 	}else{

	msg("post_table.sql 파일이 존재합니다.");
	}
?>
<p>
install이 완료 되었습니다.
<p>
지금 홈페이지로 이동하시겠습니까?
<p>
<a href="http://localhost/online">[예]</a>  
&nbsp; 
<a href="javascript:self_close()">[아니오]</a>