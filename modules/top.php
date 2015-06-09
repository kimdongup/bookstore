<?php
include "../config/session_inc.php";
include "../config/lib.php";
if(!isset($_SESSION['my_member_id'])){$my_member_id="";} else {$my_member_id=$_SESSION['my_member_id'];}
if(!isset($_SESSION['my_pass1'])){$my_pass1="";} else {$my_pass1=$_SESSION['my_pass1'];}
if(!isset($_SESSION['my_name'])){$my_name="";} else {$my_name=$_SESSION['my_name'];}
?>
<HTML>
<HEAD>
<title>온라인 서점 만들기</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="온라인서점)">
<meta name="keywords" content="온라인서점">
<meta name="description" content="온라인서점">
<meta name="classification" content="온라인서점">
<LINK rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
if ($my_member_id && $my_pass1 && $my_name){
?>
	<table align="center" cellpadding="0" cellspacing="0" width="800">
	<tr>
	<td align="center" width="100%">

	<span style="font-size:2pt;">&nbsp;</span><br>
	<table border="0" cellpadding="0" cellspacing="0" width="900">
	<tr>
	<td rowspan="2" width="220">
	<!-- 로고 시작-->
	<a href="../home.php"><img src="../image/logo.jpg" border="0" width="200" height="50" alt="온라인서점"></a> 
	<!-- 로고 끝-->
	</td>

	<td width="680" align="right" valign="top">
	<!-- 상단메뉴 시작-->
	<span style=font-size:3pt;>&nbsp;</span><br>
	<a href="../logout.php">로그아웃</a> | <a href="../basket_buy.php">장바구니</a> | 주문/배송조회 | 마이페이지 | 마이리스트 | 블로그 | 고객센터 
	<!-- 상단메뉴 끝-->
	</td>
	</tr>
	<tr>
	<td>
	<!-- 검색 시작 -->
	<table width="680" align="center">
	<tr>
	<td width="200" valign="top">
	</td>
	<td width="200" align="right" valign="top">
	<form action="goods_search.php" method="post" onSubmit="return content_check(this)">
	<input type="text" name="search" size="30">
	</td>
	<td width="50">
	<INPUT type=image src="image/search_top.gif" border="0" alt="검색" width="42" height="19">
	</td>
	<td width="190" valign="top">
	</td></form>	
	</tr>
	</table>
	<!-- 검색 끝 -->
	</td>
	</tr>
	</table>

	<table border="0" cellpadding="0" cellspacing="0" width="900">
	<tr>
	<td width="200" height="30" align="center" bgcolor="#6699CC">
	<font color="white">전 품목 무료배송</font>
	</td>
	<td width="700" height="30" align="center" bgcolor="#6699CC">
	<font color="white">국내도서 | 베스트셀러 | 신간안내 | 추천도서 | 세일도서 | 회원리뷰 | 공동구매 | 대량구매</font>
	</td>
	</tr>
	</table>
<?php
}else{
?>
	<table align="center" cellpadding="0" cellspacing="0" width="800">
	<tr>
	<td align="center" width="100%">

	<span style="font-size:2pt;">&nbsp;</span><br>
	<table border="0" cellpadding="0" cellspacing="0" width="900">
	 <tr>
	<td rowspan="2" width="220">
	<!-- 로고 시작-->
	<a href="../home.php"><img src="../image/logo.jpg" border="0" width="200" height="50" alt="온라인서점"></a> 
	<!-- 로고 끝-->
	</td>
	<td width="680" align="right" valign="top">
	<!-- 상단메뉴 시작-->
	<span style=font-size:3pt;>&nbsp;</span><br>
	<a href="../login.php">로그인</a> | <a href="../stipulation.php">회원가입</a> | <a href="../basket_buy.php">장바구니</a> | 주문/배송조회 | 마이페이지 | 마이리스트 | 블로그 | 고객센터 
	<!-- 상단메뉴 끝-->
	</td>
	</tr>
	<tr>
	<td>
	<!-- 검색 시작 -->
	<table width="680" align="center">
		<tr>
		<td width="160" valign="top">
		</td>
		<td width="200" align="right" valign="top">
		<form action="goods_search.php" method="post" onSubmit="return content_check(this)">
		<input type="text" name="search" size="30">
		</td>
		<td width="50">
		<INPUT type=image src="../image/search_top.gif" border="0" alt="검색" width="42" height="19">
		</td>
		<td width="270" valign="top">
		</td></form>	
		</tr>
	</table>
	<!-- 검색 끝 -->
	</td>
	</tr>
	</table>



	<table border="0" cellpadding="0" cellspacing="0" width="900">
	<tr>
	<td width="200" height="30" align="center" bgcolor="#6699CC">
	<font color="white">전 품목 무료배송</font>
	</td>
	<td width="700" height="30" align="center" bgcolor="#6699CC">
	<font color="white">국내도서 | 베스트셀러 | 신간안내 | 추천도서 | 세일도서 | 회원리뷰 | 공동구매 | 대량구매 </font>
	</td>
	</tr>
	</table>
<?php
}
?>
<!-- 좌측 시작 -->
<table border="0" cellpadding="0" cellspacing="0" width="900">
	<tr>
	<td width="150" valign="top">
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<?php
	$queryleft=mysqli_query($link,"select * from goods1 order by number asc");
	while ($rowleft=mysqli_fetch_array($queryleft)){
	?>
	<a href="../middle_group.php?fixnum=<?php echo $rowleft['fixnum']; ?>&name=<?php echo $rowleft['name']; ?>"><?php echo $rowleft['name']; ?></a>
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<?php
	}
	?>
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	</td>
	<!-- 좌측 끝 -->
	</td>
	<td width="7"></td>
	<td width="1" bgcolor="#6699FF"></td>
	<td width="7"></td>
	<td width="730" valign="top">