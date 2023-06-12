<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <title>🅑🅤🅢🅘🅝🅔🅢🅢</title>
</head>

<body class="listar">
  <h1>𝓕𝓲𝓷𝓪𝓷𝓬̧𝓪𝓼 𝓹𝓮𝓼𝓼𝓸𝓪𝓲𝓼</h1>

  <?php
  $stmt = $pdo->query('SELECT * FROM financas ORDER BY data');
  $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($registros) == 0) {
    echo '<p>Nenhum registro cadastrado.</p>';
  } else {
    echo '<table border="1">';
    echo '<thead><tr><th>descrição</th><th>valor</th><th>data</th><th>categoria</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($registros as $registro) {
      echo '<tr>';
      echo '<td>' . $registro['descricao'] . '</td>';
      echo '<td>' . $registro['valor'] . '</td>';
      echo '<td>' . date('d/m/Y', strtotime($registro['data'])) . '</td>';
      echo '<td>' . $registro['categoria'] . '</td>';
      echo '<td><a style="color:white;" href="atualizar.php?id=' . $registro['id'] . '">Atualizar</a></td>';
      echo '<td><a style="color:white;" href="deletar.php?id=' . $registro['id'] . '">Deletar</a></td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
  }
  ?>
</body>

</html>