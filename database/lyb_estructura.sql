-- lyb_estructura.sql
CREATE DATABASE IF NOT EXISTS lyb_parcial_plp3;
USE lyb_parcial_plp3;

CREATE TABLE lyb_productos (
  id_producto INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  categoria VARCHAR(50),
  precio DECIMAL(10,2),
  imagen VARCHAR(255),
  descripcion TEXT
);

CREATE TABLE lyb_pedidos (
  id_pedido INT AUTO_INCREMENT PRIMARY KEY,
  nombre_cliente VARCHAR(100),
  telefono VARCHAR(20),
  total DECIMAL(10,2),
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE lyb_detalle_pedido (
  id_detalle INT AUTO_INCREMENT PRIMARY KEY,
  id_pedido INT,
  id_producto INT,
  cantidad INT,
  subtotal DECIMAL(10,2),
  FOREIGN KEY (id_pedido) REFERENCES lyb_pedidos(id_pedido),
  FOREIGN KEY (id_producto) REFERENCES lyb_productos(id_producto)
);
