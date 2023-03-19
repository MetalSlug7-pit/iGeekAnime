<?php
include('ConectBanco.php');

$tabUsu = "CREATE TABLE IF NOT EXISTS Usuario(
    usuario_id int NOT NULL AUTO_INCREMENT,
    apelido varchar(50) NOT NULL,
    senha varchar(32) NOT NULL,
    email varchar(50) NOT NULL,
    fotoPerfil longblob,
    fotoWallpaper longblob,
    dataConta date,
    animeList varchar(100),
    mangaList varchar(100),
    novelList varchar(100),
    PRIMARY KEY (usuario_id)
)";

$tabAdm = "CREATE TABLE IF NOT EXISTS Admim(
    admim_id int NOT NULL,
    apelido varchar(50) NOT NULL,
    senha varchar(32) NOT NULL,
    PRIMARY KEY (admim_id)
)";

$tabObra = "CREATE TABLE IF NOT EXISTS Obras(
    obras_id int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    faixaEtaria int NOT NULL,
    sinopse varchar(1000) NOT NULL,
    imagemObra longblob NOT NULL,
    wallpaperObra longblob NOT NULL,
    dataLancamento datetime,
    versaoAnime varchar(100) NULL,
    versaoManga varchar(100) NULL,
    versaoLightNovel varchar(100) NULL,
    versaoWebNovel varchar(100) NULL,
    PRIMARY KEY (obras_id)
)";

$tabAutor = "CREATE TABLE IF NOT EXISTS Autor(
    autor_id int NOT NULL AUTO_INCREMENT,
    nomeAutor varchar(50) NOT NULL,
    PRIMARY KEY (autor_id)
)";

$tabGen = "CREATE TABLE IF NOT EXISTS Genero(
    genero_id int NOT NULL AUTO_INCREMENT,
    tipoGenero varchar(30) NOT NULL,
    PRIMARY KEY (genero_id)
)";

$tabFavoritar = "CREATE TABLE IF NOT EXISTS Favoritar_Obra_Usuario(
    idUsuario int NOT NULL,
    idObra int NOT NULL,
    PRIMARY KEY (idUsuario, idObra),
    CONSTRAINT usuarioID_FK FOREIGN KEY (idUsuario) REFERENCES Usuario(usuario_id),
    CONSTRAINT obraID_FK FOREIGN KEY (idObra) REFERENCES Obras(obras_id)	
)";

$tabObraGenero = "CREATE TABLE IF NOT EXISTS Generos_Obra_Genero(
    idGenero int NOT NULL,
    idObra int NOT NULL,
    PRIMARY KEY (idGenero, idObra),
    CONSTRAINT generoID_FK FOREIGN KEY (idGenero) REFERENCES Genero(genero_id),
    CONSTRAINT obraID_FK2 FOREIGN KEY (idObra) REFERENCES Obras(obras_id)	
)";

$tabObraAutor = "CREATE TABLE IF NOT EXISTS Autores_Obra_Autor(
    idAutor int NOT NULL,
    idObra int NOT NULL,
    PRIMARY KEY (idAutor, idObra),
    CONSTRAINT autorID_FK FOREIGN KEY (idAutor) REFERENCES Autor(autor_id),
    CONSTRAINT obraID_FK3 FOREIGN KEY (idObra) REFERENCES Obras(obras_id)	
)";
?>
