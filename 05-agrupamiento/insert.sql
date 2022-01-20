#INSERTS PARA CATEGORÍAS
USE blog;
INSERT INTO categorias VALUES(NULL,'Acción');
INSERT INTO categorias VALUES(NULL,'Rol');
INSERT INTO categorias VALUES(NULL,'Deportes');

#INSERTS PARA ENTRADAS
INSERT INTO entradas VALUES (NULL,4,3,'Fútbol','Deporte de balón',CURDATE());
INSERT INTO entradas VALUES (NULL,4,2,'lOL','Todo sobre lol',CURDATE());
INSERT INTO entradas VALUES (NULL,4,1,'Fifa','todos los jugadores 2022',CURDATE());


INSERT INTO entradas VALUES (NULL,3,3,'GTA5','GTA 5 2022',CURDATE());
INSERT INTO entradas VALUES (NULL,3,2,'Basket','Basket 2022',CURDATE());
INSERT INTO entradas VALUES (NULL,3,1,'Naruto','Naruto 2022',CURDATE());


INSERT INTO entradas VALUES (NULL,6,3,'AmongAS','AmongAS 2022',CURDATE());
INSERT INTO entradas VALUES (NULL,6,2,'COD','COD 2022',CURDATE());
INSERT INTO entradas VALUES (NULL,6,1,'FORNITE','FORNITE 2022',CURDATE());

SELECT * FROM entradas







