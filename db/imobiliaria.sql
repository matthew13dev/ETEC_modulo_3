-- Criar o banco de dados
CREATE DATABASE imobiliaria;
USE imobiliaria;

-- Criar tabela sindico
CREATE TABLE sindico (
  matricula INT(3) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(80) DEFAULT NULL,
  endereco VARCHAR(80) DEFAULT NULL,
  telefone VARCHAR(15) DEFAULT NULL,
  PRIMARY KEY (matricula)
);

-- Inserir dados na tabela sindico
INSERT INTO sindico (matricula, nome, endereco, telefone) VALUES
(1, 'Antonio Carlos', 'Avenida Santos Dummont, 789, Califórnia, São Paulo', '(11) 3456-6787'),
(2, 'Sidnei Delgado', 'Alameda XV de Novembro, 123, Jockey Club, São Paulo', '(11) 3452-4562');

-- Criar tabela condominio
CREATE TABLE condominio (
  codigo INT(5) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) DEFAULT NULL,
  endereco VARCHAR(80) DEFAULT NULL,
  matricula_sind INT(3) DEFAULT NULL,
  PRIMARY KEY (codigo),
  FOREIGN KEY (matricula_sind) REFERENCES sindico(matricula)
);

-- Inserir dados na tabela condominio
INSERT INTO condominio (codigo, nome, endereco, matricula_sind) VALUES
(1, 'Condomínio São Paulo', 'Alameda Getúlio Vargas, 897, Centro, São Paulo', 1),
(2, 'Condomínio Brasil', 'Avenida General Gusmão, 453, Penha, São Paulo', 2);

-- Criar tabela apartamento
CREATE TABLE apartamento (
  numero VARCHAR(5) NOT NULL,
  tipo VARCHAR(20) DEFAULT NULL,
  codigo_cond INT(5) DEFAULT NULL,
  valor DOUBLE(10,2) DEFAULT 0.00,
  PRIMARY KEY (numero),
  FOREIGN KEY (codigo_cond) REFERENCES condominio(codigo)
);

-- Inserir dados na tabela apartamento
INSERT INTO apartamento (numero, tipo, codigo_cond, valor) VALUES
('A101', 'Padrão', 1, 110000.00),
('A201', 'Padrão', 1, 115000.00),
('A301', 'Padrão', 1, 125000.00),
('A401', 'Padrão', 1, 135000.00),
('A501', 'Cobertura', 1, 150000.00),
('B101', 'Padrão', 2, 200000.00),
('B201', 'Padrão', 2, 215000.00),
('B301', 'Padrão', 2, 225000.00),
('B401', 'Padrão', 2, 235000.00),
('B501', 'Cobertura', 2, 250000.00);

-- Criar tabela garagem
CREATE TABLE garagem (
  numero INT(3) NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(20) DEFAULT NULL,
  numero_ap VARCHAR(5) DEFAULT NULL,
  PRIMARY KEY (numero),
  FOREIGN KEY (numero_ap) REFERENCES apartamento(numero)
);

-- Inserir dados na tabela garagem
INSERT INTO garagem (numero, tipo, numero_ap) VALUES
(1, 'Padrão', 'A101'),
(2, 'Padrão', 'A201'),
(3, 'Padrão', 'A301'),
(4, 'Padrão', 'A401'),
(5, 'Coberta', 'A501'),
(6, 'Padrão', 'B101'),
(7, 'Padrão', 'B101'),
(8, 'Padrão', 'B201'),
(9, 'Padrão', 'B201'),
(10, 'Padrão', 'B301'),
(11, 'Padrão', 'B301'),
(12, 'Padrão', 'B401'),
(13, 'Padrão', 'B401'),
(14, 'Coberta', 'B501'),
(15, 'Coberta', 'B501');

-- Criar tabela proprietario
CREATE TABLE proprietario (
  rg VARCHAR(15) NOT NULL,
  nome VARCHAR(80) DEFAULT NULL,
  telefone VARCHAR(15) DEFAULT NULL,
  email VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (rg)
);

-- Inserir dados na tabela proprietario
INSERT INTO proprietario (rg, nome, telefone, email) VALUES
('12345678-0', 'Carlos Eduardo', '(11) 3256-7890', 'carloseduardoead@email.com.br'),
('32145678-4', 'Oswaldo Lima', '(11) 2314-9876', 'oswaldolimaead@email.com.br'),
('32156788-0', 'Pedro Castro', '(11) 3452-8743', 'pedroead@email.com.br'),
('46536267-3', 'Maria Luiza', '(11) 2345-1627', 'marialuizaead@email.com.br'),
('54367281-2', 'Joana Darc', '(11) 4563-2315', 'joanadarcead@email.com.br'),
('74853928-2', 'Benedito Vai', '(11) 3427-4132', 'beneditogoesead@email.com.br'),
('76534126-4', 'Matheus Henrique', '(11) 2234-1123', 'matheushenriqueead@email.com.br'),
('98635314-5', 'Augusto Silva', '(11) 4122-2134', 'augustosilvaead@email.com.br'),
('99987271-1', 'Marcos Vinícius', '(11) 2124-2427', 'marcosviniciusead@email.com.br');

-- Criar tabela proprietario_apartamento
CREATE TABLE proprietario_apartamento (
  prop_ap_id INT(3) NOT NULL AUTO_INCREMENT,
  numero_ap VARCHAR(5) DEFAULT NULL,
  rg_prop VARCHAR(15) DEFAULT NULL,
  PRIMARY KEY (prop_ap_id),
  FOREIGN KEY (numero_ap) REFERENCES apartamento(numero),
  FOREIGN KEY (rg_prop) REFERENCES proprietario(rg)
);

-- Inserir dados na tabela proprietario_apartamento
INSERT INTO proprietario_apartamento (prop_ap_id, numero_ap, rg_prop) VALUES
(1, 'A101', '12345678-0'),
(2, 'A201', '32145678-4'),
(3, 'A301', '32156788-0'),
(4, 'A401', '46536267-3'),
(5, 'A501', '54367281-2'),
(6, 'B101', '74853928-2'),
(7, 'B201', '76534126-4'),
(8, 'B301', '98635314-5'),
(9, 'B401', '99987271-1'),
(10, 'B501', '99987271-1');
