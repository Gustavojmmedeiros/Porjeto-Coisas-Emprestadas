<?php

  include "includes/conecta.php";

  $id = $_GET['id'];  

  //É preciso colocar que só pode apagar se o contato for da própria pessoa
  $sql = "DELETE FROM usuarios WHERE id = $id";

  $res = mysqli_query($conn, $sql);

  header("Location: lista-usuarios.php");
?>


