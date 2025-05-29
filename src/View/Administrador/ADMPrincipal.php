<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel do Administrador</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body, h1, h2, h3, h4, h5, h6 {
      font-family: "Montserrat", sans-serif;
    }
  </style>
</head>
<body class="w3-light-grey">
  <div class="w3-padding-large" id="main">
   <header class="w3-container w3-padding-32 w3-center " id="home">
    <h1 class="w3-cyan w3-round-large">ADMINISTRAÇÃO</h1>
    <h1 class="w3-cyan w3-round-large">SISTEMA DE CURRÍCULOS</h1>
  </header>

  <form action="../Controller/Navegacao.php"   method="post" class="w3-container w3-light-grey w3-text-blue w3-margin w3-center">
    <input type="hidden" name="nome_form" value="frmLoginADM" />

    <div class="w3-cell-row w3-center">
      <div class="w3-cell w3-padding">
        <button name="btnListarCadastrados" class="w3-button w3-blue w3-round-large">
          <i class="fa fa-address-book-o w3-xxlarge"></i><br>
          <p class="w3-xlarge">Usuários<br> Cadastrados</p>
        </button>
      </div>
      <div class="w3-cell w3-padding">
        <button name="btnListarCadastradosADM" class="w3-button w3-blue w3-round-large">
          <i class="fa fa-user-secret w3-xxlarge"></i><br>
          <p class="w3-xlarge">Administradores<br> Cadastrados</p>
        </button>
      </div>
    </div>
</div> 

  </form>
  <div class="w3-container w3-right-align w3-padding">
  <form action="../Controller/Navegacao.php" method="post">
    <button name="btnLogout" class="w3-button w3-red w3-round-large">
      Sair
    </button>
  </form>
</div>

  <footer class="w3-container w3-center w3-padding-16">
    <p>&copy; <?php echo date('Y'); ?> 
   <img src="../Img/seta 2.png"    alt="Logo da Empresa" style="height:50px; vertical-align: middle;">
   Todos os direitos reservados.
</p>

  </footer>

</body>
</html>
