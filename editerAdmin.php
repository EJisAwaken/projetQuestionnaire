<?php
session_start();
require_once("connection.php");

// Constantes pour les messages
define('MSG_ERREUR', 'erreur');
define('MSG_SUCCES', 'message');

if ($_POST){

    // On nettoie les données envoyées
    $question = $_POST['question'];
    $reponse1 = $_POST['reponse1'];
    $reponse2 = $_POST['reponse2'];
    $reponse3 = $_POST['reponse3'];
    $reponse4 = $_POST['reponse4'];
    $correcte = $_POST['reponse_correcte'];
    $niveau = $_POST['niveau'];

    $sql = "UPDATE qcm SET question=:question, reponse1=:reponse1, reponse2=:reponse2, reponse3=:reponse3, reponse4=:reponse4, reponse_correcte=:correcte, niveau=:niveau WHERE numQuestion=:numQuestion";

    $query = $conn->prepare($sql);

    $query->bindParam(':question', $question);
    $query->bindParam(':reponse1', $reponse1);
    $query->bindParam(':reponse2', $reponse2);
    $query->bindParam(':reponse3', $reponse3);
    $query->bindParam(':reponse4', $reponse4);
    $query->bindParam(':correcte', $correcte);
    $query->bindParam(':niveau', $niveau);
    $query->bindParam(':numQuestion', $_GET['numQuestion']);

    $query->execute();

    $_SESSION[MSG_SUCCES] = "Questionnaire modifié avec succès";
}

// Est-ce qu'on a $_GET['numQuestion'] et numQuestion différent de null
if (!empty($_GET['numQuestion'])) {
    // On nettoie l'id envoyé
    $numQuestion = strip_tags($_GET['numQuestion']);

    $sql = "SELECT * FROM qcm WHERE numQuestion = :numQuestion";

    // Préparation de la requête
    $query = $conn->prepare($sql);

    // On accroche le paramètre numQuestion
    $query->bindValue(':numQuestion', $numQuestion, PDO::PARAM_INT);

    // Exécution
    $query->execute();

    $questionnaire = $query->fetch();

    if (!$questionnaire) {
        header('Location:questionAdmin.php');
    }
} else {
    header('Location:questionAdmin.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un questionnaire</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<main class="container">
    <div class="row">
        <section class="col-12">

            <?php
            if (!empty($_SESSION[MSG_ERREUR])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION[MSG_ERREUR] . "</div>";
                $_SESSION[MSG_ERREUR] = "";
            }
            ?>

            <?php
            if (!empty($_SESSION[MSG_SUCCES])) {
                echo "<div class='alert alert-success' role='alert'>" . $_SESSION[MSG_SUCCES] . "</div>";
                $_SESSION[MSG_SUCCES] = "";
            }
            ?>


            <h1>Modification d'un questionnaire</h1>

            <form  method="post" action="">
                <label for="question" class="form-label">Question : </label>
                <input class="form-control" type="text" id="question" placeholder="Saisissez la question " name="question" value="<?= $questionnaire['question']?>" required>

                <label for="reponse1" class="form-label">Reponse 1 : </label>
                <input class="form-control" type="text" id="reponse1" placeholder="Saisissez la premiere reponse " name="reponse1"  value="<?= $questionnaire['reponse1']?>" required>

                <label for="reponse2" class="form-label">Reponse 2 : </label>
                <input class="form-control" type="text" id="reponse2" placeholder="Saisissez la deuxieme reponse " name="reponse2"  value="<?= $questionnaire['reponse2']?>" required>

                <label for="reponse3" class="form-label">Reponse 3 : </label>
                <input class="form-control" type="text" id="reponse3" placeholder="Saisissez la troisieme reponse " name="reponse3"  value="<?= $questionnaire['reponse3']?>" required>

                <label for="reponse4" class="form-label">Reponse 4 : </label>
                <input class="form-control" type="text" id="reponse4" placeholder="Saisissez la quatrieme reponse " name="reponse4"  value="<?= $questionnaire['reponse4']?>" required>

                <label for="reponse_correcte" class="form-label">Choisissez la bonne reponse : </label>
                <select class="form-control" id="reponse_correcte" name="reponse_correcte" >
                    <option value='<?= $questionnaire['reponse_correcte']?>'><?= $questionnaire['reponse_correcte']?></option>
                    <option value="1">Reponse1</option>
                    <option value="2">Reponse2</option>
                    <option value="3">Reponse3</option>
                    <option value="4">Reponse4</option>
                </select>

                <label for="niveau" class="form-label">Choisissez parmi les niveaux : </label>
                <select class="form-control" id="niveau" name="niveau" >
                    <option value='<?= $questionnaire['niveau']?>'><?= $questionnaire['niveau']?></option>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                    <option value="M1">M1</option>
                    <option value="M2">M2</option>
                </select><br>
                <button type="submit" name="ajout" class="btn btn-success">Modifier</button>
                <button type="button" name="ajout" class="btn btn-danger"><a href="questionAdmin.php" style="text-decoration: none; color: white">Revenir en arriere</button>
            </form>
        </section>

    </div>

</main>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
