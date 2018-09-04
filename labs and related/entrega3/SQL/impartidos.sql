CREATE TABLE Impartidos (
  ID_Taller numeric(5) NOT NULL,
  ID_Empleado numeric(5) NOT NULL
)

ALTER TABLE Impartidos ADD CONSTRAINT llavePrimariaImpartidos PRIMARY KEY (ID_Taller, ID_Empleado);
ALTER TABLE Impartidos ADD CONSTRAINT llaveForaneaImpartidos FOREIGN KEY(ID_Empleado) REFERENCES Empleado(ID_Empleado)

BULK INSERT aequipo3.aequipo3.[Impartidos]
  FROM 'e:\wwwroot\aequipo3\Impartidos.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )