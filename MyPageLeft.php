<!-- 좌측 시작 -->
<table border="0" cellpadding="0" cellspacing="0" width="900">
	<tr>
	<td width="150" valign="top">
	<br><span style=font-size:3pt;>&nbsp;</span><br>
	<b><span style=font-size:12pt;>■ 마이페이지</span></b><p>
<?php
if($my_member_id){
echo "<b>".$my_name."</b>님, 반갑습니다.";
?>
<p><a href="MyPageOT.php">주문/배송내역</a><br>
<a href="MyPageOD.php">취소한주문내역</a><br>
<a href="MyPageMC.php">나의통장내역</a><br>
<a href="MySynerOrderList.php">공동구매내역</a><br>
<a href="MyLargeOrderList.php">대량주문내역</a><br>
<a href="MyAuctionOrderList.php">경매입찰내역</a><p>

<a href="MyPage.php">마이페이지</a><br>
<a href="MyList.php">마이리스트</a><br>
<a href="MyReviewAll.php">마이리뷰</a><br>

<a href="MyPageCR.php">캐쉬충전</a><br>
<a href="MyInfo.php">정보관리</a><br>
<a href="MyMemberDel.php">회원탈퇴</a><p>

<a href="ConsultList.php">1 : 1 상담</a><p>

<?php
}else{
echo "로그인하세요.";
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