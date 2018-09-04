CREATE TABLE AccesoIT(ID_Alumno NUMERIC(5) NOT NULL , ID_Acceso NUMERIC(5) NOT NULL ,
  Acceso VARCHAR(20), Herramientas VARCHAR(100))

ALTER TABLE AccesoIT add constraint llaveAccesoIT PRIMARY KEY (ID_Alumno, ID_Acceso)

ALTER TABLE AccesoIT add constraint ForaneaAccesoIT
  foreign key (ID_Alumno) references Alumnos(ID_Alumno);
  
  BULK INSERT aequipo3.aequipo3.[AccesoIT]
  FROM 'e:\wwwroot\aequipo3\accesoIT.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )