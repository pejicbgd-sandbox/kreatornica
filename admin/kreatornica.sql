/*
Navicat MySQL Data Transfer

Source Server         : Local Base
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : kreatornica

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-09-02 21:40:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `lang` enum('sr','sk','en') DEFAULT 'sr',
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('1', 'Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. broji 16 članova raznog umetničkog interesovanja, čiji su zajedni?ki ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi. i proizvodi iz radionice Kreatornice imaju jednako tradicionalnu kao i savremenu upotrebnu vrednost. Oni pre svega afirmiï¿½u i oï¿½ivljavaju stare, zaboravljene tehnike ru?nog i umetni?ko-majstorskog rada. Umetnici daju prednost prirodnim materijalima (drvo, tikve, poludrago kamenje, gvoï¿½?e, staklo, koï¿½a, prirodne tkanine, itd.) i stavljaju akcenat na slobodu umetni?kog izraza. Rad udruï¿½enja obuhvata i zajedni?ke druï¿½tveno-kulturne aktivnosti, upoznavanje zainteresovane javnosti, dece i starijih sa tehnikama konkretnih zanata i ru?nog rada posredstvom edukativnih susreta i radionica, uklju?ivanje iskusnih umetnika i ljubitelja umetnosti u aktivnosti udruï¿½enja i ï¿½irenje entuzijazma za kreativan rad.', 'O nama', 'aasdas', 'sr');
INSERT INTO `about` VALUES ('2', 'Kreatornica je udruï¿½enje umetnika i zanatlija iz mesta Kova?ica u Srbiji. Osnovano je 2012 godine. broji 16 ?lanova raznog umetni?kog interesovanja, ?iji su zajedni?ki ciljevi o?uvanje i propagiranje starih zanata i ru?nih radova, gajenje kulturne i umetni?ke raznolikosti u regionu, kao i me?unarodna saradnja sa sli?nim udruï¿½enjima u Evropi. i proizvodi iz radionice Kreatornice imaju jednako tradicionalnu kao i savremenu upotrebnu vrednost. Oni pre svega afirmiï¿½u i oï¿½ivljavaju stare, zaboravljene tehnike ru?nog i umetni?ko-majstorskog rada. Umetnici daju prednost prirodnim materijalima (drvo, tikve, poludrago kamenje, gvoï¿½?e, staklo, koï¿½a, prirodne tkanine, itd.) i stavljaju akcenat na slobodu umetni?kog izraza. Rad udruï¿½enja obuhvata i zajedni?ke druï¿½tveno-kulturne aktivnosti, upoznavanje zainteresovane javnosti, dece i starijih sa tehnikama konkretnih zanata i ru?nog rada posredstvom edukativnih susreta i radionica, uklju?ivanje iskusnih umetnika i ljubitelja umetnosti u aktivnosti udruï¿½enja i ï¿½irenje entuzijazma za kreativan rad.', 'O nas', 'Podnaslov sk', 'sk');
INSERT INTO `about` VALUES ('3', 'Kreatornica is an association of artists and craftsmen from Kovačica Serbia. It was founded in 2012. Today there are 16 members of various artistic interests, whose common objective of preserving and promoting traditional crafts and handicrafts, growing cultural and artistic diversity of the region as well as international cooperation with similar associations in Europe. Papers and articles from the workshop Kreatornice have equally traditional and contemporary usefulness. They primarily promote and bring to life old, forgotten techniques of manual and artistic masters `work`. Artists prefer `natural` materials (wood, gourds, precious stones, metals, glass, leather, `natural` fabrics, etc.) `And` put the emphasis `on` freedom of artistic expression. Article syndication also includes common socio-cultural activities, exploring the interested public, children `and` elderly people to the techniques of `specific` trades `and` manual labor through educational meetings `and` workshops, involvement of experienced artists `and` art lovers in the activities of the association `and` the spread of enthusiasm `for` creative `work`.', 'About us', '', 'en');

-- ----------------------------
-- Table structure for albums
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci CHARSET=utf8;

-- ----------------------------
-- Records of albums
-- ----------------------------
INSERT INTO `albums` VALUES ('1', 'Kreatornica');
INSERT INTO `albums` VALUES ('2', 'Kreatornica');
INSERT INTO `albums` VALUES ('3', 'Slovacka');
INSERT INTO `albums` VALUES ('4', 'Kovacica');
INSERT INTO `albums` VALUES ('5', 'Kreatorci');
INSERT INTO `albums` VALUES ('6', 'kfjskdpof');

-- ----------------------------
-- Table structure for contact_page
-- ----------------------------
DROP TABLE IF EXISTS `contact_page`;
CREATE TABLE `contact_page` (
  `contact_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(150) NOT NULL,
  `contact_text` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of contact_page
-- ----------------------------

-- ----------------------------
-- Table structure for db_test
-- ----------------------------
DROP TABLE IF EXISTS `db_test`;
CREATE TABLE `db_test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci CHARSET=utf8;

-- ----------------------------
-- Records of db_test
-- ----------------------------
INSERT INTO `db_test` VALUES ('1', 'Ivan', 'Pejic', 'pejicbgd@asdad', 'asdadas', 'asdadas', '25');
INSERT INTO `db_test` VALUES ('2', 'Ivan', 'Pejic', 'pejicbgd@hotmail.com', 'asdadas', 'asdadas', '25');
INSERT INTO `db_test` VALUES ('3', 'Ivan', 'Pejic', 'pejicbgd@asdad', 'asdadas', 'asdadas', '25');
INSERT INTO `db_test` VALUES ('4', 'Ivan', 'Pejic', 'pejicbgd@asdad', 'asdadas', 'asdadas', '25');

-- ----------------------------
-- Table structure for gallery_page
-- ----------------------------
DROP TABLE IF EXISTS `gallery_page`;
CREATE TABLE `gallery_page` (
  `gallery_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `text_srb` longtext NOT NULL,
  `text_sk` longtext NOT NULL,
  `text_eng` longtext NOT NULL,
  `gallery_img` blob NOT NULL,
  `alt_text` varchar(150) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of gallery_page
-- ----------------------------

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `member_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `member_img` varchar(256) DEFAULT NULL,
  `created_date` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefon` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('1', 'Marina Bireš', null, '1111111111', null, '');
INSERT INTO `members` VALUES ('2', 'Danijel Valovec', 'danjo.jpg', '222152122', null, null);
INSERT INTO `members` VALUES ('3', 'Ivana Veresky', 'ivana.jpg', '222511111', null, null);
INSERT INTO `members` VALUES ('4', 'Jaroslav Kralik', 'jaroslav.jpg', '236255115', null, null);
INSERT INTO `members` VALUES ('5', 'Ivan Pejic', 'Koala.jpg', '1466848857', 'pejicbgd@hotmail.com', '');

-- ----------------------------
-- Table structure for member_bio
-- ----------------------------
DROP TABLE IF EXISTS `member_bio`;
CREATE TABLE `member_bio` (
  `member_bio_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `lang` enum('en','sk','sr') NOT NULL DEFAULT 'sr',
  `text` text,
  PRIMARY KEY (`member_bio_id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci CHARSET=utf8;

-- ----------------------------
-- Records of member_bio
-- ----------------------------
INSERT INTO `member_bio` VALUES ('1', '1', 'sr', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('2', '1', 'sk', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('3', '1', 'en', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('4', '2', 'sr', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('5', '2', 'sk', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('6', '2', 'en', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('7', '3', 'sk', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('8', '3', 'sr', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('9', '3', 'en', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('10', '4', 'sk', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('11', '4', 'sr', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('12', '4', 'en', 'asdasdasdas asd aasd asa');
INSERT INTO `member_bio` VALUES ('16', '5', 'sr', 'dasdadsa');

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('1', 'gdgdfg', '1', '14597.jpg');
INSERT INTO `photo` VALUES ('2', 'gdgdfg', '1', '32090.jpg');
INSERT INTO `photo` VALUES ('3', 'hfhfh', '1', '31627.jpg');
INSERT INTO `photo` VALUES ('4', 'gdfhdh', '0', '22960.jpg');
INSERT INTO `photo` VALUES ('5', 'sdgsdf', '0', '1558.jpg');
INSERT INTO `photo` VALUES ('6', 'ZigZag', '0', '27034.jpg');
INSERT INTO `photo` VALUES ('7', 'vasda', '0', '31436.jpg');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `title_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci CHARSET=utf8;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', 'Prvi', '1111111111', '1461747741-Jellyfish.jpg');
INSERT INTO `projects` VALUES ('2', 'Drugi', '888888888', '1461755853-Lighthouse.jpg');
INSERT INTO `projects` VALUES ('3', 'Treci 3', '1111111111', '1461747721-Desert.jpg');

-- ----------------------------
-- Table structure for projects_info
-- ----------------------------
DROP TABLE IF EXISTS `projects_info`;
CREATE TABLE `projects_info` (
  `projects_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `text` text,
  `content` text,
  `lang` enum('en','sr','sk') NOT NULL DEFAULT 'sr',
  PRIMARY KEY (`projects_info_id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci CHARSET=utf8;

-- ----------------------------
-- Records of projects_info
-- ----------------------------
INSERT INTO `projects_info` VALUES ('1', '1', 'test projekat', 'asdasdasd', 'asdasdl;asjd;aldkjas;', 'sr');
INSERT INTO `projects_info` VALUES ('2', '1', 'English 3 title', 'Third updated new', 'Novi tekst', 'en');
INSERT INTO `projects_info` VALUES ('3', '1', 'Slovak title', 'prvi', 'contela;dka;dkas;', 'sk');
INSERT INTO `projects_info` VALUES ('4', '2', 'Test 2 projekat', 'askdjakdja;ldkjal;kasj', 'aldjaldkaj;a;slkja;dlk', 'sr');
INSERT INTO `projects_info` VALUES ('5', '2', 'asdadas', 'asdasd', 'asdasdada', 'en');
INSERT INTO `projects_info` VALUES ('6', '2', 'adsadasda', 'asdasda', 'adasdadada', 'sk');
INSERT INTO `projects_info` VALUES ('7', '3', 'asdasda', 'asdasd', 'sadadsads', 'sr');
INSERT INTO `projects_info` VALUES ('8', '3', 'sadadsadsa', 'asdasdsa', 'dasdasdsadasds', 'en');
INSERT INTO `projects_info` VALUES ('9', '3', 'asdsada', 'dasdasdsadsa', 'ddfdzsfsfsafsafds', 'sk');
