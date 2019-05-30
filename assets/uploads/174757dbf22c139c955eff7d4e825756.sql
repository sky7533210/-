/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : contentmanagersystem_db

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2019-04-23 14:17:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `logo` varchar(255) DEFAULT '' COMMENT '缩略图',
  `content` longtext COMMENT '内容',
  `contentHtml` longtext,
  `createTime` datetime DEFAULT NULL COMMENT '创建时间',
  `updateTime` datetime DEFAULT NULL COMMENT '修改时间',
  `opId` int(11) DEFAULT NULL COMMENT '操作人Id',
  `state` varchar(10) DEFAULT '1' COMMENT '状态（0：无效；1：有效）',
  `firstCode` varchar(255) DEFAULT NULL COMMENT '一级编码',
  `firstName` varchar(255) DEFAULT NULL COMMENT '一级名称',
  `secCode` varchar(255) DEFAULT NULL COMMENT '二级编码',
  `secName` varchar(255) DEFAULT NULL COMMENT '二级名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '修改', ' ', '<p>回显的问题解决了回显的问题解决了回显的问题解决了回显的问题解决了回显的问题解决了回显的问题解决了回显的问题解决了回显的问题解决了</p><p>是吗回显的问题解决了</p>', null, '2019-04-19 13:34:39', '2019-04-19 09:46:44', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('2', 'faf', '', 'fsfdfd', null, '2019-04-16 18:28:19', '2019-04-16 18:28:19', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('12', 'kks', ' ', '<p><span style=\"font-size: 24px;\">dsa<img src=\"http://localhost:8080/uploadfile/1555505147590.jpg\" title=\"1555505147590.jpg\" alt=\"1555505147590.jpg\" width=\"72\" height=\"76\"/></span><br/></p>', null, '2019-04-19 13:34:39', '2019-04-19 17:47:30', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('13', '1', ' ', '<p>daddadad</p>', null, '2019-04-19 13:34:39', '2019-04-17 21:21:03', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('14', 'kks', ' ', '<p>dsa<img src=\"http://localhost:8080/uploadfile/1555505147590.jpg\" title=\"1555505147590.jpg\" alt=\"1555505147590.jpg\"/><br/>&quot;&gt;</p>', null, '2019-04-19 13:34:39', '2019-04-17 21:21:23', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('15', '1', ' ', '<p>s</p>', null, '2019-04-19 13:34:39', '2019-04-17 21:23:11', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('16', 'ge', ' ', '<p style=\"text-align: left;\"><img src=\"http://img.baidu.com/hi/jx2/j_0001.gif\"/><span style=\"text-decoration: line-through; font-size: 10px;\"><strong><img src=\"http://img.baidu.com/hi/jx2/j_0002.gif\"/><img src=\"http://img.baidu.com/hi/jx2/j_0003.gif\"/></strong></span></p>', null, '2019-04-19 13:34:39', '2019-04-18 15:58:59', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('17', '1', ' ', '<p>dsa</p>', null, '2019-04-19 13:34:39', '2019-04-17 21:25:49', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('19', '1', ' ', '<p>dffdsda</p>', null, '2019-04-19 13:34:39', '2019-04-18 10:26:34', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('20', '测试删除', ' ', '<p><img src=\"http://localhost:8080/uploadfile/1555552759231.jpg\" title=\"1555552759231.jpg\" alt=\"1555552759231.jpg\" width=\"262\" height=\"161\"/></p><p>图片缩小</p>', null, '2019-04-19 13:34:39', '2019-04-18 09:59:58', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('21', 'fdsf', ' ', '<p>fdsfsf</p>', null, '2019-04-19 13:34:39', '2019-04-18 10:02:04', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('22', 'das', ' ', '<p>fsgfgfgfdddda</p>', null, '2019-04-19 13:34:39', '2019-04-18 10:26:18', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('23', 'df', ' ', '<p>Fdsf</p>', null, '2019-04-19 13:34:39', '2019-04-18 15:58:23', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('24', '测试卡到了', ' ', '<p>是的反腐付付付付付付付付付</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:52:37', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('25', '放松放松', ' ', '<p>发送到发送到刚刚</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:52:44', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('26', '规范规定', ' ', '<p>第三方发生的发生</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:52:56', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('27', '老男孩', ' ', '<p>生活像一把无情刻刀，改变了我们的模样，未曾绽放就要枯萎吗？你有过梦想。。。。。。。<br/></p><p>这里的故事你是否还记得</p>', null, '2019-04-19 13:36:00', '2019-04-19 13:43:29', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('28', 'fsdfs', ' ', '<p>fsdfsdf</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:53:57', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('29', 'dggd', ' ', '<p>gdgdg</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:54:01', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('30', 'gdg', ' ', '<p>gdg</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:54:05', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('31', 'gjhj', ' ', '<p>jgjg</p>', null, '2019-04-19 13:34:39', '2019-04-19 10:54:09', null, '0', null, null, null, null);
INSERT INTO `article` VALUES ('32', 'dfs', ' ', '<p>fsdfdd</p>', null, '2019-04-19 13:34:39', '2019-04-19 13:35:38', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('33', '电风扇', ' ', '<p><img src=\"http://localhost:8080/uploadfile/1555666825045.jpg\" title=\"1555666825045.jpg\" alt=\"1555666825045.jpg\"/><img src=\"http://localhost:8080/uploadfile/1555661024042.jpg\" title=\"1555661024042.jpg\" alt=\"1555661024042.jpg\" width=\"1\" height=\"1\"/></p>', null, '2019-04-19 16:05:09', '2019-04-19 17:40:31', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('34', 'fsdf', ' ', '<p><img src=\"http://localhost:8080/uploadfile/1555666912113.jpg\" title=\"1555666912113.jpg\" alt=\"1555666912113.jpg\"/></p>', null, '2019-04-19 17:41:54', '2019-04-22 16:18:54', null, '1', null, null, null, null);
INSERT INTO `article` VALUES ('35', '空格', '', '<p>&lt;&nbsp; &nbsp; &nbsp; &gt;</p>', null, '2019-04-22 15:00:45', '2019-04-22 15:01:54', null, '1', null, null, null, null);

-- ----------------------------
-- Table structure for article_first
-- ----------------------------
DROP TABLE IF EXISTS `article_first`;
CREATE TABLE `article_first` (
  `firstCode` varchar(255) NOT NULL COMMENT '一级编码',
  `firstName` varchar(255) DEFAULT NULL COMMENT '一级名称',
  PRIMARY KEY (`firstCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_first
-- ----------------------------

-- ----------------------------
-- Table structure for article_sec
-- ----------------------------
DROP TABLE IF EXISTS `article_sec`;
CREATE TABLE `article_sec` (
  `secCode` varchar(255) DEFAULT NULL COMMENT '二级编码',
  `secName` varchar(255) DEFAULT NULL COMMENT '二级名称',
  `firstCode` varchar(255) DEFAULT NULL COMMENT '一级编码',
  KEY `firstCode` (`firstCode`),
  CONSTRAINT `article_sec_ibfk_1` FOREIGN KEY (`firstCode`) REFERENCES `article_first` (`firstCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_sec
-- ----------------------------

-- ----------------------------
-- Table structure for cc_announcement_info
-- ----------------------------
DROP TABLE IF EXISTS `cc_announcement_info`;
CREATE TABLE `cc_announcement_info` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_type` int(11) DEFAULT NULL COMMENT '公告类型',
  `announcement_title` varchar(50) DEFAULT NULL COMMENT '公告标题',
  `announcement_content` varchar(500) DEFAULT NULL COMMENT '公告内容',
  `announcement_author` varchar(50) DEFAULT NULL COMMENT '发布者',
  `announcement_time` datetime DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cc_announcement_info
-- ----------------------------

-- ----------------------------
-- Table structure for cc_announcement_info_user
-- ----------------------------
DROP TABLE IF EXISTS `cc_announcement_info_user`;
CREATE TABLE `cc_announcement_info_user` (
  `announcement_info_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_id` int(11) DEFAULT NULL COMMENT '公告Id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户Id',
  `announcement_flag` int(11) DEFAULT NULL COMMENT '是否已读',
  PRIMARY KEY (`announcement_info_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cc_announcement_info_user
-- ----------------------------

-- ----------------------------
-- Table structure for cc_data_cleaning
-- ----------------------------
DROP TABLE IF EXISTS `cc_data_cleaning`;
CREATE TABLE `cc_data_cleaning` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_type` int(11) DEFAULT NULL COMMENT '数据类型',
  `data_time` varchar(50) DEFAULT NULL COMMENT '数据时间',
  `data_count` int(11) DEFAULT NULL COMMENT '数量',
  PRIMARY KEY (`data_id`),
  UNIQUE KEY `unique_data_type_time` (`data_type`,`data_time`) COMMENT '数据类型、日期唯一建索引'
) ENGINE=InnoDB AUTO_INCREMENT=601 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cc_data_cleaning
-- ----------------------------
INSERT INTO `cc_data_cleaning` VALUES ('576', '1', '2019-04-10', '0');
INSERT INTO `cc_data_cleaning` VALUES ('577', '1', '2019-04-11', '0');
INSERT INTO `cc_data_cleaning` VALUES ('578', '1', '2019-04-12', '0');
INSERT INTO `cc_data_cleaning` VALUES ('579', '1', '2019-04-13', '0');
INSERT INTO `cc_data_cleaning` VALUES ('580', '1', '2019-04-14', '0');
INSERT INTO `cc_data_cleaning` VALUES ('581', '1', '2019-04-15', '0');
INSERT INTO `cc_data_cleaning` VALUES ('582', '1', '2019-04-16', '1');
INSERT INTO `cc_data_cleaning` VALUES ('583', '1', '2019-04-17', '1');
INSERT INTO `cc_data_cleaning` VALUES ('584', '1', '2019-04-18', '2');
INSERT INTO `cc_data_cleaning` VALUES ('585', '1', '2019-04-19', '1');

-- ----------------------------
-- Table structure for cc_resource
-- ----------------------------
DROP TABLE IF EXISTS `cc_resource`;
CREATE TABLE `cc_resource` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_parentId` int(11) DEFAULT NULL,
  `res_name` varchar(50) NOT NULL,
  `res_status` int(11) DEFAULT NULL,
  `res_model_code` varchar(30) DEFAULT NULL COMMENT '模块标识',
  `res_link_address` varchar(200) DEFAULT NULL,
  `res_image` varchar(100) DEFAULT NULL,
  `res_level` int(11) DEFAULT NULL,
  `res_type` int(11) DEFAULT NULL,
  `res_display_order` int(11) DEFAULT NULL,
  `res_remark` varchar(200) DEFAULT NULL,
  `creator` varchar(40) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `modifier` varchar(40) DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COMMENT='资源表';

-- ----------------------------
-- Records of cc_resource
-- ----------------------------
INSERT INTO `cc_resource` VALUES ('2', '5', '用户管理', '0', '7JMoS6yG', '/user/user_list.do', 'larry-10103', '3', '0', '11', '', 'admin', '2016-11-25 16:57:22', 'admin', '2017-08-15 11:27:40');
INSERT INTO `cc_resource` VALUES ('3', '5', '角色管理', '0', 'SPAn6H46', '/role/role_list.do', 'larry-jiaoseguanli1', '3', '0', '3', '配置系统角色信息', 'admin', '2016-11-25 16:57:25', null, null);
INSERT INTO `cc_resource` VALUES ('4', '5', '菜单管理', '0', '0rbT8g7m', '/res/res_list.do', 'larry-caidanguanli', '3', '0', '4', '', 'admin', '2016-11-25 16:57:31', 'admin', '2017-08-15 11:04:41');
INSERT INTO `cc_resource` VALUES ('5', '7', '系统设置', '0', '0rbT8g9m', null, 'larry-xitongshezhi1', '2', '0', '5', '配置系统菜单信息', 'admin', '2017-07-28 09:31:43', null, null);
INSERT INTO `cc_resource` VALUES ('7', null, '系统管理', '0', '0rbT8g8m', null, 'larry-xitongshezhi1', '1', '0', '6', '配置系统菜单信息', 'admin', '2017-07-28 13:24:57', null, null);
INSERT INTO `cc_resource` VALUES ('8', null, '微信公众', '0', '0rbT8g6m', null, 'larry-weixingongzhongpingtai', '1', '0', '7', '配置系统菜单信息', 'admin', '2017-07-28 13:26:50', null, null);
INSERT INTO `cc_resource` VALUES ('9', '7', '消息中心', '0', '0rbT8g2m', '', 'larry-gerenxinxi5', '2', '0', '8', '配置系统菜单信息', 'admin', '2017-07-28 14:23:35', 'admin', '2017-08-28 19:50:48');
INSERT INTO `cc_resource` VALUES ('10', '9', '公告管理', '0', '0rbT8t2m', '/announcement/announcement_list.do', 'larry-gonggaoguanli', '3', '0', '9', '配置系统菜单信息', 'admin', '2017-07-28 17:07:55', 'admin', '2017-09-04 11:07:18');
INSERT INTO `cc_resource` VALUES ('11', '8', '测试菜单', '0', '0rbT8t2D', '/res.do', 'larry-gerenxinxi1', '2', '0', '9', '', 'admin', '2017-08-14 15:30:15', 'admin', '2017-08-28 19:49:56');
INSERT INTO `cc_resource` VALUES ('12', '2', '用户新增', '0', '0rbT8t2P', '/user/user_add.do', 'larry-gerenxinxi1', '3', '1', '3', '', 'admin', '2017-08-14 16:47:12', 'admin', '2017-08-16 17:56:18');
INSERT INTO `cc_resource` VALUES ('13', '11', '测试菜单', '0', 'OglvPpeA', '/test.do', 'tuichu1', '3', '0', '2', '备注', 'admin', '2017-08-15 09:59:53', 'admin', '2017-08-16 16:10:48');
INSERT INTO `cc_resource` VALUES ('14', '11', '测试菜单2', '0', 'WEpcNYu3', '/test.do', 'larry-neirongguanli', '3', '0', null, '', 'admin', '2017-08-15 14:48:04', 'admin', '2017-08-22 14:37:47');
INSERT INTO `cc_resource` VALUES ('15', '2', '用户导出', '0', '0jOfTHGx', '/user/excel_users_export.do', 'larry-10103', '3', '1', null, '', 'admin', '2017-08-16 23:29:50', null, null);
INSERT INTO `cc_resource` VALUES ('16', '2', '用户修改', '0', 'fSv1B2kZ', '/user/user_update.do', 'larry-bianji2', '3', '1', null, '', 'admin', '2017-08-16 23:30:21', 'admin', '2017-08-22 14:37:55');
INSERT INTO `cc_resource` VALUES ('17', '2', '用户失效', '0', 'uBg9TdEr', '/user/ajax_user_fail.do', 'larry-10103', '3', '1', null, '', 'admin', '2017-08-16 23:30:46', null, null);
INSERT INTO `cc_resource` VALUES ('18', '2', '批量失效', '0', 'lBE3hz5c', '/user/ajax_user_batch_fail.do', 'caidanguanli', '3', '1', null, '', 'admin', '2017-08-16 23:31:09', null, null);
INSERT INTO `cc_resource` VALUES ('19', '2', '分配角色', '0', 'mScICO9G', '/user/user_grant.do', 'jiaoseguanli1', '3', '1', null, '', 'admin', '2017-08-16 23:31:37', null, null);
INSERT INTO `cc_resource` VALUES ('20', '3', '角色导出', '0', 'oCNcsKmk', '/role/excel_role_export.do', 'jiaoseguanli1', '3', '1', null, '', 'admin', '2017-08-16 23:32:29', null, null);
INSERT INTO `cc_resource` VALUES ('21', '3', '角色新增', '0', 'nxRVZA5i', '/role/role_add.do', 'caidanguanli', '3', '1', null, '', 'admin', '2017-08-16 23:33:01', null, null);
INSERT INTO `cc_resource` VALUES ('22', '3', '角色修改', '0', 'moHbdnjz', '/role/role_update.do', 'liuyan', '3', '1', null, '', 'admin', '2017-08-16 23:33:26', null, null);
INSERT INTO `cc_resource` VALUES ('23', '3', '角色失效', '0', 'tkwJk34z', '/role/ajax_role_fail.do', 'caidanguanli', '3', '1', null, '', 'admin', '2017-08-16 23:33:46', null, null);
INSERT INTO `cc_resource` VALUES ('24', '3', '批量失效', '0', 'qsieHTy4', '/role/ajax_role_batch_fail.do', 'liuyan', '3', '1', null, '', 'admin', '2017-08-16 23:34:04', 'admin', '2017-08-22 17:31:48');
INSERT INTO `cc_resource` VALUES ('25', '3', '角色赋权', '0', 'bSG7LAmU', '/role/role_grant.do', 'caidanguanli', '3', '1', null, '', 'admin', '2017-08-16 23:34:28', null, null);
INSERT INTO `cc_resource` VALUES ('26', '4', '菜单新增', '0', 'Mhtly5er', '/res/res_edit.do', 'larry-11', '3', '1', null, '', 'admin', '2017-08-22 13:41:27', null, null);
INSERT INTO `cc_resource` VALUES ('27', '4', '菜单编辑', '0', 'KxCQVzRq', '/res/res_update.do', 'larry-bianji5', '3', '1', null, '', 'admin', '2017-08-22 13:42:30', null, null);
INSERT INTO `cc_resource` VALUES ('28', '4', '菜单失效', '0', 'DK3uPfe7', '/res/ajax_res_fail.do', 'larry-shanchu8', '3', '1', null, '', 'admin', '2017-08-22 13:45:01', null, null);
INSERT INTO `cc_resource` VALUES ('29', '4', '菜单导出', '0', 'wPUNDGgZ', '/res/excel_res_export.do', 'larry-wangzhanneirong', '3', '1', null, '', 'admin', '2017-08-22 13:46:43', null, null);
INSERT INTO `cc_resource` VALUES ('30', '11', '测试菜单3', '0', '3T7k24R4', '/test.do', 'larry-nav', '3', '0', null, '', 'user_system', '2017-08-22 14:43:00', null, null);
INSERT INTO `cc_resource` VALUES ('51', '7', '日志中心', '0', 'gYFTwbQb', '', 'larry-gongzuoneirong', '2', '0', null, '', 'admin', '2017-08-30 17:58:16', 'admin', '2017-08-30 18:01:42');
INSERT INTO `cc_resource` VALUES ('52', '51', '日志管理', '0', 'oL6OcNAt', '/syslog/sys_log_list.do', 'larry-pingjiaguanli1', '3', '0', null, '', 'admin', '2017-08-30 18:03:00', 'admin', '2017-09-08 10:55:16');
INSERT INTO `cc_resource` VALUES ('53', '9', '消息管理', '0', 'H70iVoxC', '/test.do', 'larry-liuyan', '3', '0', null, '', 'admin', '2017-08-31 12:34:52', null, null);
INSERT INTO `cc_resource` VALUES ('54', '10', '新增公告', '0', '4JQVLmOd', '/announcement/announcement_add.do', 'larry-iconfontadd', '3', '1', null, '', 'admin', '2017-09-04 17:08:03', null, null);
INSERT INTO `cc_resource` VALUES ('55', '10', '删除公告', '0', 'eTDnjGAM', '/announcement/ajax_del_announcement.do', 'larry-shanchu9', '3', '1', null, '', 'admin', '2017-09-04 17:08:27', null, null);
INSERT INTO `cc_resource` VALUES ('56', null, '文章管理', '0', 'OjUcN61G', '', 'larry-bianji5', '1', '0', null, '', 'user_system', '2019-04-16 13:38:20', null, null);
INSERT INTO `cc_resource` VALUES ('57', '56', '文章管理', '0', 'HHgHKHmm', '/article/article_list.do', 'larry-wangzhanneirong', '2', '0', null, '', 'user_system', '2019-04-16 13:39:58', 'admin', '2019-04-16 17:36:46');
INSERT INTO `cc_resource` VALUES ('58', '56', '图片管理', '1', 'C2LIFYfg', '', 'larry-iconfontcolor16', '2', '0', null, '', 'admin', '2019-04-16 16:42:59', null, null);

-- ----------------------------
-- Table structure for cc_role
-- ----------------------------
DROP TABLE IF EXISTS `cc_role`;
CREATE TABLE `cc_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_status` int(11) NOT NULL,
  `role_remark` varchar(255) DEFAULT NULL,
  `creator` varchar(40) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `modifier` varchar(40) DEFAULT NULL,
  `modifier_time` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of cc_role
-- ----------------------------
INSERT INTO `cc_role` VALUES ('52', '只读角色', '0', '', 'admin', '2017-08-16 16:05:48', 'admin', '2017-08-16 16:22:57');
INSERT INTO `cc_role` VALUES ('55', '用户角色', '0', '', 'admin', '2017-08-22 13:50:41', 'user_system', '2017-08-22 16:12:41');

-- ----------------------------
-- Table structure for cc_role_resource
-- ----------------------------
DROP TABLE IF EXISTS `cc_role_resource`;
CREATE TABLE `cc_role_resource` (
  `role_res_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `creator` varchar(40) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `modifier` varchar(40) DEFAULT NULL,
  `modifier_time` datetime DEFAULT NULL,
  PRIMARY KEY (`role_res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=581 DEFAULT CHARSET=utf8 COMMENT='角色与资源关系表';

-- ----------------------------
-- Records of cc_role_resource
-- ----------------------------
INSERT INTO `cc_role_resource` VALUES ('552', '55', '7', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('553', '55', '5', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('554', '55', '2', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('555', '55', '12', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('556', '55', '15', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('557', '55', '16', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('558', '55', '3', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('559', '55', '20', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('560', '55', '21', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('561', '55', '22', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('562', '55', '4', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('563', '55', '26', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('564', '55', '9', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('565', '55', '10', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('566', '55', '8', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('567', '55', '11', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('568', '55', '13', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('569', '55', '14', 'admin', '2017-08-22 16:13:46', null, null);
INSERT INTO `cc_role_resource` VALUES ('570', '52', '7', 'admin', '2017-08-22 16:13:59', null, null);
INSERT INTO `cc_role_resource` VALUES ('571', '52', '5', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('572', '52', '2', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('573', '52', '3', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('574', '52', '4', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('575', '52', '9', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('576', '52', '10', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('577', '52', '8', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('578', '52', '11', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('579', '52', '13', 'admin', '2017-08-22 16:14:00', null, null);
INSERT INTO `cc_role_resource` VALUES ('580', '52', '14', 'admin', '2017-08-22 16:14:00', null, null);

-- ----------------------------
-- Table structure for cc_sys_log
-- ----------------------------
DROP TABLE IF EXISTS `cc_sys_log`;
CREATE TABLE `cc_sys_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_title` varchar(20) DEFAULT NULL COMMENT '日志标题',
  `log_type` varchar(10) DEFAULT NULL COMMENT '日志类型 info error',
  `log_url` varchar(50) DEFAULT NULL COMMENT '日志请求url',
  `log_method` varchar(10) DEFAULT NULL COMMENT '请求方式 get post',
  `log_params` varchar(300) DEFAULT NULL COMMENT '请求参数',
  `log_exception` varchar(200) DEFAULT NULL COMMENT '请求异常',
  `log_user_name` varchar(50) DEFAULT NULL COMMENT '请求用户Id',
  `log_ip` varchar(20) DEFAULT NULL COMMENT '请求IP',
  `log_ip_address` varchar(40) DEFAULT NULL COMMENT '请求ip所在地',
  `log_start_time` datetime DEFAULT NULL COMMENT '请求开始时间',
  `log_elapsed_time` bigint(20) DEFAULT NULL COMMENT '请求耗时',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cc_sys_log
-- ----------------------------
INSERT INTO `cc_sys_log` VALUES ('1036', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"1Cn9Z\",\"username\":\"user_system\"}', null, 'user_system', '0:0:0:0:0:0:0:1', null, '2019-04-16 11:23:11', '213');
INSERT INTO `cc_sys_log` VALUES ('1037', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"yy89f\",\"username\":\"user_system\"}', null, 'user_system', '0:0:0:0:0:0:0:1', null, '2019-04-16 11:26:24', '31');
INSERT INTO `cc_sys_log` VALUES ('1038', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3xnbz\",\"username\":\"user_system\"}', null, 'user_system', '0:0:0:0:0:0:0:1', null, '2019-04-16 13:25:53', '78');
INSERT INTO `cc_sys_log` VALUES ('1039', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"zrvyx\",\"username\":\"user_system\"}', null, 'user_system', '0:0:0:0:0:0:0:1', null, '2019-04-16 13:34:14', '8');
INSERT INTO `cc_sys_log` VALUES ('1040', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"txjj2\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 13:42:25', '6');
INSERT INTO `cc_sys_log` VALUES ('1041', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"xdzqx\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:12:33', '34');
INSERT INTO `cc_sys_log` VALUES ('1042', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"9h2sv\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:15:41', '6');
INSERT INTO `cc_sys_log` VALUES ('1043', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"DTjiR\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:17:25', '32');
INSERT INTO `cc_sys_log` VALUES ('1044', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"2btme\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:22:22', '35');
INSERT INTO `cc_sys_log` VALUES ('1045', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"v6xxn\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:26:03', '13');
INSERT INTO `cc_sys_log` VALUES ('1046', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"be5nh\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:32:21', '46');
INSERT INTO `cc_sys_log` VALUES ('1047', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6emPr\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:39:20', '30');
INSERT INTO `cc_sys_log` VALUES ('1048', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"qjj9c\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 14:46:36', '34');
INSERT INTO `cc_sys_log` VALUES ('1049', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"o4a2x\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 15:33:12', '62');
INSERT INTO `cc_sys_log` VALUES ('1050', '用户登陆', 'info', '/content/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"fegbt\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 15:49:03', '61');
INSERT INTO `cc_sys_log` VALUES ('1051', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7fhtq\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 17:25:19', '17');
INSERT INTO `cc_sys_log` VALUES ('1052', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"sf6x4\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 17:37:27', '30');
INSERT INTO `cc_sys_log` VALUES ('1053', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"ju7aw\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-16 18:31:27', '56');
INSERT INTO `cc_sys_log` VALUES ('1054', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"4fkdv\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 09:41:39', '13');
INSERT INTO `cc_sys_log` VALUES ('1055', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"ldgf3\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 10:17:32', '34');
INSERT INTO `cc_sys_log` VALUES ('1056', '保存用户信息', 'info', '/user/ajax_save_user.do', 'POST', '{\"userStatus\":\"0\",\"userLoginName\":\"lian\",\"userName\":\"测试\",\"userId\":\"156\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 12:06:11', '17');
INSERT INTO `cc_sys_log` VALUES ('1057', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"j3vpr\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 14:40:38', '71');
INSERT INTO `cc_sys_log` VALUES ('1058', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"v4sw7\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 15:01:06', '61');
INSERT INTO `cc_sys_log` VALUES ('1059', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"cb21a\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 15:15:03', '60');
INSERT INTO `cc_sys_log` VALUES ('1060', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"47g1f\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 15:40:42', '55');
INSERT INTO `cc_sys_log` VALUES ('1061', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"4h2gs\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 15:56:37', '88');
INSERT INTO `cc_sys_log` VALUES ('1062', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"m8nrb\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 15:59:53', '56');
INSERT INTO `cc_sys_log` VALUES ('1063', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"qGpj8\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 16:02:17', '73');
INSERT INTO `cc_sys_log` VALUES ('1064', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"zpvzn\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 16:12:03', '66');
INSERT INTO `cc_sys_log` VALUES ('1065', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"HRe3s\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 16:32:18', '321');
INSERT INTO `cc_sys_log` VALUES ('1066', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"yfkn2\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 16:37:35', '78');
INSERT INTO `cc_sys_log` VALUES ('1067', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"sg15r\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 16:46:03', '70');
INSERT INTO `cc_sys_log` VALUES ('1068', '失效用户信息', 'info', '/user/ajax_user_fail.do', 'POST', '{\"userId\":\"156\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 16:52:12', '24');
INSERT INTO `cc_sys_log` VALUES ('1069', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"9zRBk\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 17:29:36', '110');
INSERT INTO `cc_sys_log` VALUES ('1070', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"qiayy\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 18:16:03', '71');
INSERT INTO `cc_sys_log` VALUES ('1071', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"eofyy\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 18:17:15', '86');
INSERT INTO `cc_sys_log` VALUES ('1072', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"ivpja\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 18:42:03', '121');
INSERT INTO `cc_sys_log` VALUES ('1073', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"2f787\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 18:44:08', '70');
INSERT INTO `cc_sys_log` VALUES ('1074', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"ykvq2\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 19:36:13', '64');
INSERT INTO `cc_sys_log` VALUES ('1075', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"fhaku\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 19:38:39', '89');
INSERT INTO `cc_sys_log` VALUES ('1076', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"sdyaw\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 19:39:58', '70');
INSERT INTO `cc_sys_log` VALUES ('1077', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"tu2mx\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 20:14:54', '9');
INSERT INTO `cc_sys_log` VALUES ('1078', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"jjqrj\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 20:53:52', '8');
INSERT INTO `cc_sys_log` VALUES ('1079', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"nelx4\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:12:17', '83');
INSERT INTO `cc_sys_log` VALUES ('1080', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"pcuki\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:15:17', '66');
INSERT INTO `cc_sys_log` VALUES ('1081', '失效用户信息', 'info', '/user/ajax_user_fail.do', 'POST', '{}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:23:30', '37');
INSERT INTO `cc_sys_log` VALUES ('1082', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"kmuon\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:24:49', '80');
INSERT INTO `cc_sys_log` VALUES ('1083', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"y2jnj\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:40:06', '112');
INSERT INTO `cc_sys_log` VALUES ('1084', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"mnnaw\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:48:46', '99');
INSERT INTO `cc_sys_log` VALUES ('1085', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"nbcl3\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:53:28', '78');
INSERT INTO `cc_sys_log` VALUES ('1086', '保存用户信息', 'info', '/user/ajax_save_user.do', 'POST', '{\"userStatus\":\"0\",\"userLoginName\":\"lian\",\"userName\":\"测试\",\"userId\":\"156\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:54:05', '16');
INSERT INTO `cc_sys_log` VALUES ('1087', '失效用户信息', 'info', '/user/ajax_user_fail.do', 'POST', '{\"userId\":\"156\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:54:09', '34');
INSERT INTO `cc_sys_log` VALUES ('1088', '保存用户信息', 'info', '/user/ajax_save_user.do', 'POST', '{\"userStatus\":\"0\",\"userLoginName\":\"lian\",\"userName\":\"测试\",\"userId\":\"156\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:58:44', '13');
INSERT INTO `cc_sys_log` VALUES ('1089', '失效用户信息', 'info', '/user/ajax_user_fail.do', 'POST', '{\"userId\":\"156\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-17 21:58:50', '17');
INSERT INTO `cc_sys_log` VALUES ('1090', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"fyfw7\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 09:37:54', '80');
INSERT INTO `cc_sys_log` VALUES ('1091', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"pbecn\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 09:40:25', '63');
INSERT INTO `cc_sys_log` VALUES ('1092', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"entjr\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 10:10:43', '88');
INSERT INTO `cc_sys_log` VALUES ('1093', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"op2e4\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 10:23:25', '69');
INSERT INTO `cc_sys_log` VALUES ('1094', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"aeusk\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 10:25:26', '82');
INSERT INTO `cc_sys_log` VALUES ('1095', '用户登陆', 'info', '/admin/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"zeji4\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 10:47:20', '318');
INSERT INTO `cc_sys_log` VALUES ('1096', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"Gyhzo\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 10:58:15', '13');
INSERT INTO `cc_sys_log` VALUES ('1097', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"u9kd7\",\"username\":\"admin\"}', null, 'admin', '192.168.10.20', null, '2019-04-18 11:14:55', '13');
INSERT INTO `cc_sys_log` VALUES ('1098', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"dkcxn\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 14:10:38', '67');
INSERT INTO `cc_sys_log` VALUES ('1099', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"G9kwu\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 15:13:02', '60');
INSERT INTO `cc_sys_log` VALUES ('1100', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"txvku\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 15:17:37', '8');
INSERT INTO `cc_sys_log` VALUES ('1101', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"wlveu\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 15:35:50', '67');
INSERT INTO `cc_sys_log` VALUES ('1102', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"s8pqt\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 15:52:46', '69');
INSERT INTO `cc_sys_log` VALUES ('1103', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"qohnr\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 15:55:28', '76');
INSERT INTO `cc_sys_log` VALUES ('1104', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"t1g6p\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 16:22:46', '85');
INSERT INTO `cc_sys_log` VALUES ('1105', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"8185\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 16:27:45', '66');
INSERT INTO `cc_sys_log` VALUES ('1106', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3551\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 17:08:11', '98');
INSERT INTO `cc_sys_log` VALUES ('1107', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7388\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 17:19:15', '108');
INSERT INTO `cc_sys_log` VALUES ('1108', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6180\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 17:22:16', '67');
INSERT INTO `cc_sys_log` VALUES ('1109', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3307\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-18 17:51:09', '76');
INSERT INTO `cc_sys_log` VALUES ('1110', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"5861\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 09:41:57', '72');
INSERT INTO `cc_sys_log` VALUES ('1111', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7183\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 10:24:16', '32');
INSERT INTO `cc_sys_log` VALUES ('1112', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"1736\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 11:03:14', '78');
INSERT INTO `cc_sys_log` VALUES ('1113', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3781\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 11:13:30', '16');
INSERT INTO `cc_sys_log` VALUES ('1114', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"0148\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 11:14:07', '9');
INSERT INTO `cc_sys_log` VALUES ('1115', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7863\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 11:21:31', '10');
INSERT INTO `cc_sys_log` VALUES ('1116', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"0608\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 11:27:02', '9');
INSERT INTO `cc_sys_log` VALUES ('1117', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"1470\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 13:18:55', '8');
INSERT INTO `cc_sys_log` VALUES ('1118', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"0218\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 13:32:17', '68');
INSERT INTO `cc_sys_log` VALUES ('1119', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"5881\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 14:39:23', '16');
INSERT INTO `cc_sys_log` VALUES ('1120', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3383\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 15:55:54', '41');
INSERT INTO `cc_sys_log` VALUES ('1121', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"0010\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 15:58:48', '40');
INSERT INTO `cc_sys_log` VALUES ('1122', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"2533\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 16:03:03', '40');
INSERT INTO `cc_sys_log` VALUES ('1123', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7518\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 16:06:28', '50');
INSERT INTO `cc_sys_log` VALUES ('1124', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"5416\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 16:42:26', '68');
INSERT INTO `cc_sys_log` VALUES ('1125', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"2326\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 16:47:58', '36');
INSERT INTO `cc_sys_log` VALUES ('1126', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"4686\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 16:50:13', '35');
INSERT INTO `cc_sys_log` VALUES ('1127', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3707\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 16:51:10', '39');
INSERT INTO `cc_sys_log` VALUES ('1128', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6788\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:24:30', '36');
INSERT INTO `cc_sys_log` VALUES ('1129', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6788\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:24:31', '8');
INSERT INTO `cc_sys_log` VALUES ('1130', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3530\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:26:08', '35');
INSERT INTO `cc_sys_log` VALUES ('1131', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7325\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:27:51', '38');
INSERT INTO `cc_sys_log` VALUES ('1132', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3623\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:39:38', '33');
INSERT INTO `cc_sys_log` VALUES ('1133', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"5118\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:41:36', '40');
INSERT INTO `cc_sys_log` VALUES ('1134', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"2852\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-19 17:45:32', '57');
INSERT INTO `cc_sys_log` VALUES ('1135', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"0007\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 09:38:40', '43');
INSERT INTO `cc_sys_log` VALUES ('1136', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"2135\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 10:23:41', '21');
INSERT INTO `cc_sys_log` VALUES ('1137', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"1637\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 13:40:39', '37');
INSERT INTO `cc_sys_log` VALUES ('1138', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3611\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 14:59:47', '232');
INSERT INTO `cc_sys_log` VALUES ('1139', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"8063\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 15:10:55', '7');
INSERT INTO `cc_sys_log` VALUES ('1140', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7154\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 15:38:41', '27');
INSERT INTO `cc_sys_log` VALUES ('1141', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"7235\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 15:39:35', '40');
INSERT INTO `cc_sys_log` VALUES ('1142', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6288\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 16:17:32', '38');
INSERT INTO `cc_sys_log` VALUES ('1143', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3284\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 17:08:47', '277');
INSERT INTO `cc_sys_log` VALUES ('1144', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3006\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-22 17:58:26', '217');
INSERT INTO `cc_sys_log` VALUES ('1145', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"0484\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-23 09:10:42', '315');
INSERT INTO `cc_sys_log` VALUES ('1146', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"1633\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-23 09:51:52', '72');
INSERT INTO `cc_sys_log` VALUES ('1147', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6373\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-23 09:53:05', '8');
INSERT INTO `cc_sys_log` VALUES ('1148', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"6443\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-23 09:58:40', '8');
INSERT INTO `cc_sys_log` VALUES ('1149', '用户登陆', 'info', '/loginCheck.do', 'POST', '{\"password\":\"\",\"code\":\"3845\",\"username\":\"admin\"}', null, 'admin', '0:0:0:0:0:0:0:1', null, '2019-04-23 10:34:47', '66');

-- ----------------------------
-- Table structure for cc_user
-- ----------------------------
DROP TABLE IF EXISTS `cc_user`;
CREATE TABLE `cc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login_name` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` bigint(20) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL,
  `modifier` varchar(50) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cc_user
-- ----------------------------
INSERT INTO `cc_user` VALUES ('8', 'admin', '超级管理员', '123456', '0', 'admin', '2017-08-22 14:30:53', 'admin', '2017-08-22 16:12:36');
INSERT INTO `cc_user` VALUES ('142', 'user_readonly', '只读用户', '123456', '0', 'admin', '2017-08-16 16:04:08', 'user_readonly', '2017-08-22 14:26:57');
INSERT INTO `cc_user` VALUES ('155', 'user_system', '系统管理员', '123456', '0', 'admin', '2017-08-22 14:30:53', 'user_system', '2017-08-22 16:12:36');
INSERT INTO `cc_user` VALUES ('156', 'lian', '测试', '123456', '1', 'admin', '2019-04-17 12:04:53', 'admin', '2019-04-17 21:58:50');

-- ----------------------------
-- Table structure for cc_user_role
-- ----------------------------
DROP TABLE IF EXISTS `cc_user_role`;
CREATE TABLE `cc_user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `creator` varchar(40) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `modifier` varchar(40) DEFAULT NULL,
  `modifier_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=507 DEFAULT CHARSET=utf8 COMMENT='用户和角色关系表';

-- ----------------------------
-- Records of cc_user_role
-- ----------------------------
INSERT INTO `cc_user_role` VALUES ('505', '142', '52', 'admin', '2017-08-22 14:39:28', null, null);
INSERT INTO `cc_user_role` VALUES ('506', '155', '55', 'admin', '2017-08-22 14:41:43', null, null);

-- ----------------------------
-- Table structure for tourist
-- ----------------------------
DROP TABLE IF EXISTS `tourist`;
CREATE TABLE `tourist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tourist
-- ----------------------------
INSERT INTO `tourist` VALUES ('1', 'lian', '123456');
