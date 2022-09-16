
Create database if not exists koelkast;
use koelkast;
Create table if not exists users(
id int not null auto_increment,
username varchar(255) not null,
wachtwoord varchar(255) not null,
email varchar(255) not null,
primary key(id)
);

Create table if not exists cart(
id int not null auto_increment,
username varchar(255) not null,
product varchar(255) not null,
price varchar(255) not null,
primary key(id)
);
insert into users (username, wachtwoord, email) values ('admin', 'admin', 'email.com');


