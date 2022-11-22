<?php

  include "includes/inicio.php";
  include "includes/conecta.php";

  $id_item = "";
  $nome_item = "";
  $quantidade = "";
  $data_inicio = "";
  $data_limite = "";
  $descricao = "";

  if (isset($_GET['id_item'])){
    $id = $_GET['id_item'];

    $sql = "SELECT * FROM itens WHERE id = $id_item";

    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);

    $id_item = $row['id_item'];
    $nome_item = $row['nome_item'];
    $quantidade = $row['quantidade'];
    $data_inicio = $row['data_inicio'];
    $data_limite = $row['data_limite'];
    $descricao = $row['descricao'];
  }
  
?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>

    <section class="cartao">
      <h2 class="cartao__titulo-itens">Cadastro de Itens</h2>

      <h3 class="cartao__apresentacao">Olá, <?php echo $_SESSION['nome']?>. Digite abaixo o item e a quantidade deste que deseja emprestar.</h3>
      

      <form action="recebe-item.php" class="formulario" method="post">
        <fieldset>

          <input type="hidden" name="id_item" value="<?php echo $id_item?>">

          <legend class="formulario__legenda">Dados do item</legend>

          <div class="input-container">
            <input class="input" type="text" name="nome_item" placeholder="Nome do item" value="<?php echo $nome_item?>" required>
            <label class="input-label" for="nome_item">Nome do item</label>
          </div>

          <div class="input-container">
            <input class="input" type="number" name="quantidade" placeholder="Quantidade" value="<?php echo $quantidade?>" required>
            <label class="input-label" for="quantidade">Quantidade</label>
          </div>

          <div class="input-container">
            <input class="input" type="date" name="data_inicio" placeholder="Data Início" value="<?php echo $data_inicio?>" required>
            <label class="input-label" for="data-inicio">Data Início</label>
          </div>

          <div class="input-container">
            <input class="input" type="date" name="data_limite" placeholder="Data Limite" value="<?php echo $nome_limite?>">
            <label class="input-label" for="data-limite">Data Limite</label>
          </div>

          <div class="input-container">
            <textarea name="descricao" id="descricao" cols="30" rows="10" value="<?php echo $descricao?>">Descrição do item</textarea>
          </div>
        </fieldset>
        <input type="submit" class="botao" value="Cadastrar">

      </form>

    </section>
  </main>
</body>
</html>