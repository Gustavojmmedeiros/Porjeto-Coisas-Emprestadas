<?php

  include "includes/inicio.php";

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>

    <section class="cartao">

      <?php 

        include "includes/conecta.php";

        if (isset($_GET['erro'])) {
          echo '<p style="text-align": center; color: red">Você não tem autorização para excluir esta conta!</p>';
        }

?>
      <a href="perfil-usuario.php" class="link-estatico">Voltar</a>

      <table border="1" class="tabela">
        <tr>
          <td class='tabela-item'>Id</td>
          <td class='tabela-item'>Nome</td>
          <td class='tabela-item'>Telefone</td>
          <td class='tabela-item'>E-mail</td>
          <td class='tabela-item'>Senha</td>
          <td class='tabela-item'>Editar</td>
          <td class='tabela-item'>Excluir</td>
        </tr>
        <?php

          include "includes/conecta.php";

          //Monta o código SQL para inserir os dados do formulário no MySQL
          $sql = "SELECT * FROM usuarios";

          //Envia os dados SQL para o MySQL
          $res = mysqli_query($conn, $sql);
          
          //Percorre registros encontrados
          while($row = mysqli_fetch_assoc($res)) {
            echo "<tr>
                    <td class='tabela-item'>". $row['id'] ."</td>

                    <td class='tabela-item'>". $row['nome'] ."</td>

                    <td class='tabela-item'>". $row['telefone'] ."</td>

                    <td class='tabela-item'>". $row['email'] ."</td>

                    <td class='tabela-item'>". $row['senha'] ."</td>

                    <td class='tabela-item'><a href='cadastro-usuario.php?id=". $row['id'] ."' class='tabela-item link-estatico'>Editar</a></td>

                    <td class='tabela-item'><a href='exclui-usuario.php?id=". $row['id'] ."' class='tabela-item link-estatico'>Excluir</a></td>
                  </tr>";
          }

        ?>
      </table>
    </section>
  </main>
</body>
</html>