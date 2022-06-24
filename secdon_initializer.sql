CREATE DATABASE `SECDON`;
USE `SECDON`;


CREATE TABLE `Sex`(
	`sex_id` INT,
    `sex_description` VARCHAR(256),
    PRIMARY KEY(`sex_id`)
)ENGINE=INNODB;

INSERT INTO `Sex` (`sex_id`, `sex_description`)
	VALUES
			(0, 'Kadın'),
            (1, 'Erkek');
            

CREATE TABLE `User`(
	`user_id` INT AUTO_INCREMENT,
    `user_nickname` VARCHAR(256),
    `user_password` VARCHAR(512),
	`user_security_num` VARCHAR(256),
    `user_first_name` VARCHAR(20),
	`user_last_name` VARCHAR(20),
    `user_pp` VARCHAR(256),
    `user_age` INT,
    `user_sex` INT,
    `user_birth` DATE,
    
    PRIMARY KEY(`user_id`),
    FOREIGN KEY(`user_sex`) REFERENCES `Sex`(`sex_id`)
		ON DELETE SET NULL
        ON UPDATE CASCADE
)ENGINE=INNODB;


CREATE TABLE `Company`(
	`company_id` INT AUTO_INCREMENT,
	`company_name` VARCHAR(25),
    `company_short_desc` VARCHAR(256),
    `company_pp` VARCHAR(256),
    PRIMARY KEY(`company_id`)
);


CREATE TABLE `Donation`(
	`donation_id` INT AUTO_INCREMENT,
    `user_id` INT,
    `company_id` INT,
    `donation_date` DATETIME(2),
	`donation_amount` INT,
    
    PRIMARY KEY(`donation_id`),
    FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`)
		ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    FOREIGN KEY(`company_id`) REFERENCES `Company`(`company_id`)
		ON DELETE NO ACTION
        ON UPDATE NO ACTION
        
)ENGINE=INNODB;









