/*
Navicat MySQL Data Transfer

Source Server         : Hiki
Source Server Version : 50633
Source Host           : localhost:3306
Source Database       : lilyask

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2016-10-22 17:33:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_detail_info
-- ----------------------------
DROP TABLE IF EXISTS `user_detail_info`;
CREATE TABLE `user_detail_info` (
  `uid` int(11) NOT NULL,
  `nickname` char(20) NOT NULL,
  `u_description` char(50) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birthday` char(20) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `address` char(100) DEFAULT NULL,
  `introduction` char(100) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_detail_info
-- ----------------------------
