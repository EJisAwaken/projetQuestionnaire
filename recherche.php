<?php

require_once "connection.php";

if (isset($_POST['recherche'])){

    $sql = 'SELECT * FROM etudiant where numEtudiant = :nomEtudiant';

    $query = $conn->prepare($sql);

    $query->execute(
        array(
            ':nomEtudiant' => $_POST['recherche']
        )
    );

    $res = $query->fetchAll();


    header("Location:s.php?result=".$res);

}else{
    header("Location:admin.php");
}

