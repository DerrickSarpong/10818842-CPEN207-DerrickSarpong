create database Project1;
use Project1;

CREATE TABLE users(
id INT PRIMARY KEY AUTO_INCREMENT,
fname VARCHAR(255) NOT NULL,
lname VARCHAR(255) NOT NULL,
username varchar(255) NOT NULL,
dob VARCHAR(255),
contact VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255),
);

SELECT * FROM users;
DELETE FROM users;
