/*
CONSULTA MULTITABLA:
Son conusltas que sirven para consultar varias tablas en una sola sentencia
*/
#MOSTRAR LAS ENTRADAS  CON EL NOMBRE DEL AUTOR Y EL NOMBRE DE LA CATEGORÍA
SELECT e.id,e.titulo, u.nombre 'Autor',c.nombre "Categoría" FROM entradas e, usuarios u, categorias c
WHERE e.usuario_id = u.id AND e.`categoria_id` = c.`id`;

#en este caso da error
SELECT e.id,e.titulo, u.nombre 'Autor',c.nombre "Categoría" FROM entradas e, usuarios u, categorias c
WHERE e.usuario_id = u.id;

#MOSTRAR EL NOMBRE DE LAS CATEGORÍAS Y AL LADO CUANTAS ENTRADAS TIENEN
SELECT c.nombre, COUNT(e.id) FROM categorias c, entradas e 
WHERE c.id = e.`categoria_id` GROUP BY e.`categoria_id`

#MOSTRAR EL EMAIL DE LOS USUARIOS Y AL LADO CUANTAS ENTRADAS TIENEN 
SELECT u.email, COUNT(titulo) FROM usuarios u, entradas e
WHERE u.id = e.`usuario_id` GROUP BY e.`usuario_id` ORDER BY 2

###ESTO ÚLTIMO ES UNA CONSULTA MULTITABLA CON LA AGRUPACIÓN.



#LAS CONSULTAS MULTITABLAS PUEDEN LLEGAR A SER MUY PESADOS DEBIDO A QUE RECORRE TODOS LOS REGISTROS,
#PARA SOLUCIONAR ESTO UTILIZAMOS LOS JOIN, ESTOS DEVUELVEN REGISTROS QUE TENGAN VALORES IDÉNTICOS EN 
#DOS CAMPOS Y DE ESA MANERA PODEMOS UNIR DOS O VARIAS TABLAS. ES MÁS OPTIMIZADO. UNE LAS FILAS QUE
#COINCIDEN CON LA CONDICIÓN

#INNER JOIN
#MOSTRAR LAS ENTRADAS  CON EL NOMBRE DEL AUTOR Y EL NOMBRE DE LA CATEGORÍA
SELECT e.id,e.titulo, u.nombre 'Autor',c.nombre "Categoría" 
FROM entradas e
INNER JOIN usuarios u ON u.id = e.`usuario_id`
INNER JOIN categorias c ON c.id = e.`categoria_id`


#LEFT JOIN: MANTENER TODAS LAS FILAS QUE TENGO A LA IZQ Y SI HAY UNA COINCIDENCIA EN LA TABLA
#DE AL LADO, EN EL DE LA DERECHA, EN LA CUAL ESTOY USANDO EL LEFT JOIN  ENTONCES ME MUESTRA
#LOS VALORES DE LA FILA QUE ESTOY INTENTANDO MOSTRAR O ME MOSTRARÍA CERO O NULL EN EL CASO
#DE QUE NO HAYA NADA. PARA ESO SIRVE, PARA MANTENER TODAS LAS FILAS DE LA TABLA DE LA IZQ
#Y MOSTRARLOS TODOS LOS RESULTADOS AUNQUE NO TENGA CONTENIDO EN LA OTRA TABLA DE ENTRADAS.

#MOSTRAR EL NOMBRE DE LAS CATEGORÍAS Y AL LADO CUANTAS ENTRADAS TIENEN
SELECT c.nombre, COUNT(e.id) FROM categorias c
LEFT JOIN entradas e ON e.`categoria_id` = c.`id`
GROUP BY c.id


#RIGHT JOIN: EXACTAMENTE LO MISMO QUE EL ANTERIOR PERO A LA DERECHA.
#ESTE MANTIENE TODAS LAS FILAS DE LA DERECHA.

#MOSTRAR EL NOMBRE DE LAS CATEGORÍAS Y AL LADO CUANTAS ENTRADAS TIENEN
SELECT c.nombre, COUNT(e.id) FROM entradas e 
RIGHT JOIN categorias c ON e.`categoria_id` = c.`id`
GROUP BY c.id


###VISTA EN MYSQL
#Una vista la podemos definir como una consulta almacenada en la base de datos
#de forma que se utiliza como si fuera una tabla virtual y tienen asociaciones con una o varias
#tablas y no almacenan los datos sino que trabaja sobre los datos de las tablas que ya están
#definidas estando así todo momento actualizada y esto aporta comodidad a la hora de hacer consultas
#muy complejas que son reiterativas o que vamos a estar haciendo muchas veces dentro de nuestra bd















