<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
</head>
<body>
  <form action="recebe-exemplo.php" style="display: flex; flex-direction: column" method="post">
    <tr>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" style="width: 25%; margin: 2px">
    </tr>

    <tr>
      <label for="idade">Idade:</label>
      <input type="number" name="idade" style="width: 25%; margin: 2px">
    </tr>

    <tr>
      <label for="cidade">Cidade onde mora:</label>
      <input type="text" name="cidade" style="width: 25%; margin: 2px">
    </tr>

    <tr>
      <label for="estado">Estados que visitou:</label>
      <select name="USR_UF" id="" style="width: 25%; margin: 2px">
        <option value="Acre">Acre</option>
        <option value="Alagoas">Alagoas</option>
        <option value="Amazonas">Amapá</option>
        <option value="Amapá">Amapá</option>
        <option value="Bahia">Bahia</option>
        <option value="Ceará">Ceará</option>
        <option value="Distrito Federal">Distrito Federal</option>
        <option value="Espírito Santo">Espírito Santo</option>
        <option value="Goiás">Goiás</option>
        <option value="Maranhão">Maranhão</option>
      </select>
    </tr>

    <tr>
      <input type="submit" value="Enviar" style="width: 5%; margin: 4px">
    </tr>
  </form>
</body>
</html>