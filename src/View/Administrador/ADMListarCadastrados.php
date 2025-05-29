<?php
include_once "../Model/ConexaoBD.php";
include_once "../Model/Usuario.php";
include_once "../Controller/UsuarioController.php";

if (!isset($_SESSION)) {
    session_start();
}

$controller = new UsuarioController();
$usuarios = $controller->gerarLista();
if ($usuarios === false) {
    echo "<script>alert('Erro ao carregar a lista de usuários.');</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cadastrados</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container">
    <h2 class="w3-center">Usuários Cadastrados</h2>
    <table class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-blue">
                <th>CPF</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?php echo $u["cpf"]; ?></td>
                <td><?php echo $u["nome"]; ?></td>
                <td><?php echo $u["email"]; ?></td>
                <td>
                   <form action="../Controller/navegacao.php" method="post">
    <input type="hidden" name="cpf_usuario" value="<?= $u['cpf']; ?>">
    <button name="btnVisualizarCadastro" class="w3-button w3-green">Visualizar</button>
</form>
             
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <form action="../Controller/navegacao.php" method="post">
        <button name="btnVoltar" class="w3-button w3-blue">Voltar</button>
    </form>
</div>
</body>
</html>
