CREATE TABLE Usuarios (
  nombreUsuario varchar(20) NOT NULL,
  ID_ROL numeric(5) NOT NULL,
  contrasena varchar(15) NOT NULL

ALTER TABLE USUARIOS ADD CONSTRAINT valorUnico UNIQUE (nombreUsuario);
ALTER TABLE Usuarios ADD CONSTRAINT llavePrimariaUsuarios PRIMARY KEY (nombreUsuario,ID_ROL);
ALTER TABLE Usuarios ADD CONSTRAINT llaveForaneaUsuarios FOREIGN KEY (ID_ROL) REFERENCES Rol(ID_Rol);

BULK INSERT aequipo3.aequipo3.[Usuarios]
  FROM 'e:\wwwroot\aequipo3\Usuarios.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )