/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : stduent

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-27 16:20:43
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
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of std_admin
-- ----------------------------
INSERT INTO `std_admin` VALUES ('1', 'admin', 'admin');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学生表';

-- ----------------------------
-- Records of student
-- ----------------------------

-- ----------------------------
-- Table structure for `student_list`
-- ----------------------------
DROP TABLE IF EXISTS `student_list`;
CREATE TABLE `student_list` (
  `stud_list_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '报名课程id',
  `tea_list_id` int(11) DEFAULT NULL COMMENT '课程id',
  `tea_id` int(11) DEFAULT NULL COMMENT '教师id',
  PRIMARY KEY (`stud_list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学生课程表';

-- ----------------------------
-- Records of student_list
-- ----------------------------

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
  `reacher_pwd` char(32) DEFAULT NULL COMMENT '教师密码',
  PRIMARY KEY (`tea_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师表';

-- ----------------------------
-- Records of teacher
-- ----------------------------

-- ----------------------------
-- Table structure for `teacher_list`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_list`;
CREATE TABLE `teacher_list` (
  `tea_list_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `tea_id` int(11) DEFAULT NULL COMMENT '教师id',
  `list_user` char(50) DEFAULT NULL COMMENT '课程名称',
  PRIMARY KEY (`tea_list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师课程表';

-- ----------------------------
-- Records of teacher_list
-- ----------------------------

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
  PRIMARY KEY (`tea_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教师作业表';

-- ----------------------------
-- Records of teacher_task
-- ----------------------------