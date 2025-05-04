<?php include 'index.php';

$id = $_GET['id'];
$project = callAPI("GET", "http://localhost:8000/projects/$id");
?>

<h1>Detalhes do Projeto</h1>
<p><strong>ID:</strong> <?= $project['id'] ?></p>
<p><strong>Nome:</strong> <?= $project['name'] ?></p>
<p><strong>Status:</strong> <?= $project['status'] ?></p>
<p><strong>Descrição:</strong> <?= $project['description'] ?></p>
<p><strong>Criado em:</strong> <?= $project['created_at'] ?></p>
<a href="list_all.php">Voltar</a>
