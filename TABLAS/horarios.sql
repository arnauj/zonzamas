
CREATE TABLE horarios
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_modulo          INT NOT NULL
    ,dia                CHAR(1)
    ,hora_desde         CHAR(5)
    ,hora_hasta         CHAR(5)
    
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_modulo) REFERENCES modulos(id) ON DELETE CASCADE ON UPDATE CASCADE

);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:00','08:55',4);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:55','09:50',4);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','09:50','10:45',2);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','11:15','12:10',2);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','12:10','14:05',3);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','14:05','14:00',6);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:00','08:55',7);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:55','09:50',7);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','09:50','10:45',6);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','11:15','12:10',6);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','12:10','14:05',5);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','14:05','14:00',5);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:00','08:55',7);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:55','09:50',7);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','09:50','10:45',4);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','11:15','12:10',8);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','12:10','14:05',8);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','14:05','14:00',8);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:00','08:55',5);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:55','09:50',5);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','09:50','10:45',1);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','11:15','12:10',1);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','12:10','14:05',8);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','14:05','14:00',8);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:00','08:55',7);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:55','09:50',7);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','09:50','10:45',3);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','11:15','12:10',3);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','12:10','14:05',6);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','14:05','14:00',6);


INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:00','08:55',14);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:55','09:50',14);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','09:50','10:45',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','11:15','12:10',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','12:10','14:05',12);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','14:05','14:00',12);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:00','08:55',14);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:55','09:50',14);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','09:50','10:45',11);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','11:15','12:10',11);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','12:10','14:05',12);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','14:05','14:00',12);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:00','08:55',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:55','09:50',14);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','09:50','10:45',13);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','11:15','12:10',12);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','12:10','14:05',12);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','14:05','14:00',9);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:00','08:55',12);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:55','09:50',12);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','09:50','10:45',11);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','11:15','12:10',11);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','12:10','14:05',14);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','14:05','14:00',14);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:00','08:55',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:55','09:50',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','09:50','10:45',11);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','11:15','12:10',11);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','12:10','14:05',9);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','14:05','14:00',9);


INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:00','08:55',22);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:55','09:50',22);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','09:50','10:45',22);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','11:15','12:10',20);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','12:10','14:05',20);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','14:05','14:00',16);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:00','08:55',19);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:55','09:50',19);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','09:50','10:45',18);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','11:15','12:10',21);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','12:10','14:05',21);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','14:05','14:00',21);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:00','08:55',15);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:55','09:50',21);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','09:50','10:45',21);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','11:15','12:10',18);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','12:10','14:05',17);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','14:05','14:00',17);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:00','08:55',16);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:55','09:50',18);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','09:50','10:45',22);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','11:15','12:10',22);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','12:10','14:05',20);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','14:05','14:00',20);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:00','08:55',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:55','09:50',10);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','09:50','10:45',20);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','11:15','12:10',20);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','12:10','14:05',15);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','14:05','14:00',16);


INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:00','08:55',24);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','08:55','09:50',24);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','09:50','10:45',26);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','11:15','12:10',26);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','12:10','14:05',25);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('L','14:05','14:00',25);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:00','08:55',25);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','08:55','09:50',25);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','09:50','10:45',23);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','11:15','12:10',23);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','12:10','14:05',27);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('M','14:05','14:00',27);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:00','08:55',27);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','08:55','09:50',27);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','09:50','10:45',26);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','11:15','12:10',26);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','12:10','14:05',28);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('X','14:05','14:00',28);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:00','08:55',25);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','08:55','09:50',25);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','09:50','10:45',28);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','11:15','12:10',28);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','12:10','14:05',27);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('J','14:05','14:00',27);

INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:00','08:55',23);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','08:55','09:50',24);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','09:50','10:45',28);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','11:15','12:10',28);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','12:10','14:05',26);
INSERT INTO horarios(dia,hora_desde,hora_hasta,id_modulo) VALUES('V','14:05','14:00',26);




