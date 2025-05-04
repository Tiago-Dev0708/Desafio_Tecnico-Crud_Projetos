<?php include 'index.php';

$id = $_GET['id'];
callAPI("DELETE", "http://localhost:8000/projects/$id");
header("Location: list_all.php");
exit;
