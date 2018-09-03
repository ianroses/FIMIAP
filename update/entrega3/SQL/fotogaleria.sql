SET DATETIME dmy
CREATE TABLE FotosGaleria (
  ubicacion varchar(60) NOT NULL,
  fecha datetime,
  titulo varchar(25)
)
ALTER TABLE FotosGaleria ADD CONSTRAINT llavePrimariaFotosGaleria PRIMARY KEY(ubicacion);

BULK INSERT aequipo3.aequipo3.[FotosGaleria]
  FROM 'e:\wwwroot\aequipo3\fotosgaleria.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )