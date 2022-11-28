<?php

  include "includes/inicio.php";
  include "includes/conecta.php";

  $id = "";
  $nome = "";
  $telefone = "";
  $email = "";
  $senha = "";

  //Verifica se foi enviado 'id' via get
  if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id = $id";

    //Envia a consulta para obter dados do usuário
    $res = mysqli_query($conn, $sql);
    
    //Armazena estes dados
    $row = mysqli_fetch_assoc($res);

    $id = $row['id'];
    $nome = $row['nome'];
    $telefone = $row['telefone'];
    $email = $row['email'];
    $senha = $row['senha'];

    if ($_SESSION['id'] != $id) {

      header("Location: lista-usuarios.php?erro=2");
    }
  }

?>

  <main class="container flex flex--centro flex--coluna">
    <div class="cadastro-cabecalho">
      <h1 class="cadastro-cabecalho__titulo">Projeto Coisas Emprestadas</h1>
    </div>
    
    <section class="cartao">
      <h2 class="cartao__titulo">Editar Perfil</h2>

      <a href="perfil-usuario.php" class="link-estatico">Voltar</a>

      <form action="recebe-usuario.php" class="formulario" method="POST">
        <fieldset>

          <input type="hidden" name="id" value="<?php echo $id?>">
          
          <legend class="formulario__legenda">Atualize seus dados</legend>

          <div class="input-container">
            <input class="input" type="text" name="nome" placeholder="Nome" value="<?php echo $nome ?>">
            <label class="input-label" for="nome">Nome</label>
          </div>

          <div class="input-container">
            <input class="input" type="tel" name="telefone" placeholder="Telefone" value="<?php echo $telefone?>">
            <label class="input-label" for="telefone">Telefone</label>
          </div>

          <div class="input-container">
            <input class="input" type="email" name="email" placeholder="E-mail" value="<?php echo $email ?>">
            <label class="input-label" for="email">E-mail</label>
          </div>

          <div class="input-container">
            <input class="input" type="password" name="senha" placeholder="Senha" value="<?php echo $senha?>">
            <label class="input-label" for="senha">Senha</label>
          </div>
        </fieldset>

        <input type="submit" class="botao" value="Salvar">

      </form>
    </section>
  </main>
</body>
</html>