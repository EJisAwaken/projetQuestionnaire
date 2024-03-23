<?php
// Connexion à la base de données (à remplacer par vos informations)
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "gestionQuestionnaire";



try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(3,2);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
