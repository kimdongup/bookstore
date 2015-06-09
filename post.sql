-- phpMyAdmin SQL Dump
-- version 2.7.0-pl2
-- http://www.phpmyadmin.net
-- 
-- 호스트: localhost
-- 처리한 시간: 06-04-28 10:41 
-- 서버 버전: 4.0.26
-- PHP 버전: 4.4.2
-- 
-- 데이터베이스: `online`
-- 

-- --------------------------------------------------------

-- 
-- 테이블 구조 `post`
-- 

CREATE TABLE `post` (
  `num` varchar(6) NOT NULL default '',
  `sido` varchar(4) NOT NULL default '',
  `gugun` varchar(20) NOT NULL default '',
  `umdong` varchar(50) NOT NULL default '',
  `bunji` varchar(20) NOT NULL default '',
  KEY `num` (`num`),
  KEY `umdong` (`umdong`)
) ENGINE=MyISAM;
