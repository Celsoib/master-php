SELECT * FROM usuarios WHERE email = 'admin@gmail.com';

#1. MOSTRAR NOMBRES Y APELLIDOS DE TODOS LOS USUARIOS REGISTRADOS EN 2022
SELECT nombre,apellidos FROM usuarios WHERE YEAR(fecha) = 2022 

#2. MOSTRAR NOMBRES Y APELLIDOS DE TODOS LOS USUARIOS QUE NO SE REGISTRADOS EN 2022
SELECT nombre,apellidos,fecha FROM usuarios WHERE YEAR(fecha) != 2022 OR ISNULL(fecha)

#3. MOSTRAR EL EMAIL DE LOS USUARIOS CUYOS APELLIDOS CONTENGAN LA LETRA a Y ADEMÁS QUE SU CONTRASEÑA SEA 1234
SELECT email FROM usuarios WHERE apellidos LIKE '%a%' AND passwordd = '1234'

#4. SACAR TODOS LOS REGISTROS DE LA TABLA SEA USUARIO CUYO AÑO SEA PAR
SELECT * FROM usuarios WHERE (YEAR(fecha) % 2 = 0)

#5. SACAR TODOS LOS REGISTROS DE LA TABLA DE USUARIO CUYO NOMBRE TENGA MÁS DE 5  LETRAS
#Y QUE SE HAYAN REGISTRADO ANTES DE 2020 Y MOSTRAR EL NOMBRE EN MAYUS
SELECT UPPER(nombre), apellidos FROM usuarios WHERE LENGTH(nombre) > 3 AND YEAR(fecha) < 2020



#LIMIT Y ORDER BY

##ORDER BY
SELECT * FROM usuarios ORDER BY fecha DESC;

##LIMIT: limita la cantidad de registros que se muestran
SELECT * FROM usuarios LIMIT 0,3;
SELECT * FROM usuarios LIMIT 2;













