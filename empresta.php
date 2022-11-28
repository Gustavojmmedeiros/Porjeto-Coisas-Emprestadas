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
  //Se quebrar, o problema pode estar aqui
  $disponivel = "";
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
    $disponivel = $row['disponivel'];

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

      <table border="1" class="tabela">
        <tr>
          <td class="tabela-item">Id Item</td>
          <td class="tabela-item">Nome Item</td>
          <td class="tabela-item">Quantidade</td>
          <td class="tabela-item">Data Início</td>
          <td class="tabela-item">Data Limite</td>
          <td class="tabela-item">Descrição</td>
          <td class="tabela-item">Disponível</td>
          <td class="tabela-item">Id Usuário</td>
        </tr>
        <?php

          include "includes/conecta.php";

          $id = $_SESSION['id'];

          //Monta o código SQL para inserir os dados do formulário no MySQL
          $sql = "SELECT * FROM itens WHERE usuario_id != $id";

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

                    <td class='tabela-item'>". $row['disponivel'] ."</td>
                    
                    <td class='tabela-item'>". $row['usuario_id'] ."</td>";
          }
        ?>
      </table>

      <form class="bloco-select" action="recebe-emprestado.php" method="POST">

        <input type="hidden" name="id_emprestimo" value="<?php echo $id_emprestimo?>">
        <input type="hidden" name="pechador_id" value="<?php echo $pechador_id?>">
        <input type="hidden" name="item_disponivel" value="<?php echo $disponivel?>">

        <label for="emprestador" class="select-label">Emprestador</label>
        <select name="emprestador_id" class="select" >
          <option>Selecione</option>
          <?php
          
          $sql = "SELECT id, nome FROM usuarios WHERE id != $id";

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
          
          $sql = "SELECT id_item, nome_item, disponivel FROM itens WHERE usuario_id != $id";

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