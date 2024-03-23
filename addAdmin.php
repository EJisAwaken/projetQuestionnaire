<?php
session_start();
require_once "connection.php";

if (isset($_POST["ajout"])){
    $question = $_POST['question'];
    $reponse1 = $_POST['reponse1'];
    $reponse2 = $_POST['reponse2'];
    $reponse3 = $_POST['reponse3'];
    $reponse4 = $_POST['reponse4'];
    $correcte = $_POST['reponse_correcte'];
    $niveau = $_POST['niveau'];
    $sql = "INSERT INTO qcm (question, reponse1, reponse2, reponse3, reponse4, reponse_correcte, niveau) VALUES (:question, :reponse1, :reponse2, :reponse3, :reponse4, :correcte, :niveau)";
    $req = $conn->prepare($sql);
    $req->bindParam(':question', $question);
    $req->bindParam(':reponse1', $reponse1);
    $req->bindParam(':reponse2', $reponse2);
    $req->bindParam(':reponse3', $reponse3);
    $req->bindParam(':reponse4', $reponse4);
    $req->bindParam(':correcte', $correcte);
    $req->bindParam(':niveau', $niveau);
    $req->execute();

    $_SESSION["add"] = "Une nouvelle question à été ajoutée";
    header("Location:questionAdmin.php");
}


