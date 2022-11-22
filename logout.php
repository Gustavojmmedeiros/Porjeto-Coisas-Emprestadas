<?php 

  session_start();

  //Apaga da memória os valores da sessão para sair da conta
  unset($_SESSION['id']);
  unset($_SESSION['nome']);

  header("Location: index.php");
  
?>