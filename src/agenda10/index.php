<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aagenda 09 DS3</title>



    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;

        }


        section {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #444;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ddd;
        }

        tr:hover {
            background-color: #999;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <h1>Agenda 09 DS3</h1>
            <h1>Lista de Pacientes já cadastrados</h1>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Profissão</th>
                </tr>

                <?php

                //Criando pacientes para teste

                $paciente0 = new Paciente("Matheus", "123456789", "123.456.789-00", "Rua A, 123", "Engenheiro");
                $paciente1 = new Paciente("Ana", "987654321", "987.654.321-00", "Rua B, 456", "Médica");
                $paciente2 = new Paciente("Carlos", "456789123", "456.789.123-00", "Rua C, 789", "Professor");

                //Adicionando os pacientes em um array
                $pacientesArray = array($paciente0, $paciente1, $paciente2);

                // Exibindo os dados de cada paciente

                foreach ($pacientesArray as $pacienteItem):

                ?>


                    <tr>
                        <td><?php echo $pacienteItem->getNome(); ?></td>
                        <td><?php echo $pacienteItem->getRg(); ?></td>
                        <td><?php echo $pacienteItem->getCpf(); ?></td>
                        <td><?php echo $pacienteItem->getEndereco(); ?></td>
                        <td><?php echo $pacienteItem->getProfissao(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</body>

</html>

<?php
class Paciente
{
    private $nome;
    private $rg;
    private $cpf;
    private $endereco;
    private $profissao;

    // Construtor 
    public function __construct($nome = "", $rg = "", $cpf = "", $endereco = "", $profissao = "")
    {
        $this->nome = $nome;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->profissao = $profissao;
    }

    // Getters
    public function getNome()
    {
        return $this->nome;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getProfissao()
    {
        return $this->profissao;
    }

    // Setters
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;
    }
}
