-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2016 at 02:31 PM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kreatornica`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `lang` enum('sr','sk','en') DEFAULT 'sr'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `text`, `title`, `subtitle`, `lang`) VALUES
(1, 'Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. Danas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi. Radovi i proizvodi iz radionice Kreatornice imaju jednako tradicionalnu kao i savremenu upotrebnu vrednost. Oni pre svega afirmišu i oživljavaju stare, zaboravljene tehnike ručnog i umetničko-majstorskog rada. Umetnici daju prednost prirodnim materijalima (drvo, tikve, poludrago kamenje, gvožđe, staklo, koža, prirodne tkanine, itd.) i stavljaju akcenat na slobodu umetničkog izraza. Rad udruženja obuhvata i zajedničke društveno-kulturne aktivnosti, upoznavanje zainteresovane javnosti, dece i starijih sa tehnikama konkretnih zanata i ručnog rada posredstvom edukativnih susreta i radionica, uključivanje iskusnih umetnika i ljubitelja umetnosti u aktivnosti udruženja i širenje entuzijazma za kreativan rad.', 'O nama', '', 'sr'),
(2, 'Kreatornica je združenie umelcov a remeselníkov z mesta Kovačica v Srbsku. Vzniklo v roku 2012. Dnes má šestnásť členov rôzneho umeleckého zamerania, ktorých spoločným cieľom je zachovať a propagovať staré remeslá a ručné práce, pestovať kultúrnu a umeleckú rozmanitosť v regióne a nadväzovať medzinárodnú spoluprácu s podobnými spolkami z celej Európy. Diela a výrobky z dielní Kreatornice majú jednak tradičnú, ako aj súčasnú úžitkovú hodnotu, predovšetkým však afirmujú a oživujú staré, zabudnuté postupy ručnej a umelecko-remeselníckej výroby. Umelci kladú dôraz na pírodné materiály (drevo, tekvice, polodrahokamy, kov, sklo, koža, prírodné tkaniny atď.) a na slobodu tvorby a umeleckého prejavu. Poslaním združenia sú i spoločensko-kultúrne aktivity, oboznamovanie zaintresovanej verejnosti, detí a seniorov s technikami konkrétnych remesiel a ručných prác prostredníctvom edukatívnych stretnutí a dielní, zapájanie skúsených umelcov a umeleckých nadšencov do činnosti združenia a všeobecné šírenie nadšenia pre tvorivú činnosť.', 'O nas', 'Podnaslov sk', 'sk'),
(3, 'Kreatornica is an association of artists and craftsmen from Kovačica Serbia. It was founded in 2012. Today there are 16 members of various artistic interests, whose common objective of preserving and promoting traditional crafts and handicrafts, growing cultural and artistic diversity of the region as well as international cooperation with similar associations in Europe. Papers and articles from the workshop Kreatornice have equally traditional and contemporary usefulness. They primarily promote and bring to life old, forgotten techniques of manual and artistic masters `work`. Artists prefer `natural` materials (wood, gourds, precious stones, metals, glass, leather, `natural` fabrics, etc.) `And` put the emphasis `on` freedom of artistic expression. Article syndication also includes common socio-cultural activities, exploring the interested public, children `and` elderly people to the techniques of `specific` trades `and` manual labor through educational meetings `and` workshops, involvement of experienced artists `and` art lovers in the activities of the association `and` the spread of enthusiasm `for` creative `work`.', 'About us', 'Podnaslov EN', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`) VALUES
(1, 'Kreatornica'),
(2, 'Kreatornica'),
(3, 'Slovacka'),
(4, 'Kovacica'),
(5, 'Kreatorci'),
(6, 'kfjskdpof');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `contact_id` tinyint(4) NOT NULL,
  `contact_name` varchar(150) NOT NULL,
  `contact_text` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_test`
--

CREATE TABLE `db_test` (
  `test_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_test`
--

INSERT INTO `db_test` (`test_id`, `name`, `last_name`, `email`, `phone`, `address`, `age`) VALUES
(1, 'Ivan', 'Pejic', 'pejicbgd@asdad', 'asdadas', 'asdadas', 25),
(2, 'Ivan', 'Pejic', 'pejicbgd@hotmail.com', 'asdadas', 'asdadas', 25),
(3, 'Ivan', 'Pejic', 'pejicbgd@asdad', 'asdadas', 'asdadas', 25),
(4, 'Ivan', 'Pejic', 'pejicbgd@asdad', 'asdadas', 'asdadas', 25);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(64) NOT NULL,
  `gallery_img` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`, `gallery_img`) VALUES
(1, 'Prva galerija', '1473709794-Hydrangeas.jpg'),
(2, 'Druga galerija', ''),
(5, 'Najnovija', 'head.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_info`
--

CREATE TABLE `gallery_info` (
  `gallery_info_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `text` text,
  `title` text,
  `content` text,
  `lang` enum('sr','en','sk') NOT NULL DEFAULT 'sr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_info`
--

INSERT INTO `gallery_info` (`gallery_info_id`, `gallery_id`, `text`, `title`, `content`, `lang`) VALUES
(0, 5, 'Tekst srpski', 'Naslov srpski', 'Srpski kontent', 'sr'),
(1, 1, 'srpski text', 'srpski title', 'srpski content', 'sr'),
(2, 1, 'Engleski text', 'Eng title', 'Engleski content', 'en'),
(3, 1, 'Text slovacki', 'Title slovacki', 'content slovacki', 'sk'),
(4, 2, 'Serbian druga text', NULL, NULL, 'sr'),
(5, 2, 'English druga text', NULL, NULL, 'en'),
(6, 2, 'Slovak druga text', NULL, NULL, 'sk');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `naslovna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`naslovna`, `video`) VALUES
('header_unsplash.jpg', '7_k0ZqDvX8A');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` tinyint(4) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `member_img` varchar(256) DEFAULT NULL,
  `updated_date` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefon` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `member_img`, `updated_date`, `email`, `telefon`) VALUES
(1, 'Marina Bireš', '1475521996-Koala.jpg', 1475521996, NULL, '12312'),
(2, 'Danijel Valovec', 'danjo.jpg', 222152122, NULL, '3211'),
(3, 'Ivana Veresky', 'ivana.jpg', 222511111, NULL, '55625'),
(4, 'Jaroslav Kralik', 'jaroslav.jpg', 236255115, NULL, '8892318585'),
(5, 'Ivan Pejic', 'Koala.jpg', 1466848857, 'pejicbgd@hotmail.com', '132546'),
(8, 'Novi member', '1473003539-Penguins.jpg', 1473003539, 'pejicbgd@yahoo.cm', '632266551');

-- --------------------------------------------------------

--
-- Table structure for table `member_bio`
--

CREATE TABLE `member_bio` (
  `member_bio_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `lang` enum('en','sk','sr') NOT NULL DEFAULT 'sr',
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_bio`
--

INSERT INTO `member_bio` (`member_bio_id`, `member_id`, `lang`, `text`) VALUES
(1, 1, 'sr', 'Serbian Bio anoter'),
(2, 1, 'sk', 'Slovak Bio anoter'),
(3, 1, 'en', 'Engleski Bio tekst'),
(4, 2, 'sr', 'Serbian Bio anoter'),
(5, 2, 'sk', 'Slovak Bio anoter'),
(6, 2, 'en', 'Serbian Bio anoter'),
(7, 3, 'sr', 'Serbian Bio anoter'),
(8, 3, 'sk', 'Slovak anoter'),
(9, 3, 'en', 'Serbian Bio anoter'),
(10, 4, 'sr', 'Serbian Bio anoter'),
(11, 4, 'sk', 'Slovak Bio anoter'),
(12, 4, 'en', 'Serbian Bio anoter'),
(16, 5, 'sr', 'Serbian Bio anoter'),
(18, 8, 'sk', 'Slovak Bio anoter'),
(24, 8, 'sk', 'Slovak Bio anoter'),
(25, 8, 'sk', 'Slovak Bio anoter'),
(26, 1, 'en', 'Engleski Bio tekst');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `name`, `album_id`, `url`) VALUES
(1, 'gdgdfg', 1, '14597.jpg'),
(2, 'gdgdfg', 1, '32090.jpg'),
(3, 'hfhfh', 1, '31627.jpg'),
(4, 'gdfhdh', 0, '22960.jpg'),
(5, 'sdgsdf', 0, '1558.jpg'),
(6, 'ZigZag', 0, '27034.jpg'),
(7, 'vasda', 0, '31436.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT '0',
  `created_date` int(11) DEFAULT NULL,
  `title_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `gallery_id`, `created_date`, `title_img`) VALUES
(1, 'Prvi projekat', 2, 1474707383, '1474707383-Lighthouse.jpg'),
(2, 'Drugi projekat', NULL, 1474733177, '1474733177-Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects_info`
--

CREATE TABLE `projects_info` (
  `projects_info_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `text` text,
  `content` text,
  `lang` enum('en','sr','sk') NOT NULL DEFAULT 'sr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects_info`
--

INSERT INTO `projects_info` (`projects_info_id`, `project_id`, `title`, `text`, `content`, `lang`) VALUES
(1, 1, 'Prvi srpski naslov', 'Srpski text prvog', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &#34;Lorem ipsum dolor sit amet..&#34;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &#34;de Finibus Bonorum et Malorum&#34; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'sr'),
(2, 1, 'Slovacki Naslov', 'sdfsfsd', 'sdfsfds', 'sk'),
(4, 1, 'Engleski naslov', 'asdasdsad', 'adadas', 'en'),
(5, 2, 'Srpski drugi naslov updated', 'Tekst srpski za drugi', 'Sadrzaj srpski za drugi', 'sr'),
(6, 2, 'Slovacki drugi naslov', 'Teks SLovacki za drugi', 'Text za drugi Slovacki\r\n', 'sk'),
(7, 2, '', '', '', 'en'),
(8, 0, '', '', '', 'sr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `db_test`
--
ALTER TABLE `db_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `gallery_info`
--
ALTER TABLE `gallery_info`
  ADD PRIMARY KEY (`gallery_info_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_bio`
--
ALTER TABLE `member_bio`
  ADD PRIMARY KEY (`member_bio_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `fk_gallery_id` (`gallery_id`);

--
-- Indexes for table `projects_info`
--
ALTER TABLE `projects_info`
  ADD PRIMARY KEY (`projects_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `contact_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_test`
--
ALTER TABLE `db_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member_bio`
--
ALTER TABLE `member_bio`
  MODIFY `member_bio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects_info`
--
ALTER TABLE `projects_info`
  MODIFY `projects_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
