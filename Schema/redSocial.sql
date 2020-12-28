DROP DATABASE IF EXISTS redSocial;
CREATE DATABASE IF NOT EXISTS redSocial;
#	drop database redSocial;
USE redSocial;


CREATE TABLE IF NOT EXISTS users
(
    id_user int NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    rol int DEFAULT 0,
    estado int default 1,
    CONSTRAINT PK_USERS PRIMARY KEY (id_user),
    CONSTRAINT UQ_USERS UNIQUE (email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#	drop table publicaciones;

CREATE TABLE IF NOT EXISTS publicaciones (
    id_publicacion INT NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    texto VARCHAR(250) NOT NULL,
    respuesta INT DEFAULT 0,
    CONSTRAINT PK_Publicacion PRIMARY KEY (id_publicacion)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8
;

CREATE TABLE IF NOT EXISTS respuestas (
    id_respuesta INT NOT NULL AUTO_INCREMENT,
	id_publicacion INT not null,
    id_user int NOT NULL,
    texto VARCHAR(250) NOT NULL,
    CONSTRAINT PK_Respuesta PRIMARY KEY (id_respuesta)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8
;
select * from users;
select * from publicaciones;

SELECT 
id_user,
name, 
lastname, 
email,
rol
FROM
    users
where
 concat(name,' ',lastname) like '%pedro%' and concat(name,' ',lastname) like'%riquelme%'
ORDER BY
    lastname;

INSERT INTO users (name, email, password, rol) VALUES ('admin', 'admin@redSocial.com','1234',1);
INSERT INTO users (name, email, password) VALUES ('user', 'user@redSocial.com','1234');

INSERT INTO publicaciones (id_user, texto) VALUES (2,'prueba bd');
