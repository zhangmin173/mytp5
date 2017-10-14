/*
Navicat MySQL Data Transfer

Source Server         : loclahost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tp5

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-12 18:54:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` smallint(5) unsigned NOT NULL COMMENT '角色ID',
  `username` varchar(50) NOT NULL COMMENT '登陆用户名',
  `password` varchar(32) NOT NULL COMMENT '登陆密码',
  `name` varchar(20) NOT NULL COMMENT '真实姓名',
  `mobile` varchar(20) DEFAULT '' COMMENT '手机号码',
  `email` varchar(100) DEFAULT '' COMMENT '邮箱',
  `last_ip` varchar(15) DEFAULT '' COMMENT '最后登录的IP',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录的时间',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '该用户被添加的时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户更新的时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1启用2停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Table structure for tb_admin_node
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin_node`;
CREATE TABLE `tb_admin_node` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级菜单ID',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `url` varchar(255) DEFAULT '' COMMENT '菜单路径',
  `alias` varchar(20) DEFAULT '' COMMENT '菜单别名',
  `icon` varchar(20) DEFAULT '' COMMENT '菜单图标',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '菜单排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='管理后台菜单';

-- ----------------------------
-- Table structure for tb_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin_role`;
CREATE TABLE `tb_admin_role` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL COMMENT '角色名称',
  `resource` varchar(1024) DEFAULT NULL,
  `api` varchar(1024) DEFAULT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员角色';

-- ----------------------------
-- Table structure for tb_city
-- ----------------------------
DROP TABLE IF EXISTS `tb_city`;
CREATE TABLE `tb_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_file
-- ----------------------------
DROP TABLE IF EXISTS `tb_file`;
CREATE TABLE `tb_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_note
-- ----------------------------
DROP TABLE IF EXISTS `tb_note`;
CREATE TABLE `tb_note` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(100) NOT NULL,
  `headimg` varchar(255) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
