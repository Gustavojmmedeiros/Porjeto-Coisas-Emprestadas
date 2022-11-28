<?php

  include "includes/conecta.php";

  $id_item = $_GET['id_item'];  

  //É preciso colocar que só pode excluir se o item for da própria pessoa
  $sql = "DELETE FROM itens WHERE id_item = $id_item";

  $res = mysqli_query($conn, $sql);

  header("Location: lista-itens.php");
  
?>