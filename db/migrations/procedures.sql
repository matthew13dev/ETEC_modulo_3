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
