<?php
  
  //Reinicia a sessão
  session_start();
  

  //Verifica se não tem um sessão autenticada
  if (!isset($_SESSION['id'])) {

    header("Location: index.php?autentica=1");
  }

?> 