
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `present`
-- ----------------------------
DROP TABLE IF EXISTS `present`;
CREATE TABLE `present` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pid` int(11) DEFAULT NULL COMMENT '活动的id 根据上一个活动id递增',
  `Prize` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Count` int(11) DEFAULT NULL COMMENT '奖品的数量',
  `Disable` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `Dateline` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `present_log`;
CREATE TABLE `present_log` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pid` int(10) DEFAULT NULL,
  `Uid` int(10) unsigned NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Dateline` datetime DEFAULT NULL,
  `Present` tinyint(3) unsigned NOT NULL,
  `Product` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Ip` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=711 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of present_log
-- ----------------------------
