<?php

  include "includes/conecta.php";
  session_start();

  //TO-DO: retirar item de emprestados quando alguem solicitar

  $id_emprestimo = $_POST['id_emprestimo'];
  $emprestador_id = $_POST['emprestador_id'];
  $item_id = $_POST['item_id'];
  $pechador_id = $_POST['pechador_id'];
  $item_disponivel = $_POST['item_disponivel'];

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
    $item_disponivel = $row['disponivel'];


    if ($res1) {

      $pechador_id = $_POST['pechador_id'];

      $sql2 = "SELECT nome, telefone, email FROM usuarios WHERE id = $pechador_id";

      $res2 = mysqli_query($conn, $sql2);

      $row2 = mysqli_fetch_assoc($res2);

      $pechador_nome = $row2['nome'];
      $pechador_telefone = $row2['telefone'];
      $pechador_email = $row2['email'];   

    }
  }

  if (empty($id_emprestimo)) {

    $sql3 = "INSERT INTO emprestados (emprestador_id, emprestador_nome, emprestador_telefone,emprestador_email, item_id, item_nome, item_disponivel, pechador_id, pechador_nome, pechador_telefone, pechador_email)
            VALUES 
            ('$emprestador_id', '$emprestador_nome', '$emprestador_telefone', '$emprestador_email', '$item_id', '$item_nome', '$item_disponivel', '$pechador_id', '$pechador_nome', '$pechador_telefone', '$pechador_email')";
    
    $res3 = mysqli_query($conn, $sql3);

    if ($res3) {

      header("Location: empresta.php");
      echo "Item solicitado com sucesso!";

      // $sql4 = ;

    } else {

      echo "Erro ao solicitar item!";
    }

    // $sql4 = "INSERT INTO itens (id_item, nome_item, usuario_id)
    //         VALUES ('$item_id', '$item_nome', '$emprestador_id') 
    //         WHERE pechador_id = $id";
    

  } else {

    $sql3 = "UPDATE emprestados SET 
                    emprestador_id = '$emprestador_id',
                    emprestador_nome = '$emprestador_nome',
                    emprestador_telefone = '$emprestador_telefone',
                    emprestador_email = '$emprestador_email',
                    item_id = '$item_id',
                    item_nome = '$item_nome',
                    item_disponivel = '$item_disponivel',
                    pechador_id = '$pechador_id',
                    pechador_nome = '$pechador_nome',
                    pechador_telefone = '$pechador_telefone',
                    pechador_email = '$pechador_email'
            WHERE 
                    id_emprestimo = '$id_emprestimo'";

    $res3 = mysqli_query($conn, $sql3);

    if ($res3) {

      header("Location: empresta.php");
      echo "Item solicitado novamente com sucesso!";

    } else {

      echo "Erro atualizar empréstimo de item!";
    }
  }

?>