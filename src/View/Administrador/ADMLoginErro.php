<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Erro de Login ADM</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">
  <div class="w3-container w3-padding-64 w3-center">
    <div class="w3-panel w3-red w3-round-large w3-padding-32">
      <h2 class="w3-xlarge">❌ Login de Administrador falhou!</h2>
      <p>CPF ou senha inválidos.</p>
       <div class="w3-container w3-right-align w3-padding">
  <form action="../Controller/Navegacao.php" method="post">
    <button name="btnLogout" class="w3-button w3-blue w3-round-large">
      tentar novamente
    </button>
  </form>
</div>
    </div>
  </div>
</body>
</html>
