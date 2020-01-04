-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Eki 2018, 19:45:31
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `course_register`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentcode` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `facultymember`
--

CREATE TABLE `facultymember` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lecture`
--

CREATE TABLE `lecture` (
  `id` int(12) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ismandatory` int(11) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lecture_register`
--

CREATE TABLE `lecture_register` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `facultymember_code` varchar(255) NOT NULL,
  `student_code` varchar(255) NOT NULL,
  `classroom_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `staff`
--

INSERT INTO `staff` (`id`, `code`, `name_surname`, `email`) VALUES
(1, '19930310', 'GAMZE NUR TAS', 'gamze.0793@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`id`, `code`, `name`, `surname`) VALUES
(1, '12345', 'GAMZE', 'NUR');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `facultymember`
--
ALTER TABLE `facultymember`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CODE` (`code`);

--
-- Tablo için indeksler `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CODE` (`code`);

--
-- Tablo için indeksler `lecture_register`
--
ALTER TABLE `lecture_register`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `facultymember`
--
ALTER TABLE `facultymember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lecture_register`
--
ALTER TABLE `lecture_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
