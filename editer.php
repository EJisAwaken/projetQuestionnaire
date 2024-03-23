<?php
session_start();
require_once("connection.php");

if ($_POST) {
    if (isset($_POST['nomEtudiant']) && !empty($_POST['nomEtudiant'])
        && isset($_POST['prenomEtudiant']) && !empty($_POST['prenomEtudiant'])
        && isset($_POST['niveauEtudiant']) && !empty($_POST['niveauEtudiant'])
        && isset($_POST['courrierEtudiant']) && !empty($_POST['courrierEtudiant'])
        && isset($_POST['passwordEtudiant']) && !empty($_POST['passwordEtudiant'])
        && isset($_POST['numEtudiant']) && !empty($_POST['numEtudiant'])
    ) {

        // On nettoie les données envoyées
        $nomEtudiant = strip_tags($_POST['nomEtudiant']);
        $numEtudiant = strip_tags($_POST['numEtudiant']);
        $prenomEtudiant = strip_tags($_POST['prenomEtudiant']);
        $niveauEtudiant = strip_tags($_POST['niveauEtudiant']);
        $courrierEtudiant = strip_tags($_POST['courrierEtudiant']);
        $passwordEtudiant = strip_tags($_POST['passwordEtudiant']);

        $sql = "UPDATE etudiant SET nomEtudiant=:nomEtudiant, prenomEtudiant=:prenomEtudiant, niveauEtudiant=:niveauEtudiant, courrierEtudiant=:courrierEtudiant, passwordEtudiant=:passwordEtudiant WHERE numEtudiant=:numEtudiant";

        $query = $conn->prepare($sql);

        $query->bindValue(':numEtudiant', $numEtudiant, PDO::PARAM_INT);
        $query->bindValue(':nomEtudiant', $nomEtudiant, PDO::PARAM_STR);
        $query->bindValue(':prenomEtudiant', $prenomEtudiant, PDO::PARAM_STR);
        $query->bindValue(':niveauEtudiant', $niveauEtudiant, PDO::PARAM_STR);
        $query->bindValue(':courrierEtudiant', $courrierEtudiant, PDO::PARAM_STR);
        $query->bindValue(':passwordEtudiant', $passwordEtudiant, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Etudiant Modifié";
        header('Location: admin.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// Est-ce qu'on a $_GET['numEtudiant'] et numEtudiant différent de null
if (isset($_GET['numEtudiant']) && !empty($_GET['numEtudiant'])) {
    // On nettoie l'id envoyé
    $numEtudiant = strip_tags($_GET['numEtudiant']);

    $sql = "SELECT * FROM etudiant WHERE numEtudiant = :numEtudiant";

    // Préparation de la requête
    $query = $conn->prepare($sql);

    // On accroche le paramètre numEtudiant
    $query->bindValue(':numEtudiant', $numEtudiant, PDO::PARAM_INT);

    // Exécution
    $query->execute();

    $etudiant = $query->fetch();

    if (!$etudiant) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<main class="container">
    <div class="row">
        <section class="col-12">

            <?php
            if (!empty($_SESSION["erreur"])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['erreur'] . "</div>";
                $_SESSION["erreur"] = "";
            }
            ?>

            <?php
            if (!empty($_SESSION["message"])) {
                echo "<div class='alert alert-success' role='alert'>" . $_SESSION['message'] . "</div>";
                $_SESSION["message"] = "";
            }
            ?>


            <h1>Modification d'un étudiant</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="nomEtudiant">Nom </label>
                    <input type="text" id="nomEtudiant" name="nomEtudiant" class="form-control" value="<?php echo $etudiant['nomEtudiant'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="prenomEtudiant">Prénom </label>
                    <input type="text" id="prenomEtudiant" name="prenomEtudiant" class="form-control" value="<?php echo $etudiant['prenomEtudiant'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="niveauEtudiant">Niveau </label>
                    <select class="form-control" id="niveauEtudiant" name="niveauEtudiant" >
                        <option value='<?= $etudiant['niveauEtudiant']?>'><?= $etudiant['niveauEtudiant']?></option>
                        <option value="L1">L1</option>
                        <option value="L2">L2</option>
                        <option value="L3">L3</option>
                        <option value="M1">M1</option>
                        <option value="M2">M2</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="courrierEtudiant">Courrier </label>
                    <input type="email" id="courrierEtudiant" name="courrierEtudiant" class="form-control" required placeholder="***********@gmail.com" value="<?php echo $etudiant['courrierEtudiant'] ?>">
                </div>

                <div class="form-group">
                    <label for="passwordEtudiant">Mot de passe </label>
                    <input type="password" id="passwordEtudiant" required name="passwordEtudiant" class="form-control" placeholder="Entrer votre mot de passe" value="<?php echo $etudiant['passwordEtudiant'] ?>">
                </div>

                <input type="hidden" name="numEtudiant" value="<?php echo $etudiant['numEtudiant'] ?>">

                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="button" name="ajout" class="btn btn-danger"><a href="admin.php" style="text-decoration: none; color: white">Revenir en arriere</button>

            </form>
        </section>

    </div>

</main>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
