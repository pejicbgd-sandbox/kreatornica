/*
Navicat MySQL Data Transfer

Source Server         : Local Base
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : kreatornica

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-10-06 20:45:43
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('1', 'Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. Danas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi. Radovi i proizvodi iz radionice Kreatornice imaju jednako tradicionalnu kao i savremenu upotrebnu vrednost. Oni pre svega afirmišu i oživljavaju stare, zaboravljene tehnike ručnog i umetničko-majstorskog rada. Umetnici daju prednost prirodnim materijalima (drvo, tikve, poludrago kamenje, gvožđe, staklo, koža, prirodne tkanine, itd.) i stavljaju akcenat na slobodu umetničkog izraza. Rad udruženja obuhvata i zajedničke društveno-kulturne aktivnosti, upoznavanje zainteresovane javnosti, dece i starijih sa tehnikama konkretnih zanata i ručnog rada posredstvom edukativnih susreta i radionica, uključivanje iskusnih umetnika i ljubitelja umetnosti u aktivnosti udruženja i širenje entuzijazma za kreativan rad.', 'O nama', '', 'sr');
INSERT INTO `about` VALUES ('2', 'Kreatornica je združenie umelcov a remeselníkov z mesta Kovačica v Srbsku. Vzniklo v roku 2012. Dnes má šestnásť členov rôzneho umeleckého zamerania, ktorých spoločným cieľom je zachovať a propagovať staré remeslá a ručné práce, pestovať kultúrnu a umeleckú rozmanitosť v regióne a nadväzovať medzinárodnú spoluprácu s podobnými spolkami z celej Európy. Diela a výrobky z dielní Kreatornice majú jednak tradičnú, ako aj súčasnú úžitkovú hodnotu, predovšetkým však afirmujú a oživujú staré, zabudnuté postupy ručnej a umelecko-remeselníckej výroby. Umelci kladú dôraz na pírodné materiály (drevo, tekvice, polodrahokamy, kov, sklo, koža, prírodné tkaniny atď.) a na slobodu tvorby a umeleckého prejavu. Poslaním združenia sú i spoločensko-kultúrne aktivity, oboznamovanie zaintresovanej verejnosti, detí a seniorov s technikami konkrétnych remesiel a ručných prác prostredníctvom edukatívnych stretnutí a dielní, zapájanie skúsených umelcov a umeleckých nadšencov do činnosti združenia a všeobecné šírenie nadšenia pre tvorivú činnosť.', 'O nas', 'Podnaslov sk', 'sk');
INSERT INTO `about` VALUES ('3', 'Kreatornica is an association of artists and craftsmen from Kovačica Serbia. It was founded in 2012. Today there are 16 members of various artistic interests, whose common objective of preserving and promoting traditional crafts and handicrafts, growing cultural and artistic diversity of the region as well as international cooperation with similar associations in Europe. Papers and articles from the workshop Kreatornice have equally traditional and contemporary usefulness. They primarily promote and bring to life old, forgotten techniques of manual and artistic masters `work`. Artists prefer `natural` materials (wood, gourds, precious stones, metals, glass, leather, `natural` fabrics, etc.) `And` put the emphasis `on` freedom of artistic expression. Article syndication also includes common socio-cultural activities, exploring the interested public, children `and` elderly people to the techniques of `specific` trades `and` manual labor through educational meetings `and` workshops, involvement of experienced artists `and` art lovers in the activities of the association `and` the spread of enthusiasm `for` creative `work`.', 'About us', 'Podnaslov EN', 'en');

-- ----------------------------
-- Table structure for albums
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact_page
-- ----------------------------

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(64) NOT NULL,
  `gallery_img` varchar(64) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES ('1', 'Prva galerija', '1473709794-Hydrangeas.jpg');
INSERT INTO `gallery` VALUES ('2', 'Druga galerija', '');
INSERT INTO `gallery` VALUES ('5', 'Najnovija', 'head.jpg');

-- ----------------------------
-- Table structure for gallery_info
-- ----------------------------
DROP TABLE IF EXISTS `gallery_info`;
CREATE TABLE `gallery_info` (
  `gallery_info_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `text` text,
  `title` text,
  `content` text,
  `lang` enum('sr','en','sk') NOT NULL DEFAULT 'sr',
  PRIMARY KEY (`gallery_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery_info
-- ----------------------------
INSERT INTO `gallery_info` VALUES ('0', '5', 'Tekst srpski', 'Naslov srpski', 'Srpski kontent', 'sr');
INSERT INTO `gallery_info` VALUES ('1', '1', 'srpski text', 'srpski title', 'srpski content', 'sr');
INSERT INTO `gallery_info` VALUES ('2', '1', 'Engleski text', 'Eng title', 'Engleski content', 'en');
INSERT INTO `gallery_info` VALUES ('3', '1', 'Text slovacki', 'Title slovacki', 'content slovacki', 'sk');
INSERT INTO `gallery_info` VALUES ('4', '2', 'Serbian druga text', null, null, 'sr');
INSERT INTO `gallery_info` VALUES ('5', '2', 'English druga text', null, null, 'en');
INSERT INTO `gallery_info` VALUES ('6', '2', 'Slovak druga text', null, null, 'sk');

-- ----------------------------
-- Table structure for home
-- ----------------------------
DROP TABLE IF EXISTS `home`;
CREATE TABLE `home` (
  `naslovna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of home
-- ----------------------------
INSERT INTO `home` VALUES ('header_unsplash.jpg', '7_k0ZqDvX8A');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `member_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `member_img` varchar(256) DEFAULT NULL,
  `updated_date` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefon` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('1', 'Marina Bireš', '1475521996-Koala.jpg', '1475521996', null, '12312');
INSERT INTO `members` VALUES ('2', 'Danijel Valovec', 'danjo.jpg', '222152122', null, '3211');
INSERT INTO `members` VALUES ('3', 'Ivana Veresky', 'ivana.jpg', '222511111', null, '55625');
INSERT INTO `members` VALUES ('4', 'Jaroslav Kralik', 'jaroslav.jpg', '236255115', null, '8892318585');
INSERT INTO `members` VALUES ('5', 'Ivan Pejic', 'Koala.jpg', '1466848857', 'pejicbgd@hotmail.com', '132546');
INSERT INTO `members` VALUES ('8', 'Novi member', '1473003539-Penguins.jpg', '1473003539', 'pejicbgd@yahoo.cm', '632266551');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member_bio
-- ----------------------------
INSERT INTO `member_bio` VALUES ('1', '1', 'sr', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('2', '1', 'sk', 'Slovak Bio anoter');
INSERT INTO `member_bio` VALUES ('3', '1', 'en', 'Engleski Bio tekst');
INSERT INTO `member_bio` VALUES ('4', '2', 'sr', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('5', '2', 'sk', 'Slovak Bio anoter');
INSERT INTO `member_bio` VALUES ('6', '2', 'en', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('7', '3', 'sr', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('8', '3', 'sk', 'Slovak anoter');
INSERT INTO `member_bio` VALUES ('9', '3', 'en', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('10', '4', 'sr', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('11', '4', 'sk', 'Slovak Bio anoter');
INSERT INTO `member_bio` VALUES ('12', '4', 'en', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('16', '5', 'sr', 'Serbian Bio anoter');
INSERT INTO `member_bio` VALUES ('18', '8', 'sk', 'Slovak Bio anoter');
INSERT INTO `member_bio` VALUES ('24', '8', 'sk', 'Slovak Bio anoter');
INSERT INTO `member_bio` VALUES ('25', '8', 'sk', 'Slovak Bio anoter');
INSERT INTO `member_bio` VALUES ('26', '1', 'en', 'Engleski Bio tekst');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', 'Prvi projekat', '1474707383', '1474707383-Lighthouse.jpg');
INSERT INTO `projects` VALUES ('2', 'Drugi projekat', '1474733177', '1474733177-Chrysanthemum.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projects_info
-- ----------------------------
INSERT INTO `projects_info` VALUES ('1', '1', 'Prvi srpski naslov', 'Srpski text prvog', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &#34;Lorem ipsum dolor sit amet..&#34;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &#34;de Finibus Bonorum et Malorum&#34; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'sr');
INSERT INTO `projects_info` VALUES ('2', '1', 'Slovacki Naslov', 'sdfsfsd', 'sdfsfds', 'sk');
INSERT INTO `projects_info` VALUES ('4', '1', 'Engleski naslov', 'asdasdsad', 'adadas', 'en');
INSERT INTO `projects_info` VALUES ('5', '2', 'Srpski drugi naslov', 'Tekst srpski za drugi', 'Sadrzaj srpski za drugi', 'sr');
INSERT INTO `projects_info` VALUES ('6', '2', 'Slovacki drugi naslov', 'Teks SLovacki za drugi', 'Text za drugi Slovacki\r\n', 'sk');
