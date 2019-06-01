/*
MySQL Data Transfer
Source Host: localhost
Source Database: disk
Target Host: localhost
Target Database: disk
Date: 2019/6/1 21:02:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for friend
-- ----------------------------
CREATE TABLE `friend` (
  `userid` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`userid`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for real_file
-- ----------------------------
CREATE TABLE `real_file` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `md5` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL COMMENT '真实类型',
  `size` int(16) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for share_file
-- ----------------------------
CREATE TABLE `share_file` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `keyw` varchar(13) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `views` int(10) DEFAULT '0',
  `saves` int(10) DEFAULT '0',
  `downloads` int(10) DEFAULT '0',
  `password` varchar(20) DEFAULT NULL,
  `vir_ids` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10032 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100005 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vir_file
-- ----------------------------
CREATE TABLE `vir_file` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `md5` varchar(32) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `size` int(16) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `isdel` int(1) DEFAULT '1',
  `create_time` datetime DEFAULT NULL,
  `del_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `real_file` VALUES ('9', '60f175796017cc6c143ef7fd562c0323', '.txt', '859', '2019-05-10 08:44:06');
INSERT INTO `real_file` VALUES ('10', '6e6ecf45e3fc5971a7fab073696c6d27', '.txt', '348', '2019-05-10 09:14:00');
INSERT INTO `real_file` VALUES ('11', 'b09c6462e0dbfe66e2d4e2ff0c29c557', '.mp3', '1922393', '2019-05-10 09:26:36');
INSERT INTO `real_file` VALUES ('12', '35a906df9797724b8ef8d94a13b31532', '.json', '6104', '2019-05-10 02:53:58');
INSERT INTO `real_file` VALUES ('13', '174757dbf22c139c955eff7d4e825756', '.sql', '53368', '2019-05-10 02:57:49');
INSERT INTO `real_file` VALUES ('14', '48ea652873ceae96b7e7552324582701', '.jpg', '5000', '2019-05-11 10:33:11');
INSERT INTO `real_file` VALUES ('15', 'b5bc943a9a58b779cc18308bfb6a81b7', '.mp4', '56587177', '2019-05-11 03:36:32');
INSERT INTO `real_file` VALUES ('16', 'a704a815ef4586263ef72d809a9fa48e', '.jpg', '21677', '2019-05-12 08:40:15');
INSERT INTO `real_file` VALUES ('17', '56c7728d137e54def55b42e91ce2cc99', '.jpg', '4716', '2019-05-15 03:55:35');
INSERT INTO `real_file` VALUES ('18', '094d0ca196db4c2e61de17cae16136b2', '.jsp', '799', '2019-05-15 03:57:41');
INSERT INTO `real_file` VALUES ('19', '96da518389834f02116625e7855f5b2b', '.pdf', '564964', '2019-05-15 03:58:19');
INSERT INTO `real_file` VALUES ('20', '0490d30c9bd39085ce3f18658a9d380d', '.jsp', '1624', '2019-05-15 04:03:41');
INSERT INTO `real_file` VALUES ('21', '630a979185879b63b92dfda4a9d4093e', '.zip', '4836062', '2019-05-15 04:08:26');
INSERT INTO `real_file` VALUES ('22', 'ca3edf9b2c076987cb63ce72acf00769', '.tmp', '52269554', '2019-05-15 04:24:49');
INSERT INTO `real_file` VALUES ('23', 'ef652cead55b2005929e4d7d8e9aeea6', '.docx', '12341', '2019-05-31 10:47:20');
INSERT INTO `share_file` VALUES ('10031', '5cf16905d9f6c', '2019-06-01 01:06:53', '100003', '2019-06-02 01:06:53', '1', '0', '1', 'W1hn', '65,66');
INSERT INTO `user` VALUES ('5', '18146620556', '123', '狗跟', null, '2019-05-10 08:27:35');
INSERT INTO `user` VALUES ('100001', '15170166610', '123456', '肖人杰', null, '2019-04-16 10:26:27');
INSERT INTO `user` VALUES ('100002', '18172745452', '123456', '叶芳华', null, '2019-04-16 09:29:40');
INSERT INTO `user` VALUES ('100003', '18679447632', '123', 'sky云痕', '123', '2019-04-13 15:04:26');
INSERT INTO `user` VALUES ('100004', '18679447634', '12346', 'admin', null, '2019-05-07 11:52:50');
INSERT INTO `vir_file` VALUES ('45', '100003', null, 'aaa', null, '-1', '0', '0', '2019-05-10 11:05:18', null);
INSERT INTO `vir_file` VALUES ('54', '100003', null, 'aaa', null, '-1', '46', '0', '2019-05-10 03:05:01', null);
INSERT INTO `vir_file` VALUES ('64', '100003', '60f175796017cc6c143ef7fd562c0323', '数字 (1).txt', '859', '.txt', '54', '0', '2019-05-10 08:05:45', null);
INSERT INTO `vir_file` VALUES ('65', '100003', 'b09c6462e0dbfe66e2d4e2ff0c29c557', '晚安喵.mp3', '1922393', '.mp3', '0', '0', '2019-05-10 09:05:08', null);
INSERT INTO `vir_file` VALUES ('66', '100003', '48ea652873ceae96b7e7552324582701', '111.jpg', '5000', '.jpg', '0', '0', '2019-05-11 10:05:11', null);
INSERT INTO `vir_file` VALUES ('67', '100003', 'b5bc943a9a58b779cc18308bfb6a81b7', 'badapple.mp4', '56587177', '.mp4', '0', '0', '2019-05-11 03:05:32', null);
INSERT INTO `vir_file` VALUES ('68', '100003', 'a704a815ef4586263ef72d809a9fa48e', '1123.jpg', '21677', '.jpg', '0', '1', '2019-05-12 08:05:15', '2019-06-01 02:06:12');
INSERT INTO `vir_file` VALUES ('69', '100002', '56c7728d137e54def55b42e91ce2cc99', '林俊杰.jpg', '4716', '.jpg', '0', '0', '2019-05-15 03:05:35', null);
INSERT INTO `vir_file` VALUES ('70', '100002', '094d0ca196db4c2e61de17cae16136b2', 'noticeMain.jsp', '799', '.jsp', '0', '0', '2019-05-15 03:05:41', null);
INSERT INTO `vir_file` VALUES ('71', '100002', '96da518389834f02116625e7855f5b2b', '注册登陆注销.pdf', '564964', '.pdf', '0', '0', '2019-05-15 03:05:19', null);
INSERT INTO `vir_file` VALUES ('72', '100002', '96da518389834f02116625e7855f5b2b', '注册登陆注销.pdf', '564964', '.pdf', '0', '0', '2019-05-15 03:05:30', null);
INSERT INTO `vir_file` VALUES ('74', '100002', '630a979185879b63b92dfda4a9d4093e', '分布式微服务架构课程表V2.0版.zip', '4836062', '.zip', '0', '0', '2019-05-15 04:05:26', null);
INSERT INTO `vir_file` VALUES ('75', '100002', '630a979185879b63b92dfda4a9d4093e', '分布式微服务架构课程表V2.0版.zip', '4836062', '.zip', '0', '0', '2019-05-15 04:05:56', null);
