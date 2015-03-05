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

 Date: 03/05/2015 13:27:28 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cr_chat_history`
-- ----------------------------
DROP TABLE IF EXISTS `cr_chat_history`;
CREATE TABLE `cr_chat_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL COMMENT '房间id',
  `msg_content` text COMMENT '内容',
  `msg_type` int(11) DEFAULT NULL COMMENT '消息类型',
  `send_user` varchar(255) DEFAULT NULL COMMENT '发送人',
  `recipient_user` varchar(255) DEFAULT NULL,
  `create_time` int(20) DEFAULT NULL,
  `s_id` varchar(255) DEFAULT NULL COMMENT '当前会话ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='聊天室消息记录;';

-- ----------------------------
--  Table structure for `cr_room`
-- ----------------------------
DROP TABLE IF EXISTS `cr_room`;
CREATE TABLE `cr_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL COMMENT '房间名称',
  `type` int(11) DEFAULT NULL COMMENT '房间类型',
  `room_desc` text COMMENT '描述',
  `create_time` int(20) DEFAULT NULL COMMENT '创建时间',
  `room_admin` varchar(200) DEFAULT NULL COMMENT '管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='聊天室';

-- ----------------------------
--  Records of `cr_room`
-- ----------------------------
BEGIN;
INSERT INTO `cr_room` VALUES ('1', 'test', '1', '测试的', null, 'mackcyl');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
