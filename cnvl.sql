-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               8.0.36-0ubuntu0.20.04.1 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных cnvl
CREATE DATABASE IF NOT EXISTS `cnvl` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cnvl`;

-- Дамп структуры для таблица cnvl.links
CREATE TABLE IF NOT EXISTS `links` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `olink` varchar(2048) NOT NULL,
  `tlink` varchar(2048) NOT NULL,
  `trlink` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы cnvl.links: ~4 rows (приблизительно)
INSERT INTO `links` (`id`, `pid`, `olink`, `tlink`, `trlink`) VALUES
	(4, 44, 'https://ya.ru', '0388428ab', 1),
	(5, 44, 'https://youtube.com', '6970f01afd', 0),
	(6, 44, 'https://ya.ru', '0388428abs', 0),
	(7, 46, 'https://ya.ru', 'sadas', 0);

-- Дамп структуры для таблица cnvl.people
CREATE TABLE IF NOT EXISTS `people` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL DEFAULT '',
  `sname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL,
  `gender` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 = мужской, 0 = женский',
  `city` varchar(50) NOT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `sid` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы cnvl.people: ~2 rows (приблизительно)
INSERT INTO `people` (`id`, `fname`, `sname`, `birthday`, `gender`, `city`, `phone`, `email`, `password`, `sid`) VALUES
	(44, 'Артем', 'Старченко', '1989-03-28', '1', 'Минск', '+375255357505', 'webusis@gmail.com', '698d51a19d8a121ce581499d7b701668', '5e7266d9f199537f21863e11c59f3ec1'),
	(46, 'Артем', 'Старченкоy', '2024-03-05', '1', 'Минск', '+375255357505', 'webusis2@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', '08fcd4de67e18de3fb3860265dadb3ed');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
