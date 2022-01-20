CREATE TABLE usuarios(
  id INT(11) AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  apellidos VARCHAR(255) DEFAULT 'hola que tal',
  email VARCHAR(100) NOT NULL,
  PASSWORD VARCHAR(255),
  CONSTRAINT pk_usuarios PRIMARY KEY(id)
);

ALTER TABLE usuarios RENAME TO usuarios_renom;
