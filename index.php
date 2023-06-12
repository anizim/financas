<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="style.css">

  <title>🅑🅤🅢🅘🅝🅔🅢🅢</title>
</head>

<body>

  <div class="container-formulario">
    <h1>𝓕𝓲𝓷𝓪𝓷𝓬̧𝓪𝓼 𝓹𝓮𝓼𝓼𝓸𝓪𝓲𝓼</h1>
    <?php
    if (isset($_POST['submit'])) {
      $descricao = $_POST['descricao'];
      $valor = $_POST['valor'];
      $data = $_POST['data'];
      $categoria = $_POST['categoria'];

        $stmt = $pdo->prepare('INSERT INTO financas (descricao, valor, data, categoria) VALUES(:descricao, :valor, :data,:categoria)');
        $stmt->execute(['descricao' => $descricao, 'valor' => $valor, 'data' => $data,'categoria' => $categoria]);

        if ($stmt->rowCount()) {
          echo '<span>Registro cadastrado com sucesso!</span>';
        } else {
          echo '<span>Erro ao cadastrar registro. Tente novamente mais tarde.</span>';
        }
      }

      if (isset($error)) {
        echo '<span>' . $error . '</span>';
      }
    


    ?>

    <form method="post">

      <label for="descricao">descrição:</label>
      <input type="text" name="descricao" required><br>

      <label for="valor">valor:</label>
      <input type="text" name="valor" required><br>

      <label for=" data">Data:</label>
      <input type="date" name="data" required><br>

      <label for="categoria"> categoria :</label>

<select name="categoria" id="categoria">
  <option value="alimentacao">alimentação</option>
  <option value="casa">casa</option>
  <option value="saude">saude</option>
  <option value="lazer">lazer</option>
</select>
    

      <div>
        <button type="submit" name="submit" value="cadastrar">cadastrar</button>
        <button><a href="listar.php">Listar</a></button>
      </div>

    </form>
  </div>

</body>

</html>