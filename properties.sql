CREATE DATABASE videojuegos;

CREATE TABLE videojuegos (id bigint AUTO_INCREMENT,consola varchar(150), precio_minimo FLOAT,precio_maximo FLOAT, descuento FLOAT, PRIMARY KEY(id));
CREATE TABLE ventas (id bigint AUTO_INCREMENT, consola varchar(150), valor_venta FLOAT,descuento FLOAT,PRIMARY KEY(id));

INSERT INTO videojuegos (consola,precio_minimo,descuento) VALUES ("PS4",100000,5);
INSERT INTO videojuegos (consola,precio_minimo,precio_maximo,descuento) VALUES ("XBOX",100001,150000,7);
INSERT INTO videojuegos (consola,precio_minimo,descuento) VALUES ("PC",150000,15);
INSERT INTO videojuegos (consola,precio_minimo,precio_maximo,descuento) VALUES ("OTRA",500000,1000000,10);

