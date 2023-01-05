CREATE DATABASE IF NOT EXISTS blog;
USE blog;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_user` varchar(30) DEFAULT NULL,
  `password` varchar(22) DEFAULT NULL,
  `role` varchar(14) DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
INSERT INTO `users` (
    `id_user`,
    `name`,
    `name_user`,
    `password`,
    `role`,
    `status`
  )
VALUES (1, 'Toze', 'Admin', 'admin', 'Admin', 1),
  (2, 'Manuel', 'Manager', 'manager', 'Manager', 1),
  (3, 'Antonill', 'Anton', 'couves', 'User', 1),
  (4, 'Tonizia', 'Toni', 'bananas', 'User', 1);
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id_feed` int NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_feed`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
INSERT INTO `feedback` (`id_feed`, `message`, `id_user`)
VALUES (1, 'Couves', 3),
  (2, 'Cao', 3),
  (3, 'Coisas Boas', 4);
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
INSERT INTO `posts` (
    `id_post`,
    `title`,
    `description`,
    `id_user`,
    `hide`
  )
VALUES (1, 'Couves', 'Adoro couves assadas :)', 3, 0),
  (
    2,
    'Cat',
    'More cats',
    3,
    0
  ),
  (3, 'Coisas', 'Coisas Coisas Coisas', 3, 0),
  (4, 'Outras coisas', 'Outras outras ....', 4, 0),
  (5, 'Genio?', 'sei un genio?', 4, 0);