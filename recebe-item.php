<?php

  include "includes/conecta.php";

  $id_item = $_POST['id_item'];
  $nome_item = $_POST['nome_item'];
  $quantidade = $_POST['quantidade'];
  $data_inicio = $_POST['data_inicio'];
  $data_limite = $_POST['data_limite'];
  $descricao = $_POST['descricao'];

  if (empty($id_item)) {
    $sql = "INSERT INTO itens (nome_item, quantidade, data_inicio,  data_limite, descricao) 
    VALUES 
    ('$nome_item', '$quantidade', '$data_inicio', '$data_limite', '$descricao')";

    $res = mysqli_query($conn, $sql);

    if ($res) {
      header("Location: lista-itens.php");
    } else {
      echo "Erro ao adicionar item";
    }

  } else {
    $sql = "UPDATE itens SET
                    nome_item = '$nome_item',
                    quantidade = '$quantidade',
                    data_inicio = '$data_inicio',
                    data_limite = '$data_limite',
                    descricao = '$descricao'
            WHERE
                    id_item = '$id_item'";

    $res = mysqli_query($conn, $sql);

    if ($res){
      header("Location: lista-itens.php");
    } else {
      echo "Erro ao atualizar dados";
    }
  }

?>