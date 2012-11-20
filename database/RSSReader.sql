SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `SocialReader` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `SocialReader` ;

-- -----------------------------------------------------
-- Table `SocialReader`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SocialReader`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(30) NOT NULL ,
  `surname` VARCHAR(45) NULL ,
  `username` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
  `email` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SocialReader`.`feeds`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SocialReader`.`feeds` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `name` VARCHAR(50) NOT NULL ,
  `url` VARCHAR(300) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_feeds_users` (`user_id` ASC) ,
  CONSTRAINT `fk_feeds_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `SocialReader`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `SocialReader`.`users`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `SocialReader`;
INSERT INTO `SocialReader`.`users` (`id`, `name`, `surname`, `username`, `password`, `email`) VALUES (1, 'Andrea', 'Cammarata', 'andrea', '1234', 'andrea.cammarata@sencha.com');
INSERT INTO `SocialReader`.`users` (`id`, `name`, `surname`, `username`, `password`, `email`) VALUES (2, 'Daniel', 'Gallo', 'daniel', '1234', 'daniel.gallo@sencha.com');

COMMIT;

-- -----------------------------------------------------
-- Data for table `SocialReader`.`feeds`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `SocialReader`;
INSERT INTO `SocialReader`.`feeds` (`id`, `user_id`, `name`, `url`) VALUES (1, 1, 'SenchaBlog', 'http://feeds.feedburner.com/SenchaBlog');
INSERT INTO `SocialReader`.`feeds` (`id`, `user_id`, `name`, `url`) VALUES (2, 1, 'AndreaCammarata.com', 'http://feeds.feedburner.com/AndreaCammarata');
INSERT INTO `SocialReader`.`feeds` (`id`, `user_id`, `name`, `url`) VALUES (3, 1, 'Ajaxian', 'http://feeds.feedburner.com/ajaxian');
INSERT INTO `SocialReader`.`feeds` (`id`, `user_id`, `name`, `url`) VALUES (4, 2, 'Android', 'http://feeds.feedburner.com/android');
INSERT INTO `SocialReader`.`feeds` (`id`, `user_id`, `name`, `url`) VALUES (5, 2, 'Apple', 'http://feeds.feedburner.com/apple');

COMMIT;
