<?php
require_once 'connection.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM qcm WHERE numQuestion = :id';
$query = $conn->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();

$data = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
