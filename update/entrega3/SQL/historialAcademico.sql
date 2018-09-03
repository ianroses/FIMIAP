CREATE TABLE HistorialAcademico(
  ID_Alumno NUMERIC(5) NOT NULL , ID_HA NUMERIC(5) NOT NULL , Grado_estudios VARCHAR(50), Status VARCHAR(10),
  años_suspension NUMERIC(2), motivo_suspension_estudios VARCHAR(200), otros_estudios VARCHAR(200)
)

ALTER TABLE HistorialAcademico add constraint llaveHA PRIMARY KEY (ID_Alumno, ID_HA)
ALTER TABLE HistorialAcademico add constraint ForaneaHistorialAcademico foreign key (ID_Alumno) references
  Alumnos(ID_Alumno)
  
  BULK INSERT aequipo3.aequipo3.[HistorialAcademico]
  FROM 'e:\wwwroot\aequipo3\historialAcademico.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )