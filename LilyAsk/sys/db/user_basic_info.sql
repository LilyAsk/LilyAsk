/*
Navicat MySQL Data Transfer

Source Server         : Hiki
Source Server Version : 50633
Source Host           : localhost:3306
Source Database       : lilyask

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2016-10-22 17:33:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_basic_info
-- ----------------------------
DROP TABLE IF EXISTS `user_basic_info`;
CREATE TABLE `user_basic_info` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_basic_info
-- ----------------------------
