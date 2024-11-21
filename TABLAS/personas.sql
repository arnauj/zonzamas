CREATE TABLE personas
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre             VARCHAR(100) NOT NULL
    ,apellido_1         VARCHAR(100)
    ,apellido_2         VARCHAR(100)
    ,nif                CHAR(9)
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Andrés','García','Pimiento','78551006A');
INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Carlos','Marca','Registrada','78551005T');
INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Armando','Bronca','Segura','78351005T');
INSERT INTO personas (nombre,apellido_1,nif)            VALUES ('Notoco','Nibola','72351005T');
INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Jacinto','Arabia','Tocado','42351005T');
INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Jaime','Santiago','Bernabeu','42151005T');
INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Guzmán','Gustos','Raros','41151005T');
INSERT INTO personas (nombre,apellido_1,apellido_2,nif) VALUES ('Patricia','García','Curbelo','41151001T');