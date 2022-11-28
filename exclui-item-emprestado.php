<?php

  include "includes/conecta.php";

  $item_id = $_GET['item_id'];

  $sql = "DELETE FROM emprestados WHERE item_id = $item_id";

  $res = mysqli_query($conn, $sql);

  header("Location: lista-itens.php");

?>