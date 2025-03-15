--Agenda 04 - T.I.04
--1.Criar uma View com Nome e Telefone dos Síndicos

CREATE VIEW vw_sindicos_condominio AS
SELECT c.nome AS nome_condominio, s.nome AS nome_sindico, s.telefone
FROM condominio c
JOIN sindico s ON c.matricula_sind = s.matricula;

--2.Criar uma View com Total de Apartamentos por Condomínio

CREATE VIEW vw_total_apartamentos AS
SELECT c.nome AS nome_condominio, COUNT(a.numero) AS total_apartamentos
FROM condominio c
LEFT JOIN apartamento a ON c.codigo = a.codigo_cond
GROUP BY c.nome;

--3.Criar um Usuário e Conceder Permissões

-- Criando um novo usuário (substitua 'usuario' e 'senha' conforme necessário)
CREATE USER 'usuario'@'' IDENTIFIED BY 'senha';

-- Concedendo permissão de SELECT apenas nas views criadas
GRANT SELECT ON imobiliaria.vw_sindicos_condominio TO 'usuario'@'';
GRANT SELECT ON imobiliaria.vw_total_apartamentos TO 'usuario'@'';

-- Aplicar as mudanças de privilégios
FLUSH PRIVILEGES;


--4.Análise de Qualidade dos Dados

--Verificar Dados Duplicados na Tabela Síndico
SELECT nome, COUNT(*) AS qtd
FROM sindico
GROUP BY nome
HAVING COUNT(*) > 1;

-- Verificar se Existem Apartamentos Sem Proprietário
SELECT a.numero
FROM apartamento a
LEFT JOIN proprietario_apartamento pa ON a.numero = pa.numero_ap
WHERE pa.numero_ap IS NULL;

--Contar Quantas Pessoas Residem em Cada Apartamento
CREATE VIEW vw_residentes_por_apartamento AS
SELECT a.numero AS numero_apartamento, COUNT(pa.rg_prop) AS total_residentes
FROM apartamento a
LEFT JOIN proprietario_apartamento pa ON a.numero = pa.numero_ap
GROUP BY a.numero;

SELECT * FROM vw_residentes_por_apartamento;
