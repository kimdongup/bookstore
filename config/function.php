<?php
function mailer($from_name, $from_email, $to, $subject, $content) {
	$headers  = "From: $from_email ($from_name)\n";
	$headers .= "Reply-To: $from_email\n";
	$headers .= "X-Mailer: PHP ".phpversion()."\n"; 
	$headers .= "X-Sender: <seoro@seoro.com>\n"; 
	$headers .= "Return-Path: \n";
	$headers .= "X-Priority: 1 (Highest)\n"; 
	$headers .= "Content-Type: text/html; charset=UTF8\n"; 
	$headers .= "Content-Transfer-Encoding: base64\n";
	$headers .= "\n\n";
	$content = chunk_split(base64_encode($content));
	@mail($to, $subject, $content, $headers);
}

// 쇼핑몰 네비게이션
function pagenavigate($present_page, $total_page, $url) { // 게시판에서 넘어온 값이다.
        $resultval ="";
	$from_page = (( (int)(($present_page - 1 ) / 10 )) * 10) + 1; // 현재페이지를 int로 정수를 만든다. 시작페이지다.
	$to_page = $from_page + 9; // 10페이지씩 보여주기 위함이다.

	if($present_page > 10){ // 첫페이지에서는 이전 10페이지가 존재하지 않으므로 
		$next_from_num_link = ($from_page * 50) - 100; // 이전페이지이므로 fromnum을 -100을 해 준다.
		$nextpresentpage = $from_page-1; // 1페이지 이전을 보여준다.
		$resultval .= " <a href='$url?fromnum=$next_from_num_link&page=$nextpresentpage'>[이전10페이지]</a> ";
		}

	for ($k=$from_page;$k<=$to_page;$k++){ // 시작페이지부터 10페이지를 보여준다.
		$from_num_link = ($k-1) * 50; // 다음 50개의 등록물을 보여주기 위함이다. 
		$presentpage = $k; // 페이지를 보여준다.

		if($total_page >= $k){ // 토탈페이지수가 $k보다 큰 것을 보여줘야 1개를 등록했을 경우 1페이지만 나타난다.
		if($present_page != $k){ // 현재 보고 있는 페이지가 아니라면 번호만 보여준다.
			$resultval .= " <a href='$url?fromnum=$from_num_link&page=$presentpage'> $k </a> ";
		}else{
			$resultval .= " <b>$k</b> "; // 현재 보는 페이지 이므로 굵은 글씨로 보여준다.
		}
		}

	}
	if($total_page > 11 && $total_page > ($from_page+10)){ // 11은 총등록물의 개수가 11페이지를 넘지 않으면 다음10페이지를 보여줄 필요가 없기 때문에 존재한다. 뒤의 것은 최종 페이지를 컨트롤하기 위함이다. 
	if($total_page > ($present_page)){ // 토탈 페이지수가 현재 페이지수보다 크면 나타내 준다.
		$next_from_num_link = $from_num_link + 50;
		$nextpresentpage = $presentpage + 1; 
		$resultval .= " <a href='$url?fromnum=$next_from_num_link&page=$nextpresentpage'>[다음10페이지]</a> ";
		}
	}
	
  return $resultval;
}

// 블로그 네비게이션
function pagenavigate2($present_page, $total_page, $url) { // 게시판에서 넘어온 값이다.
	$from_page = (( (int)(($present_page - 1 ) / 10 )) * 10) + 1; // 현재페이지를 int로 정수를 만든다. 시작페이지다.
	$to_page = $from_page + 9; // 10페이지씩 보여주기 위함이다.

	if($present_page > 10){ // 첫페이지에서는 이전 10페이지가 존재하지 않으므로 
		$next_from_num_link = ($from_page * 50) - 100; // 이전페이지이므로 fromnum을 -100을 해 준다.
		$nextpresentpage = $from_page-1; // 1페이지 이전을 보여준다.
		$resultval .= " <a href='$url&fromnum=$next_from_num_link&page=$nextpresentpage'>[이전10페이지]</a> ";
		}

	for ($k=$from_page;$k<=$to_page;$k++){ // 시작페이지부터 10페이지를 보여준다.
		$from_num_link = ($k-1) * 50; // 다음 50개의 등록물을 보여주기 위함이다. 
		$presentpage = $k; // 페이지를 보여준다.

		if($total_page >= $k){ // 토탈페이지수가 $k보다 큰 것을 보여줘야 1개를 등록했을 경우 1페이지만 나타난다.
		if($present_page != $k){ // 현재 보고 있는 페이지가 아니라면 번호만 보여준다.
			$resultval .= " <a href='$url&fromnum=$from_num_link&page=$presentpage'> $k </a> ";
		}else{
			$resultval .= " <b>$k</b> "; // 현재 보는 페이지 이므로 굵은 글씨로 보여준다.
		}
		}

	}
	if($total_page > 11 && $total_page > ($from_page+10)){ // 11은 총등록물의 개수가 11페이지를 넘지 않으면 다음10페이지를 보여줄 필요가 없기 때문에 존재한다. 뒤의 것은 최종 페이지를 컨트롤하기 위함이다. 
	if($total_page > ($present_page)){ // 토탈 페이지수가 현재 페이지수보다 크면 나타내 준다.
		$next_from_num_link = $from_num_link + 50;
		$nextpresentpage = $presentpage + 1; 
		$resultval .= " <a href='$url&fromnum=$next_from_num_link&page=$nextpresentpage'>[다음10페이지]</a> ";
		}
	}
	
  return $resultval;
}


function returnurl($rt_url){ // 리튼 페이지
	echo "<meta http-equiv='Refresh' content='0; URL=$rt_url'>";
}

function msg($msg){
	echo ("
		<script>
	    window.alert('$msg')
	    </script>
	    ");
}

function err_msg($msg){
	echo ("
		<script>
		window.alert('$msg');
	history.go(-1);
	</script>
		");
}

function err_close($msg){
	echo ("
		<script>
		window.alert('$msg');
		self.close();
		</script>
		");
}


?>