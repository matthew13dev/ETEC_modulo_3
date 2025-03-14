--Agenda 03 T.I.3


--Atividade 01 - Trigger para inserir um registro de garagem coberta
DELIMITER //

CREATE TRIGGER after_insert_apartamento 
AFTER INSERT ON apartamento
FOR EACH ROW
BEGIN
    IF NEW.tipo = 'Cobertura' THEN
        INSERT INTO garagem (tipo, numero_ap) VALUES ('Coberta', NEW.numero);
    END IF;
END;

//

DELIMITER ;


--Atividade 02 - Trigger para desvalorizar o preço do apartamento
DELIMITER //

CREATE TRIGGER before_delete_garagem 
BEFORE DELETE ON garagem
FOR EACH ROW
BEGIN
    UPDATE apartamento 
    SET valor = valor * 0.7 
    WHERE numero = OLD.numero_ap;
END;

//

DELIMITER ;



--testes 01

INSERT INTO apartamento (numero, tipo, codigo_cond, valor) VALUES ('A701', 'Cobertura', 1, 180000.00);
SELECT * FROM garagem WHERE numero_ap = 'A701';


--testes 02
DELETE FROM garagem WHERE numero = 16;
SELECT * FROM apartamento WHERE numero = 'A701'; 