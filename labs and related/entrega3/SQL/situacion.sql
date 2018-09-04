CREATE TABLE Situacion (
  ID_Alumno           NUMERIC(5) NOT NULL,
  ID_Situacion        NUMERIC(5) NOT NULL,
  vivienda_compartida VARCHAR(50),
  responsable_pago    VARCHAR(50),
  parentesco          VARCHAR(20),
  situacion_vivienda  VARCHAR(30),
  fuente_ingresos     VARCHAR(30),
  monto_ingresos      NUMERIC(10, 2),
  servicios           VARCHAR(200)
)

ALTER TABLE Situacion ADD CONSTRAINT llaveSituacion PRIMARY KEY(ID_Alumno, ID_Situacion);
ALTER TABLE Situacion ADD CONSTRAINT llaveForaneaSituacion FOREIGN KEY (ID_Alumno) REFERENCES Alumnos (ID_Alumno);

BULK INSERT aequipo3.aequipo3.[Situacion]
  FROM 'e:\wwwroot\aequipo3\Situacion.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )