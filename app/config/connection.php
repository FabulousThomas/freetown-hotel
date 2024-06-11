<?php
global $con;
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or
      die('<h4 class="text-bg-dark">SOMETHING WENT WRONG. PLEASE CONTACT THE ADMIN FOR THIS ERROR</h4>');

if ($con->query("CREATE DATABASE IF NOT EXISTS freetown")) {
      $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      // $con->query("CREATE TABLE IF NOT EXISTS `admin` (
      // `id` INT NOT NULL AUTO_INCREMENT , 
      // `admin_name` VARCHAR(150) NOT NULL , 
      // `admin_pass` VARCHAR(150) NOT NULL , 
      // `admin_access` INT NOT NULL DEFAULT '0' , 
      // PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `settings` (
      //    `id` INT NOT NULL AUTO_INCREMENT ,
      //     `site_title` VARCHAR(50) NOT NULL , 
      //     `site_about` VARCHAR(500) NOT NULL , 
      //     `shutdown` BOOLEAN NOT NULL , 
      //     PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `team` (
      //    `id` INT NOT NULL AUTO_INCREMENT ,
      //    `team_name` VARCHAR(250) NOT NULL , 
      //    `team_picture` VARCHAR(500) NOT NULL ,
      //    PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `slider` (
      //    `id` INT NOT NULL AUTO_INCREMENT ,
      //    `slider_picture` VARCHAR(500) NOT NULL ,
      //    PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `user_query` (
      //    `id` INT NOT NULL AUTO_INCREMENT , 
      //    `name` VARCHAR(150) NOT NULL , 
      //    `email` VARCHAR(150) NOT NULL , 
      //    `subject` VARCHAR(250) NOT NULL , 
      //    `message` VARCHAR(500) NOT NULL , 
      //    `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      //    `seen` TINYINT NOT NULL DEFAULT '0' ,
      //    PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `features` (
      //    `id` INT NOT NULL AUTO_INCREMENT , 
      //    `name` VARCHAR(150) NOT NULL , 
      //     PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `facilities` (
      //       `id` INT NOT NULL AUTO_INCREMENT , 
      //       `name` VARCHAR(150) NOT NULL , 
      //       PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `rooms` (
      //       `id` INT NOT NULL AUTO_INCREMENT , 
      //       `name` VARCHAR(150) NOT NULL , 
      //       `area` INT NOT NULL , 
      //       `price` INT NOT NULL , 
      //       `quantity` INT NOT NULL , 
      //       `adult` INT NOT NULL , 
      //       `children` INT NOT NULL , 
      //       `description` VARCHAR(350) NOT NULL , 
      //       `status` TINYINT NOT NULL DEFAULT '1', 
      //       `features` VARCHAR(250) NOT NULL, 
      //       `facilities` VARCHAR(250) NOT NULL, 
      //       PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `room_facilities` (
      //       `sr_no` INT NOT NULL AUTO_INCREMENT , 
      //       `room_id` INT NOT NULL , 
      //       `facilities_id` INT NOT NULL , 
      //       PRIMARY KEY (`sr_no`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `room_features` (
      //       `sr_no` INT NOT NULL AUTO_INCREMENT , 
      //       `room_id` INT NOT NULL , 
      //       `features_id` INT NOT NULL , 
      //       PRIMARY KEY (`sr_no`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `room_images` (
      //       `sr_no` INT NOT NULL AUTO_INCREMENT , 
      //       `room_id` INT NOT NULL , 
      //       `image` VARCHAR(250) NOT NULL , 
      //       `thumb` TINYINT NOT NULL DEFAULT '0' , 
      //       PRIMARY KEY (`sr_no`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `users` (
      //       `id` INT NOT NULL AUTO_INCREMENT , 
      //       `name` VARCHAR(250) NOT NULL , 
      //       `email` VARCHAR(250) NOT NULL , 
      //       `phone` VARCHAR(250) NOT NULL , 
      //       `image` VARCHAR(250) NULL , 
      //       `address` VARCHAR(300) NOT NULL , 
      //       `password` VARCHAR(250) NOT NULL , 
      //       `is_verified` INT NOT NULL DEFAULT '0' , 
      //       `token` VARCHAR(250) NULL , 
      //       `t_expire` DATE NULL , 
      //       `status` INT NOT NULL DEFAULT '1' , 
      //       `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      //       PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `bookings` (
      //       `id` INT NOT NULL AUTO_INCREMENT , 
      //       `booking_id` INT NOT NULL , 
      //       `user_id` INT NOT NULL , 
      //       `room_id` INT NOT NULL , 
      //       `cost` INT NOT NULL , 
      //       `days` INT NOT NULL , 
      //       `status` VARCHAR(20) NOT NULL , 
      //       `name` VARCHAR(250) NOT NULL , 
      //       `email` VARCHAR(250) NOT NULL , 
      //       `phone` VARCHAR(20) NOT NULL , 
      //       `check_in` DATE NOT NULL , 
      //       `check_out` DATE NOT NULL , 
      //       `address` VARCHAR(300) NOT NULL , 
      //       `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
      //        PRIMARY KEY (`id`)) ENGINE = InnoDB;");

      // $con->query("CREATE TABLE IF NOT EXISTS `login_sessions` (
      //       `id` INT NOT NULL AUTO_INCREMENT , 
      //       `user_id` INT NOT NULL , 
      //       `username` VARCHAR(250) NOT NULL , 
      //       `access` INT NOT NULL , 
      //       `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      //       PRIMARY KEY (`id`)) ENGINE = InnoDB;");
}
