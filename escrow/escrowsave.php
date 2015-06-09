<?php
//이 페이지는 수정하지 마십시요. 수정시 html태그나 자바스크립트가 들어가는 경우 동작을 보장할 수 없습니다.
//관련 db처리는 write.php에서 참조하는 함수 write_success(),write_failure(),write_hasherr()에서 관련 루틴을 추가하시면 됩니다.
//위의 각 함수에는 현재 결제에 관한 log남기게 됩니다. 상점서버에서 남기실 절대경로로 맞게 수정하여 주세요

//hash데이타값이 맞는 지 확인 하는 루틴은 데이콤에서 받은 데이타가 맞는지 확인하는 것이므로 꼭 사용하셔야 합니다
//정상적인 결제 건임에도 불구하고 노티 페이지의 오류나 네트웍 문제 등으로 인한 hash 값의 오류가 발생할 수도 있습니다.
//그러므로 hash 오류건에 대해서는 오류 발생시 원인을 파악하여 즉시 수정 및 대처해 주셔야 합니다.

//정상적으로 처리한 경우에도 데이콤에서 응답을 받지 못한 경우는 결제결과가 중복해서 나갈 수 있으므로 관련한 처리도 고려되어야 합니다. 
//이 페이지는 상점연동성공 여부에 따라 'OK' 또는 'FAIL' 이라는 문자를 표시하도록 되었습니다.  
//PHP에서는 되도록이면 error_reporting() 함수를 이용하여 개발 후에는 단순한 경고메세지는 출력이 되지 않도록 해주십시요.

	// 상점연동 function page
	include("./escrow_write.php");

			// 결과연동 성공여부

    $mertkey = "데이콤 부여 값"; //데이콤에서 발급한 상점키로 변경해 주시기 바랍니다.

    $hashdata2 = md5($mid.$oid.$transaction.$confirmtypes.$productid.$ssn.$ip.$mac.$resultdate.$mertkey); // 

	$value = array( "confirmtypes"	=> $confirmtypes, 
					"mid"    		=> $mid,
					"transaction" 	=> $transaction,
                   	"oid"     		=> $oid,
					"ssn" 			=> $ssn,					
					"ip"			=> $ip,
					"mac"			=> $mac,
					"resultdate"	=> $resultdate,
                   	"hashdata"    	=> $hashdata,
					"productids"	=> $productids,  
                   	"hashdata2"  	=> $hashdata2 );
	
	if ($hashdata2 == $hashdata) {          //해쉬값 검증이 성공하면
		if($resultcode == "0000"){            //결제가 성공이면
			$resp = write_success($value);
		}else {                             //결제가 실패이면
			$resp = write_failure($value);
		}
	} else {                                //해쉬값 검증이 실패이면
		write_hasherr($value);
	}

   	if($resp){                              //결과연동이 성공이면
   		echo "OK";
   	}else{                                  //결과연동이 실패이면
   		echo "FAIL",$value;
   	}
?>