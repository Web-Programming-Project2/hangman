CREATE TABLE `webprogramming_p2`.`users` (
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(16) NULL,
  PRIMARY KEY (`username`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE);
