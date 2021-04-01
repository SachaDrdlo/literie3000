use literie3000;

create table catalogue (
id int primary key auto_increment,
brand varchar(50) not null,
model varchar(50) not null,
dimension varchar(50) not null,
firstprice decimal(5,2) not null,
promotionprice decimal(5,2)
)

insert into catalogue (
    brand, model, dimension, firstprice, promotionprice
)
values (
    "EPEDA", "Matelas Tamoul", "90x190", 759.00, 529.00
)

alter table catalogue
add image text