<?php
session_start(); 
// extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_SESSION_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_SERVER_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_POST_FILES, EXTR_PREFIX_SAME,"");
include "config/lib.php";

$result=mysqli_query($link,"create table connectsum".
        "(ip varchar(30) not null,".  
	    "browser varchar(10) not null,".
	    "referer varchar(10) not null,".
		"cdate int not null)"); 

if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table consult".
        "(id int not null auto_increment primary key,".
		"memberid varchar(20) not null,".  // 아이디
	    "title varchar(100) not null,".
		"content text)"); 

if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table popupnews".
        "(id int not null auto_increment primary key,".
		"imgopen tinyint not null,".
		"imgwidth varchar(20) not null,".
		"imgheight text,".
		"filenamee varchar(20) not null)"); 

if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table memoxml".
        "(id int not null auto_increment primary key,".
		"name varchar(20) not null,".
		"content text,".
		"rdate date)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}


$result=mysqli_query($link,"create table synergicpurchase".
        "(id int not null auto_increment primary key,".
		"goodsid int not null,".
	    "fixprice int not null,".  
	    "startprice int not null,".
	    "price int not null,".  
	    "endprice int not null,". 
	    "dcprice int not null,".  
	    "recordquantity int not null,". 
	    "orderquantity int not null,". 
		"enddate date)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}



$result=mysqli_query($link,"create table basket".
        "(id int not null auto_increment primary key,".
		"goodsid int not null,".
		"ordernum varchar(20) not null,". // 주문자 테이블에서 같은 날짜로 기억함
		"orderer varchar(20) not null,".  // 주문자 아이디
		"name varchar(50) not null,". // 상품명
		"price int not null,".
		"quantity tinyint not null)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table mylist".
        "(id int not null auto_increment primary key,".
		"goodsid int not null,".
		"ordernum varchar(20) not null,". // 주문자 테이블에서 같은 날짜로 기억함
		"orderer varchar(20) not null,".  // 주문자 아이디
		"memo text)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table myorder".
        "(id int not null auto_increment primary key,".
		"ordernum varchar(20) not null,". // 비회원 주문검색, 회원은 로그인을 해야 함
		"orderer varchar(20) not null,".  // 주문자 아이디
		"ordername varchar(50) not null,". // 주문자이름
	    "tel1 char(4) not null,".          
	    "tel2 char(4) not null,".                 
	    "tel3 char(4) not null,".  
	    "htel1 char(4) not null,".          
	    "htel2 char(4) not null,".                 
	    "htel3 char(4) not null,".  
		"post1 varchar(10) not null,".                  
	    "post2 varchar(30) not null,".                
	    "address varchar(90) not null,".
	    "post_num varchar(90) not null,".
	    "email varchar(50) not null,".
	    "bname varchar(12) not null,".
	    "btel1 char(4) not null,".          
	    "btel2 char(4) not null,".                 
	    "btel3 char(4) not null,".  
	    "bhtel1 char(4) not null,".          
	    "bhtel2 char(4) not null,".                 
	    "bhtel3 char(4) not null,".  
		"bpost1 varchar(10) not null,".                  
	    "bpost2 varchar(30) not null,".                
	    "baddress varchar(90) not null,".
	    "bpost_num varchar(90) not null,".
	    "bemail varchar(50) not null,".		
	    "content text,".
	    "completion tinyint,". 
	    "confirmation tinyint,". // 0은 미결제,1은 결제 완료, 2는 무통장입금 대기중
		"orderday tinyint not null)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table transport".
        "(id int not null auto_increment primary key,".
		"ordernum varchar(20) not null,". // 비회원 주문검색, 회원은 로그인을 해야 함
		"transnum varchar(20),". // 운송장 번호
		"transday varchar(10),". // 운송날짜
		"transco varchar(20))"); // 택배회사
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}



$result=mysqli_query($link,"create table faq".
        "(id int not null auto_increment primary key,".
	    "content text)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table basket".
        "(id int not null auto_increment primary key,".
		"goodsid int not null,".
		"ordernum varchar(20) not null,". // 주문자 테이블에서 같은 날짜로 기억함
		"orderer varchar(20) not null,".  // 주문자 아이디
		"name varchar(50) not null,". // 상품명
		"price int not null,".
		"quantity tinyint not null)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table mylist".
        "(id int not null auto_increment primary key,".
		"goodsid int not null,".
		"ordernum varchar(20) not null,". // 주문자 테이블에서 같은 날짜로 기억함
		"orderer varchar(20) not null,".  // 주문자 아이디
		"memo text)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table myorder".
        "(id int not null auto_increment primary key,".
		"ordernum varchar(20) not null,". // 비회원 주문검색, 회원은 로그인을 해야 함
		"orderer varchar(20) not null,".  // 주문자 아이디
		"ordername varchar(50) not null,". // 주문자이름
	    "tel1 char(4) not null,".          
	    "tel2 char(4) not null,".                 
	    "tel3 char(4) not null,".  
	    "htel1 char(4) not null,".          
	    "htel2 char(4) not null,".                 
	    "htel3 char(4) not null,".  
		"post1 varchar(10) not null,".                  
	    "post2 varchar(30) not null,".                
	    "address varchar(90) not null,".
	    "post_num varchar(90) not null,".
	    "email varchar(50) not null,".
	    "bname varchar(12) not null,".
	    "btel1 char(4) not null,".          
	    "btel2 char(4) not null,".                 
	    "btel3 char(4) not null,".  
	    "bhtel1 char(4) not null,".          
	    "bhtel2 char(4) not null,".                 
	    "bhtel3 char(4) not null,".  
		"bpost1 varchar(10) not null,".                  
	    "bpost2 varchar(30) not null,".                
	    "baddress varchar(90) not null,".
	    "bpost_num varchar(90) not null,".
	    "bemail varchar(50) not null,".		
	    "content text,".
	    "completion tinyint,". // 0은 미결제,1은 결제 완료, 2는 무통장입금 대기중
		"orderday tinyint not null)"); 
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

$result=mysqli_query($link,"create table transport".
        "(id int not null auto_increment primary key,".
		"ordernum varchar(20) not null,". // 비회원 주문검색, 회원은 로그인을 해야 함
		"transnum varchar(20),". // 운송장 번호
		"transday varchar(10),". // 운송날짜
		"transco varchar(20))"); // 택배회사
if (!$result) {
 echo  mysqli_errno($link).": ";
 echo  mysqli_error($link)."<br>";
} else {
echo "테이블이 정상적으로 생성 되었습니다.<br>";
}

mysqli_close($link);
?>
