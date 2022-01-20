/*
SUBCONSULTAS
Son consultas que se ejecutan dentro de otras.
Consiste en utilizar los resultados de la subconsulta para operar en la consulta principal
Jugando con las claves foraneas / ajenas
*/

SELECT * FROM usuarios

INSERT INTO usuarios VALUES(NULL,"Admin","Admin","admin@admin.com",1234,CURDATE());

#CONSULTAR LOS USUARIOS QUE TENGAN ENTRADAS CREADAS O HECHAS.
SELECT * FROM usuarios WHERE id IN (SELECT usuario_id FROM entradas)

SELECT DISTINCT usuario_id FROM entradas

#CONSULTAR LOS USUARIOS QUE NO TENGAN ENTRADAS CREADAS O HECHAS.
SELECT * FROM usuarios WHERE id NOT IN (SELECT usuario_id FROM entradas)

#SACAR LOS USUARIOS QUE TENGAN ALGUNA ENTRADA QUE EN SU TÍTULO HABLE DE FIFA
 
SELECT * FROM entradas

#SACAR TODAS LAS ENTRADAS DE LA CATEGORÍA ACCIÓN UTILIZANDO SU NOMBRE

SELECT categoria_id,titulo FROM entradas WHERE categoria_id IN (SELECT id FROM categorias WHERE nombre = "Deportes")

#MOSTRAR LAS CATEGORÍAS CON MÁS DE 3 O MÁS ENTRADAS
/*select nombre from categorias where id in (select categoria_id from entradas having count(id) > 3)*/
SELECT nombre FROM categorias WHERE id IN
	(SELECT categoria_id FROM entradas GROUP BY categoria_id HAVING COUNT(categoria_id) > 3)

INSERT INTO entradas VALUES(NULL,4,3,'PES','PES2022',CURDATE())
INSERT INTO entradas VALUES(NULL,4,2,'Roll','Roll2022',CURDATE())

#MOSTRAR LOS USUARIOS QUE CREARON UNA ENTRADA UN MARTES
SELECT nombre FROM usuarios WHERE id IN (SELECT usuario_id,titulo,fecha FROM entradas WHERE DAYOFWEEK(fecha) = 4)

INSERT INTO entradas VALUES(NULL,4,3,'Soccer','Soccer2022','2022-01-11')

#MOSTRAR EL NOMBRE DEL USUARIO QUE TENGA MÁS ENTRADAS
/*
El IN se usa cuando la consulta devuelve un conjunto con un número mayor a uno de registros
Si ese no es el caso, se usa el =
*/
SELECT nombre FROM usuarios WHERE id IN (SELECT usuario_id FROM entradas GROUP BY categoria_id HAVING MAX(usuario_id))

	#otra solución:
	SELECT CONCAT(nombre," ",apellidos) AS "El usuario con más entradas" FROM usuarios WHERE id =
	(SELECT usuario_id FROM entradas GROUP BY usuario_id ORDER BY COUNT(id) DESC LIMIT 1)

SELECT COUNT(id),usuario_id FROM entradas GROUP BY usuario_id

#MOSTRAR LAS CATEGORÍAS SIN ENTRADAS
SELECT * FROM categorias WHERE id NOT IN (SELECT categoria_id FROM entradas) 

INSERT INTO categorias VALUES(NULL,"Plataforma")