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

      <a href="logout.php" class="link-estatico">Sair</a>

      <nav>
        <ul class="lista">
          <li class="itens-lista">
            <a href="config-usuario.php?id=<?php echo $_SESSION['id']?>" class="link-lista">Configurações de conta</a>
          </li>
          <li class="itens-lista">
            <a href="lista-itens.php" class="link-lista">Lista de itens</a>
          </li>
          <li class="itens-lista">
            <a href="lista-usuarios.php" class="link-lista">Lista de contatos</a>
          </li>
        </ul>
      </nav>

    </section>
  </main>
</body>
</html>