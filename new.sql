DROP TABLE IF EXISTS gallery_info;

CREATE TABLE `gallery_info` (
  `gallery_info_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `text` text,
  `lang` enum('sr','en','sk') NOT NULL DEFAULT 'sr',
  PRIMARY KEY (`gallery_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS gallery_page;

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(64) NOT NULL,
  `gallery_img` varchar(64) NOT NULL,
  `alt_text` varchar(150) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `gallery_info` VALUES (1, 1, 'Serbian prva text', 'sr');
INSERT INTO `gallery_info` VALUES (2, 1, 'English prva text', 'en');
INSERT INTO `gallery_info` VALUES (3, 1, 'Slovak prva text', 'sk');
INSERT INTO `gallery_info` VALUES (4, 2, 'Serbian druga text', 'sr');
INSERT INTO `gallery_info` VALUES (5, 2, 'English druga text', 'en');
INSERT INTO `gallery_info` VALUES (6, 2, 'Slovak druga text', 'sk');


INSERT INTO `gallery` VALUES (1, 'Prva galerija', '', 'Alt text prva');
INSERT INTO `gallery` VALUES (2, 'Druga galerija', '', 'Alt text druga');
