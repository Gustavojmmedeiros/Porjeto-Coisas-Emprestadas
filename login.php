<?php

  $login = $_POST['email'];
  $senha = $_POST['senha'];

  include "includes/conecta.php";

  $sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";

  $res = mysqli_query($conn, $sql);

  $num_registros = mysqli_num_rows($res);

  if ($num_registros > 0) {

    //Inicia sessão do usuário
    session_start();
    
    $row = mysqli_fetch_assoc($res);

    //Armazena informações do usuário na sessão para serem mais facilmente acessadas
    $_SESSION['id'] = $row['id'];
    $_SESSION['nome'] = $row['nome'];


    header("Location: perfil-usuario.php");

  } else {
    header("Location: index.php?erro=1");
  }
?>