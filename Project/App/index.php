<?php
function callAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "GET":
        case "DELETE":
            if ($data) $url = sprintf("%s?%s", $url, http_build_query($data));
            
            break;
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Projetos</title>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Projetos</h1>
        <a href="create.php" class="button-new-project">Criar novo projeto</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $projects = callAPI("GET", "http://localhost:8000/projects/list_all");
                foreach ($projects as $project): ?>
                    <tr>
                        <td><?= $project['id'] ?></td>
                        <td><?= $project['name'] ?></td>
                        <td><?= $project['status'] ?></td>
                        <td>
                            <a href="details.php?id=<?= $project['id'] ?>" class="button-info btn-sm">Ver</a>
                            <a href="edit.php?id=<?= $project['id'] ?>" class="button-edit btn-sm">Editar</a>
                            <a href="delete.php?id=<?= $project['id'] ?>" class="button-delete btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>
<?php
// End of file index.php