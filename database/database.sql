CREATE DATABASE tienda_master;

USE tienda_master;


CREATE TABLE usuarios(
  id INT AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  apellidos VARCHAR(255),
  email VARCHAR(255) NOT NULL,
  passwordd VARCHAR(255) NOT NULL,
  rol VARCHAR(20),
  imagen VARCHAR(255),
  CONSTRAINT pk_usuario PRIMARY KEY (id),
  CONSTRAINT uq_email UNIQUE (email)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO usuarios VALUES(NULL,'Admin','Admin','admin@admin.com','contraseña','admin',NULL);

CREATE TABLE categorias(
  id INT AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  CONSTRAINT pk_categorias PRIMARY KEY (id)
) ENGINE=INNODB;

INSERT INTO categorias VALUES(NULL,'Manga corta');
INSERT INTO categorias VALUES(NULL,'Tirantes');
INSERT INTO categorias VALUES(NULL,'Manga larga');
INSERT INTO categorias VALUES(NULL,'Sudaderas');

CREATE TABLE productos(
  id INT(255) AUTO_INCREMENT NOT NULL,
  categoria_id INT(255) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  precio FLOAT(100,2) NOT NULL,
  stock INT(255) NOT NULL,
  fecha DATE NOT NULL,
  imagen VARCHAR(255),
  CONSTRAINT pk_categorias PRIMARY KEY(id),
  CONSTRAINT fk_producto_categoria FOREIGN KEY (categoria_id) REFERENCES categorias (id)
) ENGINE=INNODB;


CREATE TABLE pedidos(
  id INT(255) AUTO_INCREMENT NOT NULL,
  usuario_id INT(255) NOT NULL,
  provincia VARCHAR(100) NOT NULL,
  localidad VARCHAR(100) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  coste FLOAT(200,2) NOT NULL,
  estado VARCHAR(20) NOT NULL,
  fecha DATE,
  hora TIME,
  CONSTRAINT pk_pedidos PRIMARY KEY(id),
  CONSTRAINT fk_pedidos_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id)	ON DELETE CASCADE
) ENGINE=INNODB;


CREATE TABLE lineas_pedidos(
  id INT(255) AUTO_INCREMENT NOT NULL,
  pedido_id INT(255) NOT NULL,
  producto_id INT(255) NOT NULL,
  unidades INT(255) NOT NULL,
  CONSTRAINT pk_lineas_pedidos PRIMARY KEY (id),
  CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos (id),
  CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos (id)
)ENGINE=INNODB;


