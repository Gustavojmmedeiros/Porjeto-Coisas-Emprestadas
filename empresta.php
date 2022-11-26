<?php

  include "includes/inicio.php";
  include "includes/conecta.php";

  $id_emprestimo = "";
  $emprestador_id = "";
  $emprestador_nome = "";
  $emprestador_telefone = "";
  $emprestador_email = "";
  $item_id = "";
  $item_nome = "";
  $pechador_id = $_SESSION['id'];
  $pechador_nome = "";
  $pechador_telefone = "";
  $pechador_email = "";

  if (isset($_GET['id_emprestimo'])) {

    $id_emprestimo = $_GET['id_emprestimo'];

    $sql = "SELECT * FROM emprestados WHERE id_emprestimo = $id_emprestimo";

    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);

    $id_emprestimo = $row['id_emprestimo'];
    $emprestador_id = $row['emprestador_id'];
    $item_id = $row['item_id'];


    if (!isset($_SESSION)) {
      $_SESSION = array();

    }
  }

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>
    
    <section class="cartao">
      <a href="perfil-usuario.php" class="link-estatico">Voltar</a>

      <form class="bloco-select" action="recebe-emprestado.php" method="POST">

        <input type="hidden" name="id_emprestimo" value="<?php echo $id_emprestimo?>">
        <input type="hidden" name="pechador_id" value="<?php echo $pechador_id?>">

        <label for="emprestador" class="select-label">Emprestador</label>
        <select name="emprestador_id" class="select" >
          <option>Selecione</option>
          <?php
          
          $sql = "SELECT id, nome FROM usuarios";

          $res = mysqli_query($conn, $sql);

          if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
              echo "<option value='".$row['id']."'>".$row['nome']."</option>";
            }
          }

          ?>
        </select>

        <label for="emprestador" class="select-label">Item</label>
        <select name="item_id" class="select">
          <option>Selecione</option>
          <?php
          
          $sql = "SELECT id_item, nome_item FROM itens";

          $res = mysqli_query($conn, $sql);

          if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
              echo "<option value='".$row['id_item']."'>".$row['nome_item']."</option>";
            }
          }

          ?>
        </select>

        <input type="submit" class="botao botao-pedido" value="Enviar Pedido">

      </form>
    </section>
  </main>
</body>
</html>