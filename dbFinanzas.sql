
-- Base de datos curso Introduccion a PHP platzi

CREATE DATABASE IF NOT EXISTS finanzas_app DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE finanzas_app;

-- Create the table in the specified schema
CREATE TABLE IF NOT EXISTS tbl_users
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- primary key column
    name varchar(60),
    lastname VARCHAR(60),
    mail varchar(60) NOT NULL,
    password text NOT NULL,
    image text,
    created_at DATETIME,
    updated_at DATETIME
    -- specify more columns here
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tbl_eventos
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    idUser INT,
    description text,
    ticket text,
    mount DECIMAL(19,4),
    eventType int,
    dateReg DATE,
    timeReg TIME,
    idCategoria int,
    created_at DATETIME,
    updated_at DATETIME
    -- specify more columns here
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS tbl_categotias
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    idUser INT,
    categoria text,
    created_at DATETIME,
    updated_at DATETIME
    -- specify more columns here
)ENGINE=InnoDB DEFAULT CHARSET=utf8;





