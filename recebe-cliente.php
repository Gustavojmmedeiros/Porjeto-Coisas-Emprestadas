<?php

  $conn = mysqli_connect("localhost", "root", "Pssdbrk88!", "atp");

  if ($conn == false) {
    die("ERRO: Não foi possível conectar com o MySQL." . mysqli_connect_error());
  } 

  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  //Monta o código SQL para inserir os dados do formulário no MySQL
  $sql = "INSERT INTO usuarios (nome, telefone, email, senha) 
            VALUES 
            ('$nome', '$telefone', '$email', '$senha')";
  
  //Envia os dados SQL para o MySQL
  $res = mysqli_query($conn, $sql);

  //Checa inserção com sucesso
  if($res) {
    //Redireciona usuário para listagem
    header("Location: usuario.php");
  } else {
    echo "Não realizado";
  }
  

  /*
  echo "Nome: " . $_POST["nome"] . "<br>";
  echo "Telefone: " . $_POST["telefone"] . "<br>";
  echo "E-mail: " . $_POST["email"] . "<br>";
  echo "Senha: " . $_POST["senha"];
  */
?>