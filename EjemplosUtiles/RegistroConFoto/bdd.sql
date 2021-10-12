DROP SCHEMA IF EXISTS ejemPubl;
CREATE SCHEMA ejemPubl;
USE ejemPubl;

CREATE TABLE usuario(
    nombre varchar(20) not null unique primary KEY,
    fecha_reg timestamp not null default current_timestamp
);

create table publicacion(
    id int NOT NULL unique auto_increment primary key,
    titulo varchar(40) not null,
    descripcion varchar(140) not null,
    fecha timestamp not null default current_timestamp
);

create table imagen(
    id int not null unique auto_increment primary key,
    ruta varchar(50) not null
);

create table usa(
    usuario_nombre varchar(20) not null,
    imagen_id int NOT NULL UNIQUE primary key
);

create table crea(
    usuario_nombre varchar(20) not null,
    publicacion_id int NOT NULL unique primary KEY
);

create table tiene(
    publicacion_id int not null,
    imagen_id int NOT NULL UNIQUE primary key
);

alter table crea
add CONSTRAINT fk_usuario_crea
foreign key (usuario_nombre)
references usuario(nombre)
on update cascade
on delete cascade;

alter table crea
add CONSTRAINT fk_crea_publicacion
foreign key (publicacion_id)
references publicacion(id)
on update cascade
on delete cascade;

alter table tiene
add CONSTRAINT fk_publicacion_tiene
foreign key (publicacion_id)
references publicacion(id)
on update cascade
on delete cascade;

alter table tiene
add CONSTRAINT fk_tiene_imagen
foreign key (imagen_id)
references imagen(id)
on update cascade
on delete cascade;

alter table usa
add CONSTRAINT fk_usuario_usa
foreign key (usuario_nombre)
references usuario(nombre)
on update cascade
on delete cascade;

alter table usa
add CONSTRAINT fk_usa_imagen
foreign key (imagen_id)
references imagen(id)
on update cascade
on delete cascade;
