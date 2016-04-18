-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 12:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kreatornica`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `about_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `text_srb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_eng` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `text_srb`, `text_sk`, `text_eng`) VALUES
(1, 'Kreatornica je udruženje umetnika i zanatlija iz mesta Kovačica u Srbiji. Osnovano je 2012 godine. \r\nDanas broji 16 članova raznog umetničkog interesovanja, čiji su zajednički ciljevi očuvanje i propagiranje starih zanata i ručnih radova, gajenje kulturne i umetničke raznolikosti u regionu, kao i međunarodna saradnja sa sličnim udruženjima u Evropi. Radovi i proizvodi iz radionice Kreatornice imaju jednako tradicionalnu kao i savremenu upotrebnu vrednost.\r\n Oni pre svega afirmišu i oživljavaju stare, zaboravljene tehnike ručnog i umetničko-majstorskog rada. Umetnici daju prednost prirodnim materijalima (drvo, tikve, poludrago kamenje, gvožđe, staklo, koža, prirodne tkanine, itd.) i stavljaju akcenat na slobodu umetničkog izraza. Rad udruženja obuhvata i zajedničke društveno-kulturne aktivnosti, upoznavanje zainteresovane javnosti, dece i starijih sa tehnikama konkretnih zanata i ručnog rada posredstvom edukativnih susreta i radionica, uključivanje iskusnih umetnika i ljubitelja umetnosti u aktivnosti udruženja i širenje entuzijazma za kreativan rad.', 'Kreatornica je združenie umelcov a remeselníkov z mesta Kovačica v Srbsku. Vzniklo v roku 2012. \r\nDnes má šestnásť členov rôzneho umeleckého zamerania, ktorých spoločným cieľom je zachovať a propagovať staré remeslá a ručné práce, pestovať kultúrnu a umeleckú rozmanitosť v regióne a nadväzovať medzinárodnú spoluprácu s podobnými spolkami z celej Európy. \r\nDiela a výrobky z dielní Kreatornice majú jednak tradičnú, ako aj súčasnú úžitkovú hodnotu, predovšetkým však afirmujú a oživujú staré, zabudnuté postupy ručnej a umelecko-remeselníckej výroby. Umelci kladú dôraz na pírodné materiály (drevo, tekvice, polodrahokamy, kov, sklo, koža, prírodné tkaniny atď.) a na slobodu tvorby a umeleckého prejavu. \r\nPoslaním združenia sú i spoločensko-kultúrne aktivity, oboznamovanie zaintresovanej verejnosti, detí a seniorov s technikami konkrétnych remesiel a ručných prác prostredníctvom edukatívnych stretnutí a dielní, zapájanie skúsených umelcov a umeleckých nadšencov do činnosti združenia a všeobecné šírenie nadšenia pre tvorivú činnosť.', 'Kreatornica is an association of artists and craftsmen from Kovačica Serbia. It was founded in 2012.\r\nToday there are 16 members of various artistic interests, whose common objective of preserving and promoting traditional crafts and handicrafts, growing cultural and artistic diversity of the region as well as international cooperation with similar associations in Europe. Papers and articles from the workshop Kreatornice have equally traditional and contemporary usefulness.\r\n They primarily promote and bring to life old, forgotten techniques of manual and artistic masters `work`. Artists prefer `natural` materials (wood, gourds, precious stones, metals, glass, leather, `natural` fabrics, etc.) `And` put the emphasis `on` freedom of artistic expression. Article syndication also includes common socio-cultural activities, exploring the interested public, children `and` elderly people to the techniques of `specific` trades `and` manual labor through educational meetings `and` workshops, involvement of experienced artists `and` art lovers in the activities of the association `and` the spread of enthusiasm `for` creative `work`.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE IF NOT EXISTS `contact_page` (
  `contact_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_page`
--

CREATE TABLE IF NOT EXISTS `gallery_page` (
  `gallery_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `text_srb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_eng` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_img` blob NOT NULL,
  `alt_text` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member_page`
--

CREATE TABLE IF NOT EXISTS `member_page` (
  `member_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_srb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_eng` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_img` blob NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member_page`
--

INSERT INTO `member_page` (`member_id`, `member_name`, `text_srb`, `text_sk`, `text_eng`, `member_img`) VALUES
(1, 'Pavel Veresky', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat.', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac diam eu nibh faucibus semper vel non libero. Sed imperdiet eu purus nec commodo. Maecenas pulvinar mi sed dui rhoncus scelerisque. Aenean aliquet, dui eu accumsan tempus, diam dui auctor orci, vitae posuere nunc diam nec nisl. Etiam in urna enim. Quisque nec luctus nunc. Fusce sodales faucibus sapien eu varius. Proin consectetur risus in metus consequat tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent fringilla molestie maximus. Cras tellus justo, condimentum non iaculis sit amet, vehicula a eros. Mauris pulvinar iaculis ante, a bibendum nibh. Quisque sit amet massa sagittis, scelerisque arcu nec, facilisis velit.', ''),
(2, 'Marina Bireš', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', ''),
(3, 'Danijel Valovec', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', ''),
(4, 'Ivana Veresky', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', ''),
(5, 'Jaroslav Kralik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla egestas interdum elit eu cursus. Sed finibus non dolor non ullamcorper. Praesent sed mauris nec neque vehicula imperdiet. Vivamus vitae erat sed neque bibendum facilisis. In felis purus, tempor ornare metus facilisis, accumsan scelerisque odio. Vivamus malesuada varius lacus, id consectetur justo convallis vitae. Praesent tempor lacus vitae lectus dapibus volutpat. ', 'Integer commodo ex sed elit egestas, quis ultricies ante ultricies. Aliquam sagittis risus eros, sed consequat nulla dapibus lacinia. Donec viverra fringilla tincidunt. Quisque nibh enim, pretium eget ex quis, tristique facilisis massa. Quisque in neque dui. Pellentesque varius, est ullamcorper sollicitudin pharetra, nisl nunc volutpat leo, a laoreet eros magna mollis turpis. Pellentesque sagittis dui vulputate leo porttitor blandit. Pellentesque scelerisque ligula ac nisi ultricies, nec mattis nunc vulputate. Pellentesque eleifend ante non varius interdum. ', 'Vivamus quis enim ante. Phasellus malesuada interdum pharetra. Aliquam malesuada mauris eu lectus rhoncus finibus. Pellentesque condimentum quis libero eu posuere. Mauris quam eros, ultrices eu feugiat non, luctus et leo. Suspendisse eleifend vel nisi sed vulputate. Etiam pretium volutpat ante, ut congue quam dictum a. Phasellus odio quam, rhoncus ac molestie in, sollicitudin eu enim. Nullam consectetur finibus lectus, egestas condimentum nisi consequat quis. Etiam elementum dui non orci fringilla gravida.', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_page`
--

CREATE TABLE IF NOT EXISTS `project_page` (
  `project_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `text_srb` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_sk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_eng` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` blob NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_page`
--

INSERT INTO `project_page` (`project_id`, `text_srb`, `text_sk`, `text_eng`, `project_img`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada neque sed consectetur rutrum. Cras at purus ut ipsum aliquam pretium in porttitor tellus. Morbi fringilla, purus id lacinia aliquet, lorem nunc aliquet leo, ut viverra arcu elit non nibh. Vivamus quis dui a mi sagittis porta ut ut arcu. Ut ut fermentum diam. Morbi dignissim, neque et ultrices rutrum, ligula est sagittis nulla, vel semper mi dui ac enim. Nulla vel erat varius metus ultrices bibendum. Nullam non lorem in dolor posuere viverra vitae at nibh. Vestibulum et dolor molestie, tempus orci sagittis, pulvinar quam. Vestibulum fringilla rutrum neque. Phasellus sapien orci, dignissim sit amet iaculis sit amet, convallis non augue. Etiam consequat purus luctus, finibus risus vitae, convallis diam. Curabitur ac libero dictum, sagittis orci blandit, ultricies ipsum. Nulla commodo tortor quam, aliquam interdum odio maximus in. Nullam lacinia iaculis efficitur.', 'Lorem Ipsum je demonstrativní výplňový text používaný v tiskařském a knihařském průmyslu. Lorem Ipsum je považováno za standard v této oblasti už od začátku 16. století, kdy dnes neznámý tiskař vzal kusy textu a na jejich základě vytvořil speciální vzorovou knihu. Jeho odkaz nevydržel pouze pět století, on přežil i nástup elektronické sazby v podstatě beze změny. Nejvíce popularizováno bylo Lorem Ipsum v šedesátých letech 20. století, kdy byly vydávány speciální vzorníky s jeho pasážemi a později pak díky počítačovým DTP programům jako Aldus PageMaker.\r\n\r\nJe obecně známou věcí, že člověk bývá při zkoumání grafického návrhu rozptylován okolním textem, pokud mu dává nějaký smysl. Úkolem Lorem Ipsum je pak nahradit klasický smysluplný text vhodnou bezvýznamovou alternativou s relativně běžným rozložením slov. To jej dělá narozdíl od opakujícího se "Tady bude text. Tady bude text..." mnohem více čitelnějším. V dnešní době je Lorem Ipsum používáno spoustou DTP balíků a webových editorů coby výchozí model výplňového textu. Ostatně si zkuste zadat frázi "lorem ipsum" do vyhledavače a sami uvidíte. Během let se objevily různé varianty a odvozeniny od klasického Lorem Ipsum, někdy náhodou, někdy účelně (např. pro pobavení čtenáře).', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
