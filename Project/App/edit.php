<?php include 'api.php';

$id = $_GET['id'];
$project = callAPI("GET", "http://localhost:8000/projects/$id");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "status" => $_POST['status']
    ];
    callAPI("PUT", "http://localhost:8000/projects/$id", $data);
    header("Location: index.php");
    exit;
}
?>

<h1>Editar Projeto</h1>
<form method="post">
    Nome: <input name="name" value="<?= $project['name'] ?>"><br>
    Descrição: <textarea name="description"><?= $project['description'] ?></textarea><br>
    Status: 
    <select name="status">
        <option value="ativo" <?= $project['status'] == 'ativo' ? 'selected' : '' ?>>Ativo</option>
        <option value="pausado" <?= $project['status'] == 'pausado' ? 'selected' : '' ?>>Pausado</option>
        <option value="finalizado" <?= $project['status'] == 'finalizado' ? 'selected' : '' ?>>Finalizado</option>
    </select><br>
    <button type="submit">Salvar</button>
</form>
