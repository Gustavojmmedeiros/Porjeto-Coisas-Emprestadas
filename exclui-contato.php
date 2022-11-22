<?php

  include "includes/conecta.php";

  $id = $_GET['id'];  

  $sql = "DELETE FROM usuarios WHERE id = $id";

  $res = mysqli_query($conn, $sql);

  header("Location: lista-usuarios.php");
?>


