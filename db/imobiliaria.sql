criar banco de dados imobiliários;

usar imóveis;

criar tabela sindico (
  matricula int(3) não nulo auto_increment,
  nome varchar(80) padrão nulo,
  endereco varchar (80) padrão nulo,
  telefone varchar(15) padrão nulo,
  chave primária (matriz)
);

inserir em valores síndicos (1,'antonio carlos','avenida santos dummont, número 789, califórnia, são paulo','(11) 3456-6787'),(2,'sidnei delgado','alameda xv de novembro, número 123, jockey club, são paulo','(11) 3452-4562');

criar tabela condomínio (
  codigo int(5) não nulo auto_increment,
  nome varchar(50) padrão nulo,
  endereco varchar (80) padrão nulo,
  matricula_sind int(3) padrão nulo,
  chave primária (codigo),
  chave fx_cond_sindico (matrícula_sind),
  restrição fx_cond_sindico chave estrangeira (matricula_sind) faz referência ao sindico (matricula)
);

inserir nos valores de condomínio (1,'condomínio são paulo','alameda getulio vargas, número 897, centro, são paulo',1),(2,'condomínio brasil','avenida general gusmão, número 453, penha, são paulo',2);

criar tabela apartamento (
  numero varchar(5) não nulo,
  tipo varchar(20) padrão nulo,
  codigo_cond int(5) padrão nulo,
  valor double(10,2) padrão '0,00',
  chave primária (numero),
  chave fk_ap_cond (codigo_cond),
  restrição fk_ap_cond chave estrangeira (codigo_cond) faz referência a condomínio (codigo)
);

inserir nos valores do apartamento ('a101','padrão',1.100000,00),('a201','padrão',1.115000,00),('a301','padrão' ',1.125000,00),('a401','padrão',1.135000,00),('a501','cobertura',1.150000,00), ('b101','padrão',2.200.000,00),('b201','padrão',2.215.000,00),('b301','padrão' ',2.225000,00),('b401','padrão',2.235000,00),('b501','cobertura',2.250000,00);

criar tabela garagem (
  numero int(3) não nulo auto_increment,
  tipo varchar(20) padrão nulo,
  numero_ap varchar(5) padrão nulo,
  chave primária (numero),
  chave fk_gar_apartamento (numero_ap),
  restrição fk_gar_apartamento chave estrangeira (numero_ap) referências apartamento (numero)
);

inserir em valores de garagem (1,'padrão','a101'),(2,'padrão','a201'),(3,'padrão','a301'),(4,'padrão','a40 1'),(5,'coberta','a501'),(6,'padrão','b101'),(7,'padrão','b101'),(8,'padrão', 'b201'),(9,'padrão','b201'),(10,'padrão','b301'),(11,'padrão','b301'),(12,'pa drão','b401'),(13,'padrão','b401'),(14,'coberta','b501'),(15,'coberta','b501');

criar tabela proprietario (
  rg varchar(15) não nulo,
  nome varchar(80) padrão nulo,
  telefone varchar(15) padrão nulo,
  e-mail varchar(50) padrão nulo,
  chave primária (rg)
);

inserir nos valores do proprietário ('12345678-0','carlos eduardo','(11) 3256-7890','carloseduardoead@email.com.br'),('32145678-4','oswaldo lima','(11) 2314-9876','oswaldolimaead@email.com.br'),('32156788-0','pedro castro','(11) 3452-8743','pedroead@email.com.br'),('46536267-3','maria luiza','(11) 2345-1627','marialuizaead@email.com.br'),('54367281-2','joana darc','(11) 4563-2315','joanadarcead@email.com.br'),('74853928-2','benedito vai','(11) 3427-4132','beneditogoesead@email.com.br'),('76534126-4','matheus henrique','(11) 2234-1123','matheushenriqueead@email.com.br'),('98635314-5','augusto silva','(11) 4122-2134','augustosilvaead@email.com.br'),('99987271-1','marcos Vinícius','(11) 2124-2427','marcosviniciusead@email.com.br');

criar tabela proprietario_apartamento (
  prop_ap_id int(3) não nulo auto_increment,
  numero_ap varchar(5) padrão nulo,
  rg_prop varchar(15) padrão nulo,
  chave primária (prop_ap_id),
  chave fk_pa_apartamento (numero_ap),
  chave fk_pa_proprietário (rg_prop),
  restrição fk_pa_apartamento chave estrangeira (numero_ap) faz referência a apartamento (numero),
  restrição fk_pa_proprietario chave estrangeira (rg_prop) faz referência a propriedade (rg)
);

inserir nos valores proprietario_apartamento (1,'a101','12345678-0'),(2,'a201','32145678-4'),(3,'a301','32156788-0'),(4,'a401','46536267-3'),(5,'a501','54367281-2'), (6,'b101','74853928-2'),(7,'b201','76534126-4'),(8,'b301','98635314-5'),(9,'b401','99987271-1'),(10,'b501','99987271-1');
