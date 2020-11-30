USE sis_os;

CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel INT NOT NULL,
    PRIMARY KEY(id)
);