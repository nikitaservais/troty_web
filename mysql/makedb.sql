
CREATE DATABASE troty CHARACTER SET 'utf8';
SHOW WARNINGS;
USE Troty;

CREATE TABLE Scooter (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    dateCommissioning DATETIME NOT NULL,
    model VARCHAR(30) NOT NULL,
    complain BOOLEAN NOT NULL DEFAULT FALSE,
    reloadLevel INT unsigned NOT NULL,
    available BOOLEAN NOT NULL DEFAULT TRUE,
    positionX FLOAT,
    positionY FLOAT,
    PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE User (
    id INT UNSIGNED NOT NULL,
    mdp VARCHAR(30) NOT NULL,
    bankAccount VARCHAR(35) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE UserRecharge(
    id INT UNSIGNED NOT NULL,
    firstName VARCHAR(30) NOT NULL, 
    lastName VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    adCity VARCHAR(50) NOT NULL,
    adCP VARCHAR(10) NOT NULL,
    adStreet VARCHAR(50) NOT NULL,
    adNumber VARCHAR(10) NOT NULL,
    FOREIGN KEY(id) REFERENCES User(id),
    PRIMARY KEY(id)
    ) ENGINE=InnoDB;

CREATE TABLE Mechanic(
    id VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    mdp VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    adCity VARCHAR(50) NOT NULL,
    adCP VARCHAR(10) NOT NULL,
    adStreet VARCHAR(50) NOT NULL,
    adNumber VARCHAR(10) NOT NULL,
    hireDate DATETIME NOT NULL,
    bankAccount VARCHAR(35) NOT NULL, 
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE Trip(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    scooter int unsigned NOT NULL,
    user INT UNSIGNED NOT NULL,
    startTime DATETIME NOT NULL,
    endTime DATETIME,
    sourceX FLOAT NOT NULL,
    sourceY FLOAT NOT NULL,
    destinationX FLOAT,
    destinationY FLOAT,
    distance FLOAT,
    FOREIGN KEY(user) REFERENCES User(id),
    FOREIGN KEY(scooter) REFERENCES Scooter(id) ON DELETE CASCADE,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE Reload(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    scooter INT UNSIGNED NOT NULL,
    user INT UNSIGNED NOT NULL,
    initialLoad INT NOT NULL,
    finalLoad INT,
    sourceX FLOAT NOT NULL,
    sourceY FLOAT NOT NULL,
    destinationX FLOAT,
    destinationY FLOAT,
    startTime DATETIME NOT NULL,
    endTime DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY(scooter) REFERENCES Scooter(id) ON DELETE CASCADE,
    FOREIGN KEY(user) REFERENCES User(id) 
) ENGINE=InnoDB;

CREATE TABLE Reparation(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    scooter INT UNSIGNED NOT NULL,
    user INT UNSIGNED NOT NULL,
    mechanic VarCHAR(30),
    dateReparation DATETIME,
    dateComplain DATETIME NOT NULL,
    note TEXT,
    PRIMARY KEY(id),
    FOREIGN KEY(user) REFERENCES User(id),
    FOREIGN KEY(scooter) REFERENCES Scooter(id) ON DELETE CASCADE,
    FOREIGN KEY(mechanic) REFERENCES Mechanic(id)
) ENGINE=InnoDB;