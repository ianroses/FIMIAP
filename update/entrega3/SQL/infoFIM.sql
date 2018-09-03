CREATE  TABLE infoFIM (
  ID_info   NUMERIC(5)  NOT NULL,
  nombre         VARCHAR(50),
  descripcion VARCHAR(500)
)

ALTER TABLE infoFIM add constraint llaveInfoFim PRIMARY KEY (ID_info)

BULK INSERT aequipo3.aequipo3.[infoFIM]
  FROM 'e:\wwwroot\aequipo3\infoFIM.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )