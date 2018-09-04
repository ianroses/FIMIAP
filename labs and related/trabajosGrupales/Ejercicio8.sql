/*

EJERCICIO 8: Expresión de consultas en SQL usando Sub-consultas.

Daniel Jesús Amezcua Sánchez - A01234223
Alejandro Salmón Félix Díaz - A01201954
José Ramón Fernando Romero Chávez - A01700318
Rosa María Ramírez Moreno - A01700857


(2)->LA SOLUCION CON SUBCONSULTA

1.- Actrices de “Las brujas de Salem”. 
1.- Actrices de “Las brujas de Salem”. (2)

2.- Nombres de los actores que aparecen en películas producidas por MGM en 1995. 
2.- Nombres de los actores que aparecen en películas producidas por MGM en 1995. (2)

3.- Películas que duran más que “Lo que el viento se llevó” (de 1939).
3.- Películas que duran más que “Lo que el viento se llevó” (de 1939). (2)

4.- Productores que han hecho más películas que George Lucas. 
4.- Productores que han hecho más películas que George Lucas. (2)

5.- Nombres de los productores de las películas en las que ha aparecido Sharon Stone. 
5.- Nombres de los productores de las películas en las que ha aparecido Sharon Stone. (2)

6.- Título de las películas que han sido filmadas más de una vez
6.- Título de las películas que han sido filmadas más de una vez(2)


Película(título, año, duración, encolor, presupuesto, nomestudio, idproductor) 
Elenco(título, año, nombre, sueldo) 
Actor(nombre, dirección, telefono, fechanacimiento, sexo) 
Productor(idproductor, nombre, dirección, teléfono) 
Estudio(nomestudio, dirección) */

/* 1 */


SELECT Nombre
FROM  Elenco E, Actor A
WHERE  E.nombre = A.nombre AND A.sexo='F' AND  E.titulo='Las Brujas de Salem'


/* 1.2 */

  
   SELECT Nombre FROM Actor 
   WHERE Nombre IN (SELECT Nombre FROM Elenco Where E.titulo='Las Brujas de Salem') and sexo='F' 


/* 2  Nombres de los actores que aparecen en películas producidas por MGM en 1995*/

SELECT A.nombre
FROM Actor A, Elenco E, Pelicula P
WHERE Elenco.Titulo = Pelicula.Titulo
AND Elenco.nombre = Actor.nombre
AND Pelicula.nomestudio = "MGM" 
AND Pelicula.año = 1995


/* 2.2  Nombres de los actores que aparecen en películas producidas por MGM en 1995*/

SELECT A.nombre
FROM Actor AS A, Elenco AS E
WHERE A.nombre = E.nombre AND E.titulo IN (SELECT titulo
                                            FROM Pelicula P
                                            WHERE P.nomestudio = "MGM" 
                                            AND P.año = 1995
                                            )

/* 3  Películas que duran más que “Lo que el viento se llevó” (de 1939).*/

CREATE SYNONYM Dura FOR Pelicula

SELECT *
FROM Pelicula, Dura
WHERE Dura.nombre = "Lo que el viento se llevó" 
AND Dura.año = 1939 
AND  Pelicula.duracion > Dura.duracion


/*–––––––––– 3.2 Películas que duran más que “Lo que el viento se llevó” (de 1939).––––––––––*/

SELECT *
FROM Pelicula
WHERE Pelicula.duracion > (SELECT duracion
                           FROM Pelicula
                           WHERE Pelicula.titulo = 'Lo que el viento se llevó'
                           AND Pelicula.año = 1939 
                           )

/* 4  */

SELECT DISTINCT Pr.nombre, COUNT(Pr.idproductor)
FROM Proudctor AS Pr, Pelicula AS P
WHERE Pr.idproductor = P.idproductor
GROUP BY Pr.nombre
HAVING COUNT(idproductor) > (
                                SELECT COUNT(P.titulo)
                                FROM Pelicula AS P, Productor AS Pr
                                WHERE Pr.idproductor = P.idproductor
                                AND Pr.nombre = 'George Lucas'
                                ) 

/* 4.2 */

SELECT DISTINCT Pr.Nombre, COUNT(Pr.idproductor)
FROM Pelicula AS P, Productor AS Pr
WHERE P.idproductor = Pr.idproductor
GROUP BY Pr.Nombre
HAVING COUNT(Pr.idproductor) > (SELECT COUNT(P.titulo)
                    FROM Pelicula AS P, Productor AS Pr
                    WHERE Pr.idproductor = P.idproductor
                    AND Pr.nombre = 'George Lucas'
                    )

/* 5 */

SELECT Pr.nombre
FROM Productor AS Pr, Pelicula AS P, Elenco AS E
WHERE Pr.idproductor = P.idproductor
AND P.titulo = E.titulo
AND E.nombre = "Sharon Stone"

/*5(2)*/
(SELECT nombre
FROM Productor 
WHERE idproductor IN (SELECT DISTINCT idproductor
                    FROM Productor prod, Pelicula pel, Elenco e
                    WHERE e.nombre = "Sharon Stone" AND e.titulo = pel.titulo AND pel.idproductor = prod.idproductor
                    )

/* 6 */

CREATE SYNONYM film FOR Pelicula
SELECT p.titulo, COUNT(*) AS "NumFilm"
FROM Pelicula AS p
WHERE p.titulo = film.titulo
GROUP BY p.titulo
HAVING COUNT(*) > 1

/* 6(2) */

SELECT p.titulo, COUNT(*) AS "NumFilm"
FROM Pelicula p
HAVING COUNT(*) > (SELECT COUNT(*) as "NumFilm"
                    FROM Pelicula p
                    WHERE p.titulo = Pelicula.titulo
                    GROUP BY p.titulo
                    HAVING (COUNT(*) = 1)
					)