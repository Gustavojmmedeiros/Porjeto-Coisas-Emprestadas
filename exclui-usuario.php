<?php

  include "includes/conecta.php";
  session_start();

  $id = $_GET['id'];  

  if ($id == $_SESSION['id']) {

    
    $sql = "DELETE FROM usuarios WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    echo "Conta excluída com sucesso!";

    header("Location: index.php");
  } else {

    header("Location: lista-usuarios.php?erro=1");
  }
  
?>


