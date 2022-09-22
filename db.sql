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
primary key(id)
);

insert into producten(product, price, afbeelding) values('Samsung Smart fridge',  1000, 'fridge.png');
insert into producten(product, price, afbeelding) values('LG Smart fridge',  2000, 'fridge.png');
insert into producten(product, price, afbeelding) values('Bosch Smart fridge',  3000, 'fridge.png');
insert into producten(product, price, afbeelding) values('Siemens Smart fridge',  4000, 'fridge.png');
insert into users(username, password) values('admin', 'admin');