-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 07 月 23 日 10:17
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
-- 表的结构 `case_name`
--

CREATE TABLE IF NOT EXISTS `case_name` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL COMMENT '名称',
  `Effect` varchar(255) DEFAULT NULL COMMENT '作用',
  `Description` tinytext,
  `Allusion` tinytext COMMENT '典故',
  `Use` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否使用',
  `Dateline` int(10) NOT NULL COMMENT '添加的时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `case_name`
--

INSERT INTO `case_name` (`ID`, `Name`, `Effect`, `Description`, `Allusion`, `Use`, `Dateline`) VALUES
(6, 'Athos', '智慧', '阿多斯', '三个火枪手', '1', 1343032907),
(7, 'Porthos', '建筑,善于观察 ', '波多斯', '三个火枪手', '0', 1343032942),
(8, 'Louis', '', '路易斯', '三个火枪手', '0', 1343032967),
(9, 'Aramis', '力大', '阿拉米斯', '三个火枪手', '0', 1343032987),
(10, 'Anne', '女,睿智', '安娜', '三个火枪手', '1', 1343033020);

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
