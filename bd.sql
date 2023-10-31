CREATE DATABASE escola_php;
USE escola_php;

/* Tables */

CREATE TABLE IF NOT EXISTS user (
    ID_user INT(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS aluno (
    ID_aluno INT(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome VARCHAR(70) NOT NULL,
    data_nascimento date NOT NULL,
    telefone_responsavel VARCHAR(16)
);

CREATE TABLE IF NOT EXISTS professor (
    ID_professor INT(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    email VARCHAR(80) NOT NULL
);

CREATE TABLE IF NOT EXISTS turma (
    ID_turma INT(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    ID_professor INT(4),
    ano VARCHAR(70) NOT NULL,
    FOREIGN KEY (ID_professor) REFERENCES professor(ID_professor)
);

CREATE TABLE IF NOT EXISTS disciplina (
    ID_disciplina INT(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    ID_professor INT(4),
    nome VARCHAR(70) NOT NULL,
    FOREIGN KEY (ID_professor) REFERENCES professor(ID_professor)
);

CREATE TABLE IF NOT EXISTS notas (
    ID_disciplina INT(4),
    ID_turma INT(4),
    ID_aluno INT(4),
    nota INT(4) NOT NULL,
    FOREIGN KEY (ID_disciplina) REFERENCES disciplina(ID_disciplina),
    FOREIGN KEY (ID_turma) REFERENCES turma(ID_turma),
    FOREIGN KEY (ID_aluno) REFERENCES aluno(ID_aluno)
);

CREATE TABLE IF NOT EXISTS matricula (
    ID_turma INT(4) NOT NULL,
    ID_aluno INT(4) NOT NULL,
    FOREIGN KEY (ID_turma) REFERENCES turma(ID_turma),
    FOREIGN KEY (ID_aluno) REFERENCES aluno(ID_aluno)
);

/* Inserts */

-- Users
INSERT INTO user (ID_user, username, password)
VALUES 
(1, "admin", "123");

-- Alunos 
-- Adicionar mais alunos
INSERT INTO aluno (nome, data_nascimento, telefone_responsavel)
VALUES
('João Silva', '2009-05-10', '11 92382-0126'),
('João Silva', '2009-05-10', '11 92382-0126'),
('João Silva', '2009-05-10', '11 92382-0126'),
('João Silva', '2009-05-10', '11 92382-0126'),
('João Silva', '2009-05-10', '11 92382-0126'),

('Maria Oliveira', '2008-08-15', '11 93927-7326'),
('Maria Oliveira', '2008-08-15', '11 93927-7326'),
('Maria Oliveira', '2008-08-15', '11 93927-7326'),
('Maria Oliveira', '2008-08-15', '11 93927-7326'),
('Maria Oliveira', '2008-08-15', '11 93927-7326'),

('Pedro Santos', '2007-03-25', '11 90403-2814'),
('Pedro Santos', '2007-03-25', '11 90403-2814'),
('Pedro Santos', '2007-03-25', '11 90403-2814'),
('Pedro Santos', '2007-03-25', '11 90403-2814'),
('Pedro Santos', '2007-03-25', '11 90403-2814'),

('Ana Pereira', '2006-11-12', '11 91532-0367'),
('Eduarda Martins', '2006-11-12', '11 6214-2549'),
('Vinicius Sousa', '2006-11-12', '11 91532-0367'),
('Victor Lima', '2006-11-12', '11 95200-4072'),
('Nicolas Ribeiro', '2006-11-12', '11 93184-6958'),

('Miguel Alves', '2005-12-02', '11 92361-8869'),
('Beatrice Gomes', '2005-07-14', '11 92268-5785'),
('Rodrigo Costa', '2005-04-26', '11 96613-2819'),
('Isabelle Santos', '2005-08-16', '11 94592-8934'),
('João Lima', '2005-10-14', '11 96153-7326');

-- Professor
INSERT INTO professor (nome, email)
VALUES 
('Carlos Rodrigues', 'carlos@email.com'),
('Isabel Oliveira', 'isabel@email.com'),
('Ricardo Santos', 'ricardo@email.com'),
('Maria Silva', 'maria@email.com'),
('Fernando Pereira', 'fernando@email.com');

-- Turmas
INSERT INTO turma (ID_professor, ano)
VALUES
(1, '1º Ano'),
(2, '2º Ano'),
(3, '3º Ano'),
(4, '4º Ano'),
(5, '5º Ano');

-- Disciplina
INSERT INTO disciplina (ID_professor, nome)
VALUES
(1, 'Matemática'), (1, 'Português'), (1, 'História'), (1, 'Geografia'), (1, 'Ciências'), (1, 'Educação Física'),
(2, 'Matemática'), (2, 'Português'), (2, 'História'), (2, 'Geografia'), (2, 'Ciências'), (2, 'Educação Física'),
(3, 'Matemática'), (3, 'Português'), (3, 'História'), (3, 'Geografia'), (3, 'Ciências'), (3, 'Educação Física'),
(4, 'Matemática'), (4, 'Português'), (4, 'História'), (4, 'Geografia'), (4, 'Ciências'), (4, 'Educação Física'),
(5, 'Matemática'), (5, 'Português'), (5, 'História'), (5, 'Geografia'), (5, 'Ciências'), (5, 'Educação Física');

-- Notas

-- Matricula
INSERT INTO matricula (ID_turma, ID_aluno)
VALUES 
(1, 1);