-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: staff_db_copy
-- Source Schemata: staff_db
-- Created: Tue Jun  4 16:43:15 2019
-- Workbench Version: 8.0.15
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema staff_db_copy
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `staff_db_copy` ;
CREATE SCHEMA IF NOT EXISTS `staff_db_copy` ;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.migrations
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 292
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.password_resets
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.photos
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`photos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.positions
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`positions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.roles
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`roles` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.staff
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`staff` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `user_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `position_id` INT(10) UNSIGNED NOT NULL,
  `photo_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `salary` INT(10) UNSIGNED NOT NULL,
  `parent_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `started_at` TIMESTAMP NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `staff_name_index` (`name` ASC),
  INDEX `staff_user_id_index` (`user_id` ASC),
  INDEX `staff_position_id_index` (`position_id` ASC),
  INDEX `staff_salary_index` (`salary` ASC),
  INDEX `staff_parent_id_index` (`parent_id` ASC),
  INDEX `staff_started_at_index` (`started_at` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 52112
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table staff_db_copy.users
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff_db_copy`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `role_id` INT(10) UNSIGNED NOT NULL DEFAULT '2',
  `is_active` INT(11) NOT NULL DEFAULT '1',
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC),
  INDEX `users_role_id_index` (`role_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- View staff_db_copy.views_overall_staff
-- ----------------------------------------------------------------------------
USE `staff_db_copy`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `staff_db`.`views_overall_staff` AS (select `staff_db`.`staff`.`id` AS `id`,`staff_db`.`photos`.`path` AS `photo`,`staff_db`.`staff`.`name` AS `name`,`staff_db`.`positions`.`name` AS `position`,`staff_db`.`staff`.`salary` AS `salary`,`parent`.`name` AS `chief`,`staff_db`.`staff`.`started_at` AS `employment_date`,`staff_db`.`users`.`name` AS `owner` from ((((`staff_db`.`staff` left join `staff_db`.`positions` on((`staff_db`.`staff`.`position_id` = `staff_db`.`positions`.`id`))) left join `staff_db`.`photos` on((`staff_db`.`staff`.`photo_id` = `staff_db`.`photos`.`id`))) left join `staff_db`.`staff` `parent` on((`staff_db`.`staff`.`parent_id` = `parent`.`id`))) left join `staff_db`.`users` on((`staff_db`.`staff`.`user_id` = `staff_db`.`users`.`id`))));
SET FOREIGN_KEY_CHECKS = 1;
