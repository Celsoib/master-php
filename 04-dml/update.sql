#MODIFICAR FILAS / ACTUALIZAR DATOS

UPDATE usuarios SET fecha = CURDATE() WHERE id = 4

UPDATE usuarios SET fecha = '2019-07-09', apellidos = 'ADMIN' WHERE id = 4

SELECT * FROM usuarios