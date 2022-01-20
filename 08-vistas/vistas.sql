###VISTA EN MYSQL
#Una vista la podemos definir como una consulta almacenada en la base de datos de forma
#que se utiliza como si fuera una tabla virtual y tiene asociaciones con una o varias
#tablas y no almacena los datos sino que trabaja sobre datos de las tablas que ya están
#definidas estando así todo momento actualizadas y esto aporta comodidad a la hora de 
#hacer consultas muy complejas que son reiterativas o que vamos a estar haciendo muchas
#veces dentro de nuestra bd.

/*
#Vistas: 
Una vista la podemos definir como una consulta almacenada en la base de datos de forma
que se utiliza como si fuera una tabla virtual
No almacena datos sino que utiliza asociaciones y los datos originales
de las tablas, de forma que siempre se mantiene actualizada
*/

#MOSTRAR LAS ENTRADAS  CON EL NOMBRE DEL AUTOR Y EL NOMBRE DE LA CATEGORÍA

CREATE VIEW entradas_con_nombres AS
SELECT e.id,e.titulo, u.nombre 'Autor',c.nombre "Categoría" 
FROM entradas e
INNER JOIN usuarios u ON u.id = e.`usuario_id`
INNER JOIN categorias c ON c.id = e.`categoria_id`

SHOW CREATE VIEW entradas_con_nombres

SHOW TABLES 

SELECT * FROM entradas_con_nombres WHERE autor = "Edgar"

#Para borrar una vista
DROP VIEW entradas_con_nombres



