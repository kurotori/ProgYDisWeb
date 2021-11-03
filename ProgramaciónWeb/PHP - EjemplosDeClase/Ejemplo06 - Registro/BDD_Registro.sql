DROP SCHEMA IF EXISTS ejemploLogin;
CREATE SCHEMA ejemploLogin;
USE ejemploLogin;

CREATE TABLE usuario(
	CI varchar(8) not null unique primary key,
	hash varchar(80) NOT NULL
	nombre varchar(12) not null,
);
