
CREATE TABLE alumnos
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_persona         INT NOT NULL
    
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_persona) REFERENCES personas(id) ON DELETE CASCADE ON UPDATE CASCADE

);
    
INSERT INTO alumnos (id_persona) VALUES(1);
INSERT INTO alumnos (id_persona) VALUES(2);