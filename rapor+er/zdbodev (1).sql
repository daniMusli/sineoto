-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 10:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zdbodev`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilet`
--

CREATE TABLE `bilet` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bilet`
--

INSERT INTO `bilet` (`id`, `type`, `price`) VALUES
(1, 'indirimli', 5),
(2, 'Normal', 10);

-- --------------------------------------------------------

--
-- Table structure for table `diller`
--

CREATE TABLE `diller` (
  `id` int(11) NOT NULL,
  `namee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diller`
--

INSERT INTO `diller` (`id`, `namee`) VALUES
(1, 'Turkce'),
(2, 'Turkce Dublaj'),
(3, 'Turkce Alt Yazi');

-- --------------------------------------------------------

--
-- Table structure for table `filimler`
--

CREATE TABLE `filimler` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `actor` varchar(255) DEFAULT NULL,
  `actres` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `des` longtext NOT NULL,
  `lang` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filimler`
--

INSERT INTO `filimler` (`id`, `name`, `year`, `actor`, `actres`, `director`, `des`, `lang`, `time`, `image`) VALUES
(1, 'Logan', 2017, 'log', 'logg', 'log', '1950 yılındaki Kore savaşında görev alan Süleyman Astsubay savaş meydanında küçük, yetim bir Kore’li kız bulur. Nereye gideceğini bilemeyen kızı yanına alır ve Ayla adını verir. Ayla ile astsubay kısa sürede baba-kız gibi olurlar. Ancak 15 ay sonra birliğin Türkiye’ye dönme kararı çıkar. Ayla’yı bırakmak istemeyen Süleyman Astsubay her yolu denese de Kore kanunlarını aşamaz.  Astsubay ve kız vedalaşırken tekrar bir araya gelmeye söz verirler.', 2, '02:00:00', 'uploads/logan.jpg'),
(56, 'Babam', 2017, '', '', 'Can Ulker', '1950 yılındaki Kore savaşında görev alan Süleyman Astsubay savaş meydanında küçük, yetim bir Kore’li kız bulur. Nereye gideceğini bilemeyen kızı yanına alır ve Ayla adını verir. Ayla ile astsubay kısa sürede baba-kız gibi olurlar. Ancak 15 ay sonra birliğin Türkiye’ye dönme kararı çıkar. Ayla’yı bırakmak istemeyen Süleyman Astsubay her yolu denese de Kore kanunlarını aşamaz.  Astsubay ve kız vedalaşırken tekrar bir araya gelmeye söz verirler.', 1, '01:30:00', 'uploads/babam.jpg'),
(57, 'Spider man', 2017, '', '', '', '1950 yılındaki Kore savaşında görev alan Süleyman Astsubay savaş meydanında küçük, yetim bir Kore’li kız bulur. Nereye gideceğini bilemeyen kızı yanına alır ve Ayla adını verir. Ayla ile astsubay kısa sürede baba-kız gibi olurlar. Ancak 15 ay sonra birliğin Türkiye’ye dönme kararı çıkar. Ayla’yı bırakmak istemeyen Süleyman Astsubay her yolu denese de Kore kanunlarını aşamaz.  Astsubay ve kız vedalaşırken tekrar bir araya gelmeye söz verirler.', 1, '01:45:00', 'uploads/spider.jpg'),
(59, 'Ezel', 2009, 'asd', 'asd', 'Uluç Bayraktar', 'Adı Ömer\'di. Bir tamirhanede çalışıyordu. Eyşan diye bir kızı sevdi. Onunla evlenecek, kenar mahallesinde mutlu mesut yaşayacaktı. O umutla askere gitti. Döndüğünde her şey değişmişti...\r\n\r\nDöndükten kısa bir süre sonra sevgilisi Eyşan, en iyi arkadaşı Cengiz ve abim dediği Ali, bir otelin kumarhanesini soydular, bir güvenlik görevlisini öldürdüler, suçu da Ömer\'in üstüne attılar. Eyşan her şeyi hasta kardeşi Bahar için yapmıştı. Ama Ömer hiçbir zaman bunu bilmedi. Cengiz aslında Eyşan\'a aşık olduğu için, Ali\'yse sadece para için yapmıştı', 1, '01:45:00', 'uploads/ezel.jpg'),
(61, 'Ezellll', 2009, NULL, NULL, NULL, '', 1, '01:45:00', 'uploads/resim.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gosterim`
--

CREATE TABLE `gosterim` (
  `id` int(11) NOT NULL,
  `film` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_time` int(11) NOT NULL,
  `bilet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gosterim`
--

INSERT INTO `gosterim` (`id`, `film`, `room`, `date`, `date_time`, `bilet_id`) VALUES
(2, 1, 1, '2017-12-19', 3, 2),
(3, 1, 3, '2017-12-31', 1, 1),
(4, 56, 2, '2017-12-31', 2, 2),
(5, 56, 2, '2017-12-30', 1, 1),
(6, 56, 4, '2017-12-31', 3, 2),
(17, 1, 5, '2017-12-30', 1, 1),
(18, 1, 5, '2017-12-30', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gosterim_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `koltuk_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `gosterim_id`, `salon_id`, `koltuk_no`) VALUES
(1, 3, 3, 3, '1,2,3,4,5'),
(2, 3, 18, 5, '3,4,5'),
(3, 3, 18, 5, '2');

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `update_sales` BEFORE INSERT ON `sales` FOR EACH ROW BEGIN
       UPDATE salon 
       SET customer_counter=customer_counter+1
       WHERE id=NEW.salon_id;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salon`
--

CREATE TABLE `salon` (
  `id` int(11) NOT NULL,
  `cinema_name` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `customer_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`id`, `cinema_name`, `capacity`, `customer_counter`) VALUES
(2, 1, 5, 7),
(3, 3, 5, 8),
(4, 4, 5, 12),
(5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sinemalar`
--

CREATE TABLE `sinemalar` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `roomNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinemalar`
--

INSERT INTO `sinemalar` (`id`, `nam`, `location`, `roomNum`) VALUES
(1, 'AA', 'yeni şehir', 1),
(3, 'avm', 'palandöken', 3),
(4, 'avm2', 'Erzurum', 5),
(5, 'BB', 'Dadaskent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `surname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `password`, `type_id`) VALUES
(2, 'admin123', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'asd', 'asd', 'asd', 'bfd59291e825b5f2bbf1eb76569f8fe7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userstype`
--

CREATE TABLE `userstype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userstype`
--

INSERT INTO `userstype` (`id`, `name`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `zaman`
--

CREATE TABLE `zaman` (
  `id` int(11) NOT NULL,
  `date_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zaman`
--

INSERT INTO `zaman` (`id`, `date_type`) VALUES
(1, 'Matine'),
(2, 'Aksam'),
(3, 'Gece');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilet`
--
ALTER TABLE `bilet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diller`
--
ALTER TABLE `diller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filimler`
--
ALTER TABLE `filimler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang` (`lang`);

--
-- Indexes for table `gosterim`
--
ALTER TABLE `gosterim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gosterim_ibfk_1` (`date_time`),
  ADD KEY `film` (`film`),
  ADD KEY `room` (`room`),
  ADD KEY `bilet_id` (`bilet_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gosterim_id` (`gosterim_id`),
  ADD KEY `salon_id` (`salon_id`);

--
-- Indexes for table `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema_name` (`cinema_name`);

--
-- Indexes for table `sinemalar`
--
ALTER TABLE `sinemalar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `userstype`
--
ALTER TABLE `userstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaman`
--
ALTER TABLE `zaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilet`
--
ALTER TABLE `bilet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `diller`
--
ALTER TABLE `diller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `filimler`
--
ALTER TABLE `filimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `gosterim`
--
ALTER TABLE `gosterim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sinemalar`
--
ALTER TABLE `sinemalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `zaman`
--
ALTER TABLE `zaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
