<?php
include "config/session_inc.php";
$find  = $_REQUEST['find'];
$search  = $_REQUEST['search'];
if($find == 'search'){ 
	?>
	<meta http-equiv='Refresh' content='0; URL=GoodsSearchTotal.php?find=<?php echo $find?>&search=<?php echo $search?>&boardname=통합검색'>
	<?php
}else{
	?>
	<meta http-equiv='Refresh' content='0; URL=GoodsSearchPart.php?find=<?php echo $find; ?>&search=<?php echo $search; ?>&boardname=<?php if($find=='name'){ echo "도서제목 검색"; }else if($find=='author'){ echo "저자/역자 검색"; }else if($find=='publishing'){ echo "출판사 검색"; } ?>'>
	<?php
	}
	?>