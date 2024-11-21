
CREATE TABLE modulos
(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre             VARCHAR(100) NOT NULL
    ,id_profesor        INT NOT NULL
    ,color              CHAR(6)
    ,siglas             CHAR(4)
    
    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_profesor) REFERENCES profesores(id) ON DELETE CASCADE ON UPDATE CASCADE

);


INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (3,'123456','DJK','Digitalización aplicada a los sectores productivos');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (4,'612345','IKL','Inglés profesional');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (5,'561234','ITK','Itinerario personal para la empleabilidad I');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (6,'456123','ETS','Entornos de desarrollo');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (2,'345612','LND','Lenguajes de marcas y sistemas de gestión de información');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (1,'234561','SSF','Sistemas informáticos');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (3,'982673','PRO','Programación');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (4,'398267','BAE','Bases de datos');

INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (5,'739826','EMR','Empresa e iniciativa emprendedora');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (6,'673982','DPL','Despliegue de aplicaciones web');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (2,'267398','DOR','Diseño de interfaces web');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (1,'826739','DSW','Desarrollo web en entorno servidor');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (3,'826374','DEW1','Desarrollo web en entorno cliente');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (4,'482637','DEW','Desarrollo web en entorno cliente (Bilingüe)');

INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (5,'122453','DJK','Digitalización aplicada a los sectores productivos');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (6,'612343','FUW','Fundamentos de hardware');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (2,'562233','IKL','Inglés profesional');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (1,'452123','ITK','Itinerario personal para la empleabilidad');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (3,'342613','LND','Lenguajes de marcas y sistemas de gestión de información');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (4,'232563','IDP','Implantación de sistemas operativos');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (5,'982673','PNI','Planificación y administración de redes');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (6,'392263','GTB','Gestión de bases de datos');

INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (2,'732823','ADE','Administración de sistemas gestores de bases de datos');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (1,'672983','EMR','Empresa e iniciativa emprendedora');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (3,'262393','SRD','Servicios de red e internet');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (4,'822733','IMW','Implantación de aplicaciones web');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (5,'822373','SGY','Seguridad y alta disponibilidad');
INSERT INTO modulos (id_profesor,color,siglas, nombre) VALUES (6,'482633','ADD','Administración de sistemas operativos');