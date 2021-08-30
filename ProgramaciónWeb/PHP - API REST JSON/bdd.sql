DROP SCHEMA IF EXISTS registro;
CREATE SCHEMA registro;
USE registro;


create table usuario(
    nombre VARCHAR(12) UNIQUE NOT NULL primary KEY,
    passHash VARCHAR(60) not null,
    passToken varchar(60) not null
);
