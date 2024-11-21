
CREATE TABLE ciclos
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre             VARCHAR(100) NOT NULL
    ,siglas             CHAR(4) NOT NULL
    ,curso              INT NOT NULL
    ,letra              CHAR(0)

    
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
    

INSERT INTO ciclos(nombre,siglas,curso) VALUES('Desarrollo de Aplicaciones Web','DAW',1);
INSERT INTO ciclos(nombre,siglas,curso) VALUES('Desarrollo de Aplicaciones Web','DAW',2);
INSERT INTO ciclos(nombre,siglas,curso) VALUES('Administración de Sistemas Informáticos en Red','ASIR',1);
INSERT INTO ciclos(nombre,siglas,curso) VALUES('Administración de Sistemas Informáticos en Red','ASIR',2);