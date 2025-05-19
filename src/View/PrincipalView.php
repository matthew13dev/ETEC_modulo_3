<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <meta httpequiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Enlatados Juarez</title>
    <style>
    /* Definimos que a sidebar terá uma largura de 120px e cor a cord de fundo #222 */
    .w3-sidebar {
        width: 120px;
    }

    /*Define Fonte para todas as tagslistadas abaixo*/
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Montserrat", sans-serif
    }
    </style>

</head>

<body class="w3-light-grey">
    <?php

    include_once "../Model/Usuario.php";
    include "../Controller/FormacaoAcademicaController.php";
    if (!isset($_SESSION)) {
        session_start();
    }

    ?>
    <nav class="w3-sidebar w3-bar-block w3-center w3-blue ">
        <a href="#home"
            class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="#dPessoais"
            class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-user-circle w3-xxlarge"></i>
            <p>Dados Pessoais</p>
        </a>
        <a href="#formacao"
            class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-mortar-board w3-xxlarge"></i>
            <p>Formação</p>
        </a>
        <a href="#experienciaProfissional"
            class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-briefcase w3-xxlarge"></i>
            <p>Experiência Profissional</p>
        </a>
        <a href="#outrasFormacoes"
            class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-institution w3-xxlarge"></i>
            <p>Outras Formações</p>
        </a>
    </nav>
    </nav>
    <div class="w3-padding-large" id="main">
        <header class="w3-container w3-padding-32 w3-center" id="home">
            <h1>
                <img src="../img/Enlatados.png" alt="Logo" class="w3-image" width="50%">
            </h1>
            <a class="w3-text-cyan">Designed by Matheus Henrique Mendes</a>
            <br>
            <br>
            <h1 class="w3-text-cyan">SISTEMA DE CURRICULOS</h1>
        </header>

        <div class="w3-padding-128 w3-content w3-text-grey" id="dPessoais">
            <h2 class="w3-text-cyan">Dados Pessoais</h2>
            <form action="/Controller/Navegacao.php" method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin"
                style="width:70%;">
                <input class="w3-input w3-border w3-round-large" name="txtID" type="hidden"
                    value="<?php echo unserialize($_SESSION['Usuario'])->getId(); ?>">
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-user"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtNome" type="text"
                            placeholder="Nome Completo"
                            value="<?php echo unserialize($_SESSION['Usuario'])->getNome(); ?>">
                    </div>
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-address-card-o"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtCPF" type="text"
                            placeholder="123.456.789-00"
                            value="<?php echo unserialize($_SESSION['Usuario'])->getCpf(); ?>">
                    </div>
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtData" type="date"
                            placeholder="dd/mm/aaaa"
                            value="<?php echo unserialize($_SERVER['Usuario'])->getDataNascimento(); ?>">
                    </div>
                    <div class="w3-col" style="width:11%;">
                        <i class="w3-xxlarge fa fa-envelope-o"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtEmail" type="text"
                            placeholder="seuemail@email.com"
                            value="<?php echo unserialize($_SERVER['Usuario'])->getEmail(); ?>">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-center" style="">
                        <button name="btnAtualizar" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large"
                            style="width: 90%;">Atualizar</button>
                    </div>
                </div>
        </div>
        <div class="w3-padding-128 w3-content w3-text-grey" id="formacao">
            <h2 class="w3-text-cyan">Formação</h2>
            <form action="/src/Controller/NavegacaoController.php" method="post"
                class="w3-row w3-light-grey w3-text-blue w3-margin" style="width:45%;">
                <div class="w3-row w3-center">
                    <div class="w3-col w3-text-blue" style="width:50%;">
                        Data Inicial
                    </div>
                    <div class="w3-res w3-text-blue" style="">
                        Data Final
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-row w3-section w3-col" style="width:45%;">
                        <div class="w3-col" style="width:15%;">
                            <i class="w3-xxlarge fa fa-calendar"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtInicioFA" type="date"
                                placeholder="">
                        </div>
                    </div>
                    <div class="w3-row w3-section w3-rest" style="" placeholder="">
                        <div class="w3-col w3-margin-left" style="width:13%;">
                            <i class="w3-xxlarge fa fa-calendar"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtFimFA" type="date">
                        </div>
                    </div>
                    <div>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:7%;">
                                <i class="w3-xxlarge fa fa-align-justify"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtDescFA" type="text"
                                    placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza">
                            </div>
                        </div>
                        <div class="w3-row w3-section">
                            <div class="w3-center" style="">
                                <button name="btnAddFormacao" class="w3-button w3-block w3-blue w3-cell w3-round-large"
                                    style="width: 20%;">
                                    <i class="w3-xxlarge fa fa-user-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="w3-container">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <?php
                    $fCon = new FormacaoAcademicaController();
                    $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                    if ($results != null)
                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                            echo '<td style="width: 10%;">' . $row->fim . '</td>';
                            echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                            echo '<td style="width: 5%;">
                                            <form action="/Controller/NavegacaoController.php" method="post">
                                            <input type="hidden" name="id" value="' . $row->idformacaoAcademica . '">
                                            <button name="btnExcluirFA" class="w3-button w3-block w3-blue
                                            w3-cell w3-round-large">
                                            13
                                            <i class="fa fa-user-times"></i> </button></td>
                                            </form>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
            <div class="w3-padding-128 w3-content w3-text-grey" id="experienciaProfissional">
                <h2 class="w3-text-cyan">Experiência Profissional</h2>
                <form action=" " method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width: 70%;">
                    <div class="w3-row w3-center">
                        <div class="w3-col" style="width:50%;">
                            Data Inicial
                        </div>
                        <div class="w3-res" style="">
                            Data Final
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-row w3-section w3-col" style="width:45%;">
                            <div class="w3-col" style="width:15%;">
                                <i class="w3-xxlarge fa fa-calendar"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtInicioEP" type="date"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="w3-row w3-section w3-rest" style="">
                            <div class="w3-col w3-margin-left" style="width:13%;">
                                <i class="w3-xxlarge fa fa-calendar"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtFimEP" type="date"
                                    placeholder="">
                            </div>
                        </div>
                        <div>
                            <div class="w3-row w3-section">
                                <div class="w3-col" style="width:7%;">
                                    <i class="w3-xxlarge fa fa-align-justify"></i>
                                </div>
                                <div class="w3-rest">
                                    <input class="w3-input w3-border w3-round-large" name="txtEmpEP" type="text"
                                        placeholder="Centro Paula Souza">
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-col" style="width:7%;">
                                    <i class="w3-xxlarge fa fa-align-justify"></i>
                                </div>
                                <div class="w3-rest">
                                    <input class="w3-input w3-border w3-round-large" name="txtDescEP" type="text"
                                        placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Desenvolvimento de Páginas WEB">
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-center" style="">
                                    <button name="btnAddEP" class="w3-button w3-block w3-blue w3-cell w3-round-large"
                                        style="width: 20%;">
                                        <i class="w3-xxlarge fa fa-user-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="w3-container">
                    <table class="w3-table-all w3-centered">
                        <thead>
                            <tr class="w3-center w3-blue">
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Empresa</th>
                                <th>Descrição</th>
                                <th>Apagar</th>
                            </tr>
                            <thead>
                                <?php
                                $ePro = new ExperienciaProfissionalController();
                                $results = $ePro->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                                if ($results != null)
                                    while ($row = $results->fetch_object()) {
                                        echo '<tr>';
                                        echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                                        echo '<td style="width: 10%;">' . $row->fim . '</td>';
                                        echo '<td style="width: 10%;">' . $row->empresa . '</td>';
                                        echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                                        echo '<td style="width: 5%;">
                        <form action="/Controller/Navegacao.php" method="post">
                        <input type="hidden" name="idEP" value="' . $row->idexperienciaprofissional . '">
                        <button name="btnExcluirEP" class="w3-button w3-block w3-blue
                        w3-cell w3-round-large">
                        <i class="fa fa-user-times"></i> </button></td>
                        </form>';
                                        echo '</tr>';
                                    }
                                ?>
                    </table>
                </div>
            </div>
            <div class="w3-padding-128 w3-content w3-text-grey" id="outrasFormacoes">
                <h2 class="w3-text-cyan">Outras Formações</h2>
                <form action="../Controller/NavegacaoController.php" method="post"
                    class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width:70%;">
                    <div class="w3-row w3-center">
                        <div class="w3-col w3-text-blue" style="width:50%;">
                            Data Inicial
                        </div>
                        <div class="w3-res w3-text-blue" style="">
                            Data Final
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-row w3-section w3-col" style="width:45%;">
                            <div class="w3-col" style="width:15%;">
                                <i class="w3-xxlarge fa fa-calendar"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtInicioOF" type="date"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="w3-row w3-section w3-rest" style="" placeholder="">
                            <div class="w3-col w3-margin-left" style="width:13%;">
                                <i class="w3-xxlarge fa fa-calendar"></i>
                            </div>
                            <div class="w3-rest">
                                <input class="w3-input w3-border w3-round-large" name="txtFimOF" type="date">
                            </div>
                        </div>
                        <div>
                            <div class="w3-row w3-section">
                                <div class="w3-col" style="width:7%;">
                                    <i class="w3-xxlarge fa fa-align-justify"></i>
                                </div>
                                <div class="w3-rest">
                                    <input class="w3-input w3-border w3-round-large" name="txtDescEP" type="text"
                                        placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza">
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-center" style="">
                                    <button name="btnAddOF" class="w3-button w3-block w3-blue w3-cell w3-round-large"
                                        style="width: 20%;">
                                        <i class="w3-xxlarge fa fa-user-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="w3-container">
                    <table class="w3-table-all w3-centered">
                        <thead>
                            <tr class="w3-center w3-blue">
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Descrição</th>
                                <th>Apagar</th>
                            </tr>
                        </thead>
                        <?php
                        $outrasFormacoes = new OutrasFormacoesController();
                        $results = $outrasFormacoes->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                        if ($results != null)
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                                echo '<td style="width: 10%;">' . $row->fim . '</td>';
                                echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                                echo '<td style="width: 5%;">
                                            <form action="../Controller/NavegacaoController.php" method="post">
                                            <input type="hidden" name="id" value="' . $row->idformacao . '">
                                            <button name="btnExcluirOF" class="w3-button w3-block w3-blue
                                            w3-cell w3-round-large">
                                            13
                                            <i class="fa fa-user-times"></i> </button></td>
                                            </form>';
                                echo '</tr>';
                            }
                        ?>
                    </table>
                </div>

            </div>
        </div>
</body>

</html>