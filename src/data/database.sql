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

CREATE PROCEDURE `InsertUser`(IN `name` varchar(64), IN `user` varchar(64), IN `pass` varchar(500))
INSERT INTO users (name, name_user, password, role, status)
VALUES (name, user, pass, 'User', 1);;

CREATE PROCEDURE `UpdatePost`(IN `hide` int, IN `postId` int)
UPDATE posts SET hide = hide WHERE id_post = postId;;

CREATE PROCEDURE `UpdateUser`(IN `username` varchar(64), IN `role` varchar(16), IN `status` int, IN `userId` int)
UPDATE users SET name_user = username, role = role, status = status WHERE id_user = userId;;

CREATE PROCEDURE `Upload`(IN `message` varchar(255), IN `file` varchar(255), IN `idUser` int)
INSERT INTO feedback (message, file, id_user) VALUES (message, file, idUser);;

DELIMITER ;

DROP USER 'blog_not_user'@'%';
flush privileges;
CREATE USER 'blog_not_user'@'%' IDENTIFIED BY 'nq82K!$a';
GRANT SELECT ON blog.* TO 'blog_not_user'@'%';
GRANT EXECUTE ON PROCEDURE blog.GetUser TO 'blog_not_user'@'%';
GRANT EXECUTE ON PROCEDURE blog.InsertUser TO 'blog_not_user'@'%';

DROP USER 'blog_user'@'%';
flush privileges;
CREATE USER 'blog_user'@'%' IDENTIFIED BY 'fq!11N#Q0';
GRANT SELECT ON blog.* TO 'blog_user'@'%';
GRANT EXECUTE ON PROCEDURE blog.CreatePost TO 'blog_user'@'%';
GRANT EXECUTE ON PROCEDURE blog.Upload TO 'blog_user'@'%';

DROP USER 'blog_manager'@'%';
flush privileges;
CREATE USER 'blog_manager'@'%' IDENTIFIED BY 'T!mq86$anH';
GRANT SELECT ON blog.* TO 'blog_manager'@'%';
GRANT EXECUTE ON PROCEDURE blog.GetPosts TO 'blog_manager'@'%';
GRANT EXECUTE ON PROCEDURE blog.UpdatePost TO 'blog_manager'@'%';

DROP USER 'blog_admin'@'%';
flush privileges;
CREATE USER 'blog_admin'@'%' IDENTIFIED BY 'jk1!K8$Mb';
GRANT SELECT ON blog.* TO 'blog_admin'@'%';
GRANT EXECUTE ON PROCEDURE blog.GetUserById TO 'blog_admin'@'%';
GRANT EXECUTE ON PROCEDURE blog.GetFeedback TO 'blog_admin'@'%';
GRANT EXECUTE ON PROCEDURE blog.UpdateUser TO 'blog_admin'@'%';
GRANT EXECUTE ON PROCEDURE blog.GetUsers TO 'blog_admin'@'%';


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
(1,	'love you',	NULL,	3),
(2,	'Something',	NULL,	4),
(3,	'Test',	'fileInclusion.php',	4)
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
(1,	'Genio',	'Sei un Genio?',	3,	0),
(2,	'Gatos <3',	'I love Cats and bananas',	4,	0),
(3,	'Script',	'&lt;script&gt;alert(&quot;Hello World!&quot;);&lt;/script&gt;',	3,	0)
ON DUPLICATE KEY UPDATE `id_post` = VALUES(`id_post`), `title` = VALUES(`title`), `description` = VALUES(`description`), `id_user` = VALUES(`id_user`), `hide` = VALUES(`hide`);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_user` varchar(30) DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(14) DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id_user`, `name`, `name_user`, `password`, `role`, `status`) VALUES
(1,	'Toze',	'Admin',	'$2y$10$3UT8TNlUIcerVFFlk7oTiuQwxVFjixdeMITqBsjsR4Mlk57auzuvO',	'Admin',	1),
(2,	'Manuel',	'Manager',	'$2y$10$CCIvTP21KJhQLcXKd/bu.Om5D54nASQFSf8HFap5kxdZxv21SmlA2',	'Manager',	1),
(3,	'Antonill',	'Anton',	'$2y$10$TAxYKsJz21hGPxhwDJHgA.eDxObrJAHOjpj57h.jmmOdi2l/zLbny',	'User',	1),
(4,	'Mary',	'Maary',	'$2y$10$zzaFHsOceaBKFb.oI3IjQ.7iDCitbtbWWiOQBRQOjda4Yag43b1.W',	'User',	1)
ON DUPLICATE KEY UPDATE `id_user` = VALUES(`id_user`), `name` = VALUES(`name`), `name_user` = VALUES(`name_user`), `password` = VALUES(`password`), `role` = VALUES(`role`), `status` = VALUES(`status`);

-- 2023-01-08 21:55:05
