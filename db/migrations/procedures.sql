--Agenda 01 T.I.3

--1 - Procedure para atualizar o valor dos apartamentos
DELIMITER //

CREATE PROCEDURE AtualizarValorApartamento(
    IN p_codigo_cond INT,  -- Identificador do condomínio
    IN p_percentual INT    -- Percentual de aumento (10% = 10)
)
BEGIN
    UPDATE apartamento
    SET valor = valor + (valor * p_percentual / 100)
    WHERE codigo_cond = p_codigo_cond;
END //

DELIMITER ;

--Execução do procedure:
CALL AtualizarValorApartamento(1, 10);


--2 - Procedure para efetivação de compra de um apartamento

DELIMITER //

CREATE PROCEDURE ComprarApartamento(
    IN p_rg_prop VARCHAR(15),  -- RG do novo proprietário
    IN p_numero_ap VARCHAR(5)  -- Número do apartamento
)
BEGIN
    -- Verificar se o apartamento já tem um proprietário e remover a associação anterior
    DELETE FROM proprietario_apartamento WHERE numero_ap = p_numero_ap;

    -- Atribuir o novo proprietário ao apartamento
    INSERT INTO proprietario_apartamento (numero_ap, rg_prop)
    VALUES (p_numero_ap, p_rg_prop);
END //

DELIMITER ;

--Execução do procedure:
CALL ComprarApartamento('12345678-0', 'A101');
