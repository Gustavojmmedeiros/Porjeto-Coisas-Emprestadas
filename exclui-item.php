<?php

  include "includes/conecta.php";

  $id_item = $_GET['id_item'];  

  $sql = "DELETE FROM itens WHERE id_item = $id_item";

  $res = mysqli_query($conn, $sql);

  header("Location: lista-itens.php");
?>