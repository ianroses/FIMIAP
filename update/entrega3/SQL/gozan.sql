CREATE TABLE Gozan(
  ID_Rol numeric(5) NOT NULL,
  ID_Privilegios numeric(5) NOT NULL
)
ALTER TABLE Gozan ADD CONSTRAINT llavePrimariaGozan PRIMARY KEY(ID_Rol, ID_Privilegios);
ALTER TABLE Gozan ADD CONSTRAINT llaveForaneaGozan FOREIGN KEY(ID_Privilegios) REFERENCES Privilegios(ID_Privilegios);

BULK INSERT aequipo3.aequipo3.[Gozan]
  FROM 'e:\wwwroot\aequipo3\gozan.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )