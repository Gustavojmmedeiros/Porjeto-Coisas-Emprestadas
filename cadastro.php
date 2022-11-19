<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Projeto Coisas Emprestadas</title>
  <link rel="stylesheet" href="./assets/base/base.css" type="text/css">
  <link rel="stylesheet" href="./assets/base/_variaveis.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/cartao.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/inputs.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/botao.css" type="text/css">
</head>
<body>
  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <img src="#" alt="Logo Projeto Coisas Emprestadas" class="cadastro-cabecalho__logo">

      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>
    <section class="cartao">
      <h2 class="cartao__titulo">Crie sua conta</h2>

      <span>Já possui cadastro? Fazer <a href="./login.html">login</a></span>

      <form action="recebe-cliente.php" class="formulario" method="POST">
        <fieldset>
          <legend class="formulario__legenda">Cadastre-se com seu email</legend>

          <div class="input-container">
            <input class="input" type="text" name="nome" placeholder="Nome">
            <label class="input-label" for="nome">Nome</label>
          </div>

          <div class="input-container">
            <input class="input" type="tel" name="telefone" placeholder="Telefone">
            <label class="input-label" for="telefone">Telefone</label>
          </div>

          <div class="input-container">
            <input class="input" type="email" name="email" placeholder="E-mail">
            <label class="input-label" for="email">E-mail</label>
          </div>

          <div class="input-container">
            <input class="input" type="password" name="senha" placeholder="Senha">
            <label class="input-label" for="senha">Senha</label>
          </div>
        </fieldset>
        <input type="submit" value="Cadastrar">
      </form>
      <!-- <button class="botao">Cadastrar</button> -->
    </section>
  </main>
</body>
</html>