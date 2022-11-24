<?php

  include "includes/inicio.php";
  include "includes/conecta.php";

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>

    <section class="cartao">
      <h2 class="cartao__titulo">Olá, <?php echo $_SESSION['nome'] ?></h2>

      <form action="#" method="post">
      <fieldset>

        <label for="item">Item</label>
        <select name="item">
          <option>Selecione</option>
          <?php

            $sql = "SELECT id, nome FROM usuarios";

            $res = mysqli_query($conn, $sql);

            if ($res) {
              while ($row = mysqli_fetch_assoc($res)) {
                echo "<option value='".$row['id']."'>".$row['nome']."</option>";
                //Aqui ta pegando o id, mas precisa pegar o item que a pessoa pode emprestar (criar a tabela de empréstimos)
              }
            }

          ?>
        </select>

      </fieldset>

      </form>

    </section>
  </main>
</body>
</html>