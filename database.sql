use gc200329020;
create table product
(
productName VARCHAR(20),
productQuantity INT,
manufactureDate INT,
expiryDate INT
);

create table departments 
(
appliances varchar(20) NOT NULL
);

insert into departments values ('Clothing,Shoes'); 
insert into departments values ('Electronics'); 
insert into departments values ('Movies,Music'); 
insert into departments values ('Office,Stationary'); 
insert into departments values ('Outdoor Living'); 

select * from departments ;


use gc200329020;

ALTER TABLE games
ADD COLUMN game_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
select * from games 
