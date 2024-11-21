
CREATE TABLE profesores
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_persona         INT NOT NULL
    
    ,id_ciclo_tutor     INT 
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_persona) REFERENCES personas(id) ON DELETE CASCADE ON UPDATE CASCADE
    ,FOREIGN KEY (id_ciclo_tutor) REFERENCES ciclos(id) ON DELETE CASCADE ON UPDATE CASCADE

);
    
INSERT INTO profesores (id_persona,id_ciclo_tutor) VALUES(3,1);
INSERT INTO profesores (id_persona,id_ciclo_tutor) VALUES(4,2);
INSERT INTO profesores (id_persona,id_ciclo_tutor) VALUES(5,3);
INSERT INTO profesores (id_persona,id_ciclo_tutor) VALUES(6,4);
INSERT INTO profesores (id_persona) VALUES(7);
INSERT INTO profesores (id_persona) VALUES(8);