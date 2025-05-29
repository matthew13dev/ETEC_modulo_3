<?php
if (!isset($_SESSION)) session_start();
require_once '../Model/Usuario.php';

if (!isset($_SESSION["UsuarioVisualizado"])) {
    echo "<div style='text-align:center; margin-top: 50px;'>Usuário não carregado.</div>";
    exit;
}

$usuario = unserialize($_SESSION["UsuarioVisualizado"]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Cadastro</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container w3-padding">
    <h2 class="w3-text-teal">Dados do Usuário</h2>
    <ul class="w3-ul w3-card-4">
        <li><strong>CPF:</strong> <?= $usuario->getCpf(); ?></li>
        <li><strong>Nome:</strong> <?= $usuario->getNome(); ?></li>
        <li><strong>Email:</strong> <?= $usuario->getEmail(); ?></li>
        <li><strong>Data de Nascimento:</strong> <?= date("d/m/Y", strtotime($usuario->getDataNascimento())); ?></li>
    </ul>
    <br>
    <form action="../Controller/navegacao.php" method="post">
        <button name="btnListarCadastrados" class="w3-button w3-blue">Voltar para a Lista</button>
    </form>
</div>
</body>
</html>
