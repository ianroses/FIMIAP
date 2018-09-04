CREATE TABLE Privilegios (
  ID_Privilegios numeric(5) NOT NULL,
  descripcion varchar(40)
)

ALTER TABLE Privilegios ADD CONSTRAINT llavePrimariaPrivilegios PRIMARY KEY(ID_Privilegios);

BULK INSERT aequipo3.aequipo3.[Privilegios]
  FROM 'e:\wwwroot\aequipo3\privilegios.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )