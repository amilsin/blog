
create DATABASE `blog`;

CREATE TABLE `blog`.`blog_posts` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `author` VARCHAR(255) NOT NULL , `content` LONGTEXT NOT NULL , `created_time` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;