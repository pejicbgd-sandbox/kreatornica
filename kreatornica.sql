/*
Navicat MySQL Data Transfer

Source Server         : Local Base
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : kreatornica

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-04-27 13:18:17
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('1', 'Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. Danas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi. Radovi i proizvodi iz radionice Kreatornice imaju jednako tradicionalnu kao i savremenu upotrebnu vrednost. Oni pre svega afirmišu i oživljavaju stare, zaboravljene tehnike ručnog i umetničko-majstorskog rada. Umetnici daju prednost prirodnim materijalima (drvo, tikve, poludrago kamenje, gvožđe, staklo, koža, prirodne tkanine, itd.) i stavljaju akcenat na slobodu umetničkog izraza. Rad udruženja obuhvata i zajedničke društveno-kulturne aktivnosti, upoznavanje zainteresovane javnosti, dece i starijih sa tehnikama konkretnih zanata i ručnog rada posredstvom edukativnih susreta i radionica, uključivanje iskusnih umetnika i ljubitelja umetnosti u aktivnosti udruženja i širenje entuzijazma za kreativan rad.', 'O nama', '', 'sr');
INSERT INTO `about` VALUES ('2', 'Kreatornica je združenie umelcov a remeselníkov z mesta Kovačica v Srbsku. Vzniklo v roku 2012. Dnes má šestnásť členov rôzneho umeleckého zamerania, ktorých spoločným cieľom je zachovať a propagovať staré remeslá a ručné práce, pestovať kultúrnu a umeleckú rozmanitosť v regióne a nadväzovať medzinárodnú spoluprácu s podobnými spolkami z celej Európy. Diela a výrobky z dielní Kreatornice majú jednak tradičnú, ako aj súčasnú úžitkovú hodnotu, predovšetkým však afirmujú a oživujú staré, zabudnuté postupy ručnej a umelecko-remeselníckej výroby. Umelci kladú dôraz na pírodné materiály (drevo, tekvice, polodrahokamy, kov, sklo, koža, prírodné tkaniny atď.) a na slobodu tvorby a umeleckého prejavu. Poslaním združenia sú i spoločensko-kultúrne aktivity, oboznamovanie zaintresovanej verejnosti, detí a seniorov s technikami konkrétnych remesiel a ručných prác prostredníctvom edukatívnych stretnutí a dielní, zapájanie skúsených umelcov a umeleckých nadšencov do činnosti združenia a všeobecné šírenie nadšenia pre tvorivú činnosť.', 'O nás', '', 'sk');
INSERT INTO `about` VALUES ('3', 'Kreatornica is an association of artists and craftsmen from Kovačica Serbia. It was founded in 2012. Today there are 16 members of various artistic interests, whose common objective of preserving and promoting traditional crafts and handicrafts, growing cultural and artistic diversity of the region as well as international cooperation with similar associations in Europe. Papers and articles from the workshop Kreatornice have equally traditional and contemporary usefulness. They primarily promote and bring to life old, forgotten techniques of manual and artistic masters `work`. Artists prefer `natural` materials (wood, gourds, precious stones, metals, glass, leather, `natural` fabrics, etc.) `And` put the emphasis `on` freedom of artistic expression. Article syndication also includes common socio-cultural activities, exploring the interested public, children `and` elderly people to the techniques of `specific` trades `and` manual labor through educational meetings `and` workshops, involvement of experienced artists `and` art lovers in the activities of the association `and` the spread of enthusiasm `for` creative `work`.', 'About us', '', 'en');

-- ----------------------------
-- Table structure for albums
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `contact_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contact_page
-- ----------------------------

-- ----------------------------
-- Table structure for gallery_page
-- ----------------------------
DROP TABLE IF EXISTS `gallery_page`;
CREATE TABLE `gallery_page` (
  `gallery_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `text_srb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_eng` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_img` blob NOT NULL,
  `alt_text` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of gallery_page
-- ----------------------------

-- ----------------------------
-- Table structure for member_page
-- ----------------------------
DROP TABLE IF EXISTS `member_page`;
CREATE TABLE `member_page` (
  `member_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_img` varchar(256) CHARACTER SET utf8 NOT NULL,
  `created_date` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of member_page
-- ----------------------------
INSERT INTO `member_page` VALUES ('2', 'Marina Bireš', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', 'maki.jpg', '1111111111', null, null);
INSERT INTO `member_page` VALUES ('3', 'Danijel Valovec', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', 'danjo.jpg', '222152122', null, null);
INSERT INTO `member_page` VALUES ('4', 'Ivana Veresky', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', 'ivana.jpg', '222511111', null, null);
INSERT INTO `member_page` VALUES ('5', 'Jaroslav Kralik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', 'jaroslav.jpg', '236255115', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('1', 'gdgdfg', '1', '14597.jpg');
INSERT INTO `photo` VALUES ('2', 'gdgdfg', '1', '32090.jpg');
INSERT INTO `photo` VALUES ('3', 'hfhfh', '1', '31627.jpg');
INSERT INTO `photo` VALUES ('4', 'gdfhdh', '0', '22960.jpg');
INSERT INTO `photo` VALUES ('5', 'sdgsdf', '0', '1558.jpg');
INSERT INTO `photo` VALUES ('6', 'ZigZag', '0', '27034.jpg');
INSERT INTO `photo` VALUES ('7', '', '0', '31436.jpg');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) DEFAULT NULL,
  `title_sr` text,
  `title_sk` text,
  `title_en` text,
  `text_sr` text,
  `text_sk` text,
  `text_en` text,
  `content_sr` text,
  `content_sk` text,
  `content_en` text,
  `created_date` int(11) DEFAULT NULL,
  `title_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `project_page`;
-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', 'Prvi', 'test projekat', 'Slovak title', 'English 3 title', 'asdasdasd', 'prvi', 'Third updated new', 'asdasdl;asjd;aldkjas;', 'contela;dka;dkas;', 'Novi tekst', '1111111111', '1461747741-Jellyfish.jpg');
INSERT INTO `projects` VALUES ('2', 'Drugi', 'Test 2 projekat', 'Slovak 2 title', 'English 2 title', 'asdadasd', 'drugi', 'Second', 'asdlka;jdlkasjda;lkdjasd;lskadjas;dlkjal;kasjd;l', 'asdasdadadasdsa', 'asdadasdsad', '888888888', '1461755853-Lighthouse.jpg');
INSERT INTO `projects` VALUES ('3', 'Treci', 'Test3 proj', 'Slovak 3 title', 'English 3 title', 'askdjakdja;ldkjal;kasj', 'treci', 'Third updated new', 'aldjaldkaj;a;slkja;dlk', 'asdasdas', 'Novi tekst', '1111111111', '1461747721-Desert.jpg');
