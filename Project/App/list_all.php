<?php include 'api.php';
$projects = callAPI("GET", "http://localhost:8000/projects");
?>

<h1>Projetos</h1>
<a href="create.php">Criar novo projeto</a>
<table border="1">
    <tr><th>ID</th><th>Nome</th><th>Status</th><th>Ações</th></tr>
    <?php foreach ($projects as $project): ?>
        <tr>
            <td><?= $project['id'] ?></td>
            <td><?= $project['name'] ?></td>
            <td><?= $project['status'] ?></td>
            <td>
                <a href="details.php?id=<?= $project['id'] ?>">Ver</a> |
                <a href="edit.php?id=<?= $project['id'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $project['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

