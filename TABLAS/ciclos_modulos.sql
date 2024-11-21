
CREATE TABLE ciclos_modulos
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_modulo          INT NOT NULL
    ,id_ciclo           INT NOT NULL
    
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_modulo) REFERENCES modulos(id) ON DELETE CASCADE ON UPDATE CASCADE
    ,FOREIGN KEY (id_ciclo) REFERENCES  ciclos(id) ON DELETE CASCADE ON UPDATE CASCADE

);
    
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,1);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,2);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,3);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,4);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,5);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,6);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,7);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(1,8);

INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(2,9);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(2,10);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(2,11);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(2,12);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(2,13);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(2,14);

INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,15);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,16);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,17);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,18);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,19);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,20);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,21);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(3,22);

INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(4,23);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(4,24);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(4,25);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(4,26);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(4,27);
INSERT INTO ciclos_modulos(id_ciclo,id_modulo) VALUES(4,28);