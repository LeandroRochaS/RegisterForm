CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    cep VARCHAR(8),
    endereco VARCHAR(255) NOT NULL,
    endereco2 VARCHAR(255),
    numero VARCHAR(10) NOT NULL,
    cidade VARCHAR(100),
    estado VARCHAR(50)
);