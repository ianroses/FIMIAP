SET DATEFORMAT dmy
CREATE  TABLE Alumnos(
  ID_Alumno NUMERIC(5)  NOT NULL, Nombre VARCHAR(100), Apellidos VARCHAR(100), Calle_numero VARCHAR(100),
  Colonia VARCHAR(50), ZIP NUMERIC(5), Municipio VARCHAR(50), Ocupación VARCHAR(50), Estado_Civil VARCHAR(50),
  Fecha_de_nacimiento DATETIME, Género VARCHAR(1), Tcasa NUMERIC(10), Tcel NUMERIC(10), Estatus VARCHAR(10),
  Contacto_Nombre VARCHAR(100), Contacto_telefono NUMERIC(10), medio_se_entero_FIM VARCHAR(20)
)

ALTER TABLE Alumnos add constraint llaveAlumnos PRIMARY KEY (ID_Alumno)

BULK INSERT aequipo3.aequipo3.[Alumnos]
  FROM 'e:\wwwroot\aequipo3\alumnos.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )