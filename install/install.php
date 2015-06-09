<?php
session_start();
//extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "");
//extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "");
//extract($HTTP_SESSION_VARS, EXTR_PREFIX_SAME, "");
//extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "");
//extract($HTTP_SERVER_VARS, EXTR_PREFIX_SAME, "");
//extract($HTTP_POST_FILES, EXTR_PREFIX_SAME,"");

//$connect = @mysql_connect($host, $user, $pwd) or die("서버 연결에 실패 했습니다. 계정 또는 패스워드를 확인하세요.");
//@mysql_select_db($db, $connect) or die("DB 연결에 실패 했습니다. DB명을 확인하세요.");
$mysqli ="";
$host = $_REQUEST['host'];
$user = $_REQUEST['user']; 
$pwd  = $_REQUEST['pwd'];  
$db  = $_REQUEST['db']; 
        
$link = mysqli_connect($host, $user, $pwd, $db);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    die("DB 연결에 실패 했습니다.");
}

$db_link="\$link = mysqli_connect(\$mysql_host, \$mysql_user, \$mysql_pwd, \$mysql_db);if (mysqli_connect_errno()) {printf(\"Connect failed: \%s\\n\", mysqli_connect_error());exit();}";

$file = "../config/db_connect.php";
$fp = fopen($file, "w");
if(!$fp) {
	die("파일을 열수 없습니다.");
}
fwrite($fp, "<?php\n");
fwrite($fp, "\$mysql_host = '$host';     // 호스트명 \n");
fwrite($fp, "\$mysql_user = '$user';     // 사용자 계정 \n");
fwrite($fp, "\$mysql_pwd  = '$pwd';      // 비밀번호 \n");
fwrite($fp, "\$mysql_db   = '$db';       // DB(데이터베이스)명) \n");
fwrite($fp, $db_link);
fwrite($fp, "\n?>");
fclose($fp);

include "../config/db_connect.php";

//--------------------not null은 반드시 값이 있어야 함---------------------------
if (mysqli_query($link," CREATE TABLE admin (
  admin_id varchar(20) NOT NULL default '',
  admin_pwd varchar(20) NOT NULL default ''
) ENGINE=MyISAM;
") === FALSE) {
    die("이 쿼리가 안 되면 이후 쿼리 모두 안 됨.\n");
}

mysqli_query($link," INSERT INTO admin VALUES ('test', 'test') ");

mysqli_query($link," CREATE TABLE auctionorder (
  id int(11) NOT NULL auto_increment,
  ordernum varchar(20) NOT NULL default '',
  orderer varchar(20) NOT NULL default '',
  ordername varchar(50) NOT NULL default '',
  auctionid int(11) NOT NULL default '0',
  auctionprice int(11) NOT NULL default '0',
  tel1 varchar(4) NOT NULL default '',
  tel2 varchar(4) NOT NULL default '',
  tel3 varchar(4) NOT NULL default '',
  htel1 varchar(4) NOT NULL default '',
  htel2 varchar(4) NOT NULL default '',
  htel3 varchar(4) NOT NULL default '',
  post1 varchar(10) NOT NULL default '',
  post2 varchar(30) NOT NULL default '',
  address varchar(90) NOT NULL default '',
  post_num varchar(90) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  bname varchar(12) NOT NULL default '',
  btel1 varchar(4) NOT NULL default '',
  btel2 varchar(4) NOT NULL default '',
  btel3 varchar(4) NOT NULL default '',
  bhtel1 varchar(4) NOT NULL default '',
  bhtel2 varchar(4) NOT NULL default '',
  bhtel3 varchar(4) NOT NULL default '',
  bpost1 varchar(10) NOT NULL default '',
  bpost2 varchar(30) NOT NULL default '',
  baddress varchar(90) NOT NULL default '',
  bpost_num varchar(90) NOT NULL default '',
  bemail varchar(50) NOT NULL default '',
  content varchar(100) default NULL,
  completion tinyint(4) NOT NULL default '0',
  confirmation tinyint(4) NOT NULL default '0',
  orderday int(11) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY ordernum (ordernum),
  KEY orderer (orderer),
  KEY ordername (ordername),
  KEY confirmation (confirmation),
  KEY completion (completion),
  KEY auctionid (auctionid)
) ENGINE=MyISAM AUTO_INCREMENT=6 ;
");

mysqli_query($link," CREATE TABLE auctionpurchase (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  fixprice int(11) NOT NULL default '0',
  stprice int(11) NOT NULL default '0',
  price int(11) NOT NULL default '0',
  dcprice int(11) NOT NULL default '0',
  endprice int(11) NOT NULL default '0',
  recordquantity int(11) NOT NULL default '0',
  orderquantity int(11) NOT NULL default '0',
  enddate int(11) NOT NULL default '0',
  rdate int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;
");

mysqli_query($link," CREATE TABLE banner (
  id int(11) NOT NULL auto_increment,
  url varchar(100) NOT NULL default '',
  filename varchar(20) NOT NULL default '',
  action tinyint(4) NOT NULL default '0',
  content text,
  rdate int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=9 ;
");
  
mysqli_query($link," CREATE TABLE basket (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  ordernum varchar(20) NOT NULL default '',
  orderer varchar(20) NOT NULL default '',
  name varchar(50) NOT NULL default '',
  fixprice int(11) default '0',
  price int(11) NOT NULL default '0',
  point int(11) default NULL,
  maniapoint int(11) default NULL,
  quantity tinyint(4) NOT NULL default '0',
  dday tinyint(4) NOT NULL default '0',
  dcost tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=90 ;
");

mysqli_query($link," CREATE TABLE connectsum (
  ip varchar(30) NOT NULL default '',
  browser varchar(10) NOT NULL default '',
  referer varchar(200) NOT NULL default '',
  cdate int(11) NOT NULL default '0',
  KEY cdate (cdate),
  KEY browser (browser)
) ENGINE=MyISAM;
");


mysqli_query($link," CREATE TABLE consult (
  id int(11) NOT NULL auto_increment,
  reply int(11) NOT NULL default '0',
  memberid varchar(20) NOT NULL default '',
  title varchar(100) NOT NULL default '',
  content text,
  rdate int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=13 ;
");

mysqli_query($link," CREATE TABLE faq (
  id int(11) NOT NULL auto_increment,
  question text,
  content text,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;
");

mysqli_query($link," CREATE TABLE goods (
  id int(11) NOT NULL auto_increment,
  pwd varchar(20) NOT NULL default '',
  fixnum int(11) NOT NULL default '0',
  gs2id int(11) NOT NULL default '0',
  gs3id int(11) NOT NULL default '0',
  name varchar(50) NOT NULL default '',
  author varchar(50) NOT NULL default '',
  publishing varchar(20) NOT NULL default '',
  pyear year(4) NOT NULL default '0000',
  pmonth char(2) NOT NULL default '',
  pday char(2) NOT NULL default '',
  epage smallint(6) NOT NULL default '0',
  isbn varchar(20) NOT NULL default '',
  fixprice int(11) NOT NULL default '0',
  price int(11) NOT NULL default '0',
  dday tinyint(4) NOT NULL default '0',
  dcost tinyint(4) NOT NULL default '0',
  dcountry tinyint(4) NOT NULL default '0',
  lowest tinyint(4) NOT NULL default '0',
  gsnew tinyint(4) NOT NULL default '0',
  best tinyint(4) NOT NULL default '0',
  recomend tinyint(4) NOT NULL default '0',
  sale tinyint(4) NOT NULL default '0',
  rela varchar(30) default NULL,
  point int(11) NOT NULL default '0',
  mania tinyint(4) NOT NULL default '0',
  volume smallint(6) default NULL,
  rdate int(11) NOT NULL default '0',
  filename varchar(50) default NULL,
  filename2 varchar(50) default NULL,
  PRIMARY KEY  (id),
  KEY name (name),
  KEY fixnum (fixnum),
  KEY new (gsnew),
  KEY best (best),
  KEY sale (sale),
  KEY rela (rela),
  KEY rdate (rdate),
  KEY author (author),
  KEY publishing (publishing)
) ENGINE=MyISAM AUTO_INCREMENT=11 ;
");

mysqli_query($link," CREATE TABLE goods1 (
  id int(11) NOT NULL auto_increment,
  fixnum int(11) NOT NULL default '0',
  name varchar(20) NOT NULL default '',
  number tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY name (name),
  KEY number (number)
) ENGINE=MyISAM AUTO_INCREMENT=11 ;
");
mysqli_query($link,"INSERT INTO goods1 VALUES (1, 11, '소설', 1)");
mysqli_query($link,"INSERT INTO goods1 VALUES (2, 12, '시/에세이', 2)");
mysqli_query($link,"INSERT INTO goods1 VALUES (3, 13, '유아/어린이', 3)");
mysqli_query($link,"INSERT INTO goods1 VALUES (4, 14, '비즈니스/경제', 4)");
mysqli_query($link,"INSERT INTO goods1 VALUES (5, 15, '자기관리/계발', 5)");
mysqli_query($link,"INSERT INTO goods1 VALUES (6, 16, '대학교재', 6)");
mysqli_query($link,"INSERT INTO goods1 VALUES (7, 17, '학습/참고서', 7)");
mysqli_query($link,"INSERT INTO goods1 VALUES (8, 18, '철학/심리', 8)");
mysqli_query($link,"INSERT INTO goods1 VALUES (9, 19, '종교', 9)");
mysqli_query($link,"INSERT INTO goods1 VALUES (10, 20, '과학', 10)");

mysqli_query($link," CREATE TABLE goods2 (
  id int(11) NOT NULL auto_increment,
  fixnum int(11) NOT NULL default '0',
  name varchar(20) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY name (name),
  KEY fixnum (fixnum)
) ENGINE=MyISAM AUTO_INCREMENT=12 ;
");
mysqli_query($link,"INSERT INTO goods2 VALUES (1, 11, '한국소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (2, 11, '영미소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (3, 11, '일본소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (4, 11, '중국소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (5, 11, '러시아소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (6, 11, '프랑스소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (7, 11, '독일소설')");
mysqli_query($link,"INSERT INTO goods2 VALUES (8, 13, '생활')");
mysqli_query($link,"INSERT INTO goods2 VALUES (9, 12, '에세이')");
mysqli_query($link,"INSERT INTO goods2 VALUES (10, 15, '세계문학전집')");
mysqli_query($link,"INSERT INTO goods2 VALUES (11, 13, '어린이')");

mysqli_query($link," CREATE TABLE goods3 (
  id int(11) NOT NULL auto_increment,
  fixnum int(11) NOT NULL default '0',
  gs2id int(11) NOT NULL default '0',
  name varchar(20) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY name (name),
  KEY fixnum (fixnum)
) ENGINE=MyISAM AUTO_INCREMENT=7 ;
");
mysqli_query($link,"INSERT INTO goods3 VALUES (1, 11, 1, '한국대표소설')");
mysqli_query($link,"INSERT INTO goods3 VALUES (2, 11, 1, '고전소설')");
mysqli_query($link,"INSERT INTO goods3 VALUES (3, 13, 8, '영어')");
mysqli_query($link,"INSERT INTO goods3 VALUES (4, 12, 9, '명상')");
mysqli_query($link,"INSERT INTO goods3 VALUES (5, 15, 10, '영미')");
mysqli_query($link,"INSERT INTO goods3 VALUES (6, 13, 11, '학습')");

mysqli_query($link," CREATE TABLE goodsct (
  goodsid int(11) NOT NULL default '0',
  gsintro text,
  auintro text,
  content text,
  preview text,
  KEY goodsid (goodsid)
) ENGINE=MyISAM;
");
mysqli_query($link,"INSERT INTO goodsct VALUES (10, '마법천자문은 한자능력검정시험 5, 6, 7, 8급에 해당하는 500자 중 우리 생활에서 쉽게 볼 수 있는 한자위주로 구성되어 있다. 또한 암기 위주의 학습이 아니라 한자의 뜻과 소리를 주문처럼 외치면서 한자를 써야 마법이 발휘되는 스토리로 구성되어 있어서 애써서 외우려는 부담을 갖지 않아도 한자가 저절로 외워지는 무의식의 학습을 경험할 수 있는 만화이다. 한자의 특징 있는 모양, 뜻과 음을 한꺼번에 이미지로 기억하게 한다. 아이들 눈높이에 맞게 만화로 재미있고 코믹하게 구성하여 쉽게 읽을 수 있도록 하였다. 재미있고 흥미진진한 스토리를 읽으면서 카드, 브로마이드 등 다양한 학습 도구를 활용하여 다각적인 한자학습을 할 수 있도록 하였다 \r\n\r\n[수상내역] \r\n삼성경제연구소(SERI) 선정 ‘10대 히트상품’ \r\n‘한자카드와 인터넷을 이용한 학습 시스템’ 특허 획득 \r\n예스24, 다음 공동 선정 ‘올해의 책’ \r\n한국간행물윤리위원회 선정 ‘청소년 권장도서’ \r\n한국문화콘텐츠진흥원 선정 ‘문화산업진흥기금 지원 사업 개발도서’ \r\n서울신문 선정 ‘소비자만족 히트 상품’ \r\n소년한국 선정 우수 어린이도서', '감수 : 김창환  \r\n서울대학교 중어중문학 박사. 현재 서울대학교 인문대학 중국어문학연구소 전임 연구원이며 사범대학 중등교육연수원 중국어과 주임교수로 계십니다. \r\n\r\n \r\n 글. 그림 : 스튜디오 시리얼  \r\n시리얼은 애니메이션 전문 창작 그룹 입니다. \r\n1998년 만화잡지 <주니어챔프>에 『대지옥전 진광대전』이 \r\n공모전에 당선되어 만화계에 입문하였습니다. \r\n주요 작품으로는 만화 『대지옥전 진광대전』, 『사가브레이커(미국판)』, 장편 애니메이션『쉐도우 파이터』, 『타이터스』, 게임『침묵의 전사』, 『아바트론』, 『액시스』등이 있습니다 \r\n \r\n', '1. 꼼짝 마, 손오공! \r\n2. 으, 무서워! 뿔 달린 혼세마왕! \r\n3. 적이야, 같은 편이야? \r\n4. 열려라! 마법장벽 \r\n5. 눈물의 힘은 대단해! \r\n6. 멋진 스승과 착한 제자 \r\n7. 위험해! 몽킹의 한자마경! \r\n8. 한자마경은 비가 무섭대! \r\n9. 절세 미인이 나타났다! \r\n10. 참고 공부하면 얻을 것이다! \r\n마법의 한자를 잡아라! \r\n다시 알아보는 마법의 한자 \r\n달라진 부분을 찾아라! \r\n내가 만드는 마법천자문 \r\n마법의 한자를 낚아라! \r\n마법의 한자퀴즈를 풀자!', '2004년 250만부라는 판매고를 자랑하며 최고의 베스트셀러 및 히트상품으로 꼽힌 <마법천자문>은 기존의 학습 만화와 차별되는 그림과 내용, 높은 학습 효과로 발간된 후 전국에 한자 학습 열풍을 주도한 학습만화입니다. \r\n\r\n<마법천자문>은 한자능력검정시험에 나오는 한자 중 사용 빈도가 높은 한자를 뽑아 권 당 20자의 새로운 한자로 책을 엮었습니다. 한자의 뜻과 소리를 주문으로 외치면서 저절로 한자를 외울 수 있게 한 점이 <마법천자문>의 큰 장점입니다. \r\n\r\n확실한 한자 복습을 위해 새롭게 선보이는 교육페이지 \r\n.................................\r\n')");

mysqli_query($link," CREATE TABLE goodssc (
  gsid int(11) NOT NULL default '0',
  search varchar(110) default NULL,
  KEY fixnum (gsid),
  KEY search (search)
) ENGINE=MyISAM;
");
mysqli_query($link,"INSERT INTO goodssc VALUES (10, '유아/어린이어린이학습마법천자문')");


mysqli_query($link," CREATE TABLE largeorder (
  id int(11) NOT NULL auto_increment,
  ordernum varchar(20) NOT NULL default '',
  orderer varchar(20) NOT NULL default '',
  ordername varchar(50) NOT NULL default '',
  largeid int(11) NOT NULL default '0',
  quantity int(11) NOT NULL default '0',
  price int(11) NOT NULL default '0',
  tel1 varchar(4) NOT NULL default '',
  tel2 varchar(4) NOT NULL default '',
  tel3 varchar(4) NOT NULL default '',
  htel1 varchar(4) NOT NULL default '',
  htel2 varchar(4) NOT NULL default '',
  htel3 varchar(4) NOT NULL default '',
  post1 varchar(10) NOT NULL default '',
  post2 varchar(30) NOT NULL default '',
  address varchar(90) NOT NULL default '',
  post_num varchar(90) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  bname varchar(12) NOT NULL default '',
  btel1 varchar(4) NOT NULL default '',
  btel2 varchar(4) NOT NULL default '',
  btel3 varchar(4) NOT NULL default '',
  bhtel1 varchar(4) NOT NULL default '',
  bhtel2 varchar(4) NOT NULL default '',
  bhtel3 varchar(4) NOT NULL default '',
  bpost1 varchar(10) NOT NULL default '',
  bpost2 varchar(30) NOT NULL default '',
  baddress varchar(90) NOT NULL default '',
  bpost_num varchar(90) NOT NULL default '',
  bemail varchar(50) NOT NULL default '',
  content varchar(100) default NULL,
  completion tinyint(4) NOT NULL default '0',
  confirmation tinyint(4) NOT NULL default '0',
  orderday int(11) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY ordernum (ordernum),
  KEY orderer (orderer),
  KEY ordername (ordername),
  KEY confirmation (confirmation),
  KEY completion (completion)
) ENGINE=MyISAM AUTO_INCREMENT=55 ;
");

mysqli_query($link," CREATE TABLE largepurchase (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  fixprice int(11) NOT NULL default '0',
  price int(11) NOT NULL default '0',
  dcprice int(11) NOT NULL default '0',
  endprice int(11) NOT NULL default '0',
  smallquantity int(11) NOT NULL default '0',
  orderquantity int(11) NOT NULL default '0',
  recordquantity int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=5 ;
");

mysqli_query($link," CREATE TABLE member (
  id int(11) NOT NULL auto_increment,
  member_id varchar(20) NOT NULL default '',
  pass1 varchar(20) NOT NULL default '',
  pass2 varchar(20) NOT NULL default '',
  cash int(11) default '0',
  cashday int(11) default '0',
  point int(11) default '0',
  pointok tinyint(4) default '0',
  visit int(6) default '0',
  grade tinyint(4) default '0',
  name varchar(20) NOT NULL default '',
  jumin1 int(6) NOT NULL default '0',
  jumin2 int(7) NOT NULL default '0',
  tel1 varchar(4) default NULL,
  tel2 varchar(4) default NULL,
  tel3 varchar(4) default NULL,
  htel1 varchar(4) NOT NULL default '',
  htel2 varchar(4) NOT NULL default '',
  htel3 varchar(4) NOT NULL default '',
  post1 char(3) NOT NULL default '',
  post2 char(3) NOT NULL default '',
  address varchar(70) NOT NULL default '',
  post_num varchar(50) NOT NULL default '',
  nickname varchar(20) NOT NULL default '',
  email varchar(50) default NULL,
  mailing tinyint(4) default NULL,
  hobby1 tinyint(4) default NULL,
  hobby2 tinyint(4) default NULL,
  hobby3 tinyint(4) default NULL,
  hobby4 tinyint(4) default NULL,
  hobby5 tinyint(4) default NULL,
  hobby6 tinyint(4) default NULL,
  hobby7 tinyint(4) default NULL,
  job varchar(20) default NULL,
  url varchar(50) default NULL,
  sms char(1) default NULL,
  ip varchar(30) NOT NULL default '',
  avatar tinyint(4) default NULL,
  filename varchar(50) default NULL,
  myinfo varchar(200) default NULL,
  join_day int(11) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY member_id (member_id),
  KEY name (name),
  KEY jumin1 (jumin1),
  KEY jumin2 (jumin2),
  KEY nickname (nickname),
  KEY email (email)
) ENGINE=MyISAM AUTO_INCREMENT=7 ;
");

mysqli_query($link," CREATE TABLE mylist (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  name varchar(50) NOT NULL default '',
  price int(11) NOT NULL default '0',
  orderer varchar(20) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=19 ;
");

mysqli_query($link," CREATE TABLE mylistmemo (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  orderer varchar(20) NOT NULL default '',
  memo text,
  drdate date NOT NULL default '0000-00-00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=20 ;
");

mysqli_query($link," CREATE TABLE myorder (
  id int(11) NOT NULL auto_increment,
  ordernum varchar(20) NOT NULL default '',
  orderer varchar(20) NOT NULL default '',
  ordername varchar(50) NOT NULL default '',
  allcash int(11) NOT NULL default '0',
  allpoint int(11) NOT NULL default '0',
  pwd varchar(20) NOT NULL default '',
  tel1 varchar(4) NOT NULL default '',
  tel2 varchar(4) NOT NULL default '',
  tel3 varchar(4) NOT NULL default '',
  htel1 varchar(4) NOT NULL default '',
  htel2 varchar(4) NOT NULL default '',
  htel3 varchar(4) NOT NULL default '',
  post1 varchar(10) NOT NULL default '',
  post2 varchar(30) NOT NULL default '',
  address varchar(90) NOT NULL default '',
  post_num varchar(90) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  bname varchar(12) NOT NULL default '',
  btel1 varchar(4) NOT NULL default '',
  btel2 varchar(4) NOT NULL default '',
  btel3 varchar(4) NOT NULL default '',
  bhtel1 varchar(4) NOT NULL default '',
  bhtel2 varchar(4) NOT NULL default '',
  bhtel3 varchar(4) NOT NULL default '',
  bpost1 varchar(10) NOT NULL default '',
  bpost2 varchar(30) NOT NULL default '',
  baddress varchar(90) NOT NULL default '',
  bpost_num varchar(90) NOT NULL default '',
  bemail varchar(50) NOT NULL default '',
  content varchar(100) default NULL,
  completion tinyint(4) NOT NULL default '0',
  confirmation tinyint(4) NOT NULL default '0',
  orderday int(11) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY ordernum (ordernum),
  KEY orderer (orderer),
  KEY ordername (ordername),
  KEY confirmation (confirmation),
  KEY completion (completion)
) ENGINE=MyISAM AUTO_INCREMENT=39 ;
");

mysqli_query($link," CREATE TABLE myreview (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  memberid varchar(20) NOT NULL default '',
  title varchar(30) NOT NULL default '',
  content text,
  mark tinyint(4) NOT NULL default '0',
  drdate date NOT NULL default '0000-00-00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=7 ;
");
li_query($link,"INSERT INTO myreview VALUES (6, 4, 'test', '고전소설을 읽고', '좋아요.\r\n많이 좋아요.\r\n아주 좋아요.....ㅎㅎ', 5, '2015-04-22')");

mysqli_query($link," CREATE TABLE popupnews (
  id int(11) NOT NULL auto_increment,
  imgopen tinyint(4) NOT NULL default '0',
  imgwidth varchar(20) NOT NULL default '',
  imgheight varchar(20) NOT NULL default '',
  filename varchar(20) NOT NULL default '',
  rdate int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=7 ;
");
mysqli_query($link,"INSERT INTO popupnews VALUES (2, 1, '555', '555', '1144379402.jpg', 1144587628)");
mysqli_query($link,"INSERT INTO popupnews VALUES (6, 1, '300', '300', '1144584744.jpg', 1144588192)");

mysqli_query($link," CREATE TABLE question (
  id int(11) NOT NULL auto_increment,
  titlenum int(11) NOT NULL default '0',
  itemnum int(11) NOT NULL default '0',
  title varchar(200) NOT NULL default '',
  item varchar(200) NOT NULL default '',
  sdate int(11) NOT NULL default '0',
  edate int(11) NOT NULL default '0',
  yesno enum('y','n') NOT NULL default 'y',
  poll int(11) NOT NULL default '0',
  rdate int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=18 ;
");

mysqli_query($link," CREATE TABLE synergicpurchase (
  id int(11) NOT NULL auto_increment,
  goodsid int(11) NOT NULL default '0',
  fixprice int(11) NOT NULL default '0',
  price int(11) NOT NULL default '0',
  endprice int(11) NOT NULL default '0',
  dcprice int(11) NOT NULL default '0',
  recordquantity int(11) NOT NULL default '0',
  orderquantity int(11) NOT NULL default '0',
  enddate date default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;
");

mysqli_query($link," CREATE TABLE synerorder (
  id int(11) NOT NULL auto_increment,
  ordernum varchar(20) NOT NULL default '',
  orderer varchar(20) NOT NULL default '',
  ordername varchar(50) NOT NULL default '',
  synerid int(11) NOT NULL default '0',
  tel1 varchar(4) NOT NULL default '',
  tel2 varchar(4) NOT NULL default '',
  tel3 varchar(4) NOT NULL default '',
  htel1 varchar(4) NOT NULL default '',
  htel2 varchar(4) NOT NULL default '',
  htel3 varchar(4) NOT NULL default '',
  post1 varchar(10) NOT NULL default '',
  post2 varchar(30) NOT NULL default '',
  address varchar(90) NOT NULL default '',
  post_num varchar(90) NOT NULL default '',
  email varchar(50) NOT NULL default '',
  bname varchar(12) NOT NULL default '',
  btel1 varchar(4) NOT NULL default '',
  btel2 varchar(4) NOT NULL default '',
  btel3 varchar(4) NOT NULL default '',
  bhtel1 varchar(4) NOT NULL default '',
  bhtel2 varchar(4) NOT NULL default '',
  bhtel3 varchar(4) NOT NULL default '',
  bpost1 varchar(10) NOT NULL default '',
  bpost2 varchar(30) NOT NULL default '',
  baddress varchar(90) NOT NULL default '',
  bpost_num varchar(90) NOT NULL default '',
  bemail varchar(50) NOT NULL default '',
  content varchar(100) default NULL,
  completion tinyint(4) NOT NULL default '0',
  confirmation tinyint(4) NOT NULL default '0',
  orderday int(11) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY ordernum (ordernum),
  KEY orderer (orderer),
  KEY ordername (ordername),
  KEY confirmation (confirmation),
  KEY completion (completion)
) ENGINE=MyISAM AUTO_INCREMENT=50 ;
");

mysqli_query($link," CREATE TABLE transport (
  id int(11) NOT NULL auto_increment,
  ordernum varchar(20) NOT NULL default '',
  transnum varchar(20) default NULL,
  transday varchar(10) default NULL,
  transco varchar(20) default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=39 ;
");

echo ("<meta http-equiv='Refresh' content='0; URL=../post_table.php'>");
?>