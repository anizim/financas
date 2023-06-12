<?php
include 'db.php';

if (!isset($_GET['id'])) {
  header('Location: listar.php');
  exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM financas WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
  header('Location: listar.php');
  exit;
}

$descricao = $appointment['descricao'];
      $valor =$appointment ['valor'];
      $data = $appointment['data'];
      $categoria = $appointment['categoria'];

?>

<!DOCTYPE html>
<html>

<head>
  <title>Atualizar Compromisso</title>
</head>

<body>
  <h1>Atualizar Compromisso</h1>

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
        <button type="submit" name="submit" value="atualizar">Atualizar</button>
        <button><a href="listar.php">Listar</a></button>
      </div>

    </form>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $descricao = $_POST['descricao'];
  $valor = $_POST['valor'];
  $data = $_POST['data'];
  $categoria = $_POST['categoria'];

  // validação dos dados do formulário aqui

  $stmt = $pdo->prepare('UPDATE financas SET descricao = ?, valor= ?, data = ?, categoria = ? WHERE id = ?');
  $stmt->execute([$descricao, $valor, $data, $categoria, $id]);

  header('Location: listar.php');
  exit;
}

?>