Create table Donadores(
RFC_Donadores VARCHAR(13) not null,
nombre varchar(100), teléfono NUMERIC(10), Calle_numero varchar(100), Colonia varchar(50), zip_code NUMERIC(5), Municipio varchar(50)

)

ALTER TABLE Donadores add constraint llavedonadores PRIMARY KEY (RFC_Donadores)

BULK INSERT aequipo3.aequipo3.[Donadores]
  FROM 'e:\wwwroot\aequipo3\donadores.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )