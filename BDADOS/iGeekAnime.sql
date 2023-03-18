create database iGeekAnime;
use iGeekAnime;
drop database iGeekAnime;

create table Usuario(
usuario_id int NOT NULL AUTO_INCREMENT,
apelido varchar(50) NOT NULL,
senha varchar(32) NOT NULL,
email varchar(50) NOT NULL,
fotoPerfil longblob,
fotoWallpaper longblob,
dataConta datetime,
PRIMARY KEY (usuario_id)
);
select*from Usuario;
truncate table Usuario;


create table Admim(
admim_id int NOT NULL,
apelido varchar(50) NOT NULL,
senha varchar(32) NOT NULL,
PRIMARY KEY (admim_id)
);
select*from Admim;
truncate table Admim;


create table Genero(
genero_id int NOT NULL AUTO_INCREMENT,
tipoGenero varchar(30) NOT NULL,
PRIMARY KEY (genero_id)
);
select*from Genero;
truncate table Genero;


create table Autor(
autor_id int NOT NULL AUTO_INCREMENT,
nomeAutor varchar(50) NOT NULL,
PRIMARY KEY (autor_id)
);
select*from Autor;
truncate table Autor;


create table Obras(
obras_id int NOT NULL AUTO_INCREMENT,
nome varchar(50) NOT NULL,
faixaEtaria int NOT NULL,
sinopse varchar(1000) NOT NULL,
imagemObra longblob NOT NULL,
wallpaperObra longblob NOT NULL,
dataLancamento datetime,
versaoAnime varchar(100),
versaoManga varchar(100),
versaoLightNovel varchar(100),
versaoWebNovel varchar(100),
PRIMARY KEY (obras_id)
);
select*from Obras;
truncate table Obras;


create table Favoritar_Obra_Usuario(
idUsuario int NOT NULL,
idObra int NOT NULL,
PRIMARY KEY (idUsuario, idObra),
CONSTRAINT usuarioID_FK FOREIGN KEY (idUsuario) REFERENCES Usuario(usuario_id),
CONSTRAINT obraID_FK FOREIGN KEY (idObra) REFERENCES Obras(obras_id)	
);
select*from Favoritar_Obra_Usuario;
truncate table Favoritar_Obra_Usuario;


create table Generos_Obra_Genero(
idGenero int NOT NULL,
idObra int NOT NULL,
PRIMARY KEY (idGenero, idObra),
CONSTRAINT generoID_FK FOREIGN KEY (idGenero) REFERENCES Genero(genero_id),
CONSTRAINT obraID_FK2 FOREIGN KEY (idObra) REFERENCES Obras(obras_id)	
);
select*from Generos_Obra_Genero;
truncate table Generos_Obra_Genero;


create table Autores_Obra_Autor(
idAutor int NOT NULL,
idObra int NOT NULL,
PRIMARY KEY (idAutor, idObra),
CONSTRAINT autorID_FK FOREIGN KEY (idAutor) REFERENCES Autor(autor_id),
CONSTRAINT obraID_FK3 FOREIGN KEY (idObra) REFERENCES Obras(obras_id)	
);
select*from Autores_Obra_Autor;
truncate table Autores_Obra_Autor;