
CREATE TABLE modulos_alumnos
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_modulo          INT NOT NULL
    ,id_alumno          INT NOT NULL
    
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_modulo) REFERENCES modulos(id) ON DELETE CASCADE ON UPDATE CASCADE
    ,FOREIGN KEY (id_alumno) REFERENCES alumnos(id) ON DELETE CASCADE ON UPDATE CASCADE

);

INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(1,1);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(2,1);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(3,1);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(4,1);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(1,2);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(2,2);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(3,2);
INSERT INTO modulos_alumnos(id_modulo,id_alumno) VALUES(4,2);