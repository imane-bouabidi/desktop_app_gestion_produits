create database if not EXISTS electro_nacer;
 use electro_nacer;
create table `users`(
	id varchar(20),
    password varchar(20)
);

create table `products`(
	reference varchar(20),
    image varchar(20),
    libelle varchar(20),
    prix_unitaire float(20),
    quantité_min float(20),
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
INSERT INTO products (reference,image,libelle,prix_unitaire,quantité_min,quantité_stock,categorie)
VALUES
    ('ab1','img1.jpg','description here...', 20.00, 5,20, 'arduino'),
    ('ab2','img2.jpg','description here...', 18.00, 5,20, 'arduino'),
	('ab3','img3.jpg','description here...', 15.00, 5,20, 'arduino'),
    ('ab4','img4.jpg','description here...', 25.00, 5,20, 'arduino'),
    ('ab5','img5.jpg','description here...', 32.00, 5,20, 'arduino'),
    ('ab6','img6.jpg','description here...', 10.00, 5,20, 'arduino'),
    
    
    ('bc1','imgras1.jpg','description here...', 10.00, 5,20, 'raspiry'),
    ('bc2','imgras2.jpg','description here...', 10.00, 5,20, 'raspiry'),
    ('bc3','imgras3.jpg','description here...', 10.00, 5,20, 'raspiry'),
    ('bc4','imgras4.jpg','description here...', 10.00, 5,20, 'raspiry'),
    ('bc5','imgras5.jpg','description here...', 10.00, 5,20, 'raspiry'),
    ('bc6','imgras6.jpg','description here...', 10.00, 5,20, 'raspiry'),
    
    
    
    
    ('cd1','imgsen1.jpg','description here...', 10.00, 5,20, 'sensor'),
    ('cd2','imgsen2.jpg','description here...', 10.00, 5,20, 'sensor'),
    ('cd3','imgsen3.jpg','description here...', 10.00, 5,20, 'sensor'),
    ('cd4','imgsen4.jpg','description here...', 10.00, 5,20, 'sensor'),
    ('cd5','imgsen5.jpg','description here...', 10.00, 5,20, 'sensor'),
    ('cd6','imgsen6.jpg','description here...', 10.00, 5,20, 'sensor'),



