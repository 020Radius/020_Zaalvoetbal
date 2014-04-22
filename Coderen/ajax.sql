/*
Navicat MySQL Data Transfer

Source Server         : dasfds
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : ajax

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2014-04-22 13:34:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for schema
-- ----------------------------
DROP TABLE IF EXISTS `schema`;
CREATE TABLE `schema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team1_id` int(11) DEFAULT '0',
  `team2_id` int(11) DEFAULT '0',
  `ronde` int(11) DEFAULT '0',
  `tijd` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of schema
-- ----------------------------

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id_team` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(100) DEFAULT 'Team naam hier...',
  `punten` int(11) DEFAULT '0',
  `gespeeld` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of teams
-- ----------------------------
