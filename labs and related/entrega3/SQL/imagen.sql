CREATE TABLE Imagen (
  ubicacion varchar(40) NOT NULL,
  ID_Noticia numeric(5) NOT NULL,
  nombre varchar(20),
  descripcion varchar(100)
)
ALTER TABLE Imagen ADD CONSTRAINT llavePrimariaImagen PRIMARY KEY (ubicacion,ID_Noticia);
ALTER TABLE Imagen ADD CONSTRAINT llaveForaneaImagen FOREIGN KEY (ID_Noticia) REFERENCES Noticia(ID_Noticia);

BULK INSERT aequipo3.aequipo3.[Imagen]
  FROM 'e:\wwwroot\aequipo3\Imagen.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )