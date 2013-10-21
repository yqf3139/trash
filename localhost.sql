-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 10 月 13 日 12:30
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- 导出表中的数据 `administrator`
-- 

INSERT INTO `administrator` VALUES (1, 'teachertest', '0ccd58d0618704c8b2b0592ab065968d');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

-- 
-- 导出表中的数据 `class`
-- 

INSERT INTO `class` VALUES (27, 4, 7);
INSERT INTO `class` VALUES (11, 5, 3);
INSERT INTO `class` VALUES (28, 5, 7);
INSERT INTO `class` VALUES (30, 6, 8);
INSERT INTO `class` VALUES (14, 7, 5);
INSERT INTO `class` VALUES (12, 8, 3);
INSERT INTO `class` VALUES (15, 8, 5);
INSERT INTO `class` VALUES (16, 9, 5);
INSERT INTO `class` VALUES (31, 9, 8);
INSERT INTO `class` VALUES (45, 11111, 50);
INSERT INTO `class` VALUES (10, 123456, 3);
INSERT INTO `class` VALUES (13, 123456, 5);
INSERT INTO `class` VALUES (26, 123456, 7);
INSERT INTO `class` VALUES (29, 123456, 8);
INSERT INTO `class` VALUES (47, 123456, 50);
INSERT INTO `class` VALUES (68, 123456, 55);
INSERT INTO `class` VALUES (48, 123123123, 50);
INSERT INTO `class` VALUES (53, 123123123, 53);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

-- 
-- 导出表中的数据 `course`
-- 

INSERT INTO `course` VALUES (3, 'Java', NULL, '<p>\r\n	Java是一种可以撰写跨平台应用软件的面向对象的程序设计语言，是由Sun Microsystems公司于1995年5月推出的Java程序设计语言和Java平台（即JavaSE, JavaEE, JavaME）的总称。Java 技术具有卓越的通用性、高效性、平台移植性和安全性，广泛应用于个人PC、数据中心、游戏控制台、科学超级计算机、移动电话和互联网，同时拥有全球最大的开发者专业社群。在全球云计算和移动互联网的产业环境下，Java更具备了显著优势和广阔前景。</p>', 1, NULL, 3);
INSERT INTO `course` VALUES (5, '网络工程', NULL, '网络工程是指按计划进行的网络综合性工作。本专业培养掌握网络工程的基本理论与方法以及计算机技术和网络技术等方面的知识，能运用所学知识与技能去分析和解决相关的实际问题，可在信息产业以及其他国民经济部门从事各类网络系统和计算机通信系统研究、教学、设计、开发等工作的高级科技人才。计算机网与通信网（包括有线、无线网络）的结合是本专业区别于其他高校网络工程专业的显著特色。', 1, NULL, 1);
INSERT INTO `course` VALUES (7, '软件测试', NULL, '<p>\r\n	测试用课程，完成及删除，测试成功</p>', 1, NULL, 2);
INSERT INTO `course` VALUES (8, '数据库原理', NULL, NULL, 1, NULL, 1);
INSERT INTO `course` VALUES (11, '最终测试123', NULL, '啦啦啦啦啦213', 1, NULL, 2);
INSERT INTO `course` VALUES (50, 'aaab', 'shu', '<p>\r\n	jajajajaja</p>', 1, '', 2);
INSERT INTO `course` VALUES (53, 'test', NULL, '<p>\r\n	dad4</p>', 1, '', 2);
INSERT INTO `course` VALUES (55, 'c++', NULL, '<p>\r\n	123546</p>', 1, '', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- 导出表中的数据 `courseselection`
-- 

INSERT INTO `courseselection` VALUES (12, 71110105, 26);
INSERT INTO `courseselection` VALUES (13, 71110106, 26);
INSERT INTO `courseselection` VALUES (14, 71110107, 26);
INSERT INTO `courseselection` VALUES (15, 71110108, 26);
INSERT INTO `courseselection` VALUES (16, 71110109, 26);
INSERT INTO `courseselection` VALUES (17, 71110110, 26);
INSERT INTO `courseselection` VALUES (18, 71110111, 26);
INSERT INTO `courseselection` VALUES (19, 71110112, 26);
INSERT INTO `courseselection` VALUES (20, 71110113, 26);
INSERT INTO `courseselection` VALUES (21, 71110114, 26);
INSERT INTO `courseselection` VALUES (22, 71110115, 26);
INSERT INTO `courseselection` VALUES (8, 71110128, 47);
INSERT INTO `courseselection` VALUES (9, 71111111, 53);
INSERT INTO `courseselection` VALUES (24, 71111111, 68);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `homework`
-- 

INSERT INTO `homework` VALUES (16, 71110128, NULL, '../file/Homework/47/16/3.pjpeg', 0, '2013-10-05 07:02:05', NULL);
INSERT INTO `homework` VALUES (25, 71111111, 'fasdax', '../file/Homework/53/25/1.png', 30, '2013-10-10 01:03:02', '2013-10-10 02:33:19');
INSERT INTO `homework` VALUES (28, 71111111, NULL, '../file/Homework/68/28/新建 Microsoft Office Excel 工作表.xlsx', 99, '2013-10-13 12:15:50', '2013-10-13 12:16:47');
INSERT INTO `homework` VALUES (30, 71111111, NULL, '../file/Homework/68/30/teacher_homework.php', 0, '2013-10-13 12:16:08', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

-- 
-- 导出表中的数据 `information`
-- 

INSERT INTO `information` VALUES (2, '0000-00-00 00:00:00', '1', '', './img/index/1.png', 'http://www.baidu.com', NULL, 7);
INSERT INTO `information` VALUES (3, '0000-00-00 00:00:00', '2', '', './img/index/2.jpeg', 'http://www.baidu.com/', NULL, 7);
INSERT INTO `information` VALUES (4, '0000-00-00 00:00:00', '3', '', './img/index/3.jpeg', 'http://www.baidu.com/', NULL, 7);
INSERT INTO `information` VALUES (5, '0000-00-00 00:00:00', '4', '', './img/index/4.png', 'http://www.seu.edu.cn', NULL, 7);
INSERT INTO `information` VALUES (6, '0000-00-00 00:00:00', '5', '', './img/index/5.jpeg', 'http://www.google.com.hk/', NULL, 7);
INSERT INTO `information` VALUES (8, '2013-05-08 12:48:49', '', '', '||||;;', NULL, 3, 5);
INSERT INTO `information` VALUES (10, '2013-05-08 12:50:13', '', '', NULL, NULL, 5, 5);
INSERT INTO `information` VALUES (13, '2013-06-09 01:31:04', '', '测试通知', '<p>\r\n	测试信息：</p>', NULL, 5, 4);
INSERT INTO `information` VALUES (14, '2013-09-30 01:10:52', '', '通知测试', '<p>\r\n	<font class="Apple-style-span" face="''courier new'', courier, monospace"><b>发个梵蒂冈梵蒂冈发的</b></font></p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (19, '2013-06-13 01:51:00', '', '通知二', '', NULL, NULL, 1);
INSERT INTO `information` VALUES (70, '2013-06-13 02:18:25', '', '', '111||4||2;;222||3||3;;', NULL, 7, 5);
INSERT INTO `information` VALUES (71, '2013-06-13 02:20:30', '', '测试通知一', '<p>\r\n	测试一下</p>', NULL, 7, 4);
INSERT INTO `information` VALUES (72, '2013-06-13 02:21:56', '', '测试1', '', '../file/7/resource/ceshiyong.pptx', 7, 6);
INSERT INTO `information` VALUES (73, '2013-06-13 02:22:12', '', '无资源', '', NULL, 7, 6);
INSERT INTO `information` VALUES (74, '2013-06-13 02:22:37', '', '无资源2', '', NULL, 7, 6);
INSERT INTO `information` VALUES (75, '2013-06-13 02:22:52', '', '加大', '', '../file/7/resource/wk xml.rar', 7, 6);
INSERT INTO `information` VALUES (76, '2013-06-14 02:32:03', '', '资源三', '', '../file/7/resource/ceshiyong.pptx', 7, 6);
INSERT INTO `information` VALUES (77, '2013-06-23 01:34:38', '', '', '||||;;', NULL, 8, 5);
INSERT INTO `information` VALUES (78, '2013-09-30 01:06:49', '', '测试消息四', '<p>\r\n	<span style="font-size:72px;">1243123213123</span></p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (92, '2013-06-24 02:47:00', '', '测试333', '', NULL, 7, 6);
INSERT INTO `information` VALUES (93, '2013-06-24 02:48:35', '', '测试53', '', '../file/7/resource/wk xml.rar', 7, 6);
INSERT INTO `information` VALUES (95, '2013-09-29 06:53:05', '', '', NULL, NULL, 11, 5);
INSERT INTO `information` VALUES (108, '2013-09-29 08:06:16', '', '12345', '<p>\r\n	123123123</p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (109, '2013-09-29 08:27:47', '', '123124124', '<p>\r\n	123</p>\r\n<p>\r\n	123</p>\r\n<p>\r\n	123</p>\r\n<p>\r\n	1231124124123</p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (139, '2013-09-29 11:51:22', '', '123', '<p>\r\n	123123123&nbsp;</p>\r\n<p>\r\n	123123 123</p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (140, '2013-09-30 01:08:33', '', '123', '<p>\r\n	<span style="font-size: 72px"><span style="font-size: 48px">阿达撒</span>发大水发大水</span></p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (141, '2013-09-30 01:09:01', '', 'test1', '<p>\r\n	<span style="font-size: 72px">asdfdsf </span></p>', NULL, NULL, 1);
INSERT INTO `information` VALUES (146, '0000-00-00 00:00:00', '', '', '', NULL, 3, 6);
INSERT INTO `information` VALUES (147, '2013-10-02 01:13:12', '', '', '123||||;;1234||||;;||||;;', NULL, 50, 5);
INSERT INTO `information` VALUES (148, '2013-10-02 01:27:12', '', 'lll', '<p>\r\n	caca</p>', '../file/50/notice/close.png', 50, 4);
INSERT INTO `information` VALUES (149, '2013-10-02 01:34:00', '', 'work', '', '../file/50/resource/output_log.txt', 50, 6);
INSERT INTO `information` VALUES (150, '2013-10-02 01:44:58', '', 'huawei', '<p>\r\n	huawei</p>', '../file/center_notice/ScreenSelector.bmp', NULL, 1);
INSERT INTO `information` VALUES (151, '2013-10-02 02:21:27', '', 'adad', '<p>\r\n	wqferf</p>', NULL, 50, 4);
INSERT INTO `information` VALUES (153, '0000-00-00 00:00:00', '', '', '', NULL, 50, 6);
INSERT INTO `information` VALUES (155, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (156, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (157, '2013-10-02 02:57:04', '', '123213', '', NULL, 3, 4);
INSERT INTO `information` VALUES (158, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (159, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (160, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (161, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (162, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (163, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (164, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (165, '0000-00-00 00:00:00', '', '', '', NULL, 3, 4);
INSERT INTO `information` VALUES (166, '0000-00-00 00:00:00', '', '', '', NULL, 50, 6);
INSERT INTO `information` VALUES (170, '2013-10-04 07:41:41', '', '123', '', NULL, 8, 4);
INSERT INTO `information` VALUES (171, '2013-10-05 07:00:47', '', '123', '', '../file/50/resource/5.jpeg', 50, 6);
INSERT INTO `information` VALUES (173, '2013-10-10 12:54:58', '', '', '254||5||10;;33||58||97;;', NULL, 53, 5);
INSERT INTO `information` VALUES (174, '2013-10-10 12:59:51', '', '15', '<p>\r\n	646546</p>', NULL, 53, 4);
INSERT INTO `information` VALUES (175, '2013-10-10 01:01:54', '', '64', '', '../file/53/resource/4.png', 53, 6);
INSERT INTO `information` VALUES (177, '2013-10-13 12:04:03', '', '', NULL, NULL, 55, 5);
INSERT INTO `information` VALUES (178, '2013-10-13 12:12:45', '', '1234', '<p>\r\n	513146</p>', NULL, 55, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- 
-- 导出表中的数据 `recommend`
-- 

INSERT INTO `recommend` VALUES (1, 11, NULL);
INSERT INTO `recommend` VALUES (4, 123456, NULL);
INSERT INTO `recommend` VALUES (5, 11111, NULL);
INSERT INTO `recommend` VALUES (6, 5, NULL);
INSERT INTO `recommend` VALUES (7, 4, NULL);
INSERT INTO `recommend` VALUES (8, 7, NULL);
INSERT INTO `recommend` VALUES (9, 9, NULL);
INSERT INTO `recommend` VALUES (10, 8, NULL);
INSERT INTO `recommend` VALUES (12, 6, NULL);
INSERT INTO `recommend` VALUES (70, NULL, 7);
INSERT INTO `recommend` VALUES (74, NULL, 3);
INSERT INTO `recommend` VALUES (75, NULL, 5);
INSERT INTO `recommend` VALUES (78, NULL, 50);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- 导出表中的数据 `sethomework`
-- 

INSERT INTO `sethomework` VALUES (5, '2013-06-13 02:21:36', 26, '第一次作业', '测试作业', '../file/Homework/26/ceshiyong.pptx', '2013-06-20', 1);
INSERT INTO `sethomework` VALUES (12, '2013-09-30 02:10:22', 10, '123', '', NULL, '0000-00-00', NULL);
INSERT INTO `sethomework` VALUES (15, '2013-10-02 01:38:46', 48, 'adada', 'dad', '../file/Homework/48/output_log.txt', '2013-12-12', 1);
INSERT INTO `sethomework` VALUES (16, '2013-10-02 01:59:39', 47, '1234', '', NULL, '0000-00-00', NULL);
INSERT INTO `sethomework` VALUES (17, '2013-10-02 02:02:47', 47, '12', '', NULL, '0000-00-00', 213);
INSERT INTO `sethomework` VALUES (22, '2013-10-03 04:38:25', 47, '', '', NULL, '0000-00-00', NULL);
INSERT INTO `sethomework` VALUES (24, '2013-10-04 07:41:58', 29, '123', '', NULL, '0000-00-00', 12421);
INSERT INTO `sethomework` VALUES (25, '2013-10-10 01:01:04', 53, '6487', '', '../file/Homework/53/5.jpeg', '2013-10-01', 4157);
INSERT INTO `sethomework` VALUES (26, '2013-10-10 02:24:42', 53, '32544', '', NULL, '2014-01-01', 787);
INSERT INTO `sethomework` VALUES (28, '2013-10-13 12:10:36', 68, '123456', '', '../file/Homework/68/teacher_homework.php', '2014-12-01', 1);
INSERT INTO `sethomework` VALUES (30, '2013-10-13 12:11:56', 68, '123', '', '../file/Homework/68/grade.php', '2014-01-01', 12);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `student`
-- 

INSERT INTO `student` VALUES (0, 'cbn', '男', '4fa0a91521dab83e7d782292901b0da4', NULL, 1, 1, '2013-09-30 01:45:43');
INSERT INTO `student` VALUES (71110105, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:15');
INSERT INTO `student` VALUES (71110106, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:15');
INSERT INTO `student` VALUES (71110107, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110108, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110109, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110110, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110111, 'teachertest', '男', '0ccd58d0618704c8b2b0592ab065968d', NULL, 1, 1, '2013-10-04 06:30:54');
INSERT INTO `student` VALUES (71110112, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110113, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110114, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110115, '', '男', '9d62ec2f7f1d23ca956611d3fa091c84', NULL, 1, 0, '2013-10-10 01:16:16');
INSERT INTO `student` VALUES (71110128, 'zwb', '男', '9f22e17cbce67dc261cae1babcd6e324', NULL, 1, 1, '2013-10-03 05:50:04');
INSERT INTO `student` VALUES (71111111, '123456', '男', '9f22e17cbce67dc261cae1babcd6e324', NULL, 1, 1, '2013-10-10 01:04:02');

-- --------------------------------------------------------

-- 
-- 表的结构 `teacher`
-- 

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `teacher`
-- 

INSERT INTO `teacher` VALUES (1, 'teachert0', '男', '教授', NULL, '../../img/teacher/163163@163.com.jpeg', '929028634ce219300af0bfb7d21507e6', '163163@163.com', 1, NULL, '2013-09-28 08:53:46');
INSERT INTO `teacher` VALUES (4, '钱钱钱', '男', '副教授', NULL, '../../img/teacher/qian@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'qian@163.com', 1, NULL, '2013-05-08 12:43:20');
INSERT INTO `teacher` VALUES (5, '孙孙孙', '女', '讲师', NULL, '../../img/teacher/sun@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'sun@163.com', 1, NULL, '2013-05-08 12:43:49');
INSERT INTO `teacher` VALUES (6, '李莉莉', '女', '副教授', NULL, '../../img/teacher/li@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'li@163.com', 1, NULL, '2013-05-08 12:44:22');
INSERT INTO `teacher` VALUES (7, '周舟舟', '男', '教授', NULL, '../../img/teacher/zhou@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'zhou@163.com', 1, NULL, '2013-05-08 12:45:01');
INSERT INTO `teacher` VALUES (8, '吴呜呜', '男', '教授', NULL, '../../img/teacher/wu@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'wu@163.com', 1, NULL, '2013-05-08 12:45:26');
INSERT INTO `teacher` VALUES (9, '郑整整', '男', '副教授', NULL, '../../img/teacher/zheng@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'zheng@163.com', 1, NULL, '2013-05-08 12:45:58');
INSERT INTO `teacher` VALUES (10, '冯峰峰', '男', '副教授', NULL, '../../img/teacher/feng@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'feng@163.com', 1, NULL, '2013-05-09 06:56:46');
INSERT INTO `teacher` VALUES (11, '测试用教师', '男', '教授', NULL, '../../img/teacher/teachertest@seu.edu.cn.pjpeg', '0ccd58d0618704c8b2b0592ab065968d', 'teachertest@seu.edu.cn', 1, NULL, '2013-06-23 01:37:54');
INSERT INTO `teacher` VALUES (12, '测试员', '男', '副教授', NULL, '../../img/teacher/test@seu.edu.cn.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'test@seu.edu.cn', 1, NULL, '2013-06-24 02:36:59');
INSERT INTO `teacher` VALUES (11111, '拉拉练', '男', '讲师', NULL, '../../img/teacher/liang@seu.edu.cn.x-png', 'ca583af4b36f0bb1e34e8e03f745210c', 'liang@seu.edu.cn', 1, NULL, '2013-10-02 01:12:52');
INSERT INTO `teacher` VALUES (123456, '赵找找', '男', '讲师', '213123123123', '../../img/teacher/zhao@163.com.jpeg', '9f22e17cbce67dc261cae1babcd6e324', 'zhao@seu.edu.cn', 1, NULL, '2013-10-05 02:59:57');
INSERT INTO `teacher` VALUES (1234567, '123123', '男', '讲师', NULL, NULL, '123456', '213102222@email.com', 1, NULL, '2013-10-13 12:08:37');
INSERT INTO `teacher` VALUES (123123123, 'lllll', '男', '讲师', NULL, NULL, '9f22e17cbce67dc261cae1babcd6e324', '123Qqq.com', 1, NULL, '2013-10-10 12:59:38');

-- 
-- 限制导出的表
-- 

-- 
-- 限制表 `class`
-- 
ALTER TABLE `class`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- 限制表 `courseselection`
-- 
ALTER TABLE `courseselection`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- 限制表 `homework`
-- 
ALTER TABLE `homework`
  ADD CONSTRAINT `homework_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sethomework` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homework_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- 限制表 `information`
-- 
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- 限制表 `recommend`
-- 
ALTER TABLE `recommend`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- 限制表 `sethomework`
-- 
ALTER TABLE `sethomework`
  ADD CONSTRAINT `class_set` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
