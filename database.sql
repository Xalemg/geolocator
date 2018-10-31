
CREATE DATABASE proyect;
 use proyect;

 CREATE TABLE users (
 userId int NOT NULL,
 firstName varchar(20),
 lastName varchar(40),
 age int,
 record int UNSIGNED,
 PRIMARY KEY (userId)
 );

CREATE TABLE location (
    locationId int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL,
    locationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    longitud decimal(12,8),
    latitud decimal(10,6),
    altitud decimal(10,6),
    found boolean NOT NULL DEFAULT 0,
    solvedBy int NOT NULL,
    PRIMARY KEY (locationId),
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (solvedBy) REFERENCES users(userId)
    );
