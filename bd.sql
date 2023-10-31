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
('Eduardo Cardoso', '2009-02-23', '11 93423-4139'),
('João Silva', '2009-12-17', '11 96022-4197'),
('Vitor Correia', '2009-09-10', '11 98041-7775'),
('João Silva', '2009-07-01', '11 96111-6392'),
('João Silva', '2009-05-04', '11 92382-0126'),

('Maria Oliveira', '2008-12-29', '11 93927-7326'),
('Isabella Souza', '2008-08-20', '11 92106-6043'),
('Martim Gomes', '2008-03-12', '11 9124-5796'),
('Livia Azevedo', '2008-09-17', '11 96877-4261'),
('Ryan Araujo', '2008-04-19', '11 96943-6605'),

('Pedro Santos', '2007-03-16', '11 90403-2814'),
('Thiago Costa', '2007-05-21', '11 93377-4413'),
('Letícia Gomes', '2007-09-02', '11 98537-9454'),
('Enzo Ribeiro', '2007-12-20', '11 90409-7178'),
('Luiza Castro', '2007-08-09', '11 97997-8670'),

('Ana Pereira', '2006-09-12', '11 91532-0367'),
('Eduarda Martins', '2006-07-24', '11 6214-2549'),
('Vinicius Sousa', '2006-11-15', '11 91523-0787'),
('Victor Lima', '2006-03-06', '11 95200-4072'),
('Nicolas Ribeiro', '2006-01-14', '11 93184-6958'),

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