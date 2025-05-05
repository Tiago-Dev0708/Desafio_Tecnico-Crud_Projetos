<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/geral/styles.css">
    <link rel="stylesheet" href="../../assets/css/listagem/list_all.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Lista de Projetos</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php include __DIR__ . '/../../config/api.php';

                $projects = callAPI("GET", "http://api:8000/projects/list_all");
                foreach ($projects as $project): ?>
                    <tr>
                        <td><?= $project['id'] ?></td>
                        <td><?= $project['name'] ?></td>
                        <td><?= $project['status'] ?></td>
                        <td>
                            <div class="action-menu">
                                <button class="menu-btn">&#8942;</button>
                                <div class="dropdown">
                                    <a href="/pages/listagem_por_id/list_by_id.php?id=<?= $project['id'] ?>">Ver</a>
                                    <a href="/pages/edição/edit.php?id=<?= $project['id'] ?>">Editar</a>
                                    <a href="/pages/deleção/delete.php?id=<?= $project['id'] ?>" onclick="return confirmDelete()">Excluir</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/pages/criação/create.php" class="button-new-project">Criar novo projeto</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/utils/popup.js"></script>
    <script src="../../assets/utils/menu.js"></script>
</body>
</html>
<?php
