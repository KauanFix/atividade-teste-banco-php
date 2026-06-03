CREATE DATABASE IF NOT EXISTS sistema_simples;

USE sistema_simples;

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuario (nome, senha) VALUES ('admin', '123');

INSERT INTO usuario (nome, senha) VALUES ('kauan', 'fix');

/* backup do script que faz o banco de dados*/