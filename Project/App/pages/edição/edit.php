<?php include __DIR__ . '/../../config/api.php'; 

$id = $_GET['id'];
$project = callAPI("GET", "http://api:8000/api/v1/projects/list_by_id/$id");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "status" => $_POST['status']
    ];
    callAPI("PUT", "http://api:8000/api/v1/projects/update/$id", $data);
    header("Location: ../listagem/list_all.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/criação_edição/create_edit.css">
    
</head>
<body>
    <div class="header">
        <h1>Editar Projeto</h1>
    </div>
    <div class="container_form">
        <form method="post">
            <label for="name">Nome do Projeto:</label>
            <input name="name" id="name" value="<?= $project['name'] ?>" required>

            <label for="description">Descrição:</label>
            <input name="description" id="description" value="<?= $project['description'] ?>" required>

            <div class="status-group">
                <label>Status:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" id="ativo" name="status" value="ativo" <?= $project['status'] === 'ativo' ? 'checked' : '' ?>> Ativo
                    </label>
                    <label>
                        <input type="radio" id="pausado" name="status" value="pausado" <?= $project['status'] === 'pausado' ? 'checked' : '' ?>> Pausado
                    </label>
                    <label>
                        <input type="radio" id="finalizado" name="status" value="finalizado" <?= $project['status'] === 'finalizado' ? 'checked' : '' ?>> Finalizado
                    </label>
                </div>
            </div>
            <div>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
