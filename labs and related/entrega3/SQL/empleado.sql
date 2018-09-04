SET DATEFORMAT dmy
CREATE TABLE Empleado(
  ID_Empleado numeric(5) NOT NULL,
  nombre varchar(30),
  apellidos varchar(30),
  telefono_casa varchar(10),
  fecha_nacimiento datetime,
  telefono_celular varchar(10),
  calle_numero varchar(40),
  colonia varchar(25),
  zip_code numeric(5),
  municipio varchar(15)
)

ALTER TABLE Empleado ADD CONSTRAINT llavePrimariaEmpleado PRIMARY KEY (ID_Empleado);

BULK INSERT aequipo3.aequipo3.[Empleado]
  FROM 'e:\wwwroot\aequipo3\empleado.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )