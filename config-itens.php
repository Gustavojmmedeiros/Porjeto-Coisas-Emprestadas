<?php

  include "includes/inicio.php";
  include "includes/conecta.php";

  $id_item = "";
  $nome_item = "";
  $quantidade = "";
  $data_inicio = "";
  $data_limite = "";
  $descricao = "";
  $disponivel = "";
  $usuario_id = "";

  if (isset($_GET['id_item'])){
    $id_item = $_GET['id_item'];

    $sql = "SELECT * FROM itens WHERE id_item = $id_item";

    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);

    $id_item = $row['id_item'];
    $nome_item = $row['nome_item'];
    $quantidade = $row['quantidade'];
    $data_inicio = $row['data_inicio'];
    $data_limite = $row['data_limite'];
    $descricao = $row['descricao'];
    $disponivel = $row['disponivel'];
    $usuario_id = $row['usuario_id'];
  }
  
?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>

    <section class="cartao">
      <h2 class="cartao__titulo-itens">Editar Item</h2>    
      <a href="perfil-usuario.php" class="link-estatico">Voltar</a>

      <form action="recebe-item.php" class="formulario" method="POST">
        <fieldset>

          <input type="hidden" name="id_item" value="<?php echo $id_item?>">
          <input type="hidden" name="usuario_id" value="<?php echo $usuario_id?>">
          <input type="hidden" name="disponivel" value="<?php echo $disponivel?>">

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
            <input class="input" type="date" name="data_limite" placeholder="Data Limite" value="<?php echo $data_limite?>">
            <label class="input-label" for="data-limite">Data Limite</label>
          </div>

          <div class="input-container">
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição do item" value="<?php echo $descricao?>"></textarea>
          </div>
        </fieldset>
        <input type="submit" class="botao" value="Atualizar">

      </form>

    </section>
  </main>
</body>
</html>