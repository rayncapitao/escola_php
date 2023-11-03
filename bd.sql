CREATE DATABASE escola_php;
USE escola_php;

/* Tables */

CREATE TABLE IF NOT EXISTS user (
    ID_user INT(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(255) NOT NULL
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
(1, "admin", "202cb962ac59075b964b07152d234b70");

-- Alunos 
INSERT INTO aluno (nome, data_nascimento, telefone_responsavel)
VALUES
/* 1° ano */
('Eduardo Cardoso', '2009-02-23', '11 93423-4139'),
('João Silva', '2009-12-17', '11 96022-4197'),
('Vitor Correia', '2009-09-10', '11 98041-7775'),
('Luan Goncalves', '2009-07-01', '11 96111-6392'),
('Kai Castro', '2009-05-04', '11 92382-0126'),

/* 2° ano */
('Maria Oliveira', '2008-12-29', '11 93927-7326'),
('Isabella Souza', '2008-08-20', '11 92106-6043'),
('Martim Gomes', '2008-03-12', '11 9124-5796'),
('Livia Azevedo', '2008-09-17', '11 96877-4261'),
('Ryan Araujo', '2008-04-19', '11 96943-6605'),

/* 3° ano */
('Pedro Santos', '2007-03-16', '11 90403-2814'),
('Thiago Costa', '2007-05-21', '11 93377-4413'),
('Letícia Gomes', '2007-09-02', '11 98537-9454'),
('Enzo Ribeiro', '2007-12-20', '11 90409-7178'),
('Luiza Castro', '2007-08-09', '11 97997-8670'),

/* 4° ano */
('Ana Pereira', '2006-09-12', '11 91532-0367'),
('Eduarda Martins', '2006-07-24', '11 6214-2549'),
('Vinicius Sousa', '2006-11-15', '11 91523-0787'),
('Victor Lima', '2006-03-06', '11 95200-4072'),
('Nicolas Ribeiro', '2006-01-14', '11 93184-6958'),

/* 5° ano */
('Miguel Alves', '2005-12-02', '11 92361-8869'),
('Beatrice Gomes', '2005-07-14', '11 92268-5785'),
('Rodrigo Costa', '2005-04-26', '11 96613-2819'),
('Isabelle Santos', '2005-08-16', '11 94592-8934'),
('João Lima', '2005-10-14', '11 96153-7356');

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
(1, 'Matemática (1° ano)'), (1, 'Português (1° ano)'), (1, 'História (1° ano)'), (1, 'Geografia (1° ano)'), (1, 'Ciências (1° ano)'), (1, 'Educação Física (1° ano)'),
(2, 'Matemática (2° ano)'), (2, 'Português (2° ano)'), (2, 'História (2° ano)'), (2, 'Geografia (2° ano)'), (2, 'Ciências (2° ano)'), (2, 'Educação Física (2° ano)'),
(3, 'Matemática (3° ano)'), (3, 'Português (3° ano)'), (3, 'História (3° ano)'), (3, 'Geografia (3° ano)'), (3, 'Ciências (3° ano)'), (3, 'Educação Física (3° ano)'),
(4, 'Matemática (4° ano)'), (4, 'Português (4° ano)'), (4, 'História (4° ano)'), (4, 'Geografia (4° ano)'), (4, 'Ciências (4° ano)'), (4, 'Educação Física (4° ano)'),
(5, 'Matemática (5° ano)'), (5, 'Português (5° ano)'), (5, 'História (5° ano)'), (5, 'Geografia (5° ano)'), (5, 'Ciências (5° ano)'), (5, 'Educação Física (5° ano)');

-- Notas
INSERT INTO notas (ID_disciplina, ID_turma, ID_aluno, nota)
VALUES
-- 1° ano
(1, 1, 1, 8), (2, 1, 1, 6), (3, 1, 1, 7), (4, 1, 1, 10), (5, 1, 1, 8), (6, 1, 1, 10),
(1, 1, 2, 9), (2, 1, 2, 8), (3, 1, 2, 6), (4, 1, 2, 5), (5, 1, 2, 10), (6, 1, 2, 8),
(1, 1, 3, 6), (2, 1, 3, 10), (3, 1, 3, 9), (4, 1, 3, 7), (5, 1, 3, 6), (6, 1, 3, 7),
(1, 1, 4, 10), (2, 1, 4, 7), (3, 1, 4, 6), (4, 1, 4, 9), (5, 1, 4, 9), (6, 1, 4, 9),
(1, 1, 5, 7), (2, 1, 5, 9), (3, 1, 5, 10), (4, 1, 5, 6), (5, 1, 5, 7), (6, 1, 5, 8);

-- Matricula
INSERT INTO matricula (ID_turma, ID_aluno)
VALUES 
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5),
(2, 6), (2, 7), (2, 8), (2, 9), (2, 10),
(3, 11), (3, 12), (3, 13), (3, 14), (3, 15),
(4, 16), (4, 17), (4, 18), (4, 19), (4, 20),
(5, 21), (5, 22), (5, 23), (5, 24), (5, 25);