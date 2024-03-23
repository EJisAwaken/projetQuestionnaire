<?php
session_start();
require_once("connection.php");
if(isset($_GET['numEtudiant']) && !empty($_GET['numEtudiant'])){
    // On nettoie l'id envoyé
     $_SESSION["num"]= strip_tags($_GET['numEtudiant']);
     var_dump($_SESSION["num"]);

        $sql = "DELETE FROM etudiant WHERE numEtudiant = :numEtudiant";

        // Préparation de la requête
        $query = $conn->prepare($sql);

        // On accroche le paramètre numEtudiant
        $query->bindValue(':numEtudiant', $_SESSION["num"], PDO::PARAM_INT);

        // Exécution
        $query->execute();

        $etudiant = $query->fetch();
        echo '<script>  alert("Etudiant supprimé") </script>';


        if (!$etudiant){
            header('Location: admin.php');
        }
    }