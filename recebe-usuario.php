<?php

  include "includes/conecta.php";

  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  if (empty($id)) {
    //Monta o código SQL para inserir os dados do formulário no MySQL
    $sql = "INSERT INTO usuarios (nome, telefone, email, senha) 
              VALUES 
              ('$nome', '$telefone', '$email', '$senha')";

    
    //Envia os dados SQL para o MySQL
    $res = mysqli_query($conn, $sql);
  
    //Checa inserção com sucesso
    if ($res) {
      //Redireciona usuário para listagem
      header("Location: lista-usuarios.php");
    } else {
      echo "Erro ao inserir!";
    }
    
  } else {
    $sql = "UPDATE usuarios SET
                    nome = '$nome',
                    telefone = '$telefone',
                    email = '$email',
                    senha = '$senha'
            WHERE 
                    id = '$id'";


    //Envia os dados SQL para o MySQL
    $res = mysqli_query($conn, $sql);
  
    //Checa atualização com sucesso
    if($res) {
      //Redireciona usuário para listagem
      header("Location: lista-usuarios.php");
    } else {
      echo "Erro ao atualizar!";
    }
  }
    
?>