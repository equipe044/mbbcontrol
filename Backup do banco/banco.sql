CREATE DATABASE escola;

USE escola;

CREATE TABLE professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE disciplinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    professor_id INT,
    FOREIGN KEY (professor_id) REFERENCES professores(id) ON DELETE CASCADE
);

CREATE TABLE horarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    disciplina_id INT,
    dia_da_semana ENUM('Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'),
    horario TIME,
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas(id) ON DELETE CASCADE
);
