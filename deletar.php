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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $pdo->prepare('DELETE FROM financas WHERE id = ?');
  $stmt->execute([$id]);

  header('Location: listar.php');
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Deletar registro</title>
</head>

<body>
  <h1>Deletar registro</h1>

  <p>Tem certeza que deseja deletar o registro de <?php echo $appointment['descricao']; ?> em <?php echo date('d/m/Y', strtotime($appointment['data'])); ?></p>

  <form method="post">
    <button type="submit">Sim</button>
    <a href="listar.php">Não</a>
  </form>
</body>

</html>