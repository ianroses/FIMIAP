/*

Ejercicio 7 

TEMPLATE SYSTEMS

Rosa Maria Ramirez Moreno - A01700857
Daniel Amezcua - A01234223
Alejandro Salmon - A01201954
Ramon Romero - A01700318

Modelo Relacional

Pelicula (titulo, anio, duracion, encolor, presupuesto, nomestudio, idproductor) 
Elenco (titulo, anio, nombre, sueldo) 
Actor (nombre, direccion, telefono, fechanacimiento, sexo) 
Productor (idproductor, nombre, direccion, telefono) 
Estudio (nomestudio, direccion)

Ejercicios

 El ingreso total recibido por cada actor, sin importar en cuantas peliculas haya participado.
 El monto total destinado a peliculas por cada Estudio Cinematografico, durante la decada de los 80's.
 Nombre y sueldo promedio de los actores (solo hombres) que reciben en promedio un pago superior a 5 millones de dolares por pelicula.
 Titulo y anio de produccion de las peliculas con menor presupuesto. (Por ejemplo, la pelicula de Titanic se ha producido en varias veces entre la lista de peliculas estaria la produccion de Titanic y el anio que fue filmada con menor presupuesto.)
 Mostrar el sueldo de la actriz mejor pagada.

*/

/* 1 - El ingreso total recibido por cada actor, sin importar en cuantas peliculas haya participado.*/


SELECT nombre, SUM(sueldo) as 'IngresoTotal'
FROM Elenco
GROUP BY nombre
ORDER BY IngresoTotal

/*2 - El monto total destinado a peliculas por cada Estudio Cinematografico, durante la decada de los 80's.*/


SELECT nomestudio,
sum(presupuesto) as 'Monto Total'
FROM Pelicula
WHERE anio>=1980 AND anio<1990
--  o BETWEEN 1980 AND 1990
GROUP BY nomestudio
ORDER BY Monto Total DESC


/*3 - Nombre y sueldo promedio de los actores (solo hombres) que reciben en promedio
un pago superior a 5 millones de dolares por pelicula.*/

SELECT Nombre, Sueldo, avg (Sueldo) as 'Promedio de sueldo'
FROM Actor AS A, Elenco as E, 
WHERE E.nombre = A.nombre
AND A.sexo='Masculino'
HAVING avg (Sueldo)>50000000
--Cuando tienen mismos campus hay que identificar a que tabla pertenecen
GROUP BY A.Nombre
ORDER BY avg (Sueldo)


/*4 - Titulo y anio de produccion de las peliculas con menor presupuesto. (Por ejemplo, la pelicula de 
Titanic se ha producido en varias veces entre la lista de peliculas estaria la produccion de Titanic y
el anio que fue filmada con menor presupuesto.)*/

SELECT Pelicula.Nombre, Pelicula.anio, Pelicula.Presupuesto
FROM
(SELECT Pelicula.Nombre, Min(Pelicula.presupuesto) AS minpres FROM
 Pelicula GROUP BY Pelicula.nombre) AS Presupuestos
 INNER JOIN 
Pelicula ON Pelicula.Nombre= Presupuesto.Nombre AND Pelicula.presupuesto <= presupuesto.minpres

/*5 - Mostrar el sueldo de la actriz mejor pagada.*/

SELECT MAX(Sueldo)
FROM Actor A, Elenco E
WHERE A.Nombre = E.Nombre
AND sexo = 'F'

/* 

Otra posible solucion

SELECT TOP 1 sueldo
FROM Elenco E, Actor A
WHERE E.nombre = A.nombre AND A.sexo = 'M'
ORDER BY sueldo DESC
*/



