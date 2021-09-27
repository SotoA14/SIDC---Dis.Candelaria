drop database proyecto;
create database proyecto;
use proyecto;

create table tipo_documento(
id_tipo_documento int(10) primary key not null auto_increment,
descripcion varchar(10)
);

create table cliente(
id_cliente int(10) primary key not null auto_increment,
id_tipo_documento int(10) not null,
descuento varchar(10),
nombre text(10),
direccion varchar(10),
telefono int(11),
constraint fk_tipo_documento_cliente
foreign key (id_tipo_documento)
references tipo_documento (id_tipo_documento)
);

create table factura(
id_factura int(10) primary key not null auto_increment,
id_cliente int(10) not null,
monto_final decimal,
descuento varchar(10),
fecha timestamp,
constraint fk_cliente_factura
foreign key (id_cliente)
references cliente (id_cliente)
);

create table proveedor(
id_proveedor int(10) primary key not null auto_increment,
nombre text(10),
NIT varchar(20),
ciudad varchar(20),
direccion varchar(50)
);

create table producto(
id_producto int(10) primary key not null auto_increment,
id_proveedor int(10) not null,
nombre varchar(25),
precio decimal,
stock int(10),
constraint fk_proveedor_producto
foreign key (id_proveedor)
references proveedor (id_proveedor)
);

create table detalle(
id_detalle int(10) primary key not null auto_increment,
id_factura int(10) not null,
id_producto int(10) not null,
monto_total_producto decimal,
cantidad_venta_producto varchar(10),
precio_unidad_producto decimal,
constraint fk_factura_detalle
foreign key (id_factura)
references factura (id_factura),
constraint fk_producto_detalle
foreign key (id_producto)
references producto (id_producto)
);

create table categoria(
id_categoria int(10) primary key not null auto_increment,
id_producto int(10) not null,
categoria text(10),
constraint fk_producto_categoria
foreign key (id_producto)
references producto (id_producto)
);

create table clasificacion(
id_clasificacion int(10) primary key not null auto_increment,
id_producto int(10) not null,
clasificacion text(10),
constraint fk_producto_clasificacion
foreign key (id_producto)
references producto (id_producto)
);