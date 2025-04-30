<?php include 'api.php';

$id = $_GET['id'];
callAPI("DELETE", "http://localhost:8000/projects/$id");
header("Location: index.php");
exit;
