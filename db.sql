drop database if exists cert_gen_db;
create database if not exists cert_gen_db character set utf8mb4 COLLATE utf8mb4_unicode_ci;
use cert_gen_db;

create table if not exists `users` (

  `id` int(11) auto_increment primary key,
  `key` varchar(20) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` boolean NOT NULL,
  `flag` boolean NOT NULL

);