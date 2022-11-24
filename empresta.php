<?php

  include "includes/inicio.php";
  include "includes/conecta.php";

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>
    
    <section class="cartao">
      <a href="perfil-usuario.php" class="link-estatico">Voltar</a>

      <form class="bloco-select" action="recebe-emprestado.php" method="POST">

        <label for="emprestador" class="select-label">Emprestador</label>
        <select name="emprestador-id" class="select">
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
        <select name="item-emprestador-i" class="select">
          <option>Selecione</option>d
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