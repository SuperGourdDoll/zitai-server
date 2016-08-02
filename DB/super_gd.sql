/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : super_gd

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-03 00:20:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sgd_articles`
-- ----------------------------
DROP TABLE IF EXISTS `sgd_articles`;
CREATE TABLE `sgd_articles` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `likeNum` int(100) NOT NULL,
  `shareNum` int(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `readNum` int(100) NOT NULL,
  `uploadTime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sgd_articles
-- ----------------------------

-- ----------------------------
-- Table structure for `sgd_graphics`
-- ----------------------------
DROP TABLE IF EXISTS `sgd_graphics`;
CREATE TABLE `sgd_graphics` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `imageUrl` varchar(255) NOT NULL,
  `likeNum` int(100) NOT NULL COMMENT '点赞次数',
  `shareNum` int(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `uploadTime` varchar(255) NOT NULL,
  `readNum` int(100) NOT NULL COMMENT '阅读量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sgd_graphics
-- ----------------------------

-- ----------------------------
-- Table structure for `sgd_users`
-- ----------------------------
DROP TABLE IF EXISTS `sgd_users`;
CREATE TABLE `sgd_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8 NOT NULL,
  `update_at` varchar(255) CHARACTER SET gbk NOT NULL,
  `status` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `userLocation` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `userSex` int(10) NOT NULL COMMENT '0为男，1为女',
  `userSign` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sgd_users
-- ----------------------------
INSERT INTO `sgd_users` VALUES ('1', 'bryant', '21232f297a57a5a743894a0e4a801fc3', '1469884423', '1', '2', '', '', '', '0', '', '', '0', '');
INSERT INTO `sgd_users` VALUES ('2', 'allen', 'c8837b23ff8aaa8a2dde915473ce0991', '1469884423', '1', '2', '', '', '', '0', '', '', '0', '');

-- ----------------------------
-- Table structure for `sgd_videos`
-- ----------------------------
DROP TABLE IF EXISTS `sgd_videos`;
CREATE TABLE `sgd_videos` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `likeNum` int(100) NOT NULL,
  `shareNum` int(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `uploadTime` bigint(100) NOT NULL,
  `videoTime` varchar(255) NOT NULL,
  `videoClass` varchar(255) NOT NULL COMMENT '视频所属分类',
  `videoCover` varchar(255) NOT NULL COMMENT '视频封面图',
  `playTime` int(100) NOT NULL COMMENT '视频播放量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sgd_videos
-- ----------------------------
INSERT INTO `sgd_videos` VALUES ('0', '赶着音乐放牧', '/video/cover/dabing.f4v', '0', '0', '', '1470151311', '04:57', '视频', '/video/cover/dabing.png', '0');
INSERT INTO `sgd_videos` VALUES ('1', '赶着音乐放牧', '/video/cover/dabing.f4v', '0', '0', '', '1470151319', '04:57', '视频', '/video/cover/dabing.png', '0');
