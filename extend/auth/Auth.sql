-- ----------------------------
-- tb_auth_user 管理员表
-- ----------------------------
DROP TABLE IF EXISTS `tb_auth_user`;
CREATE TABLE `tb_auth_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- tb_auth_rule 规则表
-- ----------------------------
DROP TABLE IF EXISTS `tb_auth_rule`;
CREATE TABLE `tb_auth_rule` (  
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  
    `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',  
    `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
    `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式',
    `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2停用',  
    PRIMARY KEY (`id`),  
    UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
-- ----------------------------
-- tb_auth_group 用户组表
-- ----------------------------
DROP TABLE IF EXISTS `tb_auth_group`;
CREATE TABLE `tb_auth_group` ( 
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
    `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
    `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id', 
    `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用2停用', 
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
-- ----------------------------
-- tb_auth_group_access 用户组明细表
-- ----------------------------
DROP TABLE IF EXISTS `tb_auth_group_access`;
CREATE TABLE `tb_auth_group_access` (  
    `uid` int(10) unsigned NOT NULL COMMENT '用户id',  
    `group_id` int(10) unsigned NOT NULL COMMENT '用户组id', 
    UNIQUE KEY `uid_group_id` (`uid`,`group_id`),  
    KEY `uid` (`uid`), 
    KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
