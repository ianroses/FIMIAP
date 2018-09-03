CREATE TABLE Rol (
  ID_ROL numeric(5) NOT NULL,
  nombreRol varchar(20) NOT NULL
)

ALTER TABLE Rol ADD CONSTRAINT llavePrimaria PRIMARY KEY(ID_Rol);

BULK INSERT aequipo3.aequipo3.[Rol]
  FROM 'e:\wwwroot\aequipo3\Rol.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )