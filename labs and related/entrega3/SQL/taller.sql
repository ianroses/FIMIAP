CREATE TABLE Taller (
  ID_Taller numeric(5) NOT NULL,
  nombre_taller varchar(30),
  horarios varchar(200)
)

ALTER TABLE Taller ADD CONSTRAINT llavePrimariaTaller PRIMARY KEY (ID_Taller);

BULK INSERT aequipo3.aequipo3.[Taller]
  FROM 'e:\wwwroot\aequipo3\taller.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )