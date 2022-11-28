<?php

  include "includes/conecta.php";
  session_start();

  $id_emprestimo = $_POST['id_emprestimo'];
  $emprestador_id = $_POST['emprestador_id'];
  $item_id = $_POST['item_id'];
  $pechador_id = $_POST['pechador_id'];
  $disponivel = $_POST['disponivel'];


  $sql = "SELECT nome, telefone, email FROM usuarios WHERE id = $emprestador_id";
  // $sql = "SELECT nome, telefone, email FROM usuarios INNER JOIN itens WHERE id = $emprestador_id AND usuario_id = $emprestador_id";

  $res = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($res);

  $emprestador_nome = $row['nome'];
  $emprestador_telefone = $row['telefone'];
  $emprestador_email = $row['email'];

  //Checa inserção com sucesso
  if ($res) {
    //Monta o código SQL para inserir os dados do formulário no MySQL
    $sql1 = "SELECT nome_item, disponivel, usuario_id FROM itens WHERE id_item = $item_id";

    $res1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_fetch_assoc($res1);

    $item_nome = $row1['nome_item']; 
    $disponivel = $row1['disponivel'];

    //Checa inserção com sucesso
    if ($res1) {

      $pechador_id = $_POST['pechador_id'];

      //Monta o código SQL para inserir os dados do formulário no MySQL
      $sql2 = "SELECT nome, telefone, email FROM usuarios WHERE id = $pechador_id";

      $res2 = mysqli_query($conn, $sql2);

      $row2 = mysqli_fetch_assoc($res2);

      $pechador_nome = $row2['nome'];
      $pechador_telefone = $row2['telefone'];
      $pechador_email = $row2['email'];   

      //Checa inserção com sucesso
      if ($res2) {

        //Monta o código SQL para atualizar dados disponivel do formulário no MySQL
        $sql3 = "UPDATE itens SET disponivel = 'I' WHERE id_item = $item_id";

        $res3 = mysqli_query($conn, $sql3);

        //Monta o código SQL para excluir dados do formulário no MySQL
        $sql4 = "DELETE FROM itens WHERE id_item = $item_id AND disponivel = 'I'";

        $res4 = mysqli_query($conn, $sql4);

      }
    }
  }

  if (empty($id_emprestimo)) {
    //Monta o código SQL para inserir os dados do formulário no MySQL
    $sql5 = "INSERT INTO emprestados (emprestador_id, emprestador_nome, emprestador_telefone,emprestador_email, item_id, item_nome, disponivel, pechador_id, pechador_nome, pechador_telefone, pechador_email)
            VALUES 
            ('$emprestador_id', '$emprestador_nome', '$emprestador_telefone', '$emprestador_email', '$item_id', '$item_nome', '$disponivel', '$pechador_id', '$pechador_nome', '$pechador_telefone', '$pechador_email')";
    
    //Envia os dados SQL para o MySQL
    $res5 = mysqli_query($conn, $sql5);

    //Checa inserção com sucesso
    if ($res5) {

      //Redireciona usuário para página de empréstimo
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

    //Envia os dados SQL para o MySQL
    $res3 = mysqli_query($conn, $sql5);

    //Checa atualização com sucesso
    if ($res5) {

      //Redireciona usuário para página de empréstimo
      header("Location: empresta.php");
      
      echo "Item solicitado novamente com sucesso!";

    } else {

      echo "Erro atualizar empréstimo de item!";
    }
  }

?>