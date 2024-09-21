CREATE DATABASE veterinaria;
USE veterinaria;

CREATE TABLE mascotas(
idmascota	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre		VARCHAR(30) NOT NULL,
tipo		VARCHAR(20) NOT NULL,
genero		VARCHAR(20) NOT NULL, 
peso		DECIMAL(7,2) NOT NULL,
fechanacimiento	DATE NOT NULL,
estavivo		CHAR(2) NOT NULL DEFAULT 'si',
CONSTRAINT chk_tipo CHECK( tipo IN ('ave','perro','gato') )
);
INSERT INTO mascotas(nombre,tipo,genero,peso,fechanacimiento) VALUES
					('Panchita','perro','hembra',25.32,'2005-02-20');

update mascotas set
	fechanacimiento = '2005-02-20'
    where idmascota = 1;
SELECT * FROM mascotas;