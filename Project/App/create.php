<?php include 'api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "status" => $_POST['status']
    ];
    callAPI("POST", "http://localhost:8000/projects", $data);
    header("Location: index.php");
    exit;
}
?>

<h1>Novo Projeto</h1>
<form method="post">
    Nome: <input name="name"><br>
    Descrição: <textarea name="description"></textarea><br>
    Status: 
    <select name="status">
        <option value="ativo">Ativo</option>
        <option value="pausado">Pausado</option>
        <option value="finalizado">Finalizado</option>
    </select><br>
    <button type="submit">Salvar</button>
</form>
