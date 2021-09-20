CREATE DATABASE hospital;
USE hospital;

CREATE TABLE login(
	id_login	int				auto_increment PRIMARY KEY,
    user		varchar(20)		not null,
    pwd			varchar(20)		not null
);

INSERT INTO login VALUES(DEFAULT, 'admin', '0000');
INSERT INTO login VALUES(DEFAULT, 'user','1234');

SELECT id_login FROM login WHERE user = 'admin';
SELECT pwd FROM login WHERE id_login = '1';

CREATE TABLE pacientes(
	id_paciente			int			auto_increment PRIMARY KEY,
    nombre				varchar(50)	NOT NULL,
    fecha				date		NULL,
    fecha_nac			date		NULL,
    edad				int			NULL,
    genero				char		NOT NULL,
    ocupacion			varchar(20)	NULL,
    lateralidad			char		NOT NULL,
    nacionalidad		varchar(20)	NULL,
    religion			varchar(20)	NULL,
    domicilio			varchar(20)	NULL,
    telefono			varchar(20)	NULL,
    email				varchar(40)	NULL,
    tel_emergencia		varchar(20)	NULL,
    con_emergencia		varchar(50)	NULL
);
