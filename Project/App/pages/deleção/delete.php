<?php include __DIR__ . '/../../config/api.php';

$id = $_GET['id'];
callAPI("DELETE", "http://api:8000/api/v1/projects/delete/$id");
header("Location: ../listagem/list_all.php");
exit;

