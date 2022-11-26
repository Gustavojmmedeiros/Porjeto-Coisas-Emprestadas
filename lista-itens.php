<?php

  include "includes/inicio.php";

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>

    </div>

    <section class="cartao">
      <h2 class="cartao__titulo">Olá, <?php echo $_SESSION['nome'] ?></h2>
      
      <a href="cadastro-itens.php" class="link-estatico">Cadastrar novo item</a>
      <a href="perfil-usuario.php" class="link-estatico">Voltar</a>

      <legend class="formulario__legenda">Seus itens</legend>

      <table border="1" class="tabela">
        <tr>
          <td class="tabela-item">Id Item</td>
          <td class="tabela-item">Nome Item</td>
          <td class="tabela-item">Quantidade</td>
          <td class="tabela-item">Data Início</td>
          <td class="tabela-item">Data Limite</td>
          <td class="tabela-item">Descrição</td>
          <td class="tabela-item">Id Usuário</td>
          <td class="tabela-item">Editar</td>
          <td class="tabela-item">Excluir</td>
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
                    <td class='tabela-item'>". $row['id_item'] ."</td>

                    <td class='tabela-item'>". $row['nome_item'] ."</td>

                    <td class='tabela-item'>". $row['quantidade'] ."</td>

                    <td class='tabela-item'>". $row['data_inicio'] ."</td>

                    <td class='tabela-item'>". $row['data_limite'] ."</td>

                    <td class='tabela-item'>". $row['descricao'] ."</td>

                    <td class='tabela-item'>". $row['usuario_id'] ."</td>

                    <td class='tabela-item'><a href='config-itens.php?id_item=". $row['id_item'] ."' class='tabela-item link-estatico'>Editar</a></td>

                    <td class='tabela-item'><a href='exclui-item.php?id_item=". $row['id_item'] ."' class='tabela-item link-estatico'>Excluir</a></td>
                  </tr>";
          }

        ?>
      </table>
    </section>
  </main>
</body>
</html>