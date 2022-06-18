drop database if exists cert_gen_db;
create database if not exists cert_gen_db;
use cert_gen_db;

create table if not exists `users` (

  `id` int(11) auto_increment primary key,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sign` varchar(20) NOT NULL,
  `flag` boolean NOT NULL

);