{"filter":false,"title":"donadores.sql","tooltip":"/donadores.sql","undoManager":{"mark":28,"position":28,"stack":[[{"start":{"row":0,"column":0},"end":{"row":7,"column":79},"action":"insert","lines":["Create table Donadores(","RFC_Donadores VARCHAR(13) not null,","nombre varchar(100), teléfono NUMERIC(10), Calle_numero varchar(100), Colonia varchar(50), zip_code NUMERIC(5), Municipio varchar(50)","",")","","","ALTER TABLE Donadores add constraint llavedonadores PRIMARY KEY (RFC_Donadores)"],"id":1}],[{"start":{"row":7,"column":79},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":8,"column":0},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":3}],[{"start":{"row":8,"column":0},"end":{"row":9,"column":0},"action":"remove","lines":["",""],"id":4}],[{"start":{"row":7,"column":79},"end":{"row":8,"column":0},"action":"remove","lines":["",""],"id":5}],[{"start":{"row":7,"column":79},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":6}],[{"start":{"row":8,"column":0},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":7}],[{"start":{"row":9,"column":0},"end":{"row":16,"column":3},"action":"insert","lines":["BULK INSERT aequipo3.aequipo3.[Gastos]","  FROM 'e:\\wwwroot\\aequipo3\\gastos.csv'","  WITH","  (","    CODEPAGE = 'ACP',","    FIELDTERMINATOR = ',',","    ROWTERMINATOR = '\\n'","  )"],"id":8}],[{"start":{"row":9,"column":31},"end":{"row":9,"column":37},"action":"remove","lines":["Gastos"],"id":9},{"start":{"row":9,"column":31},"end":{"row":9,"column":32},"action":"insert","lines":["D"]}],[{"start":{"row":9,"column":32},"end":{"row":9,"column":33},"action":"insert","lines":["o"],"id":10}],[{"start":{"row":9,"column":33},"end":{"row":9,"column":34},"action":"insert","lines":["n"],"id":11}],[{"start":{"row":9,"column":34},"end":{"row":9,"column":35},"action":"insert","lines":["a"],"id":12}],[{"start":{"row":9,"column":35},"end":{"row":9,"column":36},"action":"insert","lines":["d"],"id":13}],[{"start":{"row":9,"column":36},"end":{"row":9,"column":37},"action":"insert","lines":["o"],"id":14}],[{"start":{"row":9,"column":37},"end":{"row":9,"column":38},"action":"insert","lines":["r"],"id":15}],[{"start":{"row":9,"column":38},"end":{"row":9,"column":39},"action":"insert","lines":["e"],"id":16}],[{"start":{"row":9,"column":39},"end":{"row":9,"column":40},"action":"insert","lines":["s"],"id":17}],[{"start":{"row":10,"column":28},"end":{"row":10,"column":34},"action":"remove","lines":["gastos"],"id":18},{"start":{"row":10,"column":28},"end":{"row":10,"column":29},"action":"insert","lines":["D"]}],[{"start":{"row":10,"column":28},"end":{"row":10,"column":29},"action":"remove","lines":["D"],"id":19}],[{"start":{"row":10,"column":28},"end":{"row":10,"column":29},"action":"insert","lines":["d"],"id":20}],[{"start":{"row":10,"column":29},"end":{"row":10,"column":30},"action":"insert","lines":["o"],"id":21}],[{"start":{"row":10,"column":30},"end":{"row":10,"column":31},"action":"insert","lines":["n"],"id":22}],[{"start":{"row":10,"column":31},"end":{"row":10,"column":32},"action":"insert","lines":["a"],"id":23}],[{"start":{"row":10,"column":32},"end":{"row":10,"column":33},"action":"insert","lines":["d"],"id":24}],[{"start":{"row":10,"column":33},"end":{"row":10,"column":34},"action":"insert","lines":["o"],"id":25}],[{"start":{"row":10,"column":34},"end":{"row":10,"column":35},"action":"insert","lines":["r"],"id":26}],[{"start":{"row":10,"column":35},"end":{"row":10,"column":36},"action":"insert","lines":["e"],"id":27}],[{"start":{"row":10,"column":36},"end":{"row":10,"column":37},"action":"insert","lines":["s"],"id":28}],[{"start":{"row":5,"column":0},"end":{"row":6,"column":0},"action":"remove","lines":["",""],"id":29}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":5,"column":0},"end":{"row":5,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1488959478319,"hash":"34a48637e9ff1f41cfed6d7f328bbae1fd1d9912"}