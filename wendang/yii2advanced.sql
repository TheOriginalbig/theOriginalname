/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-01 12:05:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `sc_user`;
CREATE TABLE `sc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `userpassword` varchar(255) NOT NULL COMMENT '加密密码',
  `password_salt` varchar(255) NOT NULL DEFAULT 'bhsj' COMMENT '加密密码',
  `class` varchar(32) NOT NULL COMMENT '班级',
  `phone` int(11) NOT NULL COMMENT '手机号',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `sex` int(1) NOT NULL COMMENT '性别: 1 男  2 女',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------

/*
 * 添加表字段 孙宜振 2010-8-7
 */
alter table sc_user add userclass varchar(20) not Null DEFAULT '';



/*
 * 角色表
 * 2018-08-01  
 */
DROP TABLE IF EXISTS `sc_role`;
CREATE TABLE `sc_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `roleName` varchar(10) DEFAULT NULL COMMENT '角色名称',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;


/*
 * 用户角色表
 * 2018-08-01
 */
DROP TABLE IF EXISTS `sc_user_role`;
CREATE TABLE `sc_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userID` int(11) DEFAULT NULL COMMENT '用户ID',
  `roleID` int(11) DEFAULT NULL COMMENT '角色ID',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;


/*
 * 权限表
 * 2018-08-01
 */
DROP TABLE IF EXISTS `sc_power`;
CREATE TABLE `sc_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `powerName` varchar(10) DEFAULT NULL COMMENT '权限名',
  `action` int(11) DEFAULT NULL COMMENT '权限路径',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;

/*
 * 角色权限表
 * 2018-08-01
 */
DROP TABLE IF EXISTS `sc_role_power`;
CREATE TABLE `sc_role_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `roleID` int(11) DEFAULT NULL COMMENT '角色ID',
  `powerID` int(11) DEFAULT NULL COMMENT '权限ID',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;

/*
 * 作业信息表
 * 2018-08-01
 */
DROP TABLE IF EXISTS `sc_task_info`;
CREATE TABLE `sc_task_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userID` int(11) DEFAULT NULL COMMENT '发布人ID，关联sc_user表',
  `content` varchar(255) DEFAULT NULL COMMENT '作业内容',
  `releaseTime` varchar(255) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;


/*
 * 分类表
 * 2018-08-16
 */
DROP TABLE IF EXISTS `sc_gory`;
CREATE TABLE `sc_gory` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `type` tinyint(1) DEFAULT NULL COMMENT '类型：1 课程  2 车辆  3 设备  4 工具',
  `goryName` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` varchar(255) DEFAULT '0' COMMENT '所属上级id',
  `createTime` varchar(255) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='分类表' CHARSET=utf8;


/*
 * 系统配置表
 * 2018-08-01
 */
DROP TABLE IF EXISTS `sc_system`;

CREATE TABLE `sc_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `type` tinyint(1) DEFAULT NULL COMMENT '类型：1 PC端  2 app端',
  `clType` varchar(255) DEFAULT NULL COMMENT '类型： 1 轮播图',
  `content` varchar(255) DEFAULT NULL COMMENT '发布时间',
  `createTime` varchar(255) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)  
)ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表' CHARSET=utf8;










