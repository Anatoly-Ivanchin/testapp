/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : testapp

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2016-01-15 19:33:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authors`
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `middlename` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('1', 'Федор', 'Достаевский ', 'Михайлович');
INSERT INTO `authors` VALUES ('2', 'Эрих', 'Ремарк', 'Мария');
INSERT INTO `authors` VALUES ('3', 'Фридрих', 'Ницше', 'Вильгельм');
INSERT INTO `authors` VALUES ('4', 'Михаил', 'Булгаков', 'Афанасьевич');
INSERT INTO `authors` VALUES ('5', 'Харуки', 'Мураками', '');

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booksauthor` (`author_id`),
  CONSTRAINT `booksauthor` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('5', 'Иван Васильевич', '2008-01-19', '2016-01-15 18:59:49', '2016-01-15 18:59:49', 'main_page_mo_1.jpg', '4');
INSERT INTO `books` VALUES ('7', 'Антихрист', '2006-01-04', '2016-01-15 19:24:22', '2016-01-15 19:24:22', 'Chrysanthemum.jpg', '3');
INSERT INTO `books` VALUES ('8', 'Преступление и наказание', '2006-01-20', '2016-01-15 19:31:23', '2016-01-15 19:31:23', '8C1BE9D5-B75B-4A8F-B831-213D3D32FEAC.jpg', '1');

-- ----------------------------
-- Table structure for `tmp_uploads`
-- ----------------------------
DROP TABLE IF EXISTS `tmp_uploads`;
CREATE TABLE `tmp_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `key` varchar(125) NOT NULL,
  `fileName` varchar(512) NOT NULL,
  `hasError` char(1) DEFAULT NULL,
  `errorMsg` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1166 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records of tmp_uploads
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(32) DEFAULT NULL,
  `firstName` varchar(128) DEFAULT NULL,
  `lastName` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `phone` char(11) DEFAULT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '0',
  `bDate` date DEFAULT NULL,
  `regDate` datetime NOT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `profile` text,
  `activated` char(1) NOT NULL DEFAULT '0',
  `activationKey` varchar(32) DEFAULT NULL,
  `ava` varchar(256) DEFAULT NULL,
  `ava_full` varchar(256) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=400 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('41', '46f94c8de14fb36680850768ff1b7f2a', 'Анатолий', 'Иванчин', 'van4in@gmail.com', '', '2', '1987-02-02', '2014-01-26 11:08:29', 'Пенза', 'Россия', '', '1', null, 'http://cs413021.vk.me/v413021996/760b/NtLOUKzR-pc.jpg', 'http://cs413021.vk.me/v413021996/7607/-aUxiilpOwY.jpg', '3');
INSERT INTO `user` VALUES ('42', '46f94c8de14fb36680850768ff1b7f2a', null, null, 'fluid@gmail.com', null, '0', null, '2014-05-16 11:34:35', null, null, null, '', '6771469f1495d1f9aadb7c477998b192', null, null, '1');
INSERT INTO `user` VALUES ('43', null, 'Bela', 'Temirkanova', 'btemirkanova@mail.ru', null, '1', '0000-00-00', '2015-08-03 19:10:10', null, null, null, '1', null, 'http://graph.facebook.com/889122731165495/picture?type=square', 'http://graph.facebook.com/889122731165495/picture?type=large', '1');
INSERT INTO `user` VALUES ('44', '46f94c8de14fb36680850768ff1b7f2a', 'Иван', 'Петров', 'aivanchin@gmcs.ru', '84956464666', '2', '1983-12-02', '2015-08-06 11:23:33', 'Волгоград', 'Россия', '', '1', '', null, null, '1');
INSERT INTO `user` VALUES ('45', null, 'Алексей', 'Устинов', 'shadowmail2005@gmail.com', null, '2', '0000-00-00', '2015-08-06 13:44:50', null, null, null, '1', null, 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=100', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2');
INSERT INTO `user` VALUES ('46', null, 'alexander.a.gruzdev@gmail.com', null, 'alexander.a.gruzdev@gmail.com', null, '0', '0000-00-00', '2015-08-06 13:45:23', null, null, null, '1', null, 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=100', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '1');
INSERT INTO `user` VALUES ('47', null, 'Ilya', 'Penkov', 'i.job.penkov@gmail.com', null, '2', '0000-00-00', '2015-08-06 13:45:39', null, null, null, '1', null, 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=100', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2');
INSERT INTO `user` VALUES ('48', '25f9e794323b453885f5181f1b624d0b', null, null, 'dvasiliev@gmcs.ru', null, '0', null, '2015-08-06 13:45:45', null, null, null, '1', '', '/upload/image/avatars/dv.jpg', '/upload/image/avatars/dv.jpg', '1');
INSERT INTO `user` VALUES ('49', null, 'Виталий', 'Чемякин', 'chemsad@yandex.ru', null, '2', '1989-02-24', '2015-08-06 13:45:46', 'Пенза', 'Россия', null, '1', null, 'http://cs11356.vk.me/u6820604/e_ef8eab6f.jpg', 'https://pp.vk.me/c309425/v309425604/19b1/H6ok4FotppE.jpg', '1');
INSERT INTO `user` VALUES ('50', '24c9e15e52afc47c225b757e7bee1f9d', '1', 'USER', 'user1@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('51', '7e58d63b60197ceb55a1c487989a3720', '2', 'USER', 'user2@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('52', '92877af70a45fd6a2ed7fe81e1236b78', '3', 'USER', 'user3@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('53', '3f02ebe3d7929b091e3d8ccfde2f3bc6', '4', 'USER', 'user4@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('54', '0a791842f52a0acfbb3a783378c066b8', '5', 'USER', 'user5@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('55', 'affec3b64cf90492377a8114c86fc093', '6', 'USER', 'user6@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('56', '3e0469fb134991f8f75a2760e409c6ed', '7', 'USER', 'user7@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('57', '7668f673d5669995175ef91b5d171945', '8', 'USER', 'user8@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('58', '8808a13b854c2563da1a5f6cb2130868', '9', 'USER', 'user9@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('59', '990d67a9f94696b1abe2dccf06900322', '10', 'USER', 'user10@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('60', '03aa1a0b0375b0461c1b8f35b234e67a', '11', 'USER', 'user11@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('61', 'd781eaae8248db6ce1a7b82e58e60435', '12', 'USER', 'user12@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('62', 'd09979d794a6ee60d836f884739f7196', '13', 'USER', 'user13@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('63', 'ef06d5cbf35386ff2203d186eeff7923', '14', 'USER', 'user14@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('64', '726dedc0d6788b05f486730edcc0e871', '15', 'USER', 'user15@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('65', '8a62f0beaa5ae938956f5ea290321336', '16', 'USER', 'user16@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('66', '2b4233ebec7a45e1fb8ddd1aab794f7b', '17', 'USER', 'user17@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('67', '7ac18a1893e1d2bd5b46958ce1d2a8d0', '18', 'USER', 'user18@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('68', '2baab43f784b5b530b5347a50490bb0a', '19', 'USER', 'user19@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('69', '10880c7f4e4209eeda79711e1ea1723e', '20', 'USER', 'user20@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('70', '2e129db15b6d6db5342ba5d328642262', '21', 'USER', 'user21@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('71', '87dc1e131a1369fdf8f1c824a6a62dff', '22', 'USER', 'user22@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('72', '00a65dd47e842bcc3d82a296301071fb', '23', 'USER', 'user23@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('73', '5e6c9b24829588e0ac8f7d8074a4bfd4', '24', 'USER', 'user24@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('74', '0f8f84c18bfd5244ed976f63924a8a0e', '25', 'USER', 'user25@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('75', 'a507ac920f797876259f3c91f5cdef99', '26', 'USER', 'user26@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('76', '078d079e6146dec4dbf2135a8e513e2e', '27', 'USER', 'user27@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('77', 'b6f7fac0074f6508e5a4540ad89b55c0', '28', 'USER', 'user28@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('78', '244fd63d0adbf673130fce2f222078a5', '29', 'USER', 'user29@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('79', '40b13b85e6e4fc9c4a6f24379db20a39', '30', 'USER', 'user30@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('80', '0c673c53a29acb19c7e55b292d259e4d', '31', 'USER', 'user31@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('81', 'd21dbd2c4e178b2cb55dce0c6a43effc', '32', 'USER', 'user32@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('82', 'c6f273ac241a04216e0a703c18c36532', '33', 'USER', 'user33@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('83', '9ece8c4020f8aed10676cd1c56a41889', '34', 'USER', 'user34@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('84', '8cd5a487792e95045574fe205e4efdf9', '35', 'USER', 'user35@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('85', '41a2abe109f243e12e72133cf46ea5db', '36', 'USER', 'user36@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('86', '657bc81a9e2fba4293ed712d02a82191', '37', 'USER', 'user37@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('87', 'e6f3956464556eb0f7e310ccfaebe1d1', '38', 'USER', 'user38@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('88', '89a0afa8bca03ba74e75fe1e36d1a431', '39', 'USER', 'user39@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('89', '3695b09d29f3d88d21ad2bbfc230edae', '40', 'USER', 'user40@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('90', 'bb534b6741a863fd098b8ea0a709d680', '41', 'USER', 'user41@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('91', 'fd8689cb80113b68be586d8b5a6aa06a', '42', 'USER', 'user42@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('92', 'f0b3b7623d3bedf898459673d778319e', '43', 'USER', 'user43@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('93', '93b1ad3cfaeb254ea3c68ee7ea23c582', '44', 'USER', 'user44@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('94', 'ff0aa5febff01840387a57bf41db361d', '45', 'USER', 'user45@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('95', 'e02181454edbd5c9103b73061e58cd9c', '46', 'USER', 'user46@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('96', 'cd654cbb5fea850adf5a28ef7a6e2994', '47', 'USER', 'user47@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('97', '92007d4feb0c68600f6ea3423d65dea0', '48', 'USER', 'user48@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('98', '923b25d9d294c98405bfd70ac7604701', '49', 'USER', 'user49@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('99', '5d68f62085335588b67cf713ed6b3cfb', '50', 'USER', 'user50@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('100', '903a4fb3dc3db3f194ff4d50d5dd1f06', '51', 'USER', 'user51@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('101', '603ac5175e0b004e988fa8b1fda8c142', '52', 'USER', 'user52@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('102', '5a7b32f28b607c1cdca4f6821054a998', '53', 'USER', 'user53@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('103', 'a45c60cc393deac09b742f8bb58e275f', '54', 'USER', 'user54@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('104', '0bbf349b0c07a1777892a8d13937571e', '55', 'USER', 'user55@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('105', '75626fed9acb19545a0e2c0a6d5b19d7', '56', 'USER', 'user56@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('106', '0699ddd40db0b8a986ecf120f5b872e5', '57', 'USER', 'user57@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('107', '81a84a94d8313e42753674c2eeaa0186', '58', 'USER', 'user58@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('108', '03a2b89f849223644395d2951dadff6c', '59', 'USER', 'user59@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('109', '0d44502f9db3fa0f1c2dd0b523573f8b', '60', 'USER', 'user60@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('110', 'c16fd6e47644c2451f53235797d05252', '61', 'USER', 'user61@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('111', '9708fa05fcb3e7f4ccc675379da49353', '62', 'USER', 'user62@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('112', 'be2b07d84f10f8b3b3cae84b620cf166', '63', 'USER', 'user63@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('113', '8f03eb402fb51efd87a8fa821ef71e36', '64', 'USER', 'user64@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('114', '994204a8bf2b1cb2dd875643c0607be7', '65', 'USER', 'user65@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('115', 'ee8c50f66027b5867b029f14d8cc6566', '66', 'USER', 'user66@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('116', 'c8ce9fddb99dbb5d3a80b207246f74b5', '67', 'USER', 'user67@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('117', 'e40c701b30b098a3c632425d845f95e3', '68', 'USER', 'user68@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('118', '446e3045851a8538cd64d8b7e82dbc37', '69', 'USER', 'user69@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('119', '1af70c8771c50d65f8ba3d678e90e1e9', '70', 'USER', 'user70@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('120', 'ceb8dce4ae22145e78522275f277435d', '71', 'USER', 'user71@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('121', '8c4b3595f4509c39f6435176354b61b9', '72', 'USER', 'user72@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('122', '00ed29a6406651afe71482b5470432f5', '73', 'USER', 'user73@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('123', '5e9ea435dd2df6ec80402f291d9df643', '74', 'USER', 'user74@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('124', 'f0c42ab73bcb8e92099ab3c7d389b57e', '75', 'USER', 'user75@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('125', '05d7c46897b133cde5c4345442737622', '76', 'USER', 'user76@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('126', 'f330353f8c4cc94205ec099bead3053c', '77', 'USER', 'user77@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('127', 'a9f93a64f168d5eb0de529331648591b', '78', 'USER', 'user78@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('128', '3d62bbb65605350d9cf43fad107b093e', '79', 'USER', 'user79@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('129', 'e876db23879ffaa9793f6a102e5063e6', '80', 'USER', 'user80@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('130', '2b2c3ac6fd5656c66b6349297f7c8f34', '81', 'USER', 'user81@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('131', '9edb92515fc5ae08c2d8f9bca5c16c4b', '82', 'USER', 'user82@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('132', 'ccf718bf7d49ae991b33f88452a627ed', '83', 'USER', 'user83@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('133', '7f11aff8ee3ab2d4561f4f5bb996f538', '84', 'USER', 'user84@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('134', '5e50bebfaee0312ad55e13ced21b88e6', '85', 'USER', 'user85@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('135', 'd59cfe083c72a3fad01d607c9e347122', '86', 'USER', 'user86@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('136', '117c29a4d1b26107f19570a5d1595ee0', '87', 'USER', 'user87@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('137', '2077a0f8539ebe890a3dc0beb6c7a444', '88', 'USER', 'user88@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('138', '3ebab37e751cc294662d6b3a24d01b40', '89', 'USER', 'user89@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('139', '13731d57d40149e7b6a3a549e4042293', '90', 'USER', 'user90@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('140', '0e4552acbe2f5ff5416fea0a7c0fbf7a', '91', 'USER', 'user91@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('141', '90706f14ef1087cf9501b926fe97533e', '92', 'USER', 'user92@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('142', '538065c753a7d5868f7d19de1cdff3e3', '93', 'USER', 'user93@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('143', '2a3db66301df919cb3d78ca7411be0c6', '94', 'USER', 'user94@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('144', 'a132cbbd6a2c2981165a239e22fba6c7', '95', 'USER', 'user95@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('145', '91d8d21d21d64d8890aae88a01537e24', '96', 'USER', 'user96@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('146', 'b79fbe59e7c297447e5005b13814cd9f', '97', 'USER', 'user97@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('147', '88c0f392517ad8ea55bb7643a67dcbeb', '98', 'USER', 'user98@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('148', '485ddf8dd90940f69b2f2274af864ad3', '99', 'USER', 'user99@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('149', '2a33a3553c5eb270ef8539bad6cb85d9', '100', 'USER', 'user100@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('150', 'aeda77527e83076ec42b0ec2d880d066', '101', 'USER', 'user101@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('151', '08f396f5b6e770cbd38d3f8482e01fd3', '102', 'USER', 'user102@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('152', 'ae3f616591705e892a73f195dde2614b', '103', 'USER', 'user103@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('153', '279c2ddab764f32252da0f367f5de63d', '104', 'USER', 'user104@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('154', 'dc3e25c2fcc4745bec2c63a6b7d533ff', '105', 'USER', 'user105@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('155', 'f33f03fa2ffae853dbd6286eda6fe956', '106', 'USER', 'user106@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('156', 'abe5a16d74fee59f90e39afda20d83e9', '107', 'USER', 'user107@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('157', '3e0b60da59272efc2f96e17d69885577', '108', 'USER', 'user108@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('158', '4af5cc2e4db3f6485af13a1f12e0fdac', '109', 'USER', 'user109@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('159', 'df44b9c539df5d091ad690600e8b7e8a', '110', 'USER', 'user110@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('160', '0c534ed3fff7d2bfd32ee19d84644e3f', '111', 'USER', 'user111@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('161', '31e2aef0101bc6d8dc07a67cfe06f76e', '112', 'USER', 'user112@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('162', 'a902632a0d514d0742b2afaa469a83ee', '113', 'USER', 'user113@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('163', '70103367f6a9a7273dab6a05f5a90393', '114', 'USER', 'user114@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('164', 'f978328d425bb3100da67c3328e63cc1', '115', 'USER', 'user115@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('165', '409595f1788614253740bef972498026', '116', 'USER', 'user116@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('166', '7f6ce5fb3e7de92d09f6b00a6b4d0c62', '117', 'USER', 'user117@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('167', '129a0a720c4b4698c2f5844fd56d8927', '118', 'USER', 'user118@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('168', 'db9ed813f4bfe56c01a680350b1eca6b', '119', 'USER', 'user119@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('169', '6ecb47db85de5e16e2b710a80aa8fb44', '120', 'USER', 'user120@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('170', '79956d617467f7c647191c06d0a10a6a', '121', 'USER', 'user121@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('171', '92913dcd57aa05251aec0eb8d6cb2e11', '122', 'USER', 'user122@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('172', '6ad14ba9986e3615423dfca256d04e3f', '123', 'USER', 'user123@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('173', 'a38529e158a963ab4eb768f71129ec6a', '124', 'USER', 'user124@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('174', 'fdf702faf3b7b5bec238b8900297a334', '125', 'USER', 'user125@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('175', '6b9c1fa3229cbd1c7f7969ccdcdbebb1', '126', 'USER', 'user126@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('176', '669887c44e4cf99b635d2527050a40de', '127', 'USER', 'user127@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('177', '4dfe1721ef86ac47896623af161be673', '128', 'USER', 'user128@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('178', '0abe8cb9712b9e1052b944291f7d3b20', '129', 'USER', 'user129@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('179', '3dcce8efd2286f5bd73801f253bdff37', '130', 'USER', 'user130@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('180', '599b60f343e0cd5d7623c0e586b44ab6', '131', 'USER', 'user131@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('181', '3e5136631c0f87215dcf00a6b2ea53d7', '132', 'USER', 'user132@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('182', 'd47169f5796b1525be1869128f34c0f5', '133', 'USER', 'user133@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('183', '6e9d4e722290a03fb3dd5e061be5d594', '134', 'USER', 'user134@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('184', 'fe8ebf28c4d49b955b472a56b68abead', '135', 'USER', 'user135@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('185', '7a7d35b29ec0a79de027233d614177ae', '136', 'USER', 'user136@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('186', 'c815840799c2d62af196fc55313c6361', '137', 'USER', 'user137@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('187', '9f0162db78f2ec3c5bf914d6ed0542d2', '138', 'USER', 'user138@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('188', 'b7e1ed2f896eab1b8a73c2637526ffdc', '139', 'USER', 'user139@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('189', 'ec6c96ca6a73096fcb5fbb0c9141cad6', '140', 'USER', 'user140@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('190', 'ba480fb295a93fa5f892b0b57a463faf', '141', 'USER', 'user141@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('191', '713f82ea91628af7ff82ce3c5fdfd6df', '142', 'USER', 'user142@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('192', 'b4e4a40dd336fdc442a4979964afcada', '143', 'USER', 'user143@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('193', '323c19aaeef898973db54691f479fd5d', '144', 'USER', 'user144@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('194', 'adb8301d47572413db36043b5b3bd8b2', '145', 'USER', 'user145@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('195', 'b93a24c9b2d23d1f3ce9bf57591f5cdb', '146', 'USER', 'user146@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('196', '8c05ebc8a30628a42e6abf78cdda001c', '147', 'USER', 'user147@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('197', 'ddd90be91283db1f7cc7c0f72b0ed60d', '148', 'USER', 'user148@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('198', '12617f9866d48f4427087c11f0fb8123', '149', 'USER', 'user149@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('199', 'e14949369ea6f285ac25f5252cf13c83', '150', 'USER', 'user150@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('200', '7739a97362f6bcb4b8532e67a97adc32', '151', 'USER', 'user151@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('201', '110fc6a2a981a291c268a35db1d432d8', '152', 'USER', 'user152@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('202', '1e082b4d340ea7fcf38a499bd2c4e304', '153', 'USER', 'user153@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('203', '1877bacdc485fb40864bf4373c4e2c97', '154', 'USER', 'user154@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('204', '91008bdb3875626f72b57d1962139acd', '155', 'USER', 'user155@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('205', '6effb1c8a4b65c0dad17cad8eacfdc9c', '156', 'USER', 'user156@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('206', '09ca19d3316103c9669ffa623d80c632', '157', 'USER', 'user157@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('207', '1a99c062b0d169fab76417ab76461007', '158', 'USER', 'user158@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('208', 'b1f049962ebf8250a52e4115f9fbcc9a', '159', 'USER', 'user159@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('209', '17ee0908c05936c6df8090ca9775f4fc', '160', 'USER', 'user160@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('210', '59a135026d005d0c5e0f41a07602849b', '161', 'USER', 'user161@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('211', '873724f526b9f4f2ae2748ee08c65e36', '162', 'USER', 'user162@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('212', 'cc73e3f5b9a005b574737e717fbb2d9b', '163', 'USER', 'user163@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('213', 'bf4fcccaeccda7d586208821fdc13120', '164', 'USER', 'user164@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('214', '1b17202f9e1aa006a10f1c088bad1281', '165', 'USER', 'user165@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('215', 'b4ba713527f22c323112a11607c0a5eb', '166', 'USER', 'user166@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('216', '90e2708fdfb37fdf49bdb3115b7e5144', '167', 'USER', 'user167@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('217', 'a8425ae45f7a10e8acf3efbb5ae3c33d', '168', 'USER', 'user168@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('218', 'fad62cb9f360e0ac47f37e2ed83c11dd', '169', 'USER', 'user169@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('219', '72067d8fde4caf96baabf1da48d036c9', '170', 'USER', 'user170@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('220', '1c41fa721e39d67470fb8dde77840f72', '171', 'USER', 'user171@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('221', '309b2ca8c4906e1e84c7099dcbe0f77a', '172', 'USER', 'user172@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('222', 'efd262848a33a8f053166a215622efbe', '173', 'USER', 'user173@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('223', 'b821b16bd0c28bcc588f4e36b5339a76', '174', 'USER', 'user174@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('224', 'e8e2b01a977de88da7394bc5589720cd', '175', 'USER', 'user175@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('225', 'd75d1e8521ad857979ffa0c15dc60899', '176', 'USER', 'user176@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('226', '2664c383f104759bd4aeaa4131524be7', '177', 'USER', 'user177@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('227', '8cb7effe15780a43f1ffa0e6c4539d61', '178', 'USER', 'user178@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('228', 'e0d3113763618eab9b6d0941e5b37f8d', '179', 'USER', 'user179@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('229', '2bf58aa8f09e9af3046810fc540e5c5d', '180', 'USER', 'user180@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('230', '036c0be39d417a938d0801e819bed016', '181', 'USER', 'user181@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('231', '6ab1bcee388c280786bde1fbdb76a5b2', '182', 'USER', 'user182@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('232', '11accbe53dab54145dd297c5517b1c10', '183', 'USER', 'user183@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('233', '881c70afa3ccbdb83eabf1844a48f872', '184', 'USER', 'user184@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('234', 'a4ac639ee9a96aa06c7035d17179668c', '185', 'USER', 'user185@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('235', 'aa6ac59840d909b2fc0a9aa29ef5a74d', '186', 'USER', 'user186@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('236', 'b4a78de0e667836baa87279fec0357fd', '187', 'USER', 'user187@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('237', 'ac2ddda200106500cd29bdb59e88d13d', '188', 'USER', 'user188@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('238', 'b9ec40bac24c6662d51e455a4ca482c1', '189', 'USER', 'user189@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('239', '429f317e34000632e9695e61269910de', '190', 'USER', 'user190@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('240', '5a65af8f394a763687eb48c827478907', '191', 'USER', 'user191@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('241', '1c6d83f726c0b8eb381c061c65d16a97', '192', 'USER', 'user192@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('242', 'ec2f8cc3df85505ce8279aa7191a2f7a', '193', 'USER', 'user193@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('243', 'df6bc8d3a7e95c83525a336a861c644d', '194', 'USER', 'user194@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('244', '74e8765976ec89ade70641e6870bbbfa', '195', 'USER', 'user195@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('245', 'ddc7ae85265fbab981ae3dd289ce2ea4', '196', 'USER', 'user196@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('246', 'b28f6a8d92abb50fd7dd6f8eb118b158', '197', 'USER', 'user197@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('247', 'f05a08bc123ae59206e0e3942ad53ef4', '198', 'USER', 'user198@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('248', '406ee83153da4c3fa28edb0d9b67ddb0', '199', 'USER', 'user199@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('249', '519c1c326c807690b5aa8cb44bfebebd', '200', 'USER', 'user200@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('250', '556a2669db1cc6b325156448abd32bd1', '201', 'USER', 'user201@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('251', 'a57b747680e8cd587c7e40e1c8072a99', '202', 'USER', 'user202@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('252', 'd627050774d84b894ad5359e2a9f4669', '203', 'USER', 'user203@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('253', 'eff9b564d79ea14337a0d7aa21d6a3ed', '204', 'USER', 'user204@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('254', 'e7bf9f35262471aade29751227e4be03', '205', 'USER', 'user205@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('255', 'a8c1c3b454e788adea14f132d2eb0468', '206', 'USER', 'user206@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('256', 'ab9429da7b7ba7975ffd20054ca6eea3', '207', 'USER', 'user207@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('257', 'ae5002005c1580c9f100df466fa53d0e', '208', 'USER', 'user208@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('258', 'bf37fb3e40a67fb6aac40542d3a195d5', '209', 'USER', 'user209@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('259', '031d699a42a2960aa1adc14a339f85d8', '210', 'USER', 'user210@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('260', '86f2e2ebb3a61be10fba71dd66f3af85', '211', 'USER', 'user211@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('261', 'ef41320b54508d05b71046dc508a328b', '212', 'USER', 'user212@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('262', 'e557d99503e8fea85cc5d6a849abaadc', '213', 'USER', 'user213@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('263', '86c44b829b9b3e0c356b3746bbbf28f2', '214', 'USER', 'user214@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('264', '906e8db429737600df727e2d84a99260', '215', 'USER', 'user215@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('265', '9f064273d874f81ab2d87245c08dae84', '216', 'USER', 'user216@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('266', 'b74d96bb8bf5cab3df37826ed82efc8e', '217', 'USER', 'user217@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('267', '7a3cd626d03a39ab9cee38a6cc583077', '218', 'USER', 'user218@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('268', '2e7ebb14005862269bca0c0741ef262e', '219', 'USER', 'user219@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('269', 'fb86b189aa519a4d97746a9cac732fd5', '220', 'USER', 'user220@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('270', 'f6ad9814ddeb07976774dc6705e15cca', '221', 'USER', 'user221@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('271', '0fe4305f97b115279f779548b7c68657', '222', 'USER', 'user222@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('272', 'cc4999dc17efc21d4b2eb83111d52071', '223', 'USER', 'user223@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('273', '062a77f3698a2f694879b8b24a915b80', '224', 'USER', 'user224@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('274', 'fcbf80906e9a2605e707d11874cf8924', '225', 'USER', 'user225@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('275', 'ac9130116b66062ed0cd84f1ec539d94', '226', 'USER', 'user226@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('276', '05627b50e09ac773846256253fcdb483', '227', 'USER', 'user227@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('277', '6cd33de3d463bdf8bbab53699dd3d85d', '228', 'USER', 'user228@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('278', '0a6cebb27c9dd89b61255b4a01c2a1cb', '229', 'USER', 'user229@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('279', '45dfab976176f61f7fcedd96c6cb9750', '230', 'USER', 'user230@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('280', 'a232216c2cd04ed44795d175e456354a', '231', 'USER', 'user231@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('281', '833bf7ba540c5ef371145dd006c1a1c7', '232', 'USER', 'user232@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('282', '9d4bc2e4a6d19441311cb48570a5aaea', '233', 'USER', 'user233@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('283', '2e559b5ee7d92adfc0c8fdcaf8975b8e', '234', 'USER', 'user234@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('284', 'f87c8ba54b00720641ee5e02646239ee', '235', 'USER', 'user235@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('285', 'e747731763117eb0e552a0d6701f93a8', '236', 'USER', 'user236@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('286', '4f7533c826510b569feb4801012ad660', '237', 'USER', 'user237@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('287', 'ceacd10b05ae2224506809b745ff631e', '238', 'USER', 'user238@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('288', 'd99c9b5b3a14d1e4c2df616fade94ffe', '239', 'USER', 'user239@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('289', 'cebffa395e2ea5ae8cc760205b31df24', '240', 'USER', 'user240@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('290', '72e5c2aa4b018674e709d5bca9e571e0', '241', 'USER', 'user241@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('291', '59a372c1c436cf1798095da705a89673', '242', 'USER', 'user242@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('292', 'bb51e40511c0d4bc51b9eea31f137e4f', '243', 'USER', 'user243@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('293', '544acb35f70818c769c80f8064f8f822', '244', 'USER', 'user244@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('294', '8d816599004f79bafc885b73db746e02', '245', 'USER', 'user245@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('295', 'd398e1be7bb5ee3e68e1ddd0df3e3100', '246', 'USER', 'user246@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('296', '68556555fed07f7d3959e91d2a426ff4', '247', 'USER', 'user247@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('297', '08453ffa435e5451d0e6efdc595672b7', '248', 'USER', 'user248@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('298', 'e44cb4aa771ae25d9872eb1265208b0f', '249', 'USER', 'user249@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('299', '51b1d4a4abb1fbc6ee94f20254c5dc11', '250', 'USER', 'user250@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('300', 'cbc368fe8a8efc004352b644534a0128', '251', 'USER', 'user251@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('301', '67185b2d8bfbe35ce0fc6fbe416ad54d', '252', 'USER', 'user252@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('302', '9e3aed480055e7578a1c27b315087f31', '253', 'USER', 'user253@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('303', 'f8eeaa0f6144c64472dc4b35acbff870', '254', 'USER', 'user254@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('304', 'ae40604f60c826f0e6839883a3d5ae58', '255', 'USER', 'user255@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('305', 'feb2687dcf2a8fbd5900389c4d1cca49', '256', 'USER', 'user256@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('306', '5e7984adafc80a128077090468535ea9', '257', 'USER', 'user257@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('307', '6b43d9b7362279a5129ac9852989932f', '258', 'USER', 'user258@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('308', '3cdc4f1313c2c397d4fe9764b79d4993', '259', 'USER', 'user259@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('309', 'c98a57b01cfbb3075e913eca9aa30621', '260', 'USER', 'user260@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('310', '16b074366a40838a9a86f6f900a8fda5', '261', 'USER', 'user261@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('311', '25a17b145120abe8ec3f5d3dd34761e9', '262', 'USER', 'user262@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('312', 'cfebb0315d2b42a7ef11b158d2c69773', '263', 'USER', 'user263@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('313', 'c3db5d62ee18de809799a499d3069bb8', '264', 'USER', 'user264@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('314', '66d27a5ada08516ec44f0a502997a614', '265', 'USER', 'user265@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('315', '14bc890ddb7c48c99872ba563b562bc3', '266', 'USER', 'user266@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('316', '91358f2e6f8f6e2cee027dd00c06393a', '267', 'USER', 'user267@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('317', '977f6e2bef86b43f8004e4bc2fb68a11', '268', 'USER', 'user268@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('318', '7b7aa6af40c7ef35da3b37cd45050dc2', '269', 'USER', 'user269@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('319', '751e3ce6458d1cb6472dc6684dfeb133', '270', 'USER', 'user270@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('320', '5256806023c8660a46c75425726661a5', '271', 'USER', 'user271@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('321', '2af0205a43504c56cae2b7bf5d38601b', '272', 'USER', 'user272@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('322', '20e3a51848576f94a723d2132a2b0acb', '273', 'USER', 'user273@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('323', '64a8627e4f2f641d5ce35ea58321ca36', '274', 'USER', 'user274@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('324', '1fd2f0c3a46313cf923d8c8a2d936296', '275', 'USER', 'user275@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('325', '16099b1713df0f1963186076887cb8fe', '276', 'USER', 'user276@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('326', 'a8eb91fea98f18498fccb6c2ee98b795', '277', 'USER', 'user277@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('327', 'f8a090ce1a532c2f050ef19aa869612a', '278', 'USER', 'user278@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('328', '3144321a749eb7e8e671c84f31a8283f', '279', 'USER', 'user279@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('329', '9f70c520ddc0c9702cc2df90a6c0e3de', '280', 'USER', 'user280@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('330', '9ac1749ffecbab641e244fa0d8748997', '281', 'USER', 'user281@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('331', '16d6d378b6bc8b9957c3b140ba636ff5', '282', 'USER', 'user282@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('332', '2a5e549a5294898c092ceab86fa12790', '283', 'USER', 'user283@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('333', '1477cba3b0f07d380f5bf6426ed506f7', '284', 'USER', 'user284@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('334', 'fe81f6d2fa3ac0144faf471055e954ba', '285', 'USER', 'user285@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('335', '7dd1b6d08c5af99a6910d2bf4bd694bf', '286', 'USER', 'user286@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('336', 'd390f1f42bedc1c4a2d7af6e81379a75', '287', 'USER', 'user287@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('337', 'b70c3757ddb391958424670cd5332d46', '288', 'USER', 'user288@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('338', '6a34b3e5d81aaca0388bfbf3aeb1a67b', '289', 'USER', 'user289@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('339', '9423857c15029cd8911e07196ecca151', '290', 'USER', 'user290@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('340', '0fb24e518422e020f8de89ce6ac3bd5e', '291', 'USER', 'user291@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('341', '24df4948e34b2bd222d0227de2703ae1', '292', 'USER', 'user292@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('342', '06614fd1a8a77e146d36a6da620df39b', '293', 'USER', 'user293@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('343', '3671c0b2799fcac70f58066d3505c44b', '294', 'USER', 'user294@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('344', 'a491ce5a9b2cce2aa2b89fd951d6313e', '295', 'USER', 'user295@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('345', '6c0128b5996a333214d70189981493a7', '296', 'USER', 'user296@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('346', 'e68966f8fcb4d09eaf3f226688554150', '297', 'USER', 'user297@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('347', '815ac268449ddf472ae55d0883f51ad0', '298', 'USER', 'user298@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('348', '8c2411e14ed7025c69d0b871deea7ffa', '299', 'USER', 'user299@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('349', '2bf84ed34ad3c15484c17ce5c3951d4a', '300', 'USER', 'user300@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('350', 'e8ae0befadcf5756eef5445f52cea1e1', '301', 'USER', 'user301@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('351', 'bfed87d02f9dbf1a70057153ec7a8b0e', '302', 'USER', 'user302@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('352', '0aed7d09fcb01e6dcec8d33fe08a6616', '303', 'USER', 'user303@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('353', 'ae1fda0c95a5c336527f836ab14819d5', '304', 'USER', 'user304@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('354', 'caab8bd4fb72a384e8a0daca2e4a3c5d', '305', 'USER', 'user305@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('355', '92239edc61b2cd84ea48d4c7f1ca5554', '306', 'USER', 'user306@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('356', '91503086c6fbd2674503de2d83f918b3', '307', 'USER', 'user307@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('357', '8339e579017167aac783c56e18a6c738', '308', 'USER', 'user308@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('358', '808b57fddc6d38e42f03c9e932a7a5a9', '309', 'USER', 'user309@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('359', '989da4ca4595413e5fcd05986c2e77d2', '310', 'USER', 'user310@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('360', 'c4f4badbe0c632d78176045cb4dc82e6', '311', 'USER', 'user311@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('361', '7da70de0a09a30b3b12d55e6c0416cec', '312', 'USER', 'user312@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('362', 'd1665149205340c633fd9784a27ce81a', '313', 'USER', 'user313@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('363', 'b51139a95dfc560100cd2ed47e7d6c10', '314', 'USER', 'user314@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('364', 'f11c3070d9cebc67a7f6b3c4ebeb57fe', '315', 'USER', 'user315@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('365', '3782da5aa59cf74290295615dfc97d2a', '316', 'USER', 'user316@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('366', 'afd6921f9134c56c72faf5ad04a4fe4d', '317', 'USER', 'user317@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('367', '39c4c00c7c806b027034e449475f30ac', '318', 'USER', 'user318@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('368', 'e0b10c8c90b0d0ac7f3f0a7a0b7919a7', '319', 'USER', 'user319@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('369', 'b035f08c461a72935007b695d56a0cb6', '320', 'USER', 'user320@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('370', 'f67c683f0f3e98cb9dd5582e8cbbcd04', '321', 'USER', 'user321@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('371', '91e951f0945cebd1752937dec89c23a2', '322', 'USER', 'user322@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('372', 'ff3579701de90958d2b76898c5ffa44f', '323', 'USER', 'user323@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('373', '180da1170b30868579df304f1c41a194', '324', 'USER', 'user324@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('374', '024c961a6bf4990672ba5bdb86556b9c', '325', 'USER', 'user325@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('375', '1a50e337ecace6cf2d6aa37d5769ca5a', '326', 'USER', 'user326@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('376', '3675d10a7dd96da4e6d2597aa9554e5d', '327', 'USER', 'user327@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('377', 'a069389e6e96dbc5baad6cefa3930720', '328', 'USER', 'user328@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('378', '97caecbb0cbd62caaaf9914a8adb8de1', '329', 'USER', 'user329@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('379', '98307750d0e173d16b5c60f9926475fd', '330', 'USER', 'user330@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('380', 'a1d7a33747918145fd7d5686dabe0857', '331', 'USER', 'user331@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('381', 'feedaccd659bcc0a64d6e60a25068c0f', '332', 'USER', 'user332@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('382', '5ea85d91b2fea1759dd089f13b12a367', '333', 'USER', 'user333@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('383', '74dbfd3cf5ada5a95df4803541b1d6d5', '334', 'USER', 'user334@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('384', '39ddfbeff8ff69d954569ff41f3edfa7', '335', 'USER', 'user335@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('385', 'c1ad386e60d8344053429039f87b8981', '336', 'USER', 'user336@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('386', 'eba0db4c13fb15596d72bd131d224443', '337', 'USER', 'user337@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('387', '20210a170cac8e84c7763bf2ff65dd41', '338', 'USER', 'user338@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('388', '1cfd6d2da46845b690fb4a423917f2b1', '339', 'USER', 'user339@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('389', 'b6656d015b82068a88b4177ca212b054', '340', 'USER', 'user340@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('390', 'e61337298a9c2aae9e5c5b136a1f9316', '341', 'USER', 'user341@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('391', 'a507b0e598b95de0c3e6f79f4ccd84c7', '342', 'USER', 'user342@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('392', '498fea8ba72288a06039c7f859c32c3f', '343', 'USER', 'user343@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('393', '2ee54630e1ffdedcd6a326eb83a11d8a', '344', 'USER', 'user344@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('394', '251c275d73de0a9c073758222af5756f', '345', 'USER', 'user345@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('395', 'edb474bdbe05f99d2e32a9c8102b7543', '346', 'USER', 'user346@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('396', 'ff030a4fd6a7d718bb8e959257190d6d', '347', 'USER', 'user347@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('397', 'a45f72e1044a53aa3ae291a80b2c27e2', '348', 'USER', 'user348@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('398', '63580f947a1d351426b7e1640bd2f072', '349', 'USER', 'user349@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');
INSERT INTO `user` VALUES ('399', 'dc074d8489a8723bca78043190e0453a', '350', 'USER', 'user350@mail.com', null, '0', null, '2015-08-07 16:22:13', null, null, null, '1', null, null, null, '1');

-- ----------------------------
-- Table structure for `user_network`
-- ----------------------------
DROP TABLE IF EXISTS `user_network`;
CREATE TABLE `user_network` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `identity` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_network
-- ----------------------------
INSERT INTO `user_network` VALUES ('41', '41', 'http://vk.com/id2078996', 'vkontakte');
INSERT INTO `user_network` VALUES ('42', '41', 'http://my.mail.ru/mail/vanchin/', 'mailru');
INSERT INTO `user_network` VALUES ('43', '43', 'https://www.facebook.com/app_scoped_user_id/889122731165495/', 'facebook');
INSERT INTO `user_network` VALUES ('44', '45', 'https://plus.google.com/u/0/114258405792095098990/', 'google');
INSERT INTO `user_network` VALUES ('45', '46', 'https://plus.google.com/u/0/115431312211277236360/', 'google');
INSERT INTO `user_network` VALUES ('46', '47', 'https://plus.google.com/u/0/111493308714219953578/', 'google');
INSERT INTO `user_network` VALUES ('47', '49', 'http://vk.com/id6820604', 'vkontakte');

-- ----------------------------
-- Procedure structure for `add_test_users`
-- ----------------------------
DROP PROCEDURE IF EXISTS `add_test_users`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_test_users`()
    MODIFIES SQL DATA
BEGIN
DECLARE i INT;
SET i=0;
	WHILE i<350 DO
		SET i=i+1;
		INSERT INTO `user` (`password`,lastName,firstName,email,activated,regDate,role ) 
			VALUES(MD5(CONCAT('user',i)),'USER',i,CONCAT('user',i,'@mail.com'),1,NOW(),1);
	END WHILE;
	INSERT INTO personal (userId,departmentId,position)
			SELECT id,10,'Тестовый пользователь' FROM `user` WHERE lastName='USER';
	INSERT INTO `template_bp` (`personalId`,periodType,startDate,endDate,ftWeight,authorId,createDate,updateDate) 
			SELECT id,0,'2014-01-01','2018-01-01',33,41,NOW(),NOW() FROM `user` WHERE lastName='USER';
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `clear_all_test_users`
-- ----------------------------
DROP PROCEDURE IF EXISTS `clear_all_test_users`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `clear_all_test_users`()
BEGIN
	DELETE FROM bp
		WHERE bp.employeeId IN (SELECT id FROM `user` WHERE `user`.lastName='USER');
	DELETE FROM template_bp
		WHERE template_bp.personalId IN (SELECT id FROM `user` WHERE `user`.lastName='USER');
	DELETE FROM personal
		WHERE personal.userId IN (SELECT id FROM `user` WHERE `user`.lastName='USER');
	DELETE FROM `user` WHERE `user`.lastName='USER';

	SELECT @max := (SELECT MAX(id)+ 1 FROM bp); 
	SET @q=CONCAT("ALTER TABLE bp AUTO_INCREMENT = ", @max);
  PREPARE stmt FROM @q;
  EXECUTE stmt;

	SELECT @max := (SELECT MAX(id)+ 1 FROM template_bp); 
	SET @q=CONCAT("ALTER TABLE template_bp AUTO_INCREMENT = ", @max);
  PREPARE stmt FROM @q;
  EXECUTE stmt;

	SELECT @max := (SELECT MAX(id)+ 1 FROM `user`); 
	SET @q=CONCAT("ALTER TABLE `user` AUTO_INCREMENT = ", @max);
  PREPARE stmt FROM @q;
  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;

END
;;
DELIMITER ;
