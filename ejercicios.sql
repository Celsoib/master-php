/*
1-Diseñar y crear la base de datos de un concesionario (de autos o vehículos).

ENGINE=INNODB; PARA QUE SE MANTENGA SIEMPRE EN INTEGRIDAD REFERENCIAL Y EXISTA ESAS CLAVES AJENAS
Y TENGAMOS DE ESA FORMA LA BD MEJOR CONSTRUIDA
*/

########################EJERCICIO 1########################

CREATE DATABASE IF NOT EXISTS concesionaria;
USE concesionaria;

CREATE TABLE coches(
	id INT(10) AUTO_INCREMENT NOT NULL,
	modelo VARCHAR(100) NOT NULL,
	marca VARCHAR(50),
	precio INT(20) NOT NULL,
	stock INT(255) NOT NULL,
	CONSTRAINT pk_coches PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE grupos(
	id INT(10) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(100) NOT NULL,
	ciudad VARCHAR(100),
	CONSTRAINT pk_grupos PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE vendedores(
	id INT(10) NOT NULL AUTO_INCREMENT,
	grupo_id INT(10) NOT NULL,
	jefe INT(10),
	nombre VARCHAR(100) NOT NULL,
	apellidos VARCHAR(100),
	cargo VARCHAR(100),
	fecha DATE,
	sueldo FLOAT(20,2),
	comision FLOAT(10,2),
	CONSTRAINT pk_vendedores PRIMARY KEY(id),
	CONSTRAINT fk_vendodor_grupo FOREIGN KEY(grupo_id) REFERENCES grupos(id),
	CONSTRAINT fk_vendedor_jefe FOREIGN KEY(jefe) REFERENCES vendedores(id)
)ENGINE=INNODB;

CREATE TABLE clientes(
	id INT(10) NOT NULL AUTO_INCREMENT,
	vendedor_id INT(10),
	nombre VARCHAR(150) NOT NULL,
	ciudad VARCHAR(100),
	gastado FLOAT(50,2),
	fecha DATE,
	CONSTRAINT pk_clientes PRIMARY KEY(id),
	CONSTRAINT fk_cliente_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
)ENGINE=INNODB;

CREATE TABLE encargos(
	id INT(10) NOT NULL AUTO_INCREMENT,
	cliente_id INT(10) NOT NULL,
	coche_id INT(10) NOT NULL,
	cantidad INT(100),
	fecha DATE,
	CONSTRAINT pk_engargos PRIMARY KEY(id),
	CONSTRAINT fk_encargo_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id),
	CONSTRAINT fk_encargo_coche FOREIGN KEY(coche_id) REFERENCES coches(id)
)ENGINE=INNODB;


########################RELLENAR LA BD CON INFO########################

#COCHES
INSERT INTO coches VALUES(NULL,'Renault Clio','Renault',12000,12);
INSERT INTO coches VALUES(NULL,'Seat Panda','Seat',10000,10);
INSERT INTO coches VALUES(NULL,'Mercedes Ranchera','Mercedes Benz',32000,24);
INSERT INTO coches VALUES(NULL,'Porche Cayene','Porche',65000,5);
INSERT INTO coches VALUES(NULL,'Lambo Aventdor','Lamborgini',170000,2);
INSERT INTO coches VALUES(NULL,'Ferrari Spider','Ferrari',245000,80);



#GRUPOS
INSERT INTO grupos VALUES(NULL,'Vendedores A','Madrid');
INSERT INTO grupos VALUES(NULL,'Vendedores B','Madrid');
INSERT INTO grupos VALUES(NULL,'Directores Mecánicos','Madrid');
INSERT INTO grupos VALUES(NULL,'Vendedores A','Barcelona');
INSERT INTO grupos VALUES(NULL,'Vendedores B','Madrid');
INSERT INTO grupos VALUES(NULL,'Vendedores C','Valencia');
INSERT INTO grupos VALUES(NULL,'Vendedores A','Bilbao');
INSERT INTO grupos VALUES(NULL,'Vendedores B','Pamplona');
INSERT INTO grupos VALUES(NULL,'Vendedores C','Santiago de Compostela');


#VENDEDORES
INSERT INTO vendedores VALUES(NULL,1,NULL,'David','Lopez','Responsable de tienda',CURDATE(),30000,4);
INSERT INTO vendedores VALUES(NULL,1,1,'Fran','Martinez','Ayudante en tienda',CURDATE(),23000,2);
INSERT INTO vendedores VALUES(NULL,2,NULL,'Nelso','Sánchez','Responsable de tienda',CURDATE(),38000,5);
INSERT INTO vendedores VALUES(NULL,2,3,'Jesús','Lopez','Ayudante en tienda',CURDATE(),12000,6);
INSERT INTO vendedores VALUES(NULL,3,NULL,'Victor','López','Mecánico jefe',CURDATE(),50000,2);
INSERT INTO vendedores VALUES(NULL,4,NULL,'Antonio','Lopez','Vendedor de recambios',CURDATE(),13000,8);
INSERT INTO vendedores VALUES(NULL,5,NULL,'Salvador','Lopez','Vendedor experto',CURDATE(),60000,2);
INSERT INTO vendedores VALUES(NULL,6,NULL,'Joaquin','Lopez','Ejecutivo de cuentas',CURDATE(),80000,1);
INSERT INTO vendedores VALUES(NULL,6,8,'Luis','Lopez','Ayudante en tienda',CURDATE(),10000,10);

#CLIENTES
INSERT INTO clientes VALUES(NULL,1,'Construcciones Diaz Inc','Alcobendas',24000,CURDATE());
INSERT INTO clientes VALUES(NULL,1,'Frutería Antonia Inc','Fuenlabrada',40000,CURDATE());
INSERT INTO clientes VALUES(NULL,1,'Imprenta Martínez Inc','Barcelona',32000,CURDATE());
INSERT INTO clientes VALUES(NULL,1,'Jesus Colchones Inc','El Prat',96000,CURDATE());
INSERT INTO clientes VALUES(NULL,1,'Bar Pepe Inc','Valencia',17000,CURDATE());
INSERT INTO clientes VALUES(NULL,1,'Tienda PC Inc','Murcia',245000,CURDATE());
INSERT INTO clientes VALUES(NULL,1,'Tienda Orgánica Inc','Murcia',0,CURDATE());


#ENCARGOS
INSERT INTO encargos VALUES(NULL,1,1,2,CURDATE());
INSERT INTO encargos VALUES(NULL,2,2,4,CURDATE());
INSERT INTO encargos VALUES(NULL,3,3,1,CURDATE());
INSERT INTO encargos VALUES(NULL,4,3,3,CURDATE());
INSERT INTO encargos VALUES(NULL,5,5,1,CURDATE());
INSERT INTO encargos VALUES(NULL,6,6,1,CURDATE());

INSERT INTO encargos VALUES(NULL,4,4,3,CURDATE());

SELECT cantidad, modelo,nombre FROM encargos, clientes, coches
WHERE encargos.cliente_id = clientes.id AND encargos.`coche_id` = coches.id;

########################EJERCICIO 2########################

#MODIFICAR LA COMISIÓN DE LOS VENDEDORES Y PONERLA AL 0.5% CUANDO
#GANAN MÁS DE 50.000

UPDATE vendedores SET comision = 0.5 WHERE sueldo >= 50000

########################EJERCICIO 3########################

#INCREMENTAR EL PRECIO DE LOS COCHES EN UN 5%

UPDATE coches SET precio = precio * 1.05

########################EJERCICIO 4########################

#SACAR TODOS LOS VENDEDORES CUYA FECHA DE ALTA SEA POSTERIOR SEA AL
#1 DE ENERO DE 2022

SELECT * FROM vendedores WHERE fecha <= '2022-01-17'

UPDATE vendedores SET fecha = '2021-04-03' WHERE id = 8


########################EJERCICIO 5########################

#MOSTRAR TODOS LOS VENDEDORES CON SU NOMBRE Y EL NÚMERO DE DÍAS QUE LLEVAN EN EL CONCESIONARIO

SELECT nombre, DATEDIFF(CURDATE(), fecha) AS DIAS FROM vendedores

UPDATE vendedores SET fecha = '2021-12-03' WHERE id = 4

UPDATE vendedores SET fecha = '2022-01-03' WHERE id = 3
########################EJERCICIO 6########################

#VISUALIZAR EL NOMBRE Y LOS APELLIDOS DE LOS VENDEDORES EN UNA MISMA COLUMNA Y SU
#FECHA DE REGISTRO Y EL DÍA DE LA SEMANA EN LA QUE SE REGISTRARON

SELECT CONCAT(nombre,' ',apellidos) AS 'NOMBRE Y APELLIDOS',fecha,DAYNAME(fecha) FROM vendedores

########################EJERCICIO 7########################

#MOSTRAR EL NOMBRE Y EL SALARIO DE LOS VENDEDORES CON CARGO DE 'Ayudante de tienda'

SELECT nombre, sueldo FROM vendedores WHERE cargo = 'Ayudante en tienda'

########################EJERCICIO 8########################

#VISUALIZAR TODOS LOS COCHES EN CUYA MARCA EXISTA LA LETRA 'A' Y CUYO MODELO EMPIECE
#POR 'F'

SELECT * FROM coches WHERE marca LIKE '%A%' AND modelo LIKE 'f%'

########################EJERCICIO 9########################

#MOSTRAR TODOS LOS VENDEDORES DEL GRUPO NÚMERO 2 ORDENADOS POR SALARIO DE MAYOR A MENOR
SELECT * FROM vendedores WHERE grupo_id = 2 ORDER BY sueldo DESC


########################EJERCICIO 10########################

#VISUALIZAR LOS APELLIDOS DE LOS VENDEDORES, SU FECHA Y SU NÚMERO DE GRUPO
#ORDENADO POR FECHA DESCENDENTE, MOSTRAR LOS 4 ÚLTIMOS

SELECT apellidos, fecha, id FROM vendedores ORDER BY fecha DESC LIMIT 4


########################EJERCICIO 11########################

#VISUALIZAR TODOS LOS CARGOS Y EL NÚMERO DE VENDEDORES QUE HAY EN CADA CARGO

SELECT cargo, COUNT(id) FROM vendedores GROUP BY cargo ORDER BY COUNT(id) DESC



########################EJERCICIO 12########################

#CONSEGUIR LA MASA SALARIAL DEL CONCESIONARIO (ANUAL)

SELECT SUM(sueldo) AS 'Masa salarial' FROM vendedores


########################EJERCICIO 13########################

#SACAR LA MEDIA DE SUELDOS ENTRE TODOS LOS VENDEDORES POR GRUPO

SELECT grupo_id,g.nombre,g.ciudad,AVG(ROUND(sueldo,2)) AS 'Media salarial' FROM vendedores v
INNER JOIN grupos g ON g.id = v.grupo_id
GROUP BY grupo_id


SELECT grupo_id,g.nombre,g.ciudad,CEIL(AVG(sueldo)) AS 'Media salarial' FROM vendedores v
INNER JOIN grupos g ON g.id = v.grupo_id
GROUP BY grupo_id

########################EJERCICIO 14########################

#VISUALIZAR LAS UNIDADES TOTALES VENDIDAS DE CADA COCHE A CADA CLIENTE MOSTRANDO
#EL NOMBRE DEL cohce, NÚMERO DE CLIENTE Y LA SUMA DE UNIDADES

SELECT co.modelo,c.nombre, SUM(e.cantidad)
FROM encargos e
JOIN clientes c ON c.id = e.cliente_id
JOIN coches co ON co.id = e.coche_id
GROUP BY c.nombre


SELECT co.modelo AS 'Coche',c.nombre AS 'Cliente', SUM(e.cantidad) AS 'Unidades'
FROM encargos e
JOIN clientes c ON c.id = e.cliente_id
JOIN coches co ON co.id = e.coche_id
GROUP BY e.coche_id,e.cliente_id


########################EJERCICIO 15########################

#MOSTRAR LOS CLIENTES QUE MÁS PEDIDOS (NO CANTIDAD COMPRADA, OJO) HAN HECHO Y MOSTRAR CUÁNTOS HICIERON

SELECT c.nombre, COUNT(e.id) AS 'Pedidos' FROM encargos e
JOIN clientes c ON c.id = e.cliente_id
GROUP BY cliente_id 
ORDER BY 2 DESC LIMIT 2


########################EJERCICIO 16########################

# OBTENER LISTADO DE CLIENTES ATENDIDOS POR EL VENDEDOR 'DAVID LÓPEZ'

SELECT * FROM clientes WHERE vendedor_id IN
(SELECT id FROM vendedores WHERE nombre = 'David' AND apellidos = 'Lopez') 

UPDATE clientes SET vendedor_id = 4 WHERE id =3

UPDATE clientes SET vendedor_id = 4 WHERE id =5

UPDATE clientes SET vendedor_id = 2 WHERE id =6


########################EJERCICIO 17########################

#OBTENER UN LISTADO CON LOS ENCARGOS REALIZADOS POR EL CLIENTE 'FRUTERÍA ANTONIA INC'

SELECT e.id AS 'Número encargo',e.cantidad,c.nombre,co.modelo,e.fecha FROM encargos e
JOIN clientes c ON c.id = e.cliente_id
JOIN coches co ON co.id = e.coche_id
WHERE cliente_id IN 
(SELECT id FROM clientes WHERE nombre = 'FruterIa Antonia INC')


########################EJERCICIO 18########################

#LISTAR LOS CLIENTES QUE HAN HECHO ALGÚN ENCARGO DEL COCHE 'MERCEDES RANCHERA'

SELECT cl.nombre AS CLIENTE,co.modelo FROM encargos e 
JOIN clientes cl ON cl.id = e.cliente_id
JOIN coches co ON co.id = e.coche_id
WHERE coche_id IN
(SELECT id FROM coches WHERE modelo = 'Mercedes Ranchera')

SELECT * FROM clientes WHERE id IN
	(SELECT cliente_id FROM encargos WHERE coche_id IN
		(SELECT id FROM coches WHERE modelo LIKE '%Mercedes Ranchera%'))
		
		
########################EJERCICIO 19########################

#OBTENER LOS VENDEDORES CON 2 O MÁS CLIENTES

SELECT * FROM vendedores WHERE id IN
	(SELECT vendedor_id FROM clientes GROUP BY vendedor_id HAVING COUNT(id) >= 2)

########################EJERCICIO 20########################

#SELECCIONAR EL GRUPO EN EL QUE TRABAJA EL VENDEDOR CON MAYOR SALARIO Y MOSTRAR EL NOMBRE DEL GRUPO

SELECT * FROM grupos WHERE id IN (
	SELECT grupo_id FROM vendedores WHERE sueldo = (
		SELECT MAX(sueldo) FROM vendedores))

SELECT * FROM vendedores ORDER BY sueldo DESC LIMIT 1

########################EJERCICIO 21########################

#OBTENER LOS NOMBRES Y CIUDADES DE LOS CLIENTES CON ENCARGOS DE 3 UNIDADES ADELANTE

SELECT nombre, ciudad FROM clientes WHERE id IN
	(SELECT cliente_id FROM encargos WHERE cantidad >= 3)

########################EJERCICIO 22########################

# MOSTRAR LISTADO DE CLIENTES (número de cliente y el nombre)
# MOSTRAR TAMBIÉN EL NÚMERO DE VENDEDOR Y SU NOMBRE

SELECT c.id,c.nombre,c.vendedor_id,CONCAT(v.nombre," ",v.apellidos) AS vendedor FROM clientes c
JOIN vendedores v ON v.id = c.vendedor_id
 
SELECT c.id,c.nombre,v.id AS vendedor_id,CONCAT(v.nombre," ",v.apellidos) AS vendedor FROM clientes c, vendedores v
WHERE v.id = c.vendedor_id

########################EJERCICIO 23########################

#LISTAR TODOS LOS ENCARGOS REALIZADOS CON LA MARCA DEL COCHE Y 
#EL NOMBRE DEL CLIENTE

SELECT e.id, co.marca, cl.nombre FROM encargos e
JOIN coches co ON co.id = e.coche_id
JOIN clientes cl ON cl.id = e.cliente_id


########################EJERCICIO 24########################

# LISTAR LOS ENCARGOS CON EL NOMBRE DEL COCHE, NOMBRE DEL CLIENTE Y EL
# NOMBRE DE LA CIUDAD DEL CLIENTE PERO ÚNICAMENTE CUANDO SEAN DE BARCELONA

SELECT e.id, co.modelo,cl.nombre,cl.ciudad FROM encargos e
JOIN clientes cl ON cl.id = e.cliente_id
JOIN coches co ON co.id = e.coche_id
WHERE e.cliente_id IN 
	(SELECT id FROM clientes WHERE ciudad = "Barcelona")
	

SELECT e.id, co.modelo,cl.nombre,cl.ciudad FROM encargos e
JOIN clientes cl ON cl.id = e.cliente_id
JOIN coches co ON co.id = e.coche_id
WHERE cl.ciudad = "Barcelona"


########################EJERCICIO 25########################

#OBTENER UNA LISTA DE LOS NOMBRES DE LOS CLIENTES CON EL IMPORTE DE SUS CARGOS
#ACUMULADO

SELECT nombre, SUM(precio*cantidad) AS IMPORTE FROM clientes cl
JOIN encargos e ON e.cliente_id = cl.id
JOIN coches co ON co.id = e.coche_id
GROUP BY cl.nombre
ORDER BY 2

########################EJERCICIO 26########################

#SACAR LOS VENDEDORES QUE TIENEN JEFE Y SACAR EL NOMBRE DEL JEFE

/*
SELECT v1.nombre as VENDEDOR from vendedores v1 where id = 
	(select id from vendedores where jefe != null)
*/

SELECT CONCAT(v1.nombre," ",v1.apellidos) AS VENDEDOR, CONCAT(v2.nombre," ",v2.apellidos) AS JEFE 
FROM vendedores v1
JOIN vendedores v2 ON  v2.id = v1.jefe

/*
la comparación = v2.id = v1.jefe
es porque v2.id es el id del jefe, y v1.jefe es para saber si es que el vendedor tiene un jefe
de esa manera solo saca todos los vendedores que tienen jefes con sus respectivos nombres

ya tenemos resuelto este ejercicio haciendo uso de la clave ajena reflexiva que tenemos en 
esta tabla que apunta a la misma tabla de vendedores
*/

SELECT v1.nombre AS vendedor, v2.nombre jefe
FROM vendedores v1
JOIN vendedores v2 ON v2.id = v1.jefe

########################EJERCICIO 27########################

# VISUALIZAR LOS NOMBRE DE LOS CLIENTES Y LA CANTIDAD DE ENCARGOS REALIZADOS INCLUYENDO
# LOS QUE NO HAYAN REALIZADO ENCARGOS

SELECT cl.nombre,COUNT(e.id) FROM clientes cl
LEFT JOIN encargos e ON e.cliente_id = cl.id
GROUP BY 1


########################EJERCICIO 28########################

# MOSTRAR TODOS LOS VENDEDORES Y EL NÚMERO DE CLIENTES. SE DEBE
# MOSTRAR TENGAN O NO CLIENTES

SELECT CONCAT(v.nombre, " ",v.apellidos) AS VENDEDOR, COUNT(cl.vendedor_id) AS 'CANTIDAD CLIENTES'
FROM vendedores v
LEFT JOIN clientes cl ON cl.vendedor_id = v.id
GROUP BY 1

SELECT CONCAT(v.nombre, " ",v.apellidos) AS VENDEDOR, COUNT(cl.id) AS 'CANTIDAD CLIENTES'
FROM vendedores v
LEFT JOIN clientes cl ON cl.vendedor_id = v.id
GROUP BY v.id

/*
ON cl.vendedor_id = v.id
ES DECIR, QUE NOS MEZCLE ESAS COLUMNAS, ESAS FILAS, CUANDO EL id DEL VENDEDOR QUE GUARDA LA TABLA DE 
CLIENTES SEA IGUAL AL VENDEDOR QUE ESTAMOS RECORRIENDO
*/

########################EJERCICIO 29########################

# CREAR UNA VISTA LLAMADO VENDEDORES A QUE INCLUIRÁ TODOS LOS VENDEDORES DEL 
# GRUPO QUE SE LLAMEN VENDEDORES A


CREATE VIEW vendedoresA AS 
SELECT * FROM vendedores WHERE grupo_id IN
	(SELECT id FROM grupos WHERE nombre = "Vendedores A")

SHOW TABLES	

DROP VIEW vendedoresA

########################EJERCICIO 30########################

# MOSTRAR LOS DATOS DEL VENDEDOR CON MÁS ANTIGUEDAD EN EL CONCESIONARIO

SELECT * FROM vendedores ORDER BY fecha ASC LIMIT 1


########################EJERCICIO 30 PLUS########################

# OBTENER LOS COCHES CON MÁS UNIDADES VENDIDAS

SELECT * FROM coches WHERE id IN
	(SELECT coche_id FROM encargos WHERE cantidad IN
		(SELECT MAX(cantidad) FROM encargos))












