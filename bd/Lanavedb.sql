


CREATE DATABASE `lanave`;
USE `lanave`;

CREATE TABLE anuncios (
id_anuncio int(1,1) NOT NULL AUTO_INCREMENT,
nombre varchar(100)  NOT NULL,
descripcion varchar(400) NOT NULL,
imagen varchar(200) NOT NULL,
link varchar(200) NOT NULL,
CONSTRAINT PK_anuncios PRIMARY KEY (id_anuncio),
)
GO

CREATE TABLE artistas (
id_artista int(1,1) NOT NULL AUTO_INCREMENT,
nombre varchar(50)     NOT NULL,
foto  varchar(200)     NOT NULL,
descripcion  varchar(400)     NOT NULL,
facebook  varchar(200)     NOT NULL,
instagram  varchar(200)     NOT NULL,
youtube  varchar(200)     NOT NULL,
CONSTRAINT PK_artistas PRIMARY KEY ( id_artista ),
)
GO

CREATE TABLE    videos  (
 id_video  int(1,1) NOT NULL AUTO_INCREMENT,
 nombre  varchar(200)     NOT NULL,
 descripcion  varchar(500)     NOT NULL,
 enlace  varchar(200)     NOT NULL,
CONSTRAINT PK_videos PRIMARY KEY ( id_video ),
)
GO


CREATE TABLE    estado  (
 id_estado  int(1,1) NOT NULL AUTO_INCREMENT,
 estado  varchar(50)     NOT NULL,
CONSTRAINT PK_estado PRIMARY KEY ( id_estado ),
)
GO

INSERT INTO estado (id_estado, estado) VALUES
(1, 'Disponible'),
(2, 'Vendido');
GO

CREATE TABLE    genero  (
 id_genero  int(1,1) NOT NULL AUTO_INCREMENT,
 genero  varchar(50)     NOT NULL,
CONSTRAINT PK_genero PRIMARY KEY ( id_genero ),
)
GO

INSERT INTO genero (id_genero, genero) VALUES
(1, 'Trap'),
(2, 'Boom Bap'),
(3, 'R&B'),
(4, 'Dancehall'),
(5, 'Reggaeton'),
(6, 'Synthpop'),
(7, 'Retrowave');
GO


CREATE TABLE  beats  (
 id_beat  int(1,1) NOT NULL AUTO_INCREMENT,
 nombre  varchar(50)     NOT NULL,
 beat  varchar(200)     NOT NULL,
 precio  decimal(10,0) NOT NULL,
 id_genero  int NOT NULL,
 id_estado  int NOT NULL,
CONSTRAINT PK_beats PRIMARY KEY(id_beat), 
CONSTRAINT rela_Genero FOREIGN KEY(id_genero) REFERENCES genero(id_genero),
CONSTRAINT rela_Estado FOREIGN KEY(id_estado) REFERENCES estado(id_estado),
)
GO

CREATE TABLE   usuarios  (
 id_usuario  int(1,1) NOT NULL AUTO_INCREMENT,
 Usuario  varchar(100)     NOT NULL,
 Contrasena  varchar(100)     NOT NULL,
 CONSTRAINT PK_usuarios PRIMARY KEY ( id_usuario ),
)
GO

INSERT INTO  usuarios  ( Usuario ,  Contrasena) VALUES
('admin', 'admin'),
GO