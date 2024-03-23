<?php
require_once("connection.php");
if(isset($_GET['numQuestionnaire'])){
    // On nettoie l'id envoyé
    $numQuestion = strip_tags($_GET['numQuestionnaire']);

    $sql = "DELETE FROM qcm WHERE numQuestion = :numQuestion";

    // Préparation de la requête
    $query = $conn->prepare($sql);

    // On accroche le paramètre numEtudiant
    $query->bindValue(':numQuestion', $numQuestion, PDO::PARAM_INT);

    // Exécution
    $query->execute();

    $etudiant = $query->fetch();

    if (!$etudiant){
        header('Location: questionAdmin.php');
    }
}
else{
    header('Location: index.php');
}