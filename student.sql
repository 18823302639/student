/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : student

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-04-11 19:03:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `parent`
-- ----------------------------
DROP TABLE IF EXISTS `parent`;
CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '家长id',
  `parent_sid` char(20) DEFAULT NULL COMMENT '家长身份证',
  `stud_id` int(11) DEFAULT NULL COMMENT '对应学生id',
  `parent_user` char(20) DEFAULT NULL COMMENT '用户名',
  `parent_pwd` char(32) DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='家长表';

-- ----------------------------
-- Records of parent
-- ----------------------------

-- ----------------------------
-- Table structure for `std_admin`
-- ----------------------------
DROP TABLE IF EXISTS `std_admin`;
CREATE TABLE `std_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` char(20) DEFAULT NULL,
  `admin_pwd` char(32) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '状态（0：禁用，1：启用）',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of std_admin
-- ----------------------------
INSERT INTO `std_admin` VALUES ('1', 'admin', 'admin', '1');
INSERT INTO `std_admin` VALUES ('2', '11', '111', '1');
INSERT INTO `std_admin` VALUES ('3', '肖轩', '123456', '1');
INSERT INTO `std_admin` VALUES ('4', '小轩', '111111', '1');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生id',
  `stud_sid` char(20) DEFAULT NULL COMMENT '学生身份证',
  `stud_user` char(20) DEFAULT NULL COMMENT '学生用户名',
  `stud_pwd` char(32) DEFAULT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='学生表';

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('2', '43052219970116444', '肖轩', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `student` VALUES ('3', '43052219970116445', '学生A', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `student` VALUES ('4', '43052219970116446', '学生B', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `student` VALUES ('5', '43052219970116447', '学生C', '96e79218965eb72c92a549dd5a330112');

-- ----------------------------
-- Table structure for `student_list`
-- ----------------------------
DROP TABLE IF EXISTS `student_list`;
CREATE TABLE `student_list` (
  `stud_list_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '报名课程id',
  `tea_list_id` int(11) DEFAULT NULL COMMENT '课程id',
  `stud_id` int(11) DEFAULT NULL COMMENT '学生id',
  PRIMARY KEY (`stud_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='学生课程表';

-- ----------------------------
-- Records of student_list
-- ----------------------------
INSERT INTO `student_list` VALUES ('5', '7', '2');
INSERT INTO `student_list` VALUES ('6', '8', '3');
INSERT INTO `student_list` VALUES ('7', '11', '4');
INSERT INTO `student_list` VALUES ('8', '12', '5');

-- ----------------------------
-- Table structure for `student_work`
-- ----------------------------
DROP TABLE IF EXISTS `student_work`;
CREATE TABLE `student_work` (
  `stud_work_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作业id',
  `stud_list_id` int(11) DEFAULT NULL COMMENT '报名课程id',
  `stud_whet` tinyint(4) DEFAULT '0' COMMENT '是否上传作业(0:未上传，1：已上传)',
  `stud_ans` tinyint(4) DEFAULT NULL COMMENT '是否查看答案(0:未查看，1：已查看)',
  `stud_mark` tinyint(4) DEFAULT NULL COMMENT '教师是否审批作业(0:未批阅，1：已批阅)',
  `stud_fraction` int(3) DEFAULT NULL COMMENT '作业分数',
  `stud_comment` varchar(250) DEFAULT NULL COMMENT '教师评语',
  PRIMARY KEY (`stud_work_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学生作业表';

-- ----------------------------
-- Records of student_work
-- ----------------------------

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '教师id',
  `tea_sid` char(20) DEFAULT NULL COMMENT '教师身份证',
  `teacher_user` char(20) DEFAULT NULL COMMENT '教师名称',
  `teacher_pwd` char(32) DEFAULT NULL COMMENT '教师密码',
  PRIMARY KEY (`tea_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='教师表';

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('10', '430522199701186418', '肖笑桃', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `teacher` VALUES ('9', '430522199701186417', '谭颖', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `teacher` VALUES ('8', '430522199701186416', '谭玲', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `teacher` VALUES ('6', '430522199701186415', '肖轩', 'bbad8d72c1fac1d081727158807a8798');
INSERT INTO `teacher` VALUES ('11', '430522199701186421', '111', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `teacher` VALUES ('12', '430522199701186422', '肖轩', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `teacher` VALUES ('13', '430522199701186423', '肖轩', '96e79218965eb72c92a549dd5a330112');

-- ----------------------------
-- Table structure for `teacher_list`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_list`;
CREATE TABLE `teacher_list` (
  `tea_list_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `tea_id` int(11) DEFAULT NULL COMMENT '教师id',
  `list_user` char(50) DEFAULT NULL COMMENT '课程名称',
  `list_time` datetime DEFAULT NULL COMMENT '课程时间',
  PRIMARY KEY (`tea_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='教师课程表';

-- ----------------------------
-- Records of teacher_list
-- ----------------------------
INSERT INTO `teacher_list` VALUES ('7', '9', '语文', '2019-04-01 10:00:00');
INSERT INTO `teacher_list` VALUES ('8', '10', '英语', '2019-04-02 01:00:00');
INSERT INTO `teacher_list` VALUES ('9', '10', '英语', '2019-04-09 14:40:00');
INSERT INTO `teacher_list` VALUES ('10', '9', '语文', '2019-04-10 18:45:00');
INSERT INTO `teacher_list` VALUES ('11', '8', '数学', '2019-04-09 17:45:00');
INSERT INTO `teacher_list` VALUES ('12', '6', '物理', '2019-04-19 13:45:00');
INSERT INTO `teacher_list` VALUES ('13', '2', null, null);
INSERT INTO `teacher_list` VALUES ('14', '2', null, null);

-- ----------------------------
-- Table structure for `teacher_task`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_task`;
CREATE TABLE `teacher_task` (
  `tea_task_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作业id',
  `tea_list_id` int(11) DEFAULT NULL COMMENT '课程id',
  `tea_id` int(11) DEFAULT NULL COMMENT '教师id',
  `tea_task_user` char(50) DEFAULT NULL COMMENT '作业名称',
  `tea_task_add` char(100) DEFAULT NULL COMMENT '作业路径',
  `tea_task_ans` char(100) DEFAULT NULL COMMENT '答案路径',
  `tea_ans_user` char(100) DEFAULT NULL COMMENT '作业名称',
  PRIMARY KEY (`tea_task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='教师作业表';

-- ----------------------------
-- Records of teacher_task
-- ----------------------------
INSERT INTO `teacher_task` VALUES ('49', '12', null, '网站搭建.docx', '20190410\\db6f845cf248bb9651d3e24a656e0a79.docx', '新建文本文档.bat', '20190409\\d640e18ff5e6b71b967ffe5e5d7ddb8d.bat');
INSERT INTO `teacher_task` VALUES ('52', '10', null, 'API数据接口.xlsx', '20190411\\ca6c939fd66a90191fdb8f6454defa15.xlsx', null, null);
INSERT INTO `teacher_task` VALUES ('51', '11', null, '附件2：单位明细.xlsx', '20190410\\c565d8b6307c0ec4a455fd46062c4880.xlsx', '网站搭建.docx', '20190410\\cd7b85ce421c237ffadfe32004ab38ad.docx');
INSERT INTO `teacher_task` VALUES ('53', '9', null, 'API数据接口.xlsx', '20190411\\f0411c93ca65b4216183d995f85d2aee.xlsx', null, null);
INSERT INTO `teacher_task` VALUES ('54', '8', null, 'flashFXP_v5.0注册码.txt', '20190411\\ef10aa807dd609f885cb5465620ef092.txt', null, null);
INSERT INTO `teacher_task` VALUES ('55', '7', null, 'flashFXP_v5.0注册码.txt', '20190411\\4848fb3333e1da4f04dde892b9bb383f.txt', null, null);

-- ----------------------------
-- Table structure for `think_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group`;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则","隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of think_auth_group
-- ----------------------------
INSERT INTO `think_auth_group` VALUES ('1', '超级管理员', '1', '');
INSERT INTO `think_auth_group` VALUES ('2', '普通管理员', '1', '');
INSERT INTO `think_auth_group` VALUES ('3', '教师组', '1', '');
INSERT INTO `think_auth_group` VALUES ('4', '学生组', '1', '');
INSERT INTO `think_auth_group` VALUES ('5', '家长组', '1', '');
INSERT INTO `think_auth_group` VALUES ('7', '测试', '1', '3,5,2,4,6');

-- ----------------------------
-- Table structure for `think_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of think_auth_group_access
-- ----------------------------
INSERT INTO `think_auth_group_access` VALUES ('2', '3');
INSERT INTO `think_auth_group_access` VALUES ('3', '1');
INSERT INTO `think_auth_group_access` VALUES ('4', '2');

-- ----------------------------
-- Table structure for `think_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_rule`;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `pid` mediumint(8) NOT NULL DEFAULT '0' COMMENT '父ID',
  `level` mediumint(5) NOT NULL DEFAULT '0' COMMENT '等级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of think_auth_rule
-- ----------------------------
INSERT INTO `think_auth_rule` VALUES ('1', 'course', '课程模块', '1', '', '0', '0');
INSERT INTO `think_auth_rule` VALUES ('2', 'student', '作业模块', '1', '', '0', '0');
INSERT INTO `think_auth_rule` VALUES ('3', 'cs', '授课教师', '1', '', '1', '1');
INSERT INTO `think_auth_rule` VALUES ('4', 'course/curr_list', '所有老师', '1', '', '2', '1');
INSERT INTO `think_auth_rule` VALUES ('5', 'course/list', '所有课程', '1', '', '1', '1');
INSERT INTO `think_auth_rule` VALUES ('6', 'css', '所有作业', '1', '', '2', '1');
INSERT INTO `think_auth_rule` VALUES ('7', 'csss', '作业', '1', '', '2', '1');
INSERT INTO `think_auth_rule` VALUES ('8', 'ga', '管理员管理', '1', '', '0', '0');
