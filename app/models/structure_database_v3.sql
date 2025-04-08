CREATE TABLE `user` (
  `id_user` INT AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100),
  `mail` VARCHAR(255) UNIQUE NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `date_birth` DATE NOT NULL,
  `date_create` DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `postit` (
  `id_postit` INT AUTO_INCREMENT PRIMARY KEY,
  `id_user` INT NOT NULL,
  `title` VARCHAR(25) NOT NULL,
  `content` VARCHAR(1000) NOT NULL,
  `flag_delete` BOOL DEFAULT FALSE,
  `date_create_postit` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `date_delete_postit` DATETIME DEFAULT NULL,
  FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
);

CREATE TABLE `share` (
  `id_share` INT AUTO_INCREMENT PRIMARY KEY,
  `id_user` INT NOT NULL,
  `id_postit` INT NOT NULL,
  `content` VARCHAR(500) NOT NULL,
  `flag_write_learn` BOOL DEFAULT FALSE,
  `date_share` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  FOREIGN KEY (`id_postit`) REFERENCES `postit` (`id_postit`)
);

CREATE TABLE `historic` (
  `id_historic` INT AUTO_INCREMENT PRIMARY KEY,
  `id_postit` INT NOT NULL,
  `title` TEXT NOT NULL,
  `content` VARCHAR(500) NOT NULL,
  `date_create_postit` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `date_delete_postit` DATETIME,
  FOREIGN KEY (`id_postit`) REFERENCES `postit` (`id_postit`)
);
