<?php

  $conn = mysqli_connect("localhost", "root", "Pssdbrk88!", "atp");

  if ($conn == false) {
    die("ERRO: Não foi possível conectar com o MySQL." . mysqli_connect_error());
  } 

?>