CREATE TABLE InfoLaboral(ID_Alumno NUMERIC(5) NOT NULL , ID_Lab NUMERIC(5) NOT NULL , Empresa VARCHAR(100),
  Puesto VARCHAR(50),Antiguedad NUMERIC(2)
)

ALTER TABLE InfoLaboral add constraint llaveInfoLaboral PRIMARY KEY (ID_Alumno, ID_Lab)
ALTER TABLE InfoLaboral add constraint ForaneaInfoLab
  foreign key (ID_Alumno) references Alumnos(ID_Alumno);
  
  BULK INSERT aequipo3.aequipo3.[InfoLaboral]
  FROM 'e:\wwwroot\aequipo3\InfoLaboral.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )