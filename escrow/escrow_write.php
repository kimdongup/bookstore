<?php 
session_start();
extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "");
extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "");
extract($HTTP_SESSION_VARS, EXTR_PREFIX_SAME, "");
extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "");
extract($HTTP_SERVER_VARS, EXTR_PREFIX_SAME, "");
extract($HTTP_POST_FILES, EXTR_PREFIX_SAME,"");

    //	return value
	//  true  : 결과연동이 성공
	//  false : 결과연동이 실패

	function write_success($noti){
        //결제에 관한 log남기게 됩니다. log path수정 및 db처리루틴이 추가하여 주십시요.	
	    write_log("C:\\Temp\\php_escrow_write_success.log", $noti);
	    return true;
	}

	function write_failure($noti){
        //결제에 관한 log남기게 됩니다. log path수정 및 db처리루틴이 추가하여 주십시요.	
	    write_log("C:\\Temp\\php_escrow_write_failure.log", $noti);
	    return true;
	}

    function write_hasherr($noti) {
        //결제에 관한 log남기게 됩니다. log path수정 및 db처리루틴이 추가하여 주십시요.	
	    write_log("C:\\Temp\\php_escrow_write_hasherr.log", $noti);
		return true;
    }


	$confirmtypes = $txtype;			// 구매승인/취소 여부 C :구매확인 , R :구매취소 , D : 구매취소확인
	$mid=$mid;					// 상점아이디 
	$transaction=$tid;			// 데이콤이 부여한 거래번호
	$oid=$oid;					// 상품번호
	$ssn = $ssn;					// 구매자주민번호
	$ip = $ip;					// 구매자IP
	$mac = $mac;					// 구매자 mac
	$hashdata = $hashdata;				// 데이콤 인증 데이터
	$resultcode = $resultcode;			// 결제성공여부
	$productids = $productid;			// 상품정보키
	$resultdate = $resdate;

	echo $confirmtypes."<br>";
	echo $mid."<br>";
		echo $transaction."<br>";
		echo $oid."<br>";
		echo $ssn."<br>";
		echo $ip."<br>";
		echo $mac."<br>";
		echo $hashdata."<br>";
		echo $resultcode."<br>";
		echo $productids."<br>";
		echo $resultdate."<br>";

?>