<!-- 좌측 시작 -->
<table border="0" cellpadding="0" cellspacing="0" width="900">
	<tr>
	<td width="150" valign="top">
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<?php
	$queryleft=mysqli_query($link,"select * from goods1 order by number asc");
	while ($rowleft=mysqli_fetch_array($queryleft)){
	?>
	<a href="middle_group.php?fixnum=<?php echo $rowleft['fixnum']; ?>&name=<?php echo $rowleft['name']; ?>"><?php echo $rowleft['name']; ?></a>
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<?php
	}
	?>
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<?php
	$queryleft2=mysqli_query($link,"select * from banner where action>0");
	$bannernums=mysqli_num_rows($queryleft2);
	if($bannernums > 0){
	srand((double)microtime()*1000000); 
	$bannernum=rand(1,$bannernums);
	$queryleft3=mysqli_query($link,"select * from banner where action='$bannernum;'");
	$rowleft3=mysqli_fetch_array($queryleft3);
	?>
	<a href="<?php echo $rowleft3['url']; ?>" target="blank"><img src="bannerimg/<?php echo $rowleft3['filename']?>" width="150"></a>
	<?php
	}
	?>
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<a href=publishing.php><img src="image/publishing_admin.jpg" border="0"></a>

	<a href="transportation.php"><img src="image/trans_admin.jpg" border="0"></a>
	</td>


	<!-- 좌측 끝 -->

	<td width="7"></td>
	<td width="1" bgcolor="#6699FF"></td>
	<td width="7"></td>
	<td width="730" valign="top">