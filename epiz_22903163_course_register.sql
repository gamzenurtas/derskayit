-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Anamakine: sql205.byetcluster.com
-- Üretim Zamanı: 28 Eki 2018, 17:15:31
-- Sunucu sürümü: 5.6.41-84.1
-- PHP Sürümü: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `epiz_22903163_course_register`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentcode` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `classroom`
--

INSERT INTO `classroom` (`id`, `code`, `name`, `parentcode`, `type`) VALUES
(1, '100', 'Kat1', 'SÄ±nÄ±f1A', 1),
(0, '101', 'Kat1', 'SÄ±nÄ±f1B', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `facultymember`
--

CREATE TABLE IF NOT EXISTS `facultymember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `surname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `startdate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CODE` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `facultymember`
--

INSERT INTO `facultymember` (`id`, `code`, `name`, `surname`, `email`, `startdate`) VALUES
(3, '1214', 'KÃ¶kten UlaÅŸ', 'Birant', 'kokten.ulas@mail.com', '2010-11-12'),
(4, '1215', 'Derya ', 'PakalÄ±n', 'derya.pakalÄ±n@mail.com', '2017-08-10'),
(5, '1216', 'Ã–zlem ', 'AktaÅŸ', 'ozlem.aktas@mail.com', '2015-05-05'),
(6, '1217', 'Mehmet Hilal ', 'Ã–zcanhan', 'mhilal.ozcanhan@mail.com', '2015-01-29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lecture`
--

CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ismandatory` varchar(11) NOT NULL,
  `facultymember_name` varchar(50) NOT NULL,
  `class` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `day` varchar(15) NOT NULL,
  `hour` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CODE` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Tablo döküm verisi `lecture`
--

INSERT INTO `lecture` (`id`, `code`, `name`, `ismandatory`, `facultymember_name`, `class`, `day`, `hour`) VALUES
(7, 'YZM1222', 'Artificial Intelligent', 'SeÃ§meli', 'Ã‡aÄŸrÄ± TaÅŸ', 'seÃ§ilecek', 'Pazartesi', '12:12:00'),
(6, 'YZM1453', 'Algorithm', 'Zorunlu', 'Yunus Emre Othan', 'deÄŸiÅŸecek', 'PerÅŸembe', '21:11:00'),
(12, '111111', '11111111', '11111111', '111111', '', '11111', '11:11:00'),
(11, '22222', '222', '22', '22', '', '2222', '22:02:00'),
(14, '12345', 'Data Structures', 'Zorunlu', 'ali', '', 'Pazartesi', '14:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lecture_register`
--

CREATE TABLE IF NOT EXISTS `lecture_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `facultymember_code` varchar(255) NOT NULL,
  `student_code` varchar(255) NOT NULL,
  `classroom_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Tablo döküm verisi `lecture_register`
--

INSERT INTO `lecture_register` (`id`, `code`, `facultymember_code`, `student_code`, `classroom_code`) VALUES
(42, '22222', '', '1', '100'),
(41, 'YZM1453', '1217', '1', '100'),
(40, '111111', '', '1', '100'),
(39, '12345', '1217', '1', '100'),
(38, '12345', '1217', '1', '100');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `staff`
--

INSERT INTO `staff` (`id`, `code`, `name_surname`, `email`) VALUES
(1, '19930310', 'GAMZE NUR TAS', 'gamze.0793@gmail.com'),
(2, '2', '2', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`id`, `code`, `name`, `surname`) VALUES
(1, '1', 'GAMZE NUR', 'TAÅž'),
(2, '2', 'PELÄ°N', 'ÅžENDUR'),
(3, '3', 'GÄ°ZEM', 'SEZGEN'),
(4, '4', 'CAN BERK', 'BEKTAÅž'),
(6, '5', 'BURCU', 'YAVAÅž'),
(7, '6', 'OLCAY', 'AKBULUT');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
