<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Itens - Projeto Coisas Emprestadas</title>
  <link rel="stylesheet" href="./assets/base/base.css">
  <link rel="stylesheet" href="./assets/base/_variaveis.css">
  <link rel="stylesheet" href="./assets/componentes/cartao.css">
  <link rel="stylesheet" href="./assets/componentes/inputs.css">
  <link rel="stylesheet" href="./assets/componentes/botao.css">
</head>
<body>
  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <img src="#" alt="Logo Projeto Coisas Emprestadas" class="cadastro-cabecalho__logo">

      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>
    <section class="cartao">
      <h2 class="cartao__titulo-itens">Cadastro de Itens</h2>

      <h3 class="cartao__apresentacao">Olá, Fulano. Digite abaixo o item e a quantidade deste que deseja emprestar.</h3>
      

      <form action="recebe-item.php" class="formulario" method="post">
        <fieldset>
          <legend class="formulario__legenda">Dados do item</legend>

          <div class="input-container">
            <input class="input" type="text" name="nome_item" placeholder="Nome do item" required>
            <label class="input-label" for="nome_item">Nome do item</label>
          </div>

          <div class="input-container">
            <input class="input" type="number" name="quantidade" placeholder="Quantidade" required>
            <label class="input-label" for="quantidade">Quantidade</label>
          </div>

          <div class="input-container">
            <input class="input" type="date" name="data_inicio" placeholder="Data Início" required>
            <label class="input-label" for="data-inicio">Data Início</label>
          </div>

          <div class="input-container">
            <input class="input" type="date" name="data_limite" placeholder="Data Limite">
            <label class="input-label" for="data-limite">Data Limite</label>
          </div>

          <div class="input-container">
            <textarea name="descricao" id="descricao" cols="30" rows="10">Descrição do item</textarea>
          </div>
        </fieldset>
        <input type="submit" value="Cadastrar">

      </form>

      <!-- <button class="botao">Cadastrar Item</button> -->
    </section>
  </main>
</body>
</html>