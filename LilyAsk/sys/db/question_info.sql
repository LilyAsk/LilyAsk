/*
Navicat MySQL Data Transfer

Source Server         : Hiki
Source Server Version : 50633
Source Host           : localhost:3306
Source Database       : lilyask

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2016-10-22 17:33:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for question_info
-- ----------------------------
DROP TABLE IF EXISTS `question_info`;
CREATE TABLE `question_info` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `question` char(100) NOT NULL,
  `q_description` text,
  `q_time` datetime NOT NULL,
  `answer_num` int(10) unsigned NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question_info
-- ----------------------------
