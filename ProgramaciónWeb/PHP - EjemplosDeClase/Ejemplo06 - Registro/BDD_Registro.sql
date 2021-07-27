DROP SCHEMA IF EXISTS ejemploLogin;
CREATE SCHEMA ejemploLogin;
USE ejemploLogin;

CREATE TABLE usuario(
	CI varchar(8) not null unique primary key,
	nombre varchar(12) not null,
	hash varchar(80) NOT NULL
);