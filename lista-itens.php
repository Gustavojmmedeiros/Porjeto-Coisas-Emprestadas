<?php

  include "includes/inicio.php";

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>

    <section class="cartao">
      <div>
        <a href="cadastro-itens.php" class="link-estatico">Cadastrar novo item</a>
      </div>

      <table border="1">
        <tr>
          <td>Id Item</td>
          <td>Nome Item</td>
          <td>Quantidade</td>
          <td>Data Início</td>
          <td>Data Limite</td>
        </tr>
        <?php

          include "includes/conecta.php";

          //Monta o código SQL para inserir os dados do formulário no MySQL
          $sql = "SELECT * FROM itens";

          //Envia os dados SQL para o MySQL
          $res = mysqli_query($conn, $sql);
          
          //Percorre registros encontrados
          while($row = mysqli_fetch_assoc($res)) {
            echo "<tr>
                    <td>". $row['id_item'] ."</td>
                    <td>". $row['nome_item'] ."</td>
                    <td>". $row['quantidade'] ."</td>
                    <td>". $row['data_inicio'] ."</td>
                    <td>". $row['data_limite'] ."</td>
                    <td>". $row['descricao'] ."</td>
                    <td>
                      <a href='cadastro-itens.php?id_item=". $row['id_item'] ."'>Editar</a>
                    </td>
                    <td>
                      <a href='exclui-item.php?id_item=". $row['id_item'] ."'>Excluir</a>
                    </td>
                  </tr>";
          }

        ?>
      </table>
    </section>
  </main>
</body>
</html>