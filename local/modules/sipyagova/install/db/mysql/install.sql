create table if not exists book
(
ID int NOT NULL AUTO_INCREMENT,  
TITLE varchar(255) NOT NULL, 
PRIMARY KEY(ID)
);
create table if not exists authors
(
ID int NOT NULL AUTO_INCREMENT, 
AUTHOR varchar(255) NOT NULL,
BOOK int NOT NULL, 
PRIMARY KEY(ID)
);