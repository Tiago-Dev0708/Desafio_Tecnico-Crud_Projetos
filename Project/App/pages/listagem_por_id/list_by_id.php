<?php include __DIR__ . '/../../config/api.php';

$id = $_GET['id'];
$project = callAPI("GET", "http://api:8000/projects/list_by_id/$id");

function formatDateTime($isoDateTime) {
    $date = new DateTime($isoDateTime); //função para formatação de data para formato br e mostrando somente as horas e minutos
    return $date->format('d/m/Y H:i');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/listagem_por_id/list_by_id.css"> 
    <title>Detalhes do Projeto</title>
</head>
<body>
    <div class="container_details">
        <div class="header">
            <h1>Detalhes do Projeto</h1>
        </div>
        <div class="detaiils">
            <p><strong>ID:</strong> <?= $project['id'] ?></p>
            <p><strong>Nome:</strong> <?= $project['name'] ?></p>
            <p><strong>Status:</strong> <?= $project['status'] ?></p>
            <p><strong>Descrição:</strong> <?= $project['description'] ?></p>
            <p><strong>Criado em:</strong> <?= formatDateTime($project['created_at']) ?></p>
            <a href="../listagem/list_all.php">Voltar</a>
        </div>
    </div>
</body>
</html>
