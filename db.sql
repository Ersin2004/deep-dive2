drop database if exists koelkast;
Create database koelkast;
use koelkast;
Create table users(
    id int not null auto_increment,
    username varchar(255) not null,
    password varchar(255) not null,
    primary key (id)
);

Create table cart(
id int not null auto_increment,
user_id int not null,
product_id int not null,
primary key(id),
foreign key(user_id) references users(id),
foreign key(product_id) references products(id)
);

create table producten(
id int not null auto_increment,
product varchar(255) not null,
price int not null,
afbeelding varchar(255) not null,
inhoud varchar(255) not null,
artikelnummer varchar(255) not null,
primary key(id)
);

create table reperaties(
id int not null auto_increment,
product_id int not null,
user_id int not null,
reperatie varchar(255) not null,
primary key(id),
foreign key(product_id) references producten(id),
foreign key(user_id) references users(id)
);


insert into producten(product, price, afbeelding, inhoud, artikelnummer) values('bosh', 2111, 'fridge.png', 33, 1125124);
insert into producten(product, price, afbeelding, inhoud, artikelnummer) values('Samsung', 2142, 'fridge.png', 53, 137580);
insert into users(username, password) values('admin', 'admin');