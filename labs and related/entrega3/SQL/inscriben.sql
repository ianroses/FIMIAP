SET DATEFORMAT dmy
CREATE TABLE Inscriben (
  monto numeric(10,2) NOT NULL,
  fecha datetime NOT NULL,
  ID_Alumno numeric(5) NOT NULL,
  ID_Taller numeric(5) NOT NULL
)

ALTER TABLE Inscriben ADD CONSTRAINT llavePrimariaInscriben PRIMARY KEY(monto,fecha,ID_Alumno,ID_Taller);
ALTER TABLE Inscriben ADD CONSTRAINT llaveForaneaInscriben1 FOREIGN KEY (ID_Alumno) REFERENCES ALumnos(ID_Alumno);
ALTER TABLE INSCRIBEN ADD CONSTRAINT llaveForaneaInscriben2 FOREIGN KEY (ID_Taller) REFERENCES Taller(ID_Taller);

BULK INSERT aequipo3.aequipo3.[Inscriben]
  FROM 'e:\wwwroot\aequipo3\Inscriben.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )