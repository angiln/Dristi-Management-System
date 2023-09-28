<?php
    //connect to the server
    $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Server.");
    
    //create the database if it does not exist & login into it
    $dbstart = "CREATE DATABASE IF NOT EXISTS `new`;";
    $connect->query($dbstart);
    mysqli_select_db($connect , "thirdeyedb");

    // create table if it does not exist
    $que = "CREATE TABLE IF NOT EXISTS `register` (
            `id` INT(10) NOT NULL AUTO_INCREMENT , 
            `fname` VARCHAR(50) NOT NULL , 
            `lname` VARCHAR(50) NOT NULL , 
            `gender` ENUM('male','female','other') NOT NULL , 
            `address` VARCHAR(50) NOT NULL , 
            `email` VARCHAR(50) NOT NULL , 
            `contact` VARCHAR(50) NOT NULL , 
            `password` VARCHAR(50) NOT NULL , 
            PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $connect->query($que);

    $que = "CREATE TABLE IF NOT EXISTS `booking` (
            `id` INT(10) NOT NULL AUTO_INCREMENT , 
            `user` VARCHAR(10) NOT NULL , 
            `bookday` DATE NOT NULL , 
            `shift` VARCHAR(10) NOT NULL , 
            `contact` VARCHAR(15), 
            `email` VARCHAR(30),
            `timecheck` INT(30), 
            `confirm_key` INT(5), 
            `vno` INT(20),
            `vimgloc` VARCHAR(50),
            PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $connect->query($que);

    $que = "CREATE TABLE IF NOT EXISTS `team_reg`(
            `sn` INT(5) NOT NULL AUTO_INCREMENT,
            `team_name` VARCHAR(100) NOT NULL ,
            PRIMARY KEY (`sn`)) ENGINE = InnoDB;";
    $connect->query($que);

    // $que = "INSERT INTO register (`id`,`fname`,`lname`,`gender`,`address`,`email`,`contact`,`password`)
    //         VALUES (NULL,'admin','admin','male','bkt','admin','9864750623','admin')";
    // $connect->query($que);
?>
