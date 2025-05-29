<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login ADM</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<form action="../Controller/Navegacao.php" method="post" 
      class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-display-middle" 
      style="width: 30%;">

  <h2 class="w3-center">Login Administrador</h2>
<form action="../Controller/Navegacao.php" method="post">
  <input type="text" name="txtLoginADM" placeholder="CPF">
  <input type="password" name="txtSenhaADM" placeholder="Senha">
  <button type="submit" name="btnLoginADM">Entrar</button>
</form>

 </body>
</html>
