<?php
include __DIR__ . '/../../config/api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "status" => $_POST['status']
    ];

    $response = callAPI("POST", "http://api:8000/projects/create", $data);
    if ($response && isset($response['id'])) {
        header("Location: ../listagem/list_all.php?success=Projeto criado com sucesso");
    } else {
        header("Location: ../listagem/list_all.php?error=Erro ao criar o projeto");
    }
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
        <h1>Criar Projeto</h1>
    </div>
    <div class="container_form">
        <form method="post">
            <label for="name">Nome do Projeto:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Descrição:</label>
            <input type="text" id="description" name="description" required>

            <div class="status-group">
                <label>Status:</label>
                <div class="radio-group">
                    <label><input type="radio" id="ativo" name="status" value="ativo" checked> Ativo</label>
                    <label><input type="radio" id="pausado" name="status" value="pausado"> Pausado</label>
                    <label><input type="radio" id="finalizado" name="status" value="finalizado"> Finalizado</label>
                </div>
            </div>

            <div>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>







