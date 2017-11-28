-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 18 dec 2016 kl 15:48
-- Serverversion: 5.6.17
-- PHP-version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `5`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `controller` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `url`, `controller`) VALUES
(0, 'home', '', 'index'),
(1, 'shop', 'shop', 'shop'),
(2, 'news', 'news', 'news'),
(3, 'my account', 'user', 'user'),
(4, 'help', 'help', 'x');

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` varchar(100) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `post_time` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumpning av Data i tabell `news`
--

INSERT INTO `news` (`news_id`, `link_id`, `headline`, `content`, `post_time`, `user_id`) VALUES
(1, 'studenten-misstanks-ha-salt-kemiska-vapen-1', 'Studenten misstänks ha sålt kemiska vapen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lectus at nisl fermentum pellentesque id at magna. Suspendisse eu eros ligula. Etiam eu ligula et mi auctor tristique vitae non risus. Nam auctor eros est. Curabitur porttitor venenatis tellus, ac dictum quam rutrum vitae. Nam malesuada bibendum libero, pharetra viverra eros commodo vel. Integer turpis turpis, laoreet id.\r\n\r\nokej..', 1111323675, 1),
(2, 'news-test-2', 'NEWS TEST 2', 'Aliquam condimentum eu arcu id luctus. Nunc varius odio id ex volutpat posuere. Phasellus metus odio, porta non ultricies ac, porta eget metus. Donec auctor enim ac sem malesuada laoreet. Suspendisse sed condimentum ex. Cras iaculis finibus commodo. Cras magna massa, facilisis sit amet metus nec, suscipit aliquam lacus. Sed ullamcorper ligula erat, id rutrum arcu pulvinar at. Sed sit amet lorem a\r\nturpis ultricies condimentum. Quisque euismod orci ligula, ut cursus sapien auctor eget. Quisque malesuada, tortor gravida sagittis tincidunt, ipsum augue elementum metus, at condimentum elit ligula eu nulla. Sed sodales molestie ex, eget vulputate turpis elementum quis. Praesent pellentesque, justo non ultrices venenatis, lorem dui viverra magna, et sagittis erat libero a sem. Mauris aliquet enim eros, volutpat dapibus sapien molestie in. Aliquam feugiat est sapien, et blandit augue imperdiet a.\r\n\r\nDuis semper quis orci quis dignissim. Donec cursus magna nec elit iaculis, sit amet imperdiet libero pulvinar. Donec non tempus orci. Nulla arcu ex, maximus id est ut, facilisis tincidunt massa. Nam consectetur orci quis iaculis tempus. Vivamus pulvinar tempus interdum. In placerat, purus at porttitor dapibus, velit metus laoreet ipsum, et consequat est erat vitae nulla.', 0, 0),
(3, 'maecenas-nulla-lacus-bokoharam', 'Maecenas nulla lacus, bokoharam!', 'Aliquam condimentum eu arcu id luctus. Nunc varius odio id ex volutpat posuere. Phasellus metus odio, porta non ultricies ac, porta eget metus. Donec auctor enim ac sem malesuada laoreet. Suspendisse sed condimentum ex. Cras iaculis finibus commodo. Cras magna massa, facilisis sit amet metus nec, suscipit aliquam lacus. Sed ullamcorper ligula erat, id rutrum arcu pulvinar at. Sed sit amet lorem a turpis ultricies condimentum. Quisque euismod orci ligula, ut cursus sapien auctor eget. Quisque malesuada, tortor gravida sagittis tincidunt, ipsum augue elementum metus, at condimentum elit ligula eu nulla. Sed sodales molestie ex, eget vulputate turpis elementum quis. Praesent pellentesque, justo non ultrices venenatis, lorem dui viverra magna, et sagittis erat libero a sem. Mauris aliquet enim eros, volutpat dapibus sapien molestie in. Aliquam feugiat est sapien, et blandit augue imperdiet a.\r\n\r\nDuis semper quis orci quis dignissim. Donec cursus magna nec elit iaculis, sit amet imperdiet libero pulvinar. Donec non tempus orci. Nulla arcu ex, maximus id est ut, facilisis tincidunt massa. Nam consectetur orci quis iaculis tempus. Vivamus pulvinar tempus interdum. In placerat, purus at porttitor dapibus, velit metus laoreet ipsum, et consequat est erat vitae nulla.\r\n\r\nNullam auctor at justo nec feugiat. Morbi rutrum faucibus iaculis. Cras ut lectus finibus dolor ullamcorper posuere non ut ligula. Praesent pharetra mi nec mi vestibulum pharetra. Donec venenatis convallis condimentum. Donec commodo libero vitae mi imperdiet rutrum eu sit amet odio. Mauris malesuada in arcu luctus fringilla. Etiam molestie hendrerit leo, eget vehicula ipsum feugiat quis. In convallis tellus sed nibh porta volutpat. Maecenas nulla lacus, mattis eu mauris id, elementum venenatis ligula. Donec ac laoreet dui. Fusce id dui consequat, pharetra lorem id, gravida libero. Vivamus ultrices, elit non pellentesque maximus, purus justo cursus mi, eget fermentum ante lectus quis tortor.', 0, 0),
(69, 'allahu-ho-akbar-2', 'allahu ho akbar 2', 'Jag gillar verkligen Boden &lt;3', 1478017322, 0),
(70, 'vi-som-bor-i-boden-1', '´Vi som bor i &quot;BODEN&quot;', 'Jag gillar verkligen Boden &lt;3', 1478017341, 0),
(73, 'new-1', 'new', '123', 1478017632, 0),
(74, 'new-2', 'new', '123', 1478017640, 0),
(75, 'authorize-1', 'authorize', 'sdf', 1478017649, 0),
(76, 'asdf', 'asdf', 'sddds', 1478017662, 0),
(77, '-----sqwag', '? ? ? ? ? sqwag', 'asdf', 1478017863, 0),
(78, '23-2-3aaaaswga', '23 2 3*&quot;#¤&quot;)#¤&quot;)#)#¤)&quot;#)¤SWGA', 'asdf', 1478017920, 0),
(79, 'make-america-great-again', 'MAKE AMERICA GREAT AGAIN', '? ? \r\nAtt intresset för USA-valet är mycket stort bland Aftonbladets läsare råder det inga tvivel om.\r\n\r\n– Vår ambition är att vara hela Sveriges nyhetskälla och därför känns det kul att vi har läsarnas förtroende även här. USA-valet är en av årets viktigaste nyhetshändelser och vi märker att det finns ett massivt intresse och engagemang hos vår publik, säger Martin Schori, utrikesredaktör på Aftonbladet.', 1478018164, 0),
(82, 'jag-hatar-fan-postnord', 'jag hatar fan postnord', 'murica fack yeah...', 1478102238, 2),
(83, 'slj-postnord-till-ryssland', 'SÄLJ POSTNORD TILL RYSSLAND', 'Nu har FA:s dom kommit. Det har tidigare spekulerats i att Mourinho skulle stängas av i två matcher och därmed missa mötet med Arsenal den 19 november.\r\n\r\nSå blir det dock inte. Mourinho tvingas bara stå åt sidan i en match, den mot Swansea nu på söndag.\r\n\r\nDessutom tvingas han böta totalt 50 000 pund för de båda förseelserna, motsvarande cirka 552 000 kronor.\r\n\r\nManchester United möter Fenerbahçe i Istanbul på torsdag klockan 19.00.', 1478112870, 2),
(84, 'salj-postnord-till-ryssland', 'SÄLJ POSTNORD TILL RYSSLAND', 'adsf', 1478112927, 2),
(85, 'x', 'x', 'asdfffffff\r\n\r\nsdf\r\nsdf', 1478264684, 2),
(86, 'asdfffffffffff', 'asdfffffffffff', 'adsfffffffff', 1478264819, 2),
(87, 'asdf-2', 'asdf', 'asdf', 1478264884, 2),
(88, 'allahu-akbar-idag', 'allahu akbar idag', '123', 1478340227, 2),
(89, '1', '1', '1', 1478346175, 2),
(96, 'adf', 'adf', 'asdf', 1478347549, 2),
(97, 'adf-1', 'adf', 'asdf', 1478347863, 2),
(98, 'ds', 'ds', 'ds', 1478348038, 2),
(100, 'asdf-5', 'asdf', 'asdf', 1478348449, 2),
(101, 'wer', 'wer', 'sdf', 1478348593, 2),
(103, 'adf-2', 'adf', 'sd', 1478348657, 2),
(104, 'ds-1', 'ds', 'ds', 1478348728, 2),
(105, 'asdf-6', 'asdf', 'asdf', 1478348799, 2),
(106, 'asdf-7', 'asdf', 'asdf', 1478350356, 2),
(107, 'asdf-8', 'asdf', 'asdf', 1478350383, 2),
(110, 'asdf-9', 'asdf', 'ASD', 1478350545, 2),
(115, 'asdf-12', 'asdf', 'asdf', 1478350922, 2),
(116, 'adsf-2', 'adsf', 'asdf', 1478351424, 2),
(123, 'fackaina', 'FACKAINA', 'OSV', 1478351581, 2),
(124, 'swag-2', 'SWAG', 'dddahgads ha ds asd', 1478351682, 2),
(125, 'hata-polisen', 'HATA POLISEN', 'Ad fsdfpo oisd ofnos dnioinso dndo nsois nos nos nd s \r\ndds sd', 1478357074, 2),
(157, 'sverige-kommer-att-laggas-ner', 'Sverige kommer att läggas ner!', 'Postnords fel äre...', 1478449764, 2),
(161, 'vi-som-hatar-postnord', 'VI SOM HATAR POSTNORD', 'En som däremot får kontinuerlig speltid, men ännu inte fått chansen i Janne Anderssons landslag är Mikael Ishak.\r\n\r\nDen 23-årige anfallaren, till vardags i danska Randers, har gjort sju mål på 13 matcher vilket gör honom till en av de främsta anfallarna i den danska ligan.\r\n\r\nOch nu ifrågasätter 23-åringen varför han ratas i landslaget.\r\n\r\n– När jag ser på spelarna som är uttagna nu – och som inte får så mycket speltid – funderar jag på det. Men det kanske har något med ligan att göra. Jag tycker att danska Superligan är bra, men det kan vara så att de inte delar den udppfattningen, säger Randersanfallaren enligt Ekstrabladet.', 1478510337, 2),
(162, 'trump-2017', 'TRUMP 2017', 'Entusiasmen för Trump och hans idéer har inte varit översvallande i kongressblocket efter talmannen Paul Ryans råd till sina kolleger att ”följa sitt samvete” i presidentvalet. Något hjärtligt förhållande mellan de två ledande republikanerna Trump och Ryan råder alltså definitivt inte och en dragkamp kan vänta.\r\n\r\nKongressrepublikanerna måste nu syna Trumps valprogram och bedöma hur realistiskt det är. Ett ja till en massiv skattesänkning kan säkert klubbas och de lär godkänna Trumps HD-domare. Men framför allt slipper de veto-hot från presidenten den dag de röstar ner Obamacare. Frågan vad som ska hända med 20 miljoner människor som fått tillgång till vård har inte besvarats och förslagen till en ny vårdreform är skissartade.\r\n\r\nFinansiering av massdeporteringar kan bli kärvt – likaså är republikaner normalt frihandelsvänner även om de nog gärna instämmer i anklagelser om att Kina manipulerar valutan.\r\n\r\n#Kayne2020', 1478701161, 2),
(163, 'kayne2020', '#KAYNE2020', 'REDBOOK är fan bäst!', 1478701335, 2),
(166, 'studenten-misstanks-ha-salt-kemiska-vapen', 'Studenten misstänks ha sålt kemiska vapen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lectus at nisl fermentum pellentesque id at magna. Suspendisse eu eros ligula. Etiam eu ligula et mi auctor tristique vitae non risus. Nam auctor eros est. Curabitur porttitor venenatis tellus, ac dictum quam rutrum vitae. Nam malesuada bibendum libero, pharetra viverra eros commodo vel. Integer turpis turpis, laoreet id.''\r\n\r\n* ALLAH&amp;amp;amp;amp;amp;amp;amp;quot;#*%=&amp;amp;amp;amp;amp;amp;amp;quot;(#%?&amp;amp;amp;amp;amp;amp;amp;quot;#%\r\n\r\n*ABKAR\r\n*BOOM \r\nhttp://localhost/5/public_html/news/edit\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lectus at nisl fermentum pellentesque id at magna. Suspendisse eu eros ligulhttp://localhost/5/public_html/newsa. Etiam eu ligula et mi auctor tristique vitae non risus. Nam auctor eros est. Curabitur porttitor venenatis tellus, ac dictum quam rutrum vitae. Nam malesuada bibendum libero, pharetra viverra eros commodo vel. Integer turpis turpis, laoreet id.', 1478853679, 2),
(187, 'trump-det-sade-clinton-nar-hon-ringde-mig', 'Trump: Det sade Clinton när hon ringde mig', '– ALLAHU AKBAR var (kanske) ett jobbigt samtal för henne. Jag menar, jag kan föreställa mig det. Jobbigare för henne än vad det hade varit för mig och för mig hade det varit väldigt, väldigt svårt, säger Donald Trump till CBS 60 Minutes Lesley Stahl.\r\n\r\n”Grattis, Donald. Bra jobbat”, ska Clinton ha sagt, enligt Trump som tackade henne med beröm om att hon varit en god rival. ”Hon är är mycket stark och mycket smart”, säger Trump.\r\n\r\nHan beskriver hennes ton som väldigt trevlig och det samma gäller Bill Clinton som också ska ha ringt Trump med stor ödmjukhet. Trump säger i intervjun att han definitivt kan överväga att slå den tidigare presidenten Clinton en signal om han behöver råd.\r\n\r\nisis', 1478961109, 2),
(188, 'vi-som-hatar-postnord-1', 'VI SOM HATAR POSTNORD', 'Postnords rörelseresultat rasar under tredje kvartalet, från 33 miljoner kronor i fjol, till minus 101 miljoner.\r\n\r\n– Resultatet präglas av fortsatta utmaningar främst i form av kraftigt fallande brevvolymer men också av hård konkurrens på logistikmarknaden, skriver vd Håkan Eriksson.\r\n\r\nOmsättningen sjunker. Från 9 218 miljoner kronor till 8 895 miljoner kronor.\r\n\r\nFramför allt är det brevvolymen som minskar – den är 8 procent lägre nu jämfört med för ett år sedan. Störst är tappet i Danmark, minskningen där är 17 procent, i Sverige 6 procent.\r\nNu väntar fler besparingar.\r\n\r\n– Åtgärder vidtas för att ytterligare reducera kostnaderna samt skapa nya intäkter med ett attraktivt nordiskt helhetserbjudande.\r\n\r\nDÖD ÅT POSTNORD!', 1479548926, 2),
(189, 'allahu-ho-akbar', 'allahu ho akbar', '- allah ska med!', 1479565673, 2),
(190, 'alla-vi-som-hatar-postnordz', 'Alla vi som hatar #postnordz', 'Det är dags att avveckla verksamheten och lägga ner skiten..', 1479566954, 2),
(191, 'tre-till-sjukhus-efter-knivskarning-pa-fest', 'Tre till sjukhus efter knivskärning på fest', 'Tre unga män har förts till sjukhus efter en knivskärning på en fest i Rågsved.\r\n\r\nDe har bland annat knivskurits i ansiktet.\r\n\r\n– Vi har ingen misstänkt än så länge, säger Mats Brännlund vid Stockholmspolisen.\r\n\r\nKlockan 03.14 natten till lördag larmades polis och ambulans till en fest vid Folkets hus i Rågsved.\r\n\r\nMinst tre män har överfallits av en eller flera gärningsmän.\r\n\r\n– De har skurits med kniv eller glas, det är lite oklart än så länge, men de har skador i sina ansikten, säger Mats Brännlund, vakthavande befäl vid Stockholmspolisen.\r\nTre unga män till sjukhus\r\n\r\nMännen, som alla är födda på 90-talet, har förts till sjukhus för sina skador, men skadeläget är oklart. Enligt polisen ska ingen av dem ha livshotande skador.\r\n\r\nÄn så länge finns ingen misstänkt gärningsman.\r\n\r\n– Vi vet inte om det var en en eller flera gärningsmän och jag vet inte om de här personerna varit på festen, säger han.\r\nVill inte sammarbeta\r\n\r\nFlera personer har blivit vittnen till händelsen och de ska höras under dagen.\r\n\r\nEnligt polisen har de skadade männen ”inte varit sammarbetsvilliga” när de besökt sjukhuset.\r\n\r\n– Vi gör en teknisk undersökning på platsen och sedan ska vi höra vittnen och försöka prata med målsägande, säger Mats Brännlund.\r\n\r\nBrottet rubriceras i nuläget som grov misshandel.', 1480759221, 2),
(192, 'jag-hatar-polisen', 'JAG HATAR POLISEN', 'FACKAINA', 1480765580, 2),
(193, 'man-daod-efter-skjutning-i-tensta', 'Man död efter skjutning i Tensta', 'Den unge mannen som sköts i ett skogsparti i Tensta i nordvästra Stockholm har avlidit.\r\nDet bekräftar polisen för Aftonbladet.\r\n– Han avled sent i natt och brottsrubriceringen har ändrats till mord, säger presstalespersonen Carina Skagerlind.\r\n\r\nDet var på tisdagskvällen som polisen fick larm om en skottlossning i ett skogsområde i Stockholmsförorten Tensta. På platsen påträffades en ung man, som skjutits flera gånger. Han hade bland annat träffats i ansiktet.\r\nMannen fördes till sjukhus, men hans liv gick inte att rädda.\r\n– Han avled sent på onsdagsnatten. Brottsrubriceringen har följdaktligen ändrats från mordförsök till mord, säger Carina Skagerlind, presstalesperson vid polisen i Stockholm.\r\nTvå anhållna\r\nSedan tidigare sitter två män anhållna misstänkta för delaktighet i brottet.\r\n– De är fortsatt misstänkta för inblandning i detta. Vi ska prata med dem nu på morgonen, säger Carina Skagerlind.\r\nHon fortsätter:\r\n– Vi arbetar vidare med jobbet i hela Järva. Det handlar dels om utredningarna var för sig och hela sammanhanget. Dessutom fortsätter vi med det trygghetsskapande arbetet i området. Vi är på plats för att prata med människor och söka vittnen.', 1481796239, 4);

-- --------------------------------------------------------

--
-- Tabellstruktur `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_link` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `thumbnail` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumpning av Data i tabell `shop`
--

INSERT INTO `shop` (`item_id`, `item_link`, `name`, `price`, `thumbnail`) VALUES
(98, 'nike-air-force-1', 'Nike Air Force 1', 99.49, 2),
(99, 'air-force-1-high-lv8-gs', 'Air Force 1 High LV8 (GS)', 79, 4),
(100, 'the-north-face-dryzzle-jacket', 'The North Face Dryzzle Jacket', 120, 7);

-- --------------------------------------------------------

--
-- Tabellstruktur `shop_cart`
--

CREATE TABLE IF NOT EXISTS `shop_cart` (
  `cart_id` int(11) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `added` varchar(20) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `shop_cart`
--

INSERT INTO `shop_cart` (`cart_id`, `user_ip`, `added`) VALUES
(133480, '::1', '1481813902'),
(159381, '::1', '1481813901'),
(184759, '::1', '1482068443'),
(222140, '::1', '1482068946'),
(222497, '::1', '1481909139'),
(263970, '::1', '1482072379'),
(290283, '::1', '1482065196'),
(313958, '192.168.1.211', '1481965320'),
(333789, '::1', '1481813904'),
(342248, '::1', '1482070404'),
(396163, '::1', '1481813906'),
(404074, '::1', '1482072027'),
(410995, '::1', '1482070604'),
(464828, '::1', '1482070490'),
(498611, '::1', '1482071157'),
(505999, '::1', '1481813905'),
(506192, '::1', '1481813192'),
(525582, '::1', '1482072255'),
(640774, '::1', '1482071472'),
(656182, '::1', '1481813384'),
(670162, '::1', '1482071236'),
(673211, '::1', '1482070051'),
(722073, '::1', '1481813905'),
(752835, '::1', '1482072498'),
(770825, '::1', '1482065452'),
(806503, '::1', '1482069328'),
(829135, '::1', '1482071372'),
(830892, '::1', '1482069766'),
(874893, '::1', '1482070574'),
(895547, '::1', '1482071621'),
(938229, '::1', '1482067669'),
(943832, '::1', '1482068683'),
(962234, '::1', '1482072190');

-- --------------------------------------------------------

--
-- Tabellstruktur `shop_cart_items`
--

CREATE TABLE IF NOT EXISTS `shop_cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=442 ;

--
-- Dumpning av Data i tabell `shop_cart_items`
--

INSERT INTO `shop_cart_items` (`id`, `cart_id`, `item_id`, `quantity`) VALUES
(308, 506192, 100, 1),
(309, 506192, 98, 2),
(313, 159381, 98, 1),
(314, 133480, 98, 1),
(315, 333789, 98, 1),
(316, 722073, 98, 1),
(317, 505999, 98, 1),
(331, 656182, 100, 1),
(332, 656182, 98, 2),
(369, 313958, 98, 2),
(387, 222497, 98, 1),
(414, 770825, 99, 1),
(415, 770825, 98, 5),
(416, 770825, 100, 1),
(417, 938229, 99, 1),
(419, 184759, 99, 1),
(420, 184759, 98, 5),
(421, 943832, 98, 1),
(422, 222140, 98, 1),
(424, 806503, 99, 1),
(425, 830892, 99, 1),
(426, 673211, 99, 1),
(427, 342248, 99, 1),
(428, 464828, 99, 1),
(429, 874893, 99, 1),
(430, 410995, 98, 1),
(431, 498611, 99, 1),
(432, 670162, 99, 1),
(433, 829135, 98, 1),
(434, 640774, 98, 1),
(435, 895547, 99, 5),
(436, 404074, 99, 1),
(437, 404074, 100, 1),
(438, 962234, 100, 1),
(439, 525582, 98, 1),
(440, 263970, 98, 18),
(441, 752835, 99, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `shop_img`
--

CREATE TABLE IF NOT EXISTS `shop_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumpning av Data i tabell `shop_img`
--

INSERT INTO `shop_img` (`img_id`, `id`, `url`) VALUES
(0, 0, 'shop/empty.jpg'),
(1, 98, 'shop/nike1.jpg'),
(2, 98, 'shop/nike2.jpg'),
(3, 98, 'shop/nike3.jpg'),
(4, 99, 'shop/test1.jpg'),
(5, 99, 'shop/test2.jpg'),
(6, 99, 'shop/test3.jpg'),
(7, 100, 'shop/swag1.jpg'),
(8, 100, 'shop/swag2.jpg'),
(9, 100, 'shop/swag3.jpg'),
(10, 99, 'shop/test4.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `shop_orders`
--

CREATE TABLE IF NOT EXISTS `shop_orders` (
  `order_id` int(100) NOT NULL,
  `status` int(1) NOT NULL,
  `checkout_id` varchar(100) NOT NULL,
  `braintree_payment_id` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `shop_orders`
--

INSERT INTO `shop_orders` (`order_id`, `status`, `checkout_id`, `braintree_payment_id`) VALUES
(1480651, 0, '0c80a2fba3376b3dba31287f356b212b30e19557', ''),
(1539428, 0, '921f52a4702d8785f6fb1b09e6507424', ''),
(1545745, 0, '3461cc75abd8b23490ac041c77670375', ''),
(1708618, 0, '', ''),
(2135711, 0, 'a3150bd36e024db1a933a2f77563bffe', ''),
(2146697, 0, '57c647df69cd4ab004fbbf0aee81f8b68c6a5f5a', ''),
(2269195, 0, 'a95e0132ed4b6bce32082f75b40dad2e', ''),
(2317535, 0, '', ''),
(2369171, 0, 'd4e44bae6d95aa4032a3cf82daccca4d', ''),
(2559783, 0, '49719f86c99230dc7ff826dbe3951177', ''),
(2666625, 1, '48eb43261675c91827518fcfeb9c3cfbf204c1ae', '58j6hcyf'),
(2837738, 1, 'd5490191ddf6e09e4574974e79a54927a3533fdf', 'czpmzt5t'),
(2875915, 0, '14aaeb839d975b1eb5b7efbcab389cc072e9d236', ''),
(3089874, 0, '57ace958ac4d18546023488a2b97578d', ''),
(3268676, 0, '50f036fdfc97ff562489d8f2639752c5f521691d', ''),
(3459289, 1, '00f4b7549c9d875bf1e7a78db6a2c7644558ddca', 'nzb4gx8p'),
(3613922, 0, 'dc2b5569a6f4de5b7cba4020d3c2612f5c18dc65', ''),
(4108581, 0, '72fcbef2bed4b4b2ed8cae1d355745a0', ''),
(4128082, 0, '5953417f35588f3ff311613b9c31cceb', ''),
(4500244, 0, '399b5750319b850826c7553bc803a3f7e87c1bf3', ''),
(4621093, 0, '963a2e26be1cc91406860ccab686d155', ''),
(4629058, 0, 'e9bfe276e0921b7bfc56d91b319c82b3421eabdb', ''),
(4637023, 0, '3e18a5179831f19a9031a4fda92f7fef80fef310', ''),
(4646362, 0, '1a6395c3a3d82e66099cbd2da133d585b4e14f7e', ''),
(4658996, 0, '1f4010ab9b2b2aa6f4f8dc41836ecba2', ''),
(4701293, 0, 'd197c5f2937f4638bd0de7d63a42f549', ''),
(4898498, 0, 'f2ce45e6ff989f4cb8701b39ee491f75', ''),
(5008911, 1, '8ec71b517445fdebb991e1b2ca3a2d9883593fbf', ''),
(5031158, 1, '8e447ab53f291c60b78607754ddc42db30075d96', '222e802k'),
(5097625, 0, '02523aef1ac5ad3823e7eccb0371803a1f66bd85', ''),
(5105041, 0, '48f72f31ab5c6d6d4f073779133f8a415b81057b', ''),
(5229736, 0, 'd8dbffb85ad72d6ab90d008008d4a846', ''),
(5548889, 0, '', ''),
(5611511, 1, 'e1abe70df73ccf2930dc077f77d142677ade870a', ''),
(5643096, 0, 'ce755bb378521abd1309eafb37856e50', ''),
(5696105, 0, '0ab83c97bc01a46936145e8643a8e999b3c8f700', ''),
(6072937, 0, '', ''),
(6092163, 0, '9b0526a54d9a8ebddc9252081a940ede29754192', ''),
(6269317, 0, 'ddbc1040ee10718420a57fda1b03bfeddd78d45b', ''),
(6347045, 0, '093d83739f0d18ebd8dab51a5aca8ce40a717bbc', ''),
(6406646, 0, '32964f9a50f203f231ccb735a11a39b9aab00ea5', ''),
(6437957, 0, '292a55371ecb4198a70bc4c79db16cbc985ea839', ''),
(6612640, 0, 'd4ccf1007306da6eef0ed2d949ee851d', ''),
(6792266, 0, '69308cc90704e3d13be0c8e6c2cc30c26d4a5ed8', ''),
(6828796, 0, '130a12bb2d84f458733aa2fedf2c1c07', ''),
(7029846, 0, 'b193741581432367ae6381ddaa97ebb0', ''),
(7239685, 0, 'ce733995d7b6fac80b83849bca72cab2', ''),
(7405578, 0, 'b5725a954fa781cd14534888c0b8133c', ''),
(7500885, 0, 'fb59590f3c294c691c0ec4bfb7fbb41c', ''),
(7547576, 0, '578d7c94aaf07f098e5b2bb381d7b09e', ''),
(7851074, 1, 'b97ca5178c2cc9f04d171524fbb33250177c1983', ''),
(7920013, 0, '230f75d33eb79edd1976c2e354eb77a7d57add7c', ''),
(8192474, 0, 'c4f25bb4fdba94e53972646c6485b955', ''),
(8253448, 0, '7f5aab756bcb222be63ce861b6bac29cc10bf50a', ''),
(8330078, 0, '31cd1ab3464dd2b0f5d255e37bd84312', ''),
(8694274, 1, '7578d63196f3d38ebe1e7f31905636dc6d288db4', ''),
(9057373, 0, '0b4bb618616d05b7d163e2da6dd81dc4521116be', ''),
(9073852, 0, '23b2a397adc862c33dd1af0e119ef3a4', ''),
(9172729, 0, 'd1d69a865565f875e554a6be96d4747e', ''),
(9210632, 1, '6eedb7654c853d3bd08584093e4d5db05b7e750b', 'kns3vpvx'),
(9280670, 0, 'a1c16a0c33b0474f4aca6a506472a369', ''),
(9371582, 0, '169cc6011911fecbc931d7e6548f81fb', ''),
(9747039, 0, '', ''),
(9767089, 0, 'efaf4c21304c37127ad08845fde97fe2aae69d1a', ''),
(9806915, 0, 'c220f0d63c2b344cf974c221b14156ea', ''),
(9953857, 1, 'c6f40aa7836ac3593166e3212925be80749e60d8', ''),
(9965118, 0, '', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `shop_order_items`
--

CREATE TABLE IF NOT EXISTS `shop_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(100) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumpning av Data i tabell `shop_order_items`
--

INSERT INTO `shop_order_items` (`id`, `order_id`, `item_id`, `quantity`) VALUES
(18, 9965118, 99, 1),
(19, 6072937, 99, 1),
(20, 9747039, 99, 1),
(21, 1708618, 99, 1),
(22, 2317535, 99, 1),
(23, 5548889, 99, 1),
(24, 5229736, 99, 1),
(25, 9806915, 99, 1),
(26, 6828796, 99, 1),
(27, 2135711, 99, 1),
(28, 9073852, 99, 1),
(29, 4128082, 99, 1),
(30, 4898498, 2342, 1),
(31, 1545745, 99, 1),
(32, 8330078, 99, 1),
(33, 8330078, 98, 5),
(34, 2369171, 99, 1),
(35, 2369171, 98, 5),
(36, 7239685, 99, 1),
(37, 7239685, 98, 5),
(38, 7239685, 100, 1),
(39, 7547576, 99, 1),
(40, 7547576, 98, 5),
(41, 7547576, 100, 1),
(42, 4108581, 99, 1),
(43, 4108581, 98, 5),
(44, 4108581, 100, 1),
(45, 4701293, 99, 1),
(46, 2269195, 99, 1),
(47, 7029846, 99, 1),
(48, 6612640, 99, 1),
(49, 9371582, 99, 1),
(50, 5643096, 99, 1),
(51, 2559783, 99, 5),
(52, 9172729, 99, 5),
(53, 9280670, 99, 1),
(54, 7405578, 99, 1),
(55, 8192474, 99, 1),
(56, 8192474, 98, 2),
(57, 4621093, 98, 1),
(58, 3089874, 98, 1),
(59, 1539428, 98, 1),
(60, 7500885, 98, 1),
(61, 4658996, 98, 1),
(62, 9057373, 99, 1),
(63, 6269317, 99, 1),
(64, 1480651, 99, 2),
(65, 3613922, 99, 1),
(66, 5105041, 99, 1),
(67, 9767089, 99, 1),
(68, 8253448, 99, 1),
(69, 2875915, 99, 1),
(70, 2146697, 99, 1),
(71, 4646362, 99, 1),
(72, 6406646, 99, 1),
(73, 4637023, 99, 1),
(74, 7920013, 99, 1),
(75, 4500244, 99, 1),
(76, 6792266, 99, 1),
(77, 5097625, 99, 1),
(78, 4629058, 99, 1),
(79, 6092163, 99, 1),
(80, 5696105, 99, 1),
(81, 9953857, 98, 1),
(82, 5611511, 99, 1),
(83, 5008911, 99, 1),
(84, 7851074, 98, 1),
(85, 8694274, 98, 1),
(86, 3459289, 99, 5),
(87, 6347045, 99, 1),
(88, 5031158, 99, 1),
(89, 5031158, 100, 1),
(90, 9210632, 100, 1),
(91, 2666625, 98, 1),
(92, 2837738, 98, 18);

-- --------------------------------------------------------

--
-- Tabellstruktur `sub_navigation`
--

CREATE TABLE IF NOT EXISTS `sub_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `url` varchar(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `sub_navigation`
--

INSERT INTO `sub_navigation` (`id`, `name`, `url`, `owner`) VALUES
(0, 'my account', 'user', 'test'),
(1, 'edit profile', 'user/edit', 'edit'),
(2, 'change password', 'user/password', 'password'),
(3, 'logout', 'logout', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', 'b75b4a601f62f3508d3c3e2d0e0f5a0b41c05d54'),
(3, 'admin2', 'fb9f445fbf761a8747b8cc68b165b2339ce13bb2'),
(4, 'allah', '737dec78dc50e1d0435f8f683faf81dee335826d');

-- --------------------------------------------------------

--
-- Tabellstruktur `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user_data`
--

INSERT INTO `user_data` (`user_id`, `email`, `firstname`, `lastname`, `street`, `zip`, `city`, `phone`, `country`) VALUES
(2, 'allahuakbar@usa.gov', 'Sune', 'Svensson', 'Kompanivägen 23', '97444', 'Morjärv', '+46 70 3345 432', 'UK'),
(4, 'runar@russia.gov', 'Sture', 'sdf', '', '22312', 'ds', '1234', 'UK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
