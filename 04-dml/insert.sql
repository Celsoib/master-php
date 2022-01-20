#insertar nuevos registros
USE blog;

INSERT INTO usuarios VALUES(NULL,'edgar','Ibáñez','ed@gmail.com','1234','2022-01-01');	
INSERT INTO usuarios VALUES(NULL,'ada','Ibáñez','ada@gmail.com','1234','1985-07-25');	
INSERT INTO usuarios VALUES(NULL,'paco','lopez','paco@gmail.com','1234','1995-03-25');	

SELECT * FROM usuarios;

#insertar filas solo con ciertas columnas
INSERT INTO usuarios(email,`passwordd`) VALUES('admin@gmail.com','123')


