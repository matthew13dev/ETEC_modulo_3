--Agenda 02 T.I.3

--1 - Function para retornar o nome do síndico

DELIMITER //

CREATE FUNCTION GetNomeSindico(p_matricula INT) 
RETURNS VARCHAR(80) DETERMINISTIC
BEGIN
    DECLARE v_nome VARCHAR(80);
    
    SELECT nome INTO v_nome FROM sindico WHERE matricula = p_matricula;
    
    RETURN v_nome;
END //

DELIMITER ;

--Utilização

SELECT c.nome AS Nome_Condominio, 
       c.endereco AS Endereco, 
       GetNomeSindico(c.matricula_sind) AS Nome_Sindico
FROM condominio c;

--2 - Function para calcular a taxa do condomínio

DELIMITER //

CREATE FUNCTION CalcularTaxaCondominio(p_numero_ap VARCHAR(5), p_percentual DOUBLE) 
RETURNS DOUBLE(10,2) DETERMINISTIC
BEGIN
    DECLARE v_valor_ap DOUBLE(10,2);
    DECLARE v_taxa DOUBLE(10,2);
    
    -- Buscar o valor do apartamento
    SELECT valor INTO v_valor_ap FROM apartamento WHERE numero = p_numero_ap;
    
    -- Calcular a taxa (percentual sobre o valor do apartamento)
    SET v_taxa = v_valor_ap * (p_percentual / 100);
    
    RETURN v_taxa;
END //

DELIMITER ;


--Utilização

SELECT a.numero AS Numero_Apartamento, 
       a.valor AS Valor_Apartamento, 
       CalcularTaxaCondominio(a.numero, 5) AS Taxa_Condominio
FROM apartamento a
WHERE a.codigo_cond = 1; -- Altere para o código do condomínio desejado
