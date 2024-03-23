<?php
session_start();

require_once "connection.php";

define('ERROR_MESSAGE', "Les mots de passe ne correspondent pas");
define('EMAIL_EXISTS_MESSAGE', "L'email existe déjà");
define('SUCCESS_MESSAGE', "L'étudiant a été inscrit avec succès");

if ($_POST) {
    if (
        isset($_POST['nomEtudiant'], $_POST['prenomEtudiant'], $_POST['niveauEtudiant'], $_POST['courrierEtudiant'], $_POST['passwordEtudiant'], $_POST['passwordEtudiant2']) &&
        !empty($_POST['nomEtudiant']) &&
        !empty($_POST['prenomEtudiant']) &&
        !empty($_POST['niveauEtudiant']) &&
        !empty($_POST['courrierEtudiant']) &&
        !empty($_POST['passwordEtudiant']) &&
        !empty($_POST['passwordEtudiant2']) &&
        $_POST['passwordEtudiant'] == $_POST['passwordEtudiant2']
    ) {
        $nomEtudiant = strip_tags($_POST['nomEtudiant']);
        $prenomEtudiant = strip_tags($_POST['prenomEtudiant']);
        $niveauEtudiant = strip_tags($_POST['niveauEtudiant']);
        $courrierEtudiant = strip_tags($_POST['courrierEtudiant']);
        $passwordEtudiant = strip_tags($_POST['passwordEtudiant']);

        $sql_check_email = 'SELECT COUNT(*) as count FROM etudiant WHERE courrierEtudiant = :email';
        $query_check_email = $conn->prepare($sql_check_email);
        $query_check_email->bindValue(':email', $courrierEtudiant, PDO::PARAM_STR);
        $query_check_email->execute();
        $email_count = $query_check_email->fetch(PDO::FETCH_ASSOC);

        if ($email_count['count'] > 0) {
            $_SESSION['erreur'] = EMAIL_EXISTS_MESSAGE;
            header('Location: inscription.php');
            exit();
        }

        $sql_insert_etudiant = 'INSERT INTO etudiant(nomEtudiant, prenomEtudiant, niveauEtudiant, courrierEtudiant, passwordEtudiant) VALUES (:nomEtudiant, :prenomEtudiant, :niveauEtudiant, :courrierEtudiant, :passwordEtudiant);';

        $query_insert_etudiant = $conn->prepare($sql_insert_etudiant);

        $query_insert_etudiant->bindValue(':nomEtudiant', $nomEtudiant, PDO::PARAM_STR);
        $query_insert_etudiant->bindValue(':prenomEtudiant', $prenomEtudiant, PDO::PARAM_STR);
        $query_insert_etudiant->bindValue(':niveauEtudiant', $niveauEtudiant, PDO::PARAM_STR);
        $query_insert_etudiant->bindValue(':courrierEtudiant', $courrierEtudiant, PDO::PARAM_STR);
        $query_insert_etudiant->bindValue(':passwordEtudiant', $passwordEtudiant, PDO::PARAM_STR);

        $query_insert_etudiant->execute();

        $_SESSION['message'] = SUCCESS_MESSAGE;
        header('Location: inscription.php');
        exit();
    } else {
        $_SESSION['erreur'] = ERROR_MESSAGE;
        header('Location: inscription.php');
        exit();
    }
}

// Affichage du message de succès
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

// Affichage du message d'erreur
if (isset($_SESSION['erreur'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
    unset($_SESSION['erreur']);
}
?>



<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Inscription</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->

    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- Left Text -->
        <div
            class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
            <img
                src="../../assets/img/illustrations/auth-register-multisteps-illustration.png"
                alt="auth-register-multisteps"
                class="img-fluid"
                width="280" />

            <img
                src="../../assets/img/illustrations/bg-shape-image-light.png"
                alt="auth-register-multisteps"
                class="platform-bg"
                data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
        <!-- /Left Text -->



        <!--  Multi Steps Registration -->
        <div class="d-flex col-lg-8 align-items-center justify-content-center p-sm-5 p-3">
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="index.html" class="app-brand-link gap-2">
                            <div style="margin: 0 auto">
                                <a href="index.php"><img src="assets/img/logo.png" style="width: 300px"></a>
                            </div>
                        </a>
                    </div>
            <div class="w-px-700">
                <?php // Affichage du message de succès
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                }

                // Affichage du message d'erreur
                if (isset($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
                    unset($_SESSION['erreur']);
                }
                ?>
                    <div class="bs-stepper-content">
                        <form id="multiStepsForm" method="POST">
                            <!-- Account Details -->
                            <div id="accountDetailsValidation" class="content">
                                <div class="content-header mb-4">
                                    <h3 class="mb-1">Information du compte</h3>
                                    <p>Entrer les informations détaillées du compte</p>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="nomEtudiant">Nom</label>
                                        <input
                                            type="text"
                                            name="nomEtudiant"
                                            id="nomEtudiant"
                                            required
                                            class="form-control"
                                            placeholder="john" />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="prenomEtudiant">Prénom</label>
                                        <input
                                            type="text"
                                            required
                                            name="prenomEtudiant"
                                            id="prenomEtudiant" class="form-control"
                                            placeholder="doe" />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="niveauEtudiant">Niveau</label><br>
                                        <select name="niveauEtudiant" id="niveauEtudiant" STYLE="width: 320px; height: 40px; border-radius: 4px; border: 1px solid rgba(0,0,0,0.2)">
                                            <option value="L1"">L1</option>
                                            <option value="L2"">L2</option>
                                            <option value="L3"">L3</option>
                                            <option value="M1"">M1</option>
                                            <option value="M2"">M2</option>
                                        </select>
                                    </div>


                                    <div class="col-sm-6">
                                        <label class="form-label" for="courrierEtudiant">Email</label>
                                        <input
                                            type="email"
                                            name="courrierEtudiant"
                                            id="courrierEtudiant"
                                            class="form-control"
                                            required
                                            placeholder="john.doe@email.com"
                                            aria-label="john.doe" />
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <label class="form-label" for="passwordEtudiant">Mot de passe</label>
                                        <div class="input-group input-group-merge">
                                            <input
                                                type="password"
                                                id="passwordEtudiant"
                                                name="passwordEtudiant"
                                                class="form-control"*
                                                required
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="multiStepsPass2" />
                                            <span class="input-group-text cursor-pointer" id="multiStepsPass2"
                                            ><i class="ti ti-eye-off"></i
                                                ></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <label class="form-label" for="passwordEtudiant2">Confirmer votre mot de passe</label>
                                        <div class="input-group input-group-merge">
                                            <input
                                                type="password"
                                                required
                                                id="passwordEtudiant2"
                                                name="passwordEtudiant2"
                                                class="form-control"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="multiStepsConfirmPass2" />
                                            <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"
                                            ><i class="ti ti-eye-off"></i
                                                ></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between mt-4">
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0" type="submit">S'inscrire</span>
                                            <i class="ti ti-arrow-right ti-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                </div>
            </div>
        </div>
        <!-- / Multi Steps Registration -->
    </div>
</div>

<script>
    // Check selected custom option
    window.Helpers.initCustomOptionCheck();
</script>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="assets/vendor/libs/hammer/hammer.js"></script>
<script src="assets/vendor/libs/i18n/i18n.js"></script>
<script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="assets/vendor/libs/select2/select2.js"></script>
<script src="assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- Page JS -->
<script src="assets/js/pages-auth-multisteps.js"></script>
</body>
</html>
