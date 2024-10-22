

--/home/juanra/Escritorio/libros.sql

DROP TABLE libros;
CREATE TABLE libros(

     id                 INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre             VARCHAR(100) NOT NULL
    ,descripcion        TEXT 
    ,editorial          CHAR(2)
    ,autor              VARCHAR(150)


    
    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Código Limpio','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('El señor de los anillos','Historia de fantasía sobre orcos, troles, y algún elfo','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Limpio Código ','Buenas pautas sobre estructura de código','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('La vida máginca','Trucos mágicos para salir de fiesta','ST','Tolkien','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Amigos para siempre','Historia de una enemistad','AY','Robert C. Martin','127.0.0.1');
INSERT INTO libros(nombre, descripcion, editorial, autor , ip_alta) VALUES('Harry el porreta','Bichos raros que hacen cosas raras','ST','Tolkien','127.0.0.1');

