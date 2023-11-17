create database if not EXISTS electro_nacer;
 use electro_nacer;
create table `users`(
	id varchar(20),
    password varchar(20)
);

create table `products`(
	reference varchar(20),
    libelle varchar(20),
    quantité_min float(20),
    image varchar(20),
    prix_unitaire float(20),
    quantité_stock int(20),
    categorie varchar(20)
);





----------------------------------------------------------les contraintes----------------------------------------------------------------------

ALTER TABLE users
ADD CONSTRAINT id_unique UNIQUE (id);

ALTER TABLE products
ADD CONSTRAINT ref_unique UNIQUE (reference);


ALTER TABLE products
ADD PRIMARY KEY (reference);

ALTER TABLE users
ADD PRIMARY KEY (id);




------------------------------------------------insertion------------------------------------------------------

INSERT INTO users (id, password) VALUES ('admin1', 'pass5478'), ('admin2', 'pass5988');
INSERT INTO products (reference,libelle,quantité_min,image,prix_unitaire,quantité_stock,categorie)
VALUES
('ab1','arduino nano',3,'img/arduinonano.jpeg',30,50,'arduino'),
('ab2','arduino uno',6,'img/arduinouno.jpg',50,90,'arduino'),
('ab3','at mega16',10,'img/atmega16.jpeg',100,30,'arduino'),
('ab4','at mega329',3,'img/atmel.jpg',34,40,'arduino'),

('bc1','camera raspberry',3,'img/cameraRaspberry.jpg',30,50,'raspberry'),
('bc2','raspberry 5',6,'img/raspberrypi5.jpg',50,90,'raspberry'),
('bc3','raspberry 4',10,'img/raspberrypi4.jpg',100,30,'raspberry'),
('bc4','monitor',3,'img/raspberrypi-display.jpg',34,40,'raspberry'),

('cd1','capacitor',3,'img/capacitor1.jpg',30,50,'sensor'),
('cd2','capacitor 1uf',6,'img/capacitor1.jpg',50,90,'sensor'),
('cd3','transistor',10,'img/npn2.jpg',100,30,'sensor'),
('cd4','diode',3,'img/diodled-Copie.jpg',34,40,'sensor');



