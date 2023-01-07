-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `blog`;
CREATE DATABASE `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `blog`;

DELIMITER ;;

CREATE PROCEDURE `CreatePost`(IN `title` varchar(255), IN `descricao` varchar(255), IN `idUser` int)
INSERT INTO posts(title, description, id_user, hide) 
VALUES(title, descricao, idUser, 0);;

CREATE PROCEDURE `GetFeedback`()
Select feedback.*, users.* from feedback inner join users on feedback.id_user = users.id_user;;

CREATE PROCEDURE `GetPosts`()
SELECT posts.*, users.* from posts inner join users on posts.id_user = users.id_user;;

CREATE PROCEDURE `GetUser`(IN `user` varchar(64))
SELECT * FROM users WHERE name_user = user;;

CREATE PROCEDURE `GetUserById`(IN `userId` int)
SELECT * FROM users WHERE id_user = userId;;

CREATE PROCEDURE `GetUsers`()
Select * from users;;

CREATE PROCEDURE `UpdatePost`(IN `hide` int, IN `postId` int)
UPDATE posts SET hide = hide WHERE id_post = postId;;

CREATE PROCEDURE `UpdateUser`(IN `username` varchar(64), IN `role` varchar(16), IN `status` int, IN `userId` int)
UPDATE users SET name_user = username, role = role, status = status WHERE id_user = userId;;

CREATE PROCEDURE `Upload`(IN `message` varchar(255), IN `file` varchar(255), IN `idUser` int)
INSERT INTO feedback (message, file, id_user) VALUES (message, file, idUser);;

DELIMITER ;

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id_feed` int NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_feed`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `feedback` (`id_feed`, `message`, `file`, `id_user`) VALUES
(1,	'Couves',	NULL,	3),
(2,	'Cao',	NULL,	3),
(3,	'Coisas Boas',	NULL,	4),
(4,	'asfaf',	'scripts.js',	3)
ON DUPLICATE KEY UPDATE `id_feed` = VALUES(`id_feed`), `message` = VALUES(`message`), `file` = VALUES(`file`), `id_user` = VALUES(`id_user`);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `hide` int DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `posts` (`id_post`, `title`, `description`, `id_user`, `hide`) VALUES
(1,	'Couves',	'Adoro couves assadas :)',	3,	0),
(2,	'Cat',	'More cats',	3,	0),
(3,	'Coisas',	'Coisas Coisas Coisas',	3,	0),
(4,	'Outras coisas',	'Outras outras ....',	4,	0),
(5,	'Genio?',	'sei un genio?',	4,	0),
(6,	'&lt;script&gt;alert(&quot;Hello World!&quot;);&lt;/script&gt;',	'asdasd',	3,	0),
(8,	'asdf',	'fsafa',	3,	0),
(9,	'asfa',	'fafa',	3,	0)
ON DUPLICATE KEY UPDATE `id_post` = VALUES(`id_post`), `title` = VALUES(`title`), `description` = VALUES(`description`), `id_user` = VALUES(`id_user`), `hide` = VALUES(`hide`);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_user` varchar(30) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(14) DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id_user`, `name`, `name_user`, `password`, `role`, `status`) VALUES
(1,	'Toze',	'Admin',	'$2y$10$6EROlqqtFevS8t.52SashOqxNDrpugEJzNw.AkTrxv2.nAw0f/phq',	'Admin',	1),
(2,	'Manuel',	'Manager',	'$2y$10$mjTunlV3KkBL4PZhuFZmXuSg2B4MWbC561l7YQucFMbqQOVTZ7C5q',	'Manager',	1),
(3,	'Antonill',	'Anton',	'$2y$10$upIzrve2JQZUprcxOZl6a./hSo.94/P4UncipO5Q8uO2Uj89ZQtnK',	'User',	1),
(4,	'Tonizia',	'Toni',	'bananas',	'User',	1),
(5,	'aa',	'aaa2',	'$2y$10$iSc7isQLfV97ygWRFrQtHOhnHoQp.Ap.3LBN/h4oO8ZsRDMKgRnF.',	'User',	1)
ON DUPLICATE KEY UPDATE `id_user` = VALUES(`id_user`), `name` = VALUES(`name`), `name_user` = VALUES(`name_user`), `password` = VALUES(`password`), `role` = VALUES(`role`), `status` = VALUES(`status`);

-- 2023-01-07 21:00:41
