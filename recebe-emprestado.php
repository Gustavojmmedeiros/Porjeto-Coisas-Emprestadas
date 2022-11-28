<?php

  include "includes/conecta.php";
  session_start();


  $id_emprestimo = $_POST['id_emprestimo'];
  $emprestador_id = $_POST['emprestador_id'];
  $item_id = $_POST['item_id'];
  $pechador_id = $_POST['pechador_id'];
  $disponivel = $_POST['disponivel'];

  $sql = "SELECT nome, telefone, email FROM usuarios WHERE id = $emprestador_id";

  $res = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($res);

  $emprestador_nome = $row['nome'];
  $emprestador_telefone = $row['telefone'];
  $emprestador_email = $row['email'];

  if ($res) {

    $sql1 = "SELECT nome_item, disponivel FROM itens WHERE id_item = $item_id";

    $res1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_fetch_assoc($res1);

    $item_nome = $row1['nome_item']; 
    $disponivel = $row1['disponivel'];


    if ($res1) {

      $pechador_id = $_POST['pechador_id'];

      $sql2 = "SELECT nome, telefone, email FROM usuarios WHERE id = $pechador_id";

      $res2 = mysqli_query($conn, $sql2);

      $row2 = mysqli_fetch_assoc($res2);

      $pechador_nome = $row2['nome'];
      $pechador_telefone = $row2['telefone'];
      $pechador_email = $row2['email'];   

      //Troca de 'D' para 'I'
      if ($res2) {

        $sql3 = "UPDATE itens SET disponivel = 'I' WHERE id_item = $item_id";

        $res3 = mysqli_query($conn, $sql3);

        $sql4 = "DELETE FROM itens WHERE id_item = $item_id AND disponivel = 'I'";

        $res4 = mysqli_query($conn, $sql4);

      }
    }
  }

  if (empty($id_emprestimo)) {

    $sql5 = "INSERT INTO emprestados (emprestador_id, emprestador_nome, emprestador_telefone,emprestador_email, item_id, item_nome, disponivel, pechador_id, pechador_nome, pechador_telefone, pechador_email)
            VALUES 
            ('$emprestador_id', '$emprestador_nome', '$emprestador_telefone', '$emprestador_email', '$item_id', '$item_nome', '$disponivel', '$pechador_id', '$pechador_nome', '$pechador_telefone', '$pechador_email')";
    
    $res5 = mysqli_query($conn, $sql5);

    if ($res5) {

      header("Location: empresta.php");

      echo "Item solicitado com sucesso!";

    } else {

      echo "Erro ao solicitar item!";
    }


  } else {

    $sql5 = "UPDATE emprestados SET 
                    emprestador_id = '$emprestador_id',
                    emprestador_nome = '$emprestador_nome',
                    emprestador_telefone = '$emprestador_telefone',
                    emprestador_email = '$emprestador_email',
                    item_id = '$item_id',
                    item_nome = '$item_nome',
                    disponivel = '$disponivel',
                    pechador_id = '$pechador_id',
                    pechador_nome = '$pechador_nome',
                    pechador_telefone = '$pechador_telefone',
                    pechador_email = '$pechador_email'
            WHERE 
                    id_emprestimo = '$id_emprestimo'";

    $res3 = mysqli_query($conn, $sql5);

    if ($res5) {

      header("Location: empresta.php");
      echo "Item solicitado novamente com sucesso!";

    } else {

      echo "Erro atualizar empréstimo de item!";
    }
  }

?>