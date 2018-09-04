SET DATEFORMAT dmy
CREATE TABLE Noticia (
  ID_Noticia numeric(5) NOT NULL,
  nombreUsuario varchar(20) NOT NULL,
  titulo varchar(50),
  descripcion varchar(MAX),
  fecha_publicacion datetime
)
ALTER TABLE Noticia ADD CONSTRAINT valorUnicoNoticia UNIQUE (ID_Noticia);
ALTER TABLE Noticia ADD CONSTRAINT llavePrimariaNoticia PRIMARY KEY (ID_Noticia,nombreUsuario);
ALTER TABLE Noticia ADD CONSTRAINT llaveForaneaNoticia FOREIGN KEY (nombreUsuario) REFERENCES Usuarios(nombreUsuario);

BULK INSERT aequipo3.aequipo3.[Noticia]
  FROM 'e:\wwwroot\aequipo3\noticia.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )