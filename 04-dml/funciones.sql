#FUNCIONES SQL

##FUNCIONES MATEMÁTICAS

###FUNCIÓN ABSOLUTA
SELECT ABS(7) AS OPERACION FROM usuarios;
SELECT ABS(7.8) AS OPERACION FROM usuarios;

###FUNCIÓN PARA REDONDER AL ALZA
SELECT CEIL(7.32) AS OPERACION FROM usuarios;

###FUNCIÓN PARA REDONDER A LA BAJA
SELECT FLOOR(7.32) AS OPERACION FROM usuarios;

###FUNCIÓN PARA NÚMERO PI
SELECT PI() AS OPERACION FROM usuarios;

###FUNCIÓN PARA NÚMERO ALEATORIO
SELECT RAND() AS OPERACION FROM usuarios;

###FUNCIÓN PARA REDONDEAR NÚMERO= round(numero a redondear, cant de decimales)
SELECT ROUND(7.31, 1) AS OPERACION FROM usuarios;
SELECT ROUND(id, 2) AS OPERACION FROM usuarios;

###FUNCIÓN PARA RAIZ CUADRADA DE UN NÚMERO
SELECT SQRT(9) AS OPERACION FROM usuarios;

###FUNCIÓN PARA TRUNCAR (QUITAR DECIMALES) DE UN NÚMERO
SELECT TRUNCATE(9.26, 1) AS OPERACION FROM usuarios;

/*******************************************************************************/
##FUNCIONES PARA TEXTOS

###FUNCIÓN PARA PASAR A MAYÚSCULAS
SELECT UPPER(nombre) FROM usuarios;

###FUNCIÓN PARA PASAR A MINÚSCULAS
SELECT LOWER(nombre) FROM usuarios

###FUNCIÓN PARA CONCATENAR Y PONER EN MAYÚSCULAS
SELECT UPPER(CONCAT(nombre,' ',apellidos)) FROM usuarios

###FUNCIÓN PARA SACAR LA LONGITUD DE CARACTERES
SELECT email, LENGTH(CONCAT(nombre,' ',apellidos)) FROM usuarios

###FUNCION PARA LIMIAR ESPACIOS
SELECT TRIM(CONCAT('    ',nombre,' ',apellidos,' ')) FROM usuarios





/*******************************************************************************/
##FUNCIONES PARA FECHAS

###FUNCIÓN PARA MOSTRAR FECHA ACTUAL
SELECT email, fecha, CURDATE() AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR LOS DÍAS ENTRE LA FECHA REGISTRADA Y LA FECHA ACTUAL
SELECT email, DATEDIFF(fecha, CURDATE()) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL DÍA EN LETRAS DE UNA FECHA
SELECT email, DAYNAME(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL DÍA EN NÚMEROS DE UNA FECHA
SELECT email, DAYOFMONTH(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL DÍA DE LA SEMANA DE UNA FECHA
SELECT email, DAYOFWEEK(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL DÍA DEL AÑO DE UNA FECHA
SELECT email, DAYOFYEAR(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL MES DEL AÑO DE UNA FECHA
SELECT email, MONTH(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL AÑO AL CUAL PERTENECE UNA FECHA
SELECT email, YEAR(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL DÍA DEL AÑO AL CUAL PERTENECE UNA FECHA
SELECT email, DAY(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR LA HORA AL CUAL PERTENECE UNA FECHA
SELECT email, HOUR(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL MINUTO CUAL PERTENECE UNA FECHA
SELECT email, MINUTE(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR EL SEGUNDO AL CUAL PERTENECE UNA FECHA
SELECT email, SECOND(fecha) AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR LA HORA ACTUAL
SELECT email, CURTIME() AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA MOSTRAR LA HORA ACTUAL COMPLETA DEL SISTEMA OP
SELECT email, SYSDATE() AS 'Fecha actual' FROM usuarios;

###FUNCIÓN PARA FORMATEAR UNA FECHA
SELECT email, DATE_FORMAT(fecha,'%d-%m-%Y') AS 'Fecha actual' FROM usuarios;


/*******************************************************************************/
##FUNCIONES GENERALES

###FUNCIÓN PARA SABER SI ALGÚN CAMPO DEL REGISTRO ES NULL
SELECT email, ISNULL(apellidos) FROM usuarios;

###FUNCIÓN PARA SABER SI DOS CAMPOS SON IGUALES (SI SON IGUALES DEVUELVE FALSE)
SELECT email, STRCMP('HOLSA','HOLA') FROM usuarios;

###FUNCIÓN PARA SABER LA VERSIÓN DE MYSQL
SELECT VERSION() FROM usuarios;

###FUNCIÓN PARA SABER EL USER A NIVEL DE SGBD
SELECT USER() FROM usuarios;

###FUNCIÓN PARA SABER EL USER A NIVEL DE SGBD
SELECT DISTINCT USER() FROM usuarios;

###FUNCIÓN PARA SABER EL NOMBRE DE LA BD
SELECT DISTINCT DATABASE() FROM usuarios;


###FUNCIÓN PARA SABER EL NOMBRE DE LA BD
SELECT IFNULL('ESTE CAMPO ESTÁ VACÍ0') FROM usuarios







