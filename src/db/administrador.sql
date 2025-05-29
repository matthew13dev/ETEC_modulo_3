CREATE TABLE IF NOT EXISTS `projeto_final`.`administrador` (
`idadministrador` INT(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(45) NULL DEFAULT NULL,
`cpf` VARCHAR(11) NOT NULL,
`senha` VARCHAR(45) NOT NULL,
PRIMARY KEY (`idadministrador`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

/*INSERT INTO `projeto_final`.`administrador` (`nome`, `cpf`, `senha`) VALUES ('Bia', '22222222222', 'bia123');*/