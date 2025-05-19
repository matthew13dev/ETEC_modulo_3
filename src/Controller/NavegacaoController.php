<?php


if (!isset($_SESSION)) {
    session_start();
}

switch ($_POST) {

    // Caso a variavel seja nula, mostra a tela de login
    case isset($_POST[null]):
        include_once "./View/LoginView.php";
        break;


    // --Primeiro Acesso (Cadastro)---
    case isset($_POST["btnPrimeiroAcesso"]):
        include_once "../View/PrimeiroAcessoView.php";
        break;


    //------Cadastrar-----
    case isset($_POST["btnCadastrar"]):
        include_once "../Controller/UsuarioController.php";

        $unusarioController = new UsuarioController();

        $nome = $_POST["txtNome"];
        $cpf = $_POST["txtCPF"];
        $email = $_POST["txtEmail"];
        $senha = $_POST["txtSenha"];

        if ($unusarioController->inserir($nome, $cpf, $email, $senha)) {
            include_once "../View/Secundarias/CadastroRealizado.php";
        } else {
            include_once "../View/Secundarias/CadastroNaoRealizado.php";
        }
        break;



    //--Atualizar--//
    case isset($_POST["btnAtualizar"]):
        require_once "../Controller/UsuarioController.php";
        $uController = new UsuarioController();
        if ($UsuarioController->atualizar(
            $_POST["txtID"],
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            date("Y-m-d", strtotime($_POST["txtData"]))
        )) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;





    case isset($_POST["btnLogin"]):
        require_once "../Controller/UsuarioController.php";
        $uController = new UsuarioController();
        if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
            include_once "../View/principal.php";
        } else {
            include_once "../View/cadastroNaoRealizado.php";
        }
        break;




    //--Adicionar Formacao--//
    case isset($_POST["btnAddFormacao"]):
        require_once "../Controller/FormacaoAcademicaController.php";
        include_once "../Model/Usuario.php";
        $fController = new FormacaoAcademicaController();
        if (
            $fController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioFA"])),
                date("Y-m-d", strtotime($_POST["txtFimFA"])),
                $_POST["txtDescFA"],
                unserialize($_SESSION["Usuario"])->getID()
            ) != false
        ) {
            include_once "../View/Secundarias/InformacaoInseridaComSucesso.php";
        } else {
            include_once "../View/Secundarias/OperacaoNaoRealizada.php";
        }
        break;





    //--Excluir Formacao-//
    case isset($_POST["btnExcluirFA"]):
        require_once "../Controller/FormacaoAcadController.php";
        include_once "../Model/Usuario.php";
        $fController = new FormacaoAcademicaController();
        if ($fController->remover($_POST["id"]) == true) {
            include_once "../View/Secundarias/InformacaoExcluidaComSucesso.php";
        } else {
            include_once "../View/Secundarias/OperacaoRealizadaSemSucesso.php";
        }
        break;





    //--Adicionar Experiencia Profissional-//
    case isset($_POST["btnAddEP"]):
        require_once "../Controller/ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $epController = new ExperienciaProfissionalController();
        if (
            $epController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioEP"])),
                date("Y-m-d", strtotime($_POST["txtFimEP"])),
                $_POST["txtEmpEP"],
                $_POST["txtDescEP"],
                unserialize($_SESSION["Usuario"])->getID()
            ) != false
        ) {
            include_once "../View/Secundarias/InformacaoInseridaComSucesso.phpinformacaoInserida.php";
        } else {
            include_once "../View/Secundarias/OperacaoRealizadaSemSucesso.php";
        }
        break;


    //--Excluir Experiencia Profissional-//
    case isset($_POST["btnExcluirEP"]):
        require_once "../Controller/ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $epController = new ExperienciaProfissionalController();

        if ($epController->remover($_POST["idEP"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNRealizada.php";
        }
        break;
}
