SET DATEFORMAT dmy
CREATE  TABLE Donaciones (
  RFC_donadores VARCHAR(13) NOT NULL,
  ID_donacion   NUMERIC(5)  NOT NULL,
  monto         NUMERIC(10, 2),
  fecha         DATETIME
)

ALTER TABLE Donaciones add constraint ForaneaDonaciones
  foreign key (RFC_donadores) references Donadores(RFC_donadores);

ALTER TABLE Donaciones add constraint llaveDonaciones PRIMARY KEY (RFC_donadores, ID_donacion)

BULK INSERT aequipo3.aequipo3.[Donaciones]
  FROM 'e:\wwwroot\aequipo3\donaciones.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )