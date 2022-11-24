<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto Coisas Emprestadas</title>
  <link rel="stylesheet" href="./assets/base/base.css" type="text/css">
  <link rel="stylesheet" href="./assets/base/_variaveis.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/cartao.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/inputs.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/botao.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/itens-lista.css" type="text/css">
</head>
<body>
  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>

    <section class="cartao">
      <h2 class="cartao__titulo">Acesse sua conta</h2>

      <span>Cadastre-se <a href="./cadastro-usuario.php" class="link-estatico">aqui</a></span>

      <?php

        include "includes/conecta.php";

        if (isset($_GET['erro'])) {
          echo '<p style="text-align: center; color: red">Usuário e/ou senha incorreta(s).</p>';
        }

        if (isset($_GET['autentica'])) {
          echo '<p style="text-align: center; color: red">Você não tem permissão de acesso.</p>';
        }

      ?>

      <form action="login.php" class="formulario" method="POST">
        <fieldset>

          <input type="hidden" name="id" value="<?php echo $id?>">
          
          <legend class="formulario__legenda">Login</legend>

          <div class="input-container">
            <input class="input" type="email" name="email" placeholder="E-mail">
            <label class="input-label" for="email">E-mail</label>
          </div>

          <div class="input-container">
            <input class="input" type="password" name="senha" placeholder="Senha" value="">
            <label class="input-label" for="senha">Senha</label>
          </div>
        </fieldset>

        <input class="botao" type="submit" value="Entrar">

      </form>
    </section>
  </main>
</body>
</html>