-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 07 月 20 日 10:07
-- 服务器版本: 5.1.41
-- PHP 版本: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `codebase`
--

-- --------------------------------------------------------

--
-- 表的结构 `soft_resource`
--

CREATE TABLE IF NOT EXISTS `soft_resource` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Version` float NOT NULL,
  `Type_ID` int(10) NOT NULL,
  `PATH_CG` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Type_ID` (`Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `soft_resource`
--


-- --------------------------------------------------------

--
-- 表的结构 `soft_type`
--

CREATE TABLE IF NOT EXISTS `soft_type` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `soft_type`
--

INSERT INTO `soft_type` (`ID`, `Type`) VALUES
(1, 'JQuery'),
(2, 'png'),
(3, 'jpeg'),
(4, 'exe'),
(5, '效率');

--
-- 限制导出的表
--

--
-- 限制表 `soft_resource`
--
ALTER TABLE `soft_resource`
  ADD CONSTRAINT `soft_resource_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `soft_type` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
