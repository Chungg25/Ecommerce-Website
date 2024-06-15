CREATE DATABASE IF NOT EXISTS `Ecommerce-Website` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Ecommerce-Website`;

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` VALUES
(1, 'kiet', '52200140@student.tdtu.edu.vn', 'kietadmin', '123456', 0);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);