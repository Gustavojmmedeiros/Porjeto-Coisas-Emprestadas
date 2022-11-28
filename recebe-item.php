<?php

  include "includes/conecta.php";

  $id_item = $_POST['id_item'];
  $nome_item = $_POST['nome_item'];
  $quantidade = $_POST['quantidade'];
  $data_inicio = $_POST['data_inicio'];
  $data_limite = $_POST['data_limite'];
  $descricao = $_POST['descricao'];
  $disponivel = $_POST['disponivel'];
  $usuario_id = $_POST['usuario_id'];

  if (empty($id_item)) {
    //Monta o código SQL para inserir os dados do formulário no MySQL
    $sql = "INSERT INTO itens (nome_item, quantidade, data_inicio,  data_limite, descricao, disponivel, usuario_id) 
            VALUES 
            ('$nome_item', '$quantidade', '$data_inicio', '$data_limite', '$descricao', '$disponivel', '$usuario_id')";

    //Envia os dados SQL para o MySQL
    $res = mysqli_query($conn, $sql);

    //Checa inserção com sucesso
    if ($res) {

      //Redireciona usuário para listagem
      header("Location: lista-itens.php");
    } else {

      echo "Erro ao adicionar item";
    }

  } else {

    $sql = "UPDATE itens 
            SET nome_item = '$nome_item', quantidade = '$quantidade', 
                data_inicio = '$data_inicio', data_limite = '$data_limite', 
                descricao = '$descricao', disponivel = '$disponivel', 
                usuario_id = '$usuario_id'
            WHERE id_item = '$id_item'";

    //Envia os dados SQL para o MySQL
    $res = mysqli_query($conn, $sql);

    //Checa atualização com sucesso
    if ($res){

      //Redireciona usuário para listagem
      header("Location: lista-itens.php");

    } else {
      
      echo "Erro ao atualizar dados!";
    }
  }

?>