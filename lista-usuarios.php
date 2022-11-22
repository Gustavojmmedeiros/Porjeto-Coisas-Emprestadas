<?php

  include "includes/inicio.php";

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>
    
    <section class="cartao">
      <table border="1">
        <tr>
          <td>Id</td>
          <td>Nome</td>
          <td>Telefone</td>
          <td>E-mail</td>
          <td>Senha</td>
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
                    <td>". $row['id'] ."</td>
                    <td>". $row['nome'] ."</td>
                    <td>". $row['telefone'] ."</td>
                    <td>". $row['email'] ."</td>
                    <td>". $row['senha'] ."</td>
                    <td><a href='cadastro-usuario.php?id=". $row['id'] ."'>Editar</a></td>
                    <td><a href='exclui-contato.php?id=". $row['id'] ."'>Excluir</a></td>
                  </tr>";
          }

        ?>
      </table>
    </section>
  </main>
</body>
</html>