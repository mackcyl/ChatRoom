/*
 Navicat Premium Data Transfer

 Source Server         : mackcyl.tieson
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : localhost
 Source Database       : chat_room

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : utf-8

 Date: 03/06/2015 18:54:28 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cr_users`
-- ----------------------------
DROP TABLE IF EXISTS `cr_users`;
CREATE TABLE `cr_users` (
  `nickname` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `reg_time` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL COMMENT '最后登陆时间',
  `online_time` int(11) DEFAULT NULL COMMENT '在线时间',
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cr_users`
-- ----------------------------
BEGIN;
INSERT INTO `cr_users` VALUES ('LeMPhone', '{02fef424-2df0-1b82-4edb-94f0f38559ac}', '1425624523', null, null), ('dev', '{0c712a74-d53f-e436-dd8c-cfe85db03f54}', '1425624523', null, null), ('mackcyl', '{194cd773-eb34-c745-1151-42290d92edb4}', '1425630488', '1425630488', null), ('测试用户', '{20e45f5a-6706-e253-f9a8-31927e2408fd}', '1425624523', '1425624757', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
