<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Projeto Coisas Emprestadas</title>
  <link rel="stylesheet" href="./assets/base/base.css" type="text/css">
  <link rel="stylesheet" href="./assets/base/_variaveis.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/cartao.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/inputs.css" type="text/css">
  <link rel="stylesheet" href="./assets/componentes/botao.css" type="text/css">
</head>
<body>
  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <img src="#" alt="Logo Projeto Coisas Emprestadas" class="cadastro-cabecalho__logo">

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

          $conn = mysqli_connect("localhost", "root", "Pssdbrk88!", "atp");

          if ($conn == false) {
            die("ERRO: Não foi possível conectar com o MySQL." . mysqli_connect_error());
          } 

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
                  </tr>";
          }

        ?>
      </table>
    </section>
  </main>
</body>
</html>