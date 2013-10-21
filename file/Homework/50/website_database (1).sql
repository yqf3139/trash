-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 09 月 10 日 12:07
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `website_database`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `administrator`
-- 

CREATE TABLE `administrator` (
  `administrator_id` int(11) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `password` char(32) NOT NULL default '0123456789',
  PRIMARY KEY  (`administrator_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- 导出表中的数据 `administrator`
-- 

INSERT INTO `administrator` VALUES (10, 'liangxch', '406121a7554dc4c1d76ccedb2b339d79');
INSERT INTO `administrator` VALUES (11, 'wsc1992111', '1b0558afddc1be7cde349f2c34850baa');
INSERT INTO `administrator` VALUES (12, 'coseradmin', '406121a7554dc4c1d76ccedb2b339d79');
INSERT INTO `administrator` VALUES (13, 'teachertest', '0ccd58d0618704c8b2b0592ab065968d');
INSERT INTO `administrator` VALUES (14, 'softtest', '8e500ee7640712f9e620530ed7353f70');
INSERT INTO `administrator` VALUES (15, 'test', 'a2dae73d16f305a49bb55dd75f8d69b4');

-- --------------------------------------------------------

-- 
-- 表的结构 `class`
-- 

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL auto_increment,
  `teacher_id` int(11) NOT NULL default '0',
  `course_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`class_id`),
  UNIQUE KEY `teacher_id_2` (`teacher_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- 
-- 导出表中的数据 `class`
-- 

INSERT INTO `class` VALUES (10, 3, 3);
INSERT INTO `class` VALUES (13, 3, 5);
INSERT INTO `class` VALUES (26, 3, 7);
INSERT INTO `class` VALUES (29, 3, 8);
INSERT INTO `class` VALUES (32, 3, 9);
INSERT INTO `class` VALUES (46, 14, 1);
INSERT INTO `class` VALUES (27, 4, 7);
INSERT INTO `class` VALUES (33, 4, 9);
INSERT INTO `class` VALUES (45, 5, 1);
INSERT INTO `class` VALUES (11, 5, 3);
INSERT INTO `class` VALUES (28, 5, 7);
INSERT INTO `class` VALUES (30, 6, 8);
INSERT INTO `class` VALUES (14, 7, 5);
INSERT INTO `class` VALUES (12, 8, 3);
INSERT INTO `class` VALUES (15, 8, 5);
INSERT INTO `class` VALUES (16, 9, 5);
INSERT INTO `class` VALUES (31, 9, 8);
INSERT INTO `class` VALUES (34, 11, 9);
INSERT INTO `class` VALUES (44, 4, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `course`
-- 

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `direction` varchar(50) default NULL,
  `description` varchar(5000) default NULL,
  `available` tinyint(1) NOT NULL default '0',
  `link` varchar(500) default NULL,
  `year` int(5) default '1',
  PRIMARY KEY  (`course_id`),
  UNIQUE KEY `coursename` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `course`
-- 

INSERT INTO `course` VALUES (1, '数据库', NULL, '<p>\r\n	数据库（Database）是按照数据结构来组织、存储和管理数据的仓库，它产生于距今五十年前，随着信息技术和市场的发展，特别是二十世纪九十年代以后，数据管理不再仅仅是存储和管理数据，而转变成用户所需要的各种数据管理的方式。数据库有很多种类型，从最简单的存储有各种数据的表格到能够进行海量数据存储的大型数据库系统都在各个方面得到了广泛的。</p>', 1, NULL, 2);
INSERT INTO `course` VALUES (3, 'Java', NULL, 'Java是一种可以撰写跨平台应用软件的面向对象的程序设计语言，是由Sun Microsystems公司于1995年5月推出的Java程序设计语言和Java平台（即JavaSE, JavaEE, JavaME）的总称。Java 技术具有卓越的通用性、高效性、平台移植性和安全性，广泛应用于个人PC、数据中心、游戏控制台、科学超级计算机、移动电话和互联网，同时拥有全球最大的开发者专业社群。在全球云计算和移动互联网的产业环境下，Java更具备了显著优势和广阔前景。', 1, NULL, 3);
INSERT INTO `course` VALUES (5, '网络工程', NULL, '网络工程是指按计划进行的网络综合性工作。本专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识，能运用所学知识与技能去分析和解决相关的实际问题，可在信息产业以及其他国民经济部门从事各类网络系统和计算机通信系统研究、教学、设计、开发等工作的高级科技人才。计算机网与通信网（包括有线、无线网络）的结合是本专业区别于其他高校网络工程专业的显著特色。', 1, NULL, 1);
INSERT INTO `course` VALUES (7, '软件测试', NULL, '<p>\r\n	测试用课程，完成及删除，测试成功</p>', 1, NULL, 2);
INSERT INTO `course` VALUES (8, '数据库原理', NULL, NULL, 1, NULL, 1);
INSERT INTO `course` VALUES (9, '软件工程', NULL, '测试', 1, NULL, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `courseselection`
-- 

CREATE TABLE `courseselection` (
  `courseselection_id` int(11) NOT NULL auto_increment,
  `student_id` int(11) default NULL,
  `class_id` int(11) default NULL,
  PRIMARY KEY  (`courseselection_id`),
  UNIQUE KEY `student_id_2` (`student_id`,`class_id`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `courseselection`
-- 

INSERT INTO `courseselection` VALUES (1, 71110124, 18);
INSERT INTO `courseselection` VALUES (2, 71110124, 39);

-- --------------------------------------------------------

-- 
-- 表的结构 `homework`
-- 

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `description` varchar(5000) default NULL,
  `file` varchar(100) default NULL,
  `score` int(11) unsigned NOT NULL default '0',
  `settime` datetime NOT NULL,
  `readtime` datetime default NULL,
  PRIMARY KEY  (`id`,`student_id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `homework`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `information`
-- 

CREATE TABLE `information` (
  `id` int(11) NOT NULL auto_increment,
  `settime` datetime NOT NULL default '0000-00-00 00:00:00',
  `promulgator` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(5000) default NULL,
  `link` varchar(500) default NULL,
  `course_id` int(11) default NULL,
  `type` int(5) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

-- 
-- 导出表中的数据 `information`
-- 

INSERT INTO `information` VALUES (1, '2013-05-08 12:16:54', '', '', '数据库系统授课||32||0;;数据库系统上机实验||2||10;;研讨||2||8;;1234||123||1;;', NULL, 1, 5);
INSERT INTO `information` VALUES (2, '0000-00-00 00:00:00', '1', '', './img/index/1.pjpeg', 'http://www.seu.edu.cn', NULL, 7);
INSERT INTO `information` VALUES (3, '0000-00-00 00:00:00', '2', '', './img/index/2.pjpeg', 'http://www.baidu.com', NULL, 7);
INSERT INTO `information` VALUES (4, '0000-00-00 00:00:00', '3', '', './img/index/3.pjpeg', 'http://www.google.com', NULL, 7);
INSERT INTO `information` VALUES (5, '0000-00-00 00:00:00', '4', '', './img/index/4.pjpeg', 'http://www.google.com', NULL, 7);
INSERT INTO `information` VALUES (6, '0000-00-00 00:00:00', '5', '', './img/index/5.jpeg', 'http://www.google.com.hk/', NULL, 7);
INSERT INTO `information` VALUES (8, '2013-05-08 12:48:49', '', '', NULL, NULL, 3, 5);
INSERT INTO `information` VALUES (10, '2013-05-08 12:50:13', '', '', NULL, NULL, 5, 5);
INSERT INTO `information` VALUES (11, '2013-05-09 07:16:48', '3', '测试消息', '<p>\r\n	测试内容如下：</p>\r\n<p>\r\n	&nbsp;</p>', NULL, 1, 4);
INSERT INTO `information` VALUES (12, '2013-05-08 01:02:13', '', '空资源——测试用', NULL, NULL, 1, 6);
INSERT INTO `information` VALUES (13, '2013-06-09 01:31:04', '', '测试通知', '<p>\r\n	测试信息：</p>', NULL, 5, 4);
INSERT INTO `information` VALUES (14, '2013-06-09 01:42:59', '', '通知测试', '', NULL, NULL, 1);
INSERT INTO `information` VALUES (19, '2013-06-13 01:51:00', '', '通知二', '', NULL, NULL, 1);
INSERT INTO `information` VALUES (45, '2013-06-11 01:06:57', '', '1234', NULL, NULL, 1, 6);
INSERT INTO `information` VALUES (49, '2013-06-11 01:49:45', '', 'aaaaa', NULL, NULL, 1, 6);
INSERT INTO `information` VALUES (50, '2013-06-11 01:54:24', '', 'aaaaa', NULL, NULL, 1, 6);
INSERT INTO `information` VALUES (51, '2013-06-11 02:01:23', '', 'aaaaa', NULL, NULL, 1, 6);
INSERT INTO `information` VALUES (52, '2013-06-11 02:04:10', '', 'aaaaa', '', '../file/1//博士信息.xls', 1, 6);
INSERT INTO `information` VALUES (53, '2013-06-11 02:06:32', '', 'aaaaa', '', '../file/1//博士信息.xls', 1, 6);
INSERT INTO `information` VALUES (54, '2013-06-11 02:07:38', '', 'aaaaa', '', '../file/1//博士信息.xls', 1, 6);
INSERT INTO `information` VALUES (55, '2013-06-11 02:08:27', '', 'aaaaa', '', '../file/1//博士信息.xls', 1, 6);
INSERT INTO `information` VALUES (56, '2013-06-11 02:11:24', '', 'aaaaa', '', '../file/1/resource/博士信息.xls', 1, 6);
INSERT INTO `information` VALUES (70, '2013-06-13 02:18:25', '', '', '111||4||2;;222||3||3;;', NULL, 7, 5);
INSERT INTO `information` VALUES (71, '2013-06-13 02:20:30', '', '测试通知一', '<p>\r\n	测试一下</p>', NULL, 7, 4);
INSERT INTO `information` VALUES (72, '2013-06-13 02:21:56', '', '测试1', '', '../file/7/resource/ceshiyong.pptx', 7, 6);
INSERT INTO `information` VALUES (73, '2013-06-13 02:22:12', '', '无资源', '', NULL, 7, 6);
INSERT INTO `information` VALUES (74, '2013-06-13 02:22:37', '', '无资源2', '', NULL, 7, 6);
INSERT INTO `information` VALUES (75, '2013-06-13 02:22:52', '', '加大', '', '../file/7/resource/wk xml.rar', 7, 6);
INSERT INTO `information` VALUES (76, '2013-06-14 02:32:03', '', '资源三', '', '../file/7/resource/ceshiyong.pptx', 7, 6);
INSERT INTO `information` VALUES (77, '2013-06-23 01:34:38', '', '', NULL, NULL, 8, 5);
INSERT INTO `information` VALUES (78, '2013-06-23 01:46:05', '', '测试消息四', '<p>\r\n	1243123213123</p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (91, '2013-06-24 02:13:56', '', '', NULL, NULL, 9, 5);
INSERT INTO `information` VALUES (92, '2013-06-24 02:47:00', '', '测试333', '', NULL, 7, 6);
INSERT INTO `information` VALUES (93, '2013-06-24 02:48:35', '', '测试53', '', '../file/7/resource/wk xml.rar', 7, 6);
INSERT INTO `information` VALUES (94, '2013-08-31 10:39:55', '', 'hehe', '<p>\r\n	<span style="font-size: 26px"><strong>asdfdsafsdaf</strong></span></p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (95, '0000-00-00 00:00:00', '', '', '', NULL, 1, 4);

-- --------------------------------------------------------

-- 
-- 表的结构 `recommend`
-- 

CREATE TABLE `recommend` (
  `id` int(11) NOT NULL auto_increment,
  `teacher_id` int(11) default NULL,
  `course_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `teacher` (`teacher_id`),
  UNIQUE KEY `course` (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- 
-- 导出表中的数据 `recommend`
-- 

INSERT INTO `recommend` VALUES (1, 11, NULL);
INSERT INTO `recommend` VALUES (4, 3, NULL);
INSERT INTO `recommend` VALUES (5, 4, NULL);
INSERT INTO `recommend` VALUES (6, 5, NULL);
INSERT INTO `recommend` VALUES (7, 6, NULL);
INSERT INTO `recommend` VALUES (8, 7, NULL);
INSERT INTO `recommend` VALUES (9, 9, NULL);
INSERT INTO `recommend` VALUES (10, 8, NULL);
INSERT INTO `recommend` VALUES (12, 1, NULL);
INSERT INTO `recommend` VALUES (13, NULL, 3);
INSERT INTO `recommend` VALUES (17, NULL, 1);
INSERT INTO `recommend` VALUES (21, NULL, 7);
INSERT INTO `recommend` VALUES (22, NULL, 8);

-- --------------------------------------------------------

-- 
-- 表的结构 `sethomework`
-- 

CREATE TABLE `sethomework` (
  `id` int(11) NOT NULL auto_increment,
  `settime` datetime NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(5000) default NULL,
  `link` varchar(500) default NULL,
  `deadline` date NOT NULL,
  `num` int(10) default NULL,
  PRIMARY KEY  (`id`),
  KEY `class_set` (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `sethomework`
-- 

INSERT INTO `sethomework` VALUES (2, '2013-06-06 07:43:39', 17, '大作业', '213123', '../file/Homework/17/十八大报告学习篇.doc', '2014-01-01', 2);
INSERT INTO `sethomework` VALUES (3, '2013-06-09 01:57:53', 18, '第一次作业', '测试本系统', '../file/Homework/18/zhou@163.com.jpeg', '2013-06-20', 1);
INSERT INTO `sethomework` VALUES (5, '2013-06-13 02:21:36', 26, '第一次作业', '测试作业', '../file/Homework/26/ceshiyong.pptx', '2013-06-20', 1);
INSERT INTO `sethomework` VALUES (6, '2013-08-31 02:04:10', 46, '123', '', NULL, '0000-00-00', 123);

-- --------------------------------------------------------

-- 
-- 表的结构 `student`
-- 

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` char(2) NOT NULL default '男',
  `password` char(32) default '000000',
  `description` varchar(500) default NULL,
  `available` tinyint(1) NOT NULL default '1',
  `type` tinyint(5) NOT NULL default '0',
  `settime` datetime NOT NULL,
  PRIMARY KEY  (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `student`
-- 

INSERT INTO `student` VALUES (71110124, '123', '男', '508f2fbfb81d4362c0681c2664621fb9', NULL, 1, 2, '2013-08-31 09:15:39');

-- --------------------------------------------------------

-- 
-- 表的结构 `teacher`
-- 

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `sex` char(2) NOT NULL default '男',
  `title` varchar(30) default NULL,
  `description` varchar(5000) default NULL,
  `picture` varchar(50) default NULL,
  `password` char(32) default NULL,
  `email` varchar(50) NOT NULL,
  `available` tinyint(1) NOT NULL default '1',
  `link` varchar(500) default NULL,
  `settime` datetime NOT NULL,
  PRIMARY KEY  (`teacher_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- 导出表中的数据 `teacher`
-- 

INSERT INTO `teacher` VALUES (1, 'teachert0', '男', '教授', NULL, '../../img/teacher/163163@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', '163163@163.com', 1, NULL, '2013-06-09 01:54:08');
INSERT INTO `teacher` VALUES (3, '赵找找', '男', '讲师', '213123123123', '../../img/teacher/zhao@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'zhao@seu.edu.cn', 1, NULL, '2013-06-23 02:05:17');
INSERT INTO `teacher` VALUES (4, '钱钱钱', '男', '副教授', NULL, '../../img/teacher/qian@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'qian@163.com', 1, NULL, '2013-05-08 12:43:20');
INSERT INTO `teacher` VALUES (5, '孙孙孙', '女', '讲师', NULL, '../../img/teacher/sun@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'sun@163.com', 1, NULL, '2013-05-08 12:43:49');
INSERT INTO `teacher` VALUES (6, '李莉莉', '女', '副教授', NULL, '../../img/teacher/li@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'li@163.com', 1, NULL, '2013-05-08 12:44:22');
INSERT INTO `teacher` VALUES (7, '周舟舟', '男', '教授', NULL, '../../img/teacher/zhou@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'zhou@163.com', 1, NULL, '2013-05-08 12:45:01');
INSERT INTO `teacher` VALUES (8, '吴呜呜', '男', '教授', NULL, '../../img/teacher/wu@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'wu@163.com', 1, NULL, '2013-05-08 12:45:26');
INSERT INTO `teacher` VALUES (9, '郑整整', '男', '副教授', NULL, '../../img/teacher/zheng@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'zheng@163.com', 1, NULL, '2013-05-08 12:45:58');
INSERT INTO `teacher` VALUES (10, '冯峰峰', '男', '副教授', NULL, '../../img/teacher/feng@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'feng@163.com', 1, NULL, '2013-05-09 06:56:46');
INSERT INTO `teacher` VALUES (11, '测试用教师', '男', '教授', NULL, '../../img/teacher/teachertest@seu.edu.cn.pjpeg', '0ccd58d0618704c8b2b0592ab065968d', 'teachertest@seu.edu.cn', 1, NULL, '2013-06-23 01:37:54');
INSERT INTO `teacher` VALUES (12, '测试员', '男', '副教授', NULL, '../../img/teacher/test@seu.edu.cn.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'test@seu.edu.cn', 1, NULL, '2013-06-24 02:36:59');
INSERT INTO `teacher` VALUES (13, '我', '男', '讲师', NULL, NULL, '9f22e17cbce67dc261cae1babcd6e324', '的', 1, NULL, '2013-06-26 06:04:13');
INSERT INTO `teacher` VALUES (14, 'hehehehe', '男', '讲师', NULL, '../../img/teacher/hehe@qq.com.pjpeg', 'e25a4fa6b2afedf37ea24be6627487b5', 'hehehehe@seu.edu.cn', 1, NULL, '2013-08-31 11:22:53');
