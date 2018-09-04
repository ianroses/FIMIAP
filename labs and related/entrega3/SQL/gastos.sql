/*CREAR TABLA DE GASTOS*/
Create table Gastos(
ID_Gastos numeric(5) not null,
monto numeric(10,2),
fecha DateTime,
descripción varchar(50)
)

ALTER TABLE Gastos add constraint llaveGastos PRIMARY KEY (ID_Gastos)

BULK INSERT aequipo3.aequipo3.[Gastos]
  FROM 'e:\wwwroot\aequipo3\gastos.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )
